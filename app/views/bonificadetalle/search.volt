<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("bonificadetalle/index", "Go Back") }}</li>
            <li class="next">{{ link_to("bonificadetalle/new", "Create ") }}</li>
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
        {% for bonificadetalle in page.items %}
            <tr>
                <td>{{ bonificadetalle.getTxnlineid() }}</td>
            <td>{{ bonificadetalle.getItemrefListid() }}</td>
            <td>{{ bonificadetalle.getItemrefFullname() }}</td>
            <td>{{ bonificadetalle.getDescription() }}</td>
            <td>{{ bonificadetalle.getQuantity() }}</td>
            <td>{{ bonificadetalle.getUnitofmeasure() }}</td>
            <td>{{ bonificadetalle.getRate() }}</td>
            <td>{{ bonificadetalle.getRatepercent() }}</td>
            <td>{{ bonificadetalle.getAmount() }}</td>
            <td>{{ bonificadetalle.getInventorysiterefListid() }}</td>
            <td>{{ bonificadetalle.getInventorysiterefFullname() }}</td>
            <td>{{ bonificadetalle.getSerialnumber() }}</td>
            <td>{{ bonificadetalle.getLotnumber() }}</td>
            <td>{{ bonificadetalle.getSalestaxcoderefListid() }}</td>
            <td>{{ bonificadetalle.getSalestaxcoderefFullname() }}</td>
            <td>{{ bonificadetalle.getInvoiced() }}</td>
            <td>{{ bonificadetalle.getIsmanuallyclosed() }}</td>
            <td>{{ bonificadetalle.getOther1() }}</td>
            <td>{{ bonificadetalle.getOther2() }}</td>
            <td>{{ bonificadetalle.getIdkey() }}</td>

                <td>{{ link_to("bonificadetalle/edit/"~bonificadetalle.getTxnlineid(), "Edit") }}</td>
                <td>{{ link_to("bonificadetalle/delete/"~bonificadetalle.getTxnlineid(), "Delete") }}</td>
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
                <li>{{ link_to("bonificadetalle/search", "First") }}</li>
                <li>{{ link_to("bonificadetalle/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("bonificadetalle/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("bonificadetalle/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
