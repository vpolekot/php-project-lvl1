<?php
/**
 * Comments
 * PHP version 7.4
 * 
 * @category Function
 * @package  Brain-GCD
 * @author   author <aaa@email.com>
 * @license  License 
 * @link     http://url.com
 */
namespace Brain\Games\GCD;

use function cli\line;
use function cli\prompt;

/**
 * Undocumented function
 *
 * @return void
 */
function getGameData()
{
    [$number_1, $number_2] = getOperands();

    return [
        "rule" => 'Find the greatest common divisor of given numbers.',
        "question" => "{$number_1} {$number_2}",
        "correct_answer" => getAnswer($number_1, $number_2)
    ];
}

/**
 * Undocumented function
 *
 * @param int $number_1 operand 1
 * @param int $number_2 operand 2
 * 
 * @return void
 */
function getAnswer($number_1, $number_2)
{
    return gmp_gcd($number_1, $number_2);
}

/**
 * Undocumented function
 *
 * @return void
 */
function getOperands()
{
    return [rand(0, 10), rand(0, 10)];
}


/**
 * Undocumented function
 *
 * @return void
 */
function playGCD()
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
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('What is the result of the expression?');
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
    
    $number_1 = rand(0, 10);
    $number_2 = rand(0, 10);

    line("Question: $number_1 $number_2");

    $correct_answer = gmp_gcd($number_1, $number_2);

    
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