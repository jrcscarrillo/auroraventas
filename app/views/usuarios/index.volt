<div class="page-header">
    <h1>
        Search usuarios
    </h1>
    <p>
        {{ link_to("usuarios/new", "Create usuarios") }}
    </p>
</div>

{{ content() }}

{{ form("usuarios/search", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

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
    <label for="fieldUsername" class="col-sm-2 control-label">UserName</label>
    <div class="col-sm-10">
        {{ text_field("UserName", "size" : 30, "class" : "form-control", "id" : "fieldUsername") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldFullname" class="col-sm-2 control-label">FullName</label>
    <div class="col-sm-10">
        {{ text_field("FullName", "size" : 30, "class" : "form-control", "id" : "fieldFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIsactive" class="col-sm-2 control-label">IsActive</label>
    <div class="col-sm-10">
        {{ text_field("IsActive", "size" : 30, "class" : "form-control", "id" : "fieldIsactive") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldClassrefListid" class="col-sm-2 control-label">ClassRef Of ListID</label>
    <div class="col-sm-10">
        {{ text_field("ClassRef_ListID", "size" : 30, "class" : "form-control", "id" : "fieldClassrefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldClassrefFullname" class="col-sm-2 control-label">ClassRef Of FullName</label>
    <div class="col-sm-10">
        {{ text_field("ClassRef_FullName", "size" : 30, "class" : "form-control", "id" : "fieldClassrefFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldParentrefListid" class="col-sm-2 control-label">ParentRef Of ListID</label>
    <div class="col-sm-10">
        {{ text_field("ParentRef_ListID", "size" : 30, "class" : "form-control", "id" : "fieldParentrefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldParentrefFullname" class="col-sm-2 control-label">ParentRef Of FullName</label>
    <div class="col-sm-10">
        {{ text_field("ParentRef_FullName", "size" : 30, "class" : "form-control", "id" : "fieldParentrefFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSublevel" class="col-sm-2 control-label">Sublevel</label>
    <div class="col-sm-10">
        {{ text_field("Sublevel", "type" : "numeric", "class" : "form-control", "id" : "fieldSublevel") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCompanyname" class="col-sm-2 control-label">CompanyName</label>
    <div class="col-sm-10">
        {{ text_field("CompanyName", "size" : 30, "class" : "form-control", "id" : "fieldCompanyname") }}
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
    <label for="fieldPassword" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
        {{ text_field("Password", "size" : 30, "class" : "form-control", "id" : "fieldPassword") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldBilladdressAddr1" class="col-sm-2 control-label">BillAddress Of Addr1</label>
    <div class="col-sm-10">
        {{ text_field("BillAddress_Addr1", "size" : 30, "class" : "form-control", "id" : "fieldBilladdressAddr1") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldBilladdressAddr2" class="col-sm-2 control-label">BillAddress Of Addr2</label>
    <div class="col-sm-10">
        {{ text_field("BillAddress_Addr2", "size" : 30, "class" : "form-control", "id" : "fieldBilladdressAddr2") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldBilladdressAddr3" class="col-sm-2 control-label">BillAddress Of Addr3</label>
    <div class="col-sm-10">
        {{ text_field("BillAddress_Addr3", "size" : 30, "class" : "form-control", "id" : "fieldBilladdressAddr3") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldBilladdressAddr4" class="col-sm-2 control-label">BillAddress Of Addr4</label>
    <div class="col-sm-10">
        {{ text_field("BillAddress_Addr4", "size" : 30, "class" : "form-control", "id" : "fieldBilladdressAddr4") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldBilladdressAddr5" class="col-sm-2 control-label">BillAddress Of Addr5</label>
    <div class="col-sm-10">
        {{ text_field("BillAddress_Addr5", "size" : 30, "class" : "form-control", "id" : "fieldBilladdressAddr5") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldBilladdressCity" class="col-sm-2 control-label">BillAddress Of City</label>
    <div class="col-sm-10">
        {{ text_field("BillAddress_City", "size" : 30, "class" : "form-control", "id" : "fieldBilladdressCity") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldBilladdressState" class="col-sm-2 control-label">BillAddress Of State</label>
    <div class="col-sm-10">
        {{ text_field("BillAddress_State", "size" : 30, "class" : "form-control", "id" : "fieldBilladdressState") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldBilladdressPostalcode" class="col-sm-2 control-label">BillAddress Of PostalCode</label>
    <div class="col-sm-10">
        {{ text_field("BillAddress_PostalCode", "size" : 30, "class" : "form-control", "id" : "fieldBilladdressPostalcode") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldBilladdressCountry" class="col-sm-2 control-label">BillAddress Of Country</label>
    <div class="col-sm-10">
        {{ text_field("BillAddress_Country", "size" : 30, "class" : "form-control", "id" : "fieldBilladdressCountry") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldBilladdressNote" class="col-sm-2 control-label">BillAddress Of Note</label>
    <div class="col-sm-10">
        {{ text_field("BillAddress_Note", "size" : 30, "class" : "form-control", "id" : "fieldBilladdressNote") }}
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
    <label for="fieldEmail" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
        {{ text_field("Email", "size" : 30, "class" : "form-control", "id" : "fieldEmail") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCc" class="col-sm-2 control-label">Cc</label>
    <div class="col-sm-10">
        {{ text_field("Cc", "size" : 30, "class" : "form-control", "id" : "fieldCc") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldContact" class="col-sm-2 control-label">Contact</label>
    <div class="col-sm-10">
        {{ text_field("Contact", "size" : 30, "class" : "form-control", "id" : "fieldContact") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldAltcontact" class="col-sm-2 control-label">AltContact</label>
    <div class="col-sm-10">
        {{ text_field("AltContact", "size" : 30, "class" : "form-control", "id" : "fieldAltcontact") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomertyperefListid" class="col-sm-2 control-label">CustomerTypeRef Of ListID</label>
    <div class="col-sm-10">
        {{ text_field("CustomerTypeRef_ListID", "size" : 30, "class" : "form-control", "id" : "fieldCustomertyperefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomertyperefFullname" class="col-sm-2 control-label">CustomerTypeRef Of FullName</label>
    <div class="col-sm-10">
        {{ text_field("CustomerTypeRef_FullName", "size" : 30, "class" : "form-control", "id" : "fieldCustomertyperefFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTermsrefListid" class="col-sm-2 control-label">TermsRef Of ListID</label>
    <div class="col-sm-10">
        {{ text_field("TermsRef_ListID", "size" : 30, "class" : "form-control", "id" : "fieldTermsrefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTermsrefFullname" class="col-sm-2 control-label">TermsRef Of FullName</label>
    <div class="col-sm-10">
        {{ text_field("TermsRef_FullName", "size" : 30, "class" : "form-control", "id" : "fieldTermsrefFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSalesreprefListid" class="col-sm-2 control-label">SalesRepRef Of ListID</label>
    <div class="col-sm-10">
        {{ text_field("SalesRepRef_ListID", "size" : 30, "class" : "form-control", "id" : "fieldSalesreprefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSalesreprefFullname" class="col-sm-2 control-label">SalesRepRef Of FullName</label>
    <div class="col-sm-10">
        {{ text_field("SalesRepRef_FullName", "size" : 30, "class" : "form-control", "id" : "fieldSalesreprefFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldBalance" class="col-sm-2 control-label">Balance</label>
    <div class="col-sm-10">
        {{ text_field("Balance", "type" : "numeric", "class" : "form-control", "id" : "fieldBalance") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTotalbalance" class="col-sm-2 control-label">TotalBalance</label>
    <div class="col-sm-10">
        {{ text_field("TotalBalance", "type" : "numeric", "class" : "form-control", "id" : "fieldTotalbalance") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCreditlimit" class="col-sm-2 control-label">CreditLimit</label>
    <div class="col-sm-10">
        {{ text_field("CreditLimit", "type" : "numeric", "class" : "form-control", "id" : "fieldCreditlimit") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTipoid" class="col-sm-2 control-label">TipoID</label>
    <div class="col-sm-10">
        {{ text_field("TipoID", "size" : 30, "class" : "form-control", "id" : "fieldTipoid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldNumeroid" class="col-sm-2 control-label">NumeroID</label>
    <div class="col-sm-10">
        {{ text_field("NumeroID", "size" : 30, "class" : "form-control", "id" : "fieldNumeroid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldNotes" class="col-sm-2 control-label">Notes</label>
    <div class="col-sm-10">
        {{ text_field("Notes", "size" : 30, "class" : "form-control", "id" : "fieldNotes") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldStatus" class="col-sm-2 control-label">Status</label>
    <div class="col-sm-10">
        {{ text_field("Status", "size" : 30, "class" : "form-control", "id" : "fieldStatus") }}
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Search', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
