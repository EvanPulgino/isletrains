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
        $this->game->setGameStateInitialValue(SELECTED_ACTION, 0);
    }

    public function getActionNumber()
    {
        return $this->game->getGameStateValue(ACTION_NUMBER);
    }

    public function getSelectedAction()
    {
        return $this->game->getGameStateValue(SELECTED_ACTION);
    }

    public function setActionNumber($action_number)
    {
        $this->game->setGameStateValue(ACTION_NUMBER, $action_number);
    }

    public function setSelectionAction($selected_action)
    {
        $this->game->setGameStateValue(SELECTED_ACTION, $selected_action);
    }
}