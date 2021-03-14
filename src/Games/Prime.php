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
 * @return void
 */
function playPrime()
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
}

/**
 * Undocumented function
 *
 * @param int $number number to check
 * 
 * @return int return 0 if not prime, return 1 if prime 
 */
function primeCheck($number)
{ 
    if ($number == 1) {
        return 0; 
    }
    for ($i = 2; $i <= $number/2; $i++) { 
        if ($number % $i == 0) {
            return 0; 
        }
    } 
    return 1; 
} 