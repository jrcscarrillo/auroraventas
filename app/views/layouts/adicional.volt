
{{ elements.getModelosAdicional() }}
<div class="container-fluid">
    <div class="row">

        <div class="col-md-6">
            {% block forma %} {% endblock %}
            {% block cabecera %} {% endblock %}
            <header><?php echo $this->view->descriptivo['cabecera']; ?></header>
            {% block cuerpoforma %} {% endblock %}
        </div>

        <div class="col-md-6">

            <div class="page-header">
                <h2><?php echo $this->view->descriptivo['titulo']; ?></h2>
            </div>

            <span style="background-color: #FFFFFF"><?php echo $this->view->descriptivo['subtitulo']; ?></span>
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
