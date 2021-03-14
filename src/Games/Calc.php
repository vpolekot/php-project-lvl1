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
    $expression = getExpression();
    
    return [
        "rule" => 'What is the result of the expression?',
        "question" => getQuestion($expression),
        "correct_answer" => getAnswer($expression)
    ];
}

/**
 * Undocumented function
 *
 * @return void
 */
function getExpression()
{
    $operations = ['+', '-', '*'];
    $picked_operation = $operations[array_rand($operations, 1)];
    $operand_1 = rand(0, 10);
    $operand_2 = rand(0, 10);
    
    return [$picked_operation, $operand_1, $operand_2];
}

/**
 * Undocumented function
 *
 * @param [type] $expression
 * 
 * @return void
 */
function getQuestion($expression)
{
    [$operation, $operand_1, $operand_2] = getExpression();
    return "{$operand_1} {$operation} {$operand_2}";
}

/**
 * Undocumented function
 *
 * @param [type] $expression
 * 
 * @return void
 */
function getAnswer($expression)
{
    [$operation, $operand_1, $operand_2] = getExpression();

    switch($operation){
    case '+':
            $correctAnswer = $operand_1 + $operand_2;
        break;
    case '-':
            $correctAnswer = $operand_1 - $operand_2;
        break;
    case '*':
            $correctAnswer = $operand_1 * $operand_2;
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
    $operand_1 = rand(0, 10);
    $operand_2 = rand(0, 10);

    switch($picked_operation){
    case '+':
        $$correctAnswer = $operand_1 + $operand_2;
        break;
    case '-':
        $$correctAnswer = $operand_1 - $operand_2;
        break;
    case '*':
        $$correctAnswer = $operand_1 * $operand_2;
        break;
    default:
        break;
    }

    line("Question: {$operand_1} {$picked_operation} {$operand_2}");
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
