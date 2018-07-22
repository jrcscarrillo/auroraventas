{{ content() }}

{% for miscodigos in page.items %}
{% if loop.first %}
<table class="table table-bordered table-striped" align="center">
    <thead>
            <tr>
                <th>Id</th>
            <th>Tipo</th>
            <th>Username</th>
            <th>TipoId</th>
            <th>NumeroId</th>
            <th>Name</th>
            <th>Email</th>
            <th>Active</th>
            <th>Qbid</th>
                <th>Habilitar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        {% endif %}
        <tbody>
            <tr>
                <td>{{ miscodigos.id }}</td>
            <td>{{ miscodigos.tipo }}</td>
            <td>{{ miscodigos.username }}</td>
            <td>{{ miscodigos.tipoId }}</td>
            <td>{{ miscodigos.numeroId }}</td>
            <td>{{ miscodigos.name }}</td>
            <td>{{ miscodigos.email }}</td>
            <td>{{ miscodigos.active }}</td>
            <td>{{ miscodigos.qbid }}</td>
            <td width="2%">{{ link_to("users/edit/" ~ miscodigos.id, '<i class="glyphicon glyphicon-ok"></i>', "class": "btn btn-default") }}</td>
            <td width="2%">{{ link_to("users/delete/" ~ miscodigos.id, '<i class="glyphicon glyphicon-remove"></i>', "class": "btn btn-default") }}</td>
        </tr>
        </tbody>
{% if loop.last %}
    <tbody>
        <tr>
            <td>        {{ link_to("users/index", "&larr; Atras") }}</td>
            <td colspan="10" align="right">
                <div class="btn-group">
                    {{ link_to("users/search", '<i class="icon-fast-backward"></i> Inicio', "class": "btn btn-default") }}
                    {{ link_to("users/search?page=" ~ page.before, '<i class="icon-step-backward"></i> Ant.', "class": "btn btn-default") }}
                    {{ link_to("users/search?page=" ~ page.next, '<i class="icon-step-forward"></i> Prox.', "class": "btn btn-default") }}
                    {{ link_to("users/search?page=" ~ page.last, '<i class="icon-fast-forward"></i> Fin', "class": "btn btn-default") }}
                    <span class="help-inline">{{ page.current }}/{{ page.total_pages }}</span>
                </div>
            </td>
        </tr>
    <tbody>
</table>
{% endif %}
{% else %}
    No se han encontrado descripciones
{% endfor %}
