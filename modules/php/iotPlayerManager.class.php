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
 * iotPlayerManager.class.php
 * 
 * Functions to manage Player objects
 * 
 */

require_once('objects/iotPlayer.class.php');
class IsleOfTrainsPlayerManager extends APP_GameClass
{
    public $game;

    public function __construct($game)
    {
        $this->game = $game;
    }

    /**
     * Setup players for a new game
     * @param array<mixed> $players array of players in the game
     * @return void
     */
    public function setupNewGame($players)
    {
        $gameInfos = $this->game->getGameInfos();
        $defaultColors = $gameInfos['player_colors'];
        $sql = "INSERT INTO player (player_id, player_color, player_canal, player_name, player_avatar) VALUES";
        foreach($players as $playerId => $player) {
            $color = array_shift($defaultColors);
            $values[] = "('" . $playerId . "','$color','" . $player['player_canal'] . "','" . addslashes($player['player_name']) . "')";
        }
        $sql .= implode($values, ',');
        self::DbQuery($sql);
        $this->game->reloadPlayersBasicInfos();
    }

    /**
     * Gets a player object for the active/specified playetId
     * @param int $playerId Id of player
     * @return IsleOfTrainsPlayer Player object
     */
    public function getPlayer($playerId = null)
    {
        $playerId = $playerId ?? $this->game->getActivePlayerId();
        $players = $this->getPlayers([$playerId]);
        return array_shift($players);
    }

    /**
     * Gets an array of Player objects for all/specified playerIds
     * @param array<int> $playerIds Array of player ids
     * @return array<IsleOfTrainsPlayer> Array of Player objects
     */
    public function getPlayers($playerIds = null)
    {
        $sql = "SELECT player_id id, player_no naturalOrder, player_name name, player_avatar avatar, player_color color, player_score score, player_eliminated eliminated, player_zombie zombie FROM player";
        
        if(is_array($playerIds)) {
            $sql .= " WHERE player_id IN ('" . implode("','", $playerIds) . "')";
        }
        $rows = self::getObjectListFromDb($sql);

        $players = [];
        foreach($rows as $row) {
            $player = new IsleOfTrainsPlayer($this->game, $row);
            $players[] = $player;
        }
        return $players;
    }

    /**
     * Get all UI data for players
     * @return array<array> Array of player UI data
     */
    public function getUiData()
    {
        $uiData = [];
        foreach($this->getPlayers() as $player) {
            $uiData[] = $player->getUiData();
        }
        return $uiData;
    }
}