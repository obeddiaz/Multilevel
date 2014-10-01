<script>
    $(document).ready(function() {
        $('#add_product').click(function() {
            var prod = $('#product_select').val();
            $('#table_products tr.total').each(function() { //filas con clase 'dato', especifica una clase, asi no tomas el nombre de las columnas
                if ($(this).find('td').eq(4).text() == prod) {
                    $(this).remove();
                }
            });
            $.ajax({
                type: "POST",
                url: "http://" + GetBaseUrl() + "/index.php/verificacion/obtener_datos_producto/",
                data: "producto=" + $('#product_select').val() + "&&cantidad=" + $('#cantidad').val(),
                dataType: "html",
                beforeSend: function() {
                    $('#msgusuario').html('Verificando...');
                },
                success: function(data) {
                    $("#productos").append(data);
                    var suma = 0;
                    $('#table_products tr.total').each(function() { //filas con clase 'dato', especifica una clase, asi no tomas el nombre de las columnas
                        suma += parseFloat($(this).find('td').eq(3).text()) //numero de la celda 3
                    });
                    console.log(suma);
                    $('#total_products').html("$ " + suma);
                }

            });
            return false;
        });
        $('#product_select').change(function() {

        });
    });
</script> 
<?php
$submit = array(
    'value' => 'Confirmar Venta',
    'class' => 'btn btn-success pull-right'
);
$cantidad = array(
    'name' => 'cantidad',
    'placeholder' => 'Cantidad',
    'id' => 'cantidad',
    'value' => 1,
    'style' => 'width:50px;',
    'class' => 'form-control'
);
?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="col-md-4">
            <h3>Datos de usuario</h3>
            <?php foreach ($user as $u): ?>
                <p><strong>Nombre</strong> <?= $u["nombre"] . " " . $u["apellido_paterno"] . " " . $u["apellido_materno"] ?></p>
                <p><strong>Telefono</strong> <?= $u["telefono"] ?></p>
                <p><strong>Celular</strong> <?= $u["celular"] ?></p>
                <p><strong>Email</strong> <?= $u["email"] ?></p>
                <?php $user_id = $u["id_usuario"] ?>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="row-fluid">
        <div class="col-md-4">
            <h3>Productos</h3>
            <form class="form-horizontal">
                <?php
                foreach ($productos as $p) {
                    $productos_select[$p['id_producto']] = $p['nombre'] . "  $" . $p['precio'];
                }
                ?>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Producto</label>
                    <div class="col-sm-10">
                        <?= form_dropdown('productos', $productos_select, "", 'id="product_select" class="form-control"') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Cantidad</label>
                    <div class="col-sm-10">
                        <?= form_input($cantidad) ?>
                    </div>
                </div>
                <?php
                echo form_hidden('token', $token);
                ?>
                <div class="form-group">
                    <div class="col-sm-12">
                        <a id="add_product" class="btn btn-info pull-right"> Añadir</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <div class="row-fluid">
        <div class="col-md-4">
            <h3>Venta</h3>
            <?= form_open(base_url() . 'index.php/verificacion/nueva_venta') ?>
            <?= form_hidden("id_usuario", $user_id) ?>
            <table id="table_products" ng-table="tableParams" class="table table-condensed table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody id="productos">  
                </tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Total</td>
                    <td id="total_products">$ 0.00</td>
                </tr>
            </table>
            <?= form_submit($submit) ?>
            <?= form_close() ?>
        </div>
    </div>
</div>