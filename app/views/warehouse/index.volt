{% extends "layouts/adicional.volt" %}
{% block forma %}
    {{ content() }}
    <p>
        {{ link_to("warehouse/new", "Crear una bodega", "class": "btn btn-primary") }}
    </p>
    {% endblock %}
    {% block cabecera %}
        {{ form('warehouse/search', 'class':'sky-form')}}
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
            {{ submit_button('Buscar', 'class': 'btn btn-primary') }}
            <p class="help-block">Todos los parametros descritos pueden ser utilizados para la busqueda.</p>
        </footer>
</form>
{% endblock %}