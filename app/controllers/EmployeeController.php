<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class EmployeeController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for employee
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Employee', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "ListID";

        $employee = Employee::find($parameters);
        if (count($employee) == 0) {
            $this->flash->notice("The search did not find any employee");

            $this->dispatcher->forward([
                "controller" => "employee",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $employee,
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
     * Edits a employee
     *
     * @param string $ListID
     */
    public function editAction($ListID)
    {
        if (!$this->request->isPost()) {

            $employee = Employee::findFirstByListID($ListID);
            if (!$employee) {
                $this->flash->error("employee was not found");

                $this->dispatcher->forward([
                    'controller' => "employee",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->ListID = $employee->ListID;

            $this->tag->setDefault("ListID", $employee->ListID);
            $this->tag->setDefault("TimeCreated", $employee->TimeCreated);
            $this->tag->setDefault("TimeModified", $employee->TimeModified);
            $this->tag->setDefault("EditSequence", $employee->EditSequence);
            $this->tag->setDefault("Name", $employee->Name);
            $this->tag->setDefault("IsActive", $employee->IsActive);
            $this->tag->setDefault("Salutation", $employee->Salutation);
            $this->tag->setDefault("FirstName", $employee->FirstName);
            $this->tag->setDefault("MiddleName", $employee->MiddleName);
            $this->tag->setDefault("LastName", $employee->LastName);
            $this->tag->setDefault("Suffix", $employee->Suffix);
            $this->tag->setDefault("JobTitle", $employee->JobTitle);
            $this->tag->setDefault("SupervisorRef_ListID", $employee->SupervisorRef_ListID);
            $this->tag->setDefault("SupervisorRef_FullName", $employee->SupervisorRef_FullName);
            $this->tag->setDefault("Department", $employee->Department);
            $this->tag->setDefault("Description", $employee->Description);
            $this->tag->setDefault("TargetBonus", $employee->TargetBonus);
            $this->tag->setDefault("EmployeeAddress_Addr1", $employee->EmployeeAddress_Addr1);
            $this->tag->setDefault("EmployeeAddress_Addr2", $employee->EmployeeAddress_Addr2);
            $this->tag->setDefault("EmployeeAddress_Addr3", $employee->EmployeeAddress_Addr3);
            $this->tag->setDefault("EmployeeAddress_Addr4", $employee->EmployeeAddress_Addr4);
            $this->tag->setDefault("EmployeeAddress_City", $employee->EmployeeAddress_City);
            $this->tag->setDefault("EmployeeAddress_State", $employee->EmployeeAddress_State);
            $this->tag->setDefault("EmployeeAddress_PostalCode", $employee->EmployeeAddress_PostalCode);
            $this->tag->setDefault("EmployeeAddress_Country", $employee->EmployeeAddress_Country);
            $this->tag->setDefault("PrintAs", $employee->PrintAs);
            $this->tag->setDefault("Phone", $employee->Phone);
            $this->tag->setDefault("Mobile", $employee->Mobile);
            $this->tag->setDefault("Pager", $employee->Pager);
            $this->tag->setDefault("PagerPIN", $employee->PagerPIN);
            $this->tag->setDefault("AltPhone", $employee->AltPhone);
            $this->tag->setDefault("Fax", $employee->Fax);
            $this->tag->setDefault("SSN", $employee->SSN);
            $this->tag->setDefault("Email", $employee->Email);
            $this->tag->setDefault("EmergencyContactPrimaryName", $employee->EmergencyContactPrimaryName);
            $this->tag->setDefault("EmergencyContactPrimaryValue", $employee->EmergencyContactPrimaryValue);
            $this->tag->setDefault("EmergencyContactPrimaryRelation", $employee->EmergencyContactPrimaryRelation);
            $this->tag->setDefault("EmergencyContactSecondaryName", $employee->EmergencyContactSecondaryName);
            $this->tag->setDefault("EmergencyContactSecondaryValue", $employee->EmergencyContactSecondaryValue);
            $this->tag->setDefault("EmergencyContactSecondaryRelation", $employee->EmergencyContactSecondaryRelation);
            $this->tag->setDefault("EmployeeType", $employee->EmployeeType);
            $this->tag->setDefault("Gender", $employee->Gender);
            $this->tag->setDefault("PartOrFullTime", $employee->PartOrFullTime);
            $this->tag->setDefault("Exempt", $employee->Exempt);
            $this->tag->setDefault("KeyEmployee", $employee->KeyEmployee);
            $this->tag->setDefault("HiredDate", $employee->HiredDate);
            $this->tag->setDefault("OriginalHireDate", $employee->OriginalHireDate);
            $this->tag->setDefault("AdjustedServiceDate", $employee->AdjustedServiceDate);
            $this->tag->setDefault("ReleasedDate", $employee->ReleasedDate);
            $this->tag->setDefault("BirthDate", $employee->BirthDate);
            $this->tag->setDefault("USCitizen", $employee->USCitizen);
            $this->tag->setDefault("Ethnicity", $employee->Ethnicity);
            $this->tag->setDefault("Disabled", $employee->Disabled);
            $this->tag->setDefault("DisabilityDesc", $employee->DisabilityDesc);
            $this->tag->setDefault("OnFile", $employee->OnFile);
            $this->tag->setDefault("WorkAuthExpireDate", $employee->WorkAuthExpireDate);
            $this->tag->setDefault("USVeteran", $employee->USVeteran);
            $this->tag->setDefault("MilitaryStatus", $employee->MilitaryStatus);
            $this->tag->setDefault("AccountNumber", $employee->AccountNumber);
            $this->tag->setDefault("Notes", $employee->Notes);
            $this->tag->setDefault("BillingRateRef_ListID", $employee->BillingRateRef_ListID);
            $this->tag->setDefault("BillingRateRef_FullName", $employee->BillingRateRef_FullName);
            $this->tag->setDefault("CustomField1", $employee->CustomField1);
            $this->tag->setDefault("CustomField2", $employee->CustomField2);
            $this->tag->setDefault("CustomField3", $employee->CustomField3);
            $this->tag->setDefault("CustomField4", $employee->CustomField4);
            $this->tag->setDefault("CustomField5", $employee->CustomField5);
            $this->tag->setDefault("CustomField6", $employee->CustomField6);
            $this->tag->setDefault("CustomField7", $employee->CustomField7);
            $this->tag->setDefault("CustomField8", $employee->CustomField8);
            $this->tag->setDefault("CustomField9", $employee->CustomField9);
            $this->tag->setDefault("CustomField10", $employee->CustomField10);
            $this->tag->setDefault("CustomField11", $employee->CustomField11);
            $this->tag->setDefault("CustomField12", $employee->CustomField12);
            $this->tag->setDefault("CustomField13", $employee->CustomField13);
            $this->tag->setDefault("CustomField14", $employee->CustomField14);
            $this->tag->setDefault("CustomField15", $employee->CustomField15);
            $this->tag->setDefault("Status", $employee->Status);
            
        }
    }

    /**
     * Creates a new employee
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "employee",
                'action' => 'index'
            ]);

            return;
        }

        $employee = new Employee();
        $employee->Listid = $this->request->getPost("ListID");
        $employee->Timecreated = $this->request->getPost("TimeCreated");
        $employee->Timemodified = $this->request->getPost("TimeModified");
        $employee->Editsequence = $this->request->getPost("EditSequence");
        $employee->Name = $this->request->getPost("Name");
        $employee->Isactive = $this->request->getPost("IsActive");
        $employee->Salutation = $this->request->getPost("Salutation");
        $employee->Firstname = $this->request->getPost("FirstName");
        $employee->Middlename = $this->request->getPost("MiddleName");
        $employee->Lastname = $this->request->getPost("LastName");
        $employee->Suffix = $this->request->getPost("Suffix");
        $employee->Jobtitle = $this->request->getPost("JobTitle");
        $employee->Supervisorref_listid = $this->request->getPost("SupervisorRef_ListID");
        $employee->Supervisorref_fullname = $this->request->getPost("SupervisorRef_FullName");
        $employee->Department = $this->request->getPost("Department");
        $employee->Description = $this->request->getPost("Description");
        $employee->Targetbonus = $this->request->getPost("TargetBonus");
        $employee->Employeeaddress_addr1 = $this->request->getPost("EmployeeAddress_Addr1");
        $employee->Employeeaddress_addr2 = $this->request->getPost("EmployeeAddress_Addr2");
        $employee->Employeeaddress_addr3 = $this->request->getPost("EmployeeAddress_Addr3");
        $employee->Employeeaddress_addr4 = $this->request->getPost("EmployeeAddress_Addr4");
        $employee->Employeeaddress_city = $this->request->getPost("EmployeeAddress_City");
        $employee->Employeeaddress_state = $this->request->getPost("EmployeeAddress_State");
        $employee->Employeeaddress_postalcode = $this->request->getPost("EmployeeAddress_PostalCode");
        $employee->Employeeaddress_country = $this->request->getPost("EmployeeAddress_Country");
        $employee->Printas = $this->request->getPost("PrintAs");
        $employee->Phone = $this->request->getPost("Phone");
        $employee->Mobile = $this->request->getPost("Mobile");
        $employee->Pager = $this->request->getPost("Pager");
        $employee->Pagerpin = $this->request->getPost("PagerPIN");
        $employee->Altphone = $this->request->getPost("AltPhone");
        $employee->Fax = $this->request->getPost("Fax");
        $employee->Ssn = $this->request->getPost("SSN");
        $employee->Email = $this->request->getPost("Email");
        $employee->Emergencycontactprimaryname = $this->request->getPost("EmergencyContactPrimaryName");
        $employee->Emergencycontactprimaryvalue = $this->request->getPost("EmergencyContactPrimaryValue");
        $employee->Emergencycontactprimaryrelation = $this->request->getPost("EmergencyContactPrimaryRelation");
        $employee->Emergencycontactsecondaryname = $this->request->getPost("EmergencyContactSecondaryName");
        $employee->Emergencycontactsecondaryvalue = $this->request->getPost("EmergencyContactSecondaryValue");
        $employee->Emergencycontactsecondaryrelation = $this->request->getPost("EmergencyContactSecondaryRelation");
        $employee->Employeetype = $this->request->getPost("EmployeeType");
        $employee->Gender = $this->request->getPost("Gender");
        $employee->Partorfulltime = $this->request->getPost("PartOrFullTime");
        $employee->Exempt = $this->request->getPost("Exempt");
        $employee->Keyemployee = $this->request->getPost("KeyEmployee");
        $employee->Hireddate = $this->request->getPost("HiredDate");
        $employee->Originalhiredate = $this->request->getPost("OriginalHireDate");
        $employee->Adjustedservicedate = $this->request->getPost("AdjustedServiceDate");
        $employee->Releaseddate = $this->request->getPost("ReleasedDate");
        $employee->Birthdate = $this->request->getPost("BirthDate");
        $employee->Uscitizen = $this->request->getPost("USCitizen");
        $employee->Ethnicity = $this->request->getPost("Ethnicity");
        $employee->Disabled = $this->request->getPost("Disabled");
        $employee->Disabilitydesc = $this->request->getPost("DisabilityDesc");
        $employee->Onfile = $this->request->getPost("OnFile");
        $employee->Workauthexpiredate = $this->request->getPost("WorkAuthExpireDate");
        $employee->Usveteran = $this->request->getPost("USVeteran");
        $employee->Militarystatus = $this->request->getPost("MilitaryStatus");
        $employee->Accountnumber = $this->request->getPost("AccountNumber");
        $employee->Notes = $this->request->getPost("Notes");
        $employee->Billingrateref_listid = $this->request->getPost("BillingRateRef_ListID");
        $employee->Billingrateref_fullname = $this->request->getPost("BillingRateRef_FullName");
        $employee->Customfield1 = $this->request->getPost("CustomField1");
        $employee->Customfield2 = $this->request->getPost("CustomField2");
        $employee->Customfield3 = $this->request->getPost("CustomField3");
        $employee->Customfield4 = $this->request->getPost("CustomField4");
        $employee->Customfield5 = $this->request->getPost("CustomField5");
        $employee->Customfield6 = $this->request->getPost("CustomField6");
        $employee->Customfield7 = $this->request->getPost("CustomField7");
        $employee->Customfield8 = $this->request->getPost("CustomField8");
        $employee->Customfield9 = $this->request->getPost("CustomField9");
        $employee->Customfield10 = $this->request->getPost("CustomField10");
        $employee->Customfield11 = $this->request->getPost("CustomField11");
        $employee->Customfield12 = $this->request->getPost("CustomField12");
        $employee->Customfield13 = $this->request->getPost("CustomField13");
        $employee->Customfield14 = $this->request->getPost("CustomField14");
        $employee->Customfield15 = $this->request->getPost("CustomField15");
        $employee->Status = $this->request->getPost("Status");
        

        if (!$employee->save()) {
            foreach ($employee->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "employee",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("employee was created successfully");

        $this->dispatcher->forward([
            'controller' => "employee",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a employee edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "employee",
                'action' => 'index'
            ]);

            return;
        }

        $ListID = $this->request->getPost("ListID");
        $employee = Employee::findFirstByListID($ListID);

        if (!$employee) {
            $this->flash->error("employee does not exist " . $ListID);

            $this->dispatcher->forward([
                'controller' => "employee",
                'action' => 'index'
            ]);

            return;
        }

        $employee->Listid = $this->request->getPost("ListID");
        $employee->Timecreated = $this->request->getPost("TimeCreated");
        $employee->Timemodified = $this->request->getPost("TimeModified");
        $employee->Editsequence = $this->request->getPost("EditSequence");
        $employee->Name = $this->request->getPost("Name");
        $employee->Isactive = $this->request->getPost("IsActive");
        $employee->Salutation = $this->request->getPost("Salutation");
        $employee->Firstname = $this->request->getPost("FirstName");
        $employee->Middlename = $this->request->getPost("MiddleName");
        $employee->Lastname = $this->request->getPost("LastName");
        $employee->Suffix = $this->request->getPost("Suffix");
        $employee->Jobtitle = $this->request->getPost("JobTitle");
        $employee->Supervisorref_listid = $this->request->getPost("SupervisorRef_ListID");
        $employee->Supervisorref_fullname = $this->request->getPost("SupervisorRef_FullName");
        $employee->Department = $this->request->getPost("Department");
        $employee->Description = $this->request->getPost("Description");
        $employee->Targetbonus = $this->request->getPost("TargetBonus");
        $employee->Employeeaddress_addr1 = $this->request->getPost("EmployeeAddress_Addr1");
        $employee->Employeeaddress_addr2 = $this->request->getPost("EmployeeAddress_Addr2");
        $employee->Employeeaddress_addr3 = $this->request->getPost("EmployeeAddress_Addr3");
        $employee->Employeeaddress_addr4 = $this->request->getPost("EmployeeAddress_Addr4");
        $employee->Employeeaddress_city = $this->request->getPost("EmployeeAddress_City");
        $employee->Employeeaddress_state = $this->request->getPost("EmployeeAddress_State");
        $employee->Employeeaddress_postalcode = $this->request->getPost("EmployeeAddress_PostalCode");
        $employee->Employeeaddress_country = $this->request->getPost("EmployeeAddress_Country");
        $employee->Printas = $this->request->getPost("PrintAs");
        $employee->Phone = $this->request->getPost("Phone");
        $employee->Mobile = $this->request->getPost("Mobile");
        $employee->Pager = $this->request->getPost("Pager");
        $employee->Pagerpin = $this->request->getPost("PagerPIN");
        $employee->Altphone = $this->request->getPost("AltPhone");
        $employee->Fax = $this->request->getPost("Fax");
        $employee->Ssn = $this->request->getPost("SSN");
        $employee->Email = $this->request->getPost("Email");
        $employee->Emergencycontactprimaryname = $this->request->getPost("EmergencyContactPrimaryName");
        $employee->Emergencycontactprimaryvalue = $this->request->getPost("EmergencyContactPrimaryValue");
        $employee->Emergencycontactprimaryrelation = $this->request->getPost("EmergencyContactPrimaryRelation");
        $employee->Emergencycontactsecondaryname = $this->request->getPost("EmergencyContactSecondaryName");
        $employee->Emergencycontactsecondaryvalue = $this->request->getPost("EmergencyContactSecondaryValue");
        $employee->Emergencycontactsecondaryrelation = $this->request->getPost("EmergencyContactSecondaryRelation");
        $employee->Employeetype = $this->request->getPost("EmployeeType");
        $employee->Gender = $this->request->getPost("Gender");
        $employee->Partorfulltime = $this->request->getPost("PartOrFullTime");
        $employee->Exempt = $this->request->getPost("Exempt");
        $employee->Keyemployee = $this->request->getPost("KeyEmployee");
        $employee->Hireddate = $this->request->getPost("HiredDate");
        $employee->Originalhiredate = $this->request->getPost("OriginalHireDate");
        $employee->Adjustedservicedate = $this->request->getPost("AdjustedServiceDate");
        $employee->Releaseddate = $this->request->getPost("ReleasedDate");
        $employee->Birthdate = $this->request->getPost("BirthDate");
        $employee->Uscitizen = $this->request->getPost("USCitizen");
        $employee->Ethnicity = $this->request->getPost("Ethnicity");
        $employee->Disabled = $this->request->getPost("Disabled");
        $employee->Disabilitydesc = $this->request->getPost("DisabilityDesc");
        $employee->Onfile = $this->request->getPost("OnFile");
        $employee->Workauthexpiredate = $this->request->getPost("WorkAuthExpireDate");
        $employee->Usveteran = $this->request->getPost("USVeteran");
        $employee->Militarystatus = $this->request->getPost("MilitaryStatus");
        $employee->Accountnumber = $this->request->getPost("AccountNumber");
        $employee->Notes = $this->request->getPost("Notes");
        $employee->Billingrateref_listid = $this->request->getPost("BillingRateRef_ListID");
        $employee->Billingrateref_fullname = $this->request->getPost("BillingRateRef_FullName");
        $employee->Customfield1 = $this->request->getPost("CustomField1");
        $employee->Customfield2 = $this->request->getPost("CustomField2");
        $employee->Customfield3 = $this->request->getPost("CustomField3");
        $employee->Customfield4 = $this->request->getPost("CustomField4");
        $employee->Customfield5 = $this->request->getPost("CustomField5");
        $employee->Customfield6 = $this->request->getPost("CustomField6");
        $employee->Customfield7 = $this->request->getPost("CustomField7");
        $employee->Customfield8 = $this->request->getPost("CustomField8");
        $employee->Customfield9 = $this->request->getPost("CustomField9");
        $employee->Customfield10 = $this->request->getPost("CustomField10");
        $employee->Customfield11 = $this->request->getPost("CustomField11");
        $employee->Customfield12 = $this->request->getPost("CustomField12");
        $employee->Customfield13 = $this->request->getPost("CustomField13");
        $employee->Customfield14 = $this->request->getPost("CustomField14");
        $employee->Customfield15 = $this->request->getPost("CustomField15");
        $employee->Status = $this->request->getPost("Status");
        

        if (!$employee->save()) {

            foreach ($employee->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "employee",
                'action' => 'edit',
                'params' => [$employee->ListID]
            ]);

            return;
        }

        $this->flash->success("employee was updated successfully");

        $this->dispatcher->forward([
            'controller' => "employee",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a employee
     *
     * @param string $ListID
     */
    public function deleteAction($ListID)
    {
        $employee = Employee::findFirstByListID($ListID);
        if (!$employee) {
            $this->flash->error("employee was not found");

            $this->dispatcher->forward([
                'controller' => "employee",
                'action' => 'index'
            ]);

            return;
        }

        if (!$employee->delete()) {

            foreach ($employee->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "employee",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("employee was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "employee",
            'action' => "index"
        ]);
    }

}
