<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("facturas/index", "Go Back") }}</li>
            <li class="next">{{ link_to("facturas/new", "Create ") }}</li>
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
                <th>TxnID</th>
            <th>Ambiente</th>
            <th>TipoEmision</th>
            <th>Razon</th>
            <th>Comercial</th>
            <th>Ruc</th>
            <th>ClaveAcceso</th>
            <th>Estab</th>
            <th>CodDoc</th>
            <th>Punto</th>
            <th>Sq</th>
            <th>DirMatriz</th>
            <th>FechaEmision</th>
            <th>DirEstab</th>
            <th>ContEsp</th>
            <th>LlevaContab</th>
            <th>TipoId</th>
            <th>NroId</th>
            <th>Guia</th>
            <th>RazonComprador</th>
            <th>TotalImpto</th>
            <th>Propina</th>
            <th>ImporteTotal</th>
            <th>Moneda</th>
            <th>FechaAutoriza</th>
            <th>NumeroAutoriza</th>
            <th>CodMsg</th>
            <th>Mensaje</th>
            <th>MsgAdicional</th>
            <th>TipoError</th>
            <th>IdComprobantes</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for factura in page.items %}
            <tr>
                <td>{{ factura.TxnID }}</td>
            <td>{{ factura.Ambiente }}</td>
            <td>{{ factura.TipoEmision }}</td>
            <td>{{ factura.Razon }}</td>
            <td>{{ factura.Comercial }}</td>
            <td>{{ factura.Ruc }}</td>
            <td>{{ factura.ClaveAcceso }}</td>
            <td>{{ factura.Estab }}</td>
            <td>{{ factura.CodDoc }}</td>
            <td>{{ factura.Punto }}</td>
            <td>{{ factura.Sq }}</td>
            <td>{{ factura.DirMatriz }}</td>
            <td>{{ factura.FechaEmision }}</td>
            <td>{{ factura.DirEstab }}</td>
            <td>{{ factura.ContEsp }}</td>
            <td>{{ factura.LlevaContab }}</td>
            <td>{{ factura.TipoId }}</td>
            <td>{{ factura.NroId }}</td>
            <td>{{ factura.Guia }}</td>
            <td>{{ factura.RazonComprador }}</td>
            <td>{{ factura.TotalImpto }}</td>
            <td>{{ factura.Propina }}</td>
            <td>{{ factura.ImporteTotal }}</td>
            <td>{{ factura.Moneda }}</td>
            <td>{{ factura.FechaAutoriza }}</td>
            <td>{{ factura.NumeroAutoriza }}</td>
            <td>{{ factura.CodMsg }}</td>
            <td>{{ factura.Mensaje }}</td>
            <td>{{ factura.MsgAdicional }}</td>
            <td>{{ factura.TipoError }}</td>
            <td>{{ factura.idComprobantes }}</td>

                <td>{{ link_to("facturas/edit/"~factura.TxnID, "Edit") }}</td>
                <td>{{ link_to("facturas/delete/"~factura.TxnID, "Delete") }}</td>
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
                <li>{{ link_to("facturas/search", "First") }}</li>
                <li>{{ link_to("facturas/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("facturas/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("facturas/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
