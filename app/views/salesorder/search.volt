<div class="row">
    <div class="col-sm-3">
        <p></p>
    </div>
    <div class="col-sm-6">
    <nav>
        <ul class="pagination">
            <li class="previous">{{ link_to("salesorder/index", "Atras") }}</li>
            <li>{{ link_to("salesorder/search", "Primera") }}</li>
            <li>{{ link_to("salesorder/search?page="~page.before, "Ant.") }}</li>
            <li>{{ link_to("salesorder/search?page="~page.next, "Sig.") }}</li>
            <li>{{ link_to("salesorder/search?page="~page.last, "Fin") }}</li>
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
                <th>Razon Social Cliente</th>
                <th>Fecha Emision</th>
                <th>Numero Guia</th>
                <th>Valor</th>
                <th>Motivo</th>
                <th>Estado SRI</th>
                <th>Firmar</th>
                <th>Autorizar</th>
                <th>Imprimir</th>
            </tr>
        </thead>
        <tbody>
            {% if page.items is defined %}
                {% for salesorder in page.items %}
                    <tr>
                        <td>{{ salesorder.getCustomerrefFullname() }}</td>
                        <td>{{ salesorder.getTxndate() }}</td>
                        <td>{{ salesorder.getRefnumber() }}</td>
                        <td>{{ salesorder.getTotalamount() }}</td>
                        <td>{{ salesorder.getMemo() }}</td>
                        <td>{{ salesorder.getCustomfield15() }}</td>
                        <td width="2%">{{ link_to("salesorder/firmar/" ~ salesorder.getTxnid(), '<i class="glyphicon glyphicon-pencil"></i>', "class": "btn btn-default") }}</td>
                        <td width="2%">{{ link_to("salesorder/autorizar/" ~ salesorder.getTxnid(), '<i class="glyphicon glyphicon-certificate"></i>', "class": "btn btn-default") }}</td>
                        <td width="2%">{{ link_to("salesorder/impresion/" ~ salesorder.getTxnid(), '<i class="glyphicon glyphicon-print"></i>', "class": "btn btn-default") }}</td>

                    </tr>
                {% endfor %}
            {% endif %}
        </tbody>
    </table>
</div>

