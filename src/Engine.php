<?php
/**
 * Comments
 * PHP version 7.4
 * 
 * @category Function
 * @package  Engine
 * @author   author <aaa@email.com>
 * @license  License 
 * @link     http://url.com
 */
namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Even\getGameData;
/**
 * Undocumented function
 *
 * @return void
 */
function playGame()
{
    /*line('Welcome to the Brain Game!');
    $name = getUserName();
    line("Hello, %s!", $name);

    $game = pickGame();*/
    

    $name = 'name';
    $game = 'Even';

    ['rule' => $rule] = getGameData();
    line($rule);

    $countCorrectAnswers = 0;
    $iterationsAmount = 3;

    while ($countCorrectAnswers <= $iterationsAmount) {
        if ($countCorrectAnswers == $iterationsAmount) {
            line("Congratulations, {$name}!");
            break;
        }

        ['question' => $question, 'correct_answer' => $correctAnswer] = getGameData();

        line("Question: {$question}");
        line("Correct answer: {$correctAnswer}");

        $user_answer = prompt('Your answer');

        if ($user_answer != $correctAnswer) {
            line("'{$user_answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'");
            line("Let's try again, {$name}!");
            break;
        } else {
            line("Correct!");
            $countCorrectAnswers += 1;
        }
    }

}

/**
 * Undocumented function
 *
 * @return void
 */
function pickGame()
{
    $directory = 'src/Games/';
    $scannedDirectory = array_diff(scandir($directory), array('..', '.'));
    $pickedGame = $scannedDirectory[array_rand($scannedDirectory, 1)];
    //$pickedGame = 'Even';

    print_r(basename($pickedGame, '.php')."\n");
    return $pickedGame;
}

/**
 * Undocumented function
 *
 * @return void
 */
function playGamez()
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
    $name = prompt('May I have your name?');
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
    $countCorrectAnswers = 0;
    $iterationsAmount = 3;

    while ($countCorrectAnswers <= $iterationsAmount) {
        if ($countCorrectAnswers == $iterationsAmount) {
            line("Congratulations, {$username}!");
            break;
        }
        if (askUser($username)) {
            $countCorrectAnswers += 1;
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
    $question_number = rand(0, 100);
    $question_number % 2 == 0 ? $correct_answer = "yes" :  $correct_answer = "no";
    
    line("Question: {$question_number}");
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