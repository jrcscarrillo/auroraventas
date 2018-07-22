<?php

/**
 * Description of RegisterController
 *
 * @author jrcsc
 */
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Db\Adapter\Pdo\Mysql;

class RegisterController extends ControllerBase {

    public function initialize() {
        $this->tag->setTitle('Sign Up/Sign In');
        parent::initialize();
    }

    public function validaUsuario($reqPost) {
        $valido = array();
        if ($reqPost['password'] != $reqPost['repeatPassword']) {
            $valido['different'] = 'Passwords are different';
        }
        $queries['name'] = $reqPost['name'];
        $queries['username'] = $reqPost['username'];
        $queries['email'] = $reqPost['email'];
        $query = Criteria::fromInput($this->di, "Users", $queries);
        $this->persistent->searchParams = $query->getParams();
        $parameters = array();
        $parameters = $this->persistent->searchParams;
        $misCodigos = Users::find($parameters);
        var_dump($parameters);
        var_dump($misCodigos);
        if (count($misCodigos) == 0) {
            
        } else {
            foreach ($misCodigos as $usuarios) {
                if ($reqPost['name'] === $usuarios->name) {
                    $valido['fullname'] = 'Full Name exists, you can not enter any duplicate';
                } 
                if ($reqPost['username'] === $usuarios->username) {
                    $valido['username'] = 'UserName exists, you can not enter any duplicate';
                }
                if ($reqPost['email'] === $usuarios->email) {
                    $valido['email'] = 'email exists, you can not enter any duplicate';
                }
            }
        }
        return $valido;
    }
    
    public function findEqualUsersForValidation($reqPost) {
        $valido = array();
        if ($reqPost['password'] != $reqPost['repeatPassword']) {
            $valido['different'] = 'Passwords are different';
        }
        $conn = new Mysql([
           'host'     => $this->config->database->host,
           'username' => $this->config->database->username,
           'password' => $this->config->database->password,
           'dbname'   => $this->config->database->dbname,
 ]);
        $sql = 'SELECT * FROM Users WHERE name = ? OR username = ? OR email = ?';
        $registros = $conn->query($sql, [$reqPost['name'], $reqPost['username'], $reqPost['email']]);
        if ($registros->numRows() == 0) {
            
        } else {
            while ($usuario = $registros->fetch()) {
                if ($reqPost['name'] === $usuario['name']) {
                    $valido['fullname'] = 'Full Name exists, you can not enter any duplicate';
                } 
                if ($reqPost['username'] === $usuario['username']) {
                    $valido['username'] = 'UserName exists, you can not enter any duplicate';
                }
                if ($reqPost['email'] === $usuario['email']) {
                    $valido['email'] = 'email exists, you can not enter any duplicate';
                }
            }
        }
        return $valido;            
        }

    /**
     * Action to register a new user
     */
    public function indexAction() {
        $form = new RegistrarteForm;
        if ($this->request->isPost()) {
            $name = $this->request->getPost('name', array('string', 'striptags'));
            $username = $this->request->getPost('username', 'alphanum');
            $email = $this->request->getPost('email', 'email');
            $password = $this->request->getPost('password');
            $reqPost = array();
            $reqPost = $this->request->getPost();
            $valido = array();
            $valido = $this->findEqualUsersForValidation($reqPost);
            if (count($valido) > 0) {
                foreach ($valido as $mensaje) {
                    $this->flash->error((string) $mensaje);
                }
            } else {
                $user = new Users();
                $user->username = $username;
                $user->password = sha1($password);
                $user->name = $name;
                $user->email = $email;
                $user->created_at = new Phalcon\Db\RawValue('now()');
                $user->active = 'Y';

                if ($user->save() == false) {
                    foreach ($user->getMessages() as $message) {
                        $this->flash->error((string) $message);
                    }
                } else {
                    $this->tag->setDefault('email', '');
                    $this->tag->setDefault('password', '');
                    $this->flash->success('Thanks for sign-up, please log-in to start getting snippets into your account');

                    return $this->dispatcher->forward(
                          [
                             "controller" => "session",
                             "action" => "index",
                          ]
                    );
                }
            }
        }
        $this->view->form = $form;
    }

}
