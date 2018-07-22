<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Uniqueness;
use Phalcon\Validation\Validator\StringLength;

class RouteNewForm extends Form
{

    public function initialize($entity = null, $options = null)
    {
       
        $ids = Codetype::find([
            "columns" => "type, codeValue",
            "conditions" => "tipoCod = ?1",
            "bind"       => [1 => "DOCID"]
           ]); 

        $tipoId = new Select(
           'tipoId',
           $ids,
           [
              'using'      => [
                 'codeValue',
                 'type',
                 ]
              ]
           );
        $this->add($tipoId);
        
        $listID = new Text('listID');
        $listID->setFilters(array('striptags', 'string'));
        $this->add($listID);

        $numeroId = new Text('numeroId');
        $numeroId->setLabel('Numero Identificacion');
        $numeroId->setFilters(array('striptags', 'string'));
        $numeroId->addValidators(array(
            new PresenceOf(array(
                'message' => 'Numero de identificacion es necesario'
            ))
        ));
        $this->add($numeroId);

        $name = new Text('name');
        $name->setLabel('Descripcion Corta');
        $name->setFilters(array('alpha'));
        $name->addValidators(array(
            new PresenceOf(array(
                'message' => 'Ingrese sus nombres o la razon social o denominacion de la entidad'
            )),
           new Uniqueness(array(
              'message' => 'Los nombres o la razon social o denominacion de la entidad ya existen'
           ))
        ));
        $this->add($name);

        $description = new Text('description');
        $description->setLabel('Descripcion Larga');
        $description->setFilters(array('alpha'));
        $description->addValidators(array(
            new PresenceOf(array(
                'message' => 'Ingrese la Descripcion Larga deseada'
            )),
           new Uniqueness(array(
              'message' => 'Esta Descripcion Larga ya existe'
           ))
        ));
        $this->add($description);

        $email = new Text('email');
        $email->setLabel('E-Mail');
        $email->setFilters('email');
        $email->addValidators(array(
            new PresenceOf(array(
                'message' => 'La direccion de su correo electronico es necesaria'
            )),
            new Email(array(
                'message' => 'El formato de su direccion de correo es invalida'
            )),
           new Uniqueness(array(
              'message' => 'La direccion de correo electronico ya existe'
           ))
        ));
        $this->add($email);

        $address = new Text('address');
        $address->setLabel('address');
        $address->addValidators(array(
            new PresenceOf(array(
                'message' => 'La direccion es necesaria'
            ))
        ));
        $this->add($address);

        $phone = new Text('phone');
        $phone->setLabel('Telefono de Contacto');
        $phone->addValidators(array(
            new PresenceOf(array(
                'message' => 'Confirmar Telefono de Contacto'
            )),
           new StringLength(array(
              'message' => 'La longitud del campo es hasta 10 digitos'
           ))
        ));
        $this->add($phone);

        $customField1 = new Text('customField1');
        $customField1->setLabel('Notas');
        $customField1->addValidators(array(
            new PresenceOf(array(
                'message' => 'Confirmar Notas'
            ))
        ));
        $this->add($customField1);
    }

    
    }