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
 * iotIsland.class.php
 * 
 * Island object
 * 
 */

require_once('iotContract.class.php');
class IsleOfTrainsIsland extends APP_GameClass
{
    private $game;
    private $id;
    private $type;
    private $flipped;
    private $location;
    private $locationArg;
    private $name;
    private $contracts;
    private $cssClass;

    public function __construct($game, $row)
    {
        $this->game = $game;
        $material = $this->game->island[$row[TYPE]];

        $this->id = $row[ID];
        $this->type = $row[TYPE];
        $this->flipped = $row[TYPE_ARG];
        $this->location = $row[LOCATION];
        $this->locationArg = $row[LOCATION_ARG];
        $this->name = $material[NAME];

        $contracts = [];
        foreach($material[CONTRACTS] as $contract) {
            $contracts[] = new IsleOfTrainsContract($contract[CONTRACT_TYPE], $contract[POINTS], $contract[CARGO]);
        }
        $this->contracts = $contracts;

        $computedCssClass = 'iot-island-card-'.$this->type;
        $this->cssClass = $this->flipped == FLIPPED ? $computedCssClass . '-back' : $computedCssClass;
    }

    public function getId() { return $this->id; }
    public function getType() { return $this->type; }
    public function isFlipped() { return $this->flipped; }
    public function getLocation() { return $this->location; }
    public function getLocationArg() { return $this->locationArg; }
    public function getName() { return $this->name; }
    public function getContracts() { return $this->contracts; }
    public function getCssClass() { return $this->cssClass; }

    public function getUiData()
    {
        $contractUiData = [];
        foreach($this->contracts as $contract) {
            $contractUiData[] = $contract->getUiData();
        }

        return [
            'id' => $this->id,
            'type' => $this->type,
            'flipped' => $this->flipped,
            'location' => $this->location,
            'locationArg' => $this->locationArg,
            'name' => $this->name,
            'contracts' => $contractUiData,
            'cssClass' => $this->cssClass,
        ];
    }
}