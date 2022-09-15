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
 * iotTicketManager.class.php
 * 
 * Functions to manage Ticket tiles
 * 
 */

require_once('objects/iotTicket.class.php');
class IsleOfTrainsTicketManager extends APP_GameClass
{
    public $game;

    public function __construct($game)
    {
        $this->game = $game;

        $this->tickets = $this->game->getNew("module.common.deck");
        $this->tickets->init("ticket");
    }

    public function setupNewGame()
    {
        $ticketTiles = [];
        for($ticketType = 1; $ticketType <= 6; $ticketType++) {
            $ticketTiles[] = [TYPE => $ticketType, TYPE_ARG => null, NUMBER => 1];
        }

        $this->tickets->createCards($ticketTiles, TICKET);
        $this->tickets->shuffle(TICKET);
    }

    public function getTicket($row)
    {
        return new IsleOfTrainsTicket($this->game, $row);
    }

    public function getTickets()
    {
        $tickets = $this->tickets->getCardsInLocation(TICKET);
        return array_map(function($ticket) {
            return $this->getTicket($ticket);
        }, $tickets);
    }

    public function getUiData()
    {
        $uiData = [];
        foreach($this->getTickets() as $ticket) {
            $uiData[] = $ticket->getUiData();
        }
        return $uiData;
    }
}