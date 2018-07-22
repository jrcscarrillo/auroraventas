{% extends "layouts/adicional_1.volt" %}
{% block forma %}
    {{ content() }}
    <div class="body bg-blue">
    {% endblock %}
    {% block cabecera %}
        {{ form('contribuyente/create', 'id': 'contribuyenteForm', 'class': 'sky-form') }}
    {% endblock %}
    {% block cuerpoforma %}
        <fieldset>
            <section>
                <div class="row">
                    <label class="label col col-4">RUC</label>
                    <div class="col col-8">
                        <label class="input">
                            <i class="icon-append fa fa-user"></i>
                            {{ form.render('Ruc', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <label class="label col col-4">Razon Social</label>
                    <div class="col col-8">
                        <label class="input">
                            <i class="icon-append fa fa-user"></i>
                            {{ form.render('Razon', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <label class="label col col-4">Nombre Comercial</label>
                    <div class="col col-8">
                        <label class="input">
                            <i class="icon-append fa fa-user"></i>
                            {{ form.render('NombreComercial', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
        </fieldset>
        <fieldset>
            <section>
                <div class="row">
                    <label class="label col col-4">Direccion Matriz</label>
                    <div class="col col-8">
                        <label class="input">
                            <i class="icon-append fa fa-user"></i>
                            {{ form.render('DirMatriz', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <label class="label col col-4">Direccion Establecimiento</label>
                    <div class="col col-8">
                        <label class="input">
                            <i class="icon-append fa fa-user"></i>
                            {{ form.render('DirEmisor', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
        </fieldset>
        <fieldset>
            <section>
                <div class="row">
                    <label class="label col col-2">Establecimiento</label>
                    <div class="col col-4">
                        <label class="input">
                            <i class="icon-append fa fa-user"></i>
                            {{ form.render('CodEmisor', ['class': 'form-control']) }}
                        </label>
                    </div>
                    <label class="label col col-2">Punto Emision</label>
                    <div class="col col-4">
                        <label class="input">
                            <i class="icon-append fa fa-user"></i>
                            {{ form.render('Punto', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
        </fieldset>
        <fieldset>
            <section>
                <div class="row">
                    <label class="label col col-2">Resolucion</label>
                    <div class="col col-4">
                        <label class="input">
                            <i class="icon-append fa fa-user"></i>
                            {{ form.render('Resolucion', ['class': 'form-control']) }}
                        </label>
                    </div>
                    <label class="label col col-2">Lleva Contabilidad</label>
                    <div class="col col-4">
                        <label class="input">
                            <i class="icon-append fa fa-user"></i>
                            {{ form.render('LlevaContabilidad', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
        </fieldset>
        <fieldset>
            <section>
                <div class="row">
                    <label class="label col col-2">Ambiente</label>
                    <div class="col col-4">
                        <label class="input">
                            <i class="icon-append fa fa-spinner"></i>
                            {{ form.render('Ambiente', ['class': 'form-control']) }}
                        </label>
                    </div>
                    <label class="label col col-2">Emision</label>
                    <div class="col col-4">
                        <label class="input">
                            <i class="icon-append fa fa-spinner"></i>
                            {{ form.render('Emision', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
        </fieldset>                        
        <footer>
            {{ submit_button('Submit', 'class': 'btn btn-primary') }}
            <p class="help-block">Usted esta genenrando un nuevo contribuyente.</p>
        </footer>
    </form>
</div>
{% endblock %}