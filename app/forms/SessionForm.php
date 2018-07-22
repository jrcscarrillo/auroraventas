<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Text;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;

class SessionForm extends Form {

    public function initialize() {


        $email = new Text("email");
        $email->setLabel("Correo Electronico");
        $email->setFilters(array('striptags', 'strig'));
        $email->addValidators(array(
           new PresenceOf(array(
              'message' => 'debe ingresar un correo valido'
              ))
        ),
           new Email(array(
              'message' => 'debe ingresar una direccion de correo valida'
           )));
        $this->add($email );

        $password = new Password("password");
        $password->setLabel("Password");
        $password->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($password );

    }

}
