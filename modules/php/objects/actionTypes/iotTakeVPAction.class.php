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
 * iotTakeVPActionType.class.php
 * 
 * Take VP Action Type object
 * 
 */

class IsleOfTrainsTakeVPActionType extends IsleOfTrainsActionType
{
    public function __construct($game, $value)
    {
        parent::__construct($game);
        $this->actionType = TAKE_PASSENGERS;
        $this->actionValue = $value;
        $this->actionTooltip = clienttranslate('Take ' . $value . ' VP');
    }
}