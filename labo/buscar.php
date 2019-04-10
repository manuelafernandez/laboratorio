<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Buscar</title>
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_style.min.css" rel="stylesheet" type="text/css" /></head>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script> 
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script><script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script><script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0//js/froala_editor.pkgd.min.js"></script>
  <link rel="stylesheet" href="css/estilo.css">
  <link href="https://fonts.googleapis.com/css?family=calibri:100,600" rel="stylesheet" type="text/css">

  <style>
    .top-right{
                position: absolute;
                right: 18px;
                top: 10px;
            }

    .top-left{
        position: absolute;
        left: 500px;
        top: 100px;
    }

    .links > a {
                color: rgb(54, 42, 228);
                padding: 0 25px;
                font-size: 18px;
                font-weight: normal;
                font-family: 'calibri', sans-serif;
                letter-spacing: .1rem;
                text-decoration: none;
            }

    body{
        font-size: 18px;
        font-family: 'Calibri';
        width: 100%;
    }
  </style>
</head>

<body>
    <div class="top-right links">
      <a href="home.html">Principal</a>
    </div>

    <div align=center>
        <h3 style="color: rgb(54, 42, 228);">Ficha del paciente</h3>
    </div>

    <?php

/**Conexion con la base de datos */
include_once("../labo/conexionDB.php");

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['buscar']))
{
 
    if(!empty($_POST['dni'])) { 
        if(!isset($_POST['dni'])) { 
        }else {
            $dni = $_POST["dni"];
            $sql = "SELECT nombreapellido,sexo,fechanacimiento,localidad,domicilio,celular,mail FROM clientes WHERE documento='$dni'";
            $resultado = $conn->query($sql);
    
            if ($resultado->num_rows > 0) {
                // output data of each row
                while($row = $resultado->fetch_assoc()) {
                    $paciente='';
                    $nombreapellido =  $row["nombreapellido"];
                    $sexo = $row["sexo"];
                    $fechanacimiento = $row["fechanacimiento"];
                    $localidad = $row["localidad"];
                    $domicilio = $row["domicilio"];
                    $celular = $row["celular"];
                    $mail = $row["mail"];

                }
            } else {
                $paciente= 'No se encontro paciente ';
                $nombreapellido =  '-';
                $sexo = '-';
                $fechanacimiento = '-';
                $localidad = '-';
                $domicilio = '-';
                $celular = '-';
                $mail = '-';
                $dni = '-';
            }
        }
    }
    else{
        $paciente= 'No se encontro paciente';
        $nombreapellido =  '-';
        $sexo = '-';
        $fechanacimiento = '-';
        $localidad = '-';
        $domicilio = '-';
        $celular = '-';
        $mail = '-';
        $dni = '-';
    }
   
}
?>

<div class="top-left">
    <h1> <?php echo $paciente; ?><br><br> </h1>
    Nombre y apellido: <?php echo $nombreapellido; ?><br><br>
    DNI: <?php echo $dni; ?><br><br>
    Sexo: <?php echo $sexo; ?><br><br>
    Fecha de nacimiento: <?php echo $fechanacimiento; ?><br><br>
    Localidad: <?php echo $localidad; ?><br><br>
    Domicilio: <?php echo $domicilio; ?><br><br>
    Celular/Telefono: <?php echo $celular; ?><br><br>
    Mail: <?php echo $mail; ?><br><br>
</div>


</body>

</html>
