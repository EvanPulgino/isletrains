<?php
 /**
  *------
  * BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
  * IsleTrains implementation : © Evan Pulgino <evan.pulgino@gmail.com>
  * 
  * This code has been produced on the BGA studio platform for use on http://boardgamearena.com.
  * See http://en.boardgamearena.com/#!doc/Studio for more information.
  * -----
  * 
  * isletrains.game.php
  *
  * This is the main file for your game logic.
  *
  * In this PHP file, you are going to defines the rules of the game.
  *
  */

require_once( APP_GAMEMODULE_PATH.'module/table/table.game.php' );
require_once('modules/constants.inc.php');
require_once('modules/php/iotActionManager.class.php');
require_once('modules/php/iotCardManager.class.php');
require_once('modules/php/iotIslandManager.class.php');
require_once('modules/php/iotPassengerManager.class.php');
require_once('modules/php/iotPlayerManager.class.php');
require_once('modules/php/iotProgressManager.class.php');
require_once('modules/php/iotTicketManager.class.php');
class IsleTrains extends Table
{
	function __construct( )
	{
        // Your global variables labels:
        //  Here, you can assign labels to global variables you are using for this game.
        //  You can use any number of global variables with IDs between 10 and 99.
        //  If your game has options (variants), you also have to associate here a label to
        //  the corresponding ID in gameoptions.inc.php.
        // Note: afterwards, you can get/set the global variables with getGameStateValue/setGameStateInitialValue/setGameStateValue
        parent::__construct();
        
        self::initGameStateLabels( array(
            ACTION_NUMBER => 10,
            CURRENT_PROGRESS => 11,
            SELECTED_ACTION => 12,
        ));

        $this->actionManager = new IsleOfTrainsActionManager($this);
        $this->cardManager = new IsleOfTrainsCardManager($this);
        $this->islandManager = new IsleOfTrainsIslandManager($this);
        $this->passengerManager = new IsleOfTrainsPassengerManager($this);
        $this->playerManager = new IsleOfTrainsPlayerManager($this);
        $this->progressManager = new IsleOfTrainsProgressManager($this);
        $this->ticketManager = new IsleOfTrainsTicketManager($this);
	}
	
    protected function getGameName( )
    {
		// Used for translations and stuff. Please do not modify.
        return "isletrains";
    }	

    /*
        setupNewGame:
        
        This method is called only once, when a new game is launched.
        In this method, you must setup the game according to the game rules, so that
        the game is ready to be played.
    */
    protected function setupNewGame( $players, $options = array() )
    {
        $this->playerManager->setupNewGame($players);
        $updatedPlayers = $this->playerManager->getPlayers();

        $this->actionManager->setupNewGame();
        $this->cardManager->setupNewGame($updatedPlayers);
        $this->islandManager->setupNewGame(count($updatedPlayers));
        $this->passengerManager->setupNewGame($updatedPlayers);
        $this->progressManager->setupNewGame();
        $this->ticketManager->setupNewGame();
        
        // Init game statistics
        // (note: statistics used in this file must be defined in your stats.inc.php file)
        //self::initStat( 'table', 'table_teststat1', 0 );    // Init a table statistics
        //self::initStat( 'player', 'player_teststat1', 0 );  // Init a player statistics (for all players)       

        // Activate first player (which is in general a good idea :) )
        $this->activeNextPlayer();

        /************ End of the game initialization *****/
    }

    /*
        getAllDatas: 
        
        Gather all informations about current game situation (visible by the current player).
        
        The method is called each time the game interface is displayed to a player, ie:
        _ when the game starts
        _ when a player refreshes the game page (F5)
    */
    protected function getAllDatas()
    {    
        $sql = "SELECT player_id id, player_score score FROM player";

        $gamedata = [
            'constants' => get_defined_constants(true)['user'],
            'cardsInBuildingSlot' => $this->cardManager->getUiData(BUILDING_SLOT),
            'cardsInCargo' => $this->cardManager->getUiData(CARGO),
            'cardsInDeck' => $this->cardManager->getUiData(DECK),
            'cardsInDiscard' => $this->cardManager->getUiData(DISCARD),
            'cardsInDisplay' => $this->cardManager->getUiData(DISPLAY),
            'cardsInHand' => $this->cardManager->getUiData(HAND),
            'cardsInTrain' => $this->cardManager->getUiData(TRAIN),
            'currentProgress' => $this->progressManager->getCurrentProgress(),
            'islands' => $this->islandManager->getUiData(ISLAND),
            'players' => self::getCollectionFromDb($sql),
            'playerInfo' => $this->playerManager->getUiData(),
            'remainingPassengers' => count($this->passengerManager->getPassengers(BAG)),
            'tableauPassengers' => $this->passengerManager->getUiData(TABLEAU),
            'ticketPassengers' => $this->passengerManager->getUiData(TICKET),
            'tickets' => $this->ticketManager->getUiData(),
        ];

        return $gamedata;
    }

    /*
        getGameProgression:
        
        Compute and return the current game progression.
        The number returned must be an integer beween 0 (=the game just started) and
        100 (= the game is finished or almost finished).
    
        This method is called each time we are in a game state with the "updateGameProgression" property set to true 
        (see states.inc.php)
    */
    function getGameProgression()
    {
        return 0;
    }


//////////////////////////////////////////////////////////////////////////////
//////////// Utility functions
////////////    

    /**
     * Wrapper for getCurrentPlayerId
     * @return int ID of player who loaded screen
     */
    function getViewingPlayerId()
    {
        return self::getCurrentPlayerId();
    }

//////////////////////////////////////////////////////////////////////////////
//////////// Player actions
//////////// 

    /*
        Each time a player is doing some game action, one of the methods below is called.
        (note: each method below must match an input method in isletrains.action.php)
    */

    /*
    
    Example:

    function playCard( $card_id )
    {
        // Check that this is the player's turn and that it is a "possible action" at this game state (see states.inc.php)
        self::checkAction( 'playCard' ); 
        
        $player_id = self::getActivePlayerId();
        
        // Add your game logic to play a card there 
        ...
        
        // Notify all players about the card played
        self::notifyAllPlayers( "cardPlayed", clienttranslate( '${player_name} plays ${card_name}' ), array(
            'player_id' => $player_id,
            'player_name' => self::getActivePlayerName(),
            'card_name' => $card_name,
            'card_id' => $card_id
        ) );
          
    }
    
    */

    
//////////////////////////////////////////////////////////////////////////////
//////////// Game state arguments
////////////

    /*
        Here, you can create methods defined as "game state arguments" (see "args" property in states.inc.php).
        These methods function is to return some additional information that is specific to the current
        game state.
    */

    function argsPlayerTurn()
    {
        return array(
            'cardsInCargo' => $this->cardManager->getUiData(CARGO, self::getActivePlayerId()),
            'cardsInHand' => $this->cardManager->getUiData(HAND, self::getActivePlayerId()),
            'cardsInTrain' => $this->cardManager->getUiData(TRAIN),
            'islands' => $this->islandManager->getUiData(ISLAND),
            'passengers' => $this->passengerManager->getUiData(TABLEAU, self::getActivePlayerId()),
            'ticketPassengers' => $this->passengerManager->getUiData(TICKET),
            'tickets' => $this->ticketManager->getUiData(),
        );
    }

//////////////////////////////////////////////////////////////////////////////
//////////// Game state actions
////////////

    /*
        Here, you can create methods defined as "game state actions" (see "action" property in states.inc.php).
        The action method of state X is called everytime the current game state is set to X.
    */
    
    function stNextPlayer()
    {
        $player_id = self::activeNextPlayer();
        self::giveExtraTime($player_id);
        $this->gamestate->nextState("nextTurn");
    }

//////////////////////////////////////////////////////////////////////////////
//////////// Zombie
////////////

    /*
        zombieTurn:
        
        This method is called each time it is the turn of a player who has quit the game (= "zombie" player).
        You can do whatever you want in order to make sure the turn of this player ends appropriately
        (ex: pass).
        
        Important: your zombie code will be called when the player leaves the game. This action is triggered
        from the main site and propagated to the gameserver from a server, not from a browser.
        As a consequence, there is no current player associated to this action. In your zombieTurn function,
        you must _never_ use getCurrentPlayerId() or getCurrentPlayerName(), otherwise it will fail with a "Not logged" error message. 
    */

    function zombieTurn( $state, $active_player )
    {
    	$statename = $state['name'];
    	
        if ($state['type'] === "activeplayer") {
            switch ($statename) {
                default:
                    $this->gamestate->nextState( "zombiePass" );
                	break;
            }

            return;
        }

        if ($state['type'] === "multipleactiveplayer") {
            // Make sure player is in a non blocking status for role turn
            $this->gamestate->setPlayerNonMultiactive( $active_player, '' );
            
            return;
        }

        throw new feException( "Zombie mode not supported at this game state: ".$statename );
    }
    
///////////////////////////////////////////////////////////////////////////////////:
////////// DB upgrade
//////////

    /*
        upgradeTableDb:
        
        You don't have to care about this until your game has been published on BGA.
        Once your game is on BGA, this method is called everytime the system detects a game running with your old
        Database scheme.
        In this case, if you change your Database scheme, you just have to apply the needed changes in order to
        update the game database and allow the game to continue to run with your new version.
    
    */
    
    function upgradeTableDb( $from_version )
    {
        // $from_version is the current version of this game database, in numerical form.
        // For example, if the game was running with a release of your game named "140430-1345",
        // $from_version is equal to 1404301345
        
        // Example:
//        if( $from_version <= 1404301345 )
//        {
//            // ! important ! Use DBPREFIX_<table_name> for all tables
//
//            $sql = "ALTER TABLE DBPREFIX_xxxxxxx ....";
//            self::applyDbUpgradeToAllDB( $sql );
//        }
//        if( $from_version <= 1405061421 )
//        {
//            // ! important ! Use DBPREFIX_<table_name> for all tables
//
//            $sql = "CREATE TABLE DBPREFIX_xxxxxxx ....";
//            self::applyDbUpgradeToAllDB( $sql );
//        }
//        // Please add your future database scheme changes here
//
//


    }    
}
