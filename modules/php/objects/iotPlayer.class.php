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
 * iotPlayer.class.php
 * 
 * Player object
 * 
 */

class IsleOfTrainsPlayer extends APP_GameClass
{
    private $game;
    private $id;
    private $naturalOrder;
    private $name;
    private $avatar;
    private $color;
    private $score;
    private $weight;
    private $eliminated = false;
    private $zombie = false;

    public function __construct($game, $row)
    {
        $this->game = $game;
        $this->id = (int)$row[ID];
        $this->naturalOrder = (int)$row[NATURAL_ORDER];
        $this->name = $row[NAME];
        $this->avatar = $row[AVATAR];
        $this->color = $row[COLOR];
        $this->score = $row[SCORE];
        $this->weight = $row[WEIGHT];
        $this->eliminated = $row[ELIMINATED] == 1;
        $this->zombie = $row[ZOMBIE] == 1;
    }

    public function getId(){ return $this->id; }
    public function getNaturalOrder(){ return $this->naturalOrder; }
    public function getName(){ return $this->name; }
    public function getAvatar(){ return $this->avatar; }
    public function getColor(){ return $this->color; }
    public function getScore(){ return $this->score; }
    public function getWeight(){ return $this->weight; }
    public function isEliminated(){ return $this->eliminated; }
    public function isZombie(){ return $this->zombie; }

    /**
     * Get player data visible in UI
     * @return array<mixed> Visible data for player
     */
    public function getUiData()
    {
        return [
            'id' => $this->id,
            'naturalOrder' => $this->naturalOrder,
            'name' => $this->name,
            'color' => $this->color,
            'score' => $this->score,
            'weight' => $this->weight,
        ];
    }
}