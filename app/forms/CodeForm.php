<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Url as UrlValidator;

class CodeForm extends Form {

    public function initialize($entity = null, $options = array()) {

        if (!isset($options['edit'])) {
            $element = new Numeric("id");
            $this->add($element->setLabel("Code Number"));
        } else {
            $this->add(new Hidden("id"));
        }
        $developerId = new Numeric("developerId");
        $developerId->setLabel("Developer Id");
        $developerId->setFilters(array('striptags', 'string'));
        $developerId->addValidators(array(
           new PresenceOf(array(
              'message' => 'Developer Id is required'
              ))
        ));
        $this->add($developerId);

        $this->add(
           new Select(
           "typeId", Codetype::find(), [
           "using" => [
              "id",
              "type",
           ]
           ]
           )
        );

        $description = new Text("description");
        $description->setLabel("Description");
        $description->setFilters(array('striptags', 'string'));
        $description->addValidators(array(
           new PresenceOf(array(
              'message' => 'Description is required'
              ))
        ));
        $this->add($description);

        $file = new Text("file");
        $file->setLabel("File");
        $file->setFilters(array('striptags', 'string'));
        $file->addValidators(array(
           new PresenceOf(array(
              'message' => 'File is required'
              ))
        ));
        $this->add($file);

        $site = new Text("site");
        $site->setLabel("Site");
        $site->setFilters(array('striptags', 'string'));
        $site->addValidators(array(
           new PresenceOf(array(
              'message' => 'Url Site is required'
              )),
           new UrlValidator(array(
              'message' => 'url must be a url'
              ))
        ));
        $this->add($site);
    }

}
