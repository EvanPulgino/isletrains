/**
 *------
 * BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
 * IsleTrains implementation : © Evan Pulgino <evan.pulgino@gmail.com>
 *
 * This code has been produced on the BGA studio platform for use on http://boardgamearena.com.
 * See http://en.boardgamearena.com/#!doc/Studio for more information.
 * -----
 *
 * isletrains.js
 *
 * IsleTrains user interface script
 * 
 * In this file, you are describing the logic of your user interface, in Javascript language.
 *
 */

var isDebug = window.location.host == 'studio.boardgamearena.com';
var debug = isDebug ? console.info.bind(window.console) : function(){};
define([
    "dojo","dojo/_base/declare",
    "ebg/core/gamegui",
    "ebg/counter",
    g_gamethemeurl + "modules/js/iotActionManager.js",
    g_gamethemeurl + "modules/js/iotCardManager.js",
    g_gamethemeurl + "modules/js/iotIslandManager.js",
    g_gamethemeurl + "modules/js/iotPassengerManager.js",
    g_gamethemeurl + "modules/js/iotPlayerManager.js",
    g_gamethemeurl + "modules/js/iotProgressManager.js",
    g_gamethemeurl + "modules/js/iotTicketManager.js",
    g_gamethemeurl + "modules/js/iotUtilities.js",
],
function (dojo, declare) {
    return declare("bgagame.isletrains", ebg.core.gamegui, {
        constructor: function () {
            this.actionManager = new iot.actionManager(this);
            this.cardManager = new iot.cardManager(this);
            this.islandManager = new iot.islandManager(this);
            this.passengerManager = new iot.passengerManager(this);
            this.playerManager = new iot.playerManager(this);
            this.progressManager = new iot.progressManager(this);
            this.ticketManager = new iot.ticketManager(this);
            this.utilities = new iot.utilities(this);
        },
        
        /*
            setup:
            
            This method must set up the game user interface according to current game situation specified
            in parameters.
            
            The method is called each time the game interface is displayed to a player, ie:
            _ when the game starts
            _ when a player refreshes the game page (F5)
            
            "gamedatas" argument contains all datas retrieved by your "getAllDatas" PHP method.
        */
        
        setup: function(gamedata)
        {
            debug('GAMEDATA', gamedata);
            
            // Import constants to JS
            this.utilities.defineGlobalConstants(gamedata.constants);

            // Setup all elements
            this.islandManager.setup(gamedata);
            this.ticketManager.setup(gamedata);
            this.passengerManager.setup(gamedata);
            this.playerManager.setup(gamedata);
            this.progressManager.setup(gamedata);
            this.cardManager.setup(gamedata);
 
            // Setup game notifications to handle (see "setupNotifications" method below)
            this.setupNotifications();
        },
       

        ///////////////////////////////////////////////////
        //// Game & client states
        
        // onEnteringState: this method is called each time we are entering into a new game state.
        //                  You can use this method to perform some user interface changes at this moment.
        //
        onEnteringState: function(stateName, args)
        {
            switch(stateName)
            {
                case PLAYER_TURN:
                    if (this.isCurrentPlayerActive()) {
                        this.setupPlayerTurn(args.args);
                    }
                    break;
                case PLAYER_DISCARD:
                    if (this.isCurrentPlayerActive()) {
                        this.setupPlayerEndTurnDiscard();
                    }
                    break;
                default:
                    break;
            }
        },

        // onLeavingState: this method is called each time we are leaving a game state.
        //                 You can use this method to perform some user interface changes at this moment.
        //
        onLeavingState: function(stateName)
        {            
            switch(stateName)
            {
            
            /* Example:
            
            case 'myGameState':
            
                // Hide the HTML block we are displaying only during this game state
                dojo.style( 'my_html_block_id', 'display', 'none' );
                
                break;
           */
           
           
            case 'dummmy':
                break;
            }               
        }, 

        // onUpdateActionButtons: in this method you can manage "action buttons" that are displayed in the
        //                        action status bar (ie: the HTML links in the status bar).
        //        
        onUpdateActionButtons: function(stateName, args)
        {                      
            if(this.isCurrentPlayerActive())
            {            
                switch(stateName)
                {
/*               
                 Example:
 
                 case 'myGameState':
                    
                    // Add 3 action buttons in the action status bar:
                    
                    this.addActionButton( 'button_1_id', _('Button 1 label'), 'onMyMethodToCall1' ); 
                    this.addActionButton( 'button_2_id', _('Button 2 label'), 'onMyMethodToCall2' ); 
                    this.addActionButton( 'button_3_id', _('Button 3 label'), 'onMyMethodToCall3' ); 
                    break;
*/
                }
            }
        },        

        ///////////////////////////////////////////////////
        //// Utility methods

        highlightBuildCards: function (args)
        {
            const canSpend = args.cardsInHand.length - 1;
            for (let cardsInHandKey in args.cardsInHand) {
                const card = args.cardsInHand[cardsInHandKey];
                if (this.cardManager.canBuild(card, args.cardsInTrain, canSpend)) {
                    const cardId = 'iot_card_' + card.id;
                    dojo.addClass(cardId, 'iot-clickable');
                }
            }
        },

        highlightDeliveryCards: function (args)
        {

        },

        highlightLoadCards: function (args)
        {
            for (let cardsInTrainKey in args.cardsInTrain) {
                const card = args.cardsInTrain[cardsInTrainKey];
                if (this.cardManager.canLoad(card, args.cardsInHand, args.passengers)) {
                    const cardId = 'iot_card_' + card.id;
                    dojo.addClass(cardId, 'iot-clickable');
                }
            }
        },

        highlightTakeCards: function()
        {
            dojo.addClass('iot_deck_counter_container', 'iot-clickable');
            this.connect($('iot_deck_counter_container'), 'onclick', 'onTakeTopCard');
            const displayCards = dojo.query('#iot_card_display > div');
            for (let displayCardsKey in displayCards) {
                const displayCard = displayCards[displayCardsKey];
                const id = displayCard.id;
                if (id) {
                    dojo.addClass(id, 'iot-clickable');
                    this.connect($(id), 'onclick', 'onTakeCard');
                }
            }
        },
        
        setupPlayerEndTurnDiscard: function ()
        {
            const handCards = dojo.query('#iot_current_player_hand > div');
            for (let handCardsKey in handCards) {
                const handCard = handCards[handCardsKey];
                const id = handCard.id;
                if (id) {
                    dojo.addClass(id, 'iot-clickable');
                    this.connect($(id), 'onclick', 'onEndTurnDiscardCard');
                }
            }
        },

        setupPlayerTurn: function (args)
        {
            this.highlightTakeCards();
            this.highlightBuildCards(args);
            this.highlightLoadCards(args);
        },


        ///////////////////////////////////////////////////
        //// Player's action
        
        /*
        
            Here, you are defining methods to handle player's action (ex: results of mouse click on 
            game objects).
            
            Most of the time, these methods:
            _ check the action is possible at this game state.
            _ make a call to the game server
        
        */
        
        onEndTurnDiscardCard: function (event)
        {
            console.log(this.checkAction(END_TURN_DISCARD));
            dojo.stopEvent(event);
            const cardId = event.target.attributes['card_id'].value;
            this.utilities.triggerPlayerAction(END_TURN_DISCARD, { cardId: cardId });
        },
            
        onTakeCard: function (event)
        {
            dojo.stopEvent(event);
            const cardId = event.target.attributes['card_id'].value;
            this.actionManager.performAction(DRAW_CARD, { cardId: cardId });
        },

        onTakeTopCard: function (event)
        {
            dojo.stopEvent(event);
            this.actionManager.performAction(DRAW_DECK_CARD, {});
        },

        
        ///////////////////////////////////////////////////
        //// Reaction to cometD notifications

        /*
            setupNotifications:
            
            In this method, you associate each of your game notifications with your local method to handle it.
            
            Note: game notification names correspond to "notifyAllPlayers" and "notifyPlayer" calls in
                  your isletrains.game.php file.
        
        */
        setupNotifications: function()
        {            
            // TODO: here, associate your game notifications with local methods
            
            // Example 1: standard notification handling
            // dojo.subscribe( 'cardPlayed', this, "notif_cardPlayed" );
            
            // Example 2: standard notification handling + tell the user interface to wait
            //            during 3 seconds after calling the method in order to let the players
            //            see what is happening in the game.
            // dojo.subscribe( 'cardPlayed', this, "notif_cardPlayed" );
            // this.notifqueue.setSynchronous( 'cardPlayed', 3000 );
            // 
        },  
        
        // TODO: from this point and below, you can write your game notifications handling methods
        
        /*
        Example:
        
        notif_cardPlayed: function( notif )
        {
            console.log( 'notif_cardPlayed' );
            console.log( notif );
            
            // Note: notif.args contains the arguments specified during you "notifyAllPlayers" / "notifyPlayer" PHP call
            
            // TODO: play the card in the user interface.
        },    
        
        */
   });             
});
