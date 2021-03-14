<?php
/**
 * Comments
 * PHP version 7.4
 * 
 * @category Function
 * @package  Brain-Even
 * @author   author <aaa@email.com>
 * @license  License 
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
    return [
        "rule" => 'Answer "yes" if the number is even, otherwise answer "no".',
        "question" => $number = getNumber(),
        "correct_answer" => isEven($number)
    ];
}

/**
 * Undocumented function
 *
 * @param int $number number to check
 * 
 * @return boolean
 */
function isEven($number) 
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
function getNumber()
{
    return rand(0, 100);
}

//-------old
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
