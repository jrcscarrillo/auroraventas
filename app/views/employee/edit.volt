<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("employee", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Edit employee
    </h1>
</div>

{{ content() }}

{{ form("employee/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldListid" class="col-sm-2 control-label">ListID</label>
    <div class="col-sm-10">
        {{ text_field("ListID", "size" : 30, "class" : "form-control", "id" : "fieldListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTimecreated" class="col-sm-2 control-label">TimeCreated</label>
    <div class="col-sm-10">
        {{ text_field("TimeCreated", "size" : 30, "class" : "form-control", "id" : "fieldTimecreated") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTimemodified" class="col-sm-2 control-label">TimeModified</label>
    <div class="col-sm-10">
        {{ text_field("TimeModified", "size" : 30, "class" : "form-control", "id" : "fieldTimemodified") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEditsequence" class="col-sm-2 control-label">EditSequence</label>
    <div class="col-sm-10">
        {{ text_field("EditSequence", "type" : "numeric", "class" : "form-control", "id" : "fieldEditsequence") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldName" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
        {{ text_field("Name", "size" : 30, "class" : "form-control", "id" : "fieldName") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIsactive" class="col-sm-2 control-label">IsActive</label>
    <div class="col-sm-10">
        {{ text_field("IsActive", "size" : 30, "class" : "form-control", "id" : "fieldIsactive") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSalutation" class="col-sm-2 control-label">Salutation</label>
    <div class="col-sm-10">
        {{ text_field("Salutation", "size" : 30, "class" : "form-control", "id" : "fieldSalutation") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldFirstname" class="col-sm-2 control-label">FirstName</label>
    <div class="col-sm-10">
        {{ text_field("FirstName", "size" : 30, "class" : "form-control", "id" : "fieldFirstname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldMiddlename" class="col-sm-2 control-label">MiddleName</label>
    <div class="col-sm-10">
        {{ text_field("MiddleName", "size" : 30, "class" : "form-control", "id" : "fieldMiddlename") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldLastname" class="col-sm-2 control-label">LastName</label>
    <div class="col-sm-10">
        {{ text_field("LastName", "size" : 30, "class" : "form-control", "id" : "fieldLastname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSuffix" class="col-sm-2 control-label">Suffix</label>
    <div class="col-sm-10">
        {{ text_field("Suffix", "size" : 30, "class" : "form-control", "id" : "fieldSuffix") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldJobtitle" class="col-sm-2 control-label">JobTitle</label>
    <div class="col-sm-10">
        {{ text_field("JobTitle", "size" : 30, "class" : "form-control", "id" : "fieldJobtitle") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSupervisorrefListid" class="col-sm-2 control-label">SupervisorRef Of ListID</label>
    <div class="col-sm-10">
        {{ text_field("SupervisorRef_ListID", "size" : 30, "class" : "form-control", "id" : "fieldSupervisorrefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSupervisorrefFullname" class="col-sm-2 control-label">SupervisorRef Of FullName</label>
    <div class="col-sm-10">
        {{ text_field("SupervisorRef_FullName", "size" : 30, "class" : "form-control", "id" : "fieldSupervisorrefFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldDepartment" class="col-sm-2 control-label">Department</label>
    <div class="col-sm-10">
        {{ text_field("Department", "size" : 30, "class" : "form-control", "id" : "fieldDepartment") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldDescription" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
        {{ text_field("Description", "size" : 30, "class" : "form-control", "id" : "fieldDescription") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTargetbonus" class="col-sm-2 control-label">TargetBonus</label>
    <div class="col-sm-10">
        {{ text_field("TargetBonus", "type" : "numeric", "class" : "form-control", "id" : "fieldTargetbonus") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEmployeeaddressAddr1" class="col-sm-2 control-label">EmployeeAddress Of Addr1</label>
    <div class="col-sm-10">
        {{ text_field("EmployeeAddress_Addr1", "size" : 30, "class" : "form-control", "id" : "fieldEmployeeaddressAddr1") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEmployeeaddressAddr2" class="col-sm-2 control-label">EmployeeAddress Of Addr2</label>
    <div class="col-sm-10">
        {{ text_field("EmployeeAddress_Addr2", "size" : 30, "class" : "form-control", "id" : "fieldEmployeeaddressAddr2") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEmployeeaddressAddr3" class="col-sm-2 control-label">EmployeeAddress Of Addr3</label>
    <div class="col-sm-10">
        {{ text_field("EmployeeAddress_Addr3", "size" : 30, "class" : "form-control", "id" : "fieldEmployeeaddressAddr3") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEmployeeaddressAddr4" class="col-sm-2 control-label">EmployeeAddress Of Addr4</label>
    <div class="col-sm-10">
        {{ text_field("EmployeeAddress_Addr4", "size" : 30, "class" : "form-control", "id" : "fieldEmployeeaddressAddr4") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEmployeeaddressCity" class="col-sm-2 control-label">EmployeeAddress Of City</label>
    <div class="col-sm-10">
        {{ text_field("EmployeeAddress_City", "size" : 30, "class" : "form-control", "id" : "fieldEmployeeaddressCity") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEmployeeaddressState" class="col-sm-2 control-label">EmployeeAddress Of State</label>
    <div class="col-sm-10">
        {{ text_field("EmployeeAddress_State", "size" : 30, "class" : "form-control", "id" : "fieldEmployeeaddressState") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEmployeeaddressPostalcode" class="col-sm-2 control-label">EmployeeAddress Of PostalCode</label>
    <div class="col-sm-10">
        {{ text_field("EmployeeAddress_PostalCode", "size" : 30, "class" : "form-control", "id" : "fieldEmployeeaddressPostalcode") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEmployeeaddressCountry" class="col-sm-2 control-label">EmployeeAddress Of Country</label>
    <div class="col-sm-10">
        {{ text_field("EmployeeAddress_Country", "size" : 30, "class" : "form-control", "id" : "fieldEmployeeaddressCountry") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldPrintas" class="col-sm-2 control-label">PrintAs</label>
    <div class="col-sm-10">
        {{ text_field("PrintAs", "size" : 30, "class" : "form-control", "id" : "fieldPrintas") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldPhone" class="col-sm-2 control-label">Phone</label>
    <div class="col-sm-10">
        {{ text_field("Phone", "size" : 30, "class" : "form-control", "id" : "fieldPhone") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldMobile" class="col-sm-2 control-label">Mobile</label>
    <div class="col-sm-10">
        {{ text_field("Mobile", "size" : 30, "class" : "form-control", "id" : "fieldMobile") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldPager" class="col-sm-2 control-label">Pager</label>
    <div class="col-sm-10">
        {{ text_field("Pager", "size" : 30, "class" : "form-control", "id" : "fieldPager") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldPagerpin" class="col-sm-2 control-label">PagerPIN</label>
    <div class="col-sm-10">
        {{ text_field("PagerPIN", "size" : 30, "class" : "form-control", "id" : "fieldPagerpin") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldAltphone" class="col-sm-2 control-label">AltPhone</label>
    <div class="col-sm-10">
        {{ text_field("AltPhone", "size" : 30, "class" : "form-control", "id" : "fieldAltphone") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldFax" class="col-sm-2 control-label">Fax</label>
    <div class="col-sm-10">
        {{ text_field("Fax", "size" : 30, "class" : "form-control", "id" : "fieldFax") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSsn" class="col-sm-2 control-label">SSN</label>
    <div class="col-sm-10">
        {{ text_field("SSN", "size" : 30, "class" : "form-control", "id" : "fieldSsn") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEmail" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
        {{ text_field("Email", "size" : 30, "class" : "form-control", "id" : "fieldEmail") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEmergencycontactprimaryname" class="col-sm-2 control-label">EmergencyContactPrimaryName</label>
    <div class="col-sm-10">
        {{ text_field("EmergencyContactPrimaryName", "size" : 30, "class" : "form-control", "id" : "fieldEmergencycontactprimaryname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEmergencycontactprimaryvalue" class="col-sm-2 control-label">EmergencyContactPrimaryValue</label>
    <div class="col-sm-10">
        {{ text_field("EmergencyContactPrimaryValue", "size" : 30, "class" : "form-control", "id" : "fieldEmergencycontactprimaryvalue") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEmergencycontactprimaryrelation" class="col-sm-2 control-label">EmergencyContactPrimaryRelation</label>
    <div class="col-sm-10">
        {{ text_field("EmergencyContactPrimaryRelation", "size" : 30, "class" : "form-control", "id" : "fieldEmergencycontactprimaryrelation") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEmergencycontactsecondaryname" class="col-sm-2 control-label">EmergencyContactSecondaryName</label>
    <div class="col-sm-10">
        {{ text_field("EmergencyContactSecondaryName", "size" : 30, "class" : "form-control", "id" : "fieldEmergencycontactsecondaryname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEmergencycontactsecondaryvalue" class="col-sm-2 control-label">EmergencyContactSecondaryValue</label>
    <div class="col-sm-10">
        {{ text_field("EmergencyContactSecondaryValue", "size" : 30, "class" : "form-control", "id" : "fieldEmergencycontactsecondaryvalue") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEmergencycontactsecondaryrelation" class="col-sm-2 control-label">EmergencyContactSecondaryRelation</label>
    <div class="col-sm-10">
        {{ text_field("EmergencyContactSecondaryRelation", "size" : 30, "class" : "form-control", "id" : "fieldEmergencycontactsecondaryrelation") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEmployeetype" class="col-sm-2 control-label">EmployeeType</label>
    <div class="col-sm-10">
        {{ text_field("EmployeeType", "size" : 30, "class" : "form-control", "id" : "fieldEmployeetype") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldGender" class="col-sm-2 control-label">Gender</label>
    <div class="col-sm-10">
        {{ text_field("Gender", "size" : 30, "class" : "form-control", "id" : "fieldGender") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldPartorfulltime" class="col-sm-2 control-label">PartOrFullTime</label>
    <div class="col-sm-10">
        {{ text_field("PartOrFullTime", "size" : 30, "class" : "form-control", "id" : "fieldPartorfulltime") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldExempt" class="col-sm-2 control-label">Exempt</label>
    <div class="col-sm-10">
        {{ text_field("Exempt", "size" : 30, "class" : "form-control", "id" : "fieldExempt") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldKeyemployee" class="col-sm-2 control-label">KeyEmployee</label>
    <div class="col-sm-10">
        {{ text_field("KeyEmployee", "size" : 30, "class" : "form-control", "id" : "fieldKeyemployee") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldHireddate" class="col-sm-2 control-label">HiredDate</label>
    <div class="col-sm-10">
        {{ text_field("HiredDate", "size" : 30, "class" : "form-control", "id" : "fieldHireddate") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldOriginalhiredate" class="col-sm-2 control-label">OriginalHireDate</label>
    <div class="col-sm-10">
        {{ text_field("OriginalHireDate", "size" : 30, "class" : "form-control", "id" : "fieldOriginalhiredate") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldAdjustedservicedate" class="col-sm-2 control-label">AdjustedServiceDate</label>
    <div class="col-sm-10">
        {{ text_field("AdjustedServiceDate", "size" : 30, "class" : "form-control", "id" : "fieldAdjustedservicedate") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldReleaseddate" class="col-sm-2 control-label">ReleasedDate</label>
    <div class="col-sm-10">
        {{ text_field("ReleasedDate", "size" : 30, "class" : "form-control", "id" : "fieldReleaseddate") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldBirthdate" class="col-sm-2 control-label">BirthDate</label>
    <div class="col-sm-10">
        {{ text_field("BirthDate", "size" : 30, "class" : "form-control", "id" : "fieldBirthdate") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldUscitizen" class="col-sm-2 control-label">USCitizen</label>
    <div class="col-sm-10">
        {{ text_field("USCitizen", "size" : 30, "class" : "form-control", "id" : "fieldUscitizen") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEthnicity" class="col-sm-2 control-label">Ethnicity</label>
    <div class="col-sm-10">
        {{ text_field("Ethnicity", "size" : 30, "class" : "form-control", "id" : "fieldEthnicity") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldDisabled" class="col-sm-2 control-label">Disabled</label>
    <div class="col-sm-10">
        {{ text_field("Disabled", "size" : 30, "class" : "form-control", "id" : "fieldDisabled") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldDisabilitydesc" class="col-sm-2 control-label">DisabilityDesc</label>
    <div class="col-sm-10">
        {{ text_field("DisabilityDesc", "size" : 30, "class" : "form-control", "id" : "fieldDisabilitydesc") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldOnfile" class="col-sm-2 control-label">OnFile</label>
    <div class="col-sm-10">
        {{ text_field("OnFile", "size" : 30, "class" : "form-control", "id" : "fieldOnfile") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldWorkauthexpiredate" class="col-sm-2 control-label">WorkAuthExpireDate</label>
    <div class="col-sm-10">
        {{ text_field("WorkAuthExpireDate", "size" : 30, "class" : "form-control", "id" : "fieldWorkauthexpiredate") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldUsveteran" class="col-sm-2 control-label">USVeteran</label>
    <div class="col-sm-10">
        {{ text_field("USVeteran", "size" : 30, "class" : "form-control", "id" : "fieldUsveteran") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldMilitarystatus" class="col-sm-2 control-label">MilitaryStatus</label>
    <div class="col-sm-10">
        {{ text_field("MilitaryStatus", "size" : 30, "class" : "form-control", "id" : "fieldMilitarystatus") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldAccountnumber" class="col-sm-2 control-label">AccountNumber</label>
    <div class="col-sm-10">
        {{ text_field("AccountNumber", "size" : 30, "class" : "form-control", "id" : "fieldAccountnumber") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldNotes" class="col-sm-2 control-label">Notes</label>
    <div class="col-sm-10">
        {{ text_field("Notes", "size" : 30, "class" : "form-control", "id" : "fieldNotes") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldBillingraterefListid" class="col-sm-2 control-label">BillingRateRef Of ListID</label>
    <div class="col-sm-10">
        {{ text_field("BillingRateRef_ListID", "size" : 30, "class" : "form-control", "id" : "fieldBillingraterefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldBillingraterefFullname" class="col-sm-2 control-label">BillingRateRef Of FullName</label>
    <div class="col-sm-10">
        {{ text_field("BillingRateRef_FullName", "size" : 30, "class" : "form-control", "id" : "fieldBillingraterefFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomfield1" class="col-sm-2 control-label">CustomField1</label>
    <div class="col-sm-10">
        {{ text_field("CustomField1", "size" : 30, "class" : "form-control", "id" : "fieldCustomfield1") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomfield2" class="col-sm-2 control-label">CustomField2</label>
    <div class="col-sm-10">
        {{ text_field("CustomField2", "size" : 30, "class" : "form-control", "id" : "fieldCustomfield2") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomfield3" class="col-sm-2 control-label">CustomField3</label>
    <div class="col-sm-10">
        {{ text_field("CustomField3", "size" : 30, "class" : "form-control", "id" : "fieldCustomfield3") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomfield4" class="col-sm-2 control-label">CustomField4</label>
    <div class="col-sm-10">
        {{ text_field("CustomField4", "size" : 30, "class" : "form-control", "id" : "fieldCustomfield4") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomfield5" class="col-sm-2 control-label">CustomField5</label>
    <div class="col-sm-10">
        {{ text_field("CustomField5", "size" : 30, "class" : "form-control", "id" : "fieldCustomfield5") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomfield6" class="col-sm-2 control-label">CustomField6</label>
    <div class="col-sm-10">
        {{ text_field("CustomField6", "size" : 30, "class" : "form-control", "id" : "fieldCustomfield6") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomfield7" class="col-sm-2 control-label">CustomField7</label>
    <div class="col-sm-10">
        {{ text_field("CustomField7", "size" : 30, "class" : "form-control", "id" : "fieldCustomfield7") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomfield8" class="col-sm-2 control-label">CustomField8</label>
    <div class="col-sm-10">
        {{ text_field("CustomField8", "size" : 30, "class" : "form-control", "id" : "fieldCustomfield8") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomfield9" class="col-sm-2 control-label">CustomField9</label>
    <div class="col-sm-10">
        {{ text_field("CustomField9", "size" : 30, "class" : "form-control", "id" : "fieldCustomfield9") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomfield10" class="col-sm-2 control-label">CustomField10</label>
    <div class="col-sm-10">
        {{ text_field("CustomField10", "size" : 30, "class" : "form-control", "id" : "fieldCustomfield10") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomfield11" class="col-sm-2 control-label">CustomField11</label>
    <div class="col-sm-10">
        {{ text_field("CustomField11", "size" : 30, "class" : "form-control", "id" : "fieldCustomfield11") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomfield12" class="col-sm-2 control-label">CustomField12</label>
    <div class="col-sm-10">
        {{ text_field("CustomField12", "size" : 30, "class" : "form-control", "id" : "fieldCustomfield12") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomfield13" class="col-sm-2 control-label">CustomField13</label>
    <div class="col-sm-10">
        {{ text_field("CustomField13", "size" : 30, "class" : "form-control", "id" : "fieldCustomfield13") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomfield14" class="col-sm-2 control-label">CustomField14</label>
    <div class="col-sm-10">
        {{ text_field("CustomField14", "size" : 30, "class" : "form-control", "id" : "fieldCustomfield14") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomfield15" class="col-sm-2 control-label">CustomField15</label>
    <div class="col-sm-10">
        {{ text_field("CustomField15", "size" : 30, "class" : "form-control", "id" : "fieldCustomfield15") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldStatus" class="col-sm-2 control-label">Status</label>
    <div class="col-sm-10">
        {{ text_field("Status", "size" : 30, "class" : "form-control", "id" : "fieldStatus") }}
    </div>
</div>


{{ hidden_field("id") }}

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Send', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
