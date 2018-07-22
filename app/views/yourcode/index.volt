{% extends "layouts/adicional.volt" %}
{% block forma %}
    {{ content() }}

    <div class="body bg-blue">
    {% endblock %}
    {% block cabecera %}
        <div class="bg-orange sky-form">
    {% endblock %}
    {% block cuerpoforma %}
        <fieldset>
            <section>
                <div class="row">
                    <label class="col col-2"></label>
                    <div class="col col-8">
                        <ul><li>Solo para recordarle los servicios que se encuentran disponibles en este portal.</li><li> Este portal esta en su primera version
                        </li><li>Acepta el ingreso de empleados, clientes, y proveedores de Heladerias COFRUNAT Cia. Ltda. y nuestro nombre comercial que es 
                        un icono en el mercado ecuatoriono es HELADOS LOS COQUEIROS.
                        </li><li>- Si es un empleado podra firmar con los servicios del SRI facturas, notas de credito, notas de debito, remisiones, y retenciones
                        </li><li>- Si es un cliente o proveedor podra guardar sus documentos autorizados por el SRI en formato XML y PDF
                        </li></ul>
                    </div>
                    <div class="col col-2"></div>
                </div>
            </section>
        </fieldset>
        <footer>
        </footer>
    </form>
</div>
</div>
{% endblock %}