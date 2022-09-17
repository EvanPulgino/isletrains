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
            
            this.playerPointCounters = [];
        },

        setup: function (gamedata) {
            for (let playerInfoKey in gamedata.playerInfo) {
                const player = gamedata.playerInfo[playerInfoKey];
                this.createPlayerPointCounter(player);
            }
        },

        createPlayerPointCounter: function (player)
        { 
            this.playerPointCounters[player.id] = new ebg.counter();
            this.playerPointCounters[player.id].create('iot_points_counter_' + player.id);
            this.playerPointCounters[player.id].setValue(player.score);
        },
    });
});