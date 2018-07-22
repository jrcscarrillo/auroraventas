
{{ content() }}

{% for miscodigos in page.items %}
    {% if loop.first %}
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>AppID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Url</th>
                    <th>Soporte</th>
                    <th>UltimoUsuario</th>
                    <th>FechaCreacion</th>

                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
        {% endif %}
        <tbody>
            <tr>
                <td>{{ miscodigos.id }}</td>
                <td>{{ miscodigos.nombre }}</td>
                <td>{{ miscodigos.descripcion }}</td>
                <td>{{ miscodigos.url }}</td>
                <td>{{ miscodigos.soporte }}</td>
                <td>{{ miscodigos.ultimoUsuario }}</td>
                <td>{{ miscodigos.fechaCreacion }}</td>

                <td>{{ link_to("aplicaciones/edit/"~miscodigos.id, "Edit") }}</td>
                <td>{{ link_to("aplicaciones/delete/"~miscodigos.id, "Delete") }}</td>
            </tr>
        </tbody>
        {% if loop.last %}
            <tbody>
                <tr>
                    <td colspan="3" align="left">
                        <div class="btn-group">
                            {{ link_to("aplicaciones/index", "Atras") }}
                            {{ link_to("aplicaciones/new", "Nueva ") }}
                                {{ page.current~"/"~page.total_pages }}
                        </div>
                    </td>
                    <td colspan="6" align="right">
                        {{ link_to("aplicaciones/search", "Inicio") }}
                        {{ link_to("aplicaciones/search?page="~page.before, "Ant.") }}
                        {{ link_to("aplicaciones/search?page="~page.next, "Sig.") }}
                        {{ link_to("aplicaciones/search?page="~page.last, "Fin") }}
                    </td>
                </tr>
            </tbody>
        </table>
    {% endif %}
{% else %}
    No se han encontrado aplicaciones
{% endfor %}
