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
<form action="filtre.php" method="POST">
<ul>
            <li  class ="active">     <i class="fas fa-play"></i>
            <input type="submit" name="playlist" value="playlistes"/>
            </li>
            <li><i class="fas fa-record-vinyl"></i>
            <input type="submit" name="album" value="Albums"/>
            </li>
            <li>     <i class="fas fa-music"></i>
            <input type="submit" name="artist" value="artists"/>
            </li>
            <li>     <i class="fas fa-podcast"></i>
            <input type="submit" name="podcast" value="podcasts"/>
            </li>
        </ul>
</form>

    </aside>
<?php
     $str="";
     if (isset($_POST["var"]) && !empty($_POST["var"])) {
         $str = $_POST["var"];
         $_SESSION['var']= $str;
     }
     ?>
     </div>
     <div class="wrap4">
         <?php
     recupAlbum("https://api.deezer.com/search/album?q=".$str, $_POST["var"]);  ?></div>
          <div class="wrap">
         <?php
     recupArtist("https://api.deezer.com/search/artist?q=".$str, $_POST["var"]) ;  ?></div>

     <div class="wrap">
     <?php
     recupPlaylist("https://api.deezer.com/search/playlist?q=".$str, $_POST["var"]);  ?></div>

     <div class="wrap">
     <?php
     recupPodcast("https://api.deezer.com/search/podcast?q=".$str, $_POST["var"]);
     ?>
     </div>

     <?php
    require "include/footer.php"; ?>




