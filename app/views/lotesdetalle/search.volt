<div class="row">
    <div class="col-sm-2">
        <p></p>
    </div>
    <div class="col-sm-3">
        <nav>
            <ul class="pagination">
                <li>{{ link_to("lotesdetalle/index", "Atras", "class": "btn btn-info") }}</li>
                <li>{{ link_to("lotesdetalle/search", "Primera") }}</li>
                <li>{{ link_to("lotesdetalle/search?page="~page.before, "Ant.") }}</li>
                <li>{{ link_to("lotesdetalle/search?page="~page.next, "Sig.") }}</li>
                <li>{{ link_to("lotesdetalle/search?page="~page.last, "Fin") }}</li>
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
                        <th width="5%">TxnDate</th>
                        <th>TxnNumber</th>
                        <th>RefNumber</th>
                        <th>Producto</th>
                        <th>Memo</th>
                        <th>Producida</th>
                        <th>QtyBuena</th>
                        <th>Mala</th>
                        <th>Reproceso</th>
                        <th>Muestra</th>
                        <th>Lab</th>
                        <th>Estado</th>

                        <th>Procesar</th>
                        <th>Cerrar</th>
                    </tr>
                </thead>
                <tbody>
                    {% if page.items is defined %}
                        {% for lotesdetalle in page.items %}
                            <tr>
                                <td>{{ lotesdetalle.getTxnDate() }}</td>
                                <td>{{ lotesdetalle.getTxnNumber() }}</td>
                                <td>{{ lotesdetalle.getRefNumber() }}</td>
                                <td>{{ lotesdetalle.getItemRefFullName() }}</td>
                                <td>{{ lotesdetalle.getMemo() }}</td>
                                <td>{{ lotesdetalle.getQtyProducida() }}</td>
                                <td>{{ lotesdetalle.getQtyBuena() }}</td>
                                <td>{{ lotesdetalle.getQtyMala() }}</td>
                                <td>{{ lotesdetalle.getQtyReproceso() }}</td>
                                <td>{{ lotesdetalle.getQtyMuestra() }}</td>
                                <td>{{ lotesdetalle.getQtyLab() }}</td>
                                <td>{{ lotesdetalle.getEstado() }}</td>

                                <td width="2%">{{ link_to("lotesdetalle/procesar/"~lotesdetalle.getTxnid(), '<i class="glyphicon glyphicon-cog"></i>', "class": "btn btn-default")  }}</td>
                                <td width="2%">{{ link_to("lotesdetalle/cerrar/"~lotesdetalle.getTxnid(), '<i class="glyphicon glyphicon-lock"></i>', "class": "btn btn-default") }}</td>
                            </tr>
                        {% endfor %}
                    {% else %}
                        No se han encontrado al lote o lotes con esos parametros
                    {% endif %}
                </tbody>
            </table>
        </div>
    </div>
</div>

