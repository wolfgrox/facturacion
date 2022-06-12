<?php
        //VARIABLES
$fecha = $_POST['fecha'];
$nombre = $_POST['nombre'];
$impuesto = $_POST['impuesto'];
$codigo = $_POST['codigo'];
$codigo2 = $_POST['codigo2'];
$descripcion = $_POST['descripcion'];
$descripcion2 = $_POST['descripcion2'];
$cantidad = $_POST['cantidad'];
$cantidad2 = $_POST['cantidad2'];
$precio = $_POST['precio'];
$precio2 = $_POST['precio2'];

//total del primer producto, se multiplica cantidad por valor
$total = $cantidad*$precio;

//total del segundo producto, se multiplica cantidad2 por valor2
$total2 = $cantidad2*$precio2;

//total del NETO, suma de totales
$neto = $total + $total2;

//total del impuesto, suma de totales
$porcentaje = $neto*$impuesto / 100;

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
                    <div class="form-row">
                        <th align="left">Fecha:</th>
                        <th align="center"><?php echo $fecha; ?></th>
                    </div>        
                </tr>

                <!-- NOMBRE -->
                <tr>
                    <div class="form-row">
                        <th align="left">Nombre:</th>
                        <td align="center"><?php echo $nombre; ?></td>
                    </div>              
                </tr>


                <!-- IMPUESTOS -->
                <tr>
                    <div class="form-row">
                          <th align="left">Impuestos:</th>
                          <td align="center"><?php echo $impuesto; ?></td>
                    </div>                    
                </tr>

                
                <!-- DETALLE -->    

                <tr>
                    <div class="form-row">
                        <th align="left">Detalle:</th>
                    </div>
                </tr>                   
       
                
                <!-- CODIGO / DESCRIPCION / CANTIDAD / PRECIO -->
        
                <tr>
                    <div class="form-row">
                        <th align="center">Codigo</th>
                        <td align="center">Descripcion</td>
                        <td align="center">Cantidad</td>
                        <td align="center">Precio</td>
                        <td align="center">Total</td>
                    </div>
                </tr>


                <!-- CAMPOS A RELLENAR -->

                <tr>
                    <div class="form-row">
                        <th align="center"><?php echo $codigo; ?></th>
                        <td align="center"><?php echo $descripcion; ?></td>
                        <td align="center"><?php echo $cantidad; ?></td>
                        <td align="center"><?php echo $precio; ?></td>
                        <td align="center"><?php echo $total; ?></td>
                    </div>                    
                </tr>

                
                <!-- CAMPOS A RELLENAR -->

                <tr>
                    <div class="form-row">
                        <th align="center"><?php echo $codigo2; ?></th>
                        <td align="center"><?php echo $descripcion2; ?></td>
                        <td align="center"><?php echo $cantidad2; ?></td>
                        <td align="center"><?php echo $precio2; ?></td>
                        <td align="center"><?php echo $total2; ?></td>
                    </div>
                </tr>
                                <!-- CAMPO NETO -->

                <tr>
                    <div class="form-row">
                        <th></th>
                        <td></td>
                        <td></td>
                        <td align="center">Neto</td>
                        <td align="center"><?php echo $neto; ?></td>
                    </div>
                </tr>
                                <!-- CAMPO IMPUESTO -->

                                <tr>
                    <div class="form-row">
                        <th></th>
                        <td></td>
                        <td></td>
                        <td align="center">Impuestos</td>
                        <td align="center"><?php echo $porcentaje; ?></td>
                    </div>
                </tr>
                                <!-- CAMPO TOTAL -->

                                <tr>
                    <div class="form-row">
                        <th></th>
                        <td></td>
                        <td></td>
                        <td align="center">Total</td>
                        <td align="center"><?php echo $neto + $porcentaje; ?></td>
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