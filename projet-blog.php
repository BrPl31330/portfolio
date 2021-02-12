<?php
class Header
{
    // METHODE MAGIQUE __toString
    function __toString()
    {
        return <<<x
        <!DOCTYPE html>
        <html lang="fr">
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mon portfolio</title>
        
        <!-- Normalize doit TOUJOURS être le PREMIER -->
        <!-- <link rel="stylesheet" href="css/normalize.css"> -->
    
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
        <!-- Votre fichier CSS doit TOUJOURS être le DERNIER -->
        <link rel="stylesheet" href="CSS/style.css">
        </head>
            <body>
            <header><!-- Entête page-->
                <nav> <!-- Nav site-->
                    <a href="#"><img src="images/logo.jpg" alt="logo WebForce3" title="Logo"></a>
                    <ul>
                        <li>
                            <a href="index.php">Accueil</a>
                        </li>
                        <li>
                            <a href="#">lien 1</a>
                        </li>
                        <li>
                            <a href="#">Lien 2</a>
                        </li>
                        <li>
                        <a href="#">Lien 3</a> 
                        </li>
                    </ul>
                </nav> 
            </header>
        
        x;
    }
}

class Main
{
    // METHODE MAGIQUE __toString
    function __toString()
    {
        return <<<x
                <main>
                <p><img id="banniere" src="images/banniere.jpg" alt="image bannière"></p>
                <section>
                     <h1></h1>
                        <div>
                            <article>
                                <img id="capture-blog1" src="images/Capture-blog1.PNG" alt="image d'attente">
                                <br>
                                <h3>Réalisation et création d'un site de blog,</h3>
                                <div id="projet-blog">
                                <p>Ainsi que d'une base de données avec MySql. Il s'agit d'une application pour poster des articles avec photo. Chaques personnes inscrites à la possibilité de poster, commenter et laisser son avis, qui apparait sous l'article en question avec le nom de l'auteur, la date et l'heure.</p>
                                <p>Tout au long de ces cours nous avons appris à : </p>
                                <p> - Nous servir des bases de données,</p>
                                <p> - Gérer des inscriptions, </p> 
                                <p> - Gérer l'administration du blog, </p>
                                <p> - Les pages de profil, </p>
                                <p> - La sécurité des données.</p>
                                </div>
                            </article>
                        </div>    
                </section>

                <section>
                    <h1>Compétences utilisées</h1>
                        <div>
                            <article>
                            <h3>Compétences</h3>
                                <div>
                                <img src="images/logo html.png" alt="Logo HTML">
                                <img src="images/logo css.png" alt="Logo CSS">
                                <img src="images/MySQL.png" alt="Logo Mysql">
                                <img src="images/logo php.png" alt="Logo PHP">
                                </div>
                            </article><!--Grid -->

                            <article>
                                <h3>Frameworks</h3>
                                <div>
                                <img src="images/logo bootstrap.jpg" alt="Logo Bootstrap">   
                                </div>
                            </article>
                        </div>
                </section> 
            </main>
        x;
    }
}

class Footer
{
    // METHODE MAGIQUE __toString
    function __toString()
    {
        return <<<x
                <footer> <!-- Pied de page -->
                

                <!-- flexbox -->
                    <div>

                        <h3>Social</h3>
                        <article id="contact">
                        <ul>
                            <li>
                                <a href="https://facebook.com"><i class="lab la-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="https://twitter.com"><i class="lab la-twitter"></i></a>
                            </li>
                            <li>
                                <a href="https://linkedIn.com"><i class="lab la-linkedin-in"></i></a>
                            </li>
                            <li>
                                <a href="https://Github.com"><i class="lab la-github"></i></a>
                            </li>
                            <li>
                                <a href="https://instagram.com"><i class="lab la-instagram"></i></a>
                            </li>
                        </ul>
                        </article> 
                    </div> <!-- flexbox -->
                <p></p>
                <p>&copy;2020_2021 - Mon premier blog. Reproduction interdite.  Projet réaliser lors des cours WebForce3 Toulouse</p>
                
            </footer>
        x;
    }
}

// JE CREE LES OBJETS
$header     = new Header;
$section    = new Main;
$footer     = new Footer;

// AVEC __toString JE PEUX UTILISER UN OBJET COMME UN TEXTE
// ECRITURE PLUS LISIBLE AVEC HEREDOC
echo
<<<x
$header
$section
$footer
x;
