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
 * Functions to manage Progress track
 * 
 */

class IsleOfTrainsProgressManager extends APP_GameClass 
{
    public $game;

    public function __construct($game)
    {
        $this->game = $game;
    }

    public function setupNewGame()
    {
        $this->game->setGameStateInitialValue(CURRENT_PROGRESS, 0);
    }

    public function getCurrentProgress()
    {
        return $this->game->getGameStateValue(CURRENT_PROGRESS);
    }

    public function incrementCurrentProgress() 
    {
        $this->game->setGameStateValue(self::getCurrentProgress() + 1);
    }
}