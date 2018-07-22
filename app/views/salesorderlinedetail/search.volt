<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("salesorderlinedetail/index", "Go Back") }}</li>
            <li class="next">{{ link_to("salesorderlinedetail/new", "Create ") }}</li>
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
            <th>SerialNumber</th>
            <th>LotNumber</th>
            <th>SalesTaxCodeRef Of ListID</th>
            <th>SalesTaxCodeRef Of FullName</th>
            <th>Invoiced</th>
            <th>IsManuallyClosed</th>
            <th>Other1</th>
            <th>Other2</th>
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
        {% for salesorderlinedetail in page.items %}
            <tr>
                <td>{{ salesorderlinedetail.getTxnlineid() }}</td>
            <td>{{ salesorderlinedetail.getItemrefListid() }}</td>
            <td>{{ salesorderlinedetail.getItemrefFullname() }}</td>
            <td>{{ salesorderlinedetail.getDescription() }}</td>
            <td>{{ salesorderlinedetail.getQuantity() }}</td>
            <td>{{ salesorderlinedetail.getUnitofmeasure() }}</td>
            <td>{{ salesorderlinedetail.getOverrideuomsetrefListid() }}</td>
            <td>{{ salesorderlinedetail.getOverrideuomsetrefFullname() }}</td>
            <td>{{ salesorderlinedetail.getRate() }}</td>
            <td>{{ salesorderlinedetail.getRatepercent() }}</td>
            <td>{{ salesorderlinedetail.getClassrefListid() }}</td>
            <td>{{ salesorderlinedetail.getClassrefFullname() }}</td>
            <td>{{ salesorderlinedetail.getAmount() }}</td>
            <td>{{ salesorderlinedetail.getInventorysiterefListid() }}</td>
            <td>{{ salesorderlinedetail.getInventorysiterefFullname() }}</td>
            <td>{{ salesorderlinedetail.getSerialnumber() }}</td>
            <td>{{ salesorderlinedetail.getLotnumber() }}</td>
            <td>{{ salesorderlinedetail.getSalestaxcoderefListid() }}</td>
            <td>{{ salesorderlinedetail.getSalestaxcoderefFullname() }}</td>
            <td>{{ salesorderlinedetail.getInvoiced() }}</td>
            <td>{{ salesorderlinedetail.getIsmanuallyclosed() }}</td>
            <td>{{ salesorderlinedetail.getOther1() }}</td>
            <td>{{ salesorderlinedetail.getOther2() }}</td>
            <td>{{ salesorderlinedetail.getCustomfield1() }}</td>
            <td>{{ salesorderlinedetail.getCustomfield2() }}</td>
            <td>{{ salesorderlinedetail.getCustomfield3() }}</td>
            <td>{{ salesorderlinedetail.getCustomfield4() }}</td>
            <td>{{ salesorderlinedetail.getCustomfield5() }}</td>
            <td>{{ salesorderlinedetail.getCustomfield6() }}</td>
            <td>{{ salesorderlinedetail.getCustomfield7() }}</td>
            <td>{{ salesorderlinedetail.getCustomfield8() }}</td>
            <td>{{ salesorderlinedetail.getCustomfield9() }}</td>
            <td>{{ salesorderlinedetail.getCustomfield10() }}</td>
            <td>{{ salesorderlinedetail.getCustomfield11() }}</td>
            <td>{{ salesorderlinedetail.getCustomfield12() }}</td>
            <td>{{ salesorderlinedetail.getCustomfield13() }}</td>
            <td>{{ salesorderlinedetail.getCustomfield14() }}</td>
            <td>{{ salesorderlinedetail.getCustomfield15() }}</td>
            <td>{{ salesorderlinedetail.getIdkey() }}</td>
            <td>{{ salesorderlinedetail.getGroupidkey() }}</td>

                <td>{{ link_to("salesorderlinedetail/edit/"~salesorderlinedetail.getTxnlineid(), "Edit") }}</td>
                <td>{{ link_to("salesorderlinedetail/delete/"~salesorderlinedetail.getTxnlineid(), "Delete") }}</td>
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
                <li>{{ link_to("salesorderlinedetail/search", "First") }}</li>
                <li>{{ link_to("salesorderlinedetail/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("salesorderlinedetail/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("salesorderlinedetail/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
