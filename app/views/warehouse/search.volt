<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("warehouse/index", "Go Back") }}</li>
            <li class="next">{{ link_to("warehouse/new", "Create ") }}</li>
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
            <th>Description</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
            <th>TipoId</th>
            <th>NumeroId</th>
            <th>CustomField1</th>
            <th>CustomField2</th>
            <th>CustomField3</th>
            <th>Status</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for warehouse in page.items %}
            <tr>
                <td>{{ warehouse.getListid() }}</td>
            <td>{{ warehouse.getTimecreated() }}</td>
            <td>{{ warehouse.getTimemodified() }}</td>
            <td>{{ warehouse.getEditsequence() }}</td>
            <td>{{ warehouse.getName() }}</td>
            <td>{{ warehouse.getIsactive() }}</td>
            <td>{{ warehouse.getDescription() }}</td>
            <td>{{ warehouse.getAddress() }}</td>
            <td>{{ warehouse.getPhone() }}</td>
            <td>{{ warehouse.getEmail() }}</td>
            <td>{{ warehouse.getTipoid() }}</td>
            <td>{{ warehouse.getNumeroid() }}</td>
            <td>{{ warehouse.getCustomfield1() }}</td>
            <td>{{ warehouse.getCustomfield2() }}</td>
            <td>{{ warehouse.getCustomfield3() }}</td>
            <td>{{ warehouse.getStatus() }}</td>

                <td>{{ link_to("warehouse/edit/"~warehouse.getListid(), "Edit") }}</td>
                <td>{{ link_to("warehouse/delete/"~warehouse.getListid(), "Delete") }}</td>
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
                <li>{{ link_to("warehouse/search", "First") }}</li>
                <li>{{ link_to("warehouse/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("warehouse/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("warehouse/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
