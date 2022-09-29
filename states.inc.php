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
 * states.inc.php
 *
 * IsleTrains game states description
 *
 */

/*
   Game state machine is a tool used to facilitate game developpement by doing common stuff that can be set up
   in a very easy way from this configuration file.

   Please check the BGA Studio presentation about game state to understand this, and associated documentation.

   Summary:

   States types:
   _ activeplayer: in this type of state, we expect some action from the active player.
   _ multipleactiveplayer: in this type of state, we expect some action from multiple players (the active players)
   _ game: this is an intermediary state where we don't expect any actions from players. Your game logic must decide what is the next game state.
   _ manager: special type for initial and final state

   Arguments of game states:
   _ name: the name of the GameState, in order you can recognize it on your own code.
   _ description: the description of the current game state is always displayed in the action status bar on
                  the top of the game. Most of the time this is useless for game state with "game" type.
   _ descriptionmyturn: the description of the current game state when it's your turn.
   _ type: defines the type of game states (activeplayer / multipleactiveplayer / game / manager)
   _ action: name of the method to call when this game state become the current game state. Usually, the
             action method is prefixed by "st" (ex: "stMyGameStateName").
   _ possibleactions: array that specify possible player actions on this step. It allows you to use "checkAction"
                      method on both client side (Javacript: this.checkAction) and server side (PHP: self::checkAction).
   _ transitions: the transitions are the possible paths to go from a game state to another. You must name
                  transitions in order to use transition names in "nextState" PHP method, and use IDs to
                  specify the next game state for each transition.
   _ args: name of the method to call to retrieve arguments for this gamestate. Arguments are sent to the
           client side to be used on "onEnteringState" or to set arguments in the gamestate description.
   _ updateGameProgression: when specified, the game progression is updated (=> call to your getGameProgression
                            method).
*/

//    !! It is not a good idea to modify this file when a game is running !!

 
$machinestates = array(

    // The initial state. Please do not modify.
    STATE_GAME_SETUP => array(
        "name" => "gameSetup",
        "description" => "",
        "type" => "manager",
        "action" => "stGameSetup",
        "transitions" => array("" => STATE_PLAYER_SELECT_ACTION)
    ),

    STATE_PLAYER_SELECT_ACTION => array(
        "name" => PLAYER_SELECT_ACTION,
        "description" => clienttranslate('${actplayer} must select their ${actionNumberText} action'),
        "descriptionmyturn" => clienttranslate('${you} must select your ${actionNumberText} action'),
        "type" => "activeplayer",
        "args" => "argsPlayerSelectAction",
        "possibleactions" => array(SELECT_ACTION),
        "transitions" => array(
            SELECT_BUILD => STATE_PLAYER_BUILD_ACTION,
            SELECT_DELIVER => STATE_PLAYER_DELIVER_ACTION,
            SELECT_LOAD => STATE_PLAYER_LOAD_ACTION,
            SELECT_TAKE => STATE_PLAYER_TAKE_ACTION,
        )
    ),

    STATE_PLAYER_TAKE_ACTION => array(
        "name" => PLAYER_TAKE_ACTION,
        "description" => clienttranslate('${actplayer} must take a card or a passenger'),
        "descriptionmyturn" => clienttranslate('${you} must take a card or a passenger'),
        "type" => "activeplayer",
        "possibleactions" => array(DRAW_CARD, DRAW_DECK_CARD, DRAW_PASSENGER),
        "transitions" => array(END_ACTION => STATE_END_ACTION)
    ),

    STATE_END_ACTION => array(
        "name" => END_ACTION,
        "description" => '',
        "type" => "game",
        "action" => "stEndAction",
        "updateGameProgression" => true,
        "transitions" => array(PLAYER_SELECT_ACTION => STATE_PLAYER_SELECT_ACTION, PLAYER_DISCARD => STATE_PLAYER_DISCARD, NEXT_PLAYER => STATE_NEXT_PLAYER)
    ),

    STATE_PLAYER_DISCARD => array(
        "name" => PLAYER_DISCARD,
        "description" => clienttranslate('${actplayer} must discard ${discardNumber} cards'),
        "descriptionmyturn" => clienttranslate('${you} must discard ${discardNumber} cards'),
        "type" => "activeplayer",
        "args" => "argsPlayerTurnDiscard",
        "possibleactions" => array(END_TURN_DISCARD),
        "transitions" => array(NEXT_PLAYER => STATE_NEXT_PLAYER, PLAYER_DISCARD => STATE_PLAYER_DISCARD),
    ),

    STATE_NEXT_PLAYER => array(
        "name" => NEXT_PLAYER,
        "description" => '',
        "type" => "game",
        "action" => "stNextPlayer",
        "updateGameProgression" => true,   
        "transitions" => array( END_GAME => STATE_GAME_END, NEXT_TURN => STATE_PLAYER_SELECT_ACTION )
    ),

    // Final state.
    // Please do not modify (and do not overload action/args methods).
    STATE_GAME_END => array(
        "name" => "gameEnd",
        "description" => clienttranslate("End of game"),
        "type" => "manager",
        "action" => "stGameEnd",
        "args" => "argGameEnd"
    )

);



