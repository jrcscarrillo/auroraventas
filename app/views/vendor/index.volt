<div class="page-header">
    <h1>
        Search vendor
    </h1>
    <p>
        {{ link_to("vendor/new", "Create vendor") }}
    </p>
</div>

{{ content() }}

{{ form("vendor/search", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

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
    <label for="fieldJobtitle" class="col-sm-2 control-label">JobTitle</label>
    <div class="col-sm-10">
        {{ text_field("JobTitle", "size" : 30, "class" : "form-control", "id" : "fieldJobtitle") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSuffix" class="col-sm-2 control-label">Suffix</label>
    <div class="col-sm-10">
        {{ text_field("Suffix", "size" : 30, "class" : "form-control", "id" : "fieldSuffix") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldVendoraddressAddr1" class="col-sm-2 control-label">VendorAddress Of Addr1</label>
    <div class="col-sm-10">
        {{ text_field("VendorAddress_Addr1", "size" : 30, "class" : "form-control", "id" : "fieldVendoraddressAddr1") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldVendoraddressAddr2" class="col-sm-2 control-label">VendorAddress Of Addr2</label>
    <div class="col-sm-10">
        {{ text_field("VendorAddress_Addr2", "size" : 30, "class" : "form-control", "id" : "fieldVendoraddressAddr2") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldVendoraddressAddr3" class="col-sm-2 control-label">VendorAddress Of Addr3</label>
    <div class="col-sm-10">
        {{ text_field("VendorAddress_Addr3", "size" : 30, "class" : "form-control", "id" : "fieldVendoraddressAddr3") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldVendoraddressAddr4" class="col-sm-2 control-label">VendorAddress Of Addr4</label>
    <div class="col-sm-10">
        {{ text_field("VendorAddress_Addr4", "size" : 30, "class" : "form-control", "id" : "fieldVendoraddressAddr4") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldVendoraddressAddr5" class="col-sm-2 control-label">VendorAddress Of Addr5</label>
    <div class="col-sm-10">
        {{ text_field("VendorAddress_Addr5", "size" : 30, "class" : "form-control", "id" : "fieldVendoraddressAddr5") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldVendoraddressCity" class="col-sm-2 control-label">VendorAddress Of City</label>
    <div class="col-sm-10">
        {{ text_field("VendorAddress_City", "size" : 30, "class" : "form-control", "id" : "fieldVendoraddressCity") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldVendoraddressState" class="col-sm-2 control-label">VendorAddress Of State</label>
    <div class="col-sm-10">
        {{ text_field("VendorAddress_State", "size" : 30, "class" : "form-control", "id" : "fieldVendoraddressState") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldVendoraddressPostalcode" class="col-sm-2 control-label">VendorAddress Of PostalCode</label>
    <div class="col-sm-10">
        {{ text_field("VendorAddress_PostalCode", "size" : 30, "class" : "form-control", "id" : "fieldVendoraddressPostalcode") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldVendoraddressCountry" class="col-sm-2 control-label">VendorAddress Of Country</label>
    <div class="col-sm-10">
        {{ text_field("VendorAddress_Country", "size" : 30, "class" : "form-control", "id" : "fieldVendoraddressCountry") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldVendoraddressNote" class="col-sm-2 control-label">VendorAddress Of Note</label>
    <div class="col-sm-10">
        {{ text_field("VendorAddress_Note", "size" : 30, "class" : "form-control", "id" : "fieldVendoraddressNote") }}
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
    <label for="fieldNameoncheck" class="col-sm-2 control-label">NameOnCheck</label>
    <div class="col-sm-10">
        {{ text_field("NameOnCheck", "size" : 30, "class" : "form-control", "id" : "fieldNameoncheck") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldNotes" class="col-sm-2 control-label">Notes</label>
    <div class="col-sm-10">
        {{ text_area("Notes", "cols": "30", "rows": "4", "class" : "form-control", "id" : "fieldNotes") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldAccountnumber" class="col-sm-2 control-label">AccountNumber</label>
    <div class="col-sm-10">
        {{ text_field("AccountNumber", "size" : 30, "class" : "form-control", "id" : "fieldAccountnumber") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldVendortyperefListid" class="col-sm-2 control-label">VendorTypeRef Of ListID</label>
    <div class="col-sm-10">
        {{ text_field("VendorTypeRef_ListID", "size" : 30, "class" : "form-control", "id" : "fieldVendortyperefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldVendortyperefFullname" class="col-sm-2 control-label">VendorTypeRef Of FullName</label>
    <div class="col-sm-10">
        {{ text_field("VendorTypeRef_FullName", "size" : 30, "class" : "form-control", "id" : "fieldVendortyperefFullname") }}
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
    <label for="fieldCreditlimit" class="col-sm-2 control-label">CreditLimit</label>
    <div class="col-sm-10">
        {{ text_field("CreditLimit", "type" : "numeric", "class" : "form-control", "id" : "fieldCreditlimit") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldVendortaxident" class="col-sm-2 control-label">VendorTaxIdent</label>
    <div class="col-sm-10">
        {{ text_field("VendorTaxIdent", "size" : 30, "class" : "form-control", "id" : "fieldVendortaxident") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIsvendoreligiblefor1099" class="col-sm-2 control-label">IsVendorEligibleFor1099</label>
    <div class="col-sm-10">
        {{ text_field("IsVendorEligibleFor1099", "size" : 30, "class" : "form-control", "id" : "fieldIsvendoreligiblefor1099") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldBalance" class="col-sm-2 control-label">Balance</label>
    <div class="col-sm-10">
        {{ text_field("Balance", "type" : "numeric", "class" : "form-control", "id" : "fieldBalance") }}
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
    <label for="fieldSalestaxcountry" class="col-sm-2 control-label">SalesTaxCountry</label>
    <div class="col-sm-10">
        {{ text_field("SalesTaxCountry", "size" : 30, "class" : "form-control", "id" : "fieldSalestaxcountry") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIssalestaxagency" class="col-sm-2 control-label">IsSalesTaxAgency</label>
    <div class="col-sm-10">
        {{ text_field("IsSalesTaxAgency", "size" : 30, "class" : "form-control", "id" : "fieldIssalestaxagency") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSalestaxreturnrefListid" class="col-sm-2 control-label">SalesTaxReturnRef Of ListID</label>
    <div class="col-sm-10">
        {{ text_field("SalesTaxReturnRef_ListID", "size" : 30, "class" : "form-control", "id" : "fieldSalestaxreturnrefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSalestaxreturnrefFullname" class="col-sm-2 control-label">SalesTaxReturnRef Of FullName</label>
    <div class="col-sm-10">
        {{ text_field("SalesTaxReturnRef_FullName", "size" : 30, "class" : "form-control", "id" : "fieldSalestaxreturnrefFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTaxregistrationnumber" class="col-sm-2 control-label">TaxRegistrationNumber</label>
    <div class="col-sm-10">
        {{ text_field("TaxRegistrationNumber", "size" : 30, "class" : "form-control", "id" : "fieldTaxregistrationnumber") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldReportingperiod" class="col-sm-2 control-label">ReportingPeriod</label>
    <div class="col-sm-10">
        {{ text_field("ReportingPeriod", "size" : 30, "class" : "form-control", "id" : "fieldReportingperiod") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIstaxtrackedonpurchases" class="col-sm-2 control-label">IsTaxTrackedOnPurchases</label>
    <div class="col-sm-10">
        {{ text_field("IsTaxTrackedOnPurchases", "size" : 30, "class" : "form-control", "id" : "fieldIstaxtrackedonpurchases") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTaxonpurchasesaccountrefListid" class="col-sm-2 control-label">TaxOnPurchasesAccountRef Of ListID</label>
    <div class="col-sm-10">
        {{ text_field("TaxOnPurchasesAccountRef_ListID", "size" : 30, "class" : "form-control", "id" : "fieldTaxonpurchasesaccountrefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTaxonpurchasesaccountrefFullname" class="col-sm-2 control-label">TaxOnPurchasesAccountRef Of FullName</label>
    <div class="col-sm-10">
        {{ text_field("TaxOnPurchasesAccountRef_FullName", "size" : 30, "class" : "form-control", "id" : "fieldTaxonpurchasesaccountrefFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIstaxtrackedonsales" class="col-sm-2 control-label">IsTaxTrackedOnSales</label>
    <div class="col-sm-10">
        {{ text_field("IsTaxTrackedOnSales", "size" : 30, "class" : "form-control", "id" : "fieldIstaxtrackedonsales") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTaxonsalesaccountrefListid" class="col-sm-2 control-label">TaxOnSalesAccountRef Of ListID</label>
    <div class="col-sm-10">
        {{ text_field("TaxOnSalesAccountRef_ListID", "size" : 30, "class" : "form-control", "id" : "fieldTaxonsalesaccountrefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTaxonsalesaccountrefFullname" class="col-sm-2 control-label">TaxOnSalesAccountRef Of FullName</label>
    <div class="col-sm-10">
        {{ text_field("TaxOnSalesAccountRef_FullName", "size" : 30, "class" : "form-control", "id" : "fieldTaxonsalesaccountrefFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIstaxontax" class="col-sm-2 control-label">IsTaxOnTax</label>
    <div class="col-sm-10">
        {{ text_field("IsTaxOnTax", "size" : 30, "class" : "form-control", "id" : "fieldIstaxontax") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldPrefillaccountrefListid" class="col-sm-2 control-label">PrefillAccountRef Of ListID</label>
    <div class="col-sm-10">
        {{ text_field("PrefillAccountRef_ListID", "size" : 30, "class" : "form-control", "id" : "fieldPrefillaccountrefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldPrefillaccountrefFullname" class="col-sm-2 control-label">PrefillAccountRef Of FullName</label>
    <div class="col-sm-10">
        {{ text_field("PrefillAccountRef_FullName", "size" : 30, "class" : "form-control", "id" : "fieldPrefillaccountrefFullname") }}
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


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Search', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
