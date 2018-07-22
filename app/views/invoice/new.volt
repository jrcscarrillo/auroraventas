<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("invoice", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Create invoice
    </h1>
</div>

{{ content() }}

{{ form("invoice/create", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldTxnid" class="col-sm-2 control-label">TxnID</label>
    <div class="col-sm-10">
        {{ text_field("TxnID", "size" : 30, "class" : "form-control", "id" : "fieldTxnid") }}
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
    <label for="fieldTxnnumber" class="col-sm-2 control-label">TxnNumber</label>
    <div class="col-sm-10">
        {{ text_field("TxnNumber", "type" : "numeric", "class" : "form-control", "id" : "fieldTxnnumber") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomerrefListid" class="col-sm-2 control-label">CustomerRef Of ListID</label>
    <div class="col-sm-10">
        {{ text_field("CustomerRef_ListID", "size" : 30, "class" : "form-control", "id" : "fieldCustomerrefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomerrefFullname" class="col-sm-2 control-label">CustomerRef Of FullName</label>
    <div class="col-sm-10">
        {{ text_field("CustomerRef_FullName", "size" : 30, "class" : "form-control", "id" : "fieldCustomerrefFullname") }}
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
    <label for="fieldAraccountrefListid" class="col-sm-2 control-label">ARAccountRef Of ListID</label>
    <div class="col-sm-10">
        {{ text_field("ARAccountRef_ListID", "size" : 30, "class" : "form-control", "id" : "fieldAraccountrefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldAraccountrefFullname" class="col-sm-2 control-label">ARAccountRef Of FullName</label>
    <div class="col-sm-10">
        {{ text_field("ARAccountRef_FullName", "size" : 30, "class" : "form-control", "id" : "fieldAraccountrefFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTemplaterefListid" class="col-sm-2 control-label">TemplateRef Of ListID</label>
    <div class="col-sm-10">
        {{ text_field("TemplateRef_ListID", "size" : 30, "class" : "form-control", "id" : "fieldTemplaterefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTemplaterefFullname" class="col-sm-2 control-label">TemplateRef Of FullName</label>
    <div class="col-sm-10">
        {{ text_field("TemplateRef_FullName", "size" : 30, "class" : "form-control", "id" : "fieldTemplaterefFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTxndate" class="col-sm-2 control-label">TxnDate</label>
    <div class="col-sm-10">
        {{ text_field("TxnDate", "size" : 30, "class" : "form-control", "id" : "fieldTxndate") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldRefnumber" class="col-sm-2 control-label">RefNumber</label>
    <div class="col-sm-10">
        {{ text_field("RefNumber", "size" : 30, "class" : "form-control", "id" : "fieldRefnumber") }}
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
    <label for="fieldIspending" class="col-sm-2 control-label">IsPending</label>
    <div class="col-sm-10">
        {{ text_field("IsPending", "size" : 30, "class" : "form-control", "id" : "fieldIspending") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIsfinancecharge" class="col-sm-2 control-label">IsFinanceCharge</label>
    <div class="col-sm-10">
        {{ text_field("IsFinanceCharge", "size" : 30, "class" : "form-control", "id" : "fieldIsfinancecharge") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldPonumber" class="col-sm-2 control-label">PONumber</label>
    <div class="col-sm-10">
        {{ text_field("PONumber", "size" : 30, "class" : "form-control", "id" : "fieldPonumber") }}
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
    <label for="fieldDuedate" class="col-sm-2 control-label">DueDate</label>
    <div class="col-sm-10">
        {{ text_field("DueDate", "size" : 30, "class" : "form-control", "id" : "fieldDuedate") }}
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
    <label for="fieldFob" class="col-sm-2 control-label">FOB</label>
    <div class="col-sm-10">
        {{ text_field("FOB", "size" : 30, "class" : "form-control", "id" : "fieldFob") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldShipdate" class="col-sm-2 control-label">ShipDate</label>
    <div class="col-sm-10">
        {{ text_field("ShipDate", "size" : 30, "class" : "form-control", "id" : "fieldShipdate") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldShipmethodrefListid" class="col-sm-2 control-label">ShipMethodRef Of ListID</label>
    <div class="col-sm-10">
        {{ text_field("ShipMethodRef_ListID", "size" : 30, "class" : "form-control", "id" : "fieldShipmethodrefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldShipmethodrefFullname" class="col-sm-2 control-label">ShipMethodRef Of FullName</label>
    <div class="col-sm-10">
        {{ text_field("ShipMethodRef_FullName", "size" : 30, "class" : "form-control", "id" : "fieldShipmethodrefFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSubtotal" class="col-sm-2 control-label">Subtotal</label>
    <div class="col-sm-10">
        {{ text_field("Subtotal", "type" : "numeric", "class" : "form-control", "id" : "fieldSubtotal") }}
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
    <label for="fieldSalestaxpercentage" class="col-sm-2 control-label">SalesTaxPercentage</label>
    <div class="col-sm-10">
        {{ text_field("SalesTaxPercentage", "size" : 30, "class" : "form-control", "id" : "fieldSalestaxpercentage") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSalestaxtotal" class="col-sm-2 control-label">SalesTaxTotal</label>
    <div class="col-sm-10">
        {{ text_field("SalesTaxTotal", "type" : "numeric", "class" : "form-control", "id" : "fieldSalestaxtotal") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldAppliedamount" class="col-sm-2 control-label">AppliedAmount</label>
    <div class="col-sm-10">
        {{ text_field("AppliedAmount", "type" : "numeric", "class" : "form-control", "id" : "fieldAppliedamount") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldBalanceremaining" class="col-sm-2 control-label">BalanceRemaining</label>
    <div class="col-sm-10">
        {{ text_field("BalanceRemaining", "type" : "numeric", "class" : "form-control", "id" : "fieldBalanceremaining") }}
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
    <label for="fieldExchangerate" class="col-sm-2 control-label">ExchangeRate</label>
    <div class="col-sm-10">
        {{ text_field("ExchangeRate", "size" : 30, "class" : "form-control", "id" : "fieldExchangerate") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldBalanceremaininginhomecurrency" class="col-sm-2 control-label">BalanceRemainingInHomeCurrency</label>
    <div class="col-sm-10">
        {{ text_field("BalanceRemainingInHomeCurrency", "type" : "numeric", "class" : "form-control", "id" : "fieldBalanceremaininginhomecurrency") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldMemo" class="col-sm-2 control-label">Memo</label>
    <div class="col-sm-10">
        {{ text_field("Memo", "size" : 30, "class" : "form-control", "id" : "fieldMemo") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIspaid" class="col-sm-2 control-label">IsPaID</label>
    <div class="col-sm-10">
        {{ text_field("IsPaID", "size" : 30, "class" : "form-control", "id" : "fieldIspaid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomermsgrefListid" class="col-sm-2 control-label">CustomerMsgRef Of ListID</label>
    <div class="col-sm-10">
        {{ text_field("CustomerMsgRef_ListID", "size" : 30, "class" : "form-control", "id" : "fieldCustomermsgrefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomermsgrefFullname" class="col-sm-2 control-label">CustomerMsgRef Of FullName</label>
    <div class="col-sm-10">
        {{ text_field("CustomerMsgRef_FullName", "size" : 30, "class" : "form-control", "id" : "fieldCustomermsgrefFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIstobeprinted" class="col-sm-2 control-label">IsToBePrinted</label>
    <div class="col-sm-10">
        {{ text_field("IsToBePrinted", "size" : 30, "class" : "form-control", "id" : "fieldIstobeprinted") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIstobeemailed" class="col-sm-2 control-label">IsToBeEmailed</label>
    <div class="col-sm-10">
        {{ text_field("IsToBeEmailed", "size" : 30, "class" : "form-control", "id" : "fieldIstobeemailed") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIstaxincluded" class="col-sm-2 control-label">IsTaxIncluded</label>
    <div class="col-sm-10">
        {{ text_field("IsTaxIncluded", "size" : 30, "class" : "form-control", "id" : "fieldIstaxincluded") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomersalestaxcoderefListid" class="col-sm-2 control-label">CustomerSalesTaxCodeRef Of ListID</label>
    <div class="col-sm-10">
        {{ text_field("CustomerSalesTaxCodeRef_ListID", "size" : 30, "class" : "form-control", "id" : "fieldCustomersalestaxcoderefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomersalestaxcoderefFullname" class="col-sm-2 control-label">CustomerSalesTaxCodeRef Of FullName</label>
    <div class="col-sm-10">
        {{ text_field("CustomerSalesTaxCodeRef_FullName", "size" : 30, "class" : "form-control", "id" : "fieldCustomersalestaxcoderefFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSuggesteddiscountamount" class="col-sm-2 control-label">SuggestedDiscountAmount</label>
    <div class="col-sm-10">
        {{ text_field("SuggestedDiscountAmount", "type" : "numeric", "class" : "form-control", "id" : "fieldSuggesteddiscountamount") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSuggesteddiscountdate" class="col-sm-2 control-label">SuggestedDiscountDate</label>
    <div class="col-sm-10">
        {{ text_field("SuggestedDiscountDate", "size" : 30, "class" : "form-control", "id" : "fieldSuggesteddiscountdate") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldOther" class="col-sm-2 control-label">Other</label>
    <div class="col-sm-10">
        {{ text_field("Other", "size" : 30, "class" : "form-control", "id" : "fieldOther") }}
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
        {{ submit_button('Save', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
