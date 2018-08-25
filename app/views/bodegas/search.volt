<div class="row">
    <div class="col-sm-2">
        <p></p>
    </div>
    <div class="col-sm-4">
        <nav>
            <ul class="pagination">
                <li>{{ link_to("bodegas/index", "Atras", "class": "btn btn-info") }}</li>
                <li>{{ link_to("bodegas/search", "Primera") }}</li>
                <li>{{ link_to("bodegas/search?page="~page.before, "Ant.") }}</li>
                <li>{{ link_to("bodegas/search?page="~page.next, "Sig.") }}</li>
                <li>{{ link_to("bodegas/search?page="~page.last, "Fin") }}</li>
            </ul>
        </nav>
    </div>
                <div class="col-sm-4">
            <h1>Clases/Bodegas</h1>
    </div>    
    <div class="col-sm-2">
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
                <th>ListID</th>
            <th>TimeCreated</th>
            <th>TimeModified</th>
            <th>Name</th>
            <th>FullName</th>
            <th>IsActive</th>
            <th>Status</th>
            <th>Estado</th>
            <th>SIN-MOV</th>
            <th>CON-MOV</th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for bodegas in page.items %}
            <tr>
                <td>{{ bodegas.getListid() }}</td>
            <td>{{ bodegas.getTimecreated() }}</td>
            <td>{{ bodegas.getTimemodified() }}</td>
            <td>{{ bodegas.getName() }}</td>
            <td>{{ bodegas.getFullname() }}</td>
            <td>{{ bodegas.getIsactive() }}</td>
            <td>{{ bodegas.getStatus() }}</td>
            <td>{{ bodegas.getEstado() }}</td>
            <td width="2%">{{ link_to("bodegas/edit/" ~ bodegas.getListid(), '<i class="glyphicon glyphicon-remove"></i>', "class": "btn btn-default") }}</td>
            <td width="2%">{{ link_to("bodegas/new/" ~ bodegas.getListid(), '<i class="glyphicon glyphicon-ok"></i>', "class": "btn btn-default") }}</td>

            </tr>
                        {% endfor %}
                    {% else %}
                        No se han encontrado a la bodega o bodegas con esos parametros
                    {% endif %}
                </tbody>
            </table>
        </div>
    </div>
</div>