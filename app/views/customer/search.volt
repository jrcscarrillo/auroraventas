<div class="row">
    <div class="col-sm-3">
        <p></p>
    </div>
    <div class="col-sm-6">
        <nav>
            <ul class="pagination">
                <li class="previous">{{ link_to("customer/index", "Atras") }}</li>
                <li>{{ link_to("customer/search", "Primera") }}</li>
                <li>{{ link_to("customer/search?page="~page.before, "Ant.") }}</li>
                <li>{{ link_to("customer/search?page="~page.next, "Sig.") }}</li>
                <li>{{ link_to("customer/search?page="~page.last, "Fin") }}</li>
            </ul>
        </nav>
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
                        <th width="30%">Razon Social</th>
                        <th>Nombre Comercial</th>
                        <th width="30%">Direccion</th>
                        <th>Phone</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Balance</th>
                        <th>TotalBalance</th>
                        <th>Numero Id</th>

                        <th>Nuevo Pedido</th>
                        <th>Consulta Pedidos</th>
                    </tr>
                </thead>
                <tbody>
                    {% if page.items is defined %}
                        {% for customer in page.items %}
                            <tr>
                                <td>{{ customer.getFullname() }}</td>
                                <td>{{ customer.getCompanyname() }}</td>
                                <td>{{ customer.getBilladdressAddr1() ~ ' ' ~ customer.getBilladdressCity() ~ ' ' ~ customer.getBilladdressState() ~ ' ' ~ customer.getBilladdressPostalcode() ~ customer.getBilladdressCountry() }}</td>
                                <td>{{ customer.getPhone() }}</td>
                                <td>{{ customer.getMobile() }}</td>
                                <td>{{ customer.getEmail() }}</td>
                                <td>{{ customer.getBalance() }}</td>
                                <td>{{ customer.getTotalbalance() }}</td>
                                <td>{{ customer.getAccountnumber() }}</td>
                                <td width="2%">{{ link_to("pedidostmp/newventas/"~customer.getListid(), '<i class="glyphicon glyphicon-unchecked"></i>', "class": "btn btn-default") }}</td>
                                <td width="2%">{{ link_to("pedidos/searchventas/"~customer.getListid(), '<i class="glyphicon glyphicon-list"></i>', "class": "btn btn-default") }}</td>
                            </tr>
                        {% endfor %}
                    {% else %}
                        No se han encontrado al cliente o clientes con esos parametros
                    {% endif %}
                </tbody>
            </table>
        </div>
    </div>
</div>
