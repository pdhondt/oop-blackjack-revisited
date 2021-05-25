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
$message = "";

if (isset($_GET['hit'])) {
    $deck = $blackjack->getDeck();
    $blackjack->getPlayer()->hit($deck);
    if ($blackjack->getPlayer()->hasLost()) {
        $message = 'Player has lost';
    }
}

if (isset($_GET['stand'])) {
    $deck = $blackjack->getDeck();
    $blackjack->getDealer()->hit($deck);
    if ($blackjack->getDealer()->hasLost() === false) {
        if ($blackjack->getPlayer()->getScore() === $blackjack->getDealer()->getScore()) {
            $message = 'Equal score.  Dealer wins!';
        }
        else if ($blackjack->getPlayer()->getScore() > $blackjack->getDealer()->getScore()) {
            $message = 'Player wins!';
        }
        else {
            $message = 'Dealer wins!';
        }
    }
}

if (isset($_GET['surrender'])) {
    $message = 'Player surrenders.  Dealer wins!';
}

if (isset($_GET['new_game'])) {
    session_destroy();
    $blackjack = new Blackjack();
}

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
        <input type="submit" name="new_game" value="New Game">
    </form>

    <div>
        <h3>Player</h3>
        <p>
            Player score: <?php echo $blackjack->getPlayer()->getScore(); ?>
        </p>
        <p>
            Player cards:
            <?php
            foreach ($blackjack->getPlayer()->getCards() AS $card) {
                echo $card->getUnicodeCharacter(true);
            }
            ?>
        </p>
    </div>

    <div>
        <h3>Dealer</h3>
        <p>
            Dealer score: <?php echo $blackjack->getDealer()->getScore(); ?>
        </p>
        <p>
            Dealer cards:
            <?php
            foreach ($blackjack->getDealer()->getCards() AS $card) {
                echo $card->getUnicodeCharacter(true);
            }
            ?>
        </p>
    </div>

    <div>
        <?php echo $message ?>
    </div>

</body>
</html>




