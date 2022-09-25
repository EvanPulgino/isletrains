/**
 *------
 * BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
 * IsleTrains implementation : © Evan Pulgino <evan.pulgino@gmail.com>
 *
 * This code has been produced on the BGA studio platform for use on http://boardgamearena.com.
 * See http://en.boardgamearena.com/#!doc/Studio for more information.
 * -----
 *
 * iotActionManager.js
 *
 * Script to manage actions
 *
 */

var isDebug = window.location.host == 'studio.boardgamearena.com';
var debug = isDebug ? console.info.bind(window.console) : function(){};
define([
    'dojo',
    'dojo/_base/declare',
    'ebg/core/gamegui',
], (dojo, declare) => {
    return declare('iot.actionManager', ebg.core.gamegui, {
        constructor: function (game) {
            this.game = game;
        }, 

        performAction: function (actionType, args)
        {
            // if (this.game.isCurrentPlayerActive() && this.game.checkAction(PERFORM_ACTION)) {
            //     this.disconnectAll();
            // }
            const actionArgs = JSON.stringify(args)
            this.game.utilities.triggerPlayerAction(PERFORM_ACTION, {actionType: actionType, actionArgs: actionArgs});
        },
        
    });
});