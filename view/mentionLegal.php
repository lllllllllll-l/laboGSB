<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/projetMedocs/view/css/css.css">
        <title> GSB Group </title>
    </head>
<body>

<?php  include "header.php" ?>

<div class="container mt-5">
    <h1 class="text-center mb-5">Mentions Légales, CGU & Politique de Confidentialité</h1>
    <p class="text-muted text-center mb-5">Dernière mise à jour : <?= date('d/m/Y') ?></p>

    <div class="row mb-3">
        <!-- Colonne 1 -->
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-header  text-white">
                    <h4>Éditeur du Site</h4>
                </div>
                <div class="card-body">
                    <p>Ce projet est développé et maintenu par :</p>
                    <ul>
                        <li><strong>BOUKHLIK Abdel</strong></li>
                        <li><strong>SAILLET Rémy</strong></li>
                    </ul>
                    <p>Ce site a pour objectif de fournir des informations sur les médicaments et les activités associées dans un cadre éducatif et non médical.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-header text-white">
                    <h4>Hébergement</h4>
                </div>
                <div class="card-body">
                    <p>Le site est hébergé localement dans le cadre d'un projet PHP.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-header text-white">
                    <h4>Collecte de Données</h4>
                </div>
                <div class="card-body">
                    <p>Les utilisateurs peuvent s'inscrire via un formulaire qui collecte :</p>
                    <ul>
                        <li>Nom et prénom</li>
                        <li>Nom d'utilisateur</li>
                        <li>Mot de passe (haché et salé)</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-header text-white">
                    <h4>Sécurité</h4>
                </div>
                <div class="card-body">
                    <ul>
                        <li>Mots de passe <strong>hachés (avec salage)</strong></li>
                        <li>Protection contre les injections SQL/XSS</li>
                        <li>Utilisation de <code>htmlspecialchars()</code></li>
                        <li>Requêtes préparées (PDO)</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-header text-white">
                    <h4>CGU</h4>
                </div>
                <div class="card-body">
                    <ul>
                        <li>Accès réservé aux utilisateurs inscrits</li>
                        <li>Informations à titre informatif seulement</li>
                        <li>Pas d'avis médical</li>
                        <li>CGU modifiables</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-header text-white">
                    <h4>Base de Données</h4>
                </div>
                <div class="card-body">
                    <p>Structure MySQL avec tables :</p>
                    <ul>
                        <li>Médicaments</li>
                        <li>Activités</li>
                        <li>Utilisateurs</li>
                    </ul>
                </div>
            </div>
        </div>
        
    </div>
</div>

<?php include "footer.php" ?>

</body>
</html>