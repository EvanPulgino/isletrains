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
 * iotCard.class.php
 * 
 * Card object
 * 
 */

require_once('iotActionType.class.php');
require_once('actionTypes/iotActionAction.class.php');
require_once('actionTypes/iotBuildAction.class.php');
require_once('actionTypes/iotDeliverAction.class.php');
require_once('actionTypes/iotDeliverOrLoadAction.class.php');
require_once('actionTypes/iotDiscardCardsAction.class.php');
require_once('actionTypes/iotGainAbilityAction.class.php');
require_once('actionTypes/iotGainEndGameScoringAction.class.php');
require_once('actionTypes/iotLoadAction.class.php');
require_once('actionTypes/iotTakeCardsAction.class.php');
require_once('actionTypes/iotTakeCardsDiscardAction.class.php');
require_once('actionTypes/iotTakePassengersAction.class.php');
require_once('actionTypes/iotTakeVPAction.class.php');
class IsleOfTrainsCard extends APP_GameClass
{
    private $game;
    private $id;
    private $type;
    private $typeArg;
    private $location;
    private $locationArg;
    private $name;
    private $number;
    private $cost;
    private $points;
    private $passengers;
    private $capacity;
    private $holds;
    private $weight;
    private $cargo;
    private $actionTypes;
    private $cssClass;

    public function __construct($game, $row)
    {
        $this->game = $game;
        $material = $this->game->card[$row[TYPE]];

        $this->id = $row[ID];
        $this->type = $material[TYPE];
        $this->typeArg = $row[TYPE_ARG];
        $this->location = $row[LOCATION];
        $this->locationArg = $row[LOCATION_ARG];
        $this->name = $material[NAME];
        $this->number = $material[NUMBER];
        $this->cost = $material[COST];
        $this->points = $material[POINTS];
        $this->passengers = $material[PASSENGERS];
        $this->capacity = $material[CAPACITY];
        $this->holds = $material[HOLDS];
        $this->weight = $material[WEIGHT];
        $this->cargo = $material[CARGO];
        $this->actionTypes = self::buildActionTypesArray($material[ACTION_TYPES]);
        $this->cssClass = 'iot-card-' . $this->type . '-' . $this->typeArg;
    }

    public function getId() { return $this->id; }
    public function getType() { return $this->type; }
    public function getTypeArg() { return $this->typeArg; }
    public function getLocation() { return $this->location; }
    public function getLocationArg() { return $this->locationArg; }
    public function getName() { return $this->name; }
    public function getNumber() { return $this->number; }
    public function getCost() { return $this->cost; }
    public function getPoints() { return $this->points; }
    public function getPassengers() { return $this->passengers; }
    public function getCapacity() { return $this->capacity; }
    public function getHolds() { return $this->holds; }
    public function getWeight() { return $this->weight; }
    public function getCargo() { return $this->cargo; }
    public function getActionTypes() { return $this->actionTypes; }
    public function getCssClass() { return $this->cssClass; }

    public function getUiData()
    {
        $actionTypeUiData = [];
        foreach($this->actionTypes as $actionType) {
            $actionTypeUiData[] = $actionType->getUiData();
        }

        return [
            'id' => $this->id,
            'type' => $this->type,
            'typeArg' => $this->typeArg,
            'location' => $this->location,
            'locationArg' => $this->locationArg,
            'name' => $this->name,
            'number' => $this->number,
            'cost' => $this->cost,
            'points' => $this->points,
            'passengers' => $this->passengers,
            'capacity' => $this->capacity,
            'holds' => $this->holds,
            'weight' => $this->weight,
            'cargo' => $this->cargo,
            'actionTypes' => $actionTypeUiData,
            'cssClass' => $this->cssClass,
        ];
    }

    private static $actionTypeClasses = [
        ACTION => 'IsleOfTrainsActionActionType',
        BUILD => 'IsleOfTrainsBuildActionType',
        DELIVER => 'IsleOfTrainsDeliverActionType',
        DELIVER_OR_LOAD => 'IsleOfTrainsDeliverOrLoadActionType',
        DISCARD_CARDS => 'IsleOfTrainsDiscardCardsActionType',
        GAIN_ABILITY => 'IsleOfTrainsGainAbilityActionType',
        GAIN_END_GAME_SCORING => 'IsleOfTrainsGainEndGameScoringActionType',
        LOAD => 'IsleOfTrainsLoadActionType',
        TAKE_CARDS => 'IsleOfTrainsTakeCardsActionType',
        TAKE_CARDS_DISCARD => 'IsleOfTrainsTakeCardsDiscardActionType',
        TAKE_PASSENGERS => 'IsleOfTrainsTakePassengersActionType',
        TAKE_VP => 'IsleOfTrainsTakeVPActionType',
    ];

    private function buildActionTypesArray($actionTypeRecords) 
    {
        $actionTypes = [];
        foreach($actionTypeRecords as $actionTypeRecord) {
            $actionTypes[] = self::createActionType($actionTypeRecord);
        }
        return $actionTypes;
    }

    private function createActionType($actionTypeRecord) 
    {
        $actionType = $actionTypeRecord[ACTION_TYPE];
        $actionValue = $actionTypeRecord[ACTION_VALUE];
        if(!isset(self::$actionTypeClasses[$actionType])) {
            throw new BgaVisibleSystemException("createActionType: Unknown action type");
        }
        $className = self::$actionTypeClasses[$actionType];
        return new $className($this->game, $actionValue);
    }
}