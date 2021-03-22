<?php

namespace Brain\Games\Even;

use Brain\Games\Engine as Engine;

/**
 * Undocumented function
 *
 * @return void
 */
function play()
{
    $gameData = function (): array {
        return [
            "question" => $expression = getNumber(),
            "correct_answer" => getAnswer($expression)
        ];
    };

    Engine\play($gameData, getGameRule());
}

/**
 * Undocumented function
 *
 * @return string rule of the game
 */
function getGameRule()
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}

/**
 * Undocumented function
 *
 * @param int $number number to check
 *
 * @return string
 */
function getAnswer($number)
{
    if ($number % 2 == 0) {
        return "yes";
    } else {
        return "no";
    }
}

/**
 * Undocumented function
 *
 * @return int
 */
function getNumber()
{
    return rand(0, 100);
}
