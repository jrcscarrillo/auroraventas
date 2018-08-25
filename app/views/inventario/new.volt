{% extends "layouts/adicional.volt" %}
{% block forma %}
    {{ link_to("inventario/index", "Atras", "class": "btn btn-info") }}
    {{ content() }}
    <div class="body bg-blue">
    {% endblock %}
    {% block cabecera %}
        {{ form('inventario/create', 'id': 'inventarioForm', 'class': 'sky-form') }}
    {% endblock %}
    {% block cuerpoforma %}
        <fieldset>
            <section>
                <div class="row">
                    <label class="label col col-4">Fecha</label>
                    <div class="col col-8">
                        <label class="input">
                            <i class="icon-append fa fa-user"></i>
                            {{ form.render('TxnDate', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <label class="label col col-4">Bodega</label>
                    <div class="col col-8">
                        <label class="select">
                            <i class="icon-append fa fa-user"></i>
                            {{ form.render('DestinoTrx', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <label class="label col col-4">Producto</label>
                    <div class="col col-8">
                        <label class="select">
                            <i class="icon-append fa fa-user"></i>
                            {{ form.render('ItemRef_ListID', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <label class="label col col-4">Cantidad</label>
                    <div class="col col-8">
                        <label class="input">
                            <i class="icon-append fa fa-user"></i>
                            {{ form.render('QtyTrx', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
        </fieldset>
        <footer>
            {{ submit_button('Grabar y Crear', 'class': 'btn btn-primary') }}
            <p class="help-block">Agregara un nuevo producto con su existencia actual.</p>
        </footer>
    </form>
</div>
{% endblock %}