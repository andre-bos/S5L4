<?php

ini_set('display_errors','On');
error_reporting(E_ALL);

include_once 'classes/User.php';

use User\Admin as AD;

$admin = new AD('Rocco', 'Melocchio', 'Roma', 'rocky', 'rocco@rocco.it', 'aszxy39', 'BSCNR88SD4323');
//echo "<p>" . \User\Admin::getUserCount() . "</p>";

use User\Guest as G;

$guest = new G('tino95', 'tino@tino.it', 'asz890', 'Tino');
echo "<p>" . User\Guest::getUserCount() . "</p>";

use User\RegisteredUser as RU;

$ru = new RU('Romano', 'Romani', 'Roma', 'romy', 'romy@romy.it', '90x3sa0');

echo "<h1>User Info: " . $ru->getInfo() . "</h1>";
echo "<h1>Admin Info: " . $admin->getInfo() . "</h1>";
echo "<h1>Guest Info: " . $guest->getInfo() . "</h1>";
echo "<h1>Registered User Info: " . $ru->getInfo() . "</h1>";

interface Navigatore {
    function avviaNavigatore();
    function spegniNavigatore();
    function impostaMappa();
    function aggiornaNavigatore();
}
class Auto implements Navigatore {
    function avviaNavigatore() {
        return "Navigatore avviato!";
    }
    function spegniNavigatore() {
        return "Navigatore spento!";
    }
    function impostaMappa() {
        return "Mappa impostata!";
    }
    function aggiornaNavigatore() {
        return "Navigatore aggiornato!";
    }
}

class Smartphone implements Navigatore {
    function avviaNavigatore() {

    }
    function spegniNavigatore() {}
    function impostaMappa() {}
    function aggiornaNavigatore() {}

}

class Tablet implements Navigatore {
    function avviaNavigatore() {}
    function spegniNavigatore() {}
    function impostaMappa() {}
    function aggiornaNavigatore() {}

}

$auto = new Auto();
$sm = new Smartphone();
$tablet = new Tablet();