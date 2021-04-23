<?php

namespace Brain\Games\Calc;

use Brain\Games\Engine as Engine;
use Exception;

const GAME_RULE = "What is the result of the expression?";

/**
 * Undocumented function
 *
 * @return void
 */
function play(): void
{
    $gameData = function (): array {
        $expression = getExpression();

        return [
            "question" => getQuestion($expression),
            "correct_answer" => getExpressionResult($expression)
        ];
    };

    Engine\play($gameData, GAME_RULE);
}

/**
 * Undocumented function
 *
 * @return array
 */
function getExpression(): array
{
    $operations = ['+', '-', '*'];
    $pickedOperation = $operations[array_rand($operations)];
    $operand1 = rand(0, 10);
    $operand2 = rand(0, 10);

    return [$pickedOperation, $operand1, $operand2];
}

/**
 * Undocumented function
 *
 * @param array $expression expression
 *
 * @return string
 */
function getQuestion(array $expression): string
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
function getExpressionResult(array $expression): int
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
            throw new Exception("Unknown operation: $operation!");
    }
}
