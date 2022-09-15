/**
 *------
 * BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
 * IsleTrains implementation : © Evan Pulgino <evan.pulgino@gmail.com>
 *
 * This code has been produced on the BGA studio platform for use on http://boardgamearena.com.
 * See http://en.boardgamearena.com/#!doc/Studio for more information.
 * -----
 *
 * iotProgressManager.js
 *
 * Script to manage Progess tracker tile element
 *
 */

var isDebug = window.location.host == 'studio.boardgamearena.com';
var debug = isDebug ? console.info.bind(window.console) : function(){};
define([
    'dojo',
    'dojo/_base/declare',
    'ebg/core/gamegui',
], (dojo, declare, on) => {
    return declare('iot.progressManager', ebg.core.gamegui, {
        constructor: function (game) {
            this.game = game;
        },

        setup: function (gamedata) {
            dojo.addClass('iot_progress_track', 'iot-progress-track-' + gamedata.playerInfo.length);
            this.createTrain('iot_progress_track_space_' + gamedata.currentProgress);
        },

        createTrain: function (parentDiv) {
            this.game.utilities.placeBlock(TRAIN_TEMPLATE, parentDiv, { });
        }
    });
});