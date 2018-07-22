{% extends "layouts/adicional.volt" %}
{% block forma %}
    {{ content() }}
    {% endblock %}
    {% block cabecera %}
        {{ form('session/start', 'class':'sky-form')}}
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
            {{ submit_button('Login', 'class': 'btn btn-primary') }}
            <p class="help-block">Ingrese su correo electronico habilitado y su clave de seguridad.</p>
        </footer>
</form>
{% endblock %}