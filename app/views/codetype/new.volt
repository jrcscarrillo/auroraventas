{% extends "layouts/adicional.volt" %}
{% block forma %}
    {{ content() }}
    <div class="body bg-blue">
    {% endblock %}
    {% block cabecera %}
        {{ form('codetype/create', 'id': 'codetypeForm', 'class': 'sky-form') }}
    {% endblock %}
    {% block cuerpoforma %}
        <fieldset>
            <section>
                <div class="row">
                    <div class="col col-8">
                        <label class="hidden">
                            <i class="icon-append fa fa-user"></i>
                            {{ form.render('id', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <label class="label col col-4">Type</label>
                    <div class="col col-8">
                        <label class="input">
                            <i class="icon-append fa fa-user"></i>
                            {{ form.render('type', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>
        </fieldset>
        <footer>
            {{ submit_button('Submit', 'class': 'btn btn-primary') }}
            <p class="help-block">By signing up, you accept terms of use and privacy policy.</p>
        </footer>
    </form>
</div>
{% endblock %}