<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;

class CodeTypeForm extends Form
{

    /**
     * Initialize the companies form
     */
    public function initialize($entity = null, $options = array())
    {

        if (!isset($options['edit'])) {
            $element = new Numeric("id");
            $this->add($element->setLabel("Code Type Number"));
        } else {
            $this->add(new Hidden("id"));
        }
        $type = new Text("type");
        $type->setLabel("Type of Code");
        $type->setFilters(array('striptags', 'string'));
        $type->addValidators(array(
            new PresenceOf(array(
                'message' => 'You must identify your code type'
            ))
        ));
        $this->add($type);

    }

}