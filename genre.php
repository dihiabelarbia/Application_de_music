<?php 

if(isset($_GET['idal'])) setcookie('last_album', $_GET['idal'] , time()+3600*24, '/', '', true, true);
if(isset($_GET['idar'])) setcookie('last_artist', $_GET['idar'] , time()+3600*24, '/', '', true, true); 
if(isset($_GET['idpl'])) setcookie('last_playlist', $_GET['idpl']  , time()+3600*24, '/', '', true, true);
session_start();
$titre = "Listenay";
$description = " Page d'accueil" ;
$year = '2592000'*'12' + time();// 60 *60 * 24 *30 
$date1 = date('Y/m/d h:i:s'); // Date du jour
setlocale(LC_TIME, "fr_FR" , "french");
$date = strftime("%A %d %B %G à %T", strtotime($date1));
require "include/funcphp.php";
require "include/header.php";
?>


</head>
<body>

<div class="container" onclick="functionn(this)">
  <div class="bar1"></div>
  <div class="bar2"></div>
  <div class="bar3"></div>
</div>

<aside class ="menu" id ="hide">
<form action="top10.php" method="POST">
        <ul class ="menu_acceuil">
            <li  class ="active">     <i class="fas fa-play"></i>
            <input type="submit" name="playlist" value="top 10 des playlistes"/>
            </li>
            <li><i class="fas fa-record-vinyl"></i>
            <input type="submit" name="album" value="top 10 des Albums"/>
            </li>
            <li>     <i class="fas fa-music"></i>
            <input type="submit" name="artist" value="top 10 des artists"/>
            </li>
            <li>     <i class="fas fa-podcast"></i>
            <input type="submit" name="podcast" value="top 10 des podcasts"/>
            </li>
        </ul>
    </form>

    </aside>
        <div class = "wrap4">
<?php             
        if (isset($_POST["pop"])) {  
                $link_api="https://api.deezer.com/genre/132/artists";
                $obj = json_decode(file_get_contents($link_api));
                $data = $obj->data;
                echo("<h3>Pop</h3>");
                for ($i = 0;$i < 25 ;$i++){
                  echo ("<section class ='griid'>");
                    echo ("<ul class='play_bloc'><li><a href='tracks.php?idar=".$data[$i]->id."'><img class='playlist' src='".$data[$i]->picture_medium."' alt='cover'/></a></li>");
                    echo("<li class='title'>".$data[$i]->name."</li></ul></section>");
                    echo ("</section>");
                  }
                          echo ("</article>");
                  }
            if (isset($_POST["rock"])) {  
                $link_api="https://api.deezer.com/genre/152/artists";
                $obj = json_decode(file_get_contents($link_api));
                $data = $obj->data;
                echo("<h3>Rock</h3>");
                for ($i = 0;$i < 25 ;$i++){
                  echo ("<section class ='griid'>");
                    echo ("<ul class='play_bloc'><li><a href='tracks.php?idar=".$data[$i]->id."'><img class='playlist' src='".$data[$i]->picture_medium."' alt='cover'/></a></li>");
                    echo("<li class='title'>".$data[$i]->name."</li></ul></section>");
                    echo ("</section>");
                  }
                          echo ("</article>");

            }  
            if (isset($_POST["folk"])) {  
                $link_api="https://api.deezer.com/genre/466/artists";
                $obj = json_decode(file_get_contents($link_api));
                $data = $obj->data;
                echo("<h3>Folk</h3>");
                for ($i = 0;$i < 25 ;$i++){
                  echo ("<section class ='griid'>");
                    echo ("<ul class='play_bloc'><li><a href='tracks.php?idar=".$data[$i]->id."'><img class='playlist' src='".$data[$i]->picture_medium."' alt='cover'/></a></li>");
                    echo("<li class='title'>".$data[$i]->name."</li></ul></section>");
                    echo ("</section>");
                  }
                          echo ("</article>");
                  }
             
            if (isset($_POST["reggae"])) {  
                $link_api="https://api.deezer.com/genre/144/artists";
                $obj = json_decode(file_get_contents($link_api));
                $data = $obj->data;
                echo("<h3>Reggae</h3>");
                for ($i = 0;$i < 25 ;$i++){
                  echo ("<section class ='griid'>");
                    echo ("<ul class='play_bloc'><li><a href='tracks.php?idar=".$data[$i]->id."'><img class='playlist' src='".$data[$i]->picture_medium."' alt='cover'/></a></li>");
                    echo("<li class='title'>".$data[$i]->name."</li></ul></section>");
                    echo ("</section>");
                  }
                          echo ("</article>");
                  }
            if (isset($_POST["jazz"])) {  
                $link_api="https://api.deezer.com/genre/129/artists";
                $obj = json_decode(file_get_contents($link_api));
                $data = $obj->data;
                echo("<h3>jazz</h3>");
                for ($i = 0;$i < 25 ;$i++){
                  echo ("<section class ='griid'>");
                    echo ("<ul class='play_bloc'><li><a href='tracks.php?idar=".$data[$i]->id."'><img class='playlist' src='".$data[$i]->picture_medium."' alt='cover'/></a></li>");
                    echo("<li class='title'>".$data[$i]->name."</li></ul></section>");
                    echo ("</section>");
                  }
                          echo ("</article>");
            }              
            if (isset($_POST["R&B"])) {  
                $link_api="https://api.deezer.com/genre/165/artists";
                $obj = json_decode(file_get_contents($link_api));
                $data = $obj->data;
                echo("<h3>R&B</h3>");
                for ($i = 0;$i < 25 ;$i++){
                  echo ("<section class ='griid'>");
                    echo ("<ul class='play_bloc'><li><a href='tracks.php?idar=".$data[$i]->id."'><img class='playlist' src='".$data[$i]->picture_medium."' alt='cover'/></a></li>");
                    echo("<li class='title'>".$data[$i]->name."</li></ul></section>");
                    echo ("</section>");
                  }
                          echo ("</article>");
                  }
            if (isset($_POST["dance"])) {  
                $link_api="https://api.deezer.com/genre/113/artists";
                $obj = json_decode(file_get_contents($link_api));
                $data = $obj->data;
                echo("<h3>Dnace</h3>");
                for ($i = 0;$i < 25 ;$i++){
                  echo ("<section class ='griid'>");
                    echo ("<ul class='play_bloc'><li><a href='tracks.php?idar=".$data[$i]->id."'><img class='playlist' src='".$data[$i]->picture_medium."' alt='cover'/></a></li>");
                    echo("<li class='title'>".$data[$i]->name."</li></ul></section>");
                    echo ("</section>");
                  }
                          echo ("</article>");
                  }  
        ?>
</div>
<?php
    require "include/footer.php"; ?>