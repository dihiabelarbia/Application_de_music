<?php
function rechercheMusic($link_api){
   //$link_api = "https://api.deezer.com/search?q=".$str;
   $obj = json_decode(file_get_contents($link_api));
   if($obj->total != 0){
     $data = $obj->data;
    for ($i = 0;$i <15;$i++){
        echo ("<section>");
        echo ("<ul  class='playl'><li><img class='image' src='".$data[$i]->album->cover_small."' width='50px' height='50px' alt=''/></li>");
       echo ("<span class='info'><ul><li>Titre :".$data[$i]->title."</li>");
       echo ("<li>Artiste :".$data[$i]->artist->name."</li></ul></span>");
       echo ("<li><audio class ='audio' src ='".$data[$i]->preview."' controls/> musique </audio></li></ul>");
       echo ("</section>");
    }
   }else {
       echo "<p> aucun resultat</p>";
   }
}
function affichePlaylist($link_api){
  $obj = json_decode(file_get_contents($link_api));
  if($obj->total != 0){
    $data = $obj->data;
   for ($i = 0;$i <25;$i++){
       echo ("<section>");
       echo ("<ul  class='playl'><li><img class='image' src='".$data[$i]->picture."' width='50px' height='50px' alt=''/></li>");
      echo ("<span class='info'><ul><li>Titre :".$data[$i]->title."</li>");

      echo ("</section>");
   }
  }else {
      echo "<p> aucun resultat</p>";
  }
}

function rechercheArtist($link_api){
    $obj = json_decode(file_get_contents($link_api));
    if($obj->total != 0){
        $data = $obj->data;
        for ($i = 0;$i <25;$i++){
            $id = $data[$i]->id;
            echo($id);
            $link_api1= "https://api.deezer.com/artist/".$id;
            echo($link_api1);
            $obj2 = json_decode(file_get_contents($link_api1));
            echo (file_get_contents($link_api1));
            echo ("<section>");
           echo ("<span class='info'><ul><li>Titre :".$obj2->name."</li>");
           echo ("<li><a href =".$obj2->link.">link :</a></li></ul></span>");
           echo ("</section>");
            }  
        
       }
       else {
           echo "<p> aucun resultat</p>";
       }   
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
function randImage(){
  //On indique le dossier images
  $chem_img = "./images";
  //On ouvre le dossier images
  $handle  = opendir($chem_img);
  
  //On parcoure chaque élément du dossier
  while ($file = readdir($handle))
    {
      //Si les fichiers sont des images
      if(preg_match ("!(\.jpg|\.jpeg|\.gif|\.bmp|\.png)$!i", $file))
        {
          $listef[] = $file;
        }
    }
  
  $random_img = rand(0, count($listef)-1); //permet de prendre une image totalement au hasard (RANDom) parmi toutes les images trouvées.
  echo('<style> body {
  background-image: url('.$chem_img."/".$listef[$random_img].');
  background-size: cover;}</style>');
  echo ($listef[$random_img].'<br>');
  
  //echo "<img src=\"".$chem_img."/".$listef[$random_img]."\" alt=\"".$listef[$random_img]."\" />";

  closedir($handle);
    }

    function recupAlbum() {
      $obj = json_decode(file_get_contents("https://api.deezer.com/search/album?q=eminem"));
      $data = $obj->data;
      for ($i = 0;$i <25;$i++){
          $album= $data[$i]->album;
          echo ('<section><ul onclick="rechercheMusic($album->tracklist)"><img src='".$album->cover."' alt="cover"/></ul></section>');
    }
  }
?>

</span class ="compteur">
        <?php
            echo(compteur());
            ?>
    </span> 
    <span class="cookies">
        <?php
            echo(randImage());
            echo('votre derniere recherche est :'.htmlspecialchars($_COOKIE['var']));
            ?>
    </span>

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
function artist(link_api){
    const box = document.querySelector('.wrap');
        var echo = cnx().ajax.phpPostSyn("functions.php", "rechercheMusic", link_api);
        box.innerHTML = echo ;
        alert("izan");
}
</script>