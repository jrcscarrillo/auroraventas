<?php

/**
 * Description of RegisterController
 *
 * @author jrcsc
 */
class RutaController extends ControllerBase {

    public function initialize() {
        $this->tag->setTitle('Nueva Ruta');
        parent::initialize();
    }

    public function indexAction() {
        $form = new RouteNewForm();
        if ($this->request->isPost()) {
            $route = new Route();
            $id = $this->claves->guid();
            $route->setListid($id);
            $route->setEditsequence(rand(3000, 30000));
            $route->setName($this->request->getPost("name"));
            $route->setDescription($this->request->getPost("description"));
            $route->setAddress($this->request->getPost("address"));
            $route->setPhone($this->request->getPost("phone"));
            $route->setEmail($this->request->getPost("email", "email"));
            $route->setTipoid($this->request->getPost("tipoId"));
            $route->setNumeroid($this->request->getPost("numeroId"));
            $route->setCustomfield1($this->request->getPost("customField1"));


            if ($route->save() === false) {
                foreach ($route->getMessages() as $message) {
                    $this->flash->error($message);
                }
            } else {
                $this->view->disable();
                $this->flash->success('La ruta fue generada exitosamente');
                return  
                $this->dispatcher->forward(
                      [
                         "controller" => "route",
                         "action" => "index",
                      ]
                );
                $this->response->redirect('ruta');
            }
        }
        $this->view->form = $form;
    }

}
