<?php

namespace Brain\Games\Even;

use Brain\Games\Engine as Engine;

const GAME_RULE = "Answer 'yes' if the number is even, otherwise answer 'no'.";

/**
 *
 * @return void
 */
function play(): void
{
    $gameData = function (): array {
        $expression = getNumber();

        return [
            "question" => $expression,
            "correct_answer" => getAnswer(isEven($expression))
        ];
    };

    Engine\play($gameData, GAME_RULE);
}

/**
 *
 * @param bool $result result of the expression
 *
 * @return string
 */
function getAnswer(bool $result): string
{
    return $result ? "yes" : "no";
}

/**
 *
 * @param int $number number to check
 *
 * @return bool
 */
function isEven(int $number): bool
{
    return $number % 2 == 0;
}

/**
 *
 * @return int
 */
function getNumber(): int
{
    return rand(0, 100);
}
