<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class ContribuyenteController extends ControllerBase {

    public function initialize() {
        $this->tag->setTitle('Contribuyente');
        parent::initialize();
    }

    public function indexAction() {
        $this->session->conditions = null;
        $this->view->form = new ContribuyenteSearchForm;
    }

    public function newAction() {
        $this->view->form = new ContribuyenteForm();
    }

    public function searchAction() {
        $numberPage = 1;

        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Contribuyente", $this->request->getPost());
            $this->persistent->searchParams = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }
        $parameters = array();
        if ($this->persistent->searchParams) {
            $parameters = $this->persistent->searchParams;
        }
        $misCodigos = Contribuyente::find($parameters);
        if (count($misCodigos) == 0) {
            $this->flash->notice("LA busqueda no arrojo ningun contribuyente como resultado");
            return $this->dispatcher->forward(
                  [
                     "controller" => "contribuyente",
                     "action" => "index",
                  ]
            );
        }

        $paginator = new Paginator(array(
           "data" => $misCodigos,
           "limit" => 10,
           "page" => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
        $this->view->elementos = $misCodigos;
    }

    public function saveAction() {
        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(
                  [
                     "controller" => "contribuyente",
                     "action" => "index",
                  ]
            );
        }
        $id = $this->request->getPost("Id", "int");
        $contribuyente = Contribuyente::findFirstById($id);
        if (!$contribuyente) {
            $this->flash->error("Contribuyente no existe");

            return $this->dispatcher->forward(
                  [
                     "controller" => "contribuyente",
                     "action" => "index",
                  ]
            );
        }

        $form = new ContribuyenteForm();

        $data = $this->request->getPost();
        if (!$form->isValid($data, $contribuyente)) {
            foreach ($form->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                  [
                     "controller" => "contribuyente",
                     "action" => "index",
                  ]
            );
        }

        if ($contribuyente->save() == false) {
            foreach ($contribuyente->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                  [
                     "controller" => "contribuyente",
                     "action" => "edit",
                  ]
            );
        }

        $form->clear();

        $this->flash->success("El contribuyente se actualizo satisfactoriamente");

        return $this->dispatcher->forward(
              [
                 "controller" => "contribuyente",
                 "action" => "index",
              ]
        );
    }

    public function createAction() {
        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(
                  [
                     "controller" => "contribuyente",
                     "action" => "index",
                  ]
            );
        }

        $form = new ContribuyenteForm();
        $contribuyente = new Contribuyente();

        $data = $this->request->getPost();
        if (!$form->isValid($data, $contribuyente)) {
            foreach ($form->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                  [
                     "controller" => "contribuyente",
                     "action" => "new",
                  ]
            );
        }

        if ($contribuyente->save([
              'Ambiente' => 0,
              'Emision' => 0,
              'Contingencia' => 0,
           ]) == false) {
            foreach ($contribuyente->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                  [
                     "controller" => "contribuyente",
                     "action" => "new",
                  ]
            );
        }

        $form->clear();

        $this->flash->success("Un nuevo contribuyente se ha adicionado correctamente");

        return $this->dispatcher->forward(
              [
                 "controller" => "contribuyente",
                 "action" => "index",
              ]
        );
    }

    private function _registerRuc($ruc) {
//        var_dump($ruc);
        $this->session->set('contribuyente', array(
           'id' => $ruc['Id'],
           'estab' => $ruc['CodEmisor'],
           'punto' => $ruc['Punto'],
           'ruc' => $ruc['Ruc'],
           'razon' => $ruc['Razon'],
           'emision' => $ruc['Emision'],
           'ambiente' => $ruc['Ambiente'],
           'NombreComercial' => $ruc['NombreComercial'],
           'DirMatriz' => $ruc['DirMatriz'],
           'DirEmisor' => $ruc['DirEmisor'],
           'Resolucion' => $ruc['Resolucion'],
           'LlevaContabilidad' => $ruc['LlevaContabilidad']
        ));
//        $this->flash->success('Seleccionado el Contribuyente ' . $ruc['Razon']);
    }

    public function selectAction($id) {
        $parameters = array('conditions' => '[Id] = :id:', 'bind' => array('id' => $id));
        $contribuyente = Contribuyente::find($parameters);
        $Ruc = json_encode($contribuyente);
        $otro = json_decode($Ruc, true);
        if ($contribuyente == false) {
            $this->flash->error("Este contribuyente no existe");
            return $this->dispatcher->forward(
                  [
                     "controller" => "contribuyente",
                     "action" => "index",
                  ]
            );
        }

        foreach ($otro as $key => $value) {
            $this->_registerRuc($value);
        }
        $saca = $this->session->get('contribuyente');
        $this->flash->success('Contriuyente Seleccionado || ' . $_SESSION['contribuyente']['razon']);
        return $this->dispatcher->forward(
              [
                 "controller" => "yourcode",
                 "action" => "index",
              ]
        );
    }

    public function editAction($id) {
        if (!$this->request->isPost()) {
            $codigo = Contribuyente::findFirstById($id);
            if (!$codigo) {
                $this->flash->error("ESte contribuyente no existe");
                return $this->dispatcher->forward(
                      [
                         "controller" => "contribuyente",
                         "action" => "index",
                      ]
                );
            }
            $this->view->form = new ContribuyenteForm($codigo, array('edit' => true));
        }
    }

    public function deleteAction($id) {

        $codigo = Contribuyente::findFirstById($id);
        if (!$codigo) {
            $this->flash->error("ESte contribuyente no existe");

            return $this->dispatcher->forward(
                  [
                     "controller" => "contribuyente",
                     "action" => "index",
                  ]
            );
        }

        if (!$codigo->delete()) {
            foreach ($codigo->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                  [
                     "controller" => "contribuyente",
                     "action" => "search",
                  ]
            );
        }

        $this->flash->success("ESte contribuyente se ha eliminado de nuestra base de datos");

        return $this->dispatcher->forward(
              [
                 "controller" => "contribuyente",
                 "action" => "search",
              ]
        );
    }

}
