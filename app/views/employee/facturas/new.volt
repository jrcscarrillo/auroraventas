<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("facturas", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Create facturas
    </h1>
</div>

{{ content() }}

{{ form("facturas/create", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldTxnid" class="col-sm-2 control-label">TxnID</label>
    <div class="col-sm-10">
        {{ text_field("TxnID", "size" : 30, "class" : "form-control", "id" : "fieldTxnid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldAmbiente" class="col-sm-2 control-label">Ambiente</label>
    <div class="col-sm-10">
        {{ text_field("Ambiente", "size" : 30, "class" : "form-control", "id" : "fieldAmbiente") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTipoemision" class="col-sm-2 control-label">TipoEmision</label>
    <div class="col-sm-10">
        {{ text_field("TipoEmision", "size" : 30, "class" : "form-control", "id" : "fieldTipoemision") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldRazon" class="col-sm-2 control-label">Razon</label>
    <div class="col-sm-10">
        {{ text_field("Razon", "size" : 30, "class" : "form-control", "id" : "fieldRazon") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldComercial" class="col-sm-2 control-label">Comercial</label>
    <div class="col-sm-10">
        {{ text_field("Comercial", "size" : 30, "class" : "form-control", "id" : "fieldComercial") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldRuc" class="col-sm-2 control-label">Ruc</label>
    <div class="col-sm-10">
        {{ text_field("Ruc", "type" : "numeric", "class" : "form-control", "id" : "fieldRuc") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldClaveacceso" class="col-sm-2 control-label">ClaveAcceso</label>
    <div class="col-sm-10">
        {{ text_field("ClaveAcceso", "size" : 30, "class" : "form-control", "id" : "fieldClaveacceso") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEstab" class="col-sm-2 control-label">Estab</label>
    <div class="col-sm-10">
        {{ text_field("Estab", "size" : 30, "class" : "form-control", "id" : "fieldEstab") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCoddoc" class="col-sm-2 control-label">CodDoc</label>
    <div class="col-sm-10">
        {{ text_field("CodDoc", "size" : 30, "class" : "form-control", "id" : "fieldCoddoc") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldPunto" class="col-sm-2 control-label">Punto</label>
    <div class="col-sm-10">
        {{ text_field("Punto", "size" : 30, "class" : "form-control", "id" : "fieldPunto") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSq" class="col-sm-2 control-label">Sq</label>
    <div class="col-sm-10">
        {{ text_field("Sq", "type" : "numeric", "class" : "form-control", "id" : "fieldSq") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldDirmatriz" class="col-sm-2 control-label">DirMatriz</label>
    <div class="col-sm-10">
        {{ text_field("DirMatriz", "size" : 30, "class" : "form-control", "id" : "fieldDirmatriz") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldFechaemision" class="col-sm-2 control-label">FechaEmision</label>
    <div class="col-sm-10">
        {{ text_field("FechaEmision", "type" : "date", "class" : "form-control", "id" : "fieldFechaemision") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldDirestab" class="col-sm-2 control-label">DirEstab</label>
    <div class="col-sm-10">
        {{ text_field("DirEstab", "size" : 30, "class" : "form-control", "id" : "fieldDirestab") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldContesp" class="col-sm-2 control-label">ContEsp</label>
    <div class="col-sm-10">
        {{ text_field("ContEsp", "size" : 30, "class" : "form-control", "id" : "fieldContesp") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldLlevacontab" class="col-sm-2 control-label">LlevaContab</label>
    <div class="col-sm-10">
        {{ text_field("LlevaContab", "size" : 30, "class" : "form-control", "id" : "fieldLlevacontab") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTipoid" class="col-sm-2 control-label">TipoId</label>
    <div class="col-sm-10">
        {{ text_field("TipoId", "type" : "numeric", "class" : "form-control", "id" : "fieldTipoid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldNroid" class="col-sm-2 control-label">NroId</label>
    <div class="col-sm-10">
        {{ text_field("NroId", "type" : "numeric", "class" : "form-control", "id" : "fieldNroid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldGuia" class="col-sm-2 control-label">Guia</label>
    <div class="col-sm-10">
        {{ text_field("Guia", "size" : 30, "class" : "form-control", "id" : "fieldGuia") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldRazoncomprador" class="col-sm-2 control-label">RazonComprador</label>
    <div class="col-sm-10">
        {{ text_field("RazonComprador", "size" : 30, "class" : "form-control", "id" : "fieldRazoncomprador") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTotalimpto" class="col-sm-2 control-label">TotalImpto</label>
    <div class="col-sm-10">
        {{ text_field("TotalImpto", "type" : "numeric", "class" : "form-control", "id" : "fieldTotalimpto") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldPropina" class="col-sm-2 control-label">Propina</label>
    <div class="col-sm-10">
        {{ text_field("Propina", "type" : "numeric", "class" : "form-control", "id" : "fieldPropina") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldImportetotal" class="col-sm-2 control-label">ImporteTotal</label>
    <div class="col-sm-10">
        {{ text_field("ImporteTotal", "type" : "numeric", "class" : "form-control", "id" : "fieldImportetotal") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldMoneda" class="col-sm-2 control-label">Moneda</label>
    <div class="col-sm-10">
        {{ text_field("Moneda", "size" : 30, "class" : "form-control", "id" : "fieldMoneda") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldFechaautoriza" class="col-sm-2 control-label">FechaAutoriza</label>
    <div class="col-sm-10">
        {{ text_field("FechaAutoriza", "type" : "date", "class" : "form-control", "id" : "fieldFechaautoriza") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldNumeroautoriza" class="col-sm-2 control-label">NumeroAutoriza</label>
    <div class="col-sm-10">
        {{ text_field("NumeroAutoriza", "size" : 30, "class" : "form-control", "id" : "fieldNumeroautoriza") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCodmsg" class="col-sm-2 control-label">CodMsg</label>
    <div class="col-sm-10">
        {{ text_field("CodMsg", "size" : 30, "class" : "form-control", "id" : "fieldCodmsg") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldMensaje" class="col-sm-2 control-label">Mensaje</label>
    <div class="col-sm-10">
        {{ text_field("Mensaje", "size" : 30, "class" : "form-control", "id" : "fieldMensaje") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldMsgadicional" class="col-sm-2 control-label">MsgAdicional</label>
    <div class="col-sm-10">
        {{ text_field("MsgAdicional", "size" : 30, "class" : "form-control", "id" : "fieldMsgadicional") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTipoerror" class="col-sm-2 control-label">TipoError</label>
    <div class="col-sm-10">
        {{ text_field("TipoError", "size" : 30, "class" : "form-control", "id" : "fieldTipoerror") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIdcomprobantes" class="col-sm-2 control-label">IdComprobantes</label>
    <div class="col-sm-10">
        {{ text_field("idComprobantes", "type" : "numeric", "class" : "form-control", "id" : "fieldIdcomprobantes") }}
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Save', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
