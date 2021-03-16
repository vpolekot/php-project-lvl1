<?php

/**
 * Comments
 * PHP version 7.4
 *
 * @category Function
 * @package  Brain-GCD
 * @author   author <aaa@email.com>
 * @license  http://url.com License
 * @link     http://url.com
 */

namespace Brain\Games\GCD;

use Brain\Games\Engine as Engine;

/**
 * Undocumented function
 *
 * @return void
 */
function playGCD()
{
    $gameData = function (): array {
        [$number_1, $number_2] = getOperands();

        return [
            "rule" => 'Find the greatest common divisor of given numbers.',
            "question" => "{$number_1} {$number_2}",
            "correct_answer" => getAnswer($number_1, $number_2)
        ];
    };

    Engine\play($gameData);
}

/**
 * Undocumented function
 *
 * @param int $number_1 operand 1
 * @param int $number_2 operand 2
 *
 * @return int
 */
function getAnswer($number_1, $number_2)
{
    if ($number_1 % $number_2 != 0) {
        return getAnswer($number_2, $number_1 % $number_2);
    } else {
        return $number_2;
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
