<?php

namespace Brain\Games\GCD;

use Brain\Games\Engine as Engine;

/**
 * Undocumented function
 *
 * @return void
 */
function play()
{
    $gameData = function (): array {
        [$number1, $number2] = getOperands();

        return [
            "rule" => 'Find the greatest common divisor of given numbers.',
            "question" => "{$number1} {$number2}",
            "correct_answer" => getAnswer($number1, $number2)
        ];
    };

    Engine\play($gameData);
}

/**
 * Undocumented function
 *
 * @param int $number1 operand 1
 * @param int $number2 operand 2
 *
 * @return int
 */
function getAnswer($number1, $number2)
{
    if ($number1 % $number2 != 0) {
        return getAnswer($number2, $number1 % $number2);
    } else {
        return $number2;
    }
}

/**
 * Undocumented function
 *
 * @return array
 */
function getOperands()
{
    return [rand(1, 10), rand(1, 10)];
}
