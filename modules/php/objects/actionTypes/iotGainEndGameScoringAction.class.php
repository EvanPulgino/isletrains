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
 * iotGainEndGameScoringActionType.class.php
 * 
 * Gain End Game Scoring Action Type object
 * 
 */

class IsleOfTrainsGainEndGameScoringActionType extends IsleOfTrainsActionType
{
    public function __construct($game, $value)
    {
        parent::__construct($game);
        $this->actionType = GAIN_END_GAME_SCORING;
        $this->actionValue = $value;
        $this->actionTooltip = self::buildTooltip($value);
    }

    private function buildTooltip($actionValue)
    {
        switch($actionValue) {
            case 1:
                return clienttranslate('For each passenger or cargo loaded into your train, gain 2 additional points.');
            case 2:
                return clienttranslate('For each Coal shown on your completed contracts (primary and secondary), gain 2 points.');
            case 3:
                return clienttranslate('For each Box shown on your completed contracts (primary and secondary), gain 2 points.');
            case 4:
                return clienttranslate('Gain 8 points');
            case 5:
                return clienttranslate('Gain 4 points plus 1 point for each passenger delivered to Cactus Mines and Devon City.');
            case 6:
                return clienttranslate('Gain 4 points plus 1 point for each passenger delivered to Alpine Lodge and Billington\'s.');
            case 7:
                return clienttranslate('For each Oil shown on your completed contracts (primary and secondary), gain 2 points.');
            case 8:
                return clienttranslate('For each train car in your train (not including your engine), gain 2 points.');
            case 9:
                return clienttranslate('Gain 4 points plus 1 point for each passenger delivered to Camp Eagle and Flint Beach.');
            case 10:
                return clienttranslate('For each engine and train car showing a passenger icon in your train, gain 2 points.');
            default:
                return '';
        }
    }
}