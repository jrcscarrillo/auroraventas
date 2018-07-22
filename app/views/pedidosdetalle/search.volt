<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("pedidosdetalle/index", "Go Back") }}</li>
            <li class="next">{{ link_to("pedidosdetalle/new", "Create ") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>Search result</h1>
</div>

{{ content() }}

<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>TxnLineID</th>
            <th>ItemRef Of ListID</th>
            <th>ItemRef Of FullName</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>UnitOfMeasure</th>
            <th>Rate</th>
            <th>RatePercent</th>
            <th>Amount</th>
            <th>InventorySiteRef Of ListID</th>
            <th>InventorySiteRef Of FullName</th>
            <th>SerialNumber</th>
            <th>LotNumber</th>
            <th>SalesTaxCodeRef Of ListID</th>
            <th>SalesTaxCodeRef Of FullName</th>
            <th>Invoiced</th>
            <th>IsManuallyClosed</th>
            <th>Other1</th>
            <th>Other2</th>
            <th>IDKEY</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for pedidosdetalle in page.items %}
            <tr>
                <td>{{ pedidosdetalle.getTxnlineid() }}</td>
            <td>{{ pedidosdetalle.getItemrefListid() }}</td>
            <td>{{ pedidosdetalle.getItemrefFullname() }}</td>
            <td>{{ pedidosdetalle.getDescription() }}</td>
            <td>{{ pedidosdetalle.getQuantity() }}</td>
            <td>{{ pedidosdetalle.getUnitofmeasure() }}</td>
            <td>{{ pedidosdetalle.getRate() }}</td>
            <td>{{ pedidosdetalle.getRatepercent() }}</td>
            <td>{{ pedidosdetalle.getAmount() }}</td>
            <td>{{ pedidosdetalle.getInventorysiterefListid() }}</td>
            <td>{{ pedidosdetalle.getInventorysiterefFullname() }}</td>
            <td>{{ pedidosdetalle.getSerialnumber() }}</td>
            <td>{{ pedidosdetalle.getLotnumber() }}</td>
            <td>{{ pedidosdetalle.getSalestaxcoderefListid() }}</td>
            <td>{{ pedidosdetalle.getSalestaxcoderefFullname() }}</td>
            <td>{{ pedidosdetalle.getInvoiced() }}</td>
            <td>{{ pedidosdetalle.getIsmanuallyclosed() }}</td>
            <td>{{ pedidosdetalle.getOther1() }}</td>
            <td>{{ pedidosdetalle.getOther2() }}</td>
            <td>{{ pedidosdetalle.getIdkey() }}</td>

                <td>{{ link_to("pedidosdetalle/edit/"~pedidosdetalle.getTxnlineid(), "Edit") }}</td>
                <td>{{ link_to("pedidosdetalle/delete/"~pedidosdetalle.getTxnlineid(), "Delete") }}</td>
            </tr>
        {% endfor %}
        {% endif %}
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-sm-1">
        <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
            {{ page.current~"/"~page.total_pages }}
        </p>
    </div>
    <div class="col-sm-11">
        <nav>
            <ul class="pagination">
                <li>{{ link_to("pedidosdetalle/search", "First") }}</li>
                <li>{{ link_to("pedidosdetalle/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("pedidosdetalle/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("pedidosdetalle/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
