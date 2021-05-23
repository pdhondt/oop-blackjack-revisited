<?php
declare(strict_types=1);

require 'Blackjack.php';
require 'Card.php';
require 'Deck.php';
require 'Player.php';
require 'Suit.php';

session_start();

$blackjack = new Blackjack();
$_SESSION['new_game'] = $blackjack;



