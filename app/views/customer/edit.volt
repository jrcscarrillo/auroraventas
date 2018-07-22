<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("customer", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Edit customer
    </h1>
</div>

{{ content() }}

{{ form("customer/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

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
    <label for="fieldSuffix" class="col-sm-2 control-label">Suffix</label>
    <div class="col-sm-10">
        {{ text_field("Suffix", "size" : 30, "class" : "form-control", "id" : "fieldSuffix") }}
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
    <label for="fieldShipaddressAddr1" class="col-sm-2 control-label">ShipAddress Of Addr1</label>
    <div class="col-sm-10">
        {{ text_field("ShipAddress_Addr1", "size" : 30, "class" : "form-control", "id" : "fieldShipaddressAddr1") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldShipaddressAddr2" class="col-sm-2 control-label">ShipAddress Of Addr2</label>
    <div class="col-sm-10">
        {{ text_field("ShipAddress_Addr2", "size" : 30, "class" : "form-control", "id" : "fieldShipaddressAddr2") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldShipaddressAddr3" class="col-sm-2 control-label">ShipAddress Of Addr3</label>
    <div class="col-sm-10">
        {{ text_field("ShipAddress_Addr3", "size" : 30, "class" : "form-control", "id" : "fieldShipaddressAddr3") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldShipaddressAddr4" class="col-sm-2 control-label">ShipAddress Of Addr4</label>
    <div class="col-sm-10">
        {{ text_field("ShipAddress_Addr4", "size" : 30, "class" : "form-control", "id" : "fieldShipaddressAddr4") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldShipaddressAddr5" class="col-sm-2 control-label">ShipAddress Of Addr5</label>
    <div class="col-sm-10">
        {{ text_field("ShipAddress_Addr5", "size" : 30, "class" : "form-control", "id" : "fieldShipaddressAddr5") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldShipaddressCity" class="col-sm-2 control-label">ShipAddress Of City</label>
    <div class="col-sm-10">
        {{ text_field("ShipAddress_City", "size" : 30, "class" : "form-control", "id" : "fieldShipaddressCity") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldShipaddressState" class="col-sm-2 control-label">ShipAddress Of State</label>
    <div class="col-sm-10">
        {{ text_field("ShipAddress_State", "size" : 30, "class" : "form-control", "id" : "fieldShipaddressState") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldShipaddressPostalcode" class="col-sm-2 control-label">ShipAddress Of PostalCode</label>
    <div class="col-sm-10">
        {{ text_field("ShipAddress_PostalCode", "size" : 30, "class" : "form-control", "id" : "fieldShipaddressPostalcode") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldShipaddressCountry" class="col-sm-2 control-label">ShipAddress Of Country</label>
    <div class="col-sm-10">
        {{ text_field("ShipAddress_Country", "size" : 30, "class" : "form-control", "id" : "fieldShipaddressCountry") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldShipaddressNote" class="col-sm-2 control-label">ShipAddress Of Note</label>
    <div class="col-sm-10">
        {{ text_field("ShipAddress_Note", "size" : 30, "class" : "form-control", "id" : "fieldShipaddressNote") }}
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
    <label for="fieldSalestaxcoderefListid" class="col-sm-2 control-label">SalesTaxCodeRef Of ListID</label>
    <div class="col-sm-10">
        {{ text_field("SalesTaxCodeRef_ListID", "size" : 30, "class" : "form-control", "id" : "fieldSalestaxcoderefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSalestaxcoderefFullname" class="col-sm-2 control-label">SalesTaxCodeRef Of FullName</label>
    <div class="col-sm-10">
        {{ text_field("SalesTaxCodeRef_FullName", "size" : 30, "class" : "form-control", "id" : "fieldSalestaxcoderefFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldItemsalestaxrefListid" class="col-sm-2 control-label">ItemSalesTaxRef Of ListID</label>
    <div class="col-sm-10">
        {{ text_field("ItemSalesTaxRef_ListID", "size" : 30, "class" : "form-control", "id" : "fieldItemsalestaxrefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldItemsalestaxrefFullname" class="col-sm-2 control-label">ItemSalesTaxRef Of FullName</label>
    <div class="col-sm-10">
        {{ text_field("ItemSalesTaxRef_FullName", "size" : 30, "class" : "form-control", "id" : "fieldItemsalestaxrefFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSalestaxcountry" class="col-sm-2 control-label">SalesTaxCountry</label>
    <div class="col-sm-10">
        {{ text_field("SalesTaxCountry", "size" : 30, "class" : "form-control", "id" : "fieldSalestaxcountry") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldResalenumber" class="col-sm-2 control-label">ResaleNumber</label>
    <div class="col-sm-10">
        {{ text_field("ResaleNumber", "size" : 30, "class" : "form-control", "id" : "fieldResalenumber") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldAccountnumber" class="col-sm-2 control-label">AccountNumber</label>
    <div class="col-sm-10">
        {{ text_field("AccountNumber", "size" : 30, "class" : "form-control", "id" : "fieldAccountnumber") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCreditlimit" class="col-sm-2 control-label">CreditLimit</label>
    <div class="col-sm-10">
        {{ text_field("CreditLimit", "type" : "numeric", "class" : "form-control", "id" : "fieldCreditlimit") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldPreferredpaymentmethodrefListid" class="col-sm-2 control-label">PreferredPaymentMethodRef Of ListID</label>
    <div class="col-sm-10">
        {{ text_field("PreferredPaymentMethodRef_ListID", "size" : 30, "class" : "form-control", "id" : "fieldPreferredpaymentmethodrefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldPreferredpaymentmethodrefFullname" class="col-sm-2 control-label">PreferredPaymentMethodRef Of FullName</label>
    <div class="col-sm-10">
        {{ text_field("PreferredPaymentMethodRef_FullName", "size" : 30, "class" : "form-control", "id" : "fieldPreferredpaymentmethodrefFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCreditcardnumber" class="col-sm-2 control-label">CreditCardNumber</label>
    <div class="col-sm-10">
        {{ text_field("CreditCardNumber", "size" : 30, "class" : "form-control", "id" : "fieldCreditcardnumber") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldExpirationmonth" class="col-sm-2 control-label">ExpirationMonth</label>
    <div class="col-sm-10">
        {{ text_field("ExpirationMonth", "type" : "numeric", "class" : "form-control", "id" : "fieldExpirationmonth") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldExpirationyear" class="col-sm-2 control-label">ExpirationYear</label>
    <div class="col-sm-10">
        {{ text_field("ExpirationYear", "type" : "numeric", "class" : "form-control", "id" : "fieldExpirationyear") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldNameoncard" class="col-sm-2 control-label">NameOnCard</label>
    <div class="col-sm-10">
        {{ text_field("NameOnCard", "size" : 30, "class" : "form-control", "id" : "fieldNameoncard") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCreditcardaddress" class="col-sm-2 control-label">CreditCardAddress</label>
    <div class="col-sm-10">
        {{ text_field("CreditCardAddress", "size" : 30, "class" : "form-control", "id" : "fieldCreditcardaddress") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCreditcardpostalcode" class="col-sm-2 control-label">CreditCardPostalCode</label>
    <div class="col-sm-10">
        {{ text_field("CreditCardPostalCode", "size" : 30, "class" : "form-control", "id" : "fieldCreditcardpostalcode") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldJobstatus" class="col-sm-2 control-label">JobStatus</label>
    <div class="col-sm-10">
        {{ text_field("JobStatus", "size" : 30, "class" : "form-control", "id" : "fieldJobstatus") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldJobstartdate" class="col-sm-2 control-label">JobStartDate</label>
    <div class="col-sm-10">
        {{ text_field("JobStartDate", "size" : 30, "class" : "form-control", "id" : "fieldJobstartdate") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldJobprojectedenddate" class="col-sm-2 control-label">JobProjectedEndDate</label>
    <div class="col-sm-10">
        {{ text_field("JobProjectedEndDate", "size" : 30, "class" : "form-control", "id" : "fieldJobprojectedenddate") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldJobenddate" class="col-sm-2 control-label">JobEndDate</label>
    <div class="col-sm-10">
        {{ text_field("JobEndDate", "size" : 30, "class" : "form-control", "id" : "fieldJobenddate") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldJobdesc" class="col-sm-2 control-label">JobDesc</label>
    <div class="col-sm-10">
        {{ text_field("JobDesc", "size" : 30, "class" : "form-control", "id" : "fieldJobdesc") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldJobtyperefListid" class="col-sm-2 control-label">JobTypeRef Of ListID</label>
    <div class="col-sm-10">
        {{ text_field("JobTypeRef_ListID", "size" : 30, "class" : "form-control", "id" : "fieldJobtyperefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldJobtyperefFullname" class="col-sm-2 control-label">JobTypeRef Of FullName</label>
    <div class="col-sm-10">
        {{ text_field("JobTypeRef_FullName", "size" : 30, "class" : "form-control", "id" : "fieldJobtyperefFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldNotes" class="col-sm-2 control-label">Notes</label>
    <div class="col-sm-10">
        {{ text_field("Notes", "size" : 30, "class" : "form-control", "id" : "fieldNotes") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldPricelevelrefListid" class="col-sm-2 control-label">PriceLevelRef Of ListID</label>
    <div class="col-sm-10">
        {{ text_field("PriceLevelRef_ListID", "size" : 30, "class" : "form-control", "id" : "fieldPricelevelrefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldPricelevelrefFullname" class="col-sm-2 control-label">PriceLevelRef Of FullName</label>
    <div class="col-sm-10">
        {{ text_field("PriceLevelRef_FullName", "size" : 30, "class" : "form-control", "id" : "fieldPricelevelrefFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTaxregistrationnumber" class="col-sm-2 control-label">TaxRegistrationNumber</label>
    <div class="col-sm-10">
        {{ text_field("TaxRegistrationNumber", "size" : 30, "class" : "form-control", "id" : "fieldTaxregistrationnumber") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCurrencyrefListid" class="col-sm-2 control-label">CurrencyRef Of ListID</label>
    <div class="col-sm-10">
        {{ text_field("CurrencyRef_ListID", "size" : 30, "class" : "form-control", "id" : "fieldCurrencyrefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCurrencyrefFullname" class="col-sm-2 control-label">CurrencyRef Of FullName</label>
    <div class="col-sm-10">
        {{ text_field("CurrencyRef_FullName", "size" : 30, "class" : "form-control", "id" : "fieldCurrencyrefFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIsstatementwithparent" class="col-sm-2 control-label">IsStatementWithParent</label>
    <div class="col-sm-10">
        {{ text_field("IsStatementWithParent", "size" : 30, "class" : "form-control", "id" : "fieldIsstatementwithparent") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldPreferreddeliverymethod" class="col-sm-2 control-label">PreferredDeliveryMethod</label>
    <div class="col-sm-10">
        {{ text_field("PreferredDeliveryMethod", "size" : 30, "class" : "form-control", "id" : "fieldPreferreddeliverymethod") }}
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
