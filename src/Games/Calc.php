<?php

namespace Brain\Games\Calc;

use Brain\Games\Engine as Engine;

/**
 * Undocumented function
 *
 * @return void
 */
function play()
{
    $gameData = function (): array {
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
 * @return array
 */
function getExpression()
{
    $operations = ['+', '-', '*'];
    $picked_operation = $operations[array_rand($operations, 1)];
    $operand1 = rand(0, 10);
    $operand2 = rand(0, 10);

    return [$picked_operation, $operand1, $operand2];
}

/**
 * Undocumented function
 *
 * @param array $expression expression
 *
 * @return string
 */
function getQuestion($expression)
{
    [$operation, $operand1, $operand2] = $expression;
    return "{$operand1} {$operation} {$operand2}";
}

/**
 * Undocumented function
 *
 * @param array $expression expression
 *
 * @return int
 */
function getAnswer($expression)
{
    [$operation, $operand1, $operand2] = $expression;

    switch ($operation) {
        case '+':
            return $operand1 + $operand2;
        case '-':
            return $operand1 - $operand2;
        case '*':
            return $operand1 * $operand2;
        default:
            print_r('Unknown operation');
            break;
    }

    //return $correctAnswer;
}
