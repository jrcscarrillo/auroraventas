<div class="row">
    <div class="col-sm-1">
        <p></p>
    </div>
    <div class="col-sm-4">
        <nav>
            <ul class="pagination">
                <li>{{ link_to("lotestrxcab/index", "Atras", "class": "btn btn-info") }}</li>
                <li>{{ link_to("lotestrxcab/search", "Primera") }}</li>
                <li>{{ link_to("lotestrxcab/search?page="~page.before, "Ant.") }}</li>
                <li>{{ link_to("lotestrxcab/search?page="~page.next, "Sig.") }}</li>
                <li>{{ link_to("lotestrxcab/search?page="~page.last, "Fin") }}</li>
                <li>{{ link_to("lotestrxcab/new", "Nueva", "class": "btn btn-info") }}</li>
            </ul>
        </nav>
    </div>
    <div class="col-sm-4">
        <h1>Transferencias</h1>
    </div>    
    <div class="col-sm-3">
        <nav>
            <ul class="pagination pagination-lg">
                <li class="btn-success">{{ "Pag.  "~page.current ~"  de  " }}</li>
                <li class="btn-warning">{{ page.total_pages ~ "  Pags." }}</li>
            </ul>
        </nav>
    </div>
</div>

{{ content() }}

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-responsive table-bordered table-striped" align="center">
                <thead class="coloreando" style="background-color: brown">
                    <tr>
                        <th width="10%">Fecha</th>
                        <th width="10%">Numero</th>
                        <th>Tipo</th>
                        <th>Origen</th>
                        <th>Destino</th>
                        <th>Estado</th>

                        <th>Eliminar</th>
                        <th>Imprimir</th>
                    </tr>
                </thead>
                <tbody>
                    {% if page.items is defined %}
                        {% for lotestrxcab in page.items %}
                            <tr>
                                <td>{{ lotestrxcab.getTxnDate() }}</td>
                                <td>{{ lotestrxcab.getRefNumber() }}</td>
                                <td>{{ lotestrxcab.getRefType() }}</td>
                                <td>{{ lotestrxcab.getOrigenDesc() }}</td>
                                <td>{{ lotestrxcab.getDestinoDesc() }}</td>
                                <td>{{ lotestrxcab.getEstado() }}</td>

                                <td width="2%">{{ link_to("lotestrxcab/delete/"~lotestrxcab.getTxnID(), '<i class="glyphicon glyphicon-remove"></i>', "class": "btn btn-default")  }}</td>
                                <td width="2%">{{ link_to("lotestrxcab/imprimir/"~lotestrxcab.getTxnID(), '<i class="glyphicon glyphicon-print"></i>', "class": "btn btn-default") }}</td>
                            </tr>
                        {% endfor %}
                    {% else %}
                        No se han encontrado transferencia(s) con esos parametros
                    {% endif %}
                </tbody>
            </table>
        </div>
    </div>
</div>

