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
 * iotDeliverActionType.class.php
 * 
 * Deliver Action Type object
 * 
 */

class IsleOfTrainsDeliverActionType extends IsleOfTrainsActionType
{
    public function __construct($game, $value)
    {
        parent::__construct($game);
        $this->actionType = DELIVER;
        $this->actionValue = $value;
        $this->actionTooltip = clienttranslate('Take a bonus Deliver action');
    }
}