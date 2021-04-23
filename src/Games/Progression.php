<?php

namespace Brain\Games\Progression;

use Brain\Games\Engine as Engine;

const MINIMAL_PROGRESSION_LENGTH = 5;
const MAXIMUM_PROGRESSION_LENGTH = 10;
const GAME_RULE = 'What number is missing in the progression?';

/**
 * 
 *
 * @return void
 */
function play(): void
{
    $gameData = function (): array {
        $firstNumber = rand(1, 10);
        $delta = rand(1, 10);
        $length = rand(MINIMAL_PROGRESSION_LENGTH, MAXIMUM_PROGRESSION_LENGTH);
        $progression = getProgression($firstNumber, $delta, $length);
        $hiddenKey = getHiddenKey($progression);

        return [
            "question" => getQuestion($progression, $hiddenKey),
            "correct_answer" => $progression[$hiddenKey]
        ];
    };

    Engine\play($gameData, GAME_RULE);
}

/**
 * Undocumented function
 *
 * @param int $firstNumber first number of an arithmetic progression
 * @param int $delta       common difference of successive members
 * @param int $length      length of progression
 * 
 * @return array
 */
function getProgression($firstNumber, $delta, $length): array
{
    $progression = [$firstNumber];
    for ($i = 1; $i <= $length; $i++) {
        $progression[] = $progression[0] + $i * $delta;
    }

    return $progression;
}

/**
 * Undocumented function
 *
 * @param array $progression arithmetic progression
 *
 * @return int
 */
function getHiddenKey(array $progression): int
{
    return intval(array_rand($progression));
}

/**
 * Undocumented function
 *
 * @param array $progression Progression
 * @param int   $hiddenKey   Hidden key
 *
 * @return string
 */
function getQuestion(array $progression, int $hiddenKey): string
{
    $progression[$hiddenKey] = '..';
    return implode(' ', $progression);
}
