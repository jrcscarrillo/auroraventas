<?php

/**
 * ContactController
 *
 * Allows to contact the staff using a contact form
 */
class ContactController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Comunicarse');
        parent::initialize();
    }

    public function indexventasAction()
    {
        $this->view->form = new ContactForm;
    }

    /**
     * Saves the contact information in the database
     */
    public function sendAction()
    {
        if ($this->request->isPost() != true) {
            return $this->dispatcher->forward(
                [
                    "controller" => "contact",
                    "action"     => "indexventas",
                ]
            );
        }

        $form = new ContactForm;
        $contact = new Contact();

        // Validate the form
        $data = $this->request->getPost();
        if (!$form->isValid($data, $contact)) {
            foreach ($form->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                [
                    "controller" => "contact",
                    "action"     => "indexventas",
                ]
            );
        }

        if ($contact->save() == false) {
            foreach ($contact->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                [
                    "controller" => "contact",
                    "action"     => "indexventas",
                ]
            );
        }

        $this->flash->success('Gracias, le contactaremos en las proximas horas');
        var_dump($_SESSION);
        var_dump($_SERVER);
        var_dump($_POST);
        return $this->dispatcher->forward(
            [
                "controller" => "index",
                "action"     => "index",
            ]
        );
    }
}
