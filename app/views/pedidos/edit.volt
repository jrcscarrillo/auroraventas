<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("pedidos", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Edit pedidos
    </h1>
</div>

{{ content() }}

{{ form("pedidos/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

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
    <label for="fieldSubtotal" class="col-sm-2 control-label">Subtotal</label>
    <div class="col-sm-10">
        {{ text_field("Subtotal", "type" : "numeric", "class" : "form-control", "id" : "fieldSubtotal") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSalestaxtotal" class="col-sm-2 control-label">SalesTaxTotal</label>
    <div class="col-sm-10">
        {{ text_field("SalesTaxTotal", "type" : "numeric", "class" : "form-control", "id" : "fieldSalestaxtotal") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTotalamount" class="col-sm-2 control-label">TotalAmount</label>
    <div class="col-sm-10">
        {{ text_field("TotalAmount", "type" : "numeric", "class" : "form-control", "id" : "fieldTotalamount") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIsmanuallyclosed" class="col-sm-2 control-label">IsManuallyClosed</label>
    <div class="col-sm-10">
        {{ text_field("IsManuallyClosed", "size" : 30, "class" : "form-control", "id" : "fieldIsmanuallyclosed") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIsfullyinvoiced" class="col-sm-2 control-label">IsFullyInvoiced</label>
    <div class="col-sm-10">
        {{ text_field("IsFullyInvoiced", "size" : 30, "class" : "form-control", "id" : "fieldIsfullyinvoiced") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldMemo" class="col-sm-2 control-label">Memo</label>
    <div class="col-sm-10">
        {{ text_field("Memo", "size" : 30, "class" : "form-control", "id" : "fieldMemo") }}
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
    <label for="fieldOther" class="col-sm-2 control-label">Other</label>
    <div class="col-sm-10">
        {{ text_field("Other", "size" : 30, "class" : "form-control", "id" : "fieldOther") }}
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
