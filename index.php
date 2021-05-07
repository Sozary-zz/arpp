<?php

$nameApp = "app";
$action = "home";

if (key_exists("action", $_REQUEST)) {
    $action = $_REQUEST['action'];
}
//Inclure le controlleur et tout ce qui est au corps du site
require_once 'lib/core.php';
require_once $nameApp . '/controller/mainController.php';
session_start();

$context = context::getInstance();
$context->init($nameApp);
//Va sur une page. Fonction "executeAction" dans le dossier lib
$view = $context->executeAction($action, $_REQUEST);

if ($view === false) {
    echo "Une grave erreur s'est produite, il est probable que l'action " . $action . " n'existe pas...";
    die;
} elseif ($view != context::NONE) {
    $template_view = $nameApp . "/view/" . $action . $view . ".php";
    include $nameApp . "/layout/" . $context->getLayout() . ".php";
}
