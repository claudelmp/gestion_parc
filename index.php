<?php

// Dispatcher principal 
require('common.php');
$action = '';
$title = '';

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
//pas de paramètre on appelle la méthode index du controleur
if ($action == '') {
    $controller->index(); // action du controleur 
} //suivant la valeur de l'action on appelle le dispatcher secondeur demandé
elseif ($action == 'liste') {
    $controller->recherche(""); //action du controleur
} elseif ($action == 'recherche') {
    extract($_POST); // Importe les variables dans la table des symboles. Permet de mettre le contenu de $_POST['addip'] dans la variable $addip
    if (isset($addip)) {
        $controller->recherche($addip); // action du controleur
    } else {
        $controller->recherche(""); // action du controleur
    }
} elseif ($action == 'formulaire_recherche') {
    $controller->formulaire_recherche(); // action du controleur
} elseif ($action == 'liste_salles') {
    $controller->liste_salles();
} else {
    echo "Action erronée";
}
?>