<?php
/**
 * Created by PhpStorm.
 * User: Krionari
 * Date: 10/05/2019
 * Time: 16:12
 */

require 'TimeTravel.php';

$timeTraveller = new TimeTravel(new DateTime('31-12-1985'), new DateTime());
echo $timeTraveller->getTravelInfo();
echo '</br>';

echo $timeTraveller->findDate('retirer',new DateInterval('PT1000000000S'));
echo '</br>';

$start = new DateTime('31-12-1985');
$end = new DateTime();
$interval = new DateInterval('P1M8D');
$days = $timeTraveller->backToFutureStepByStep(new DatePeriod($start, $interval, $end));
echo $days[50];