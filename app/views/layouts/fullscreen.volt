
{{ elements.getModelosAdicional() }}
<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            {% block forma %} {% endblock %}
            {% block cabecera %} {% endblock %}
            <header><?php echo $this->view->descriptivo['cabecera']; ?></header>
            {% block cuerpoforma %} {% endblock %}
        </div>

    </div>
</div>
