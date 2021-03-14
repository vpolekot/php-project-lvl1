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
    line('Welcome to the Brain Game!');
    $name = getUserName();
    line("Hello, %s!", $name);

    $games = ['Calc', 'Even', 'GCD', 'Prime', 'Progression'];
    $pickedGame = $games[array_rand($games, 1)];


}



/**
 * Undocumented function
 *
 * @return void
 */
function playGamez()
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
    $name = prompt('May I have your name?');
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
    $correctAnswers = 0;
    $iterationsAmount = 3;

    while ($correctAnswers <= $iterationsAmount) {
        if ($correctAnswers == $iterationsAmount) {
            line("Congratulations, {$username}!");
            break;
        }
        if (askUser($username)) {
            $correctAnswers += 1;
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