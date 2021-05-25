<?php
declare(strict_types=1);

class Dealer extends Player
{
    private const DRAW_UNTIL = 15;

    public function hit(Deck $deck): void {
        while ($this->getScore() < self::DRAW_UNTIL) {
            parent::hit($deck);
        }
    }
}