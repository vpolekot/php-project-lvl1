<?php

namespace Brain\Games\Progression;

use Brain\Games\Engine as Engine;

/**
 * Undocumented function
 *
 * @return void
 */
function play()
{
    $gameData = function (): array {
        $progression = getProgression();
        $hiddenKey = getHiddenKey($progression);

        return [
            "rule" => 'What number is missing in the progression?',
            "question" => getQuestion($progression, $hiddenKey),
            "correct_answer" => $progression[$hiddenKey]
        ];
    };

    Engine\play($gameData);
}

/**
 * Undocumented function
 *
 * @return array
 */
function getProgression()
{
    return array_slice(range(rand(0, 50), 100, rand(1, 10)), 0, 10);
}

/**
 * Undocumented function
 *
 * @param array $progression Progression
 *
 * @return int
 */
function getHiddenKey($progression)
{
    return rand(0, count($progression) - 1);
}

/**
 * Undocumented function
 *
 * @param array $progression Progression
 * @param int   $hiddenKey   Hidden key
 *
 * @return string
 */
function getQuestion($progression, $hiddenKey)
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
