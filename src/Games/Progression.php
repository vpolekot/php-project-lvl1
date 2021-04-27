<?php

namespace Brain\Games\Progression;

use Brain\Games\Engine as Engine;

const MINIMAL_PROGRESSION_LENGTH = 5;
const MAXIMUM_PROGRESSION_LENGTH = 10;
const GAME_RULE = 'What number is missing in the progression?';

/**
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
 *
 * @param int $firstNumber first number of an arithmetic progression
 * @param int $delta       common difference of successive members
 * @param int $length      length of progression
 *
 * @return array
 */
function getProgression(int $firstNumber, int $delta, int $length): array
{
    $progression = [];
    for ($i = 0; $i < $length; $i++) {
        $progression[] = $firstNumber + $i * $delta;
    }

    return $progression;
}

/**
 *
 * @param array $progression arithmetic progression
 *
 * @return int|string
 */
function getHiddenKey(array $progression): int
{
    return array_rand($progression);
}

/**
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
