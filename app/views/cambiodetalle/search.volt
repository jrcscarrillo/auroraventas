<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("cambiodetalle/index", "Go Back") }}</li>
            <li class="next">{{ link_to("cambiodetalle/new", "Create ") }}</li>
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
        {% for cambiodetalle in page.items %}
            <tr>
                <td>{{ cambiodetalle.getTxnlineid() }}</td>
            <td>{{ cambiodetalle.getItemrefListid() }}</td>
            <td>{{ cambiodetalle.getItemrefFullname() }}</td>
            <td>{{ cambiodetalle.getDescription() }}</td>
            <td>{{ cambiodetalle.getQuantity() }}</td>
            <td>{{ cambiodetalle.getUnitofmeasure() }}</td>
            <td>{{ cambiodetalle.getRate() }}</td>
            <td>{{ cambiodetalle.getRatepercent() }}</td>
            <td>{{ cambiodetalle.getAmount() }}</td>
            <td>{{ cambiodetalle.getInventorysiterefListid() }}</td>
            <td>{{ cambiodetalle.getInventorysiterefFullname() }}</td>
            <td>{{ cambiodetalle.getSerialnumber() }}</td>
            <td>{{ cambiodetalle.getLotnumber() }}</td>
            <td>{{ cambiodetalle.getSalestaxcoderefListid() }}</td>
            <td>{{ cambiodetalle.getSalestaxcoderefFullname() }}</td>
            <td>{{ cambiodetalle.getInvoiced() }}</td>
            <td>{{ cambiodetalle.getIsmanuallyclosed() }}</td>
            <td>{{ cambiodetalle.getOther1() }}</td>
            <td>{{ cambiodetalle.getOther2() }}</td>
            <td>{{ cambiodetalle.getIdkey() }}</td>

                <td>{{ link_to("cambiodetalle/edit/"~cambiodetalle.getTxnlineid(), "Edit") }}</td>
                <td>{{ link_to("cambiodetalle/delete/"~cambiodetalle.getTxnlineid(), "Delete") }}</td>
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
                <li>{{ link_to("cambiodetalle/search", "First") }}</li>
                <li>{{ link_to("cambiodetalle/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("cambiodetalle/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("cambiodetalle/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
