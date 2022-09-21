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
 * isletrains.view.php
 *
 * This is your "view" file.
 *
 * The method "build_page" below is called each time the game interface is displayed to a player, ie:
 * _ when the game starts
 * _ when a player refreshes the game page (F5)
 *
 * "build_page" method allows you to dynamically modify the HTML generated for the game interface. In
 * particular, you can set here the values of variables elements defined in isletrains_isletrains.tpl (elements
 * like {MY_VARIABLE_ELEMENT}), and insert HTML block elements (also defined in your HTML template file)
 *
 * Note: if the HTML of your game interface is always the same, you don't have to place anything here.
 *
 */
  
require_once( APP_BASE_PATH."view/common/game.view.php" );
  
class view_isletrains_isletrains extends game_view
{
    protected function getGameName()
    {
        // Used for translations and stuff. Please do not modify.
        return "isletrains";
    }
    
  	function build_page( $viewArgs )
  	{		
        $template = self::getGameName().'_'.self::getGameName();
        $players = $this->game->playerManager->getPlayersInViewOrder();

        $this->page->begin_block($template, 'playertableau');
        foreach($players as $player) {
            $this->page->insert_block(
                'playertableau',
                array(
                    'PLAYER_ID' => $player->getId(),
                    'PLAYER_NAME' => $player->getName(),
                    'PLAYER_COLOR' => $player->getColor(),
                )
            );
        }

        $this->tpl['ABILITY'] = ABILITY_LABEL;
        $this->tpl['CARGO'] = CARGO_LABEL;
        $this->tpl['COST'] = COST_LABEL;
        $this->tpl['YOUR_HAND'] = YOUR_HAND_LABEL;
  	}
}
