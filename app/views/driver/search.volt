<div class="row">
    <div class="col-sm-2">
        <p></p>
    </div>
    <div class="col-sm-4">
        <nav>
            <ul class="pagination">
                <li>{{ link_to("driver/index", "Atras", "class": "btn btn-info") }}</li>
                <li>{{ link_to("driver/search", "Primera") }}</li>
                <li>{{ link_to("driver/search?page="~page.before, "Ant.") }}</li>
                <li>{{ link_to("driver/search?page="~page.next, "Sig.") }}</li>
                <li>{{ link_to("driver/search?page="~page.last, "Fin") }}</li>
                <li>{{ link_to("driver/new", "Generar", "class": "btn btn-info") }}</li>
            </ul>
        </nav>
    </div>
                <div class="col-sm-3">
            <h1>Choferes</h1>
    </div>    
    <div class="col-sm-3">
        <nav>
            <ul class="pagination pagination-lg">
                <li class="btn-success">{{ "Pag.  "~page.current ~"  de  " }}</li>
                <li class="btn-warning">{{ page.total_pages ~ "  Pags." }}</li>
            </ul>
        </nav>
    </div>
</div>

{{ content() }}

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-responsive table-bordered table-striped" align="center">
                <thead class="coloreando" style="background-color: brown">
                    <tr>
                        <th>Codigo</th>
                        <th>Fecha creacion</th>
                        <th>Fecha modificacion</th>
                        <th>Nombre Corto</th>
                        <th>Nombre Largo</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th>TipoId</th>
                        <th>NumeroId</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    {% if page.items is defined %}
                        {% for driver in page.items %}
                            <tr>
                                <td>{{ driver.getListid() }}</td>
                                <td>{{ driver.getTimecreated() }}</td>
                                <td>{{ driver.getTimemodified() }}</td>
                                <td>{{ driver.getName() }}</td>
                                <td>{{ driver.getDescription() }}</td>
                                <td>{{ driver.getAddress() }}</td>
                                <td>{{ driver.getPhone() }}</td>
                                <td>{{ driver.getEmail() }}</td>
                                <td>{{ driver.getTipoid() }}</td>
                                <td>{{ driver.getNumeroid() }}</td>

                                <td>{{ link_to("driver/edit/"~driver.getListid(), "Edit") }}</td>
                                <td>{{ link_to("driver/delete/"~driver.getListid(), "Delete") }}</td>
                            </tr>
                        {% endfor %}
                    {% else %}
                        No se han encontrado al chofer o choferes con esos parametros
                    {% endif %}
                </tbody>
            </table>
        </div>
    </div>
</div>


