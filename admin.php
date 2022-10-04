<?php

require "pages.php";
session_start();

$error = "";
if(array_key_exists("send",$_POST)){

  $username = $_POST["username"];
  $password= $_POST["password"];

  if($username == "admin" && $password == "1234"){
    $_SESSION["loggedUser"] = $username;
  }else{
    $error = "Incorrect credentials";
  }

}
 if(array_key_exists("logout",$_POST)){
  unset ($_SESSION["loggedUser"]);
  header("Location:?");
 }

 if(array_key_exists("loggedUser", $_SESSION)){

  $instanceActualPage = null;

  if(array_key_exists("page",$_GET)){
    $idPage=$_GET["page"];
    $instanceActualPage = $listPages[$idPage];     
  }

  if(array_key_exists("save",$_POST)){
    $content = $_POST["content"];
    $instanceActualPage->setContent($content);

  }
 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Administration</title>
</head>
<body>
  <?php

  if(array_key_exists("loggedUser", $_SESSION) == false){
    ?>
    <form method="post">
    <label for = "username">Username:</label>
    <input type = "text" name = "username" id = "username"><br>

    <label for = "password">Password:</label>
    <input type ="password" name = "password" id = "password"><br>
    <button name = "send">Send</button>
    </form>
    <?php
    echo $error;

  } else {
    echo "Logged in user {$_SESSION['loggedUser']}";

    echo "<form method ='post'>
    <button name = 'logout'>Logout</button>
    </form>";

    echo "<ul>";
    foreach($listPages as $idPage => $instancePage){
      echo "<li><a href ='?page=$instancePage->id'>$instancePage->id</a>
      <a href ='$instancePage->id' target ='_blank'>View</a></li>";
    }
    echo "<ul>";
   if( $instanceActualPage != null){
    echo "<h1>Editace stránky: $instanceActualPage->id</h1>";
    ?>
   <form method = "post">
    <textarea id = "content" name = "content" cols="80" rows="15">
      <?php
      echo htmlspecialchars($instanceActualPage->getContent());
      ?>
    </textarea>
    <br>
    <button name = "save">Save</button>
   </form>
   <script src="vendor\tinymce\tinymce\tinymce.min.js"></script>
   <script>
      tinymce.init({
        selector: '#content',
        height: '50vh',
        entity_encoding:"raw",
        verify_html:false,
        content_css:[
          "css/resset.css",
          "css/section.css",
          "css/style.css",
          "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" ,
          "https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Lobster&display=swap",],
          body_id:"content",
      });
    </script>

    <?php

   }
  }
  ?>
</body>
</html>