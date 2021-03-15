<?php

/**
 * Comments
 * PHP version 7.4
 *
 * @category Function
 * @package  Brain-Games
 * @author   author <aaa@email.com>
 * @license  License 
 * @link     http://url.com
 */

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

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
}
