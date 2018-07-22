<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("vendor/index", "Go Back") }}</li>
            <li class="next">{{ link_to("vendor/new", "Create ") }}</li>
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
            <th>ClassRef Of ListID</th>
            <th>ClassRef Of FullName</th>
            <th>CompanyName</th>
            <th>Salutation</th>
            <th>FirstName</th>
            <th>MiddleName</th>
            <th>LastName</th>
            <th>JobTitle</th>
            <th>Suffix</th>
            <th>VendorAddress Of Addr1</th>
            <th>VendorAddress Of Addr2</th>
            <th>VendorAddress Of Addr3</th>
            <th>VendorAddress Of Addr4</th>
            <th>VendorAddress Of Addr5</th>
            <th>VendorAddress Of City</th>
            <th>VendorAddress Of State</th>
            <th>VendorAddress Of PostalCode</th>
            <th>VendorAddress Of Country</th>
            <th>VendorAddress Of Note</th>
            <th>ShipAddress Of Addr1</th>
            <th>ShipAddress Of Addr2</th>
            <th>ShipAddress Of Addr3</th>
            <th>ShipAddress Of Addr4</th>
            <th>ShipAddress Of Addr5</th>
            <th>ShipAddress Of City</th>
            <th>ShipAddress Of State</th>
            <th>ShipAddress Of PostalCode</th>
            <th>ShipAddress Of Country</th>
            <th>ShipAddress Of Note</th>
            <th>Phone</th>
            <th>Mobile</th>
            <th>Pager</th>
            <th>AltPhone</th>
            <th>Fax</th>
            <th>Email</th>
            <th>Cc</th>
            <th>Contact</th>
            <th>AltContact</th>
            <th>NameOnCheck</th>
            <th>Notes</th>
            <th>AccountNumber</th>
            <th>VendorTypeRef Of ListID</th>
            <th>VendorTypeRef Of FullName</th>
            <th>TermsRef Of ListID</th>
            <th>TermsRef Of FullName</th>
            <th>CreditLimit</th>
            <th>VendorTaxIdent</th>
            <th>IsVendorEligibleFor1099</th>
            <th>Balance</th>
            <th>CurrencyRef Of ListID</th>
            <th>CurrencyRef Of FullName</th>
            <th>BillingRateRef Of ListID</th>
            <th>BillingRateRef Of FullName</th>
            <th>SalesTaxCodeRef Of ListID</th>
            <th>SalesTaxCodeRef Of FullName</th>
            <th>SalesTaxCountry</th>
            <th>IsSalesTaxAgency</th>
            <th>SalesTaxReturnRef Of ListID</th>
            <th>SalesTaxReturnRef Of FullName</th>
            <th>TaxRegistrationNumber</th>
            <th>ReportingPeriod</th>
            <th>IsTaxTrackedOnPurchases</th>
            <th>TaxOnPurchasesAccountRef Of ListID</th>
            <th>TaxOnPurchasesAccountRef Of FullName</th>
            <th>IsTaxTrackedOnSales</th>
            <th>TaxOnSalesAccountRef Of ListID</th>
            <th>TaxOnSalesAccountRef Of FullName</th>
            <th>IsTaxOnTax</th>
            <th>PrefillAccountRef Of ListID</th>
            <th>PrefillAccountRef Of FullName</th>
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
            <th>Status</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for vendor in page.items %}
            <tr>
                <td>{{ vendor.ListID }}</td>
            <td>{{ vendor.TimeCreated }}</td>
            <td>{{ vendor.TimeModified }}</td>
            <td>{{ vendor.EditSequence }}</td>
            <td>{{ vendor.Name }}</td>
            <td>{{ vendor.IsActive }}</td>
            <td>{{ vendor.ClassRef_ListID }}</td>
            <td>{{ vendor.ClassRef_FullName }}</td>
            <td>{{ vendor.CompanyName }}</td>
            <td>{{ vendor.Salutation }}</td>
            <td>{{ vendor.FirstName }}</td>
            <td>{{ vendor.MiddleName }}</td>
            <td>{{ vendor.LastName }}</td>
            <td>{{ vendor.JobTitle }}</td>
            <td>{{ vendor.Suffix }}</td>
            <td>{{ vendor.VendorAddress_Addr1 }}</td>
            <td>{{ vendor.VendorAddress_Addr2 }}</td>
            <td>{{ vendor.VendorAddress_Addr3 }}</td>
            <td>{{ vendor.VendorAddress_Addr4 }}</td>
            <td>{{ vendor.VendorAddress_Addr5 }}</td>
            <td>{{ vendor.VendorAddress_City }}</td>
            <td>{{ vendor.VendorAddress_State }}</td>
            <td>{{ vendor.VendorAddress_PostalCode }}</td>
            <td>{{ vendor.VendorAddress_Country }}</td>
            <td>{{ vendor.VendorAddress_Note }}</td>
            <td>{{ vendor.ShipAddress_Addr1 }}</td>
            <td>{{ vendor.ShipAddress_Addr2 }}</td>
            <td>{{ vendor.ShipAddress_Addr3 }}</td>
            <td>{{ vendor.ShipAddress_Addr4 }}</td>
            <td>{{ vendor.ShipAddress_Addr5 }}</td>
            <td>{{ vendor.ShipAddress_City }}</td>
            <td>{{ vendor.ShipAddress_State }}</td>
            <td>{{ vendor.ShipAddress_PostalCode }}</td>
            <td>{{ vendor.ShipAddress_Country }}</td>
            <td>{{ vendor.ShipAddress_Note }}</td>
            <td>{{ vendor.Phone }}</td>
            <td>{{ vendor.Mobile }}</td>
            <td>{{ vendor.Pager }}</td>
            <td>{{ vendor.AltPhone }}</td>
            <td>{{ vendor.Fax }}</td>
            <td>{{ vendor.Email }}</td>
            <td>{{ vendor.Cc }}</td>
            <td>{{ vendor.Contact }}</td>
            <td>{{ vendor.AltContact }}</td>
            <td>{{ vendor.NameOnCheck }}</td>
            <td>{{ vendor.Notes }}</td>
            <td>{{ vendor.AccountNumber }}</td>
            <td>{{ vendor.VendorTypeRef_ListID }}</td>
            <td>{{ vendor.VendorTypeRef_FullName }}</td>
            <td>{{ vendor.TermsRef_ListID }}</td>
            <td>{{ vendor.TermsRef_FullName }}</td>
            <td>{{ vendor.CreditLimit }}</td>
            <td>{{ vendor.VendorTaxIdent }}</td>
            <td>{{ vendor.IsVendorEligibleFor1099 }}</td>
            <td>{{ vendor.Balance }}</td>
            <td>{{ vendor.CurrencyRef_ListID }}</td>
            <td>{{ vendor.CurrencyRef_FullName }}</td>
            <td>{{ vendor.BillingRateRef_ListID }}</td>
            <td>{{ vendor.BillingRateRef_FullName }}</td>
            <td>{{ vendor.SalesTaxCodeRef_ListID }}</td>
            <td>{{ vendor.SalesTaxCodeRef_FullName }}</td>
            <td>{{ vendor.SalesTaxCountry }}</td>
            <td>{{ vendor.IsSalesTaxAgency }}</td>
            <td>{{ vendor.SalesTaxReturnRef_ListID }}</td>
            <td>{{ vendor.SalesTaxReturnRef_FullName }}</td>
            <td>{{ vendor.TaxRegistrationNumber }}</td>
            <td>{{ vendor.ReportingPeriod }}</td>
            <td>{{ vendor.IsTaxTrackedOnPurchases }}</td>
            <td>{{ vendor.TaxOnPurchasesAccountRef_ListID }}</td>
            <td>{{ vendor.TaxOnPurchasesAccountRef_FullName }}</td>
            <td>{{ vendor.IsTaxTrackedOnSales }}</td>
            <td>{{ vendor.TaxOnSalesAccountRef_ListID }}</td>
            <td>{{ vendor.TaxOnSalesAccountRef_FullName }}</td>
            <td>{{ vendor.IsTaxOnTax }}</td>
            <td>{{ vendor.PrefillAccountRef_ListID }}</td>
            <td>{{ vendor.PrefillAccountRef_FullName }}</td>
            <td>{{ vendor.CustomField1 }}</td>
            <td>{{ vendor.CustomField2 }}</td>
            <td>{{ vendor.CustomField3 }}</td>
            <td>{{ vendor.CustomField4 }}</td>
            <td>{{ vendor.CustomField5 }}</td>
            <td>{{ vendor.CustomField6 }}</td>
            <td>{{ vendor.CustomField7 }}</td>
            <td>{{ vendor.CustomField8 }}</td>
            <td>{{ vendor.CustomField9 }}</td>
            <td>{{ vendor.CustomField10 }}</td>
            <td>{{ vendor.CustomField11 }}</td>
            <td>{{ vendor.CustomField12 }}</td>
            <td>{{ vendor.CustomField13 }}</td>
            <td>{{ vendor.CustomField14 }}</td>
            <td>{{ vendor.CustomField15 }}</td>
            <td>{{ vendor.Status }}</td>

                <td>{{ link_to("vendor/edit/"~vendor.ListID, "Edit") }}</td>
                <td>{{ link_to("vendor/delete/"~vendor.ListID, "Delete") }}</td>
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
                <li>{{ link_to("vendor/search", "First") }}</li>
                <li>{{ link_to("vendor/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("vendor/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("vendor/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
