/**
 *------
 * BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
 * IsleTrains implementation : © Evan Pulgino <evan.pulgino@gmail.com>
 *
 * This code has been produced on the BGA studio platform for use on http://boardgamearena.com.
 * See http://en.boardgamearena.com/#!doc/Studio for more information.
 * -----
 *
 * iotCardManager.js
 *
 * Script to manage Card elements
 *
 */

var isDebug = window.location.host == 'studio.boardgamearena.com';
var debug = isDebug ? console.info.bind(window.console) : function(){};
define([
    'dojo',
    'dojo/_base/declare',
    'ebg/core/gamegui',
], (dojo, declare, on) => {
    return declare('iot.cardManager', ebg.core.gamegui, {
        constructor: function (game) {
            this.game = game;
        },

        setup: function (gamedata) {

            // Create deck
            for (let cardsInDeckKey in gamedata.cardsInDeck) {
                const card = gamedata.cardsInDeck[cardsInDeckKey];
                const cardDiv = 'iot_deck';
                this.createCard(card, cardDiv, false);
            }

            // Create card display
            for (let cardsInDisplayKey in gamedata.cardsInDisplay) {
                const card = gamedata.cardsInDisplay[cardsInDisplayKey];
                const cardDiv = 'iot_card_display';
                this.createCard(card, cardDiv);
            }

            // Create hands
            for (let cardsInHandKey in gamedata.cardsInHand) {
                const card = gamedata.cardsInHand[cardsInHandKey];
                if (card.locationArg == this.game.getCurrentPlayerId()) {
                    const cardDiv = 'iot_current_player_hand';
                    this.createCard(card, cardDiv);

                }
            }

            // Create trains
            for (let cardsInTrainKey in gamedata.cardsInTrain) {
                const card = gamedata.cardsInTrain[cardsInTrainKey];
                const cardDiv = 'iot_player_train_' + card.locationArg;
                this.createCard(card, cardDiv);
            }
        },

        createCard: function (card, parentDiv, faceup = true) {
            this.game.utilities.placeBlock(CARD_TEMPLATE, parentDiv, {
                CARD_ID: card.id,
                CARD_CLASS: faceup ? card.cssClass : 'iot-card-back',
                CARD_TYPE: card.type,
            });
        }
    });
});