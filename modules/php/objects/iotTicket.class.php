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
 * iotTicket.class.php
 * 
 * Ticket tile object
 * 
 */

require_once('iotTicketSpace.class.php');
class IsleOfTrainsTicket extends APP_GameClass
{
    private $game;
    private $id;
    private $type;
    private $location;
    private $locationArg;
    private $ticketSpaces;
    private $cssClass;
    
    public function __construct($game, $row)
    {
        $this->game = $game;
        $material = $this->game->ticket[$row[TYPE]];

        $this->id = $row[ID];
        $this->type = $row[TYPE];
        $this->location = $row[LOCATION];
        $this->locationArg = (int)$row[LOCATION_ARG];

        $ticketSpaces = [];
        foreach($material[TICKET_SPACES] as $ticketSpace) {
            $ticketSpaces[] = new IsleOfTrainsTicketSpace($this->game, $ticketSpace);
        }
        $this->ticketSpaces = $ticketSpaces;

        $computedCssClass = 'iot-ticket-tile-' . $this->type;
        $this->cssClass = $computedCssClass;
    }

    public function getId() { return $this->id; }
    public function getType() { return $this->type; }
    public function getLocation() { return $this->location; }
    public function getLocationArg() { return $this->locationArg; }
    public function getTicketSpaces() { return $this->ticketSpaces; }
    public function getCssClass() { return $this->cssClass; }

    public function getUiData()
    {
        $ticketSpacesUiData = [];
        foreach($this->ticketSpaces as $ticketSpace) {
            $ticketSpacesUiData[] = $ticketSpace->getUiData();
        }

        return [
            'id' => $this->id,
            'type' => $this->type,
            'location' => $this->location,
            'locationArg' => $this->locationArg,
            'ticketSpaces' => $ticketSpacesUiData,
            'cssClass' => $this->cssClass,
        ];
    }
}