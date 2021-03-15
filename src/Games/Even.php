<?php

/**
 * Comments
 * PHP version 7.4
 * 
 * @category Function
 * @package  Brain-Even
 * @author   author <aaa@email.com>
 * @license  http://url.com License
 * @link     http://url.com
 */

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

/**
 * Undocumented function
 *
 * @return void
 */
function getGameData()
{
    $expression = getExpression();

    return [
        "rule" => 'Answer "yes" if the number is even, otherwise answer "no".',
        "question" => $expression,
        "correct_answer" => getAnswer($expression)
    ];
}

/**
 * Undocumented function
 *
 * @param int $number number to check
 * 
 * @return boolean
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
 * @return void
 */
function getExpression()
{
    return rand(0, 100);
}

/**
 * Undocumented function
 *
 * @return void
 */
function playEven()
{
    $name = getUserName();
    countAnswer($name); 
}

/**
 * Undocumented function
 *
 * @return void
 */
function getUserName()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    return $name;
}


/**
 * Undocumented function
 *
 * @param string $username user's name
 * 
 * @return void
 */
function countAnswer($username)
{
    $countCorrectAnswers = 0;

    while ($countCorrectAnswers <= 3) {
        if ($countCorrectAnswers == 3) {
            line("Congratulations, {$username}!");
            break;
        }
        if (askUser($username)) {
            $countCorrectAnswers += 1;
        } else {
            line("Let's try again, {$username}!");
            break;
        }
    }
}

/**
 * Undocumented function
 *
 * @return boolean 
 */
function askUser()
{
    $question_number = rand(0, 100);
    $question_number % 2 == 0 ? $correct_answer = "yes" :  $correct_answer = "no";
    
    line("Question: {$question_number}");
    //line("Correct answer {$correct_answer}");

    $userAnswer = prompt('Your answer');
    if ($userAnswer != $correct_answer) {
        line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correct_answer}'");
        return false;
    } else {
        line("Correct!");
        return true;
    }
}