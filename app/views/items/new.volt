<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("items", "Retroceder") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Create items
    </h1>
</div>

{{ content() }}

{{ form("items/create", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldName" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
        {{ text_field("name", "size" : 30, "class" : "form-control", "id" : "fieldName") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldFullname" class="col-sm-2 control-label">Fullname</label>
    <div class="col-sm-10">
        {{ text_field("fullname", "size" : 30, "class" : "form-control", "id" : "fieldFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldDescription" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
        {{ text_area("description", "cols": "30", "rows": "4", "class" : "form-control", "id" : "fieldDescription") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldQuickbooksListid" class="col-sm-2 control-label">Quickbooks Of Listid</label>
    <div class="col-sm-10">
        {{ text_field("quickbooks_listid", "size" : 30, "class" : "form-control", "id" : "fieldQuickbooksListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldQuickbooksEditsequence" class="col-sm-2 control-label">Quickbooks Of Editsequence</label>
    <div class="col-sm-10">
        {{ text_field("quickbooks_editsequence", "type" : "numeric", "class" : "form-control", "id" : "fieldQuickbooksEditsequence") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldQuickbooksErrnum" class="col-sm-2 control-label">Quickbooks Of Errnum</label>
    <div class="col-sm-10">
        {{ text_field("quickbooks_errnum", "size" : 30, "class" : "form-control", "id" : "fieldQuickbooksErrnum") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldQuickbooksErrmsg" class="col-sm-2 control-label">Quickbooks Of Errmsg</label>
    <div class="col-sm-10">
        {{ text_field("quickbooks_errmsg", "size" : 30, "class" : "form-control", "id" : "fieldQuickbooksErrmsg") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIsActive" class="col-sm-2 control-label">Is Of Active</label>
    <div class="col-sm-10">
        {{ text_field("is_active", "type" : "numeric", "class" : "form-control", "id" : "fieldIsActive") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldParentReferenceListid" class="col-sm-2 control-label">Parent Of Reference Of Listid</label>
    <div class="col-sm-10">
        {{ text_field("parent_reference_listid", "size" : 30, "class" : "form-control", "id" : "fieldParentReferenceListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldParentReferenceFullName" class="col-sm-2 control-label">Parent Of Reference Of Full Of Name</label>
    <div class="col-sm-10">
        {{ text_field("parent_reference_full_name", "size" : 30, "class" : "form-control", "id" : "fieldParentReferenceFullName") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSublevel" class="col-sm-2 control-label">Sublevel</label>
    <div class="col-sm-10">
        {{ text_field("sublevel", "type" : "numeric", "class" : "form-control", "id" : "fieldSublevel") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldUnitOfMeasureSetRefListid" class="col-sm-2 control-label">Unit Of Of Of Measure Of Set Of Ref Of Listid</label>
    <div class="col-sm-10">
        {{ text_field("unit_of_measure_set_ref_listid", "size" : 30, "class" : "form-control", "id" : "fieldUnitOfMeasureSetRefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldUnitOfMeasureSetRefFullname" class="col-sm-2 control-label">Unit Of Of Of Measure Of Set Of Ref Of Fullname</label>
    <div class="col-sm-10">
        {{ text_field("unit_of_measure_set_ref_fullname", "size" : 30, "class" : "form-control", "id" : "fieldUnitOfMeasureSetRefFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldType" class="col-sm-2 control-label">Type</label>
    <div class="col-sm-10">
        {{ text_field("type", "size" : 30, "class" : "form-control", "id" : "fieldType") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSalesTaxCodeRefListid" class="col-sm-2 control-label">Sales Of Tax Of Code Of Ref Of Listid</label>
    <div class="col-sm-10">
        {{ text_field("sales_tax_code_ref_listid", "size" : 30, "class" : "form-control", "id" : "fieldSalesTaxCodeRefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSalesTaxCodeRefFullname" class="col-sm-2 control-label">Sales Of Tax Of Code Of Ref Of Fullname</label>
    <div class="col-sm-10">
        {{ text_field("sales_tax_code_ref_fullname", "size" : 30, "class" : "form-control", "id" : "fieldSalesTaxCodeRefFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSalesDesc" class="col-sm-2 control-label">Sales Of Desc</label>
    <div class="col-sm-10">
        {{ text_area("sales_desc", "cols": "30", "rows": "4", "class" : "form-control", "id" : "fieldSalesDesc") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSalesPrice" class="col-sm-2 control-label">Sales Of Price</label>
    <div class="col-sm-10">
        {{ text_field("sales_price", "type" : "numeric", "class" : "form-control", "id" : "fieldSalesPrice") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIncomeAccountRefListid" class="col-sm-2 control-label">Income Of Account Of Ref Of Listid</label>
    <div class="col-sm-10">
        {{ text_field("income_account_ref_listid", "size" : 30, "class" : "form-control", "id" : "fieldIncomeAccountRefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIncomeAccountRefFullname" class="col-sm-2 control-label">Income Of Account Of Ref Of Fullname</label>
    <div class="col-sm-10">
        {{ text_field("income_account_ref_fullname", "size" : 30, "class" : "form-control", "id" : "fieldIncomeAccountRefFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldPurchaseCost" class="col-sm-2 control-label">Purchase Of Cost</label>
    <div class="col-sm-10">
        {{ text_field("purchase_cost", "type" : "numeric", "class" : "form-control", "id" : "fieldPurchaseCost") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCogsAccountRefListid" class="col-sm-2 control-label">COGS Of Account Of Ref Of Listid</label>
    <div class="col-sm-10">
        {{ text_field("COGS_account_ref_listid", "size" : 30, "class" : "form-control", "id" : "fieldCogsAccountRefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCogsAccountRefFullname" class="col-sm-2 control-label">COGS Of Account Of Ref Of Fullname</label>
    <div class="col-sm-10">
        {{ text_field("COGS_account_ref_fullname", "size" : 30, "class" : "form-control", "id" : "fieldCogsAccountRefFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldAssestsAccountRefListid" class="col-sm-2 control-label">Assests Of Account Of Ref Of Listid</label>
    <div class="col-sm-10">
        {{ text_field("assests_account_ref_listid", "size" : 30, "class" : "form-control", "id" : "fieldAssestsAccountRefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldAssestsAcc" class="col-sm-2 control-label">Assests Of Acc</label>
    <div class="col-sm-10">
        {{ text_field("assests_acc", "size" : 30, "class" : "form-control", "id" : "fieldAssestsAcc") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldPurchaseDesc" class="col-sm-2 control-label">Purchase Of Desc</label>
    <div class="col-sm-10">
        {{ text_area("purchase_desc", "cols": "30", "rows": "4", "class" : "form-control", "id" : "fieldPurchaseDesc") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldQuantityonhand" class="col-sm-2 control-label">QuantityOnHand</label>
    <div class="col-sm-10">
        {{ text_field("QuantityOnHand", "type" : "numeric", "class" : "form-control", "id" : "fieldQuantityonhand") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldQuantityonorder" class="col-sm-2 control-label">QuantityOnOrder</label>
    <div class="col-sm-10">
        {{ text_field("QuantityOnOrder", "type" : "numeric", "class" : "form-control", "id" : "fieldQuantityonorder") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldQuantityonsalesorder" class="col-sm-2 control-label">QuantityOnSalesOrder</label>
    <div class="col-sm-10">
        {{ text_field("QuantityOnSalesOrder", "type" : "numeric", "class" : "form-control", "id" : "fieldQuantityonsalesorder") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldAveragecost" class="col-sm-2 control-label">AverageCost</label>
    <div class="col-sm-10">
        {{ text_field("AverageCost", "type" : "numeric", "class" : "form-control", "id" : "fieldAveragecost") }}
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Save', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
