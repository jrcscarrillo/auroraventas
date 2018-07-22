<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;

class UsersForm extends Form
{

    public function initialize($entity = null, $options = array())
    {

        if (!isset($options['edit'])) {
            $element = new Numeric("id");
            $this->add($element->setLabel("Usuario Nro."));
        } else {
            $this->add(new Hidden("id"));
        }

        $tipo = new Text("tipo");
        $tipo->setLabel("Tipo Usuario");
        $tipo->setFilters(array('striptags', 'string'));
        $tipo->addValidators(array(
            new PresenceOf(array(
                'message' => 'Un nombre de pagina es requerido'
            ))
        ));
        $this->add($tipo);

        $username = new Text("username");
        $username->setLabel("Nombre Usuario");
        $username->setFilters(array('striptags', 'string'));
        $username->addValidators(array(
            new PresenceOf(array(
                'message' => 'El tipo de proceso es requerido'
            ))
        ));
        $this->add($username);

        $tipoId = new Text("tipoId");
        $tipoId->setLabel("Tipo de usuario");
        $tipoId->setFilters(array('striptags', 'string'));
        $tipoId->addValidators(array(
            new PresenceOf(array(
                'message' => 'Tipo de descripcion es requerido'
            ))
        ));
        $this->add($tipoId);
        

        $numeroId = new Text("numeroId");
        $numeroId->setLabel("Numero Identificacion");
        $numeroId->setFilters(array('striptags', 'string'));
        $numeroId->addValidators(array(
            new PresenceOf(array(
                'message' => 'Descripcion del proceso es requerida'
           ))
        ));
        $this->add($numeroId);
        

        $name = new Text("name");
        $name->setLabel("Nombre");
        $name->setFilters(array('striptags', 'string'));
        $name->addValidators(array(
            new PresenceOf(array(
                'message' => 'El tipo de proceso es requerido'
            ))
        ));
        $this->add($name);

        $email = new Text("email");
        $email->setLabel("Correo electronico");
        $email->setFilters(array('striptags', 'string'));
        $email->addValidators(array(
            new PresenceOf(array(
                'message' => 'Tipo de descripcion es requerido'
            ))
        ));
        $this->add($email);
        

        $active = new Text("active");
        $active->setLabel("Descripcion");
        $active->setFilters(array('striptags', 'string'));
        $active->addValidators(array(
            new PresenceOf(array(
                'message' => 'Descripcion del proceso es requerida'
           ))
        ));
        $this->add($active);        
        

        $qbid = new Text("qbid");
        $qbid->setLabel("Clave QB");
        $qbid->setFilters(array('striptags', 'string'));
        $qbid->addValidators(array(
            new PresenceOf(array(
                'message' => 'Descripcion del proceso es requerida'
           ))
        ));
        $this->add($qbid);        
    }

}