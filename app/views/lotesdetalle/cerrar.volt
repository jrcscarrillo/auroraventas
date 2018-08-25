<div class="row">
    <h1>
        Cerrando Lote de Produccion
    </h1>
</div>

{{ content() }}

{{ form("lotesdetalle/index", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Continuar', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
