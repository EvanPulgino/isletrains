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
 * iotActionType.class.php
 * 
 * Action Type object
 * 
 */

abstract class IsleOfTrainsActionType extends APP_GameClass
{
    protected $game;

    public function __construct($game)
    {
        $this->game = $game;
    }

    protected $actionType = '';
    protected $actionValue = 0;

    public function getActionType() { return $this->actionType; }
    public function getActionValue() { return $this->actionValue; }

    public function getUiData()
    {
        return [
            'actionType' => $this->actionType,
            'actionValue' => $this->actionValue,
        ];
    }
}