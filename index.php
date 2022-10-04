<?php
require "pages.php";

if(array_key_exists("stranka",$_GET)){
$page=$_GET["stranka"];

 if(array_key_exists($page,$listPages) == false){
 $page = "404";

 http_response_code(404);
}

}
else{
  $page = "main";
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/reset.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/header.css" />
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/section.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Lobster&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <script src="./index.js" type="module"></script>
    <title><?php   echo $listPages[$page]->title ?></title>
  </head>
  <body>
    <header>
      <menu>
        <div class="container">
          <a href ="./" class="logo">
          <img src="img/logo.png" alt="logo" width="90" height="70">
           </a>
          <nav>
            <ul><?php
            foreach($listPages as $idPage =>$instancePage){
             if($instancePage->menu!=""){
              echo  "<li><a href='$instancePage->id'>$instancePage->menu</a></li>";
             }
            }
            ?>
          </nav>
        </div>
      </menu>
      <div class="nadpis">
        <h2>Sea Resort </h2>
        <h3>Spa & Holliday hotel</h3>
        <div class="social">
         <a href="https://www.facebook.com/firma" target="_blank" ><i class="fa-brands fa-facebook"></i></a> 
         <a href="https://www.instagram.com/firma" target="_blank" ><i class="fa-brands fa-instagram"></i></a>
         <a href="https://www.youtube.com/firma" target="_blank"><i class="fa-brands fa-youtube"></i></a>

        </div>
      </div>
    </header>
  <section id = "content">
<?php   echo $listPages[$page]->getContent() ?>
  </section>

  <footer>
    <div class="container">
      <nav>
        <h3>Menu</h3>
        <ul>
        <?php
           foreach($listPages as $idPage =>$instancePage){
            if($instancePage->menu!=""){
             echo  "<li><a href='$instancePage->id'>$instancePage->menu</a></li>";
            }
           }
            ?>
        </ul>
      </nav>

      <div class="kontakt">
        <h3>Contact</h3>
        <address>
          <a
            href="https://mapy.cz/zakladni?x=-32.9530378&y=44.9315776&z=8"
            target="_blank"
            >Sea resort <br />via Sunny 1 <br />Global sea, 111 11</a
          >
        </address>
      </div>

      <div class="otevreno">
        <h3>Open reception</h3>
        <table>
          <tr>
            <th>Mo-Fri:</th>
            <td>7h-23h</td>
          </tr>
          <tr>
            <th>Sa:</th>
            <td>7h-24h</td>
          </tr>
          <tr>
            <th>Su:</th>
            <td>8h-24h</td>
          </tr>
        </table>
      </div>
    </div>
  </footer>
  </body>
</html>
