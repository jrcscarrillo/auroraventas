{% extends "layouts/adicional_1.volt" %}
{% block forma %}
    {{ content() }}
    <div align="right">
        {{ link_to("contribuyente/new", "Agregar un Contribuyente", "class": "btn btn-primary") }}
    </div>
    <div class="body bg-blue">
    {% endblock %}
    {% block cabecera %}
        {{ form('contribuyente/search', 'class':'sky-form')}}
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
                                    <i class="icon-append fa fa-search"></i>
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
            <p class="help-block">Se puede seleccionar a los contribuyentes por estos parametros.</p>
        </footer>
    </form>
</div>
{% endblock %}