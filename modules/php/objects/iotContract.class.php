<?php
/**
 *------
 * BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
 * IsleTrains implementation : © Evan Pulgino <evan.pulgino@gmail.com>
 *
 * This code has been produced on the BGA studio platform for use on https://boardgamearena.com.
 * See http://en.doc.boardgamearena.com/Studio for more information.
 * -----
 * 
 * iotContract.class.php
 * 
 * Contract object
 * 
 */

class IsleOfTrainsContract extends APP_GameClass
{
    private $type;
    private $points;
    private $cargo;

    public function __construct($type, $points, $cargo)
    {
        $this->type = $type;
        $this->points = $points;
        $this->cargo = $cargo;
    }

    public function getType() { return $this->type; }
    public function getPoints() { return $this->points; }
    public function getCargo() { return $this->cargo; }

    public function getUiData()
    {
        return [
            'type' => $this->type,
            'points' => $this->points,
            'cargo' => $this->cargo,
        ];
    }
}