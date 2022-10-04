<div class="container-fluid">

    <!--     <h5 class="mt-2">Listado de Caprinos</h5> -->


    <?php
    $caprino = ControladorCaprino::ctrConsultarCaprinoActivo($id);
   //print_r($caprino);
    ?>

    <!-- listado de caprinos -->

    <div class="table-responsive mt-3 mb-5">
        <table class="table table-warning table-bordered  table-sm rcaprinos_table">
            <thead id="theadListarCaprinosPorUsuario">
                <tr>
                    <th>Código</th>
                    <th>Género</th>
                    <th>Info</th>

                    <th>Raza</th>
                    <th>Origen</th>
                    <th>Fecha Nacimiento</th>
                    <th>Código madre</th>



                </tr>
            </thead>
            <tbody id="tbodyListarCaprinosPorUsuario">

                <?php foreach ($caprino as $key => $value) : ?>
                    <tr>
                        <td><?php echo $value["codigo"] ?></td>
                        <td><?php echo $value["genero"]  ?></td>
                        <!-- <td><?php echo $value["dato1"]=='noparto' ? 'Sin partos' : ( $value["dato1"]=='nocapado')  ?></td> -->
                        <td><?php echo $value["dato1"]?></td>

                        <td><?php echo $value["raza"] ?></td>
                        <td><?php echo $value["origen"] ?></td>
                        <td><?php echo $value["fecha_nacimiento"] ?></td>
                        <td><?php echo $value["codigo_madre"]=="0"?'-': $value["codigo_madre"] ?></td>



                    </tr>

                <?php endforeach ?>



            </tbody>
        </table>
    </div>
</div>