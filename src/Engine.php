<?php

/**
 * Comments
 * PHP version 7.4
 *
 * @category Function
 * @package  Engine
 * @author   author <aaa@email.com>
 * @license  http://url.com License
 * @link     http://url.com
 */

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

/**
 * Undocumented function
 *
 * @param callback-function $gameData data
 *
 * @return void
 */
function play($gameData)
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    ['rule' => $rule] = $gameData();
    line($rule);

    $countCorrectAnswers = 0;
    define("ITERATIONS_AMOUNT", 3);

    while ($countCorrectAnswers <= ITERATIONS_AMOUNT) {
        if ($countCorrectAnswers == ITERATIONS_AMOUNT) {
            line("Congratulations, {$name}!");
            break;
        }

        ['question' => $question, 'correct_answer' => $correctAnswer] = $gameData();
        line("Question: {$question}");
        line("Correct answer: {$correctAnswer}");

        $userAnswer = prompt('Your answer');

        if ($userAnswer != $correctAnswer) {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'");
            line("Let's try again, {$name}!");
            break;
        } else {
            line("Correct!");
            $countCorrectAnswers += 1;
        }
    }
}
