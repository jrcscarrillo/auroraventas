{% extends "layouts/adicional.volt" %}
{% block forma %}
    {{ content() }}

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
                            <ul>
                                <li>Sr. Representante de ventas, solo para recordarle los servicios que se encuentran disponibles en este portal.</li>
                                <li>Esta es la primera version del portal de ventas de Los Coqueiros</li>
                                <li>Acepta registrar, modificar o eliminar pedidos</li>
                                <li>Podra revisar la historia de un cliente, de un dia o del mes</li>
                                <li>Podra disponer del estado de cuenta del cliente</li>
                            </ul>
                        </div>
                        <div class="col col-2"></div>
                    </div>
                </section>
            </fieldset>
            <footer>
            </footer>
            </form>
        </div>
{% endblock %}