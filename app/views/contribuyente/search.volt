<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("contribuyente/index", "Regresar") }}</li>
            <li class="next">{{ link_to("contribuyente/new", "Adicionar ") }}</li>
        </ul>
    </nav>
</div>

{{ content() }}
{% for contribuyente in page.items %}
    {% if loop.first %}
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Id</th>
                    <th>Ruc</th>
                    <th>Razon</th>
                    <th>NombreComercial</th>
                    <th>DirMatriz</th>
                    <th>DirEmisor</th>
                    <th>Estab</th>
                    <th>Punto</th>
                    <th>Ambiente</th>
                    <th>Emision</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                    <th>Selecc</th>
                </tr>
            </thead>
        {% endif %}
        <tbody>
            <tr>
                <td>  </td>
                <td>{{ contribuyente.Id }}</td>
                <td>{{ contribuyente.Ruc }}</td>
                <td>{{ contribuyente.Razon }}</td>
                <td>{{ contribuyente.NombreComercial }}</td>
                <td>{{ contribuyente.DirMatriz }}</td>
                <td>{{ contribuyente.DirEmisor }}</td>
                <td>{{ contribuyente.CodEmisor }}</td>
                <td>{{ contribuyente.Punto }}</td>
                <td>{{ contribuyente.Ambiente }}</td>
                <td>{{ contribuyente.Emision }}</td>

                <td>{{ link_to("contribuyente/edit/"~contribuyente.Id, '<i class="glyphicon glyphicon-edit"></i>', "class": "btn btn-default") }}</td>
                <td>{{ link_to("contribuyente/delete/"~contribuyente.Id, '<i class="glyphicon glyphicon-remove"></i>', "class": "btn btn-default") }}</td>
                <td>{{ link_to("contribuyente/select/"~contribuyente.Id, '<i class="glyphicon glyphicon-check"></i>', "class": "btn btn-default") }}</td>
            </tr>
        </tbody>
        {% if loop.last %}
            <tbody>
                <tr>
                    <td colspan="17" align="right">
                        <div class="btn-group">
                            {{ link_to("contribuyente/search", "Inicio") }}
                            {{ link_to("contribuyente/search?page="~page.before, "Ant.") }}
                            {{ link_to("contribuyente/search?page="~page.next, "Sig.") }}
                            {{ link_to("contribuyente/search?page="~page.last, "Fin") }}
                            <span class="help-inline">{{ page.current }}/{{ page.total_pages }}</span>
                        </div>
                    </td>
                </tr>
            <tbody>
        </table>
    {% endif %}
{% else %}
    No se han encontrado fechas de sincronizacion
{% endfor %}