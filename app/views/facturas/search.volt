{{ content() }}

{% for miscodigos in page.items %}
    {% if loop.first %}
        <table class="table table-responsive table-bordered table-striped" align="center">
            <thead class="mdbcolor">
                <tr>
                    <th width="30%">Cliente Nombres/Razon </th>
                    <th>Fecha Emision</th>
                    <th>Numero Factura</th>
                    <th>Subtotal</th>
                    <th>%</th>
                    <th>Valor IVA</th>
                    <th>Total</th>
                    <th>Estado SRI</th>
                    <th>Imprimir</th>
                </tr>
            </thead>
        {% endif %}
        <tbody>
            <tr>
                <td>{{ miscodigos.getCustomerrefFullname() }}</td>
                <td>{{ miscodigos.getTxndate() }}</td>
                <td>{{ miscodigos.getRefnumber() }}</td>
                <td>{{ miscodigos.getSubtotal() }}</td>
                <td>{{ miscodigos.getSalestaxpercentage() }}</td>
                <td>{{ miscodigos.getSalestaxtotal() }}</td>
                <td>{{ miscodigos.getAppliedamount() }}</td>
                <td>{{ miscodigos.getCustomField15() }}</td>
                <td width="2%">{{ link_to("facturas/imprimir/" ~ miscodigos.getTxnid(), '<i class="glyphicon glyphicon-print"></i>', "class": "btn btn-default") }}</td>
            
        </tbody>
        {% if loop.last %}
            <tbody>
                <tr>
                    <td>{{ link_to("facturas/index", "&larr; Atras") }}</td>
                    <td colspan="8" align="right">
                        <div class="btn-group">
                            {{ link_to("facturas/search", '<i class="icon-fast-backward"></i> Inicio', "class": "btn btn-default") }}
                            {{ link_to("facturas/search?page=" ~ page.before, '<i class="icon-step-backward"></i> Ant.', "class": "btn btn-default") }}
                            {{ link_to("facturas/search?page=" ~ page.next, '<i class="icon-step-forward"></i> Sig.', "class": "btn btn-default") }}
                            {{ link_to("facturas/search?page=" ~ page.last, '<i class="icon-fast-forward"></i> Fin', "class": "btn btn-default") }}
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
