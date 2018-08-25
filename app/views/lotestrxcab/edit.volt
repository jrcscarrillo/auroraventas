<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("lotestrxcab", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Edit lotestrxcab
    </h1>
</div>

{{ content() }}

{{ form("lotestrxcab/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldTxnid" class="col-sm-2 control-label">TxnID</label>
    <div class="col-sm-10">
        {{ select_static("TxnID", "using": [], "class" : "form-control", "id" : "fieldTxnid") }}
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
    <label for="fieldTxndate" class="col-sm-2 control-label">TxnDate</label>
    <div class="col-sm-10">
        {{ text_field("TxnDate", "type" : "date", "class" : "form-control", "id" : "fieldTxndate") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldRefnumber" class="col-sm-2 control-label">RefNumber</label>
    <div class="col-sm-10">
        {{ select_static("RefNumber", "using": [], "class" : "form-control", "id" : "fieldRefnumber") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldOrigenid" class="col-sm-2 control-label">OrigenID</label>
    <div class="col-sm-10">
        {{ select_static("OrigenID", "using": [], "class" : "form-control", "id" : "fieldOrigenid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldDestinoid" class="col-sm-2 control-label">DestinoID</label>
    <div class="col-sm-10">
        {{ select_static("DestinoID", "using": [], "class" : "form-control", "id" : "fieldDestinoid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldVehicleid" class="col-sm-2 control-label">VehicleID</label>
    <div class="col-sm-10">
        {{ text_field("VehicleID", "size" : 30, "class" : "form-control", "id" : "fieldVehicleid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldRouteid" class="col-sm-2 control-label">RouteID</label>
    <div class="col-sm-10">
        {{ text_field("RouteID", "size" : 30, "class" : "form-control", "id" : "fieldRouteid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldDriverid" class="col-sm-2 control-label">DriverID</label>
    <div class="col-sm-10">
        {{ select_static("DriverID", "using": [], "class" : "form-control", "id" : "fieldDriverid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldResponsable" class="col-sm-2 control-label">Responsable</label>
    <div class="col-sm-10">
        {{ select_static("Responsable", "using": [], "class" : "form-control", "id" : "fieldResponsable") }}
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


{{ hidden_field("id") }}

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Send', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
