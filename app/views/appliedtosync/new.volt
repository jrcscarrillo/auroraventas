{% extends "layouts/adicional_1.volt" %}
{% block forma %}
    {{ content() }}
    <div class="body bg-blue">
    {% endblock %}
    {% block cabecera %}
        {{ form('appliedtosync/create', 'id': 'fechasForm', 'class': 'sky-form') }}
    {% endblock %}
    {% block cuerpoforma %}
        <fieldset>
            <section>
                <div class="row">
                    <label class="label col col-4">Compras Desde / Hasta</label>
                    <div class="col col-4">
                        <label class="input">
                            {{ form.render('billDesde', ['class': 'form-control']) }}
                        </label>
                    </div>
                    <div class="col col-4">
                        <label class="input">
                            {{ form.render('billHasta', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <label class="label col col-4">Facturas Desde / Hasta</label>
                    <div class="col col-4">
                        <label class="input">
                            {{ form.render('invoiceDesde', ['class': 'form-control']) }}
                        </label>
                    </div>
                    <div class="col col-4">
                        <label class="input">
                            {{ form.render('invoiceHasta', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
        </fieldset>
        <fieldset>
            <section>
                <div class="row">
                    <label class="label col col-4">Retenciones QB Desde / Hasta</label>
                    <div class="col col-4">
                        <label class="input">
                            {{ form.render('billCreditDesde', ['class': 'form-control']) }}
                        </label>
                    </div>
                    <div class="col col-4">
                        <label class="input">
                            {{ form.render('billCreditHasta', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <label class="label col col-4">Credit Memos Desde / Hasta</label>
                    <div class="col col-4">
                        <label class="input">
                            {{ form.render('creditMemoDesde', ['class': 'form-control']) }}
                        </label>
                    </div>
                    <div class="col col-4">
                        <label class="input">
                            {{ form.render('creditMemoHasta', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
        </fieldset>
        <fieldset>
            <section>
                <div class="row">
                    <label class="label col col-4">Produccion Desde / Hasta</label>
                    <div class="col col-4">
                        <label class="input">
                            {{ form.render('productionDesde', ['class': 'form-control']) }}
                        </label>
                    </div>
                    <div class="col col-4">
                        <label class="input">
                            {{ form.render('productionHasta', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <label class="label col col-4">Retenciones Aurora Desde / Hasta</label>
                    <div class="col col-4">
                        <label class="input">
                            {{ form.render('retencionDesde', ['class': 'form-control']) }}
                        </label>
                    </div>
                    <div class="col col-4">
                        <label class="input">
                            {{ form.render('retencionHasta', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
        </fieldset>
        <fieldset>
            <section>
                <div class="row">
                    <label class="label col col-4">Otros Desde / Hasta</label>
                    <div class="col col-4">
                        <label class="input">
                            {{ form.render('otrosDesde', ['class': 'form-control']) }}
                        </label>
                    </div>
                    <div class="col col-4">
                        <label class="input">
                            {{ form.render('otrosHasta', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
        </fieldset>
        <footer>
            {{ submit_button('Enviar', 'class': 'btn btn-primary') }}
            <p class="help-block">Agregara una nueva fecha de sincronizacion.</p>
        </footer>
    </form>
</div>
{% endblock %}