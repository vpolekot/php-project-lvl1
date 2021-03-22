<?php

namespace Brain\Games\Prime;

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
            "question" => $number = getNumber(),
            "correct_answer" => getAnswer($number)
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
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

/**
 * Undocumented function
 *
 * @param int $number number to check
 *
 * @return string "no" if not prime, "yes" if prime
 */
function getAnswer($number)
{
    if ($number == 1) {
        return "no";
    }
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            return "no";
        }
    }
    return "yes";
}

/**
 * Undocumented function
 *
 * @return int
 */
function getNumber()
{
    return rand(1, 100);
}
