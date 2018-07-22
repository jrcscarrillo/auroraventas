<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("warehouse", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Edit warehouse
    </h1>
</div>

{{ content() }}

{{ form("warehouse/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldListid" class="col-sm-2 control-label">ListID</label>
    <div class="col-sm-10">
        {{ text_field("listID", "size" : 30, "class" : "form-control", "id" : "fieldListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTimecreated" class="col-sm-2 control-label">TimeCreated</label>
    <div class="col-sm-10">
        {{ text_field("timeCreated", "size" : 30, "class" : "form-control", "id" : "fieldTimecreated") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTimemodified" class="col-sm-2 control-label">TimeModified</label>
    <div class="col-sm-10">
        {{ text_field("timeModified", "size" : 30, "class" : "form-control", "id" : "fieldTimemodified") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEditsequence" class="col-sm-2 control-label">EditSequence</label>
    <div class="col-sm-10">
        {{ text_field("editSequence", "type" : "numeric", "class" : "form-control", "id" : "fieldEditsequence") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldName" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
        {{ text_field("name", "size" : 30, "class" : "form-control", "id" : "fieldName") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIsactive" class="col-sm-2 control-label">IsActive</label>
    <div class="col-sm-10">
        {{ text_field("isActive", "type" : "numeric", "class" : "form-control", "id" : "fieldIsactive") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldDescription" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
        {{ text_field("description", "size" : 30, "class" : "form-control", "id" : "fieldDescription") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldAddress" class="col-sm-2 control-label">Address</label>
    <div class="col-sm-10">
        {{ text_field("address", "size" : 30, "class" : "form-control", "id" : "fieldAddress") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldPhone" class="col-sm-2 control-label">Phone</label>
    <div class="col-sm-10">
        {{ text_field("phone", "size" : 30, "class" : "form-control", "id" : "fieldPhone") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEmail" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
        {{ text_field("email", "size" : 30, "class" : "form-control", "id" : "fieldEmail") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTipoid" class="col-sm-2 control-label">TipoId</label>
    <div class="col-sm-10">
        {{ text_field("tipoId", "size" : 30, "class" : "form-control", "id" : "fieldTipoid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldNumeroid" class="col-sm-2 control-label">NumeroId</label>
    <div class="col-sm-10">
        {{ text_field("numeroId", "size" : 30, "class" : "form-control", "id" : "fieldNumeroid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomfield1" class="col-sm-2 control-label">CustomField1</label>
    <div class="col-sm-10">
        {{ text_field("customField1", "size" : 30, "class" : "form-control", "id" : "fieldCustomfield1") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomfield2" class="col-sm-2 control-label">CustomField2</label>
    <div class="col-sm-10">
        {{ text_field("customField2", "size" : 30, "class" : "form-control", "id" : "fieldCustomfield2") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomfield3" class="col-sm-2 control-label">CustomField3</label>
    <div class="col-sm-10">
        {{ text_field("customField3", "size" : 30, "class" : "form-control", "id" : "fieldCustomfield3") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldStatus" class="col-sm-2 control-label">Status</label>
    <div class="col-sm-10">
        {{ text_field("status", "size" : 30, "class" : "form-control", "id" : "fieldStatus") }}
    </div>
</div>


{{ hidden_field("id") }}

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Send', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
