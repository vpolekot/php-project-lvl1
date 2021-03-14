<?php
/**
 * Comments
 * PHP version 7.4
 * 
 * @category Function
 * @package  Brain-Calc
 * @author   author <aaa@email.com>
 * @license  License 
 * @link     http://url.com
 */
namespace Brain\Games\Calc;

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
        "rule" => 'What is the result of the expression?',
        "question" => $number = getNumber(),
        "correct_answer" => isEven($number)
    ];
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
    
    $operations = ['+', '-', '*'];
    $picked_operation = $operations[array_rand($operations, 1)];
    $number_1 = rand(0, 10);
    $number_2 = rand(0, 10);

    switch($picked_operation){
    case '+':
        $correct_answer = $number_1 + $number_2;
        break;
    case '-':
        $correct_answer = $number_1 - $number_2;
        break;
    case '*':
        $correct_answer = $number_1 * $number_2;
        break;
    default:
        break;
    }

    line("Question: {$number_1} {$picked_operation} {$number_2}");
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
