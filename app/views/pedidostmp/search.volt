<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("pedidostmp/index", "Go Back") }}</li>
            <li class="next">{{ link_to("pedidostmp/new", "Create ") }}</li>
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
                <th>TxnID</th>
            <th>TimeCreated</th>
            <th>TimeModified</th>
            <th>EditSequence</th>
            <th>TxnNumber</th>
            <th>CustomerRef Of ListID</th>
            <th>CustomerRef Of FullName</th>
            <th>TxnDate</th>
            <th>RefNumber</th>
            <th>PONumber</th>
            <th>TermsRef Of ListID</th>
            <th>TermsRef Of FullName</th>
            <th>DueDate</th>
            <th>SalesRepRef Of ListID</th>
            <th>SalesRepRef Of FullName</th>
            <th>Subtotal</th>
            <th>SalesTaxTotal</th>
            <th>TotalAmount</th>
            <th>IsManuallyClosed</th>
            <th>IsFullyInvoiced</th>
            <th>Memo</th>
            <th>CustomerMsgRef Of ListID</th>
            <th>CustomerMsgRef Of FullName</th>
            <th>Other</th>
            <th>Status</th>
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
            <th>Other1</th>
            <th>Other2</th>
            <th>IDKEY</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for pedidostmp in page.items %}
            <tr>
                <td>{{ pedidostmp.getTxnid() }}</td>
            <td>{{ pedidostmp.getTimecreated() }}</td>
            <td>{{ pedidostmp.getTimemodified() }}</td>
            <td>{{ pedidostmp.getEditsequence() }}</td>
            <td>{{ pedidostmp.getTxnnumber() }}</td>
            <td>{{ pedidostmp.getCustomerrefListid() }}</td>
            <td>{{ pedidostmp.getCustomerrefFullname() }}</td>
            <td>{{ pedidostmp.getTxndate() }}</td>
            <td>{{ pedidostmp.getRefnumber() }}</td>
            <td>{{ pedidostmp.getPonumber() }}</td>
            <td>{{ pedidostmp.getTermsrefListid() }}</td>
            <td>{{ pedidostmp.getTermsrefFullname() }}</td>
            <td>{{ pedidostmp.getDuedate() }}</td>
            <td>{{ pedidostmp.getSalesreprefListid() }}</td>
            <td>{{ pedidostmp.getSalesreprefFullname() }}</td>
            <td>{{ pedidostmp.getSubtotal() }}</td>
            <td>{{ pedidostmp.getSalestaxtotal() }}</td>
            <td>{{ pedidostmp.getTotalamount() }}</td>
            <td>{{ pedidostmp.getIsmanuallyclosed() }}</td>
            <td>{{ pedidostmp.getIsfullyinvoiced() }}</td>
            <td>{{ pedidostmp.getMemo() }}</td>
            <td>{{ pedidostmp.getCustomermsgrefListid() }}</td>
            <td>{{ pedidostmp.getCustomermsgrefFullname() }}</td>
            <td>{{ pedidostmp.getOther() }}</td>
            <td>{{ pedidostmp.getStatus() }}</td>
            <td>{{ pedidostmp.getTxnlineid() }}</td>
            <td>{{ pedidostmp.getItemrefListid() }}</td>
            <td>{{ pedidostmp.getItemrefFullname() }}</td>
            <td>{{ pedidostmp.getDescription() }}</td>
            <td>{{ pedidostmp.getQuantity() }}</td>
            <td>{{ pedidostmp.getUnitofmeasure() }}</td>
            <td>{{ pedidostmp.getRate() }}</td>
            <td>{{ pedidostmp.getRatepercent() }}</td>
            <td>{{ pedidostmp.getAmount() }}</td>
            <td>{{ pedidostmp.getInventorysiterefListid() }}</td>
            <td>{{ pedidostmp.getInventorysiterefFullname() }}</td>
            <td>{{ pedidostmp.getSerialnumber() }}</td>
            <td>{{ pedidostmp.getLotnumber() }}</td>
            <td>{{ pedidostmp.getSalestaxcoderefListid() }}</td>
            <td>{{ pedidostmp.getSalestaxcoderefFullname() }}</td>
            <td>{{ pedidostmp.getInvoiced() }}</td>
            <td>{{ pedidostmp.getOther1() }}</td>
            <td>{{ pedidostmp.getOther2() }}</td>
            <td>{{ pedidostmp.getIdkey() }}</td>

                <td>{{ link_to("pedidostmp/edit/"~pedidostmp.getTxnid(), "Edit") }}</td>
                <td>{{ link_to("pedidostmp/delete/"~pedidostmp.getTxnid(), "Delete") }}</td>
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
                <li>{{ link_to("pedidostmp/search", "First") }}</li>
                <li>{{ link_to("pedidostmp/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("pedidostmp/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("pedidostmp/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
