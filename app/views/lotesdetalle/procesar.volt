{% extends "layouts/adicional.volt" %}
{% block forma %}
    {{ content() }}
    <div>
    {% endblock %}
    {% block cabecera %}
        {{ form('lotesdetalle/saveproduccion', 'id': 'produccionForm', 'class': 'sky-form') }}
    {% endblock %}
    {% block cuerpoforma %}
        <fieldset>
            <section>
                <div class="row">
                    <div class="col col-4 bg-primary text-white">Numero Lote :</div>
                    <div class="col col-4 bg-yellow"><strong>
                            {{ lotesdetalle.RefNumber }}
                        </strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-4 bg-primary text-white">Numero Trx : </div>
                    <div class="col col-4 bg-yellow"><strong>
                            {{ lotesdetalle.TxnNumber }}
                        </strong>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col col-4 bg-primary text-white">Fecha Orden : </div>
                    <div class="col col-4 bg-yellow"><strong>
                            {{ lotesdetalle.TxnDate }}
                        </strong>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col col-4 bg-primary text-white">Producto : </div>
                    <div class="col col-4 bg-yellow"><strong>
                            {{ lotesdetalle.ItemRef_FullName }}
                        </strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-4 bg-primary text-white">Cantidad desde QB : </div>
                    <div class="col col-4 bg-yellow"><strong>
                            {{ lotesdetalle.QtyProducida }}
                        </strong>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <div class="col col-4 bg-primary text-white">Notas:</div>
                    <div class="col col-8">
                        <label class="input bg-yellow">
                            <i class="icon-append fa fa-user"></i>
                            {{ form.render('Memo', ['class': 'form-control']) }}
                        </label> 
                    </div>
                </div>
            </section>
        </fieldset>
        <fieldset>
            <table class="table table-responsive table-bordered table-striped" align="center">
                <thead class="coloreando" style="background-color: brown">
                    <tr>
                        <th width="25%">Tipo</th>
                        <th width="25%">Cantidad</th>
                        <th width="50%">Bodega</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Buena</td>
                        <td> 
                            <label class="input">
                                <i class="icon-append fa fa-user"></i>
                                {{ form.render('QtyBuena', ['class': 'form-control']) }}
                            </label>                        
                        </td>
                        <td>
                            <label class="select">
                                <i class="icon-append fa fa-users"></i>
                                {{ form.render('tipoBuenos', ['class': 'form-control']) }}
                            </label>
                        </td>   
                    </tr>
                    <tr>
                        <td>Mala</td>
                        <td> 
                            <label class="input">
                                <i class="icon-append fa fa-user"></i>
                                {{ form.render('QtyMala', ['class': 'form-control']) }}
                            </label>                        
                        </td>
                        <td>
                            <label class="select">
                                <i class="icon-append fa fa-users"></i>
                                {{ form.render('tipoMalos', ['class': 'form-control']) }}
                            </label>
                        </td>  
                    </tr>
                    <tr>
                        <td>Reproceso</td>
                        <td> 
                            <label class="input">
                                <i class="icon-append fa fa-user"></i>
                                {{ form.render('QtyReproceso', ['class': 'form-control']) }}
                            </label>                        
                        </td>
                        <td>
                            <label class="select">
                                <i class="icon-append fa fa-users"></i>
                                {{ form.render('tipoReproceso', ['class': 'form-control']) }}
                            </label>
                        </td>  
                    </tr>
                    <tr>
                        <td>Muestras</td>
                        <td> 
                            <label class="input">
                                <i class="icon-append fa fa-user"></i>
                                {{ form.render('QtyMuestra', ['class': 'form-control']) }}
                            </label>                        
                        </td>
                        <td>
                            <label class="select">
                                <i class="icon-append fa fa-users"></i>
                                {{ form.render('tipoMuestra', ['class': 'form-control']) }}
                            </label>
                        </td>                          
                    </tr>
                    <tr>
                        <td>Laboratorio</td>
                        <td> 
                            <label class="input">
                                <i class="icon-append fa fa-user"></i>
                                {{ form.render('QtyLab', ['class': 'form-control']) }}
                            </label>                        
                        </td>
                        <td>
                            <label class="select">
                                <i class="icon-append fa fa-users"></i>
                                {{ form.render('tipoLab', ['class': 'form-control']) }}
                            </label>
                        </td>                          
                    </tr>
                    <tr>
                        <td>Total</td>
                        {% set campo = lotesdetalle.QtyBuena + lotesdetalle.QtyMala + lotesdetalle.QtyReproceso + lotesdetalle.QtyMuestra + lotesdetalle.QtyLab %}    
                        <td> {{ campo }} </td>
                        <td>
                            <label class="select">
                                <i class="icon-append fa fa-users"></i>
                                {{ form.render('tipoProd', ['class': 'form-control']) }}
                            </label>
                        </td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
        <fieldset>
            <section>
                <div class="row">
                    <div class="col col-4">
                        <div class="col col-sm-1">
                            <label class="hidden">
                                {{ form.render('TxnID') }}
                            </label>
                        </div>
                    </div>
                </div>
            </section>
        </fieldset>
        <footer>
            <div class="row">
                <div class="col-sm-3">
                    <nav>
                        <ul class="pagination">
                            <li>{{ link_to("lotesdetalle", "Regresar") }}</li>
                        </ul>
                    </nav>
                </div>                
                <div class="col-sm-6">
                    <h1>Procesar Lote</h1>
                </div>
                <div class="col col-3">
                    {{ submit_button('Procesar Lote', 'class': 'btn btn-primary') }}
                </div>                
            </div>

        </footer>
    </form>
</div>
{% endblock %}
