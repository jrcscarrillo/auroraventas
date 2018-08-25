{% extends "layouts/fullscreen.volt" %}
{% block forma %}
    {{ content() }}
    <div>
    {% endblock %}
    {% block cabecera %}
        {{ form('lotestrxcab/save/'~lotestrx.RefNumber, 'id': 'pedidosCabForm', 'class': 'sky-form') }}
    {% endblock %}
    {% block cuerpoforma %}
        <fieldset>
            <section>
                <div class="row">
                    <div class="col col-4">
                        <div class="col col-sm-1">
                            <label class="hidden">
                                {{ lotestrx.Estado }}
                            </label>
                        </div>
                        <div class="col col-sm-11">
                            <label># Transferencia : </label>
                            {{ lotestrx.RefNumber }}
                        </div>
                    </div>
                    <div class="col col-4">
                        <div class="col col-sm-1">
                            <label class="hidden">
                                {{ lotestrx.Estado }}
                            </label>
                        </div>
                        <div class="col col-sm-11">
                            <label>Fecha Transf. : </label>
                            {{ lotestrx.TxnDate }}
                        </div>
                    </div>
                    <div class="col col-4">
                        <div class="col col-sm-1">
                            <label class="hidden">
                                {{ lotestrx.Estado }}
                            </label>
                        </div>
                        <div class="col col-sm-11">
                            <label>Tipo Transf. : </label>
                            {{ lotestrx.TipoTrx }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-4">
                        <div class="col col-sm-1">
                            <label class="hidden">
                                {{ lotestrx.OrigenTrx }}
                            </label>
                        </div>
                        <div class="col col-sm-11">
                            <label>Bod Origen : </label>
                            {{ lotestrx.OrigenDesc }}
                        </div>
                    </div>
                    <div class="col col-4">
                        <div class="col col-sm-1">
                            <label class="hidden">
                                {{ lotestrx.DestinoTrx }}
                            </label>
                        </div>
                        <div class="col col-sm-11">
                            <label>Bod Destino : </label>
                            {{ lotestrx.DestinoDesc }}
                        </div>
                    </div>

                </div>
                <div class="row>">
                    <div class="col col-1">
                    </div>                                
                    <div class="col col-1">
                        <label>Obs. : </label>
                    </div>                                
                    <div class="col col-10">
                        {{ lotestrx.Memo }}
                    </div>                                
                </div>
            </section>
        </fieldset>
        <fieldset>
            <table class="table table-responsive table-bordered table-striped" align="center">
                <thead class="coloreando" style="background-color: brown">
                    <tr>
                        <th>Producto</th>
                        <th>Descripcion</th>
                        <th>Disponible</th>
                        <th>Transferir</th>
                        <th>Observaciones</th>
                        <th>Mensajes</th>
                    </tr>
                </thead>
                <tbody>
                    {% set l = 0 %}
                    {% for productos in helados %}
                        {% set campo = 'ingresa' ~ l %}
                        {% set campo1 = 'memo' ~ l %}
                        {% set campo2 = 'obs' ~ l %}
                        {% if productos.Disponible > 0 %}
                            <tr>
                                <td>{{ productos.Name }}</td>
                                <td>{{ productos.ItemRef_FullName }}</td>
                                <td>{{ productos.Disponible }}</td>
                                <td>
                                    {{ numeric_field(campo) }}
                                </td>
                                <td>
                                    {{ text_field(campo1) }}
                                </td>
                            </tr>
                        {% endif %}
                        {% set l = l + 1 %}
                    {% endfor %}
                </tbody>
            </table>
        </fieldset>

        <footer>
            <div class="row">
                <div class="col-sm-3">
                    <nav>
                        <ul class="pagination">
                            <li>{{ link_to("lotestrxcab", "Regresar") }}</li>
                        </ul>
                    </nav>
                </div>
                <div class="col col-6">
                    <h1>Nueva Transferencia</h1>
                </div>                
                <div class="col col-3">
                    {{ submit_button('Guardar', 'class': 'btn btn-primary') }}
                </div>                
            </div>

        </footer>
    </form>
</div>                  
{% endblock %}