{% extends "layouts/adicional.volt" %}
{% block forma %}
    {{ content() }}
    <div>
    {% endblock %}
    {% block cabecera %}
        {{ form('lotestrxcab/disponible', 'id': 'LotesCabNewForm', 'class': 'sky-form') }}
    {% endblock %}
    {% block cuerpoforma %}
        <fieldset>
            <section>
                <div class="row">
                    <div class="col col-3">
                        <label>Tipo</label>
                    </div>
                    <div class="col col-9">
                        <label class="select">
                            <i class="icon-append fa fa-users"></i>
                            {{ form.render('RefType', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-3">
                        <label>Bodega Origen</label>
                    </div>
                    <div class="col col-9">
                        <label class="select">
                            <i class="icon-append fa fa-users"></i>
                            {{ form.render('origen', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
                <div class="row">                                        
                    <div class="col col-3">
                        <label>Bodega Destino</label>
                    </div>
                    <div class="col col-9">
                        <label class="select">
                            <i class="icon-append fa fa-users"></i>
                            {{ form.render('destino', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
        </fieldset>
        <footer>
            <div class="row">
                <div class="col-sm-3">
                    <nav>
                        <ul class="pagination">
                            <li>{{ link_to("lotestrxcab", "Regresar") }}</li>
                        </ul>
                    </nav>
                </div>
                <div class="col col-6">
                    <h1>Nueva Transferencia</h1>
                </div>                
                <div class="col col-3">
                    {{ submit_button('Generar', 'class': 'btn btn-primary') }}
                </div>                
            </div>

        </footer>
    </form>
</div>                  
{% endblock %}