{% extends "layouts/adicional.volt" %}
{% block forma %}
    {{ content() }}
    <div align="left">
        {{ link_to("invoice", "&larr; Go Back") }}
    </div>
    <div align="right">
        {{ submit_button("Guardar", "class": "btn btn-success") }}
    </div>
    <div class="body bg-blue">
    {% endblock %}
    {% block cabecera %}
        {{ form("invoice/save", 'id': 'invoiceEditForm', 'class':'sky-form')}}
    {% endblock %}
    {% block cuerpoforma %}
        <fieldset>
            <section>
                <div class="row">
                    <label class="label col col-4">Numero Factura</label>
                    <div class="col col-8">
                        <span>
                            <?php echo $this->view->factura['RefNumber']; ?>
                        </span>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <label class="label col col-4">Razon Social Cliente</label>
                    <div class="col col-8">
                        <span>
                            <?php echo $this->view->factura['CustomerRef_FullName']; ?>
                        </span>
                    </div>
                </div>
            </section>
        </fieldset>
        <fieldset>
            <section>
                <div class="row">
                    <div class="col col-8">
                        <label class="hidden">
                            <i class="icon-append fa fa-user"></i>
                            {{ form.render('TxnID') }}
                        </label>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <label class="label col col-4">Datos Adicionales</label>
                    <div class="col col-8">
                        <label class="input">
                            <i class="icon-append fa fa-user"></i>
                            {{ form.render('CustomField2', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
        </fieldset>
        <footer>
            {{ submit_button('Actualizar', 'class': 'btn btn-primary') }}
            <p class="help-block">Actualizar los datos adicionales.</p>
        </footer>
    </form>
</div>
{% endblock %}