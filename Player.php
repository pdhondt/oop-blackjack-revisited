<?php
declare(strict_types=1);

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

    public function hit(Deck $deck): void
    {
        $this->cards[] = $deck->drawCard();
        if ($this->getScore() > self::MAX_SCORE) {
            $this->lost = true;
        }
    }

    public function surrender(): bool
    {
        $this->lost = true;
    }

    public function getScore(): int
    {
        $score = 0;
        foreach ($this->cards as $card) {
            $score += $card->getValue();
        }
        return $score;

    }

    public function hasLost(): bool
    {
        return $this->lost;
    }

    public function getCards(): array
    {
        return $this->cards;
    }
}