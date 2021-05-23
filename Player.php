<?php
declare(strict_types=1);

require 'Deck.php';

class Player
{
    private const MAX_SCORE = 21;
    private array $cards;
    private bool $lost = false;

    public function __construct(Deck $deck)
    {
        $this->cards[] = $deck->drawCard();
        $this->cards[] = $deck->drawCard();
    }

    public function hit(Deck $deck)
    {
        $this->cards[] = $deck->drawCard();
        if ($this->getScore() > self::MAX_SCORE) {
            $this->lost = true;
        }
    }

    public function surrender()
    {
        $this->lost = true;
    }

    public function getScore()
    {
        foreach ($this->cards as $card) {
            $score += $card->getValue();
        }
        return $score;

    }

    public function hasLost()
    {
        return $this->lost;
    }
}