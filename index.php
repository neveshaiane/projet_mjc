<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>MJC Abbaye - Base de ressources</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <!-- <link rel="shortcut icon" href="media/favicon.ico" type="media/..."> -->
    </head>
    <body>
        <header>
            <a href="index.php" class="header_bouton"><img id="accueil" src="media/acceuil.png"></a>
            <div id="header_titre">MJC Abbaye - Base de ressources</div>
            <a href="" class="header_bouton"><img id="question" src="media/question.png"></a>
        </header>
        <main>
            <section>
                <div class="ligne_haute">
                    <h2 class="prompt">Quel thème voulez-vous aborder ?</h2>
                    <form method="GET" action="">
                        <input type="text" name="search" placeholder="Rechercher un document ou un thème..." required>
                        <button type="submit">Rechercher</button>
                    </form>
                </div>
                <h1>Thèmes</h1>
                <div class="tuile_section">
                <?php
                    if (isset($_GET['search'])) {
                        $searchTerm = $_GET['search'];
                        include 'php/search_files.php';
                    }
                    ?>
                        <div class="tuile">
                            <h3><i class="fas fa-people-roof"></i>Vie privée</h3>
                            <a href="html/viePrivee/viePrivee_laPresentation/viePrivee_laPresentation.php" class="i_survol">La présentation</a>
                            <a href="html/viePrivee/viePrivee_laFamille/viePrivee_laFamille.php" class="i_survol">La famille</a>
                            <a href="html/viePrivee/viePrivee_laSante/viePrivee_laSante.php" class="i_survol">La santé</a>
                            <a href="html/viePrivee/viePrivee_relationsSociales/viePrivee_relationsSociales.php" class="i_survol">Les relations sociales</a>
                            <a href="html/viePrivee/viePrivee_leQuotidien/viePrivee_leQuotidien.php" class="i_survol">Le quotidien</a>
                            <a href="html/viePrivee/viePrivee_lesSouhaits/viePrivee_lesSouhaits.php" class="i_survol">Les souhaits</a>
                        </div>
                    <div class="tuile">
                        <h3><i class="fas fa-city"></i>Vie publique</h3>
                            <a href="html/viePublique/viePublique_seDeplacer/viePublique_seDeplacer.php" class="i_survol">Se déplacer</a>
                            <a href="html/viePublique/viePublique_lArgent/viePublique_lArgent.php" class="i_survol">L'argent</a>
                            <a href="html/viePublique/viePublique_lesLoisirs/viePublique_lesLoisirs.php" class="i_survol">Les loisirs</a>
                            <a href="html/viePublique/viePublique_lAdministration/viePublique_lAdministration.php" class="i_survol">L'administration</a>
                            <a href="html/viePublique/viePublique_lesAchats/viePublique_lesAchats.php" class="i_survol">Les achats / ventes</a>
                            <a href="html/viePublique/viePublique_leLogement/viePublique_leLogement.php" class="i_survol">Le logement</a>
                            <a href="html/viePublique/viePublique_lesUrgences/viePublique_lesUrgences.php" class="i_survol">Les urgences</a>
                            <a href="html/viePublique/viePublique_tempsEtEspace/viePublique_tempsEtEspace.php" class="i_survol">Le temps et l'espace</a>
                    </div>
                    <div class="tuile">
                        <h3><i class="fas fa-landmark"></i>Vie culturelle</h3>
                            <a href="html/vieCulturelle/vieCulturelle_laFranceEtMonPays/vieCulturelle_laFranceEtMonPays.php" class="i_survol">La France et mon pays</a>
                            <a href="html/vieCulturelle/vieCulturelle_lesCodesSociauxPolitesse/vieCulturelle_lesCodesSociauxPolitesse.php" class="i_survol">Les codes sociaux et la politesse</a>
                            <a href="html/vieCulturelle/vieCulturelle_lAmour/vieCulturelle_lAmour.php" class="i_survol">L'amour</a>
                            <a href="html/vieCulturelle/vieCulturelle_laCuisine/vieCulturelle_laCuisine.php" class="i_survol">La cuisine</a>
                            <a href="html/vieCulturelle/vieCulturelle_lesMusees/vieCulturelle_lesMusees.php" class="i_survol">Les musées</a>    
                    </div>
                    <div class="tuile">
                        <h3><i class="fas fa-briefcase"></i>Vie professionnelle</h3>
                        <a href="html/vieProfessionnelle/vieProfessionnelle_chercherTravail/vieProfessionnelle_chercherTravail.php" class="i_survol">Chercher du travail</a>
                        <a href="html/vieProfessionnelle/vieProfessionnelle_comprendreMondeDuTravail/vieProfessionnelle_comprendreMondeDuTravail.php" class="i_survol">Comprendre le monde du travail</a>
                    </div>
                    <div class="tuile">
                        <h3><i class=" fa fa-scale-balanced"></i>Vie citoyenne</h3>
                        <a href="html/vieCitoyenne/vieCitoyenne_lEcole/vieCitoyenne_lEcole.php" class="i_survol">Le système scolaire</a>
                        <a href="html/vieCitoyenne/vieCitoyenne_leCodeDeLaRoute/vieCitoyenne_leCodeDeLaRoute.php" class="i_survol">Le code de la route</a>
                        <a href="html/vieCitoyenne/vieCitoyenne_lesMedias/vieCitoyenne_lesMedias.php" class="i_survol">Les médias et les réseaux sociaux</a>
                        <a href="html/vieCitoyenne/vieCitoyenne_lEcologie/vieCitoyenne_lEcologie.php" class="i_survol">L'écologie</a>
                        <a href="html/vieCitoyenne/vieCitoyenne_leBenevolat/vieCitoyenne_leBenevolat.php" class="i_survol">Le bénévolat</a>
                    </div>
                    <div class="tuile">
                        <h3><i class="fas fa-box-archive"></i>Autres</h3>
                        <a href="html/autres/autres_livretsFormateurs/autres_livretsFormateurs.php" class="i_survol">Guides et livrets pour les formateurs</a>
                        <a href="html/autres/autres_naturalisation/autres_naturalisation.php" class="i_survol">Documents pour la naturalisation</a>     
                    </div>
                </div>
                <br>
            </section>
        </main>

        <script src="javascript/script.js"></script>
    </body>
</html>