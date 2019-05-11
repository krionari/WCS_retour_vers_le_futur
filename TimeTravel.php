<?php
/**
 * Created by PhpStorm.
 * User: Krionari
 * Date: 10/05/2019
 * Time: 16:05
 */

class TimeTravel
{
    private $start;
    private $end;

    public function __construct(DateTime $start, DateTime $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function getTravelInfo(): string
    {
        // on prend la date, avec diff on prend la fin pour connaitre la durée entre start et end, on formate la durée
        return $this->start->diff($this->end)->format('Il y a %y années, %m mois, %d jours, %h heures, %i minutes et %s secondes entre les deux dates.');
    }

    public function findDate(string $addSupp, DateInterval $interval)
    {
        if ($addSupp === 'retirer') {
            // on prend la date, on soustrait l'interval --> on formate la date
            return $this->start->sub($interval)->format(DATETIME::COOKIE);
        }elseif ($addSupp === 'ajouter'){
            // on prend la date, on ajoute l'interval --> on formate la date
            return $this->start->add($interval)->format(DATETIME::COOKIE);
        }
    }

    public function backToFutureStepByStep(DatePeriod $step)
    {
        $dayByStep = [];
        foreach ($step as $key => $dt){
            $dayByStep[$key] = $dt->format("M d Y A H:i");
        }
        return $dayByStep;
    }



}