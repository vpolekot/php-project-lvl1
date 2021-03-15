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
    $gameData = function () {
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
 * @return void
 */
function getAnswer($number_1, $number_2)
{
    return ($number_1 % $number_2) ? getAnswer($number_2, $number_1 % $number_2) : $number_2;
}

/**
 * Undocumented function
 *
 * @return void
 */
function getOperands()
{
    return [rand(1, 10), rand(1, 10)];
}
