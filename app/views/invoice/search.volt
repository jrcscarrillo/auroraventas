<div class="row">
    <div class="col-sm-3">
        <p></p>
    </div>
    <div class="col-sm-6">
        <nav>
            <ul class="pagination">
                <li class="previous">{{ link_to("invoice/index", "Atras") }}</li>
                <li>{{ link_to("invoice/search", "Primera") }}</li>
                <li>{{ link_to("invoice/search?page="~page.before, "Ant.") }}</li>
                <li>{{ link_to("invoice/search?page="~page.next, "Sig.") }}</li>
                <li>{{ link_to("invoice/search?page="~page.last, "Fin") }}</li>
            </ul>
        </nav>
    </div>
    <div class="col-sm-3">
        <nav>
            <ul class="pagination">
                <li class="btn-info">{{ "Pag.  "~page.current ~"  de  " }}</li>
                <li class="btn-info">{{ page.total_pages ~ "  Pags." }}</li>
            </ul>
        </nav>
    </div>
</div>
{{ content() }}


<div class="row">
    <table class="table table-responsive table-bordered table-striped" align="center">
        <thead class="coloreando" style="background-color: black">
            <tr>
                <th width="30%">Cliente Nombres/Razon </th>
                <th>Fecha Emision</th>
                <th>Numero Factura</th>
                <th>Direccion</th>
                <th>Vendedor</th>
                <th>Subtotal</th>
                <th>%</th>
                <th>Valor IVA</th>
                <th>Total</th>
                <th>Estado SRI</th>

                <th>Firma</th>
                <th>Autoriza</th>
                <th>Imprime</th>
            </tr>
        </thead>
        <tbody>
            {% if page.items is defined%}
                {% for miscodigos in page.items %}
                    <tr>
                        <td>{{ miscodigos.getCustomerrefFullname() }}</td>
                        <td>{{ miscodigos.getTxndate() }}</td>
                        <td>{{ miscodigos.getRefnumber() }}</td>
                        <td>{{ miscodigos.getBilladdressAddr1() }}</td>
                        <td>{{ miscodigos.getSalesreprefFullname() }}</td>
                        <td>{{ miscodigos.getSubtotal() }}</td>
                        <td>{{ miscodigos.getSalestaxpercentage() }}</td>
                        <td>{{ miscodigos.getSalestaxtotal() }}</td>
                        <td>{{ miscodigos.getAppliedamount() }}</td>
                        <td>{{ miscodigos.getCustomField15() }}</td>
                        <td width="2%">{{ link_to("invoice/firmar/" ~ miscodigos.getTxnid(), '<i class="glyphicon glyphicon-pencil"></i>', "class": "btn btn-default") }}</td>
                        <td width="2%">{{ link_to("invoice/autorizar/" ~ miscodigos.getTxnid(), '<i class="glyphicon glyphicon-certificate"></i>', "class": "btn btn-default") }}</td>
                        <td width="2%">{{ link_to("invoice/impresion/" ~ miscodigos.getTxnid(), '<i class="glyphicon glyphicon-print"></i>', "class": "btn btn-default") }}</td>
                    </tr>

                {% endfor %}
            {% else %}
                No se han encontrado facturas sincronizadas desde el Quickbooks
            {% endif %}
        </tbody>
    </table>
</div>
