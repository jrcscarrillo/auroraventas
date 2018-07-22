<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("itemsalestax/index", "Go Back") }}</li>
            <li class="next">{{ link_to("itemsalestax/new", "Create ") }}</li>
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
            <th>BarCodeValue</th>
            <th>IsActive</th>
            <th>ClassRef Of ListID</th>
            <th>ClassRef Of FullName</th>
            <th>ItemDesc</th>
            <th>IsUsedOnPurchaseTransaction</th>
            <th>TaxRate</th>
            <th>TaxVendorRef Of ListID</th>
            <th>TaxVendorRef Of FullName</th>
            <th>Status</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for itemsalestax in page.items %}
            <tr>
                <td>{{ itemsalestax.getListid() }}</td>
            <td>{{ itemsalestax.getTimecreated() }}</td>
            <td>{{ itemsalestax.getTimemodified() }}</td>
            <td>{{ itemsalestax.getEditsequence() }}</td>
            <td>{{ itemsalestax.getName() }}</td>
            <td>{{ itemsalestax.getBarcodevalue() }}</td>
            <td>{{ itemsalestax.getIsactive() }}</td>
            <td>{{ itemsalestax.getClassrefListid() }}</td>
            <td>{{ itemsalestax.getClassrefFullname() }}</td>
            <td>{{ itemsalestax.getItemdesc() }}</td>
            <td>{{ itemsalestax.getIsusedonpurchasetransaction() }}</td>
            <td>{{ itemsalestax.getTaxrate() }}</td>
            <td>{{ itemsalestax.getTaxvendorrefListid() }}</td>
            <td>{{ itemsalestax.getTaxvendorrefFullname() }}</td>
            <td>{{ itemsalestax.getStatus() }}</td>

                <td>{{ link_to("itemsalestax/edit/"~itemsalestax.getListid(), "Edit") }}</td>
                <td>{{ link_to("itemsalestax/delete/"~itemsalestax.getListid(), "Delete") }}</td>
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
                <li>{{ link_to("itemsalestax/search", "First") }}</li>
                <li>{{ link_to("itemsalestax/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("itemsalestax/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("itemsalestax/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
