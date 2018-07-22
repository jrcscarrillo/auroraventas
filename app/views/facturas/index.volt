{% extends "layouts/adicional.volt" %}
{% block forma %}
    {{ content() }}
    <div class="body bg-blue">
    {% endblock %}
    {% block cabecera %}
        {{ form('facturas/search', 'class':'sky-form')}}
    {% endblock %}
    {% block cuerpoforma %}
        <fieldset>
            <section>
                <div class="row">
                    <label class="label col col-4">Numero de Factura</label>
                    <div class="col col-8">
                        <label class="input">
                            {{ form.render('RefNumber', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <label class="label col col-4">Fecha de Emision</label>
                    <div class="col col-8">
                        <label class="input">
                            {{ form.render('TxnDate', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
        </fieldset>
        <footer align="center">
            {{ submit_button('Buscar', 'class': 'btn btn-primary') }}
            <p class="help-block">Busque sus facturas para guardarlas o imprimirlas.</p>
        </footer>
</form>
</div>
{% endblock %}