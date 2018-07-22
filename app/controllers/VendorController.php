<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class VendorController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for vendor
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Vendor', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "ListID";

        $vendor = Vendor::find($parameters);
        if (count($vendor) == 0) {
            $this->flash->notice("The search did not find any vendor");

            $this->dispatcher->forward([
                "controller" => "vendor",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $vendor,
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
     * Edits a vendor
     *
     * @param string $ListID
     */
    public function editAction($ListID)
    {
        if (!$this->request->isPost()) {

            $vendor = Vendor::findFirstByListID($ListID);
            if (!$vendor) {
                $this->flash->error("vendor was not found");

                $this->dispatcher->forward([
                    'controller' => "vendor",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->ListID = $vendor->ListID;

            $this->tag->setDefault("ListID", $vendor->ListID);
            $this->tag->setDefault("TimeCreated", $vendor->TimeCreated);
            $this->tag->setDefault("TimeModified", $vendor->TimeModified);
            $this->tag->setDefault("EditSequence", $vendor->EditSequence);
            $this->tag->setDefault("Name", $vendor->Name);
            $this->tag->setDefault("IsActive", $vendor->IsActive);
            $this->tag->setDefault("ClassRef_ListID", $vendor->ClassRef_ListID);
            $this->tag->setDefault("ClassRef_FullName", $vendor->ClassRef_FullName);
            $this->tag->setDefault("CompanyName", $vendor->CompanyName);
            $this->tag->setDefault("Salutation", $vendor->Salutation);
            $this->tag->setDefault("FirstName", $vendor->FirstName);
            $this->tag->setDefault("MiddleName", $vendor->MiddleName);
            $this->tag->setDefault("LastName", $vendor->LastName);
            $this->tag->setDefault("JobTitle", $vendor->JobTitle);
            $this->tag->setDefault("Suffix", $vendor->Suffix);
            $this->tag->setDefault("VendorAddress_Addr1", $vendor->VendorAddress_Addr1);
            $this->tag->setDefault("VendorAddress_Addr2", $vendor->VendorAddress_Addr2);
            $this->tag->setDefault("VendorAddress_Addr3", $vendor->VendorAddress_Addr3);
            $this->tag->setDefault("VendorAddress_Addr4", $vendor->VendorAddress_Addr4);
            $this->tag->setDefault("VendorAddress_Addr5", $vendor->VendorAddress_Addr5);
            $this->tag->setDefault("VendorAddress_City", $vendor->VendorAddress_City);
            $this->tag->setDefault("VendorAddress_State", $vendor->VendorAddress_State);
            $this->tag->setDefault("VendorAddress_PostalCode", $vendor->VendorAddress_PostalCode);
            $this->tag->setDefault("VendorAddress_Country", $vendor->VendorAddress_Country);
            $this->tag->setDefault("VendorAddress_Note", $vendor->VendorAddress_Note);
            $this->tag->setDefault("ShipAddress_Addr1", $vendor->ShipAddress_Addr1);
            $this->tag->setDefault("ShipAddress_Addr2", $vendor->ShipAddress_Addr2);
            $this->tag->setDefault("ShipAddress_Addr3", $vendor->ShipAddress_Addr3);
            $this->tag->setDefault("ShipAddress_Addr4", $vendor->ShipAddress_Addr4);
            $this->tag->setDefault("ShipAddress_Addr5", $vendor->ShipAddress_Addr5);
            $this->tag->setDefault("ShipAddress_City", $vendor->ShipAddress_City);
            $this->tag->setDefault("ShipAddress_State", $vendor->ShipAddress_State);
            $this->tag->setDefault("ShipAddress_PostalCode", $vendor->ShipAddress_PostalCode);
            $this->tag->setDefault("ShipAddress_Country", $vendor->ShipAddress_Country);
            $this->tag->setDefault("ShipAddress_Note", $vendor->ShipAddress_Note);
            $this->tag->setDefault("Phone", $vendor->Phone);
            $this->tag->setDefault("Mobile", $vendor->Mobile);
            $this->tag->setDefault("Pager", $vendor->Pager);
            $this->tag->setDefault("AltPhone", $vendor->AltPhone);
            $this->tag->setDefault("Fax", $vendor->Fax);
            $this->tag->setDefault("Email", $vendor->Email);
            $this->tag->setDefault("Cc", $vendor->Cc);
            $this->tag->setDefault("Contact", $vendor->Contact);
            $this->tag->setDefault("AltContact", $vendor->AltContact);
            $this->tag->setDefault("NameOnCheck", $vendor->NameOnCheck);
            $this->tag->setDefault("Notes", $vendor->Notes);
            $this->tag->setDefault("AccountNumber", $vendor->AccountNumber);
            $this->tag->setDefault("VendorTypeRef_ListID", $vendor->VendorTypeRef_ListID);
            $this->tag->setDefault("VendorTypeRef_FullName", $vendor->VendorTypeRef_FullName);
            $this->tag->setDefault("TermsRef_ListID", $vendor->TermsRef_ListID);
            $this->tag->setDefault("TermsRef_FullName", $vendor->TermsRef_FullName);
            $this->tag->setDefault("CreditLimit", $vendor->CreditLimit);
            $this->tag->setDefault("VendorTaxIdent", $vendor->VendorTaxIdent);
            $this->tag->setDefault("IsVendorEligibleFor1099", $vendor->IsVendorEligibleFor1099);
            $this->tag->setDefault("Balance", $vendor->Balance);
            $this->tag->setDefault("CurrencyRef_ListID", $vendor->CurrencyRef_ListID);
            $this->tag->setDefault("CurrencyRef_FullName", $vendor->CurrencyRef_FullName);
            $this->tag->setDefault("BillingRateRef_ListID", $vendor->BillingRateRef_ListID);
            $this->tag->setDefault("BillingRateRef_FullName", $vendor->BillingRateRef_FullName);
            $this->tag->setDefault("SalesTaxCodeRef_ListID", $vendor->SalesTaxCodeRef_ListID);
            $this->tag->setDefault("SalesTaxCodeRef_FullName", $vendor->SalesTaxCodeRef_FullName);
            $this->tag->setDefault("SalesTaxCountry", $vendor->SalesTaxCountry);
            $this->tag->setDefault("IsSalesTaxAgency", $vendor->IsSalesTaxAgency);
            $this->tag->setDefault("SalesTaxReturnRef_ListID", $vendor->SalesTaxReturnRef_ListID);
            $this->tag->setDefault("SalesTaxReturnRef_FullName", $vendor->SalesTaxReturnRef_FullName);
            $this->tag->setDefault("TaxRegistrationNumber", $vendor->TaxRegistrationNumber);
            $this->tag->setDefault("ReportingPeriod", $vendor->ReportingPeriod);
            $this->tag->setDefault("IsTaxTrackedOnPurchases", $vendor->IsTaxTrackedOnPurchases);
            $this->tag->setDefault("TaxOnPurchasesAccountRef_ListID", $vendor->TaxOnPurchasesAccountRef_ListID);
            $this->tag->setDefault("TaxOnPurchasesAccountRef_FullName", $vendor->TaxOnPurchasesAccountRef_FullName);
            $this->tag->setDefault("IsTaxTrackedOnSales", $vendor->IsTaxTrackedOnSales);
            $this->tag->setDefault("TaxOnSalesAccountRef_ListID", $vendor->TaxOnSalesAccountRef_ListID);
            $this->tag->setDefault("TaxOnSalesAccountRef_FullName", $vendor->TaxOnSalesAccountRef_FullName);
            $this->tag->setDefault("IsTaxOnTax", $vendor->IsTaxOnTax);
            $this->tag->setDefault("PrefillAccountRef_ListID", $vendor->PrefillAccountRef_ListID);
            $this->tag->setDefault("PrefillAccountRef_FullName", $vendor->PrefillAccountRef_FullName);
            $this->tag->setDefault("CustomField1", $vendor->CustomField1);
            $this->tag->setDefault("CustomField2", $vendor->CustomField2);
            $this->tag->setDefault("CustomField3", $vendor->CustomField3);
            $this->tag->setDefault("CustomField4", $vendor->CustomField4);
            $this->tag->setDefault("CustomField5", $vendor->CustomField5);
            $this->tag->setDefault("CustomField6", $vendor->CustomField6);
            $this->tag->setDefault("CustomField7", $vendor->CustomField7);
            $this->tag->setDefault("CustomField8", $vendor->CustomField8);
            $this->tag->setDefault("CustomField9", $vendor->CustomField9);
            $this->tag->setDefault("CustomField10", $vendor->CustomField10);
            $this->tag->setDefault("CustomField11", $vendor->CustomField11);
            $this->tag->setDefault("CustomField12", $vendor->CustomField12);
            $this->tag->setDefault("CustomField13", $vendor->CustomField13);
            $this->tag->setDefault("CustomField14", $vendor->CustomField14);
            $this->tag->setDefault("CustomField15", $vendor->CustomField15);
            $this->tag->setDefault("Status", $vendor->Status);
            
        }
    }

    /**
     * Creates a new vendor
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "vendor",
                'action' => 'index'
            ]);

            return;
        }

        $vendor = new Vendor();
        $vendor->Listid = $this->request->getPost("ListID");
        $vendor->Timecreated = $this->request->getPost("TimeCreated");
        $vendor->Timemodified = $this->request->getPost("TimeModified");
        $vendor->Editsequence = $this->request->getPost("EditSequence");
        $vendor->Name = $this->request->getPost("Name");
        $vendor->Isactive = $this->request->getPost("IsActive");
        $vendor->Classref_listid = $this->request->getPost("ClassRef_ListID");
        $vendor->Classref_fullname = $this->request->getPost("ClassRef_FullName");
        $vendor->Companyname = $this->request->getPost("CompanyName");
        $vendor->Salutation = $this->request->getPost("Salutation");
        $vendor->Firstname = $this->request->getPost("FirstName");
        $vendor->Middlename = $this->request->getPost("MiddleName");
        $vendor->Lastname = $this->request->getPost("LastName");
        $vendor->Jobtitle = $this->request->getPost("JobTitle");
        $vendor->Suffix = $this->request->getPost("Suffix");
        $vendor->Vendoraddress_addr1 = $this->request->getPost("VendorAddress_Addr1");
        $vendor->Vendoraddress_addr2 = $this->request->getPost("VendorAddress_Addr2");
        $vendor->Vendoraddress_addr3 = $this->request->getPost("VendorAddress_Addr3");
        $vendor->Vendoraddress_addr4 = $this->request->getPost("VendorAddress_Addr4");
        $vendor->Vendoraddress_addr5 = $this->request->getPost("VendorAddress_Addr5");
        $vendor->Vendoraddress_city = $this->request->getPost("VendorAddress_City");
        $vendor->Vendoraddress_state = $this->request->getPost("VendorAddress_State");
        $vendor->Vendoraddress_postalcode = $this->request->getPost("VendorAddress_PostalCode");
        $vendor->Vendoraddress_country = $this->request->getPost("VendorAddress_Country");
        $vendor->Vendoraddress_note = $this->request->getPost("VendorAddress_Note");
        $vendor->Shipaddress_addr1 = $this->request->getPost("ShipAddress_Addr1");
        $vendor->Shipaddress_addr2 = $this->request->getPost("ShipAddress_Addr2");
        $vendor->Shipaddress_addr3 = $this->request->getPost("ShipAddress_Addr3");
        $vendor->Shipaddress_addr4 = $this->request->getPost("ShipAddress_Addr4");
        $vendor->Shipaddress_addr5 = $this->request->getPost("ShipAddress_Addr5");
        $vendor->Shipaddress_city = $this->request->getPost("ShipAddress_City");
        $vendor->Shipaddress_state = $this->request->getPost("ShipAddress_State");
        $vendor->Shipaddress_postalcode = $this->request->getPost("ShipAddress_PostalCode");
        $vendor->Shipaddress_country = $this->request->getPost("ShipAddress_Country");
        $vendor->Shipaddress_note = $this->request->getPost("ShipAddress_Note");
        $vendor->Phone = $this->request->getPost("Phone");
        $vendor->Mobile = $this->request->getPost("Mobile");
        $vendor->Pager = $this->request->getPost("Pager");
        $vendor->Altphone = $this->request->getPost("AltPhone");
        $vendor->Fax = $this->request->getPost("Fax");
        $vendor->Email = $this->request->getPost("Email");
        $vendor->Cc = $this->request->getPost("Cc");
        $vendor->Contact = $this->request->getPost("Contact");
        $vendor->Altcontact = $this->request->getPost("AltContact");
        $vendor->Nameoncheck = $this->request->getPost("NameOnCheck");
        $vendor->Notes = $this->request->getPost("Notes");
        $vendor->Accountnumber = $this->request->getPost("AccountNumber");
        $vendor->Vendortyperef_listid = $this->request->getPost("VendorTypeRef_ListID");
        $vendor->Vendortyperef_fullname = $this->request->getPost("VendorTypeRef_FullName");
        $vendor->Termsref_listid = $this->request->getPost("TermsRef_ListID");
        $vendor->Termsref_fullname = $this->request->getPost("TermsRef_FullName");
        $vendor->Creditlimit = $this->request->getPost("CreditLimit");
        $vendor->Vendortaxident = $this->request->getPost("VendorTaxIdent");
        $vendor->Isvendoreligiblefor1099 = $this->request->getPost("IsVendorEligibleFor1099");
        $vendor->Balance = $this->request->getPost("Balance");
        $vendor->Currencyref_listid = $this->request->getPost("CurrencyRef_ListID");
        $vendor->Currencyref_fullname = $this->request->getPost("CurrencyRef_FullName");
        $vendor->Billingrateref_listid = $this->request->getPost("BillingRateRef_ListID");
        $vendor->Billingrateref_fullname = $this->request->getPost("BillingRateRef_FullName");
        $vendor->Salestaxcoderef_listid = $this->request->getPost("SalesTaxCodeRef_ListID");
        $vendor->Salestaxcoderef_fullname = $this->request->getPost("SalesTaxCodeRef_FullName");
        $vendor->Salestaxcountry = $this->request->getPost("SalesTaxCountry");
        $vendor->Issalestaxagency = $this->request->getPost("IsSalesTaxAgency");
        $vendor->Salestaxreturnref_listid = $this->request->getPost("SalesTaxReturnRef_ListID");
        $vendor->Salestaxreturnref_fullname = $this->request->getPost("SalesTaxReturnRef_FullName");
        $vendor->Taxregistrationnumber = $this->request->getPost("TaxRegistrationNumber");
        $vendor->Reportingperiod = $this->request->getPost("ReportingPeriod");
        $vendor->Istaxtrackedonpurchases = $this->request->getPost("IsTaxTrackedOnPurchases");
        $vendor->Taxonpurchasesaccountref_listid = $this->request->getPost("TaxOnPurchasesAccountRef_ListID");
        $vendor->Taxonpurchasesaccountref_fullname = $this->request->getPost("TaxOnPurchasesAccountRef_FullName");
        $vendor->Istaxtrackedonsales = $this->request->getPost("IsTaxTrackedOnSales");
        $vendor->Taxonsalesaccountref_listid = $this->request->getPost("TaxOnSalesAccountRef_ListID");
        $vendor->Taxonsalesaccountref_fullname = $this->request->getPost("TaxOnSalesAccountRef_FullName");
        $vendor->Istaxontax = $this->request->getPost("IsTaxOnTax");
        $vendor->Prefillaccountref_listid = $this->request->getPost("PrefillAccountRef_ListID");
        $vendor->Prefillaccountref_fullname = $this->request->getPost("PrefillAccountRef_FullName");
        $vendor->Customfield1 = $this->request->getPost("CustomField1");
        $vendor->Customfield2 = $this->request->getPost("CustomField2");
        $vendor->Customfield3 = $this->request->getPost("CustomField3");
        $vendor->Customfield4 = $this->request->getPost("CustomField4");
        $vendor->Customfield5 = $this->request->getPost("CustomField5");
        $vendor->Customfield6 = $this->request->getPost("CustomField6");
        $vendor->Customfield7 = $this->request->getPost("CustomField7");
        $vendor->Customfield8 = $this->request->getPost("CustomField8");
        $vendor->Customfield9 = $this->request->getPost("CustomField9");
        $vendor->Customfield10 = $this->request->getPost("CustomField10");
        $vendor->Customfield11 = $this->request->getPost("CustomField11");
        $vendor->Customfield12 = $this->request->getPost("CustomField12");
        $vendor->Customfield13 = $this->request->getPost("CustomField13");
        $vendor->Customfield14 = $this->request->getPost("CustomField14");
        $vendor->Customfield15 = $this->request->getPost("CustomField15");
        $vendor->Status = $this->request->getPost("Status");
        

        if (!$vendor->save()) {
            foreach ($vendor->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "vendor",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("vendor was created successfully");

        $this->dispatcher->forward([
            'controller' => "vendor",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a vendor edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "vendor",
                'action' => 'index'
            ]);

            return;
        }

        $ListID = $this->request->getPost("ListID");
        $vendor = Vendor::findFirstByListID($ListID);

        if (!$vendor) {
            $this->flash->error("vendor does not exist " . $ListID);

            $this->dispatcher->forward([
                'controller' => "vendor",
                'action' => 'index'
            ]);

            return;
        }

        $vendor->Listid = $this->request->getPost("ListID");
        $vendor->Timecreated = $this->request->getPost("TimeCreated");
        $vendor->Timemodified = $this->request->getPost("TimeModified");
        $vendor->Editsequence = $this->request->getPost("EditSequence");
        $vendor->Name = $this->request->getPost("Name");
        $vendor->Isactive = $this->request->getPost("IsActive");
        $vendor->Classref_listid = $this->request->getPost("ClassRef_ListID");
        $vendor->Classref_fullname = $this->request->getPost("ClassRef_FullName");
        $vendor->Companyname = $this->request->getPost("CompanyName");
        $vendor->Salutation = $this->request->getPost("Salutation");
        $vendor->Firstname = $this->request->getPost("FirstName");
        $vendor->Middlename = $this->request->getPost("MiddleName");
        $vendor->Lastname = $this->request->getPost("LastName");
        $vendor->Jobtitle = $this->request->getPost("JobTitle");
        $vendor->Suffix = $this->request->getPost("Suffix");
        $vendor->Vendoraddress_addr1 = $this->request->getPost("VendorAddress_Addr1");
        $vendor->Vendoraddress_addr2 = $this->request->getPost("VendorAddress_Addr2");
        $vendor->Vendoraddress_addr3 = $this->request->getPost("VendorAddress_Addr3");
        $vendor->Vendoraddress_addr4 = $this->request->getPost("VendorAddress_Addr4");
        $vendor->Vendoraddress_addr5 = $this->request->getPost("VendorAddress_Addr5");
        $vendor->Vendoraddress_city = $this->request->getPost("VendorAddress_City");
        $vendor->Vendoraddress_state = $this->request->getPost("VendorAddress_State");
        $vendor->Vendoraddress_postalcode = $this->request->getPost("VendorAddress_PostalCode");
        $vendor->Vendoraddress_country = $this->request->getPost("VendorAddress_Country");
        $vendor->Vendoraddress_note = $this->request->getPost("VendorAddress_Note");
        $vendor->Shipaddress_addr1 = $this->request->getPost("ShipAddress_Addr1");
        $vendor->Shipaddress_addr2 = $this->request->getPost("ShipAddress_Addr2");
        $vendor->Shipaddress_addr3 = $this->request->getPost("ShipAddress_Addr3");
        $vendor->Shipaddress_addr4 = $this->request->getPost("ShipAddress_Addr4");
        $vendor->Shipaddress_addr5 = $this->request->getPost("ShipAddress_Addr5");
        $vendor->Shipaddress_city = $this->request->getPost("ShipAddress_City");
        $vendor->Shipaddress_state = $this->request->getPost("ShipAddress_State");
        $vendor->Shipaddress_postalcode = $this->request->getPost("ShipAddress_PostalCode");
        $vendor->Shipaddress_country = $this->request->getPost("ShipAddress_Country");
        $vendor->Shipaddress_note = $this->request->getPost("ShipAddress_Note");
        $vendor->Phone = $this->request->getPost("Phone");
        $vendor->Mobile = $this->request->getPost("Mobile");
        $vendor->Pager = $this->request->getPost("Pager");
        $vendor->Altphone = $this->request->getPost("AltPhone");
        $vendor->Fax = $this->request->getPost("Fax");
        $vendor->Email = $this->request->getPost("Email");
        $vendor->Cc = $this->request->getPost("Cc");
        $vendor->Contact = $this->request->getPost("Contact");
        $vendor->Altcontact = $this->request->getPost("AltContact");
        $vendor->Nameoncheck = $this->request->getPost("NameOnCheck");
        $vendor->Notes = $this->request->getPost("Notes");
        $vendor->Accountnumber = $this->request->getPost("AccountNumber");
        $vendor->Vendortyperef_listid = $this->request->getPost("VendorTypeRef_ListID");
        $vendor->Vendortyperef_fullname = $this->request->getPost("VendorTypeRef_FullName");
        $vendor->Termsref_listid = $this->request->getPost("TermsRef_ListID");
        $vendor->Termsref_fullname = $this->request->getPost("TermsRef_FullName");
        $vendor->Creditlimit = $this->request->getPost("CreditLimit");
        $vendor->Vendortaxident = $this->request->getPost("VendorTaxIdent");
        $vendor->Isvendoreligiblefor1099 = $this->request->getPost("IsVendorEligibleFor1099");
        $vendor->Balance = $this->request->getPost("Balance");
        $vendor->Currencyref_listid = $this->request->getPost("CurrencyRef_ListID");
        $vendor->Currencyref_fullname = $this->request->getPost("CurrencyRef_FullName");
        $vendor->Billingrateref_listid = $this->request->getPost("BillingRateRef_ListID");
        $vendor->Billingrateref_fullname = $this->request->getPost("BillingRateRef_FullName");
        $vendor->Salestaxcoderef_listid = $this->request->getPost("SalesTaxCodeRef_ListID");
        $vendor->Salestaxcoderef_fullname = $this->request->getPost("SalesTaxCodeRef_FullName");
        $vendor->Salestaxcountry = $this->request->getPost("SalesTaxCountry");
        $vendor->Issalestaxagency = $this->request->getPost("IsSalesTaxAgency");
        $vendor->Salestaxreturnref_listid = $this->request->getPost("SalesTaxReturnRef_ListID");
        $vendor->Salestaxreturnref_fullname = $this->request->getPost("SalesTaxReturnRef_FullName");
        $vendor->Taxregistrationnumber = $this->request->getPost("TaxRegistrationNumber");
        $vendor->Reportingperiod = $this->request->getPost("ReportingPeriod");
        $vendor->Istaxtrackedonpurchases = $this->request->getPost("IsTaxTrackedOnPurchases");
        $vendor->Taxonpurchasesaccountref_listid = $this->request->getPost("TaxOnPurchasesAccountRef_ListID");
        $vendor->Taxonpurchasesaccountref_fullname = $this->request->getPost("TaxOnPurchasesAccountRef_FullName");
        $vendor->Istaxtrackedonsales = $this->request->getPost("IsTaxTrackedOnSales");
        $vendor->Taxonsalesaccountref_listid = $this->request->getPost("TaxOnSalesAccountRef_ListID");
        $vendor->Taxonsalesaccountref_fullname = $this->request->getPost("TaxOnSalesAccountRef_FullName");
        $vendor->Istaxontax = $this->request->getPost("IsTaxOnTax");
        $vendor->Prefillaccountref_listid = $this->request->getPost("PrefillAccountRef_ListID");
        $vendor->Prefillaccountref_fullname = $this->request->getPost("PrefillAccountRef_FullName");
        $vendor->Customfield1 = $this->request->getPost("CustomField1");
        $vendor->Customfield2 = $this->request->getPost("CustomField2");
        $vendor->Customfield3 = $this->request->getPost("CustomField3");
        $vendor->Customfield4 = $this->request->getPost("CustomField4");
        $vendor->Customfield5 = $this->request->getPost("CustomField5");
        $vendor->Customfield6 = $this->request->getPost("CustomField6");
        $vendor->Customfield7 = $this->request->getPost("CustomField7");
        $vendor->Customfield8 = $this->request->getPost("CustomField8");
        $vendor->Customfield9 = $this->request->getPost("CustomField9");
        $vendor->Customfield10 = $this->request->getPost("CustomField10");
        $vendor->Customfield11 = $this->request->getPost("CustomField11");
        $vendor->Customfield12 = $this->request->getPost("CustomField12");
        $vendor->Customfield13 = $this->request->getPost("CustomField13");
        $vendor->Customfield14 = $this->request->getPost("CustomField14");
        $vendor->Customfield15 = $this->request->getPost("CustomField15");
        $vendor->Status = $this->request->getPost("Status");
        

        if (!$vendor->save()) {

            foreach ($vendor->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "vendor",
                'action' => 'edit',
                'params' => [$vendor->ListID]
            ]);

            return;
        }

        $this->flash->success("vendor was updated successfully");

        $this->dispatcher->forward([
            'controller' => "vendor",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a vendor
     *
     * @param string $ListID
     */
    public function deleteAction($ListID)
    {
        $vendor = Vendor::findFirstByListID($ListID);
        if (!$vendor) {
            $this->flash->error("vendor was not found");

            $this->dispatcher->forward([
                'controller' => "vendor",
                'action' => 'index'
            ]);

            return;
        }

        if (!$vendor->delete()) {

            foreach ($vendor->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "vendor",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("vendor was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "vendor",
            'action' => "index"
        ]);
    }

}
