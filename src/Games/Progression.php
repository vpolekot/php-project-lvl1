<?php
/**
 * Comments
 * PHP version 7.4
 * 
 * @category Function
 * @package  Brain-Progression
 * @author   author <aaa@email.com>
 * @license  License 
 * @link     http://url.com
 */
namespace Brain\Games\Progression;

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
        "rule" => 'What number is missing in the progression?',
        "question" => getQuestion($expression),
        "correct_answer" => getAnswer($expression)
    ];
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
    [$progression, $hidden_key] = $expression;
    return $progression[$hidden_key];
}

/**
 * Undocumented function
 *
 * @return void
 */
function getExpression()
{
    $progression = array_slice(range(rand(0, 50), 100, rand(1, 10)), 0, 10);
    $hidden_key = rand(0, count($progression)-1);
    return [$progression, $hidden_key];
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
    [$progression, $hidden_key] = $expression;
    return  '[' . implode(' ', array_slice($progression, 0, $hidden_key)) 
                    . ' .. ' 
                    . implode(' ', array_slice($progression, $hidden_key+1, count($progression))) 
                    . ']';
}

/**
 * Undocumented function
 *
 * @return void
 */
function playProgression()
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
    $progression = array_slice(range(rand(0, 50), 100, rand(1, 10)), 0, 10);
    $hidden_key = rand(0, count($progression)-1);
    $correct_answer = $progression[$hidden_key];
    if ($hidden_key == 0) {
        $space = '.. ';
    } else {
        $space = ' .. ';
    }
    $question = ''.implode(' ', array_slice($progression, 0, $hidden_key)) 
                    . ' .. ' 
                    . implode(' ', array_slice($progression, $hidden_key+1, count($progression))) 
                    . '';

    line("Question: $question");
    line("Correct answer {$correct_answer}");

    $user_answer = prompt('Your answer');
    if ($user_answer != $correct_answer) {
        line("'{$user_answer}' is wrong answer ;(. Correct answer was '{$correct_answer}'");
        return false;
    } else {
        line("Correct!");
        return true;
    }
}