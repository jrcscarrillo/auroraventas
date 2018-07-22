{% extends "layouts/adicional.volt" %}
{% block forma %}
    {{ content() }}
    <div align="left">
        {{ link_to("yourcode", "&larr; Go Back") }}
    </div>
    <div align="right">
        {{ submit_button("Save", "class": "btn btn-success") }}
    </div>
    <div class="body bg-blue">
    {% endblock %}
    {% block cabecera %}
        {{ form("yourcode/save", 'role': 'form', 'class':'sky-form')}}
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
            {{ submit_button('Search', 'class': 'btn btn-primary') }}
            <p class="help-block">By searching, you can check all or part of our snippets codes.</p>
        </footer>
    </form>
</div>
{% endblock %}
