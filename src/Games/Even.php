<?php

namespace Brain\Games\Even;

use Brain\Games\Engine as Engine;

/**
 * Undocumented function
 *
 * @return void
 */
function play(): void
{
    $gameData = function (): array {
        return [
            "question" => $expression = getNumber(),
            "correct_answer" => getAnswer(getExpressionResult($expression))
        ];
    };

    Engine\play($gameData, getGameRule());
}

/**
 * Undocumented function
 *
 * @return string rule of the game
 */
function getGameRule(): string
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}

/**
 * Undocumented function
 *
 * @param bool $result result of the expression
 *
 * @return string
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
 * Undocumented function
 *
 * @param int $number number to check
 *
 * @return bool
 */
function getExpressionResult(int $number): bool
{
    if ($number % 2 == 0) {
        return true;
    } else {
        return false;
    }
}

/**
 * Undocumented function
 *
 * @return int
 */
function getNumber(): int
{
    return rand(0, 100);
}
