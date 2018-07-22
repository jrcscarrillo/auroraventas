<div class="row">
    <div class="col-sm-2">
    </div> 
    <div class="col-sm-4">
        <nav>
            <ul class="pagination">
                <li>{{ link_to("vehicle/index", "Atras", "class": "btn btn-info") }}</li>
                <li>{{ link_to("vehicle/search", "Primera") }}</li>
                <li>{{ link_to("vehicle/search?page="~page.before, "Ant.") }}</li>
                <li>{{ link_to("vehicle/search?page="~page.next, "Sig.") }}</li>
                <li>{{ link_to("vehicle/search?page="~page.last, "Fin") }}</li>
                <li>{{ link_to("vehicle/new", "Agregar", "class": "btn btn-info") }}</li>
            </ul>
        </nav>
    </div>
    <div class="col-sm-3">
            <h1>Vehiculos</h1>
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
                        {% for vehicle in page.items %}
                            <tr>
                                <td>{{ vehicle.getlistID() }}</td>
                                <td>{{ vehicle.gettimeCreated() }}</td>
                                <td>{{ vehicle.gettimeModified() }}</td>
                                <td>{{ vehicle.getname() }}</td>
                                <td>{{ vehicle.getdescription() }}</td>
                                <td>{{ vehicle.getaddress() }}</td>
                                <td>{{ vehicle.getphone() }}</td>
                                <td>{{ vehicle.getemail() }}</td>
                                <td>{{ vehicle.gettipoId() }}</td>
                                <td>{{ vehicle.getnumeroId() }}</td>

                                <td>{{ link_to("vehicle/edit/"~vehicle.getlistID(), "Edit") }}</td>
                                <td>{{ link_to("vehicle/delete/"~vehicle.getlistID(), "Delete") }}</td>
                            </tr>
                        {% endfor %}
                    {% else %}
                        No se han encontrado la ruta o rutas con esos parametros
                    {% endif %}
                </tbody>
            </table>
        </div>
    </div>
</div>


