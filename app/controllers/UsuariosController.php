<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class UsuariosController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for usuarios
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Usuarios', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "ListID";

        $usuarios = Usuarios::find($parameters);
        if (count($usuarios) == 0) {
            $this->flash->notice("The search did not find any usuarios");

            $this->dispatcher->forward([
                "controller" => "usuarios",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $usuarios,
            'limit'=> 10,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a usuario
     *
     * @param string $ListID
     */
    public function editAction($ListID)
    {
        if (!$this->request->isPost()) {

            $usuario = Usuarios::findFirstByListID($ListID);
            if (!$usuario) {
                $this->flash->error("usuario was not found");

                $this->dispatcher->forward([
                    'controller' => "usuarios",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->ListID = $usuario->ListID;

            $this->tag->setDefault("ListID", $usuario->ListID);
            $this->tag->setDefault("TimeCreated", $usuario->TimeCreated);
            $this->tag->setDefault("TimeModified", $usuario->TimeModified);
            $this->tag->setDefault("EditSequence", $usuario->EditSequence);
            $this->tag->setDefault("UserName", $usuario->UserName);
            $this->tag->setDefault("FullName", $usuario->FullName);
            $this->tag->setDefault("IsActive", $usuario->IsActive);
            $this->tag->setDefault("ClassRef_ListID", $usuario->ClassRef_ListID);
            $this->tag->setDefault("ClassRef_FullName", $usuario->ClassRef_FullName);
            $this->tag->setDefault("ParentRef_ListID", $usuario->ParentRef_ListID);
            $this->tag->setDefault("ParentRef_FullName", $usuario->ParentRef_FullName);
            $this->tag->setDefault("Sublevel", $usuario->Sublevel);
            $this->tag->setDefault("CompanyName", $usuario->CompanyName);
            $this->tag->setDefault("Salutation", $usuario->Salutation);
            $this->tag->setDefault("FirstName", $usuario->FirstName);
            $this->tag->setDefault("MiddleName", $usuario->MiddleName);
            $this->tag->setDefault("LastName", $usuario->LastName);
            $this->tag->setDefault("Password", $usuario->Password);
            $this->tag->setDefault("BillAddress_Addr1", $usuario->BillAddress_Addr1);
            $this->tag->setDefault("BillAddress_Addr2", $usuario->BillAddress_Addr2);
            $this->tag->setDefault("BillAddress_Addr3", $usuario->BillAddress_Addr3);
            $this->tag->setDefault("BillAddress_Addr4", $usuario->BillAddress_Addr4);
            $this->tag->setDefault("BillAddress_Addr5", $usuario->BillAddress_Addr5);
            $this->tag->setDefault("BillAddress_City", $usuario->BillAddress_City);
            $this->tag->setDefault("BillAddress_State", $usuario->BillAddress_State);
            $this->tag->setDefault("BillAddress_PostalCode", $usuario->BillAddress_PostalCode);
            $this->tag->setDefault("BillAddress_Country", $usuario->BillAddress_Country);
            $this->tag->setDefault("BillAddress_Note", $usuario->BillAddress_Note);
            $this->tag->setDefault("PrintAs", $usuario->PrintAs);
            $this->tag->setDefault("Phone", $usuario->Phone);
            $this->tag->setDefault("Mobile", $usuario->Mobile);
            $this->tag->setDefault("Pager", $usuario->Pager);
            $this->tag->setDefault("AltPhone", $usuario->AltPhone);
            $this->tag->setDefault("Fax", $usuario->Fax);
            $this->tag->setDefault("Email", $usuario->Email);
            $this->tag->setDefault("Cc", $usuario->Cc);
            $this->tag->setDefault("Contact", $usuario->Contact);
            $this->tag->setDefault("AltContact", $usuario->AltContact);
            $this->tag->setDefault("CustomerTypeRef_ListID", $usuario->CustomerTypeRef_ListID);
            $this->tag->setDefault("CustomerTypeRef_FullName", $usuario->CustomerTypeRef_FullName);
            $this->tag->setDefault("TermsRef_ListID", $usuario->TermsRef_ListID);
            $this->tag->setDefault("TermsRef_FullName", $usuario->TermsRef_FullName);
            $this->tag->setDefault("SalesRepRef_ListID", $usuario->SalesRepRef_ListID);
            $this->tag->setDefault("SalesRepRef_FullName", $usuario->SalesRepRef_FullName);
            $this->tag->setDefault("Balance", $usuario->Balance);
            $this->tag->setDefault("TotalBalance", $usuario->TotalBalance);
            $this->tag->setDefault("CreditLimit", $usuario->CreditLimit);
            $this->tag->setDefault("TipoID", $usuario->TipoID);
            $this->tag->setDefault("NumeroID", $usuario->NumeroID);
            $this->tag->setDefault("Notes", $usuario->Notes);
            $this->tag->setDefault("Status", $usuario->Status);
            
        }
    }

    /**
     * Creates a new usuario
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "usuarios",
                'action' => 'index'
            ]);

            return;
        }

        $usuario = new Usuarios();
        $usuario->Listid = $this->request->getPost("ListID");
        $usuario->Timecreated = $this->request->getPost("TimeCreated");
        $usuario->Timemodified = $this->request->getPost("TimeModified");
        $usuario->Editsequence = $this->request->getPost("EditSequence");
        $usuario->Username = $this->request->getPost("UserName");
        $usuario->Fullname = $this->request->getPost("FullName");
        $usuario->Isactive = $this->request->getPost("IsActive");
        $usuario->Classref_listid = $this->request->getPost("ClassRef_ListID");
        $usuario->Classref_fullname = $this->request->getPost("ClassRef_FullName");
        $usuario->Parentref_listid = $this->request->getPost("ParentRef_ListID");
        $usuario->Parentref_fullname = $this->request->getPost("ParentRef_FullName");
        $usuario->Sublevel = $this->request->getPost("Sublevel");
        $usuario->Companyname = $this->request->getPost("CompanyName");
        $usuario->Salutation = $this->request->getPost("Salutation");
        $usuario->Firstname = $this->request->getPost("FirstName");
        $usuario->Middlename = $this->request->getPost("MiddleName");
        $usuario->Lastname = $this->request->getPost("LastName");
        $usuario->Password = $this->request->getPost("Password");
        $usuario->Billaddress_addr1 = $this->request->getPost("BillAddress_Addr1");
        $usuario->Billaddress_addr2 = $this->request->getPost("BillAddress_Addr2");
        $usuario->Billaddress_addr3 = $this->request->getPost("BillAddress_Addr3");
        $usuario->Billaddress_addr4 = $this->request->getPost("BillAddress_Addr4");
        $usuario->Billaddress_addr5 = $this->request->getPost("BillAddress_Addr5");
        $usuario->Billaddress_city = $this->request->getPost("BillAddress_City");
        $usuario->Billaddress_state = $this->request->getPost("BillAddress_State");
        $usuario->Billaddress_postalcode = $this->request->getPost("BillAddress_PostalCode");
        $usuario->Billaddress_country = $this->request->getPost("BillAddress_Country");
        $usuario->Billaddress_note = $this->request->getPost("BillAddress_Note");
        $usuario->Printas = $this->request->getPost("PrintAs");
        $usuario->Phone = $this->request->getPost("Phone");
        $usuario->Mobile = $this->request->getPost("Mobile");
        $usuario->Pager = $this->request->getPost("Pager");
        $usuario->Altphone = $this->request->getPost("AltPhone");
        $usuario->Fax = $this->request->getPost("Fax");
        $usuario->Email = $this->request->getPost("Email");
        $usuario->Cc = $this->request->getPost("Cc");
        $usuario->Contact = $this->request->getPost("Contact");
        $usuario->Altcontact = $this->request->getPost("AltContact");
        $usuario->Customertyperef_listid = $this->request->getPost("CustomerTypeRef_ListID");
        $usuario->Customertyperef_fullname = $this->request->getPost("CustomerTypeRef_FullName");
        $usuario->Termsref_listid = $this->request->getPost("TermsRef_ListID");
        $usuario->Termsref_fullname = $this->request->getPost("TermsRef_FullName");
        $usuario->Salesrepref_listid = $this->request->getPost("SalesRepRef_ListID");
        $usuario->Salesrepref_fullname = $this->request->getPost("SalesRepRef_FullName");
        $usuario->Balance = $this->request->getPost("Balance");
        $usuario->Totalbalance = $this->request->getPost("TotalBalance");
        $usuario->Creditlimit = $this->request->getPost("CreditLimit");
        $usuario->Tipoid = $this->request->getPost("TipoID");
        $usuario->Numeroid = $this->request->getPost("NumeroID");
        $usuario->Notes = $this->request->getPost("Notes");
        $usuario->Status = $this->request->getPost("Status");
        

        if (!$usuario->save()) {
            foreach ($usuario->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "usuarios",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("usuario was created successfully");

        $this->dispatcher->forward([
            'controller' => "usuarios",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a usuario edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "usuarios",
                'action' => 'index'
            ]);

            return;
        }

        $ListID = $this->request->getPost("ListID");
        $usuario = Usuarios::findFirstByListID($ListID);

        if (!$usuario) {
            $this->flash->error("usuario does not exist " . $ListID);

            $this->dispatcher->forward([
                'controller' => "usuarios",
                'action' => 'index'
            ]);

            return;
        }

        $usuario->Listid = $this->request->getPost("ListID");
        $usuario->Timecreated = $this->request->getPost("TimeCreated");
        $usuario->Timemodified = $this->request->getPost("TimeModified");
        $usuario->Editsequence = $this->request->getPost("EditSequence");
        $usuario->Username = $this->request->getPost("UserName");
        $usuario->Fullname = $this->request->getPost("FullName");
        $usuario->Isactive = $this->request->getPost("IsActive");
        $usuario->Classref_listid = $this->request->getPost("ClassRef_ListID");
        $usuario->Classref_fullname = $this->request->getPost("ClassRef_FullName");
        $usuario->Parentref_listid = $this->request->getPost("ParentRef_ListID");
        $usuario->Parentref_fullname = $this->request->getPost("ParentRef_FullName");
        $usuario->Sublevel = $this->request->getPost("Sublevel");
        $usuario->Companyname = $this->request->getPost("CompanyName");
        $usuario->Salutation = $this->request->getPost("Salutation");
        $usuario->Firstname = $this->request->getPost("FirstName");
        $usuario->Middlename = $this->request->getPost("MiddleName");
        $usuario->Lastname = $this->request->getPost("LastName");
        $usuario->Password = $this->request->getPost("Password");
        $usuario->Billaddress_addr1 = $this->request->getPost("BillAddress_Addr1");
        $usuario->Billaddress_addr2 = $this->request->getPost("BillAddress_Addr2");
        $usuario->Billaddress_addr3 = $this->request->getPost("BillAddress_Addr3");
        $usuario->Billaddress_addr4 = $this->request->getPost("BillAddress_Addr4");
        $usuario->Billaddress_addr5 = $this->request->getPost("BillAddress_Addr5");
        $usuario->Billaddress_city = $this->request->getPost("BillAddress_City");
        $usuario->Billaddress_state = $this->request->getPost("BillAddress_State");
        $usuario->Billaddress_postalcode = $this->request->getPost("BillAddress_PostalCode");
        $usuario->Billaddress_country = $this->request->getPost("BillAddress_Country");
        $usuario->Billaddress_note = $this->request->getPost("BillAddress_Note");
        $usuario->Printas = $this->request->getPost("PrintAs");
        $usuario->Phone = $this->request->getPost("Phone");
        $usuario->Mobile = $this->request->getPost("Mobile");
        $usuario->Pager = $this->request->getPost("Pager");
        $usuario->Altphone = $this->request->getPost("AltPhone");
        $usuario->Fax = $this->request->getPost("Fax");
        $usuario->Email = $this->request->getPost("Email");
        $usuario->Cc = $this->request->getPost("Cc");
        $usuario->Contact = $this->request->getPost("Contact");
        $usuario->Altcontact = $this->request->getPost("AltContact");
        $usuario->Customertyperef_listid = $this->request->getPost("CustomerTypeRef_ListID");
        $usuario->Customertyperef_fullname = $this->request->getPost("CustomerTypeRef_FullName");
        $usuario->Termsref_listid = $this->request->getPost("TermsRef_ListID");
        $usuario->Termsref_fullname = $this->request->getPost("TermsRef_FullName");
        $usuario->Salesrepref_listid = $this->request->getPost("SalesRepRef_ListID");
        $usuario->Salesrepref_fullname = $this->request->getPost("SalesRepRef_FullName");
        $usuario->Balance = $this->request->getPost("Balance");
        $usuario->Totalbalance = $this->request->getPost("TotalBalance");
        $usuario->Creditlimit = $this->request->getPost("CreditLimit");
        $usuario->Tipoid = $this->request->getPost("TipoID");
        $usuario->Numeroid = $this->request->getPost("NumeroID");
        $usuario->Notes = $this->request->getPost("Notes");
        $usuario->Status = $this->request->getPost("Status");
        

        if (!$usuario->save()) {

            foreach ($usuario->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "usuarios",
                'action' => 'edit',
                'params' => [$usuario->ListID]
            ]);

            return;
        }

        $this->flash->success("usuario was updated successfully");

        $this->dispatcher->forward([
            'controller' => "usuarios",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a usuario
     *
     * @param string $ListID
     */
    public function deleteAction($ListID)
    {
        $usuario = Usuarios::findFirstByListID($ListID);
        if (!$usuario) {
            $this->flash->error("usuario was not found");

            $this->dispatcher->forward([
                'controller' => "usuarios",
                'action' => 'index'
            ]);

            return;
        }

        if (!$usuario->delete()) {

            foreach ($usuario->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "usuarios",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("usuario was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "usuarios",
            'action' => "index"
        ]);
    }

}
