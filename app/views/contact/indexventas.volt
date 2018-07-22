{% extends "layouts/adicional.volt" %}
{% block forma %}
    {{ content() }}
    <div class="body bg-blue">
    {% endblock %}
    {% block cabecera %}
        {{ form('contact/send', 'class':'sky-form')}}
    {% endblock %}
    {% block cuerpoforma %}

    <fieldset>
            <section>
                <div class="row">
                    <label class="label col col-4">Your Name</label>
                    <div class="col col-8">
                        <label class="input">
                            <i class="icon-append fa fa-user"></i>
                            {{ form.render('name', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>        
            <section>
                <div class="row">
                    <label class="label col col-4">Email</label>
                    <div class="col col-8">
                        <label class="input">
                            <i class="icon-append fa fa-user"></i>
                            {{ form.render('email', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>        
            <section>
                <div class="row">
                    <label class="label col col-4">Comments</label>
                    <div class="col col-8">
                        <label class="input">
                            <i class="icon-append fa fa-user"></i>
                            {{ form.render('comments', ['class': 'form-control']) }}
                        </label>
                    </div>
                </div>
            </section>        
    </fieldset>
        <footer>
            {{ submit_button('Send', 'class': 'btn btn-primary') }}
            <p class="help-block">Este mensaje sera recibido por el departamento de ventas.</p>
        </footer>
    </form>
</div>
{% endblock %}
