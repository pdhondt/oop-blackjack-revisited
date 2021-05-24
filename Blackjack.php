<?php
declare(strict_types=1);

class Blackjack
{
    private Player $player;
    private Dealer $dealer;
    private Deck $deck;

    public function __construct()
    {
        $this->deck = new Deck();
        $this->player = new Player($this->deck);
        $this->dealer = new Dealer($this->deck);
        $this->deck->shuffle();
    }

    public function getPlayer(): Player
    {

    }

    public function getDealer(): Dealer
    {

    }

    public function getDeck(): Deck
    {

    }

}