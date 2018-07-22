<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;

class ModelosForm extends Form
{

    public function initialize($entity = null, $options = array())
    {

        if (!isset($options['edit'])) {
            $element = new Numeric("id");
            $this->add($element->setLabel("Descripcion Pagina Nro."));
        } else {
            $this->add(new Hidden("id"));
        }

        $modelname = new Text("modelName");
        $modelname->setLabel("Nombre Pagina");
        $modelname->setFilters(array('striptags', 'string'));
        $modelname->addValidators(array(
            new PresenceOf(array(
                'message' => 'Un nombre de pagina es requerido'
            ))
        ));
        $this->add($modelname);

        $actionname = new Text("actionName");
        $actionname->setLabel("Tipo de Proceso");
        $actionname->setFilters(array('striptags', 'string'));
        $actionname->addValidators(array(
            new PresenceOf(array(
                'message' => 'El tipo de proceso es requerido'
            ))
        ));
        $this->add($actionname);

        $modelType = new Text("modelType");
        $modelType->setLabel("Tipo de descripcion (1-4)");
        $modelType->setFilters(array('striptags', 'string'));
        $modelType->addValidators(array(
            new PresenceOf(array(
                'message' => 'Tipo de descripcion es requerido'
            ))
        ));
        $this->add($modelType);
        

        $modelDes = new Text("modelDes");
        $modelDes->setLabel("Descripcion");
        $modelDes->setFilters(array('striptags', 'string'));
        $modelDes->addValidators(array(
            new PresenceOf(array(
                'message' => 'Descripcion del proceso es requerida'
           ))
        ));
        $this->add($modelDes);
    }

}