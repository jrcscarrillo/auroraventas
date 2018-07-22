<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Regex;

class DevelopersForm extends Form
{

    public function initialize($entity = null, $options = array())
    {

        if (!isset($options['edit'])) {
            $element = new Numeric("id");
            $this->add($element->setLabel("Developer Number"));
        } else {
            $this->add(new Hidden("id"));
        }

        $fullname = new Text("fullname");
        $fullname->setLabel("Developer Full Name");
        $fullname->setFilters(array('striptags', 'string'));
        $fullname->addValidators(array(
            new PresenceOf(array(
                'message' => 'A Full Name is required'
            ))
        ));
        $this->add($fullname);

        $email = new Text("email");
        $email->setLabel("Email");
        $email->setFilters(array('striptags', 'string'));
        $email->addValidators(array(
            new PresenceOf(array(
                'message' => 'Email is required'
            ))
        ));
        $this->add($email);

        $address = new Text("address");
        $address->setLabel("Address");
        $address->setFilters(array('striptags', 'string'));
        $address->addValidators(array(
            new PresenceOf(array(
                'message' => 'Address is required'
            ))
        ));
        $this->add($address);
        

        $telephone = new Text("telephone");
        $telephone->setLabel("Telephone");
        $telephone->setFilters(array('striptags', 'string'));
        $telephone->addValidators(array(
            new PresenceOf(array(
                'message' => 'Telephone is required'
            )),
           new Regex(array(
            "message" => "The telephone is required",
            "pattern" => "/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/"
           ))
        ));
        $this->add($telephone);
    }

}