<?php include_once('encabezado.php');?>

<div class="col-xs-12">
    <h1>Nuevo producto</h1>
    <form action="nuevo.php" method="post">
        <label for="codigo">Código del producto:</label>
        <input required type="text" class="form-control" name="codigo" id="codigo" placeholder="Escribe el código">

        <label for="descripcion">Descripción:</label>
        <textarea required class="form-control" name="descripcion" id="descripcion" cols="30" rows="5" placeholder="Escribe una descripción del producto"></textarea>

        <label for="precioVenta">Precio de venta:</label>
        <input requiered type="text" class="form-control" name="precioVenta" id="precioVenta" placeholder="Escribe el precio de venta">

        <label for="precioCompra">Precio de compra:</label>
        <input requiered type="text" class="form-control" name="precioCompra" id="precioCompra" placeholder="Escribe el precio de compra">

        <label for="cantidad">Cantidad:</label>
        <input requiered type="text" class="form-control" name="cantidad" id="cantidad" placeholder="Escribe la cantidad de productos">
        <br><br>
        <input type="submit" class="btn btn-info" value="Guardar">
    </form>
</div>

<?php include_once('pie.php');?>