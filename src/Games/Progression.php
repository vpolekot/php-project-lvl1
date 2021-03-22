<?php

namespace Brain\Games\Progression;

use Brain\Games\Engine as Engine;

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
    return array_slice(range(rand(0, 50), 100, rand(1, 10)), 0, 10);
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
