{% extends "layouts/adicional.volt" %}
{% block forma %}
    {{ content() }}
    {% endblock %}
    {% block cabecera %}
        {{ form('lotestrxcab/search', 'class':'sky-form')}}
    {% endblock %}
    {% block cuerpoforma %}
        <fieldset>

            {% for element in form %}
                {% if is_a(element, 'Phalcon\Forms\Element\Hidden') %}
                    {{ element }}
                {% else %}
                    <section>
                        <div class="row">
                            {{ element.label(['class': 'label col col-4']) }}
                            <div class="col col-8">
                                <label class="input">
                                    <i class="icon-append fa fa-user"></i>
                                    {{ element }}
                                </label>
                            </div>
                        </div>
                    </section>
                {% endif %}
            {% endfor %}

        </fieldset>
        <footer>
            <div class="row">
                <div class="col-sm-3">
                    <nav>
                        <ul class="pagination">
                            <li>{{ link_to("lotestrxcab/new", "Crear Nueva") }}</li>
                        </ul>
                    </nav>
                </div>
                <div class="col col-6">
                    <h1>Transferencias</h1>
                </div>                
                <div class="col col-3"`>
                    {{ submit_button('Buscar', 'class': 'btn btn-primary') }}
                </div>                
            </div>            
        </footer>
</form>
{% endblock %}