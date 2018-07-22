<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("txnitemlinedetail/index", "Go Back") }}</li>
            <li class="next">{{ link_to("txnitemlinedetail/new", "Create ") }}</li>
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
            <th>InventorySiteRef Of ListID</th>
            <th>InventorySiteRef Of FullName</th>
            <th>InventorySiteLocationRef Of ListID</th>
            <th>InventorySiteLocationRef Of FullName</th>
            <th>SerialNumber</th>
            <th>LotNumber</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>UnitOfMeasure</th>
            <th>OverrideUOMSetRef Of ListID</th>
            <th>OverrideUOMSetRef Of FullName</th>
            <th>Cost</th>
            <th>Amount</th>
            <th>CustomerRef Of ListID</th>
            <th>CustomerRef Of FullName</th>
            <th>ClassRef Of ListID</th>
            <th>ClassRef Of FullName</th>
            <th>SalesTaxCodeRef Of ListID</th>
            <th>SalesTaxCodeRef Of FullName</th>
            <th>BillableStatus</th>
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
        {% for txnitemlinedetail in page.items %}
            <tr>
                <td>{{ txnitemlinedetail.getTxnlineid() }}</td>
            <td>{{ txnitemlinedetail.getItemrefListid() }}</td>
            <td>{{ txnitemlinedetail.getItemrefFullname() }}</td>
            <td>{{ txnitemlinedetail.getInventorysiterefListid() }}</td>
            <td>{{ txnitemlinedetail.getInventorysiterefFullname() }}</td>
            <td>{{ txnitemlinedetail.getInventorysitelocationrefListid() }}</td>
            <td>{{ txnitemlinedetail.getInventorysitelocationrefFullname() }}</td>
            <td>{{ txnitemlinedetail.getSerialnumber() }}</td>
            <td>{{ txnitemlinedetail.getLotnumber() }}</td>
            <td>{{ txnitemlinedetail.getDescription() }}</td>
            <td>{{ txnitemlinedetail.getQuantity() }}</td>
            <td>{{ txnitemlinedetail.getUnitofmeasure() }}</td>
            <td>{{ txnitemlinedetail.getOverrideuomsetrefListid() }}</td>
            <td>{{ txnitemlinedetail.getOverrideuomsetrefFullname() }}</td>
            <td>{{ txnitemlinedetail.getCost() }}</td>
            <td>{{ txnitemlinedetail.getAmount() }}</td>
            <td>{{ txnitemlinedetail.getCustomerrefListid() }}</td>
            <td>{{ txnitemlinedetail.getCustomerrefFullname() }}</td>
            <td>{{ txnitemlinedetail.getClassrefListid() }}</td>
            <td>{{ txnitemlinedetail.getClassrefFullname() }}</td>
            <td>{{ txnitemlinedetail.getSalestaxcoderefListid() }}</td>
            <td>{{ txnitemlinedetail.getSalestaxcoderefFullname() }}</td>
            <td>{{ txnitemlinedetail.getBillablestatus() }}</td>
            <td>{{ txnitemlinedetail.getLinkedtxnid() }}</td>
            <td>{{ txnitemlinedetail.getLinkedtxnlineid() }}</td>
            <td>{{ txnitemlinedetail.getCustomfield1() }}</td>
            <td>{{ txnitemlinedetail.getCustomfield2() }}</td>
            <td>{{ txnitemlinedetail.getCustomfield3() }}</td>
            <td>{{ txnitemlinedetail.getCustomfield4() }}</td>
            <td>{{ txnitemlinedetail.getCustomfield5() }}</td>
            <td>{{ txnitemlinedetail.getCustomfield6() }}</td>
            <td>{{ txnitemlinedetail.getCustomfield7() }}</td>
            <td>{{ txnitemlinedetail.getCustomfield8() }}</td>
            <td>{{ txnitemlinedetail.getCustomfield9() }}</td>
            <td>{{ txnitemlinedetail.getCustomfield10() }}</td>
            <td>{{ txnitemlinedetail.getCustomfield11() }}</td>
            <td>{{ txnitemlinedetail.getCustomfield12() }}</td>
            <td>{{ txnitemlinedetail.getCustomfield13() }}</td>
            <td>{{ txnitemlinedetail.getCustomfield14() }}</td>
            <td>{{ txnitemlinedetail.getCustomfield15() }}</td>
            <td>{{ txnitemlinedetail.getIdkey() }}</td>
            <td>{{ txnitemlinedetail.getGroupidkey() }}</td>

                <td>{{ link_to("txnitemlinedetail/edit/"~txnitemlinedetail.getTxnlineid(), "Edit") }}</td>
                <td>{{ link_to("txnitemlinedetail/delete/"~txnitemlinedetail.getTxnlineid(), "Delete") }}</td>
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
                <li>{{ link_to("txnitemlinedetail/search", "First") }}</li>
                <li>{{ link_to("txnitemlinedetail/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("txnitemlinedetail/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("txnitemlinedetail/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
