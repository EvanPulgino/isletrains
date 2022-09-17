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
 * iotPassenger.class.php
 * 
 * Passenger object
 * 
 */

class IsleOfTrainsPassenger extends APP_GameClass
{
    private $game;
    private $id;
    private $type;
    private $location;
    private $locationArg;
    private $cssClass;

    public function __construct($game, $row)
    {
        $this->game = $game;
        $this->id = $row[ID];
        $this->type = $row[TYPE];
        $this->location = $row[LOCATION];
        $this->locationArg = $row[LOCATION_ARG];
        $this->cssClass = 'iot-passenger-' . $this->type;
    }

    public function getId(){ return $this->id; }
    public function getType(){ return $this->type; }
    public function getLocation(){ return $this->location; }
    public function getLocationArg(){ return $this->locationArg; }
    public function getCssClass(){ return $this->cssClass; }

    public function getUiData()
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'location' => $this->location,
            'locationArg' => $this->locationArg,
            'cssClass' => $this->cssClass,
        ];
    }

}