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
        return [
            "question" => $number = getNumber(),
            "correct_answer" => getAnswer(getExpressionResult($number))
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
function getExpressionResult(int $number): bool
{
    if ($number == 1) {
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
    if ($result) {
        return "yes";
    } else {
        return "no";
    }
}

/**
 *
 * @return int
 */
function getNumber(): int
{
    return rand(1, 100);
}
