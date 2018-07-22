<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("invoicelinedetail", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Edit invoicelinedetail
    </h1>
</div>

{{ content() }}

{{ form("invoicelinedetail/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

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
    <label for="fieldOverrideuomsetrefListid" class="col-sm-2 control-label">OverrideUOMSetRef Of ListID</label>
    <div class="col-sm-10">
        {{ text_field("OverrideUOMSetRef_ListID", "size" : 30, "class" : "form-control", "id" : "fieldOverrideuomsetrefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldOverrideuomsetrefFullname" class="col-sm-2 control-label">OverrideUOMSetRef Of FullName</label>
    <div class="col-sm-10">
        {{ text_field("OverrideUOMSetRef_FullName", "size" : 30, "class" : "form-control", "id" : "fieldOverrideuomsetrefFullname") }}
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
    <label for="fieldInventorysitelocationrefListid" class="col-sm-2 control-label">InventorySiteLocationRef Of ListID</label>
    <div class="col-sm-10">
        {{ text_field("InventorySiteLocationRef_ListID", "size" : 30, "class" : "form-control", "id" : "fieldInventorysitelocationrefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldInventorysitelocationrefFullname" class="col-sm-2 control-label">InventorySiteLocationRef Of FullName</label>
    <div class="col-sm-10">
        {{ text_field("InventorySiteLocationRef_FullName", "size" : 30, "class" : "form-control", "id" : "fieldInventorysitelocationrefFullname") }}
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
    <label for="fieldServicedate" class="col-sm-2 control-label">ServiceDate</label>
    <div class="col-sm-10">
        {{ text_field("ServiceDate", "size" : 30, "class" : "form-control", "id" : "fieldServicedate") }}
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
    <label for="fieldLinkedtxnid" class="col-sm-2 control-label">LinkedTxnID</label>
    <div class="col-sm-10">
        {{ text_field("LinkedTxnID", "size" : 30, "class" : "form-control", "id" : "fieldLinkedtxnid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldLinkedtxnlineid" class="col-sm-2 control-label">LinkedTxnLineID</label>
    <div class="col-sm-10">
        {{ text_field("LinkedTxnLineID", "size" : 30, "class" : "form-control", "id" : "fieldLinkedtxnlineid") }}
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
    <label for="fieldIdkey" class="col-sm-2 control-label">IDKEY</label>
    <div class="col-sm-10">
        {{ text_field("IDKEY", "size" : 30, "class" : "form-control", "id" : "fieldIdkey") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldGroupidkey" class="col-sm-2 control-label">GroupIDKEY</label>
    <div class="col-sm-10">
        {{ text_field("GroupIDKEY", "size" : 30, "class" : "form-control", "id" : "fieldGroupidkey") }}
    </div>
</div>


{{ hidden_field("id") }}

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Send', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
