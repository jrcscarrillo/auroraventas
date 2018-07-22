<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("pedidosdetalle", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Edit pedidosdetalle
    </h1>
</div>

{{ content() }}

{{ form("pedidosdetalle/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldTxnlineid" class="col-sm-2 control-label">TxnLineID</label>
    <div class="col-sm-10">
        {{ text_field("TxnLineID", "size" : 30, "class" : "form-control", "id" : "fieldTxnlineid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldItemrefListid" class="col-sm-2 control-label">ItemRef Of ListID</label>
    <div class="col-sm-10">
        {{ text_field("ItemRef_ListID", "size" : 30, "class" : "form-control", "id" : "fieldItemrefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldItemrefFullname" class="col-sm-2 control-label">ItemRef Of FullName</label>
    <div class="col-sm-10">
        {{ text_field("ItemRef_FullName", "size" : 30, "class" : "form-control", "id" : "fieldItemrefFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldDescription" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
        {{ text_field("Description", "size" : 30, "class" : "form-control", "id" : "fieldDescription") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldQuantity" class="col-sm-2 control-label">Quantity</label>
    <div class="col-sm-10">
        {{ text_field("Quantity", "size" : 30, "class" : "form-control", "id" : "fieldQuantity") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldUnitofmeasure" class="col-sm-2 control-label">UnitOfMeasure</label>
    <div class="col-sm-10">
        {{ text_field("UnitOfMeasure", "size" : 30, "class" : "form-control", "id" : "fieldUnitofmeasure") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldRate" class="col-sm-2 control-label">Rate</label>
    <div class="col-sm-10">
        {{ text_field("Rate", "size" : 30, "class" : "form-control", "id" : "fieldRate") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldRatepercent" class="col-sm-2 control-label">RatePercent</label>
    <div class="col-sm-10">
        {{ text_field("RatePercent", "size" : 30, "class" : "form-control", "id" : "fieldRatepercent") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldAmount" class="col-sm-2 control-label">Amount</label>
    <div class="col-sm-10">
        {{ text_field("Amount", "type" : "numeric", "class" : "form-control", "id" : "fieldAmount") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldInventorysiterefListid" class="col-sm-2 control-label">InventorySiteRef Of ListID</label>
    <div class="col-sm-10">
        {{ text_field("InventorySiteRef_ListID", "size" : 30, "class" : "form-control", "id" : "fieldInventorysiterefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldInventorysiterefFullname" class="col-sm-2 control-label">InventorySiteRef Of FullName</label>
    <div class="col-sm-10">
        {{ text_field("InventorySiteRef_FullName", "size" : 30, "class" : "form-control", "id" : "fieldInventorysiterefFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSerialnumber" class="col-sm-2 control-label">SerialNumber</label>
    <div class="col-sm-10">
        {{ text_field("SerialNumber", "size" : 30, "class" : "form-control", "id" : "fieldSerialnumber") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldLotnumber" class="col-sm-2 control-label">LotNumber</label>
    <div class="col-sm-10">
        {{ text_field("LotNumber", "size" : 30, "class" : "form-control", "id" : "fieldLotnumber") }}
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
    <label for="fieldInvoiced" class="col-sm-2 control-label">Invoiced</label>
    <div class="col-sm-10">
        {{ text_field("Invoiced", "size" : 30, "class" : "form-control", "id" : "fieldInvoiced") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIsmanuallyclosed" class="col-sm-2 control-label">IsManuallyClosed</label>
    <div class="col-sm-10">
        {{ text_field("IsManuallyClosed", "size" : 30, "class" : "form-control", "id" : "fieldIsmanuallyclosed") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldOther1" class="col-sm-2 control-label">Other1</label>
    <div class="col-sm-10">
        {{ text_field("Other1", "size" : 30, "class" : "form-control", "id" : "fieldOther1") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldOther2" class="col-sm-2 control-label">Other2</label>
    <div class="col-sm-10">
        {{ text_field("Other2", "size" : 30, "class" : "form-control", "id" : "fieldOther2") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIdkey" class="col-sm-2 control-label">IDKEY</label>
    <div class="col-sm-10">
        {{ text_field("IDKEY", "size" : 30, "class" : "form-control", "id" : "fieldIdkey") }}
    </div>
</div>


{{ hidden_field("id") }}

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Send', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
