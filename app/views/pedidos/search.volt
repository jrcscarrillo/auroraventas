<div class="row">
    <div class="col-sm-3">
        <p></p>
    </div>
    <div class="col-sm-6">
        <nav>
            <ul class="pagination">
                <li class="previous">{{ link_to("pedidos/index", "Atras") }}</li>
                <li>{{ link_to("pedidos/search", "Primera") }}</li>
                <li>{{ link_to("pedidos/search?page="~page.before, "Ant.") }}</li>
                <li>{{ link_to("pedidos/search?page="~page.next, "Sig.") }}</li>
                <li>{{ link_to("pedidos/search?page="~page.last, "Fin") }}</li>
            </ul>
        </nav>
    </div>
    <div class="col-sm-3">
        <nav>
            <ul class="pagination pagination-lg">
                <li class="btn btn-success">{{ "Pag.  "~page.current ~"  de  " }}</li>
                <li class="btn btn-warning">{{ page.total_pages ~ "  Pags." }}</li>
            </ul>
        </nav>
    </div>
</div>
{{ content() }}

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-responsive table-bordered table-striped" align="center">
                <thead class="coloreando" style="background-color: black">
                    <tr>
                        <th width="30%">Cliente Nombres/Razon </th>
                        <th>Fecha Emision</th>
                        <th>Numero Pedido</th>
                        <th>Orden Compra</th>
                        <th>Representante</th>
                        <th>Subtotal</th>
                        <th>IVA</th>
                        <th>Total</th>
                        <th>Estado</th>

                        <th>Pasar a QB</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    {% if page.items is defined %}
                        {% for pedido in page.items %}
                            <tr>
                                <td>{{ pedido.getCustomerrefFullname() }}</td>
                                <td>{{ pedido.getTxndate() }}</td>
                                <td>{{ pedido.getRefnumber() }}</td>
                                <td>{{ pedido.getPonumber() }}</td>
                                <td>{{ pedido.getSalesreprefFullname() }}</td>
                                <td>{{ pedido.getSubtotal() | number_format(2, ',', '.') }}</td>
                                <td>{{ pedido.getSalestaxtotal() | number_format(2, ',', '.') }}</td>
                                <td>{{ pedido.getTotalamount() | number_format(2, ',', '.') }}</td>
                                <td>{{ pedido.getStatus() }}</td>

                                <td>{{ link_to("pedidos/edit/" ~ pedido.getRefnumber(), '<i class="glyphicon glyphicon-upload"></i>', "class": "btn btn-success") }}</td>
                                <td>{{ link_to("pedidos/delete/" ~ pedido.getRefnumber(), '<i class="glyphicon glyphicon-print"></i>', "class": "btn btn-success") }}</td>
                            </tr>
                        {% endfor %}
                    {% endif %}
                </tbody>
            </table>
        </div>
    </div>
</div>

