<?php
/**
 * Comments
 * PHP version 7.4
 * 
 * @category Function
 * @package  Engine
 * @author   author <aaa@email.com>
 * @license  License 
 * @link     http://url.com
 */
namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

/**
 * Undocumented function
 *
 * @return void
 */
function playGame()
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
    $count_correct_answers = 0;

    while ($count_correct_answers <= 3) {
        if ($count_correct_answers == 3) {
            line("Congratulations, {$username}!");
            break;
        }
        if (askUser($username)) {
            $count_correct_answers += 1;
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

    $user_answer = prompt('Your answer');
    if ($user_answer != $correct_answer) {
        line("'{$user_answer}' is wrong answer ;(. Correct answer was '{$correct_answer}'");
        return false;
    } else {
        line("Correct!");
        return true;
    }
}