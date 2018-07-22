<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("creditmemolinedetail/index", "Go Back") }}</li>
            <li class="next">{{ link_to("creditmemolinedetail/new", "Create ") }}</li>
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
            <th>ServiceDate</th>
            <th>SalesTaxCodeRef Of ListID</th>
            <th>SalesTaxCodeRef Of FullName</th>
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
        {% for creditmemolinedetail in page.items %}
            <tr>
                <td>{{ creditmemolinedetail.getTxnlineid() }}</td>
            <td>{{ creditmemolinedetail.getItemrefListid() }}</td>
            <td>{{ creditmemolinedetail.getItemrefFullname() }}</td>
            <td>{{ creditmemolinedetail.getDescription() }}</td>
            <td>{{ creditmemolinedetail.getQuantity() }}</td>
            <td>{{ creditmemolinedetail.getUnitofmeasure() }}</td>
            <td>{{ creditmemolinedetail.getOverrideuomsetrefListid() }}</td>
            <td>{{ creditmemolinedetail.getOverrideuomsetrefFullname() }}</td>
            <td>{{ creditmemolinedetail.getRate() }}</td>
            <td>{{ creditmemolinedetail.getRatepercent() }}</td>
            <td>{{ creditmemolinedetail.getClassrefListid() }}</td>
            <td>{{ creditmemolinedetail.getClassrefFullname() }}</td>
            <td>{{ creditmemolinedetail.getAmount() }}</td>
            <td>{{ creditmemolinedetail.getInventorysiterefListid() }}</td>
            <td>{{ creditmemolinedetail.getInventorysiterefFullname() }}</td>
            <td>{{ creditmemolinedetail.getSerialnumber() }}</td>
            <td>{{ creditmemolinedetail.getLotnumber() }}</td>
            <td>{{ creditmemolinedetail.getServicedate() }}</td>
            <td>{{ creditmemolinedetail.getSalestaxcoderefListid() }}</td>
            <td>{{ creditmemolinedetail.getSalestaxcoderefFullname() }}</td>
            <td>{{ creditmemolinedetail.getOther1() }}</td>
            <td>{{ creditmemolinedetail.getOther2() }}</td>
            <td>{{ creditmemolinedetail.getCustomfield1() }}</td>
            <td>{{ creditmemolinedetail.getCustomfield2() }}</td>
            <td>{{ creditmemolinedetail.getCustomfield3() }}</td>
            <td>{{ creditmemolinedetail.getCustomfield4() }}</td>
            <td>{{ creditmemolinedetail.getCustomfield5() }}</td>
            <td>{{ creditmemolinedetail.getCustomfield6() }}</td>
            <td>{{ creditmemolinedetail.getCustomfield7() }}</td>
            <td>{{ creditmemolinedetail.getCustomfield8() }}</td>
            <td>{{ creditmemolinedetail.getCustomfield9() }}</td>
            <td>{{ creditmemolinedetail.getCustomfield10() }}</td>
            <td>{{ creditmemolinedetail.getCustomfield11() }}</td>
            <td>{{ creditmemolinedetail.getCustomfield12() }}</td>
            <td>{{ creditmemolinedetail.getCustomfield13() }}</td>
            <td>{{ creditmemolinedetail.getCustomfield14() }}</td>
            <td>{{ creditmemolinedetail.getCustomfield15() }}</td>
            <td>{{ creditmemolinedetail.getIdkey() }}</td>
            <td>{{ creditmemolinedetail.getGroupidkey() }}</td>

                <td>{{ link_to("creditmemolinedetail/edit/"~creditmemolinedetail.getTxnlineid(), "Edit") }}</td>
                <td>{{ link_to("creditmemolinedetail/delete/"~creditmemolinedetail.getTxnlineid(), "Delete") }}</td>
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
                <li>{{ link_to("creditmemolinedetail/search", "First") }}</li>
                <li>{{ link_to("creditmemolinedetail/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("creditmemolinedetail/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("creditmemolinedetail/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
