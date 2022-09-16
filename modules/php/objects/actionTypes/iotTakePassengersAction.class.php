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
 * iotTakePassengersActionType.class.php
 * 
 * Take Passengers Action Type object
 * 
 */

class IsleOfTrainsTakePassengersActionType extends IsleOfTrainsActionType
{
    public function __construct($game, $value)
    {
        parent::__construct($game);
        $this->actionType = TAKE_PASSENGERS;
        $this->actionValue = $value;
        $this->actionTooltip = self::buildTooltip($value);
    }

    private function buildTooltip($actionValue)
    {
        $passenger = $actionValue == 1 ? 'passenger' : 'passengers';
        return clienttranslate('Take ' . $actionValue . ' ' . $passenger);
    }
}