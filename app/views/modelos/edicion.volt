{% extends "layouts/adicional.volt" %}
{% block forma %}
    {{ content() }}
    <div align="left">
        {{ link_to("modelos", "&larr; Go Back") }}
    </div>
    <div align="right">
        {{ submit_button("Guardar", "class": "btn btn-success") }}
    </div>
    <div class="body bg-blue">
    {% endblock %}
    {% block cabecera %}
        {{ form("modelos/save", 'role': 'form', 'class':'sky-form')}}
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
                                    <i class="icon-append fa fa-edit"></i>
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
            <p class="help-block">Puede buscar una descripcion o varias.</p>
        </footer>
    </form>
</div>
{% endblock %}
