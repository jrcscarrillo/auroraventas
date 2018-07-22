<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("usuarios/index", "Go Back") }}</li>
            <li class="next">{{ link_to("usuarios/new", "Create ") }}</li>
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
            <th>UserName</th>
            <th>FullName</th>
            <th>IsActive</th>
            <th>ClassRef Of ListID</th>
            <th>ClassRef Of FullName</th>
            <th>ParentRef Of ListID</th>
            <th>ParentRef Of FullName</th>
            <th>Sublevel</th>
            <th>CompanyName</th>
            <th>Salutation</th>
            <th>FirstName</th>
            <th>MiddleName</th>
            <th>LastName</th>
            <th>Password</th>
            <th>BillAddress Of Addr1</th>
            <th>BillAddress Of Addr2</th>
            <th>BillAddress Of Addr3</th>
            <th>BillAddress Of Addr4</th>
            <th>BillAddress Of Addr5</th>
            <th>BillAddress Of City</th>
            <th>BillAddress Of State</th>
            <th>BillAddress Of PostalCode</th>
            <th>BillAddress Of Country</th>
            <th>BillAddress Of Note</th>
            <th>PrintAs</th>
            <th>Phone</th>
            <th>Mobile</th>
            <th>Pager</th>
            <th>AltPhone</th>
            <th>Fax</th>
            <th>Email</th>
            <th>Cc</th>
            <th>Contact</th>
            <th>AltContact</th>
            <th>CustomerTypeRef Of ListID</th>
            <th>CustomerTypeRef Of FullName</th>
            <th>TermsRef Of ListID</th>
            <th>TermsRef Of FullName</th>
            <th>SalesRepRef Of ListID</th>
            <th>SalesRepRef Of FullName</th>
            <th>Balance</th>
            <th>TotalBalance</th>
            <th>CreditLimit</th>
            <th>TipoID</th>
            <th>NumeroID</th>
            <th>Notes</th>
            <th>Status</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for usuario in page.items %}
            <tr>
                <td>{{ usuario.ListID }}</td>
            <td>{{ usuario.TimeCreated }}</td>
            <td>{{ usuario.TimeModified }}</td>
            <td>{{ usuario.EditSequence }}</td>
            <td>{{ usuario.UserName }}</td>
            <td>{{ usuario.FullName }}</td>
            <td>{{ usuario.IsActive }}</td>
            <td>{{ usuario.ClassRef_ListID }}</td>
            <td>{{ usuario.ClassRef_FullName }}</td>
            <td>{{ usuario.ParentRef_ListID }}</td>
            <td>{{ usuario.ParentRef_FullName }}</td>
            <td>{{ usuario.Sublevel }}</td>
            <td>{{ usuario.CompanyName }}</td>
            <td>{{ usuario.Salutation }}</td>
            <td>{{ usuario.FirstName }}</td>
            <td>{{ usuario.MiddleName }}</td>
            <td>{{ usuario.LastName }}</td>
            <td>{{ usuario.Password }}</td>
            <td>{{ usuario.BillAddress_Addr1 }}</td>
            <td>{{ usuario.BillAddress_Addr2 }}</td>
            <td>{{ usuario.BillAddress_Addr3 }}</td>
            <td>{{ usuario.BillAddress_Addr4 }}</td>
            <td>{{ usuario.BillAddress_Addr5 }}</td>
            <td>{{ usuario.BillAddress_City }}</td>
            <td>{{ usuario.BillAddress_State }}</td>
            <td>{{ usuario.BillAddress_PostalCode }}</td>
            <td>{{ usuario.BillAddress_Country }}</td>
            <td>{{ usuario.BillAddress_Note }}</td>
            <td>{{ usuario.PrintAs }}</td>
            <td>{{ usuario.Phone }}</td>
            <td>{{ usuario.Mobile }}</td>
            <td>{{ usuario.Pager }}</td>
            <td>{{ usuario.AltPhone }}</td>
            <td>{{ usuario.Fax }}</td>
            <td>{{ usuario.Email }}</td>
            <td>{{ usuario.Cc }}</td>
            <td>{{ usuario.Contact }}</td>
            <td>{{ usuario.AltContact }}</td>
            <td>{{ usuario.CustomerTypeRef_ListID }}</td>
            <td>{{ usuario.CustomerTypeRef_FullName }}</td>
            <td>{{ usuario.TermsRef_ListID }}</td>
            <td>{{ usuario.TermsRef_FullName }}</td>
            <td>{{ usuario.SalesRepRef_ListID }}</td>
            <td>{{ usuario.SalesRepRef_FullName }}</td>
            <td>{{ usuario.Balance }}</td>
            <td>{{ usuario.TotalBalance }}</td>
            <td>{{ usuario.CreditLimit }}</td>
            <td>{{ usuario.TipoID }}</td>
            <td>{{ usuario.NumeroID }}</td>
            <td>{{ usuario.Notes }}</td>
            <td>{{ usuario.Status }}</td>

                <td>{{ link_to("usuarios/edit/"~usuario.ListID, "Edit") }}</td>
                <td>{{ link_to("usuarios/delete/"~usuario.ListID, "Delete") }}</td>
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
                <li>{{ link_to("usuarios/search", "First") }}</li>
                <li>{{ link_to("usuarios/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("usuarios/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("usuarios/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
