<?php 
if(isset($_GET['idal'])) setcookie('last_album', $_GET['idal'] , time()+3600*24, '/', '', true, true);
if(isset($_GET['idar'])) setcookie('last_artist', $_GET['idar'] , time()+3600*24, '/', '', true, true); 
if(isset($_GET['idpl'])) setcookie('last_playlist', $_GET['idpl']  , time()+3600*24, '/', '', true, true);
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
    <section>
        <div class = "wrap5">
            <?
if(isset($_GET['idal'])) {
    $_SESSION["idal"] = $_GET['idal'];
    
    setcookie('last_album', $_GET['idal']);
    $link_api = "https://api.deezer.com/album/".$_GET['idal']."/tracks";
    rechercheMusicAl($link_api);
    
}    
if(isset($_GET['idar'])) {
    $_SESSION["idar"] = $_GET['idar'];
    setcookie('last_artist', $_GET['idar']);
    $link_api = "https://api.deezer.com/artist/".$_GET['idar']."/top?limit=50";
    rechercheMusic($link_api);
}
if(isset($_GET['idpl'])) {
    setcookie('last_playlist', $_GET['idpl']);
    $_SESSION["idpl"] = $_GET['idpl'];
    $link_api = "https://api.deezer.com/playlist/".$_GET['idpl']."/tracks";
    rechercheMusic($link_api);
}
if(isset($_POST["plusdemusic"])) {
    $link_api = "https://api.deezer.com/artist/".$_SESSION['idar']."/top?limit=50";
    plusdemusic($link_api);
}
if(isset($_POST["plusdalbum"])) {
    $link_api = "https://api.deezer.com/album/".$_SESSION['idar']."/tracks";
    plusdemusic($link_api);
}
?>
</div>
</section>
<?php
    require "include/footer.php"; ?>

