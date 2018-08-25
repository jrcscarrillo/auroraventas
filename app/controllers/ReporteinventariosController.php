<?php


class ReporteinventariosController extends ControllerBase {

    protected $tipo;
    protected $inidate;
    protected $findate;
    protected $bodega;
    protected $producto;

    public function initialize() {
        $this->tag->setTitle('R.Inv.');
        parent::initialize();
    }

    public function indexAction() {
        $form = new ReporteInventariosForm;
        $this->view->form = $form;
    }

    public function imprimirAction() {
        $auth = $this->session->get('auth');
        if ($auth['tipo'] <> 'ADMINISTRADOR') {
            $this->flash->notice('Este reporte esta protegido por el momento ');
            $this->dispatcher->forward([
               'controller' => 'index',
               'action' => 'index'
            ]);
        }
        var_dump($_POST);
        $this->tipo = $this->request->getPost('tipo');
        $this->inidate = $this->request->getPost('iniDate');
        $this->findate = $this->request->getPost('finDate');
        $this->bodega = $this->request->getPost('DestinoTrx');
        $this->producto = $this->request->getPost('ItemRef_ListID');
        $this->session->set('RINVENTARIOS', array(
           'iniDate' => $this->request->getPost('iniDate'),
           'finDate' => $this->request->getPost('finDate'),
           'proceso' => $this->request->getPost('tipo'),
           'bodega' => $this->request->getPost('DestinoTrx'),
           'producto' => $this->request->getPost('ItemRef_ListID')
        ));
        if ($this->tipo === "1") {
            $this->dispatcher->forward([
               'action' => 'movbodega',
            ]);
        } elseif ($this->tipo === "2") {
            $this->dispatcher->forward([
               'action' => 'movproducto',
            ]);
        } elseif ($this->tipo === "3") {
            $this->dispatcher->forward([
               'action' => 'movtrx',
            ]);
        } elseif ($this->tipo === "4") {
            $this->dispatcher->forward([
               'action' => 'movinicial',
            ]);
        } elseif ($this->tipo === "5") {
            $this->dispatcher->forward([
               'action' => 'movtransferencia',
            ]);
        }
    }

    public function movinicialAction() {
        $params = $this->session->get('RINVENTARIOS');
        $this->toprtinv->imprimeInventarioInicial($params);
        $this->flash->notice("Su reporte se ha generado en el directorio AURORA/Inventarios");
//        return $this->dispatcher->forward(['action' => 'index']);
        }
    
        public function movbodegaAction() {
        $params = $this->session->get('RINVENTARIOS');
        $this->toprtinv->imprimeMovBodega($params);
        $this->flash->notice("Su reporte se ha generado en el directorio AURORA/Inventarios");
//        return $this->dispatcher->forward(['action' => 'index']);
        }

}
