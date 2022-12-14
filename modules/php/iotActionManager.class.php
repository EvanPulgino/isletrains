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
 * iotProgressManager.class.php
 * 
 * Functions to manage Actions
 * 
 */

class IsleOfTrainsActionManager extends APP_GameClass 
{
    public $game;

    public function __construct($game)
    {
        $this->game = $game;
    }

    public function setupNewGame()
    {
        $this->game->setGameStateInitialValue(ACTION_NUMBER, 1);
        $this->game->setGameStateInitialValue(DISCARD_NUMBER, 0);
        $this->game->setGameStateInitialValue(IS_BONUS_ACTION, REGULAR);
        $this->game->setGameStateInitialValue(SELECTED_ACTION, 0);
    }

    public function incDiscardNumber($delta)
    {
        $currentValue = $this->getDiscardNumber();
        $this->setDiscardNumber($currentValue + $delta);
    }

    public function getActionLabel($actionName)
    {
        return '<span class="' . $actionName . '-label">' . clienttranslate($actionName) . '</span>';
    }

    public function getActionNumber()
    {
        return $this->game->getGameStateValue(ACTION_NUMBER);
    }

    public function getDiscardNumber()
    {
        return $this->game->getGameStateValue(DISCARD_NUMBER);
    }

    public function getSelectedAction()
    {
        return $this->game->getGameStateValue(SELECTED_ACTION);
    }

    public function isBonusAction() 
    {
        $isBonus = $this->game->getGameStateValue(IS_BONUS_ACTION);
        return $isBonus == BONUS ? true : false;
    }

    public function selectAction($selectedAction)
    {
        switch($selectedAction)
        {
            case TAKE:
                $this->game->gamestate->nextState(SELECT_TAKE);
                break;
        }

        $this->game->notifyAllPlayers(
            SELECT_ACTION,
            clienttranslate('${player_name} chooses to perform a ${selectedAction} action'),
            array(
                'player_name' => $this->game->getActivePlayerName(),
                'selectedAction' => self::getActionLabel($selectedAction),
            )
        );
    }

    public function setActionNumber($actionNumber)
    {
        $this->game->setGameStateValue(ACTION_NUMBER, $actionNumber);
    }

    public function setDiscardNumber($discardNumber)
    {
        $this->game->setGameStateValue(DISCARD_NUMBER, $discardNumber);
    }

    public function setIsBonusAction($actionCategory)
    {
        $this->game->setGameStateValue(IS_BONUS_ACTION, $actionCategory);
    }

    public function setSelectedAction($selected_action)
    {
        $this->game->setGameStateValue(SELECTED_ACTION, $selected_action);
    }
}