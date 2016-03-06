<?php

require_once __DIR__ . '/../vendor/autoload.php';

use ArrayCommands\Flat\RecursiveCommand;
use ArrayCommands\Exception\CommandException;

try{
    $command = new RecursiveCommand();
    $array = [0, [], [], [[], [[]]], [1,2,[3]],4, [5,6,7,[8,[9, 10]]], 11, [12], 13, [14, [15, 16]], [[[[[17, 18, [19]]]]]]];
    $result = $command->execute($array);
    print_r($result);
}catch(CommandException $e){
    print 'Command Exception: ' . $e->getMessage() . PHP_EOL . $e->getTraceAsString();
}