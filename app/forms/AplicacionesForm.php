<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Url as UrlValidator;

class AplicacionesForm extends Form
{

    public function initialize($entity = null, $options = array())
    {
        if (!isset($options['edit'])) {
            $element = new Numeric("id");
            $this->add($element->setLabel("Aplicacion Nro."));
        } else {
            $this->add(new Hidden("id"));
        }

        $nombre = new Text("nombre");
        $nombre->setLabel("Nombre aplicacion");
        $nombre->setFilters(array('striptags', 'string'));
        $nombre->addValidators(array(
            new PresenceOf(array(
                'message' => 'Un nombre de aplicacion es requerido'
            ))
        ));
        $this->add($nombre);

        $descripcion = new Text("descripcion");
        $descripcion->setLabel("Descripcion de la aplicacion");
        $descripcion->setFilters(array('striptags', 'string'));
        $descripcion->addValidators(array(
            new PresenceOf(array(
                'message' => 'Descripcion de la aplicacion es requerido'
            ))
        ));
        $this->add($descripcion);

        $url = new Text("url");
        $url->setLabel("Web Site SSL");
        $url->setFilters(array('striptags', 'string'));
        $url->addValidators(array(
               new UrlValidator(array(
                  'message' => 'Web Site SSL es invalido -RETIPEE- ' 
               ))
        ));
        $this->add($url);
        

        $soporte = new Text("soporte");
        $soporte->setLabel("Descripcion");
        $soporte->setFilters(array('striptags', 'string'));
        $soporte->addValidators(array(
               new UrlValidator(array(
                  'message' => 'Web Site SSL es invalido -RETIPEE- ' 
               ))
        ));
        $this->add($soporte);
    }

}