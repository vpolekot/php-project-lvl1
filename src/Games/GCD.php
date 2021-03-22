<?php

namespace Brain\Games\GCD;

use Brain\Games\Engine as Engine;

/**
 * Undocumented function
 *
 * @return void
 */
function play(): void
{
    $gameData = function (): array {
        [$number1, $number2] = getOperands();

        return [
            "question" => "{$number1} {$number2}",
            "correct_answer" => getExpressionResult($number1, $number2)
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
    return "Find the greatest common divisor of given numbers.";
}

/**
 * Undocumented function
 *
 * @param int $number1 operand 1
 * @param int $number2 operand 2
 *
 * @return int
 */
function getExpressionResult(int $number1, int $number2): int
{
    if ($number1 % $number2 != 0) {
        return getExpressionResult($number2, $number1 % $number2);
    } else {
        return $number2;
    }
}

/**
 * Undocumented function
 *
 * @return array
 */
function getOperands(): array
{
    return [rand(1, 10), rand(1, 10)];
}
