<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("pricelevelperitemdetail/index", "Go Back") }}</li>
            <li class="next">{{ link_to("pricelevelperitemdetail/new", "Create ") }}</li>
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
                <th>ItemRef Of ListID</th>
            <th>ItemRef Of FullName</th>
            <th>CustomPrice</th>
            <th>CustomPricePercent</th>
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

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for pricelevelperitemdetail in page.items %}
            <tr>
                <td>{{ pricelevelperitemdetail.getItemrefListid() }}</td>
            <td>{{ pricelevelperitemdetail.getItemrefFullname() }}</td>
            <td>{{ pricelevelperitemdetail.getCustomprice() }}</td>
            <td>{{ pricelevelperitemdetail.getCustompricepercent() }}</td>
            <td>{{ pricelevelperitemdetail.getCustomfield1() }}</td>
            <td>{{ pricelevelperitemdetail.getCustomfield2() }}</td>
            <td>{{ pricelevelperitemdetail.getCustomfield3() }}</td>
            <td>{{ pricelevelperitemdetail.getCustomfield4() }}</td>
            <td>{{ pricelevelperitemdetail.getCustomfield5() }}</td>
            <td>{{ pricelevelperitemdetail.getCustomfield6() }}</td>
            <td>{{ pricelevelperitemdetail.getCustomfield7() }}</td>
            <td>{{ pricelevelperitemdetail.getCustomfield8() }}</td>
            <td>{{ pricelevelperitemdetail.getCustomfield9() }}</td>
            <td>{{ pricelevelperitemdetail.getCustomfield10() }}</td>
            <td>{{ pricelevelperitemdetail.getCustomfield11() }}</td>
            <td>{{ pricelevelperitemdetail.getCustomfield12() }}</td>
            <td>{{ pricelevelperitemdetail.getCustomfield13() }}</td>
            <td>{{ pricelevelperitemdetail.getCustomfield14() }}</td>
            <td>{{ pricelevelperitemdetail.getCustomfield15() }}</td>
            <td>{{ pricelevelperitemdetail.getIdkey() }}</td>

                <td>{{ link_to("pricelevelperitemdetail/edit/"~pricelevelperitemdetail.getItemrefListid(), "Edit") }}</td>
                <td>{{ link_to("pricelevelperitemdetail/delete/"~pricelevelperitemdetail.getItemrefListid(), "Delete") }}</td>
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
                <li>{{ link_to("pricelevelperitemdetail/search", "First") }}</li>
                <li>{{ link_to("pricelevelperitemdetail/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("pricelevelperitemdetail/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("pricelevelperitemdetail/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
