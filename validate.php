<?php
     // Create a conection with mySQL

     $link = mysql_connect("localhost","dev","desarrollo");
     mysql_select_db("simple-login", $link);

     
     /* The query valid if the data user sended exist in the database. Use the function
     htmlentities to avoid SQL injection.  */
     $user = htmlentities($_POST["usuario"]);
     $query = "select idusuario from usuarios where usuario = '$user'";
     $myusuario = mysql_query($query, $link);

     $nmyusuario = mysql_num_rows($myusuario);

// If the user exist, valid too the password loged and the user status
if($nmyusuario != 0){
  $sql = "select idusuario from usuarios where estado = 1 and usuario = '".htmlentities($_POST["usuario"])."' and clave = '".md5(htmlentities($_POST["clave"]))."'";
  $myclave = mysql_query($sql,$link);
  $nmyclave = mysql_num_rows($myclave);

// If the user and the password are correct (and the user is active in the database), it creates the session from himself
     if($nmyclave != 0){
               session_start();
               //We save two variables of session that it help us know if the user is loged or not
               $_SESSION["autentica"] = "SIP";
               $_SESSION["usuarioactual"] = mysql_result($myclave,0,0); //name of user loged 
               //Redirect to our principal page of the system
               header ("Location: app.php");
     }
     else{
               echo"<script>alert('La contraseña del usuario no es correcta.');
               window.location.href=\"index.php\"</script>"; 
     }

}
else{
          echo"<script>alert('El usuario no existe.');window.location.href=\"index.php\"</script>";
     }
     mysql_close($link);
?>
