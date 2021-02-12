<?php
//REMPLISSAGE FORMULAIRE PORTFOLIO
//Vérification que POST n'est pas vide
//Connexion à la base
//require_once "includes/connect.php";


if (!empty($_POST)) {
    //Vérification champs existent et non vide
    if (
        isset($_POST["nom"], $_POST["prenom"], $_POST["email1"], $_POST["email2"], $_POST["sujet"], $_POST["commentaire"], $_POST["rgpd"])
        && !empty($_POST["nom"])
        && !empty($_POST["prenom"])
        && !empty($_POST["email1"])
        && !empty($_POST["email2"])
        && !empty($_POST["sujet"])
        && !empty($_POST["commentaire"])
        && !empty($_POST["rgpd"])
    ) {
        //Formulaire complet
        //Récupération et protection des données
        $nom = strip_tags($_POST["nom"]);
        $prenom = strip_tags($_POST["prenom"]);
        $email1 = $_POST["email1"];
        $email2 = $_POST["email2"];
        $sujet = htmlspecialchars($_POST["sujet"]);
        $commentaire = htmlspecialchars($_POST["commentaire"]);
        var_dump($_POST);
        //Vérification format email
        if (!filter_var($email1, FILTER_VALIDATE_EMAIL)) {
            //Mauvais format
            die("Format email invalide");
        }
        //Vérification 2 email identiques
        if ($email1 != $email2) {
            die("Les deux emails doivent être identiques");
        }

        //Connexion à la base
        require_once "includes/connect.php";
        //Ecriture requête
        // $sql = "INSERT INTO `formulaire`(`nom`, `prenom`, `email`, `sujet`, `message`,`rgpd`) VALUES (nom, prenom, email, sujet, message, 1)";
        $sql = "INSERT INTO `formulaire`(`nom`, `prenom`, `email`, `sujet`, `commentaire`,`rgpd`) VALUES (:nom, :prenom, :email, :sujet, :commentaire, 1)";
        var_dump($sql);
        //Préparation de la requête
        $query = $db->prepare($sql);

        //Injection des paramétres
        $query->bindValue(":nom", $nom, PDO::PARAM_STR);
        $query->bindValue(":prenom", $prenom, PDO::PARAM_STR);
        $query->bindValue(":email", $email1, PDO::PARAM_STR);
        $query->bindValue(":sujet", $sujet, PDO::PARAM_STR);
        $query->bindValue(":commentaire", $commentaire, PDO::PARAM_STR);

        //Exécution de la requête
        if (!$query->execute()) {
            die("Un petit problème est survenu");
        }

        header("Location: projet-blog.php");
    } else {
        die("Le formulaire est incomplet");
    }
}




// EN POO ******Partie HTML**********
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
            <header id="entete"><!-- Entête page-->
                <nav> <!-- Nav site-->
                    <a href="#"><img src="images/logoimage.PNG" alt="logo WebForce3" title="Logo"></a>
                    <ul>
                        <li>
                            <a href="#">Accueil</a>
                        </li>
                        <li>
                            <a href="#">Mes réalisations</a>
                        </li>
                        <li>
                            <a href="#">Mes compétences</a>
                        </li>
                        <li>
                        <a href="#">Me contacter</a> 
                        </li>
                    </ul>
                </nav> 
    
                <Section> <!-- Qui suis-je -->
                    <h1 >Développeur web et web mobile</h1>
                    <h2>Bruno Plonquet</h2>
                    <p>Vos idées prennent forme</p>
                </Section> <!-- Qui suis-je -->
        
                <section> <!-- appel à l'action-->
                        <a href="#">Mes réalisations</a>
                        <a href="#">Me contacter</a>
                </section> <!-- appel à l'action-->
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
                <main> <!-- Corps de la page -->
                <section> <!-- Réalisations -->
                    <h1>Mes Réalisations</h1>
                        <!-- flexbox des articles -->
                        <div>
                            <article> <!--format card-->
                                <img id="image-auteur" src="images/Capture-auteur.PNG" alt="site auteur Bruno">
                                <h3>Site littéraire Auteur</h3>
                                <p>Le p'tit coin de l'auteur</p>
                                <a href="auteur.php">En savoir plus</a>
                            </article>
                            <article> <!--format card-->
                            <img id="image-blog" src="images/capture-blog.PNG" alt="Projet Blog">
                            <h3>Projet Blog</h3>
                            <p>Réalisation et création d'un blog/base de données avec MySql.</p>
                            <a href="projet-blog.php">En savoir plus</a>
                            </article>
                            <article> <!--format card-->
                                <img src="images/500x300.png" alt="image d'attente">
                                <h3>Titre du projet</h3>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                                <a href="#">En savoir plus</a>
                            </article>

                        </div> <!-- flexbox des articles -->
                    <a href="#" id="voirTout">voir tout</a>     
                </section> <!-- Réalisations -->

                <section> <!-- Compétencess -->
                    <h1>Mes compétences</h1>
                        <!-- flexbox -->
                        <div>
                            <article>
                                <h3>Langages</h3> <!--Grid -->
                                <div>
                                    <img src="images/logo html.png" alt="Logo HTML">
                                    <img src="images/logo css.png" alt="Logo CSS">
                                    <img src="images/logo JS.png" alt="Logo JS">
                                    <img src="images/MySQL.png" alt="Logo Mysql">
                                    <img src="images/logo php.png" alt="Logo PHP">
                                    <img src="images/twig-logo.png" alt="Logo Twig">
                                </div>
                            </article><!--Grid -->

                            <article>
                                <h3>Frameworks</h3>
                                <div>
                                    <img src="images/logo bootstrap.jpg" alt="Logo Bootstrap">
                                    <img src="images/logo jquery.jpg" alt="Logo JQuery">
                                    <img src="images/logo angular.jpg" alt="LogoAngular">
                                    <img src="images/logo symphony.png" alt="Logo Symphony">
                                    <img src="images/logo django.jpg" alt="Logo django">
                                </div>
                            </article>
                        </div>
                </section> <!-- Compétencess -->
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
                <h1>Contact</h1>
                    <p>Je reste à votre service pour tous renseignements complémentaires. N'hésitez à me contacter.</p>

                <!-- flexbox -->
                
                    <form method="POST"><!-- Formulaire -->
                    
                        <h2 id="contact">Formulaire de contact </h2>
                        <br>
                        <div>
                        <label for="nom">Nom <span>(obligatoire)</span></label>
                        <input type="text" id="nom" name="nom" required>
                        <br>
                        <label id="labelprenom" for="prenom">Prénom</label>
                        <input type="text" id="prenom" name="prenom">
                        </div>
                        <br>
                        <div>
                        <label for="email1">E-mail <span>(obligatoire)</span></label>
                        <input type="email" id="email1"  name="email1" placeholder="exemple@domaine.fr" aria-placeholder="exemple@domaine.fr" required>
                        <br>
                        <label id="labelemail" for="email2">E-mail de vérification<span>(obligatoire)</span></label>
                        <input type="email" id="email2"  name="email2" placeholder="exemple@domaine.fr" aria-placeholder="exemple@domaine.fr" required>
                        </div>
                        <br>
                        <label for="sujet">Sujet de votre contact</label>
                        <input type="text" id="sujet" name="sujet">
                        <br>
                        <label for="commentaire"></label>

                        <!-- Ne jamais rien écrire entre textarea /textaera sauf en casde près remplissage du formulaire -->
                        <textarea rows="5" cols="70" wrap="physique" name="commentaire" id="commentaire">Ecrivez un commentaire</textarea><br />
                        
                        <br>
                        <input type="checkbox" name="rgpd" id="rgpd" required>
                        <label for="rgpd">J'accepte la collecte de mes données personnelles dans le cadre exclusif de ce formulaire de contact. J'ai bien noté que ces données ne seront pas cédées à des entreprises tierces et seront détruites à l'issue de cette transaction commerciale ou au plus tard au bout de 13 mois.</label>
                        <button type="submit">Envoyer</button>
                    </form> <!-- Formulaire -->
                </div>
                    
                    <article>
                        <h3>Social</h3>
                        
                        
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
                    <p>&copy;2020_2021 - Mon premier blog. Reproduction interdite.</p>     
                    
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
