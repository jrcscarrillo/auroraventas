<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("lotestrx", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Edit lotestrx
    </h1>
</div>

{{ content() }}

{{ form("lotestrx/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldTxnlineid" class="col-sm-2 control-label">TxnLineID</label>
    <div class="col-sm-10">
        {{ select_static("TxnLineID", "using": [], "class" : "form-control", "id" : "fieldTxnlineid") }}
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
        {{ text_field("RefNumber", "size" : 30, "class" : "form-control", "id" : "fieldRefnumber") }}
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
    <label for="fieldMemo" class="col-sm-2 control-label">Memo</label>
    <div class="col-sm-10">
        {{ text_field("Memo", "size" : 30, "class" : "form-control", "id" : "fieldMemo") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldMemotrx" class="col-sm-2 control-label">MemoTrx</label>
    <div class="col-sm-10">
        {{ text_field("MemoTrx", "size" : 30, "class" : "form-control", "id" : "fieldMemotrx") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldNumerotrx" class="col-sm-2 control-label">NumeroTrx</label>
    <div class="col-sm-10">
        {{ text_field("NumeroTrx", "type" : "numeric", "class" : "form-control", "id" : "fieldNumerotrx") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldFechatrx" class="col-sm-2 control-label">FechaTrx</label>
    <div class="col-sm-10">
        {{ text_field("FechaTrx", "type" : "date", "class" : "form-control", "id" : "fieldFechatrx") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTipotrx" class="col-sm-2 control-label">TipoTrx</label>
    <div class="col-sm-10">
        {{ text_field("TipoTrx", "size" : 30, "class" : "form-control", "id" : "fieldTipotrx") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldOrigentrx" class="col-sm-2 control-label">OrigenTrx</label>
    <div class="col-sm-10">
        {{ text_field("OrigenTrx", "size" : 30, "class" : "form-control", "id" : "fieldOrigentrx") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldDestinotrx" class="col-sm-2 control-label">DestinoTrx</label>
    <div class="col-sm-10">
        {{ text_field("DestinoTrx", "size" : 30, "class" : "form-control", "id" : "fieldDestinotrx") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldQtytrx" class="col-sm-2 control-label">QtyTrx</label>
    <div class="col-sm-10">
        {{ text_field("QtyTrx", "type" : "numeric", "class" : "form-control", "id" : "fieldQtytrx") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIdkey" class="col-sm-2 control-label">IDKEY</label>
    <div class="col-sm-10">
        {{ text_field("IDKEY", "size" : 30, "class" : "form-control", "id" : "fieldIdkey") }}
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
