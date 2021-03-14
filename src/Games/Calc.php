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
    [$operation, $number_1, $number_2] = getExpressionData();
    
    return [
        "rule" => 'What is the result of the expression?',
        "question" => "{$number_1} {$operation} {$number_2}",
        "correct_answer" => getAnswer($operation, $number_1, $number_2)
    ];
}

/**
 * Undocumented function
 *
 * @return void
 */
function getExpressionData()
{
    $operations = ['+', '-', '*'];
    $picked_operation = $operations[array_rand($operations, 1)];
    $number_1 = rand(0, 10);
    $number_2 = rand(0, 10);
    
    return [$picked_operation, $number_1, $number_2];
}

/**
 * Undocumented function
 *
 * @param string $operation operation to do
 * @param int    $number_1  operand 1
 * @param int    $number_2  operand 2
 * 
 * @return void
 */
function getAnswer($operation, $number_1, $number_2)
{
    switch($operation){
    case '+':
            $correctAnswer = $number_1 + $number_2;
        break;
    case '-':
            $correctAnswer = $number_1 - $number_2;
        break;
    case '*':
            $correctAnswer = $number_1 * $number_2;
        break;
    default:
        break;
    }
    
    return $correctAnswer;
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
        $$correctAnswer = $number_1 + $number_2;
        break;
    case '-':
        $$correctAnswer = $number_1 - $number_2;
        break;
    case '*':
        $$correctAnswer = $number_1 * $number_2;
        break;
    default:
        break;
    }

    line("Question: {$number_1} {$picked_operation} {$number_2}");
    //line("Correct answer {$$correctAnswer}");

    $user_answer = prompt('Your answer');
    if ($user_answer != $$correctAnswer) {
        line("'{$user_answer}' is wrong answer ;(. Correct answer was '{$$correctAnswer}'");
        return false;
    } else {
        line("Correct!");
        return true;
    }
}
