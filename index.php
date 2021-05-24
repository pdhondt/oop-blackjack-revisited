<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'Blackjack.php';
require 'Player.php';
require 'Suit.php';
require 'Card.php';
require 'Deck.php';

session_start();

$blackjack = new Blackjack();
$_SESSION['new_game'] = $blackjack;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OOP Blackjack</title>
</head>
<body>

    <button type="button">Hit</button>
    <button type="button">Stand</button>
    <button type="button">Surrender</button>

</body>
</html>




