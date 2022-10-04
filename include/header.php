
<!DOCTYPE html>
<html lang="en">
<head> 
	<title>allSoundS</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta name="author" content="Dihia BELARBIA-Ahmed BOUZIDIA"/>
	<meta name="Description" content="projet de developpement wab"/>
	<meta name="date" content="22/03/2022"/>
    <link rel="stylesheet" href="styless.css"/>
    <link rel="icon" href="allSoundS.PNG" type="image/png"/>
    <link  rel="stylesheet" href ="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>


    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <script src="http://jpconnexion.free.fr/2012_06/cnx.js"></script>

</head>
<body>
    <header> 
        <form action="search.php" method="POST">
        <label for="mintomaj3"></label>
        <input class="barreRech" name="var" id="mintomaj3" type="text" placeholder="search" />
        </form>
        <ul><li><a href="index.php"> <img class="logo" src="allSoundS.PNG" alt=" logo"/></a></li></ul>
    </header>
    <div class ="menu2">
    <form action="genre.php" method="POST">
        <ul class ="genre">
            <li>
            <input type="submit" name="pop" value="POP" class="inputGenre"/>
            </li>
            <li>
            <input type="submit" name="rock" value="ROCK" class="inputGenre"/>
            </li>
            <li>
            <input type="submit" name="dance" value="DANCE" class="inputGenre"/>
            </li>
            <li>
            <input type="submit" name="R&B" value="R&B" class="inputGenre"/>
            </li>
            <li>
            <input type="submit" name="folk" value="FOLK" class="inputGenre"/>
            </li>
            <li>
            <input type="submit" name="reggae" value="REGGAE" class="inputGenre"/>
            </li>
            <li>
            <input type="submit" name="jazz" value="JAZZ" class="inputGenre"/>
            </li>
        </ul>
    </form>
    </div>