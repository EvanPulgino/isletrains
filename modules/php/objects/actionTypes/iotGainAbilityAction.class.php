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
 * iotGainAbilityActionType.class.php
 * 
 * Gain Ability Action Type object
 * 
 */

class IsleOfTrainsGainAbilityActionType extends IsleOfTrainsActionType
{
    public function __construct($game, $value)
    {
        parent::__construct($game);
        $this->actionType = GAIN_ABILITY;
        $this->actionValue = $value;
        $this->actionTooltip = self::buildTooltip($value);
    }

    private function buildTooltip($actionValue)
    {
        switch($actionValue) {
            case 1:
                return clienttranslate('When you take the Deliver action, take 1 card.');
            case 2:
                return clienttranslate('When you Load a Coal take 1 card.');
            case 3:
                return clienttranslate('You may Load 1 of any cargo type into this caboose. If you load a card with all cargo types, it can become any type when it is unloaded.');
            case 4:
                return clienttranslate('You may build 1 additional Building.');
            case 5:
                return clienttranslate('Train cards copst 1 less to build when extending your train. This caboose does not give any benefits for upgrading your cars.');
            case 6:
                return clienttranslate('Your engine capacity is increased by 2.');
            case 7:
                return clienttranslate('Once per Delivery action, you may deliver a passenger to a contract as if they were any cargo type. The passenger delivered in this way is returned to the passenger bag.');
            case 8:
                return clienttranslate('When you load a passenger, take 2 cards');
            case 9:
                return clienttranslate('When you Deliver, you may also deliver 1 passenger to any other destination. That passenger must match the destination it is being delivered to.');
            case 10:
                return clienttranslate('When taking a deliver action, you may deliver a passenger to the current destination even if it does not match. If you do this, gain the reward on the leftmost empty space of the ticket tile and return the passenger to the bag.');
            default:
                return '';
        }
    }
}