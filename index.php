<?php 
    $titre = "Listenay";
    $description = " Page d'accueil" ;
    $year = '2592000'*'12' + time();// 60 *60 * 24 *30 
    $date1 = date('Y/m/d h:i:s'); // Date du jour
    setlocale(LC_TIME, "fr_FR" , "french");
    $date = strftime("%A %d %B %G à %T", strtotime($date1));
session_start();
require "include/funcphp.php";
require "include/header.php";
?>
<script>
    function functionn(x) { 
  x.classList.toggle("change");
  if (document.getElementById("hide").hidden == false) {
  document.getElementById("hide").hidden = true;
  }
  else {
  document.getElementById("hide").hidden = false;
  }
}
</script>
        <div class = "wrap">
        <?php
        
        echo ("<article>"); 
        if (isset($_COOKIE['last_album']) ||isset($_COOKIE['last_artist']) || isset($_COOKIE['last_playlist'])){
            echo("<h3> Recement consultés</h3>"); }
        if (isset($_COOKIE['last_album'])) {
            lastAlbum("https://api.deezer.com/album/".$_COOKIE['last_album']);
        }
         if (isset($_COOKIE['last_artist'])) {
            lastArtist("https://api.deezer.com/artist/".$_COOKIE['last_artist']);
        } 
        if (isset($_COOKIE['last_playlist'])) {
            lastPlaylist("https://api.deezer.com/playlist/".$_COOKIE['last_playlist']);
        }
        echo("</article>");
        acceuil();
        ?>
        <form action="top10.php" method="POST">
        <input type="submit" name="10play" value="voir plus" class ="voirplus"/>
        <?php
        albums();
        ?>
        <form action="top10.php" method="POST">
        <input type="submit" name="10alb" value="voir plus" class ="voirplus"/>
        </form>
        <?php
        artists();
        ?>
        <form action="top10.php" method="POST">
        <input type="submit" name="10art" value="voir plus" class ="voirplus"/>
        </form>
        <?php
        podcasts();
    ?>  
        <form action="top10.php" method="POST">
        <input type="submit" name="10pod" value="voir plus" class ="voirplus"/>
        </form>
        </div>

    <div class="container" onclick="functionn(this)">
  <div class="bar1"></div>
  <div class="bar2"></div>
  <div class="bar3"></div>
</div>
<aside class ="menu" id ="hide">
    <form action="top10.php" method="POST">
        <ul class ="menu_acceuil">
            <li  class ="active">     <i class="fas fa-play"></i>
            <input type="submit" name="playlist" value="top 10 des playlists"/>
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
    <?php
    require "include/footer.php"; ?>
