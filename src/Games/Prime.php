<?php
/**
 * Comments
 * PHP version 7.4
 * 
 * @category Function
 * @package  Brain-Prime
 * @author   author <aaa@email.com>
 * @license  License 
 * @link     http://url.com
 */
namespace Brain\Games\Prime;

use function cli\line;
use function cli\prompt;

/**
 * Undocumented function
 *
 * @return void
 */
function getGameData()
{
    return [
        "rule" => 'Answer "yes" if given number is prime. Otherwise answer "no".',
        "question" => $number = getQuestion(),
        "correct_answer" => getAnswer($number)
    ];
}

/**
 * Undocumented function
 *
 * @param int $number number to check
 * 
 * @return int return 0 if not prime, return 1 if prime 
 */
function getAnswer($number)
{ 
    if ($number == 1) {
        return "no"; 
    }
    for ($i = 2; $i <= $number/2; $i++) { 
        if ($number % $i == 0) {
            return "yes"; 
        }
    } 
    return "no"; 
} 

/**
 * Undocumented function
 *
 * @return void
 */
function getQuestion()
{
    return rand(1, 100);
}

/**
 * Undocumented function
 *
 * @return boolean 
 */
/*function askUser()
{
    $number = rand(1, 100);
    if (primeCheck($number) == 1) {
        $correct_answer = "yes";
    } else {
        $correct_answer = "no";
    }

    $question = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    line($question);
    line("Question: $number");
    //line("Correct answer {$correct_answer}");

    $user_answer = prompt('Your answer');
    if ($user_answer != $correct_answer) {
        line("'{$user_answer}' is wrong answer ;(. Correct answer was '{$correct_answer}'");
        return false;
    } else {
        line("Correct!");
        return true;
    }
}*/

