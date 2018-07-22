<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("pricelevel", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Edit pricelevel
    </h1>
</div>

{{ content() }}

{{ form("pricelevel/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

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
    <label for="fieldPriceleveltype" class="col-sm-2 control-label">PriceLevelType</label>
    <div class="col-sm-10">
        {{ text_field("PriceLevelType", "size" : 30, "class" : "form-control", "id" : "fieldPriceleveltype") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldPricelevelfixedpercentage" class="col-sm-2 control-label">PriceLevelFixedPercentage</label>
    <div class="col-sm-10">
        {{ text_field("PriceLevelFixedPercentage", "size" : 30, "class" : "form-control", "id" : "fieldPricelevelfixedpercentage") }}
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
