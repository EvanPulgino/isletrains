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
 * iotIslandManager.class.php
 * 
 * Functions to manage Islands
 * 
 */

require_once('objects/iotIsland.class.php');
class IsleOfTrainsIslandManager extends APP_GameClass
{
    public $game;

    public function __construct($game)
    {
        $this->game = $game;

        $this->islands = $this->game->getNew("module.common.deck");
        $this->islands->init("island");
    }

    /**
     * Setup island cards for a new game
     * @param int $playerCount Count of players in the game
     * @return void
     */
    public function setupNewGame($playerCount)
    {
        $islands = [];
        $islands[] = [TYPE => FLINT_BEACH, TYPE_ARG => UNFLIPPED, LOCATION_ARG => 1, NUMBER => 1];
        $islands[] = [TYPE => CAMP_EAGLE, TYPE_ARG => UNFLIPPED, LOCATION_ARG => 2, NUMBER => 1];
        $islands[] = [TYPE => DEVON_CITY, TYPE_ARG => UNFLIPPED, LOCATION_ARG => 3, NUMBER => 1];
        $islands[] = [TYPE => CACTUS_MINES, TYPE_ARG => UNFLIPPED, LOCATION_ARG => 4, NUMBER => 1];
        $islands[] = [TYPE => BILLINGTONS, TYPE_ARG => UNFLIPPED, LOCATION_ARG => 5, NUMBER => 1];
        $islands[] = [TYPE => ALPINE_LODGE, TYPE_ARG => UNFLIPPED, LOCATION_ARG => 6, NUMBER => 1];

        // If there are 4 players also use the Research Station card
        if($playerCount == 4) {
            $islands[] = [TYPE => RESEARCH_STATION, TYPE_ARG => UNFLIPPED, LOCATION_ARG => 7, NUMBER => 1];
        }

        $this->islands->createCards($islands, ISLAND);
    }

    /**
     * Factory for creating Island object
     * @param mixed $row Row from Island database table
     * @return IsleOfTrainsIsland
     */
    public function getIsland($row)
    {
        return new IsleOfTrainsIsland($this->game, $row);
    }

    /**
     * Get all Island objects in a specified location
     * @param string $location Location to get Islands from
     * @return array<IsleOfTrainsIsland> Array of Island objects
     */
    public function getIslands($location)
    {
        $islands = $this->islands->getCardsInLocation($location);
        return array_map(function($island) {
            return $this->getIsland($island);
        }, $islands);
    }

    public function getUiData($location)
    {
        $uiData = [];
        foreach($this->getIslands($location) as $island) {
            $uiData[] = $island->getUiData();
        }
        return $uiData;
    }


}