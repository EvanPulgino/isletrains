/**
 *------
 * BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
 * IsleTrains implementation : © Evan Pulgino <evan.pulgino@gmail.com>
 *
 * This code has been produced on the BGA studio platform for use on http://boardgamearena.com.
 * See http://en.boardgamearena.com/#!doc/Studio for more information.
 * -----
 *
 * iotIslandManager.js
 *
 * Script to manage Island card elements
 *
 */

var isDebug = window.location.host == 'studio.boardgamearena.com';
var debug = isDebug ? console.info.bind(window.console) : function(){};
define([
    'dojo',
    'dojo/_base/declare',
    'ebg/core/gamegui',
], (dojo, declare, on) => {
    return declare('iot.islandManager', ebg.core.gamegui, {
        constructor: function (game) {
            this.game = game;
        },

        setup: function (gamedata) {
            // Create island map
            for (let islandsKey in gamedata.islands) {
                const island = gamedata.islands[islandsKey];
                const islandDiv = 'iot_island_slot_' + island.type;
                this.createIslandCard(island, islandDiv);
            }
        },

        createIslandCard: function (island, parentDiv) {
            this.game.utilities.placeBlock(ISLAND_TEMPLATE, parentDiv, {
                ISLAND_ID: island.id,
                ISLAND_CLASS: island.cssClass,
            });
        }
    });
});