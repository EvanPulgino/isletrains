/**
 *------
 * BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
 * IsleTrains implementation : © Evan Pulgino <evan.pulgino@gmail.com>
 *
 * This code has been produced on the BGA studio platform for use on http://boardgamearena.com.
 * See http://en.boardgamearena.com/#!doc/Studio for more information.
 * -----
 *
 * iotPlayerManager.js
 *
 * Script to manage Player content
 *
 */

var isDebug = window.location.host == 'studio.boardgamearena.com';
var debug = isDebug ? console.info.bind(window.console) : function(){};
define([
    'dojo',
    'dojo/_base/declare',
    'ebg/core/gamegui',
    'ebg/counter',
], (dojo, declare, on) => {
    return declare('iot.playerManager', ebg.core.gamegui, {
        constructor: function (game) {
            this.game = game;
            
            this.playerHandCounters = [];
            this.playerPointCounters = [];
            this.playerWeightCounters = [];
        },

        setup: function (gamedata) {
            for (let playerInfoKey in gamedata.playerInfo) {
                const player = gamedata.playerInfo[playerInfoKey];
                this.createPlayerHandCounter(player);
                this.createPlayerPointCounter(player);
                this.createPlayerWeightCounter(player);
            }
        },

        createPlayerHandCounter: function (player)
        { 
            this.playerHandCounters[player.id] = new ebg.counter();
            this.playerHandCounters[player.id].create('iot_hand_card_counter_' + player.id);
            this.playerHandCounters[player.id].setValue(0);
        },

        createPlayerPointCounter: function (player)
        { 
            this.playerPointCounters[player.id] = new ebg.counter();
            this.playerPointCounters[player.id].create('iot_points_counter_' + player.id);
            this.playerPointCounters[player.id].setValue(player.score);
        },

        createPlayerWeightCounter: function (player)
        { 
            this.playerWeightCounters[player.id] = new ebg.counter();
            this.playerWeightCounters[player.id].create('iot_weight_counter_' + player.id);
            this.playerWeightCounters[player.id].setValue(player.weight);
        },

        incrementPlayerHandCounterNoAnimation: function (playerId, delta)
        { 
            const currentValue = this.playerHandCounters[playerId].getValue();
            const newValue = currentValue + delta > 0 ? currentValue + delta : 0;
            this.playerHandCounters[playerId].setValue(newValue);
        },
    });
});