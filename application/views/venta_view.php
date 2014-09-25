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
);
$cantidad = array(
    'name' => 'cantidad',
    'placeholder' => 'Cantidad',
    'id' => 'cantidad',
    'value' => 1,
    'style' => 'width:50px;'
);
?>
<h3>Nueva Venta</h3>
<table border="1">
    <tr>
        <td>
            <?php foreach ($user as $u): ?>
                <p><?= $u["nombre"] . " " . $u["apellido_paterno"] . " " . $u["apellido_materno"] ?></p>
                <p><?= $u["telefono"] ?></p>
                <p><?= $u["celular"] ?></p>
                <p><?= $u["email"] ?></p>
                <?php $user_id=$u["id_usuario"] ?>
            <?php endforeach; ?>
        </td>
        <td valign="top">
            <?php
            foreach ($productos as $p) {
                $productos_select[$p['id_producto']] = $p['nombre'] . "  $" . $p['precio'];
            }
            echo form_dropdown('productos', $productos_select, "", 'id="product_select"') . form_input($cantidad);
            echo form_hidden('token', $token);
            ?>
            <a id="add_product"><img style="height: 30px; width: 30px;" alt="" src="<?= base_url() ?>/images/add.gif"/></a>
        </td>
        <td valign="top">
            <?= form_open(base_url() . 'index.php/verificacion/nueva_venta') ?>
            <?= form_hidden("id_usuario",$user_id) ?>
            <table border="1" id="table_products">
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
        </td>
    </tr>
</table>

