
<main>
  <?php
  session_start();

  include_once("./controller/comprobar.php");
   if (isset($_SESSION['id'])) {
    if($done==true){
      include_once("./views/top.php");
    }else{

      include_once("./views/formV.php");
    }
  } else {
     echo " <div class='noSesion'>
       <h1>¡Elige los Hits del 2024 que Definieron Tu Año!</h1>
      <h3>Inicia sesión y vota por tus 3 canciones favoritas, esos álbumes inolvidables y los artistas que marcaron el ritmo de tu vida.</h3>
      <div class='grid-2r'>
         <a href='#' id='loginA'>Ya tengo cuenta</a>
         <a href='#' id='registerA'>Crear cuenta</a>
       </div>";
       include_once("./views/formL.php");

      }

      ?>
 
 <?php
      
      // include_once("./views/formL.php");
      ?>
  </div>
</main>
<?php
