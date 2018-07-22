{{ content() }}
{% for miscodigos in page.items %}
    {% if loop.first %}
        <table class="table table-responsive table-bordered table-striped" align="center">
            <thead class="mdbcolor">
                <tr>
                    <th width="30%">Proveedor Nombres/Razon </th>
                    <th>Fecha Emision</th>
                    <th>Numero Retencion</th>
                    <th>Valor Retencion</th>
                    <th>Estado SRI</th>

                    <th>Firma</th>
                    <th>Autoriza</th>
                    <th>Imprime</th>
                </tr>
            </thead>
        {% endif %}
        <tbody>
            <tr>
                <td>{{ miscodigos.getVendorrefFullname() }}</td>
                <td>{{ miscodigos.getTxndate() }}</td>
                <td>{{ miscodigos.getRefnumber() }}</td>
                <td>{{ miscodigos.getCreditamount() }}</td>
                <td>{{ miscodigos.getCustomField15() }}</td>
                <td width="2%">{{ link_to("vendorcredit/firmar/" ~ miscodigos.getTxnid(), '<i class="glyphicon glyphicon-pencil"></i>', "class": "btn btn-default") }}</td>
                <td width="2%">{{ link_to("vendorcredit/autorizar/" ~ miscodigos.getTxnid(), '<i class="glyphicon glyphicon-certificate"></i>', "class": "btn btn-default") }}</td>
                <td width="2%">{{ link_to("vendorcredit/impresion/" ~ miscodigos.getTxnid(), '<i class="glyphicon glyphicon-print"></i>', "class": "btn btn-default") }}</td>
            
        </tbody>
        {% if loop.last %}
            <tbody>
                <tr>
                    <td>{{ link_to("vendorcredit/index", "&larr; Atras") }}</td>
                    <td colspan="11" align="right">
                        <div class="btn-group">
                            {{ link_to("vendorcredit/search", '<i class="icon-fast-backward"></i> Inicio', "class": "btn btn-default") }}
                            {{ link_to("vendorcredit/search?page=" ~ page.before, '<i class="icon-step-backward"></i> Ant.', "class": "btn btn-default") }}
                            {{ link_to("vendorcredit/search?page=" ~ page.next, '<i class="icon-step-forward"></i> Sig.', "class": "btn btn-default") }}
                            {{ link_to("vendorcredit/search?page=" ~ page.last, '<i class="icon-fast-forward"></i> Fin', "class": "btn btn-default") }}
                            <span class="help-inline">{{ page.current }}/{{ page.total_pages }}</span>
                        </div>
                    </td>
                </tr>
            <tbody>
        </table>
    {% endif %}
{% else %}
    No se han encontrado facturas sincronizadas desde el Quickbooks
{% endfor %}
