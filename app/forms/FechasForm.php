<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Date;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;

class FechasForm extends Form
{

    public function initialize($entity = null, $options = array())
    {

        if (!isset($options['edit'])) {
            $element = new Numeric("id");
            $this->add($element->setLabel("Fecha Sincronizacion Nro."));
        } else {
            $this->add(new Hidden("id"));
        }

        $billDesde = new Date("billDesde");
        $billDesde->setLabel("Compras desde");
        $billDesde->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($billDesde);
 
        $billHasta = new Date("billHasta");
        $billHasta->setLabel("Compras hasta");
        $billHasta->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($billHasta);
 
        $invoiceDesde = new Date("invoiceDesde");
        $invoiceDesde->setLabel("Compras desde");
        $invoiceDesde->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($invoiceDesde);
 
        $invoiceHasta = new Date("invoiceHasta");
        $invoiceHasta->setLabel("Compras hasta");
        $invoiceHasta->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($invoiceHasta);
 
        $billCreditDesde = new Date("billCreditDesde");
        $billCreditDesde->setLabel("Compras desde");
        $billCreditDesde->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($billCreditDesde);
 
        $billCreditHasta = new Date("billCreditHasta");
        $billCreditHasta->setLabel("Compras hasta");
        $billCreditHasta->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($billCreditHasta);
 
        $creditMemoDesde = new Date("creditMemoDesde");
        $creditMemoDesde->setLabel("Compras desde");
        $creditMemoDesde->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($creditMemoDesde);
 
        $creditMemoHasta = new Date("creditMemoHasta");
        $creditMemoHasta->setLabel("Compras hasta");
        $creditMemoHasta->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($creditMemoHasta);
 
        $productionDesde = new Date("productionDesde");
        $productionDesde->setLabel("Compras desde");
        $productionDesde->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($productionDesde);
 
        $productionHasta = new Date("productionHasta");
        $productionHasta->setLabel("Compras hasta");
        $productionHasta->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($productionHasta);
 
        $retencionDesde = new Date("retencionDesde");
        $retencionDesde->setLabel("Compras desde");
        $retencionDesde->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($retencionDesde);
 
        $retencionHasta = new Date("retencionHasta");
        $retencionHasta->setLabel("Compras hasta");
        $retencionHasta->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($retencionHasta);
 
        $otrosDesde = new Date("otrosDesde");
        $otrosDesde->setLabel("Compras desde");
        $otrosDesde->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($otrosDesde);
 
        $otrosHasta = new Date("otrosHasta");
        $otrosHasta->setLabel("Compras hasta");
        $otrosHasta->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($otrosHasta);

    }

}