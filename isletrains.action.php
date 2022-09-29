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
 * isletrains.action.php
 *
 * IsleTrains main action entry point
 *
 *
 * In this file, you are describing all the methods that can be called from your
 * user interface logic (javascript).
 *       
 * If you define a method "myAction" here, then you can call it from your javascript code with:
 * this.ajaxcall( "/isletrains/isletrains/myAction.html", ...)
 *
 */
  
  
class action_isletrains extends APP_GameAction
 { 
   // Constructor: please do not modify
 	public function __default()
 	{
 	  if( self::isArg( 'notifwindow') )
 	  {
        $this->view = "common_notifwindow";
 	      $this->viewArgs['table'] = self::getArg( "table", AT_posint, true );
 	  }
 	  else
 	  {
        $this->view = "isletrains_isletrains";
        self::trace( "Complete reinitialization of board game" );
    }
  }

  public function drawCard()
  {
    self::setAjaxMode();
    $cardId = self::getArg("cardId", AT_posint, true);
    $this->game->cardManager->drawCard($cardId);
    self::ajaxResponse();
  }

  public function drawDeckCard()
  {
    self::setAjaxMode();
    $this->game->cardManager->drawDeckCard();
    self::ajaxResponse();
  }

  public function endTurnDiscard()
  {
    self::setAjaxMode();
    $cardId = self::getArg("cardId", AT_posint, true);
    $this->game->cardManager->endTurnDiscard($cardId);
    self::ajaxResponse();
  }

  public function selectAction()
  {
    self::setAjaxMode();
    $selectedAction = self::getArg("selectedAction", AT_alphanum, true);
    $this->game->actionManager->selectAction($selectedAction);
    self::ajaxResponse();
  }

}
  

