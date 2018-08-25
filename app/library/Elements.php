<?php

use Phalcon\Mvc\User\Component;
use Phalcon\Db\Adapter\Pdo\Mysql;

/**
 * Elements
 *
 * Helps to build UI elements for the application
 */
class Elements extends Component {

    private $_headerMenu = array(
       'navbar-left' => array(
          'index' => array(
             'caption' => 'Home',
             'action' => 'index'
          ),
          'contact' => array(
             'caption' => 'Comunicarse',
             'action' => 'indexventas'
          ),
          'yourcode' => array(
             'caption' => 'Opciones',
             'action' => 'indexventas'
          ),
       ),
       'navbar-right' => array(
          'session' => array(
             'caption' => 'Login',
             'action' => 'indexventas'
          ),
       )
    );

    /**
     * Builds header menu with left and right items
     *
     * @return string
     */
    public function getMenu() {

        $auth = $this->session->get('auth');
        if ($auth) {
            $this->_headerMenu['navbar-right']['session'] = array(
               'caption' => 'Salir',
               'action' => 'end'
            );
        } else {
            unset($this->_headerMenu['navbar-left']['yourcode']);
        }

        $controllerName = $this->view->getControllerName();
        foreach ($this->_headerMenu as $position => $menu) {
            echo '<div class="nav-collapse">';
            echo '<ul class="nav navbar-nav ', $position, '">';
            foreach ($menu as $controller => $option) {
                if ($controllerName == $controller) {
                    echo '<li class="active">';
                } else {
                    echo '<li>';
                }
                echo $this->tag->linkTo($controller . '/' . $option['action'], $option['caption']);
                echo '</li>';
            }
            echo '</ul>';
            echo '</div>';
        }
    }

    /**
     * Para emitir las opciones
     * 1) Ha ingresado con su identificacion y clave
     * 2) Cada opcion hace referencia a un controlador y a una accion
     * 3) Cada tipo de usuario tiene acceso a uno o varios controladores-acciones
     * 4) Existen los siguientes tipo de usuarios: ADMINISTRADOR, EMPLEADO, CLIENTE y PROVEEDOR
     */
    public function getTabs() {

        $controllerName = $this->view->getControllerName();
        $actionName = $this->view->getActionName();
        echo '<ul class="nav nav-tabs navbar-custom">';

        $auth = $this->session->get('auth');
        $tipo = $auth['tipo'];
        if ($tipo == 'ADMINISTRADOR') {
            $_tabs = array(
               'Privado' => array(
                  'controller' => 'yourcode',
                  'action' => 'indexventas',
                  'any' => true
               ),
               'Clientes' => array(
                  'controller' => 'customer',
                  'action' => 'index',
                  'any' => true
               ),
               'Pedidos' => array(
                  'controller' => 'pedidos',
                  'action' => 'index',
                  'any' => true
               ),
               'Pagos' => array(
                  'controller' => 'creditmemo',
                  'caption' => 'PagosQB',
                  'action' => 'indexpagos',
                  'any' => true
               ),
               'Bodegas' => array(
                  'controller' => 'bodegas',
                  'action' => 'index',
                  'any' => true
               ),
               'Produccion' => array(
                  'controller' => 'lotesdetalle',
                  'action' => 'index',
                  'any' => true
               ),
               'Transferencias' => array(
                  'controller' => 'lotestrxcab',
                  'action' => 'index',
                  'any' => true
               ),
               'Inventarios' => array(
                  'controller' => 'inventario',
                  'caption' => 'Inventarios',
                  'action' => 'index',
                  'any' => true
               ),
               'R.Pedido' => array(
                  'controller' => 'reportepedidos',
                  'action' => 'index',
                  'any' => true
               ),
               'R.Prod' => array(
                  'controller' => 'reporteproduccion',
                  'action' => 'index',
                  'any' => true
               ),
               'R.Invent' => array(
                  'controller' => 'reporteinventarios',
                  'action' => 'index',
                  'any' => true
               ),
            );
        } elseif ($tipo == 'EMPLEADO') {
            $_tabs = array(
               'Privado' => array(
                  'controller' => 'yourcode',
                  'action' => 'indexventas',
                  'any' => true
               ),
               'Clientes' => array(
                  'controller' => 'customer',
                  'action' => 'index',
                  'any' => true
               ),
               'Pedidos' => array(
                  'controller' => 'pedidos',
                  'action' => 'index',
                  'any' => true
               ),
               'Pagos' => array(
                  'controller' => 'creditmemo',
                  'caption' => 'PagosQB',
                  'action' => 'indexpagos',
                  'any' => true
               ),
               'Bodegas' => array(
                  'controller' => 'bodegas',
                  'action' => 'index',
                  'any' => true
               ),
               'Produccion' => array(
                  'controller' => 'lotesdetalle',
                  'action' => 'index',
                  'any' => true
               ),
               'Transferencias' => array(
                  'controller' => 'lotestrxcab',
                  'action' => 'index',
                  'any' => true
               ),
               'Inventarios' => array(
                  'controller' => 'inventario',
                  'caption' => 'Inventarios',
                  'action' => 'index',
                  'any' => true
               ),
               'R.Pedido' => array(
                  'controller' => 'reportepedidos',
                  'action' => 'index',
                  'any' => true
               ),
               'R.Prod' => array(
                  'controller' => 'reporteproduccion',
                  'action' => 'index',
                  'any' => true
               ),
               'R.Invent' => array(
                  'controller' => 'reporteinventarios',
                  'action' => 'index',
                  'any' => true
               ),
            );
        }
        foreach ($_tabs as $caption => $option) {
            if ($option['controller'] == $controllerName && ($option['action'] == $actionName || $option['any'])) {
                echo '<li class="active">';
            } else {
                echo '<li>';
            }
            echo $this->tag->linkTo($option['controller'] . '/' . $option['action'], $caption), '</li>';
        }
        echo '</ul>';
    }

    public function getModelosAdicional() {
        $conn = new Mysql([
           'host' => $this->config->database->host,
           'username' => $this->config->database->username,
           'password' => $this->config->database->password,
           'dbname' => $this->config->database->dbname,
        ]);
        $control = $this->dispatcher->getControllerName();
        $accion = $this->dispatcher->getActionName();
        $sql = 'SELECT * FROM modelos WHERE modelName = ? AND actionName = ?;';
        $registros = $conn->query($sql, [$control, $accion]);
        $valido = array();
        $valido['cabecera'] = 'Sin Cabeceras';
        $valido['titulo'] = 'Sin Titulo';
        $valido['subtitulo'] = 'Sin Sub-Titulos';
        $valido['lineas'][0] = 'Sin mensajes';
        $i = 0;
        if ($registros->numRows() == 0) {
            
        } else {
            while ($modelo = $registros->fetch()) {
                switch ($modelo['modelType']) {
                    case 1:
                        $valido['cabecera'] = $modelo['modelDes'];
                    case 2:
                        $valido['titulo'] = $modelo['modelDes'];
                        break;
                    case 3:
                        $valido['subtitulo'] = $modelo['modelDes'];
                        break;
                    case 4:
                        $valido['lineas'][$i] = $modelo['modelDes'];
                        $i++;
                        break;

                    default:
                        break;
                }
            }
        }
        $this->view->descriptivo = $valido;
    }

}
