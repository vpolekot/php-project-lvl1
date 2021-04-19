<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const ITERATIONS_COUNT = 3;

/**
 * Function for launching particular game
 * 
 * @param callable $getGameData question and answer from the game
 * @param string   $gameRule    rule of the game
 *
 * @return void
 */
function play(callable $getGameData, string $gameRule): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($gameRule);

    $correctAnswersCount = 0;

    while ($correctAnswersCount <= ITERATIONS_COUNT) {
        if ($correctAnswersCount == ITERATIONS_COUNT) {
            line("Congratulations, {$name}!");
            break;
        }

        ['question' => $question, 'correct_answer' => $correctAnswer] = $getGameData();
        line("Question: {$question}");

        $userAnswer = prompt('Your answer');

        if ($userAnswer != $correctAnswer) {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'");
            line("Let's try again, {$name}!");
            break;
        } else {
            line("Correct!");
            $correctAnswersCount += 1;
        }
    }
}
