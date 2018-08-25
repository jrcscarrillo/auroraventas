<div class="row">
    <div class="col-sm-2">
        <p></p>
    </div>
    <div class="col-sm-3">
        <nav>
            <ul class="pagination">
                <li>{{ link_to("lotestrxcab/index", "Atras", "class": "btn btn-info") }}</li>
                <li>{{ link_to("lotestrx/search", "Primera") }}</li>
                <li>{{ link_to("lotestrx/search?page="~page.before, "Ant.") }}</li>
                <li>{{ link_to("lotestrx/search?page="~page.next, "Sig.") }}</li>
                <li>{{ link_to("lotestrx/search?page="~page.last, "Fin") }}</li>
                <li>{{ link_to("lotestrxcab/new", "Nueva", "class": "btn btn-info") }}</li>
            </ul>
        </nav>
    </div>
    <div class="col-sm-4">
        <h1>Ordenes de Produccion</h1>
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
                        <th width="5%">Fecha</th>
                        <th>Numero</th>
                        <th>Fecha Ref.</th>
                        <th>Numero Ref.</th>
                        <th>Origen</th>
                        <th>Destino</th>
                        <th>Observaciones</th>
                        <th>Estado</th>

                        <th>Procesar</th>
                        <th>Cerrar</th>
                    </tr>
                </thead>
                <tbody>
                    {% if page.items is defined %}
                        {% for lotestrx in page.items %}
                            <tr>
                                <td>{{ lotestrx.getFechaTrx() }}</td>
                                <td>{{ lotestrx.getNumeroTrx() }}</td>
                                <td>{{ lotestrx.getTxnDate() }}</td>
                                <td>{{ lotestrx.getRefNumber() }}</td>
                                <td>{{ lotestrx.getOrigenDesc() }}</td>
                                <td>{{ lotestrx.getDestinoDesc() }}</td>
                                <td>{{ lotestrx.getMemo() }}</td>
                                <td>{{ lotestrx.getEstado() }}</td>

                                <td width="2%">{{ link_to("lotestrxcab/procesar/"~lotestrx.getTxnLineID(), '<i class="glyphicon glyphicon-cog"></i>', "class": "btn btn-default")  }}</td>
                                <td width="2%">{{ link_to("lotestrxcab/cerrar/"~lotestrx.getTxnLineID(), '<i class="glyphicon glyphicon-lock"></i>', "class": "btn btn-default") }}</td>
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

