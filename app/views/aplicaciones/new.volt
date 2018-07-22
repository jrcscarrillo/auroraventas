{% extends "layouts/adicional.volt" %}
{% block forma %}
    {{ content() }}
    <div class="body bg-blue">
    {% endblock %}
    {% block cabecera %}
        {{ form('aplicaciones/create', 'id': 'aplicacionesForm', 'class': 'sky-form') }}
    {% endblock %}
    {% block cuerpoforma %}
        <fieldset>
            <section>
                <div class="row">
                    <label class="label col col-4">Nombre de la Aplicacion</label>
                    <div class="col col-8">
                        <label class="input">
                            {{ form.render('nombre', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <label class="label col col-4">Descripcion</label>
                    <div class="col col-8">
                        <label class="input">
                            {{ form.render('descripcion', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <label class="label col col-4">URL segura https</label>
                    <div class="col col-8">
                        <label class="input">
                            {{ form.render('url', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <label class="label col col-4">URL Soporte</label>
                    <div class="col col-8">
                        <label class="input">
                            {{ form.render('soporte', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
        </fieldset>
        <footer>
            {{ submit_button('Enviar', 'class': 'btn btn-primary') }}
            <p class="help-block">Agregara una nueva aplicacion.</p>
        </footer>
    </form>
</div>
{% endblock %}