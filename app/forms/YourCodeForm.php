<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Date;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;

class YourcodeForm extends Form
{

    /**
     * Initialize the companies form
     */
    public function initialize($entity = null, $options = array())
    {

        if (!isset($options['edit'])) {
            $element = new Numeric("id");
            $this->add($element->setLabel("Your Code Number"));
        } else {
            $this->add(new Hidden("id"));
        }
        $userid = new Numeric("userId");
        $userid->setLabel("User Id");
        $userid->setFilters(array('striptags', 'string'));
        $userid->addValidators(array(
            new PresenceOf(array(
                'message' => 'User Id is required'
            ))
        ));
        $this->add($userid);

        $codeid = new Numeric("codeId");
        $codeid->setLabel("Snippet Code ID");
        $codeid->setFilters(array('striptags', 'string'));
        $codeid->addValidators(array(
            new PresenceOf(array(
                'message' => 'Snippet Code is required'
            ))
        ));
        $this->add($codeid);

        $dateadded = new Date("dateAdded");
        $dateadded->setLabel("Account Date Add");
        $dateadded->setFilters(array('striptags', 'string'));
        $dateadded->addValidators(array(
            new PresenceOf(array(
                'message' => 'Dateis required'
            ))
        ));
        $this->add($dateadded);

        $obs = new Text("obs");
        $obs->setLabel("Observations");
        $obs->setFilters(array('striptags', 'string'));
        $obs->addValidators(array(
            new PresenceOf(array(
                'message' => 'Observations is required'
            ))
        ));
        $this->add($obs);

        $status = new Text("status");
        $status->setLabel("status");
        $status->setFilters(array('striptags', 'string'));
        $status->addValidators(array(
            new PresenceOf(array(
                'message' => 'Status is required'
            ))
        ));
        $this->add($status);
    }

}