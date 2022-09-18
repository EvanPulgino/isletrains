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
 * iotDeliverOrLoadActionType.class.php
 * 
 * DeliverOrLoad Action Type object
 * 
 */

class IsleOfTrainsDeliverOrLoadActionType extends IsleOfTrainsActionType
{
    public function __construct($game, $value)
    {
        parent::__construct($game);
        $this->actionType = DELIVER_OR_LOAD;
        $this->actionValue = $value;
        $this->actionTooltip = clienttranslate('Take a bonus Deliver or Load action');
    }
}