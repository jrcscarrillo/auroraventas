{% extends "layouts/adicional.volt" %}
{% block forma %}
    {{ content() }}
    <div align="right">
        {{ link_to("items/new", "Aumente un Helado", "class": "btn btn-primary") }}
    </div>
    <div class="body bg-blue">
    {% endblock %}
    {% block cabecera %}
        {{ form('items/search', 'class':'sky-form')}}
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
            <p class="help-block">Buscar, le permite revisar todo o parte de los helados.</p>
        </footer>
    </form>
</div>
{% endblock %}