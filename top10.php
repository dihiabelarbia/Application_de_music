<?php 
if(isset($_GET['idal'])) setcookie('last_album', $_GET['idal'] , time()+3600*24, '/', '', true, true);
if(isset($_GET['idar'])) setcookie('last_artist', $_GET['idar'] , time()+3600*24, '/', '', true, true); 
if(isset($_GET['idpl'])) setcookie('last_playlist', $_GET['idpl']  , time()+3600*24, '/', '', true, true);

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
        <div class = "wrap2">
    <?php
if (isset($_POST["playlist"]) || isset($_POST["10play"])) {
    $obj = json_decode(file_get_contents("https://api.deezer.com/chart"));
    $data = $obj->playlists->data;
    echo ("<div><h3>TOP 10 PLAYLISTES</h3>");
    echo("<article class='top10'>");
            for ($i = 0;$i <10;$i++){
                echo ("<section class ='griid'>");
                echo ("<ul class='play_bloc'><li ><a href='tracks.php?idpl=".$data[$i]->id."'><img src='".$data[$i]->picture_medium."' alt=' '></a></li>");
                echo("<li class='title'>".$data[$i]->title."</li></ul></section>");
                echo ("</section>");
            }
            echo("</article>");
            echo("</div>");
        }
        if (isset($_POST["album"]) || isset($_POST["10alb"])) {
            $obj = json_decode(file_get_contents("https://api.deezer.com/chart"));
            $data = $obj->albums->data;
            echo ("<div><h3> TOP 10 ALBUMS </h3>");
            echo("<article class='top10'>");
                    for ($i = 0;$i <10;$i++){
                        echo ("<section class ='griid'>");
                        echo ("<ul class='play_bloc'><li ><a href='tracks.php?idal=".$data[$i]->id."'><img src='".$data[$i]->cover_medium."' alt=' '></a></li>");
                        echo("<li class='title'>".$data[$i]->title."</li></ul></section>");
                        echo ("</section>");
                    }
                    echo("</article>");
                    echo("</div>");
                }
                if (isset($_POST["artist"]) || isset($_POST["10art"])) {
                    $obj = json_decode(file_get_contents("https://api.deezer.com/chart"));
                    $data = $obj->artists->data;
                    echo ("<div><h3>TOP 10 ARTISTES </h3>");
                    echo("<article class='top10'>");
                            for ($i = 0;$i <10;$i++){
                                echo ("<section class ='griid'>");
                                echo ("<ul class='play_bloc'><li ><a href='tracks.php?idar=".$data[$i]->id."'><img src='".$data[$i]->picture_medium."' alt=' '></a></li>");
                                echo("<li class='title'>".$data[$i]->name."</li></ul></section>");
                                echo ("</section>");
                            }
                            echo("</article>");
                            echo("</div>");
                        }
                        if (isset($_POST["podcast"]) || isset($_POST["10pod"])) {
                            $obj = json_decode(file_get_contents("https://api.deezer.com/chart"));
                            $data = $obj->podcasts->data;
                            echo ("<div><h3>TOP 10 ARTISTES </h3>");
                            echo("<article class='top10'>");
                                    for ($i = 0;$i <10;$i++){
                                        echo ("<section class ='griid'>");
                                        echo ("<ul class='play_bloc'><li><img src='".$data[$i]->picture_medium."' alt=' '></a></li>");
                                        echo ("<li >".$data[$i]->description."</li></ul>");
                                        echo ("</section>");
                                    }
                                    echo("</article>");
                                    echo("</div>");
                                }
?>
</div>
<?php
    require "include/footer.php"; ?>