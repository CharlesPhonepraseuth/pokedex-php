<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Reset.css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" integrity="sha256-gvEnj2axkqIj4wbYhPjbWV7zttgpzBVEgHub9AAZQD4=" crossorigin="anonymous" />
        <!-- Font from Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">
        <!-- CSS Maison -->
        <link rel="stylesheet" href="/public/css/style.css">
        <title><?= $title ?></title>
    </head>
    <body>
        <header>
            <nav>
                <a href="/accueil?page=1&number=20" id="home">Pokedex</a>
                <div class="navbar">
                    <form action="/search" method="post">
                        <input type="text" name="nom" >
                        <input type="submit" value="Chercher">
                    </form>
                    <div class="link">
                        <a href="/accueil?page=1&number=20">Liste</a>
                        <a href="/types">Types</a>
                        <a href="/team">Mon Équipe</a>
                    </div>
                </div>
            </nav>
        </header>
        <main>

            <?= $content ?>
            
    </body>
</html>