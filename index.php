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
require 'Dealer.php';

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

    <form method="get">
        <input type="submit" name="hit" value="Hit">
        <input type="submit" name="stand" value="Stand">
        <input type="submit" name="surrender" value="Surrender">
    </form>

</body>
</html>




