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
 * iotCardManager.class.php
 * 
 * Functions to manage Cards
 * 
 */

require_once('objects/iotCard.class.php');
class IsleOfTrainsCardManager extends APP_GameClass
{
    public $game;

    public function __construct($game)
    {
        $this->game = $game;

        $this->cards = $this->game->getNew("module.common.deck");
        $this->cards->init("card");
    }

    public function setupNewGame($players)
    {
        // Deal each player a Level 1 Engine and put the rest in the deck
        $levelOneEngines = [];
        $levelOneEngines[] = [TYPE => ENGINE, TYPE_ARG => 1, NUMBER => 4];
        $this->cards->createCards($levelOneEngines, LEVEL_ONE_ENGINES);

        foreach($players as $player) {
            $this->cards->pickCardForLocation(LEVEL_ONE_ENGINES, TRAIN, $player->getId());
        }
        $this->cards->moveAllCardsInLocation(LEVEL_ONE_ENGINES, DECK);

        // Put all other cards in deck and shuffle
        $cards = [];
        for($cardType = 2; $cardType <= 35; $cardType++) {
            $material = $this->game->card[$cardType];
            $cards[] = [TYPE => $cardType, TYPE_ARG => $material[TYPE_ARG], NUMBER => $material[NUMBER]];
        }
        $this->cards->createCards($cards, DECK);
        $this->cards->shuffle(DECK);

        // Deal 5 cards to each player
        foreach($players as $player)
        {
            $this->cards->pickCards(5, DECK, $player->getId());
        }

        // Deal 3 cards to display
        $this->cards->pickCardsForLocation(3, DECK, DISPLAY);
    }

    /**
     * Factory for creating Card object
     * @param mixed $row Row from Card database table
     * @return IsleOfTrainsCard
     */
    public function getCard($row)
    {
        return new IsleOfTrainsCard($this->game, $row);
    }

    /**
     * Get all Card objects in a specified location
     * @param string $location Location to get Cards from
     * @return array<IsleOfTrainsCard> Array of Card objects
     */
    public function getCards($location)
    {
        $cards = $this->cards->getCardsInLocation($location);
        return array_map(function($card) {
            return self::getCard($card);
        }, $cards);
    }

    public function getUiData($location)
    {
        $uiData = [];
        foreach($this->getCards($location) as $card) {
            $uiData[] = $card->getUiData();
        }
        return $uiData;
    }
}