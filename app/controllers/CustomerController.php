<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class CustomerController extends ControllerBase
{

    public function initialize() {
        $this->tag->setTitle('Clientes');
        parent::initialize();
    }

    public function indexAction() {
        $this->session->conditions = null;
        $this->view->form = new CustomerSearchForm;
    }

    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Customer', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "ListID";

        $customer = Customer::find($parameters);
        if (count($customer) == 0) {
            $this->flash->notice("No se han encontrado clientes");

            $this->dispatcher->forward([
                "controller" => "customer",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $customer,
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
     * Edits a customer
     *
     * @param string $ListID
     */
    public function editAction($ListID)
    {
        if (!$this->request->isPost()) {

            $customer = Customer::findFirstByListID($ListID);
            if (!$customer) {
                $this->flash->error("customer was not found");

                $this->dispatcher->forward([
                    'controller' => "customer",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->ListID = $customer->ListID;

            $this->tag->setDefault("ListID", $customer->ListID);
            $this->tag->setDefault("TimeCreated", $customer->TimeCreated);
            $this->tag->setDefault("TimeModified", $customer->TimeModified);
            $this->tag->setDefault("EditSequence", $customer->EditSequence);
            $this->tag->setDefault("Name", $customer->Name);
            $this->tag->setDefault("FullName", $customer->FullName);
            $this->tag->setDefault("IsActive", $customer->IsActive);
            $this->tag->setDefault("ClassRef_ListID", $customer->ClassRef_ListID);
            $this->tag->setDefault("ClassRef_FullName", $customer->ClassRef_FullName);
            $this->tag->setDefault("ParentRef_ListID", $customer->ParentRef_ListID);
            $this->tag->setDefault("ParentRef_FullName", $customer->ParentRef_FullName);
            $this->tag->setDefault("Sublevel", $customer->Sublevel);
            $this->tag->setDefault("CompanyName", $customer->CompanyName);
            $this->tag->setDefault("Salutation", $customer->Salutation);
            $this->tag->setDefault("FirstName", $customer->FirstName);
            $this->tag->setDefault("MiddleName", $customer->MiddleName);
            $this->tag->setDefault("LastName", $customer->LastName);
            $this->tag->setDefault("Suffix", $customer->Suffix);
            $this->tag->setDefault("BillAddress_Addr1", $customer->BillAddress_Addr1);
            $this->tag->setDefault("BillAddress_Addr2", $customer->BillAddress_Addr2);
            $this->tag->setDefault("BillAddress_Addr3", $customer->BillAddress_Addr3);
            $this->tag->setDefault("BillAddress_Addr4", $customer->BillAddress_Addr4);
            $this->tag->setDefault("BillAddress_Addr5", $customer->BillAddress_Addr5);
            $this->tag->setDefault("BillAddress_City", $customer->BillAddress_City);
            $this->tag->setDefault("BillAddress_State", $customer->BillAddress_State);
            $this->tag->setDefault("BillAddress_PostalCode", $customer->BillAddress_PostalCode);
            $this->tag->setDefault("BillAddress_Country", $customer->BillAddress_Country);
            $this->tag->setDefault("BillAddress_Note", $customer->BillAddress_Note);
            $this->tag->setDefault("ShipAddress_Addr1", $customer->ShipAddress_Addr1);
            $this->tag->setDefault("ShipAddress_Addr2", $customer->ShipAddress_Addr2);
            $this->tag->setDefault("ShipAddress_Addr3", $customer->ShipAddress_Addr3);
            $this->tag->setDefault("ShipAddress_Addr4", $customer->ShipAddress_Addr4);
            $this->tag->setDefault("ShipAddress_Addr5", $customer->ShipAddress_Addr5);
            $this->tag->setDefault("ShipAddress_City", $customer->ShipAddress_City);
            $this->tag->setDefault("ShipAddress_State", $customer->ShipAddress_State);
            $this->tag->setDefault("ShipAddress_PostalCode", $customer->ShipAddress_PostalCode);
            $this->tag->setDefault("ShipAddress_Country", $customer->ShipAddress_Country);
            $this->tag->setDefault("ShipAddress_Note", $customer->ShipAddress_Note);
            $this->tag->setDefault("PrintAs", $customer->PrintAs);
            $this->tag->setDefault("Phone", $customer->Phone);
            $this->tag->setDefault("Mobile", $customer->Mobile);
            $this->tag->setDefault("Pager", $customer->Pager);
            $this->tag->setDefault("AltPhone", $customer->AltPhone);
            $this->tag->setDefault("Fax", $customer->Fax);
            $this->tag->setDefault("Email", $customer->Email);
            $this->tag->setDefault("Cc", $customer->Cc);
            $this->tag->setDefault("Contact", $customer->Contact);
            $this->tag->setDefault("AltContact", $customer->AltContact);
            $this->tag->setDefault("CustomerTypeRef_ListID", $customer->CustomerTypeRef_ListID);
            $this->tag->setDefault("CustomerTypeRef_FullName", $customer->CustomerTypeRef_FullName);
            $this->tag->setDefault("TermsRef_ListID", $customer->TermsRef_ListID);
            $this->tag->setDefault("TermsRef_FullName", $customer->TermsRef_FullName);
            $this->tag->setDefault("SalesRepRef_ListID", $customer->SalesRepRef_ListID);
            $this->tag->setDefault("SalesRepRef_FullName", $customer->SalesRepRef_FullName);
            $this->tag->setDefault("Balance", $customer->Balance);
            $this->tag->setDefault("TotalBalance", $customer->TotalBalance);
            $this->tag->setDefault("SalesTaxCodeRef_ListID", $customer->SalesTaxCodeRef_ListID);
            $this->tag->setDefault("SalesTaxCodeRef_FullName", $customer->SalesTaxCodeRef_FullName);
            $this->tag->setDefault("ItemSalesTaxRef_ListID", $customer->ItemSalesTaxRef_ListID);
            $this->tag->setDefault("ItemSalesTaxRef_FullName", $customer->ItemSalesTaxRef_FullName);
            $this->tag->setDefault("SalesTaxCountry", $customer->SalesTaxCountry);
            $this->tag->setDefault("ResaleNumber", $customer->ResaleNumber);
            $this->tag->setDefault("AccountNumber", $customer->AccountNumber);
            $this->tag->setDefault("CreditLimit", $customer->CreditLimit);
            $this->tag->setDefault("PreferredPaymentMethodRef_ListID", $customer->PreferredPaymentMethodRef_ListID);
            $this->tag->setDefault("PreferredPaymentMethodRef_FullName", $customer->PreferredPaymentMethodRef_FullName);
            $this->tag->setDefault("CreditCardNumber", $customer->CreditCardNumber);
            $this->tag->setDefault("ExpirationMonth", $customer->ExpirationMonth);
            $this->tag->setDefault("ExpirationYear", $customer->ExpirationYear);
            $this->tag->setDefault("NameOnCard", $customer->NameOnCard);
            $this->tag->setDefault("CreditCardAddress", $customer->CreditCardAddress);
            $this->tag->setDefault("CreditCardPostalCode", $customer->CreditCardPostalCode);
            $this->tag->setDefault("JobStatus", $customer->JobStatus);
            $this->tag->setDefault("JobStartDate", $customer->JobStartDate);
            $this->tag->setDefault("JobProjectedEndDate", $customer->JobProjectedEndDate);
            $this->tag->setDefault("JobEndDate", $customer->JobEndDate);
            $this->tag->setDefault("JobDesc", $customer->JobDesc);
            $this->tag->setDefault("JobTypeRef_ListID", $customer->JobTypeRef_ListID);
            $this->tag->setDefault("JobTypeRef_FullName", $customer->JobTypeRef_FullName);
            $this->tag->setDefault("Notes", $customer->Notes);
            $this->tag->setDefault("PriceLevelRef_ListID", $customer->PriceLevelRef_ListID);
            $this->tag->setDefault("PriceLevelRef_FullName", $customer->PriceLevelRef_FullName);
            $this->tag->setDefault("TaxRegistrationNumber", $customer->TaxRegistrationNumber);
            $this->tag->setDefault("CurrencyRef_ListID", $customer->CurrencyRef_ListID);
            $this->tag->setDefault("CurrencyRef_FullName", $customer->CurrencyRef_FullName);
            $this->tag->setDefault("IsStatementWithParent", $customer->IsStatementWithParent);
            $this->tag->setDefault("PreferredDeliveryMethod", $customer->PreferredDeliveryMethod);
            $this->tag->setDefault("CustomField1", $customer->CustomField1);
            $this->tag->setDefault("CustomField2", $customer->CustomField2);
            $this->tag->setDefault("CustomField3", $customer->CustomField3);
            $this->tag->setDefault("CustomField4", $customer->CustomField4);
            $this->tag->setDefault("CustomField5", $customer->CustomField5);
            $this->tag->setDefault("CustomField6", $customer->CustomField6);
            $this->tag->setDefault("CustomField7", $customer->CustomField7);
            $this->tag->setDefault("CustomField8", $customer->CustomField8);
            $this->tag->setDefault("CustomField9", $customer->CustomField9);
            $this->tag->setDefault("CustomField10", $customer->CustomField10);
            $this->tag->setDefault("CustomField11", $customer->CustomField11);
            $this->tag->setDefault("CustomField12", $customer->CustomField12);
            $this->tag->setDefault("CustomField13", $customer->CustomField13);
            $this->tag->setDefault("CustomField14", $customer->CustomField14);
            $this->tag->setDefault("CustomField15", $customer->CustomField15);
            $this->tag->setDefault("Status", $customer->Status);
            
        }
    }

    /**
     * Creates a new customer
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "customer",
                'action' => 'index'
            ]);

            return;
        }

        $customer = new Customer();
        $customer->Listid = $this->request->getPost("ListID");
        $customer->Timecreated = $this->request->getPost("TimeCreated");
        $customer->Timemodified = $this->request->getPost("TimeModified");
        $customer->Editsequence = $this->request->getPost("EditSequence");
        $customer->Name = $this->request->getPost("Name");
        $customer->Fullname = $this->request->getPost("FullName");
        $customer->Isactive = $this->request->getPost("IsActive");
        $customer->Classref_listid = $this->request->getPost("ClassRef_ListID");
        $customer->Classref_fullname = $this->request->getPost("ClassRef_FullName");
        $customer->Parentref_listid = $this->request->getPost("ParentRef_ListID");
        $customer->Parentref_fullname = $this->request->getPost("ParentRef_FullName");
        $customer->Sublevel = $this->request->getPost("Sublevel");
        $customer->Companyname = $this->request->getPost("CompanyName");
        $customer->Salutation = $this->request->getPost("Salutation");
        $customer->Firstname = $this->request->getPost("FirstName");
        $customer->Middlename = $this->request->getPost("MiddleName");
        $customer->Lastname = $this->request->getPost("LastName");
        $customer->Suffix = $this->request->getPost("Suffix");
        $customer->Billaddress_addr1 = $this->request->getPost("BillAddress_Addr1");
        $customer->Billaddress_addr2 = $this->request->getPost("BillAddress_Addr2");
        $customer->Billaddress_addr3 = $this->request->getPost("BillAddress_Addr3");
        $customer->Billaddress_addr4 = $this->request->getPost("BillAddress_Addr4");
        $customer->Billaddress_addr5 = $this->request->getPost("BillAddress_Addr5");
        $customer->Billaddress_city = $this->request->getPost("BillAddress_City");
        $customer->Billaddress_state = $this->request->getPost("BillAddress_State");
        $customer->Billaddress_postalcode = $this->request->getPost("BillAddress_PostalCode");
        $customer->Billaddress_country = $this->request->getPost("BillAddress_Country");
        $customer->Billaddress_note = $this->request->getPost("BillAddress_Note");
        $customer->Shipaddress_addr1 = $this->request->getPost("ShipAddress_Addr1");
        $customer->Shipaddress_addr2 = $this->request->getPost("ShipAddress_Addr2");
        $customer->Shipaddress_addr3 = $this->request->getPost("ShipAddress_Addr3");
        $customer->Shipaddress_addr4 = $this->request->getPost("ShipAddress_Addr4");
        $customer->Shipaddress_addr5 = $this->request->getPost("ShipAddress_Addr5");
        $customer->Shipaddress_city = $this->request->getPost("ShipAddress_City");
        $customer->Shipaddress_state = $this->request->getPost("ShipAddress_State");
        $customer->Shipaddress_postalcode = $this->request->getPost("ShipAddress_PostalCode");
        $customer->Shipaddress_country = $this->request->getPost("ShipAddress_Country");
        $customer->Shipaddress_note = $this->request->getPost("ShipAddress_Note");
        $customer->Printas = $this->request->getPost("PrintAs");
        $customer->Phone = $this->request->getPost("Phone");
        $customer->Mobile = $this->request->getPost("Mobile");
        $customer->Pager = $this->request->getPost("Pager");
        $customer->Altphone = $this->request->getPost("AltPhone");
        $customer->Fax = $this->request->getPost("Fax");
        $customer->Email = $this->request->getPost("Email");
        $customer->Cc = $this->request->getPost("Cc");
        $customer->Contact = $this->request->getPost("Contact");
        $customer->Altcontact = $this->request->getPost("AltContact");
        $customer->Customertyperef_listid = $this->request->getPost("CustomerTypeRef_ListID");
        $customer->Customertyperef_fullname = $this->request->getPost("CustomerTypeRef_FullName");
        $customer->Termsref_listid = $this->request->getPost("TermsRef_ListID");
        $customer->Termsref_fullname = $this->request->getPost("TermsRef_FullName");
        $customer->Salesrepref_listid = $this->request->getPost("SalesRepRef_ListID");
        $customer->Salesrepref_fullname = $this->request->getPost("SalesRepRef_FullName");
        $customer->Balance = $this->request->getPost("Balance");
        $customer->Totalbalance = $this->request->getPost("TotalBalance");
        $customer->Salestaxcoderef_listid = $this->request->getPost("SalesTaxCodeRef_ListID");
        $customer->Salestaxcoderef_fullname = $this->request->getPost("SalesTaxCodeRef_FullName");
        $customer->Itemsalestaxref_listid = $this->request->getPost("ItemSalesTaxRef_ListID");
        $customer->Itemsalestaxref_fullname = $this->request->getPost("ItemSalesTaxRef_FullName");
        $customer->Salestaxcountry = $this->request->getPost("SalesTaxCountry");
        $customer->Resalenumber = $this->request->getPost("ResaleNumber");
        $customer->Accountnumber = $this->request->getPost("AccountNumber");
        $customer->Creditlimit = $this->request->getPost("CreditLimit");
        $customer->Preferredpaymentmethodref_listid = $this->request->getPost("PreferredPaymentMethodRef_ListID");
        $customer->Preferredpaymentmethodref_fullname = $this->request->getPost("PreferredPaymentMethodRef_FullName");
        $customer->Creditcardnumber = $this->request->getPost("CreditCardNumber");
        $customer->Expirationmonth = $this->request->getPost("ExpirationMonth");
        $customer->Expirationyear = $this->request->getPost("ExpirationYear");
        $customer->Nameoncard = $this->request->getPost("NameOnCard");
        $customer->Creditcardaddress = $this->request->getPost("CreditCardAddress");
        $customer->Creditcardpostalcode = $this->request->getPost("CreditCardPostalCode");
        $customer->Jobstatus = $this->request->getPost("JobStatus");
        $customer->Jobstartdate = $this->request->getPost("JobStartDate");
        $customer->Jobprojectedenddate = $this->request->getPost("JobProjectedEndDate");
        $customer->Jobenddate = $this->request->getPost("JobEndDate");
        $customer->Jobdesc = $this->request->getPost("JobDesc");
        $customer->Jobtyperef_listid = $this->request->getPost("JobTypeRef_ListID");
        $customer->Jobtyperef_fullname = $this->request->getPost("JobTypeRef_FullName");
        $customer->Notes = $this->request->getPost("Notes");
        $customer->Pricelevelref_listid = $this->request->getPost("PriceLevelRef_ListID");
        $customer->Pricelevelref_fullname = $this->request->getPost("PriceLevelRef_FullName");
        $customer->Taxregistrationnumber = $this->request->getPost("TaxRegistrationNumber");
        $customer->Currencyref_listid = $this->request->getPost("CurrencyRef_ListID");
        $customer->Currencyref_fullname = $this->request->getPost("CurrencyRef_FullName");
        $customer->Isstatementwithparent = $this->request->getPost("IsStatementWithParent");
        $customer->Preferreddeliverymethod = $this->request->getPost("PreferredDeliveryMethod");
        $customer->Customfield1 = $this->request->getPost("CustomField1");
        $customer->Customfield2 = $this->request->getPost("CustomField2");
        $customer->Customfield3 = $this->request->getPost("CustomField3");
        $customer->Customfield4 = $this->request->getPost("CustomField4");
        $customer->Customfield5 = $this->request->getPost("CustomField5");
        $customer->Customfield6 = $this->request->getPost("CustomField6");
        $customer->Customfield7 = $this->request->getPost("CustomField7");
        $customer->Customfield8 = $this->request->getPost("CustomField8");
        $customer->Customfield9 = $this->request->getPost("CustomField9");
        $customer->Customfield10 = $this->request->getPost("CustomField10");
        $customer->Customfield11 = $this->request->getPost("CustomField11");
        $customer->Customfield12 = $this->request->getPost("CustomField12");
        $customer->Customfield13 = $this->request->getPost("CustomField13");
        $customer->Customfield14 = $this->request->getPost("CustomField14");
        $customer->Customfield15 = $this->request->getPost("CustomField15");
        $customer->Status = $this->request->getPost("Status");
        

        if (!$customer->save()) {
            foreach ($customer->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "customer",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("customer was created successfully");

        $this->dispatcher->forward([
            'controller' => "customer",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a customer edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "customer",
                'action' => 'index'
            ]);

            return;
        }

        $ListID = $this->request->getPost("ListID");
        $customer = Customer::findFirstByListID($ListID);

        if (!$customer) {
            $this->flash->error("customer does not exist " . $ListID);

            $this->dispatcher->forward([
                'controller' => "customer",
                'action' => 'index'
            ]);

            return;
        }

        $customer->Listid = $this->request->getPost("ListID");
        $customer->Timecreated = $this->request->getPost("TimeCreated");
        $customer->Timemodified = $this->request->getPost("TimeModified");
        $customer->Editsequence = $this->request->getPost("EditSequence");
        $customer->Name = $this->request->getPost("Name");
        $customer->Fullname = $this->request->getPost("FullName");
        $customer->Isactive = $this->request->getPost("IsActive");
        $customer->Classref_listid = $this->request->getPost("ClassRef_ListID");
        $customer->Classref_fullname = $this->request->getPost("ClassRef_FullName");
        $customer->Parentref_listid = $this->request->getPost("ParentRef_ListID");
        $customer->Parentref_fullname = $this->request->getPost("ParentRef_FullName");
        $customer->Sublevel = $this->request->getPost("Sublevel");
        $customer->Companyname = $this->request->getPost("CompanyName");
        $customer->Salutation = $this->request->getPost("Salutation");
        $customer->Firstname = $this->request->getPost("FirstName");
        $customer->Middlename = $this->request->getPost("MiddleName");
        $customer->Lastname = $this->request->getPost("LastName");
        $customer->Suffix = $this->request->getPost("Suffix");
        $customer->Billaddress_addr1 = $this->request->getPost("BillAddress_Addr1");
        $customer->Billaddress_addr2 = $this->request->getPost("BillAddress_Addr2");
        $customer->Billaddress_addr3 = $this->request->getPost("BillAddress_Addr3");
        $customer->Billaddress_addr4 = $this->request->getPost("BillAddress_Addr4");
        $customer->Billaddress_addr5 = $this->request->getPost("BillAddress_Addr5");
        $customer->Billaddress_city = $this->request->getPost("BillAddress_City");
        $customer->Billaddress_state = $this->request->getPost("BillAddress_State");
        $customer->Billaddress_postalcode = $this->request->getPost("BillAddress_PostalCode");
        $customer->Billaddress_country = $this->request->getPost("BillAddress_Country");
        $customer->Billaddress_note = $this->request->getPost("BillAddress_Note");
        $customer->Shipaddress_addr1 = $this->request->getPost("ShipAddress_Addr1");
        $customer->Shipaddress_addr2 = $this->request->getPost("ShipAddress_Addr2");
        $customer->Shipaddress_addr3 = $this->request->getPost("ShipAddress_Addr3");
        $customer->Shipaddress_addr4 = $this->request->getPost("ShipAddress_Addr4");
        $customer->Shipaddress_addr5 = $this->request->getPost("ShipAddress_Addr5");
        $customer->Shipaddress_city = $this->request->getPost("ShipAddress_City");
        $customer->Shipaddress_state = $this->request->getPost("ShipAddress_State");
        $customer->Shipaddress_postalcode = $this->request->getPost("ShipAddress_PostalCode");
        $customer->Shipaddress_country = $this->request->getPost("ShipAddress_Country");
        $customer->Shipaddress_note = $this->request->getPost("ShipAddress_Note");
        $customer->Printas = $this->request->getPost("PrintAs");
        $customer->Phone = $this->request->getPost("Phone");
        $customer->Mobile = $this->request->getPost("Mobile");
        $customer->Pager = $this->request->getPost("Pager");
        $customer->Altphone = $this->request->getPost("AltPhone");
        $customer->Fax = $this->request->getPost("Fax");
        $customer->Email = $this->request->getPost("Email");
        $customer->Cc = $this->request->getPost("Cc");
        $customer->Contact = $this->request->getPost("Contact");
        $customer->Altcontact = $this->request->getPost("AltContact");
        $customer->Customertyperef_listid = $this->request->getPost("CustomerTypeRef_ListID");
        $customer->Customertyperef_fullname = $this->request->getPost("CustomerTypeRef_FullName");
        $customer->Termsref_listid = $this->request->getPost("TermsRef_ListID");
        $customer->Termsref_fullname = $this->request->getPost("TermsRef_FullName");
        $customer->Salesrepref_listid = $this->request->getPost("SalesRepRef_ListID");
        $customer->Salesrepref_fullname = $this->request->getPost("SalesRepRef_FullName");
        $customer->Balance = $this->request->getPost("Balance");
        $customer->Totalbalance = $this->request->getPost("TotalBalance");
        $customer->Salestaxcoderef_listid = $this->request->getPost("SalesTaxCodeRef_ListID");
        $customer->Salestaxcoderef_fullname = $this->request->getPost("SalesTaxCodeRef_FullName");
        $customer->Itemsalestaxref_listid = $this->request->getPost("ItemSalesTaxRef_ListID");
        $customer->Itemsalestaxref_fullname = $this->request->getPost("ItemSalesTaxRef_FullName");
        $customer->Salestaxcountry = $this->request->getPost("SalesTaxCountry");
        $customer->Resalenumber = $this->request->getPost("ResaleNumber");
        $customer->Accountnumber = $this->request->getPost("AccountNumber");
        $customer->Creditlimit = $this->request->getPost("CreditLimit");
        $customer->Preferredpaymentmethodref_listid = $this->request->getPost("PreferredPaymentMethodRef_ListID");
        $customer->Preferredpaymentmethodref_fullname = $this->request->getPost("PreferredPaymentMethodRef_FullName");
        $customer->Creditcardnumber = $this->request->getPost("CreditCardNumber");
        $customer->Expirationmonth = $this->request->getPost("ExpirationMonth");
        $customer->Expirationyear = $this->request->getPost("ExpirationYear");
        $customer->Nameoncard = $this->request->getPost("NameOnCard");
        $customer->Creditcardaddress = $this->request->getPost("CreditCardAddress");
        $customer->Creditcardpostalcode = $this->request->getPost("CreditCardPostalCode");
        $customer->Jobstatus = $this->request->getPost("JobStatus");
        $customer->Jobstartdate = $this->request->getPost("JobStartDate");
        $customer->Jobprojectedenddate = $this->request->getPost("JobProjectedEndDate");
        $customer->Jobenddate = $this->request->getPost("JobEndDate");
        $customer->Jobdesc = $this->request->getPost("JobDesc");
        $customer->Jobtyperef_listid = $this->request->getPost("JobTypeRef_ListID");
        $customer->Jobtyperef_fullname = $this->request->getPost("JobTypeRef_FullName");
        $customer->Notes = $this->request->getPost("Notes");
        $customer->Pricelevelref_listid = $this->request->getPost("PriceLevelRef_ListID");
        $customer->Pricelevelref_fullname = $this->request->getPost("PriceLevelRef_FullName");
        $customer->Taxregistrationnumber = $this->request->getPost("TaxRegistrationNumber");
        $customer->Currencyref_listid = $this->request->getPost("CurrencyRef_ListID");
        $customer->Currencyref_fullname = $this->request->getPost("CurrencyRef_FullName");
        $customer->Isstatementwithparent = $this->request->getPost("IsStatementWithParent");
        $customer->Preferreddeliverymethod = $this->request->getPost("PreferredDeliveryMethod");
        $customer->Customfield1 = $this->request->getPost("CustomField1");
        $customer->Customfield2 = $this->request->getPost("CustomField2");
        $customer->Customfield3 = $this->request->getPost("CustomField3");
        $customer->Customfield4 = $this->request->getPost("CustomField4");
        $customer->Customfield5 = $this->request->getPost("CustomField5");
        $customer->Customfield6 = $this->request->getPost("CustomField6");
        $customer->Customfield7 = $this->request->getPost("CustomField7");
        $customer->Customfield8 = $this->request->getPost("CustomField8");
        $customer->Customfield9 = $this->request->getPost("CustomField9");
        $customer->Customfield10 = $this->request->getPost("CustomField10");
        $customer->Customfield11 = $this->request->getPost("CustomField11");
        $customer->Customfield12 = $this->request->getPost("CustomField12");
        $customer->Customfield13 = $this->request->getPost("CustomField13");
        $customer->Customfield14 = $this->request->getPost("CustomField14");
        $customer->Customfield15 = $this->request->getPost("CustomField15");
        $customer->Status = $this->request->getPost("Status");
        

        if (!$customer->save()) {

            foreach ($customer->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "customer",
                'action' => 'edit',
                'params' => [$customer->ListID]
            ]);

            return;
        }

        $this->flash->success("customer was updated successfully");

        $this->dispatcher->forward([
            'controller' => "customer",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a customer
     *
     * @param string $ListID
     */
    public function deleteAction($ListID)
    {
        $customer = Customer::findFirstByListID($ListID);
        if (!$customer) {
            $this->flash->error("customer was not found");

            $this->dispatcher->forward([
                'controller' => "customer",
                'action' => 'index'
            ]);

            return;
        }

        if (!$customer->delete()) {

            foreach ($customer->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "customer",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("customer was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "customer",
            'action' => "index"
        ]);
    }

}
