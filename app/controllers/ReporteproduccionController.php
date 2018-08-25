<?php


class ReporteproduccionController extends ControllerBase {

    protected $tipo;
    protected $inidate;
    protected $findate;

    public function initialize() {
        $this->tag->setTitle('R.Prod');
        parent::initialize();
    }

    public function indexAction() {
        $form = new ReporteProduccionForm;
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
        $this->tipo = $this->request->getPost('tipo');
        $this->inidate = $this->request->getPost('iniDate');
        $this->findate = $this->request->getPost('finDate');
        $this->session->set('RPEDIDOS', array(
           'iniDate' => $this->request->getPost('iniDate'),
           'finDate' => $this->request->getPost('finDate'),
           'proceso' => $this->request->getPost('tipo')
        ));
        if ($this->tipo === "1") {
            $this->dispatcher->forward([
               'controller' => "reporteproduccion",
               'action' => 'acumuladomensual',
            ]);
        } elseif ($this->tipo === "2") {
            $this->dispatcher->forward([
               'controller' => "reporteproduccion",
               'action' => 'listaproducto',
            ]);
        } elseif ($this->tipo === "3") {
            $this->dispatcher->forward([
               'controller' => "reporteproduccion",
               'action' => 'listaordenes',
            ]);
        } elseif ($this->tipo === "4") {
            $this->dispatcher->forward([
               'controller' => "reporteproduccion",
               'action' => 'lista',
            ]);
        } elseif ($this->tipo === "5") {
            $this->dispatcher->forward([
               'controller' => "reporteproduccion",
               'action' => 'itemmensual',
            ]);
        }
    }

    public function acumuladomensualAction() {
        $params = $this->session->get('RPEDIDOS');
        $this->toprtprod->impCabecera($params);
        }
   private function enviarEmail($archivo) {
       
       $auth = $this->session->get('auth');
        $part = '<div><p><strong>REPORTE DE VENTAS LOS COQUEIROS</strong></p><br>
           <p>Estimado(a) </p><br><p><strong>Administrador</strong></p><br><p>Heladerías Cofrunat Cia. Ltda.,  le informa que se ha generado su reporte,</p><br><p><strong>' .
           '</strong></p><br> ' .
           '<p>que adjuntamos en formato xlsx para que lo guarde en sus archivos.</p><br>
</p><br><br><p>Atentamente,</p><br><br><p>Heladerías Cofrunat Cia. Ltda. </p>';



        $paraemail['part'] = $part;
        $paraemail['body'] = $part;

        $filename = $archivo;
        $param = $filename;
        $paraemail['attach'] = $param;
        $paraemail['subject'] = 'LOS COQUEIROS - Reporte Ventas';
        $paraemail['fromemail']['email'] = 'xavierbustos@loscoqueiros.com';
        $paraemail['fromemail']['nombre'] = 'Heladerias Cofrunat Cia. Ltda.';
        $paraemail['toemail']['email'] = $auth['email'];
        $paraemail['toemail']['nombre'] = $auth['name'];
        $exp = $this->sendmail->enviaEmail($paraemail);
    }

}
