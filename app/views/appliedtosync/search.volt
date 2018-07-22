{{ content() }}

<ul class="pager">
    <li class="previous pull-left">
        {{ link_to("appliedtosync/index", "&larr; Atras") }}
    </li>
    <li class="pull-right">
        {{ link_to("appliedtosync/new", "Agregar fecha sincronizacion") }}
    </li>
</ul>

{% for miscodigos in page.items %}
{% if loop.first %}
<table class="table table-bordered table-striped" align="center">
    <thead>
        <tr>
            <th>Fechas ID</th>
            <th>Fecha Creacion</th>
            <th>Usuario</th>
            <th>Compras Desde</th>
            <th>Compras Hasta</th>
            <th>Facturas Desde</th>
            <th>Facturas Hasta</th>
            <th>Retenciones QB Desde</th>
            <th>Retenciones QB Hasta</th>
            <th>Creditos Desde</th>
            <th>Creditos Hasta</th>
            <th>Produccion Desde</th>
            <th>Produccion Hasta</th>
            <th>Retenciones Desde</th>
            <th>Retenciones Hasta</th>
            <th>Otros Desde</th>
            <th>Otros Hasta</th>
        </tr>
    </thead>
{% endif %}
    <tbody>
        <tr>
            <td>{{ miscodigos.id }}</td>
            <td>{{ miscodigos.datacreated }}</td>
            <td>{{ miscodigos.user }}</td>
            <td>{{ miscodigos.billDesde }}</td>
            <td>{{ miscodigos.billHasta }}</td>
            <td>{{ miscodigos.invoiceDesde }}</td>
            <td>{{ miscodigos.invoiceHasta }}</td>
            <td>{{ miscodigos.billCreditDesde }}</td>
            <td>{{ miscodigos.billCreditHasta }}</td>
            <td>{{ miscodigos.creditMemoDesde }}</td>
            <td>{{ miscodigos.creditMemoHasta }}</td>
            <td>{{ miscodigos.productionDesde }}</td>
            <td>{{ miscodigos.productionHasta }}</td>
            <td>{{ miscodigos.retencionDesde }}</td>
            <td>{{ miscodigos.retencionHasta }}</td>
            <td>{{ miscodigos.otrosDesde }}</td>
            <td>{{ miscodigos.otrosHasta }}</td>
        </tr>
    </tbody>
{% if loop.last %}
    <tbody>
        <tr>
            <td colspan="7" align="right">
                <div class="btn-group">
                    {{ link_to("appliedtosync/search", '<i class="icon-fast-backward"></i> Inicio', "class": "btn btn-default") }}
                    {{ link_to("appliedtosync/search?page=" ~ page.before, '<i class="icon-step-backward"></i> Ant.', "class": "btn btn-default") }}
                    {{ link_to("appliedtosync/search?page=" ~ page.next, '<i class="icon-step-forward"></i> Prox.', "class": "btn btn-default") }}
                    {{ link_to("appliedtosync/search?page=" ~ page.last, '<i class="icon-fast-forward"></i> Fin', "class": "btn btn-default") }}
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
