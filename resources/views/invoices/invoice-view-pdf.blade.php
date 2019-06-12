{{$invoice->amount}}
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">

        <title>Factura</title>



        <style type="text/css">
            #contenedor-a4{}

            @page {
                size: A4;
                margin: 0;
            }

            *{box-sizing: border-box;}
            html, body {
                width: 210mm;
                height: 297mm;
                font-family: Arial;
                font-size: 9px;
            }
            .titulo1{
                font-size: 14px;
            }
            .text-center{
                text-align: center;
            }
            .borde{border:1px solid #000;}
            .col{width: 50%;display: inline-block;vertical-align: top;}
            h1{
                font-size: 18px;
            }

            #datosPrincipales{
                position: relative;
            }
            #tipoFactura{
                position: absolute;
                background: white;
                border: 1px solid #000;
                left: 50%;
                top: 0;
                margin-left: -20px;
                text-align: center;
            }
            #tipoFactura h2{font-size: 24px;margin: 0;}
            #tipoFactura p{font-size: 8px;margin: 0;}


            #datosPrincipales h1{

            }

            ul{list-style: none;padding: 0;}
            ul li{margin-bottom: 10px;}
            ul h5{font-size: 9px; margin: 0;display: inline-block}
            ul h5 span{ }

            #col-derecha-principal{
                padding-left: 40px;

            }
        </style>

    </head>

    <body>
        <div id="contenedor-a4">
            <div class="titulo1 borde text-center">ORIGINAL</div>

            <div id="datosPrincipales">
                <div id="tipoFactura">
                    <h2>C</h2>
                    <p>COD. 11</p>
                </div>
                <div class="col">
                    <h1 class="text-center">WORQ</h1>
                    <ul>
                        <li><h5>Razón Social:</h5> <span>{{env('AFIP_SOCIAL_REASON')}}</span></li>
                        <li><h5>Domicilio Comercial:</h5> <span>{{env('AFIP_COMMERCIAL_ADDRESS')}}</span></li>
                        <li><h5>Condición frente al IVA:</h5> <strong>{{env('AFIP_IVA_CONDITION')}}</strong></li>
                    </ul>
                </div><div class="col" id="col-derecha-principal">
                    <h1>FACTURA</h1>
                </div>
            </div>

        </div>

    </body>

</html>