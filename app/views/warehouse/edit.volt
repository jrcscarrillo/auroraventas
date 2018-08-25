{% extends "layouts/adicional.volt" %}
{% block forma %}
    {{ content() }}
    <p>
        {{ link_to("warehouse", "Regresar", "class": "btn btn-primary") }}
    </p>
    {% endblock %}
    {% block cabecera %}
        {{ form('warehouse/save', 'id': 'routenewForm', 'class': 'sky-form') }}
    {% endblock %}
    {% block cuerpoforma %}
        <fieldset>
            <section>
                <div class="row">
                    <div class="col col-8">
                        <label class="hidden">
                            <i class="icon-append fa fa-user"></i>
                            {{ form.render('listID') }}
                        </label>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <label class="label col col-4">Nombre corto bodega</label>
                    <div class="col col-8">
                        <label class="input">
                            <i class="icon-append fa fa-user"></i>
                            {{ form.render('name', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <label class="label col col-4">Descripcion Bodega</label>
                    <div class="col col-8">
                        <label class="input">
                            <i class="icon-append fa fa-user"></i>
                            {{ form.render('description', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <label class="label col col-4">Direccion</label>
                    <div class="col col-8">
                        <label class="input">
                            <i class="icon-append fa fa-user"></i>
                            {{ form.render('address', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
        </fieldset>
        <fieldset>
            <section>
                <div class="row">
                    <label class="label col col-4">Telefono Responsable</label>
                    <div class="col col-8">
                        <label class="input">
                            <i class="icon-append fa fa-user"></i>
                            {{ form.render('phone', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <label class="label col col-4">Email responsable</label>
                    <div class="col col-8">
                        <label class="input">
                            <i class="icon-append fa fa-user"></i>
                            {{ form.render('email', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
        </fieldset>
        <fieldset>
            <section>
                <div class="row">
                    <label class="label col col-2">Escoger RUC</label>
                    <div class="col col-4">
                        <label class="select">
                            <i class="icon-append fa fa-user"></i>
                            {{ form.render('tipoId', ['class': 'form-control']) }}
                        </label>
                    </div>
                    <label class="label col col-2">Numero RUC</label>
                    <div class="col col-4">
                        <label class="input">
                            <i class="icon-append fa fa-user"></i>
                            {{ form.render('numeroId', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
        </fieldset>
        <fieldset>
            <section>
                <div class="row">
                    <label class="label col col-2">Observaciones</label>
                    <div class="col col-4">
                        <label class="input">
                            <i class="icon-append fa fa-user"></i>
                            {{ form.render('customField1', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
        </fieldset>
        <footer>
            {{ submit_button('Submit', 'class': 'btn btn-primary') }}
            <p class="help-block">Usted esta actualizando una bodega.</p>
        </footer>
    </form>
{% endblock %}