<?php
session_start();
function rechercheMusic($link_api){
    $obj = json_decode(file_get_contents($link_api));
      $data = $obj->data;
      if($obj->total >= 25) {
        $j= 25;
      } else {
        $j= $obj->total;
      }
     for ($i = 0;$i <$j ;$i++){
         echo ("<section>");
         echo ("<ul  class='playl'><li><img class='image' src='".$data[$i]->album->cover_small."' width='50px' height='50px' alt=''/></li>");
        echo ("<span class='info'><ul><li>Titre :".$data[$i]->title."</li>");
        echo ("<li>Artiste :".$data[$i]->artist->name."</li></ul></span>");
        echo ("<li><audio class ='audio' src ='".$data[$i]->preview."' controls/> musique </audio></li></ul>");
        echo ("</section>");
     }
     if($obj->total >= 25) {
      echo("<form action='tracks.php' method='POST'>
      <input type='submit' name='plusdemusic' value='voir plus' style='float:right;'/>
      </form>");
    }
 }
 function rechercheMusicAl($link_api){
  $obj = json_decode(file_get_contents($link_api));
    $data = $obj->data;
    if($obj->total >= 25) {
      $j= 25;
    } else {
      $j= $obj->total;
    }
   for ($i = 0;$i <$j ;$i++){
       echo ("<section>");
       echo ("<ul  class='playl'><li><img class='image' src='allSoundS.PNG' width='50px' height='50px' alt=''/></li>");
      echo ("<span class='info'><ul><li>Titre :".$data[$i]->title."</li>");
      echo ("<li>Artiste :".$data[$i]->artist->name."</li></ul></span>");
      echo ("<li><audio class ='audio' src ='".$data[$i]->preview."' controls/> musique </audio></li></ul>");
      echo ("</section>");
   }
   if($obj->total >= 25) {
    echo("<form action='tracks.php' method='POST'>
    <input type='submit' name='plusdalbum' value='voire plus' style='float:right;'/>
    </form>");
  }
}

 function plusdemusic($link_api){
  $obj = json_decode(file_get_contents($link_api));
  $next = $obj->next;
  $obj1 = json_decode(file_get_contents($next));
      $data = $obj1->data;
   for ($i = 0;$i <25 ;$i++){
       echo ("<section>");
       echo ("<ul  class='playl'><li><img class='image' src='".$data[$i]->album->cover_small."' width='50px' height='50px' alt=''/></li>");
      echo ("<span class='info'><ul><li>Titre :".$data[$i]->title."</li>");
      echo ("<li>Artiste :".$data[$i]->artist->name."</li></ul></span>");
      echo ("<li><audio class ='audio' src ='".$data[$i]->preview."' controls/> musique </audio></li></ul>");
      echo ("</section>");
   }
  }



function acceuil(){
    $obj = json_decode(file_get_contents("https://api.deezer.com/chart"));
    $data = $obj->playlists->data;
    echo ("<article><h3>Playlists for you</h3>");
            for ($i = 0;$i <5;$i++){
                echo ("<section class ='griid'>");
                echo ("<ul class='play_bloc'><li ><a href='tracks.php?idpl=".$data[$i]->id."'><img class='playlist' src='".$data[$i]->picture_medium."' alt=' '/></a></li>");
                echo("<li class='title'>".$data[$i]->title."</li></ul>");
                echo ("</section>");
            }
            echo ("</article>");
    }
    function albums(){
        $obj = json_decode(file_get_contents("https://api.deezer.com/chart"));
        $data = $obj->albums->data;
        echo ("<article><h3>Albums for you</h3>");
                for ($i = 0;$i <5;$i++){
                    echo ("<section class ='griid'>");
                    echo ("<ul class='play_bloc'><li ><a href='tracks.php?idal=".$data[$i]->id."'><img class='playlist' src='".$data[$i]->cover_medium."' alt=' '/></a></li>");
                    echo("<li class='title'>".$data[$i]->title."</li></ul>");
                    echo ("</section>");
                }
                echo ("</article>");
        }
        function artists(){
            $obj = json_decode(file_get_contents("https://api.deezer.com/chart"));
            $data = $obj->artists->data;
            echo ("<article><h3>artists for you</h3>");
                    for ($i = 0;$i <5;$i++){
                        echo ("<section class ='griid'>");
                        echo ("<ul class='play_bloc'><li ><a href='tracks.php?idar=".$data[$i]->id."'><img class='playlist' src='".$data[$i]->picture_medium."' alt=' '/></a></li>");
                        echo("<li class='title'>".$data[$i]->name."</li></ul>");
                        echo ("</section>");
                    }
                    echo ("</article>");
                }
                function podcasts(){
                    $obj = json_decode(file_get_contents("https://api.deezer.com/chart"));
                    $data = $obj->podcasts->data;
                    echo ("<article ><h3>Podcastes for you </h3>");
                    for ($i = 0;$i <5;$i++){
                        echo ("<section class ='griid'>");
                        echo ("<ul class='play_bloc'><li><img class='playlist' src='".$data[$i]->picture_medium."' alt=' '/></li>");
                        echo ("<li >".$data[$i]->description."</li></ul>");
                        echo ("</section>");
                    }
                            echo ("</article>");
                    }

                      
                          function recupAlbum($link_api, $search) {
                            $obj = json_decode(file_get_contents($link_api));
                            $data = $obj->data;
                            echo ("<article class ='rech'><h3>resultat d'Album pour ".$search."</h3>");
                            if($obj->total >= 25) {
                              $j= 25;
                            } else {
                              $j= $obj->total;
                            }
                            for ($i = 0;$i < $j ;$i++){
                              echo ("<section class ='griid'>");
                                echo ("<ul class='play_bloc'><li><a href='tracks.php?idal=".$data[$i]->id."'><img class='playlist' src='".$data[$i]->cover_medium."' alt='cover'/></a></li>");
                                echo("<li class='title'>".$data[$i]->title."</li></ul></section>");
                                echo ("</section>");
                              }
                                      echo ("</article>");
                              }   
                        function recupArtist($link_api,  $search) {
                            $obj = json_decode(file_get_contents($link_api));
                            $data = $obj->data;
                            echo ("<article class='rech'><h3>resultat d'Artiste pour ".$search."</h3>");
                            if($obj->total >= 25) {
                              $j= 25;
                            } else {
                              $j= $obj->total;
                            }
                            for ($i = 0;$i < $j ;$i++){
                              echo ("<section class ='griid'>");
                                echo ("<ul class='play_bloc'><li ><a href='tracks.php?idar=".$data[$i]->id."'><img class='playlist' src='".$data[$i]->picture_medium."' alt='cover'/></a></li>");
                                echo("<li class='title'>".$data[$i]->name."</li></ul></section>");
                                echo ("</section>");
                              }
                                      echo ("</article>");
                              }  
                        function recupPlaylist($link_api,  $search) {
                            $obj = json_decode(file_get_contents($link_api));
                            $data = $obj->data;
                            echo ("<article class='rech'><h3>resultat de playliste pour ".$search."</h3>");
                            if($obj->total >= 25) {
                              $j= 25;

                            } else {
                              $j= $obj->total;
                            }
                            for ($i = 0;$i < $j ;$i++){
                              echo ("<section class ='griid'>");
                                echo ("<ul class='play_bloc'><li ><a href='tracks.php?idpl=".$data[$i]->id."'><img class='playlist' src='".$data[$i]->picture_medium."' alt='cover'/></a></li>");
                                echo("<li class='title'>".$data[$i]->title."</li></ul></section>");
                                echo ("</section>");
                              }
                                      echo ("</article>");
                              }
                        function recupPodcast($link_api,  $search) {
                            $obj = json_decode(file_get_contents($link_api));
                            $data = $obj->data;
                            echo ("<article class='rech'><h3>resultat de podcastes pour ".$search."</h3>");
                            if($obj->total >= 25) {
                              $j= 25;
                
                            } else {
                              $j= $obj->total;
                            }
                            for ($i = 0;$i < $j ;$i++){
                              echo ("<section class ='griid'>");
                                echo ("<ul class='play_bloc'><li ><a href='tracks.php?idpod=".$data[$i]->id."'><img class='playlist' src='".$data[$i]->picture_medium."' alt='cover'/></a></li>");
                                echo ("<li >".$data[$i]->description."</li></ul>");
                                echo ("</section>");
                              }
                                      echo ("</article>");
                              }                                  
/*recherche*/
function recupAlbumS($link_api) {
    $obj = json_decode(file_get_contents($link_api));
    $data = $obj->data;

    for ($i = 0;$i <4;$i++){
      echo ("<section class ='griid'>");
        echo ("<ul class='play_bloc'><li ><img src='".$data[$i]->cover_medium."' alt='cover' class='playlist'/></li>");
        echo("<li class='title'>".$data[$i]->title."</li></ul>");
  }
  echo ("</article>");
}    
function recupArtistS($link_api) {
    $obj = json_decode(file_get_contents($link_api));
    $data = $obj->data;

    for ($i = 0;$i <4;$i++){

        echo ("<section class='griid'><ul><li><img src='".$data[$i]->picture_medium."' alt='cover' /></li>");
        echo("<li class='title'>".$data[$i]->name."</li></ul></section>");
  }
}  
function recupPlaylistS($link_api) {
    $obj = json_decode(file_get_contents($link_api));
    $data = $obj->data;
    for ($i = 0;$i <4;$i++){

        echo ("<section class='griid'><ul><li><img src='".$data[$i]->picture_medium."' alt='cover'/></li>");
        echo("<li class='title'>".$data[$i]->title."</li></ul></section>");
  }
}  
function recupPodcastS($link_api) {
    $obj = json_decode(file_get_contents($link_api));
    $data = $obj->data;
    for ($i = 0;$i <4;$i++){

        echo ("<section class='griid'><ul><img src='".$data[$i]->picture_medium."' alt='cover'/></ul></section>");
  }
}

/*kookies*/
function lastAlbum($link_api) {
  $obj = json_decode(file_get_contents($link_api));
  echo ("<section class='griid'><ul class='play_bloc'><li><a href='tracks.php?idal=".$obj->id."'><img 
  class='playlist' src='".$obj->cover_medium."' alt='cover'/></a></li>");
  echo("<li class='title'>".$obj->title."</li></ul></section>");
}
function lastArtist($link_api) {
  $obj = json_decode(file_get_contents($link_api));
  echo ("<section class='griid'><ul class='play_bloc'><li><a href='tracks.php?idar=".$obj->id."'><img class='playlist'
   src='".$obj->picture_medium."' alt='cover'/></a></li>");
   echo("<li class='title'>".$obj->name."</li></ul></section>");
}
function lastPlaylist($link_api) {
  $obj = json_decode(file_get_contents($link_api));
  echo ("<section class='griid'><ul class='play_bloc'><li><a href='tracks.php?idpl=".$obj->id."'><img class='playlist'
  src='".$obj->picture_medium."' alt='cover'/></a></li>");
  echo("<li class='title'>".$obj->title."</li></ul></section>");
}
function compteur(){
  $monfichier = fopen('compteur.txt', 'r+');
  $pages_vues = fgets($monfichier); // On lit la première ligne (nombre de pages vues)
  $pages_vues++; // On augmente de 1 ce nombre de pages vues
  fseek($monfichier, 0); // On remet le curseur au début du fichier
  fputs($monfichier, $pages_vues); // On écrit le nouveau nombre de pages vues  
  fclose($monfichier);
      echo '<p>Cette page a été vue ' . $pages_vues . ' fois !</p>';
  }
  ?>