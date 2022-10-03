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

    public function drawPassenger()
    {
        $activePlayer = $this->game->getActivePlayerId();
        if (count(self::getPassengers(BAG)) > 0) {
            $drawnPassenger = self::drawPassengerFromBag($activePlayer);
            $this->game->notifyAllPlayers(
                DRAW_PASSENGER,
                clienttranslate('${player_name} draws a passenger from the bag'),
                array(
                    'player_name' => $this->game->getActivePlayerName(),
                    'passenger' => $drawnPassenger->getUiData()
                )
            );
        } else {
            $this->game->playerManager->playerGainVP(
                $activePlayer,
                1,
                clienttranslate('because passenger bag is empty')
            );
        }
        

        $this->game->gamestate->nextState(END_ACTION);
    }

    public function drawPassengerFromBag($playerId)
    {
        return self::getPassenger($this->passengers->pickCardForLocation(BAG, TABLEAU, $playerId));
    }

    public function getPassenger($row)
    {
        return new IsleOfTrainsPassenger($this->game, $row);
    }

    public function getPassengers($location, $locationArg = null)
    {
        $passengers = $this->passengers->getCardsInLocation($location, $locationArg);
        return array_map(function($passenger) {
            return self::getPassenger($passenger);
        }, $passengers);
    }

    public function getUiData($location, $locationArg = null)
    {
        $uiData = [];
        foreach(self::getPassengers($location, $locationArg) as $passenger) {
            $uiData[] = $passenger->getUiData();
        }
        return $uiData;
    }
}
