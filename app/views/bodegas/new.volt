<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("bodegas", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Create bodegas
    </h1>
</div>

{{ content() }}

{{ form("bodegas/create", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

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
    <label for="fieldStatus" class="col-sm-2 control-label">Status</label>
    <div class="col-sm-10">
        {{ text_field("Status", "size" : 30, "class" : "form-control", "id" : "fieldStatus") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEstado" class="col-sm-2 control-label">Estado</label>
    <div class="col-sm-10">
        {{ text_field("Estado", "size" : 30, "class" : "form-control", "id" : "fieldEstado") }}
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Save', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
