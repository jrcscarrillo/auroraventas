<?php

use \Phalcon\Forms\Form;
use \Phalcon\Forms\Element\Text;
use \Phalcon\Forms\Element\Password;
use \Phalcon\Forms\Element\Select;
use \Phalcon\Validation\Validator\PresenceOf;
use \Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Uniqueness;

class RegistrarteForm extends Form
{

    public function initialize($entity = null, $options = null)
    {
/**
 *  Utilizando el metodo ya definido en el modelo de la tabla codetype
 *  solo pedimos los campos type que tiene la descripcion del elemento
 *  y codeValue que tiene el valor que se guarda en la base de datos
 */
        $tipos = Codetype::find([
            "columns" => "type, codeValue",
            "conditions" => "tipoCod = ?1",
            "bind"       => [1 => "USER"]
           ]); 
/**
 *  en la variable $tipoAdd guardamos los parametros de la seleciion del tipo de usuario
 */
        $tipoAdd = new Select(
           'tipo',
           $tipos,
           [
              'using'      => [
                 'codeValue',
                 'type',
                 ]
              ]
           );

        $this->add($tipoAdd);
       
        $ids = Codetype::find([
            "columns" => "type, codeValue",
            "conditions" => "tipoCod = ?1",
            "bind"       => [1 => "DOCID"]
           ]); 
/**
 *  en la variable $tipoAdd guardamos los parametros de la seleciion del tipo de usuario
 */
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
        
        // Numero de identificacion junto con el tipo debera ser validado en la base de datos de la empresa
        $numeroId = new Text('numeroId');
        $numeroId->setLabel('Numero Identificacion');
        $numeroId->setFilters(array('striptags', 'string'));
        $numeroId->addValidators(array(
            new PresenceOf(array(
                'message' => 'Numero de identificacion es necesario'
            ))
        ));
        $this->add($numeroId);

        // Name
        $name = new Text('name');
        $name->setLabel('Nombres o Razon Social');
        $name->setFilters(array('alpha'));
        $name->addValidators(array(
            new PresenceOf(array(
                'message' => 'Ingrese sus nombres o la razon social de la empresa'
            )),
           new Uniqueness(array(
              'message' => 'Los nombres o la razon social ya existen'
           ))
        ));
        $this->add($name);

        // Name
        $username = new Text('username');
        $username->setLabel('Nombre de Usuario');
        $username->setFilters(array('alpha'));
        $username->addValidators(array(
            new PresenceOf(array(
                'message' => 'Ingrese la identificacion de usuario deseada'
            )),
           new Uniqueness(array(
              'message' => 'Este nombre de usuario ya existe'
           ))
        ));
        $this->add($username);

        // Email
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

        // Password
        $password = new Password('password');
        $password->setLabel('Password');
        $password->addValidators(array(
            new PresenceOf(array(
                'message' => 'Password es necesaria'
            ))
        ));
        $this->add($password);

        // Confirm Password
        $repeatPassword = new Password('repeatPassword');
        $repeatPassword->setLabel('Repeat Password');
        $repeatPassword->addValidators(array(
            new PresenceOf(array(
                'message' => 'Confirmar la password es necesario -esta invalida-'
            ))
        ));
        $this->add($repeatPassword);
    }

    
    }