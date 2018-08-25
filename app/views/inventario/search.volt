<div class="row">
    <div class="col-sm-1">
        <p></p>
    </div>
    <div class="col-sm-4">
        <nav>
            <ul class="pagination">
                <li>{{ link_to("inventario/index", "Atras", "class": "btn btn-info") }}</li>
                <li>{{ link_to("inventario/search", "Primera") }}</li>
                <li>{{ link_to("inventario/search?page="~page.before, "Ant.") }}</li>
                <li>{{ link_to("inventario/search?page="~page.next, "Sig.") }}</li>
                <li>{{ link_to("inventario/search?page="~page.last, "Fin") }}</li>
                <li>{{ link_to("inventario/new", "Nueva", "class": "btn btn-info") }}</li>
            </ul>
        </nav>
    </div>
    <div class="col-sm-4">
        <h1>Inventario Inicial</h1>
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
                        <th>Producto</th>
                        <th>Cantidad</th>

                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    {% if page.items is defined %}
                        {% for inventario in page.items %}
                            <tr>
                                <td>{{ inventario.getTxnDate() }}</td>
                                <td>{{ inventario.getRefNumber() }}</td>
                                <td>{{ inventario.getTipoTrx() }}</td>
                                <td>{{ inventario.getOrigenDesc() }}</td>
                                <td>{{ inventario.getDestinoDesc() }}</td>
                                <td>{{ inventario.getHeladoDesc() }}</td>
                                <td align="right">{{ inventario.getQtyTrx() | number_format(0, '', '.') }}</td>

                                <td width="2%">{{ link_to("inventario/delete/"~inventario.getTxnLineID(), '<i class="glyphicon glyphicon-remove"></i>', "class": "btn btn-default")  }}</td>
                            </tr>
                        {% endfor %}
                    {% else %}
                        No se han encontrado inventario inicial(es) con esos parametros
                    {% endif %}
                </tbody>
            </table>
        </div>
    </div>
</div>

