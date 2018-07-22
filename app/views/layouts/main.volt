<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        {{ get_title() }}
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="https://carrillosteam.com/public/css/demo.css">
        <link rel="stylesheet" href="https://carrillosteam.com/public/css/sky-forms-ie8.css">
        <link rel="stylesheet" href="https://carrillosteam.com/public/css/sky-forms-blue.css">
        <link rel="stylesheet" href="https://carrillosteam.com/public/css/sky-forms-orange.css">
        <link rel="stylesheet" href="https://carrillosteam.com/public/css/sky-forms-green.css">
        <link rel="stylesheet" href="https://carrillosteam.com/public/css/sky-forms-coqueiro.css">
        <link rel="stylesheet" href="https://carrillosteam.com/public/css/sky-forms.css">
        <link rel="stylesheet" href="https://carrillosteam.com/public/css/footer.css">
        <link rel="stylesheet" href="https://carrillosteam.com/public/css/slider.css">
        <style>
            #total {
                display: none;
            }
        </style>
    </head>
    <body class="bg-blue" id="cuerpito">
        <nav class="navbar navbar-default navbar-custom navbar-inverse" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Los Coqueiros</a>
                </div>
                {{ elements.getMenu() }}
            </div>
        </nav>   
        <div class="container">
            {{ flash.output() }}
        </div>

    {% block cuerpo %}{% endblock %}
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6 footerleft ">
                    <div class="logofooter" align="center"><img src="https://carrillosteam.com/public/img/logo.png"></div>
                    <p>Súper Helados Los Coqueiros es la marca de un tradicional y nutritivo helado ecuatoriano, 
                        elaborado desde 1974, con las más selectas frutas naturales de las diferentes regiones del país. 
                        La pionera de la fabricación de Súper Helados Los Coqueiros es la señora Olga Espinosa de Bustos, 
                        quien con mucha creatividad, dedicación y sacrificio, tuvo el acierto de sacar adelante su pequeño 
                        negocio casero iniciado en el sector de la Jipijapa en la ciudad de Quito. 
                        Con la ayuda y el trabajo incondicional de sus hijos se constituyó, en 1989, 
                        Heladerías Cofrunat Cía. Ltda., única empresa productora y comercializadora de Súper Helados Los Coqueiros. 
                        Desde entonces, Heladerías Cofrunat Cía. Ltda. ha crecido y mejorado la calidad de sus productos 
                        con la integración de equipos y maquinaria especializados en los procesos de fabricación y 
                        selección de los más finos ingredientes. 
                        En la actualidad, Heladerías Cofrunat Cía. Ltda. es la empresa líder en la fabricación y 
                        comercialización de helados de frutas naturales. 
                        La empresa genera alrededor de 40 puestos de trabajo directos, mas de 1,000 indirectos, 
                        con una amplia red de distribuidores en las principales provincias del país, 
                        incluido Galápagos, que crece día a día , y cuenta con una selecta red de proveedores calificados.</p>
                    <p><i class="fa fa-map-pin"></i> Avenida El Morlan 1453 - 170023, Quito, Ecuador</p>
                    <p><i class="fa fa-phone"></i> Phone (Ecuador) : +593 2 2504463</p>
                    <p><i class="fa fa-envelope"></i> E-mail : xavierbustos@loscoqueiros.com</p>

                </div>
                <div class="col-md-2 col-sm-6 paddingtop-bottom">
                    <h6 class="heading7">GENERAL</h6>
                    <ul class="footer-ul">
                        <li><a href="#"> Trabajo</a></li>
                        <li><a href="#"> Politicas</a></li>
                        <li><a href="#"> Condiciones de uso</a></li>
                        <li><a href="#"> Clientes</a></li>
                        <li><a href="#"> Proveedores</a></li>
                        <li><a href="#"> Empleados</a></li>
                        <li><a href="#"> Preguntas frecuentes</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-sm-6 paddingtop-bottom">
                    <h6 class="heading7">LINKS</h6>
                    <ul class="footer-ul">
                        <li><a href="https://phalconphp.com/en/">phalconphp.com</a></li>
                        <li><a href="https://carrillosteam.com/about/index">About us</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Faq's</a></li>
                        <li><a href="#">Contactenos</a></li>
                        <li><a href="#">Contenido del sitio</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-sm-6 paddingtop-bottom">
                    <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-height="300" data-small-header="false" style="margin-bottom:15px;" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <div class="fb-xfbml-parse-ignore">
                            <blockquote cite="https://www.facebook.com/facebook"><a href="https://www.facebook.com/Helados-Los-Coqueiros-812954435488885/">Facebook</a></blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer start from here-->

    <div class="copyright">
        <div class="container">
            <div class="col-md-6">
                <p>© 2017 - All Rights with CarrillosTeam</p>
            </div>
        </div>
    </div>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>  
    {{ javascript_include("https://carrillosteam.com/public/js/jquery.form.min.js") }}
    {{ javascript_include("https://carrillosteam.com/public/js/jquery.maskedinput.min.js") }}
    {{ javascript_include("https://carrillosteam.com/public/js/jquery.modal.js") }}
    {{ javascript_include("https://carrillosteam.com/public/js/jquery.validate.min.js") }}
{#    {{ javascript_include("https://carrillosteam.com/public/js/utils.js") }}#}
    {{ javascript_include("public/js/utils.js") }}
    {{ javascript_include("https://carrillosteam.com/public/js/slider.js") }}
    <!--[if lt IE 10]>
            <script src="https://carrillosteam.com/public/js/jquery.placeholder.min.js"></script>
    <![endif]-->		
    <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <script src="https://carrillosteam.com/public/js/sky-forms-ie8.js"></script>
    <![endif]-->        
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    {{ javascript_include("https://code.highcharts.com/highcharts.js") }}
    {{ javascript_include("https://code.highcharts.com/modules/data.js") }}
    {{ javascript_include("https://code.highcharts.com/modules/exporting.js") }}
    {{ javascript_include("https://code.highcharts.com/modules/export-data.js") }}
    <script>

        Highcharts.chart('container', {
            data: {
                table: 'total'
            },
            chart: {
                type: 'column'
            },
            title: {
                text: 'Totales de Ventas por Representante'
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Valor Ventas + IVA'
                }
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                      this.point.y + ' ' + this.point.name.toLowerCase();
                }
            }
        });
    </script>

</body>
</html>
