<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo constant('URL') ?>public/img/icon.ico">
</head>
<body>
    <?php require 'views/header.php' ?>

    <div class="container">
        <div class="row p-5">
            <div class="col-sm-12">
                <h1 class="center mb-5">Citas programadas</h1>
                <p>Unete al discord para dar las citas <a href="https://discord.gg/xnanWRrR4C">aqui</a>  |  Mirar citas observadas <a href="<?php echo constant('URL')?>citasrealizadas">aqui</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <?php
                foreach($this->citasagregadas as $row){
                    $citas = new CitaAgregada;
                    $citas = $row;
                    $fecha = explode(' ', $citas->fechrea);
                ?>
                <div class="d-flex justify-content-around shadow p-4 mb-5 bg-body rounded-lg align-items-center">
                    <p>Fecha expedicion: <br><?php echo $citas->fechexp; ?></p>
                    <p>Fecha realizacion: <br><?php echo $fecha[0] ?></p>
                    <p>Hora: <br><?php echo $fecha[1] ?></p>
                    <p><?php 
                        #echo $citas->cliente;
                        foreach($this->clientes as $rowc){
                            $cliente = new Cliente;
                            $cliente = $rowc;
                            if($cliente->documentoId == $citas->cliente){
                                echo 'Cliente: <br>'.$cliente->nombres.' '.$cliente->apellidos;
                            }
                        }
                        ?></p>
                    <p><?php 
                        #echo $citas->cliente;
                        foreach($this->psicologos as $rowp){
                            $psicologo = new Psicologo;
                            $psicologo = $rowp;
                            if($psicologo->documentoId == $citas->psicologo){
                                echo 'Psicologo: <br>'.$psicologo->nombres.' '.$psicologo->apellidos;
                            }
                        }
                        ?></p>
                    <p><a href="<?php echo constant('URL').'observacion?idcita='.$citas->idcitas; ?>" class="btn btn-primary">Observacion</a></p>
                </div>
                    <?php } ?>
            </div>
        </div>
    </div>

    <?php require 'views/footer.php' ?>
</body>
</html>