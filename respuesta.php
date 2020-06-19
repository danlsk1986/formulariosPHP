<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Aprendiendo PHP</title>
    <link href="https://fonts.googleapis.com/css?family=Proza+Libre" rel="stylesheet">

    <link rel="stylesheet" href="css/estilos.css" media="screen" title="no title">
  </head>
  <body>

    <div class="contenedor">
      <h1>Aprendiendo PHP</h1>

        <?php $resultado = $_POST;?>

        <?php $nombre = $resultado['nombre']?>
        <?php $apellido = $resultado['apellido']?>

        <?php

          if(! (filter_has_var(INPUT_POST, 'nombre') && 
                (strlen(filter_input(INPUT_POST,'nombre')) > 0))){
               echo "El nombre es obligatorio"."<br/>";   
          }else {   ?>
              <p>Nombre: <?php echo $nombre;?></p>
          <?php }   ?>

       
       <?php if(!isset($apellido) || trim($apellido) != '') { ?>
        <p>Apellido: <?php echo $apellido;?></p>
      <?php } else
          echo "El apellido es obligatorio".'<br>';
      ?>

          <hr>

      <?php  //validar checkboxes {singular}   ?>

      <?php
            //isset == si existe un valor
            if(isset($_POST['notificaciones'])) {
              $notificaciones = $_POST['notificaciones'];
              if($notificaciones == 'on'){
                echo 'Se ha inscrito correctamente a notificaciones';
              }
              echo "existe notificaciones";
            }else {
              echo "no existe notificaciones";
            }      
      ?>

      <hr>

      <?php//Validar array de checkboxes?>

      <?php

          if(isset($_POST['curso'])){
            $cursos = $_POST['curso'];
            echo 'Tus cursos son: </br>';
            foreach($cursos as $curso){
              echo $curso.'<br>';
            }
          }else{
            echo 'No elegiste cursos';
          }
      
      ?>

      <hr>

      <?php //Validar select ?>

      <?php if(isset($_POST['area'])){
            $area = $_POST['area'];
            echo "<h2>Area de Especializacion</h2>";
            switch ($area) {
              case 'fe':
                echo "Front End";
                break;
              case 'be':
                echo "Back End";
                break;
              case 'fs':
                echo "Full Stack";
                break;
              default:
                echo "Por favor elije un opcion";
                break;
              }
      }?>

      <hr>

      <?php //Validar radio buttons ?>

      <?php  $opciones = array(
              'pres' => 'Presencial',
               'online' => 'En Línea'
      );?>

      <h2>Tipo de curso elegido</h2>

     <?php if(isset($_POST['opciones'],$opciones)){
       $tipo_curso = $_POST['opciones'];
       switch ($tipo_curso){
         case 'pres':
              echo "Elegiste Presencial";
              break;
         case 'online':
              echo "Elegiste en Linea";
              break;         
       }
     } else {        
        echo "No elegiste tipo de curso";
     }?>

     <hr>

     <h2>Mensaje</h2>
     <?php //Validando el textarea ?>

      <?php if(isset($_POST['mensaje'])){
        $mensaje = $_POST['mensaje'];
        //Seguridad en formularios

        //Metodo 1: $nuevo_mensaje = filter_var($mensaje, FILTER_SANITIZE_STRING);
        //Metodo 2: $nuevo_mensaje = htmlspecialchars($mensaje);
        
        if(strlen($nuevo_mensaje) > 0 && trim($nuevo_mensaje)){
          echo $nuevo_mensaje;
        } else {
          echo "El mensaje esta vacio";
        }
      }
      ?>


    </div> 





           

     




  </body>
</html>
