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
    $operand_1 = rand(0, 10);
    $operand_2 = rand(0, 10);

    return [$picked_operation, $operand_1, $operand_2];
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
    [$operation, $operand_1, $operand_2] = $expression;
    return "{$operand_1} {$operation} {$operand_2}";
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
            $correctAnswer = 0;
            break;
    }

    return $correctAnswer;
}
