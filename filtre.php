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
            <li  class ="active"><i class="fas fa-play"></i>
            <input type="submit" name="playlist" value="playlistes"/>
            </li>
            <li><i class="fas fa-record-vinyl"></i>
            <input type="submit" name="album" value="Albums"/>
            </li>
            <li><i class="fas fa-music"></i>
            <input type="submit" name="artist" value="artists"/>
            </li>
            <li>     <i class="fas fa-podcast"></i>
            <input type="submit" name="podcast" value="podcasts"/>
            </li>
        </ul>
</form>

    </aside>
        <div class = "wrap4">
<?php             
        if (isset($_POST["album"])) {  
                $link_api="https://api.deezer.com/search/album?q=". $_SESSION['var'];
                recupAlbum($link_api, $_SESSION['var']);
            }  
            if (isset($_POST["artist"])) {  
                $link_api="https://api.deezer.com/search/artist?q=". $_SESSION['var'];
                recupArtist($link_api, $_SESSION['var']);
            }  
            if (isset($_POST["playlist"])) {  
                $link_api="https://api.deezer.com/search/playlist?q=". $_SESSION['var'];
                recupPlaylist($link_api, $_SESSION['var']);
            }   
            if (isset($_POST["podcast"])) {  
                $link_api="https://api.deezer.com/search/podcast?q=". $_SESSION['var'];
                recupPodcast($link_api, $_SESSION['var']);
            }      
        ?>
</div>
<?php
    require "include/footer.php"; ?>