<?php

use Phalcon\Acl;
use Phalcon\Acl\Role;
use Phalcon\Acl\Resource;
use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin as Pegado;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Acl\Adapter\Memory as AclList;

/**
 * SecurityPlugin
 *
 * This is the security plugin which controls that users only have access to the modules they're assigned to
 */
class SecurityPlugin extends Pegado {

    /**
     * Returns an existing or new access control list
     *
     * @returns AclList
     */
    public function getAcl() {

        $acl = new AclList();

        $acl->setDefaultAction(Acl::DENY);

        // Register roles
        $roles = array(
           'clientes' => new Role(
              'Clientes', 'Member privileges, granted after sign in.'
           ),
           'proveedores' => new Role(
              'Proveedores', 'Member privileges, granted after sign in.'
           ),
           'empleados' => new Role(
              'Empleados', 'Member privileges, granted after sign in.'
           ),
           'administrador' => new Role(
              'Administrador', 'Member privileges, granted after sign in.'
           ),
           'users' => new Role(
              'Users', 'Member privileges, granted after sign in.'
           ),
           'guests' => new Role(
              'Guests', 'Anyone browsing the site who is not signed in is considered to be a "Guest".'
           )
        );

        foreach ($roles as $role) {
            $acl->addRole($role);
        }

        //Private area resources
        $privateResources = array(
           'invoice' => array('indexventas', 'searchventas'),
           'pedidostmp' => array('indexventas', 'searchventas', 'pasaventas', 'newventas', 'editventas', 'saveventas', 'aprobarventas', 'deleteventas', 'corregir', 'eliminar'),
           'bonificadetalle' => array('index', 'imprimir', 'facturar'),
           'reportepedidos' => array('index', 'imprimir', 'totalmensual', 'totalrep', 'totalitem', 'repmensual', 'itemmensual'),
           'creditmemo' => array('indexventas', 'searchventas'),
           'estadocuenta' => array('indexventas', 'searchventas'),
           'vendorcredit' => array('indexventas', 'searchventas'),
           'users' => array('index', 'search', 'edit', 'delete'),
           'products' => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete'),
           'pedidos' => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete'),
           'customer' => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete'),
           'driver' => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete'),
           'warehouse' => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete'),
           'vehicle' => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete'),
           'route' => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete'),
           'ruta' => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete'),
           'yourcode' => array('indexventas'),
           'items' => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete')
        );
        foreach ($privateResources as $resource => $actions) {
            $acl->addResource(new Resource($resource), $actions);
        }

        //Public area resources
        $publicResources = array(
           'index' => array('index'),
           'about' => array('indexventas'),
           'register' => array('indexventas'),
           'registrar' => array('indexventas'),
           'errors' => array('show401', 'show404', 'show500'),
           'session' => array('indexventas', 'register', 'start', 'end'),
           'contact' => array('indexventas', 'send')
        );
        foreach ($publicResources as $resource => $actions) {
            $acl->addResource(new Resource($resource), $actions);
        }

        //Grant access to public areas to both users and guests
        foreach ($roles as $role) {
            foreach ($publicResources as $resource => $actions) {
                foreach ($actions as $action) {
                    $acl->allow($role->getName(), $resource, $action);
                }
            }
        }

        //Grant access to private area to role Users
        foreach ($privateResources as $resource => $actions) {
            foreach ($actions as $action) {
                $acl->allow('Users', $resource, $action);
            }
        }

        //The acl is stored in session, APC would be useful here too
        $this->persistent->acl = $acl;

        return $this->persistent->acl;
    }

    /**
     * This action is executed before execute any action in the application
     *
     * @param Event $event
     * @param Dispatcher $dispatcher
     * @return bool
     */
    public function beforeDispatch(Event $event, Dispatcher $dispatcher) {

        $auth = $this->session->get('auth');
        if (!$auth) {
            $role = 'Guests';
        } else {
            $role = 'Users';
        }

        $controller = $dispatcher->getControllerName();
        $action = $dispatcher->getActionName();

        $acl = $this->getAcl();

        if (!$acl->isResource($controller)) {
            $dispatcher->forward([
               'controller' => 'errors',
               'action' => 'show404'
            ]);

            return false;
        }

        $allowed = $acl->isAllowed($role, $controller, $action);
        if (!$allowed) {
            $dispatcher->forward(array(
               'controller' => 'errors',
               'action' => 'show401'
            ));
            $this->session->destroy();
            return false;
        }
    }

}
