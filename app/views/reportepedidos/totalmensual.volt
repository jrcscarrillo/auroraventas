{{ content() }}


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <table id="total" class="table table-responsive table-bordered table-striped" align="center">
                <thead class="coloreando" style="background-color: black">
                    <tr>
                        <th width="80%">Representante / Año / Mes</th>
                        <th>Valor Ventas + IVA</th>
                    </tr>
                </thead>
                <tbody>
                    {% if result is defined%}
                        {% for lineas in result %}
                            <tr>
                                <td>{{ lineas['REPRESENTANTE'] ~ " año " ~ lineas['ANIO'] ~ " mes " ~ lineas['MES'] }}</td>
                                <td align="right">{{ lineas['VENTAS'] + lineas['IVA'] }}</td>
                            </tr>

                        {% endfor %}
                    {% else %}
                        No se han encontrado valores calculados en los pedidos
                    {% endif %}
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12" id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
</div>

</div>

