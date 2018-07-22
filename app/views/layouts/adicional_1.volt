
{{ elements.getModelosAdicional() }}
<div class="container-fluid">
    <div class="row">

        <div class="col-md-8">
            {% block forma %} {% endblock %}
            {% block cabecera %} {% endblock %}
            <header><?php echo $this->view->descriptivo['cabecera']; ?></header>
            {% block cuerpoforma %} {% endblock %}
        </div>

        <div class="col-md-4">

            <div class="page-header">
                <h2><?php echo $this->view->descriptivo['titulo']; ?></h2>
            </div>

            <p><?php echo $this->view->descriptivo['subtitulo']; ?></p>
            <ul><?php 
                $i = 0;
                foreach ($this->view->descriptivo['lineas'] as $caption) {
                echo '<li>' . $caption . '</li>';
                $i++;
                } ?>
            </ul>

        </div>
    </div>
</div>
