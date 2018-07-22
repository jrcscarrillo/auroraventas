<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("employee/index", "Go Back") }}</li>
            <li class="next">{{ link_to("employee/new", "Create ") }}</li>
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
            <th>Salutation</th>
            <th>FirstName</th>
            <th>MiddleName</th>
            <th>LastName</th>
            <th>Suffix</th>
            <th>JobTitle</th>
            <th>SupervisorRef Of ListID</th>
            <th>SupervisorRef Of FullName</th>
            <th>Department</th>
            <th>Description</th>
            <th>TargetBonus</th>
            <th>EmployeeAddress Of Addr1</th>
            <th>EmployeeAddress Of Addr2</th>
            <th>EmployeeAddress Of Addr3</th>
            <th>EmployeeAddress Of Addr4</th>
            <th>EmployeeAddress Of City</th>
            <th>EmployeeAddress Of State</th>
            <th>EmployeeAddress Of PostalCode</th>
            <th>EmployeeAddress Of Country</th>
            <th>PrintAs</th>
            <th>Phone</th>
            <th>Mobile</th>
            <th>Pager</th>
            <th>PagerPIN</th>
            <th>AltPhone</th>
            <th>Fax</th>
            <th>SSN</th>
            <th>Email</th>
            <th>EmergencyContactPrimaryName</th>
            <th>EmergencyContactPrimaryValue</th>
            <th>EmergencyContactPrimaryRelation</th>
            <th>EmergencyContactSecondaryName</th>
            <th>EmergencyContactSecondaryValue</th>
            <th>EmergencyContactSecondaryRelation</th>
            <th>EmployeeType</th>
            <th>Gender</th>
            <th>PartOrFullTime</th>
            <th>Exempt</th>
            <th>KeyEmployee</th>
            <th>HiredDate</th>
            <th>OriginalHireDate</th>
            <th>AdjustedServiceDate</th>
            <th>ReleasedDate</th>
            <th>BirthDate</th>
            <th>USCitizen</th>
            <th>Ethnicity</th>
            <th>Disabled</th>
            <th>DisabilityDesc</th>
            <th>OnFile</th>
            <th>WorkAuthExpireDate</th>
            <th>USVeteran</th>
            <th>MilitaryStatus</th>
            <th>AccountNumber</th>
            <th>Notes</th>
            <th>BillingRateRef Of ListID</th>
            <th>BillingRateRef Of FullName</th>
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
        {% for employee in page.items %}
            <tr>
                <td>{{ employee.ListID }}</td>
            <td>{{ employee.TimeCreated }}</td>
            <td>{{ employee.TimeModified }}</td>
            <td>{{ employee.EditSequence }}</td>
            <td>{{ employee.Name }}</td>
            <td>{{ employee.IsActive }}</td>
            <td>{{ employee.Salutation }}</td>
            <td>{{ employee.FirstName }}</td>
            <td>{{ employee.MiddleName }}</td>
            <td>{{ employee.LastName }}</td>
            <td>{{ employee.Suffix }}</td>
            <td>{{ employee.JobTitle }}</td>
            <td>{{ employee.SupervisorRef_ListID }}</td>
            <td>{{ employee.SupervisorRef_FullName }}</td>
            <td>{{ employee.Department }}</td>
            <td>{{ employee.Description }}</td>
            <td>{{ employee.TargetBonus }}</td>
            <td>{{ employee.EmployeeAddress_Addr1 }}</td>
            <td>{{ employee.EmployeeAddress_Addr2 }}</td>
            <td>{{ employee.EmployeeAddress_Addr3 }}</td>
            <td>{{ employee.EmployeeAddress_Addr4 }}</td>
            <td>{{ employee.EmployeeAddress_City }}</td>
            <td>{{ employee.EmployeeAddress_State }}</td>
            <td>{{ employee.EmployeeAddress_PostalCode }}</td>
            <td>{{ employee.EmployeeAddress_Country }}</td>
            <td>{{ employee.PrintAs }}</td>
            <td>{{ employee.Phone }}</td>
            <td>{{ employee.Mobile }}</td>
            <td>{{ employee.Pager }}</td>
            <td>{{ employee.PagerPIN }}</td>
            <td>{{ employee.AltPhone }}</td>
            <td>{{ employee.Fax }}</td>
            <td>{{ employee.SSN }}</td>
            <td>{{ employee.Email }}</td>
            <td>{{ employee.EmergencyContactPrimaryName }}</td>
            <td>{{ employee.EmergencyContactPrimaryValue }}</td>
            <td>{{ employee.EmergencyContactPrimaryRelation }}</td>
            <td>{{ employee.EmergencyContactSecondaryName }}</td>
            <td>{{ employee.EmergencyContactSecondaryValue }}</td>
            <td>{{ employee.EmergencyContactSecondaryRelation }}</td>
            <td>{{ employee.EmployeeType }}</td>
            <td>{{ employee.Gender }}</td>
            <td>{{ employee.PartOrFullTime }}</td>
            <td>{{ employee.Exempt }}</td>
            <td>{{ employee.KeyEmployee }}</td>
            <td>{{ employee.HiredDate }}</td>
            <td>{{ employee.OriginalHireDate }}</td>
            <td>{{ employee.AdjustedServiceDate }}</td>
            <td>{{ employee.ReleasedDate }}</td>
            <td>{{ employee.BirthDate }}</td>
            <td>{{ employee.USCitizen }}</td>
            <td>{{ employee.Ethnicity }}</td>
            <td>{{ employee.Disabled }}</td>
            <td>{{ employee.DisabilityDesc }}</td>
            <td>{{ employee.OnFile }}</td>
            <td>{{ employee.WorkAuthExpireDate }}</td>
            <td>{{ employee.USVeteran }}</td>
            <td>{{ employee.MilitaryStatus }}</td>
            <td>{{ employee.AccountNumber }}</td>
            <td>{{ employee.Notes }}</td>
            <td>{{ employee.BillingRateRef_ListID }}</td>
            <td>{{ employee.BillingRateRef_FullName }}</td>
            <td>{{ employee.CustomField1 }}</td>
            <td>{{ employee.CustomField2 }}</td>
            <td>{{ employee.CustomField3 }}</td>
            <td>{{ employee.CustomField4 }}</td>
            <td>{{ employee.CustomField5 }}</td>
            <td>{{ employee.CustomField6 }}</td>
            <td>{{ employee.CustomField7 }}</td>
            <td>{{ employee.CustomField8 }}</td>
            <td>{{ employee.CustomField9 }}</td>
            <td>{{ employee.CustomField10 }}</td>
            <td>{{ employee.CustomField11 }}</td>
            <td>{{ employee.CustomField12 }}</td>
            <td>{{ employee.CustomField13 }}</td>
            <td>{{ employee.CustomField14 }}</td>
            <td>{{ employee.CustomField15 }}</td>
            <td>{{ employee.Status }}</td>

                <td>{{ link_to("employee/edit/"~employee.ListID, "Edit") }}</td>
                <td>{{ link_to("employee/delete/"~employee.ListID, "Delete") }}</td>
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
                <li>{{ link_to("employee/search", "First") }}</li>
                <li>{{ link_to("employee/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("employee/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("employee/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
