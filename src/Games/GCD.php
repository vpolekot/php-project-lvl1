<?php

namespace Brain\Games\GCD;

use Brain\Games\Engine as Engine;

const GAME_RULE = "Find the greatest common divisor of given numbers.";

/**
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

    Engine\play($gameData, GAME_RULE);
}

/**
 *
 * @param int $number1 operand 1
 * @param int $number2 operand 2
 *
 * @return int
 */
function getExpressionResult(int $number1, int $number2): int
{
    $remainder = $number1 % $number2;
    if ($remainder == 0) {
        return $number2;
    }
    return getExpressionResult($number2, $remainder);
}

/**
 *
 * @return array
 */
function getOperands(): array
{
    return [rand(1, 10), rand(1, 10)];
}
