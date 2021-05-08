<?php

namespace Brain\Games\Prime;

use Brain\Games\Engine as Engine;

const GAME_RULE = 'Answer "yes" if given number is prime. Otherwise answer "no".';

/**
 *
 * @return void
 */
function play(): void
{
    $gameData = function (): array {
        $number = getNumber();
        return [
            "question" => $number,
            "correct_answer" => getAnswer(isPrime($number))
        ];
    };

    Engine\play($gameData, GAME_RULE);
}

/**
 *
 * @param int $number number to check
 *
 * @return bool false if not prime, true if prime
 */
function isPrime(int $number): bool
{
    if ($number <= 1) {
        return false;
    }
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}

/**
 *
 * @param bool $result result of
 *
 * @return string "no" if not prime, "yes" if prime
 */
function getAnswer(bool $result): string
{
    return $result ? "yes" : "no";
}

/**
 *
 * @return int
 */
function getNumber(): int
{
    return rand(1, 100);
}
