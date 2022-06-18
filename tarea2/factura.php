<?php
        //SE DEFINEN LAS VARIABLES, cuyos datos fueron enviados por metodo POST desde el formulario anterior. 
$fecha = $_POST['fecha'];
$impuesto = $_POST['impuesto'];
$nombre = $_POST['nombre'];
$codigo = $_POST['codigo'];
$descripcion = $_POST['descripcion'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];

?>


<html lang="es">
    <head>
        <meta charset="utf'8">
        <title>FACTURA</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
    <body>
        <caption><h1>FACTURA:</h1></caption>
        <form>
                    <div class="container" >
                            <div class="row">
                                <div class="col-xl-8">
                                    <ul class="list-unstyled">
                                    <li style="font-size: 20px; color: black; font-weight: 400;font-family: Arial, Helvetica, sans-serif;"><b>NOMBRE:</b><?php echo $nombre; ?></span></li>
                                    <li style="font-size: 20px; color: black; font-weight: 400;font-family: Arial, Helvetica, sans-serif;"><b>FECHA:</b><?php echo $fecha; ?></li>
                                    <li style="font-size: 20px; color: black; font-weight: 400;font-family: Arial, Helvetica, sans-serif;"><b>IMPUESTOS:</b><?php echo $impuesto.'%'; ?></li>                                    
                                    </ul>
                                </div>
                            </div>
                        </div>

                

                            
                                <!-- FORMULARIO DE CODIGO / DESCRIPCION / CANTIDAD / PRECIO -->

                <div class="container">
                                    <div class="row my-2 mx-1 justify-content-center">
                                      <table class="table table-striped table-borderless">
                                        <thead style="background-color:#84B0CA ;" class="text-white">
                                          <tr>
                                          <th scope="col">Codigo</th>
                                          <th scope="col">Descripcion</th>
                                          <th scope="col">Cantidad</th>
                                          <th scope="col">Precio</th>
                                          <th scope="col">Total</th>
                                          </tr>                        
                                        </thead>
                                      </table>
                                    </div>
                </div>
                             
 
                <!--Las variables $codigo, $descripcion, $cantidad y $precio, fueron almacenadas en un array mediante el Post. 
                    Por este motivo para llamar a las mismas se lo hace depende la posicion que esten. Al desconocer la cantidad de filas
                    con informacion, se realizó un bucle for el cual, a medida que lo recorre, imprime en pantalla la fila con sus respectivos datos.
                 -->

                
                
                <?php
                
                
                /* 
                    # Para indicarle al sistema cuantas veces queremos que recorra el bucle "for", se declaró la variable $veces.                    
                      "count" nos indica la cantidad de elementos que tiene un array, siendo ésta cantidad las veces que necesitamos que el bucle recorra.
                      Por lo que $veces = a la cantidad de elementos. Al tener todas las variables que se necesitan en la fila los mismos elementos, solo 
                      se utilizó a una de ellas como referencia. En este caso fue la variable $codigo
                      
                    # al multiplicar $cantidad*$precio obtenemos solo el total de ese producto.
                      Este resultado se almacena en la variable $neto que en principio tiene un valor 0, y luego, como se aprecia mas abajo
                      $neto pasa a ser su valor actual sumado a al total del producto. Cada vez que el bucle da una vuelta va sumando y almacenando el resultado.

                */

                $veces = count($codigo);
                
                $neto = 0;
                
               

                for ($i = 0; $i < $veces; $i++) {
                    echo '<div class="container"><div class="row align-items-start"><table border="1" class="table"><tr>';
                    echo '<th align="center" width="80px">';
                                echo $codigo[$i];
                    echo '</th><td align="center" width="80px">';
                                echo $descripcion[$i];
                    echo '</td><td align="center" width="80px">';
                                echo $cantidad[$i];
                    echo '</td><td align="center" width="80px">';
                                echo '$'.$precio[$i];
                    echo '</td><td align="center" width="80px">';
                                echo '$'.$cantidad[$i] * $precio[$i];                            
                    echo '</td></div></div><table></tr>';


                    $neto = $neto + ( $cantidad[$i] * $precio[$i]);
                    }
                ?>




                                <!-- CAMPO NETO -->

                <tr>
                <div class="container">
                    <div class="row align-items-start">
                        <table border="0" class="table">
                            <thead class="thead-dark">
                            
                            <td width="100px"></td>
                            <td width="100px"></td>
                            <td width="100px"></td>

                            <td align="center" width="100px"><b>Neto</b></td>
                            <td align="center" width="100px"><?php echo '$'.($neto); ?></td>
                            </thead>
                        </table>
                    </div>
                </div>
                </tr>

                <tr>
                <div class="container">
                    <div class="row align-items-start">
                        <table border="0" class="table">
                            <thead class="thead-dark">
                            
                            <td width="100px"></td>
                            <td width="100px"></td>
                            <td width="100px"></td>

                            <td align="center" width="100px"><b>Impuestos</b></td>
                            <td align="center" width="100px">
                            
                            <!-- Para calcular el impuesto, se hace una regla de tres simple.
                                 Multiplicamos $neto por el impuesto elegido, y al resultado lo dividimos por 100.
                                El resultado se almacena en la variable $porcentajeImpuesto declarada para tal fin. -->
                            
                            <?php 
                                $porcentajeImpuesto = $neto * $impuesto / 100;
                                echo '$'.$porcentajeImpuesto; 
                            ?>
                            </td>
                            </thead>
                        </table>
                    </div>
                </div>
                </tr>

                <tr>
                <div class="container">
                    <div class="row align-items-start">
                        <table border="0" class="table">
                            <thead class="thead-dark">
                            
                            <td width="100px"></td>
                            <td width="100px"></td>
                            <td width="100px"></td>

                            <td align="center" width="100px"><b>Total a Pagar</b></td>

                            <!-- Por ultimo, para obtener el total a pagar, se suma el $neto con el $porcentajeImpuesto obtenido -->
                            <td align="center" width="100px"><?php echo '$'.($neto + $porcentajeImpuesto); ?></td>
                            </thead>
                        </table>
                    </div>
                </div>
                </tr>


                                <!-- PIE DE TABLA -->    

                                <div class="container w-auto p-3">
                                    <div class="row">
                                      <table border="0" class="table">
                                  
                                      <div>
                                        <td><a href="index.html" class="btn btn-warning">VOLVER AL INICIO</a>
                                            
                                    </div>
                                    </div>
                                  </div>  
			</tr>
			</tfoot>
            </tbody>
            </table>
            </form>
            </section>       

    </body>
</html>