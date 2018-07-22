<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("invoicelinedetail/index", "Go Back") }}</li>
            <li class="next">{{ link_to("invoicelinedetail/new", "Create ") }}</li>
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
            <th>OverrideUOMSetRef Of ListID</th>
            <th>OverrideUOMSetRef Of FullName</th>
            <th>Rate</th>
            <th>RatePercent</th>
            <th>ClassRef Of ListID</th>
            <th>ClassRef Of FullName</th>
            <th>Amount</th>
            <th>InventorySiteRef Of ListID</th>
            <th>InventorySiteRef Of FullName</th>
            <th>InventorySiteLocationRef Of ListID</th>
            <th>InventorySiteLocationRef Of FullName</th>
            <th>SerialNumber</th>
            <th>LotNumber</th>
            <th>ServiceDate</th>
            <th>SalesTaxCodeRef Of ListID</th>
            <th>SalesTaxCodeRef Of FullName</th>
            <th>Other1</th>
            <th>Other2</th>
            <th>LinkedTxnID</th>
            <th>LinkedTxnLineID</th>
            <th>CustomField1</th>
            <th>CustomField2</th>
            <th>CustomField3</th>
            <th>CustomField4</th>
            <th>CustomField5</th>
            <th>CustomField6</th>
            <th>CustomField7</th>
            <th>CustomField8</th>
            <th>CustomField9</th>
            <th>CustomField10</th>
            <th>CustomField11</th>
            <th>CustomField12</th>
            <th>CustomField13</th>
            <th>CustomField14</th>
            <th>CustomField15</th>
            <th>IDKEY</th>
            <th>GroupIDKEY</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for invoicelinedetail in page.items %}
            <tr>
                <td>{{ invoicelinedetail.getTxnlineid() }}</td>
            <td>{{ invoicelinedetail.getItemrefListid() }}</td>
            <td>{{ invoicelinedetail.getItemrefFullname() }}</td>
            <td>{{ invoicelinedetail.getDescription() }}</td>
            <td>{{ invoicelinedetail.getQuantity() }}</td>
            <td>{{ invoicelinedetail.getUnitofmeasure() }}</td>
            <td>{{ invoicelinedetail.getOverrideuomsetrefListid() }}</td>
            <td>{{ invoicelinedetail.getOverrideuomsetrefFullname() }}</td>
            <td>{{ invoicelinedetail.getRate() }}</td>
            <td>{{ invoicelinedetail.getRatepercent() }}</td>
            <td>{{ invoicelinedetail.getClassrefListid() }}</td>
            <td>{{ invoicelinedetail.getClassrefFullname() }}</td>
            <td>{{ invoicelinedetail.getAmount() }}</td>
            <td>{{ invoicelinedetail.getInventorysiterefListid() }}</td>
            <td>{{ invoicelinedetail.getInventorysiterefFullname() }}</td>
            <td>{{ invoicelinedetail.getInventorysitelocationrefListid() }}</td>
            <td>{{ invoicelinedetail.getInventorysitelocationrefFullname() }}</td>
            <td>{{ invoicelinedetail.getSerialnumber() }}</td>
            <td>{{ invoicelinedetail.getLotnumber() }}</td>
            <td>{{ invoicelinedetail.getServicedate() }}</td>
            <td>{{ invoicelinedetail.getSalestaxcoderefListid() }}</td>
            <td>{{ invoicelinedetail.getSalestaxcoderefFullname() }}</td>
            <td>{{ invoicelinedetail.getOther1() }}</td>
            <td>{{ invoicelinedetail.getOther2() }}</td>
            <td>{{ invoicelinedetail.getLinkedtxnid() }}</td>
            <td>{{ invoicelinedetail.getLinkedtxnlineid() }}</td>
            <td>{{ invoicelinedetail.getCustomfield1() }}</td>
            <td>{{ invoicelinedetail.getCustomfield2() }}</td>
            <td>{{ invoicelinedetail.getCustomfield3() }}</td>
            <td>{{ invoicelinedetail.getCustomfield4() }}</td>
            <td>{{ invoicelinedetail.getCustomfield5() }}</td>
            <td>{{ invoicelinedetail.getCustomfield6() }}</td>
            <td>{{ invoicelinedetail.getCustomfield7() }}</td>
            <td>{{ invoicelinedetail.getCustomfield8() }}</td>
            <td>{{ invoicelinedetail.getCustomfield9() }}</td>
            <td>{{ invoicelinedetail.getCustomfield10() }}</td>
            <td>{{ invoicelinedetail.getCustomfield11() }}</td>
            <td>{{ invoicelinedetail.getCustomfield12() }}</td>
            <td>{{ invoicelinedetail.getCustomfield13() }}</td>
            <td>{{ invoicelinedetail.getCustomfield14() }}</td>
            <td>{{ invoicelinedetail.getCustomfield15() }}</td>
            <td>{{ invoicelinedetail.getIdkey() }}</td>
            <td>{{ invoicelinedetail.getGroupidkey() }}</td>

                <td>{{ link_to("invoicelinedetail/edit/"~invoicelinedetail.getTxnlineid(), "Edit") }}</td>
                <td>{{ link_to("invoicelinedetail/delete/"~invoicelinedetail.getTxnlineid(), "Delete") }}</td>
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
                <li>{{ link_to("invoicelinedetail/search", "First") }}</li>
                <li>{{ link_to("invoicelinedetail/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("invoicelinedetail/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("invoicelinedetail/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
