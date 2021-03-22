<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const ITERATIONS_AMOUNT = 3;

/**
 * Undocumented function
 *
 * @param callable $gameData question and answer from the game
 * @param string   $gameRule rule of the game

 * @return void
 */
function play(callable $gameData, string $gameRule): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($gameRule);

    $correctAnswersCount = 0;

    while ($correctAnswersCount <= ITERATIONS_AMOUNT) {
        if ($correctAnswersCount == ITERATIONS_AMOUNT) {
            line("Congratulations, {$name}!");
            break;
        }

        ['question' => $question, 'correct_answer' => $correctAnswer] = $gameData();
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
