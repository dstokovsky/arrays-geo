<?php

define('METERS_IN_KILOMETER', 1000);
define('INTERCOM_LATITUDE', 53.3381985);
define('INTERCOM_LONGITUDE', -6.2592576);

require_once __DIR__ . '/../vendor/autoload.php';

use Geo\Reader\File\Reader;
use Geo\Decoder\Json\Decoder;
use Geo\Entity\User;
use Location\Coordinate;
use Location\Distance\Vincenty;
use Geo\Exception\Reader\ReaderException;

$params = getopt("", array("radius:"));
if(!isset($params['radius']) || empty($params['radius']) || !is_numeric($params['radius'])){
    print 'Use this script with --radius=<numeric_value>.' . PHP_EOL;
    exit;
}
$searchRadius = $params['radius'];

try{
    $database = __DIR__ . '/customers.json';
    $reader = new Reader();
    $decodedLines = $reader->read($database, new Decoder());
    $users = [];
    foreach ($decodedLines as $line){
        $user = new User;
        $user->id = $line->user_id;
        $user->name = $line->name;
        $user->latitude = $line->latitude;
        $user->longitude = $line->longitude;
        if($user->isValid()){
            $users[$user->id] = $user;
        }
    }
    ksort($users);

    $dublinOfficeCoordinates = new Coordinate(INTERCOM_LATITUDE, INTERCOM_LONGITUDE);
    $invitees = [];
    foreach ($users as $user){
        $userCoordinates = new Coordinate($user->latitude, $user->longitude);
        if($dublinOfficeCoordinates->getDistance($userCoordinates, new Vincenty()) / METERS_IN_KILOMETER < $searchRadius){
            print $user;
        }
    }
}catch(ReaderException $e){
    var_dump($e);
}catch(\Exception $e){
    var_dump($e);
}