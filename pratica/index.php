<?php

ini_set('display_errors','On');
error_reporting(E_ALL);

require_once('biblioteca.php');

use Biblioteca\Libro;
use Biblioteca\DVD;

$l1 = new Libro('Animal Farm', '1945', 'George Orwell');
$l2 = new Libro('I Promessi Sposi', '1882', 'Alessandro Manzoni');
$l3 = new Libro('Il Signore degli Anelli', '1954', 'Tolkien');
$d1 = new DVD('The Big Bang Theory', '2004', 'Registi vari');
$d2 = new DVD('Il Diario di Bridget Jones', '2004', 'Registi Vari');
$d3 = new DVD('La vita di Brian', '1979', 'Registi Vari');

$l2->presta();
$d2->presta();
$d3->presta();

/* $l2->restituisci();
$d2->restituisci();*/

echo '<h3>' . 'Libri n. ' . $l1->contaLibri() . '</h3>';
echo '<h3>' . 'DVD n. ' . $d1->contaDVD() . '</h3>';

echo '<h3>' . 'Materiali n. ' . $l1->getContatoreMateriali() . '</h3>';