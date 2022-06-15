<?php
        //VARIABLES
$fecha = $_POST['fecha'];
$impuesto = $_POST['impuesto'];

$nombre = $_POST['nombre'];
$codigo = $_POST['codigo'];
$descripcion = $_POST['descripcion'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];

//total del primer producto, se multiplica cantidad por valor
$total = 0;


//total del segundo producto, se multiplica cantidad2 por valor2
//$total2 = $cantidad2*$precio2;

//total del NETO, suma de totales
$neto = 0; //+ $total2;

//total del impuesto, suma de totales
$porcentaje = 0;

?>


<html lang="es">
    <head>
        <meta charset="utf'8">
        <title>FACTURA</title>
    </head>
    <body>
        <section> 
            <form>           
                        
            <table border="1">
            <caption><h1>CONSIGNA:</h1></caption>
            <tbody>

                <!-- FECHA -->
                <tr>
                    <div>
                        <th align="left">Fecha:</th>
                        <th align="center"><?php echo $fecha; ?></th>
                    </div>        
                </tr>

                <!-- NOMBRE -->
                <tr>
                    <div>
                        <th align="left">Nombre:</th>
                        <td align="center"><?php echo $nombre; ?></td>
                    </div>              
                </tr>


                <!-- IMPUESTOS -->
                <tr>
                    <div>
                          <th align="left">Impuestos:</th>
                          <td align="center"><?php echo $impuesto; ?></td>
                    </div>                    
                </tr>

                
                <!-- DETALLE -->    

                <tr>
                    <div>
                        <th align="left">Detalle:</th>
                    </div>
                </tr>                   
       
                
                <!-- CODIGO / DESCRIPCION / CANTIDAD / PRECIO -->
        
                <tr>
                    <div>
                        <th align="center">Codigo</th>
                        <td align="center">Descripcion</td>
                        <td align="center">Cantidad</td>
                        <td align="center">Precio</td>
                        <td align="center">Total</td>
                    </div>
                </tr>


                <!-- CAMPOS A RELLENAR -->

                <?php
                $veces = count($codigo);
                $neto_new = 0;

                $porcentajeImpuesto = 0;

                for ($i = 0; $i < $veces; $i++) {
                    echo '<tr><div>';
                    echo '<th align="center">';
                                echo $codigo[$i];
                    echo '</th><td align="center">';
                                echo $descripcion[$i];
                    echo '</th><td align="center">';
                                echo $cantidad[$i];
                    echo '</th><td align="center">';
                                echo $precio[$i];
                    echo '</th><td align="center">';
                                echo $cantidad[$i] * $precio[$i];                            
                    echo '</td></div></tr>';

                    $neto_new = $neto_new + ( $cantidad[$i] * $precio[$i]);
                    }
                ?>
                                <!-- CAMPO NETO -->

                <tr>
                    <div>
                        <th></th>
                        <td></td>
                        <td></td>
                        <td align="center">Neto New</td>
                        <td align="center"><?php echo $neto_new; ?></td>
                    </div>
                </tr>
                                <!-- CAMPO IMPUESTO -->

                                <tr>
                    <div>
                        <th></th>
                        <td></td>
                        <td></td>
                        <td align="center">Impuestos</td>
                        <td align="center">
                            <?php 
                                $porcentajeImpuesto = $neto_new * $impuesto / 100;
                                echo $porcentajeImpuesto; 
                            ?>
                        </td>
                    </div>
                </tr>
                                <!-- CAMPO TOTAL -->

                                <tr>
                    <div>
                        <th></th>
                        <td></td>
                        <td></td>
                        <td align="center">Total</td>
                        <td align="center"><?php echo $neto_new + $porcentajeImpuesto; ?></td>
                    </div>
                </tr>

                                <!-- PIE DE TABLA -->    
            <tfoot>
				<tr>
					<td><i><a href="index.html">volver</a></i></td>
				</tr>
			</tfoot>
            </tbody>
            </table>
            </form>
            </section>       

    </body>
</html>