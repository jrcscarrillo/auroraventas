<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("pricelevel/index", "Go Back") }}</li>
            <li class="next">{{ link_to("pricelevel/new", "Create ") }}</li>
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
                <th>ListID</th>
            <th>TimeCreated</th>
            <th>TimeModified</th>
            <th>EditSequence</th>
            <th>Name</th>
            <th>IsActive</th>
            <th>PriceLevelType</th>
            <th>PriceLevelFixedPercentage</th>
            <th>CurrencyRef Of ListID</th>
            <th>CurrencyRef Of FullName</th>
            <th>Status</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for pricelevel in page.items %}
            <tr>
                <td>{{ pricelevel.getListid() }}</td>
            <td>{{ pricelevel.getTimecreated() }}</td>
            <td>{{ pricelevel.getTimemodified() }}</td>
            <td>{{ pricelevel.getEditsequence() }}</td>
            <td>{{ pricelevel.getName() }}</td>
            <td>{{ pricelevel.getIsactive() }}</td>
            <td>{{ pricelevel.getPriceleveltype() }}</td>
            <td>{{ pricelevel.getPricelevelfixedpercentage() }}</td>
            <td>{{ pricelevel.getCurrencyrefListid() }}</td>
            <td>{{ pricelevel.getCurrencyrefFullname() }}</td>
            <td>{{ pricelevel.getStatus() }}</td>

                <td>{{ link_to("pricelevel/edit/"~pricelevel.getListid(), "Edit") }}</td>
                <td>{{ link_to("pricelevel/delete/"~pricelevel.getListid(), "Delete") }}</td>
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
                <li>{{ link_to("pricelevel/search", "First") }}</li>
                <li>{{ link_to("pricelevel/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("pricelevel/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("pricelevel/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
