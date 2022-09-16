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
 * iotTakeCardsActionType.class.php
 * 
 * Take Cards Action Type object
 * 
 */

class IsleOfTrainsTakeCardsActionType extends IsleOfTrainsActionType
{
    public function __construct($game, $value)
    {
        parent::__construct($game);
        $this->actionType = TAKE_CARDS;
        $this->actionValue = $value;
        $this->actionTooltip = self::buildTooltip($value);
    }

    private function buildTooltip($actionValue)
    {
        $card = $actionValue == 1 ? 'card' : 'cards';
        return clienttranslate('Take ' . $actionValue . ' ' . $card);
    }
}