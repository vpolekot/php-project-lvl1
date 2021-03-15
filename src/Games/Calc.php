<?php

/**
 * Comments
 * PHP version 7.4
 *
 * @category Function
 * @package  Brain-Calc
 * @author   author <aaa@email.com>
 * @license  http://url.com License
 * @link     http://url.com
 */

namespace Brain\Games\Calc;

use Brain\Games\Engine as Engine;

/**
 * Undocumented function
 *
 * @return void
 */
function playCalc()
{
    $gameData = function () {
        $expression = getExpression();

        return [
            "rule" => 'What is the result of the expression?',
            "question" => getQuestion($expression),
            "correct_answer" => getAnswer($expression)
        ];
    };

    Engine\play($gameData);
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
 * @param [type] $expression expression
 *
 * @return void
 */
function getQuestion($expression)
{
    [$operation, $operand_1, $operand_2] = $expression;
    return "{$operand_1} {$operation} {$operand_2}";
}

/**
 * Undocumented function
 *
 * @param [type] $expression expression
 *
 * @return void
 */
function getAnswer($expression)
{
    [$operation, $operand_1, $operand_2] = $expression;

    switch ($operation) {
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
