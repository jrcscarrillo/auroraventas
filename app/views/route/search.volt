<div class="row">
    <div class="col-sm-3">
    </div> 
    <div class="col-sm-3">
        <nav>
            <ul class="pagination">
                <li class="previous">{{ link_to("route/index", "Atras") }}</li>
                <li>{{ link_to("route/search", "Primera") }}</li>
                <li>{{ link_to("route/search?page="~page.before, "Ant.") }}</li>
                <li>{{ link_to("route/search?page="~page.next, "Sig.") }}</li>
                <li>{{ link_to("route/search?page="~page.last, "Fin") }}</li>
                <li>{{ link_to("ruta", "Agregar") }}</li>
            </ul>
        </nav>
    </div>
    <div class="col-sm-3">
            <h1>Rutas</h1>
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
                        {% for route in page.items %}
                            <tr>
                                <td>{{ route.getlistID() }}</td>
                                <td>{{ route.gettimeCreated() }}</td>
                                <td>{{ route.gettimeModified() }}</td>
                                <td>{{ route.getname() }}</td>
                                <td>{{ route.getdescription() }}</td>
                                <td>{{ route.getaddress() }}</td>
                                <td>{{ route.getphone() }}</td>
                                <td>{{ route.getemail() }}</td>
                                <td>{{ route.gettipoId() }}</td>
                                <td>{{ route.getnumeroId() }}</td>

                                <td>{{ link_to("route/edit/"~route.getlistID(), "Edit") }}</td>
                                <td>{{ link_to("route/delete/"~route.getlistID(), "Delete") }}</td>
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


