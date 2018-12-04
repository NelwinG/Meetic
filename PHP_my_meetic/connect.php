<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <script src="main.js"></script>
</head>
<body>
    <header>
        <img class="logo" src="img/MEETIC.png" alt="logo du site">
    </header>
    <div class="inscription"> 
           
        <form action="process_connect.php" method="POST">
            <label class="label" for="pseudo">Votre email :</label>
            <input class="form-control control" type="email"  id="pseudo" name="EMAIL" required />
            <br />
            <label class="label" for="pass">Votre mot de passe :</label>
            <input class="form-control control" type="password"  id="pass" name="PASSWORD" required />

            <button class="btn btn-outline-success my-2 my-sm-0 button" type="submit">Se connecter</button>

            </form>
        </div>


        <a href="http://localhost/PHP_my_meetic/subscribe.html"><button class="btn btn-outline-success my-2 my-sm-0 topbutton" type="submit">S'inscrire</button></a>   
    </body>
    </html>
    
