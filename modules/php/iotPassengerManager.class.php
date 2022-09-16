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
 * iotPassengerManager.class.php
 * 
 * Functions to manage Passengers
 * 
 */

require_once('objects/iotPassenger.class.php');
class IsleOfTrainsPassengerManager extends APP_GameClass
{
    public $game;

    public function __construct($game)
    {
        $this->game = $game;

        $this->passengers = $this->game->getNew("module.common.deck");
        $this->passengers->init("passenger");
    }

    public function setupNewGame($players)
    {
        $passengers = [];
        $passengers[] = [TYPE => FLINT_BEACH, TYPE_ARG => 0, NUMBER => 3];
        $passengers[] = [TYPE => CAMP_EAGLE, TYPE_ARG => 0, NUMBER => 3];
        $passengers[] = [TYPE => DEVON_CITY, TYPE_ARG => 0, NUMBER => 3];
        $passengers[] = [TYPE => CACTUS_MINES, TYPE_ARG => 0, NUMBER => 3];
        $passengers[] = [TYPE => BILLINGTONS, TYPE_ARG => 0, NUMBER => 3];
        $passengers[] = [TYPE => ALPINE_LODGE, TYPE_ARG => 0, NUMBER => 3];

        $this->passengers->createCards($passengers, BAG);
        $this->passengers->shuffle(BAG);

        foreach($players as $player) {
            $this->passengers->pickCardsForLocation(2, BAG, TABLEAU, $player->getId());
        }
    }

    public function getPassenger($row)
    {
        return new IsleOfTrainsPassenger($this->game, $row);
    }

    public function getPassengers($location)
    {
        $passengers = $this->passengers->getCardsInLocation($location);
        return array_map(function($passenger) {
            return self::getPassenger($passenger);
        }, $passengers);
    }

    public function getUiData($location)
    {
        $uiData = [];
        foreach(self::getPassengers($location) as $passenger) {
            $uiData[] = $passenger->getUiData();
        }
        return $uiData;
    }
}
