<div class="page-header">
    <h1>
        Search itemsalestax
    </h1>
    <p>
        {{ link_to("itemsalestax/new", "Create itemsalestax") }}
    </p>
</div>

{{ content() }}

{{ form("itemsalestax/search", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

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
    <label for="fieldBarcodevalue" class="col-sm-2 control-label">BarCodeValue</label>
    <div class="col-sm-10">
        {{ text_field("BarCodeValue", "size" : 30, "class" : "form-control", "id" : "fieldBarcodevalue") }}
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
    <label for="fieldItemdesc" class="col-sm-2 control-label">ItemDesc</label>
    <div class="col-sm-10">
        {{ text_field("ItemDesc", "size" : 30, "class" : "form-control", "id" : "fieldItemdesc") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIsusedonpurchasetransaction" class="col-sm-2 control-label">IsUsedOnPurchaseTransaction</label>
    <div class="col-sm-10">
        {{ text_field("IsUsedOnPurchaseTransaction", "size" : 30, "class" : "form-control", "id" : "fieldIsusedonpurchasetransaction") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTaxrate" class="col-sm-2 control-label">TaxRate</label>
    <div class="col-sm-10">
        {{ text_field("TaxRate", "type" : "numeric", "class" : "form-control", "id" : "fieldTaxrate") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTaxvendorrefListid" class="col-sm-2 control-label">TaxVendorRef Of ListID</label>
    <div class="col-sm-10">
        {{ text_field("TaxVendorRef_ListID", "size" : 30, "class" : "form-control", "id" : "fieldTaxvendorrefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTaxvendorrefFullname" class="col-sm-2 control-label">TaxVendorRef Of FullName</label>
    <div class="col-sm-10">
        {{ text_field("TaxVendorRef_FullName", "size" : 30, "class" : "form-control", "id" : "fieldTaxvendorrefFullname") }}
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
