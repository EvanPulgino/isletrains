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
 * iotTicketSpace.class.php
 * 
 * Ticket Space object
 * 
 */

require_once('iotActionType.class.php');
require_once('actionTypes/iotBuildAction.class.php');
require_once('actionTypes/iotLoadAction.class.php');
require_once('actionTypes/iotTakeCardsAction.class.php');
require_once('actionTypes/iotTakeCardsDiscardAction.class.php');
require_once('actionTypes/iotTakePassengersAction.class.php');
require_once('actionTypes/iotTakeVPAction.class.php');
class IsleOfTrainsTicketSpace extends APP_GameClass
{
    private $game;
    private $order;
    private $actionTypes;

    public function __construct($game, $ticketSpaceRecord)
    {
        $this->game = $game;
        $this->order = $ticketSpaceRecord[ORDER];
        $this->actionTypes = self::buildActionTypesArray($ticketSpaceRecord[ACTION_TYPES]);
    }

    public function getOrder() { return $this->order; }
    public function getActionTypes() { return $this->actionTypes; }

    public function getUiData()
    {
        $actionTypeUiData = [];
        foreach($this->actionTypes as $actionType) {
            $actionTypeUiData[] = $actionType->getUiData();
        }

        return [
            'order' => $this->order,
            'actionTypes' => $actionTypeUiData,
        ];
    }

    private static $actionTypeClasses = [
        BUILD => 'IsleOfTrainsBuildActionType',
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