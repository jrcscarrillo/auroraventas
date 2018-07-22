{% extends "layouts/adicional.volt" %}
{% block forma %}
    {{ content() }}
    <div align="right">
        {{ link_to("codetype/new", "Add a code type to our database", "class": "btn btn-primary") }}
    </div>
    <div class="body bg-blue">
    {% endblock %}
    {% block cabecera %}
        {{ form('codetype/search', 'class':'sky-form')}}
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
            {{ submit_button('Search', 'class': 'btn btn-primary') }}
            <p class="help-block">By searching, you can check all or part of database developers.</p>
        </footer>
    </form>
</div>
{% endblock %}