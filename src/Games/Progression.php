<?php

namespace Brain\Games\Progression;

use Brain\Games\Engine as Engine;

const MINIMAL_PROGRESSION_LENGTH = 5;
const MAXIMUM_PROGRESSION_LENGTH = 10;

/**
 * Undocumented function
 *
 * @return void
 */
function play(): void
{
    $gameData = function (): array {
        $progression = getProgression();
        $hiddenKey = getHiddenKey($progression);

        return [
            "question" => getQuestion($progression, $hiddenKey),
            "correct_answer" => $progression[$hiddenKey]
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
    return 'What number is missing in the progression?';
}

/**
 * Undocumented function
 *
 * @return array
 */
function getProgression(): array
{
    $firstNumber = rand(1, 10);
    $delta = rand(1, 10);
    $length = rand(MINIMAL_PROGRESSION_LENGTH, MAXIMUM_PROGRESSION_LENGTH);
    $progression = [$firstNumber];
    for ($i = 1; $i <= $length; $i++) {
        $progression[] = $progression[0] + $i * $delta;
    }

    return $progression;
}

/**
 * Undocumented function
 *
 * @param array $progression Progression
 *
 * @return int|string
 */
function getHiddenKey(array $progression): int
{
    return array_rand($progression, 1);
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
    if ($hiddenKey == 0) {
        $space = '.. ';
    } else {
        $space = ' .. ';
    }
    return implode(' ', array_slice($progression, 0, $hiddenKey))
                . $space
                . implode(' ', array_slice($progression, $hiddenKey + 1, count($progression)));
}
