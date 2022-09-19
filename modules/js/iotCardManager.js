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
    'ebg/counter',
], (dojo, declare, on) => {
    return declare('iot.cardManager', ebg.core.gamegui, {
        constructor: function (game) {
            this.game = game;

            this.deckCounter = new ebg.counter();
        },

        setup: function (gamedata) {

            // Create deck
            for (let cardsInDeckKey in gamedata.cardsInDeck) {
                const card = gamedata.cardsInDeck[cardsInDeckKey];
                const cardDiv = 'iot_deck';
                this.createCard(card, cardDiv, card.locationArg * -1, false);
            }
            this.createDeckCounter(gamedata.cardsInDeck.length);

            // Create card display
            for (let cardsInDisplayKey in gamedata.cardsInDisplay) {
                const card = gamedata.cardsInDisplay[cardsInDisplayKey];
                const cardDiv = 'iot_card_display';
                this.createCard(card, cardDiv, 0);
            }

            // Create discard
            for (let cardsInDiscardKey in gamedata.cardsInDiscard) {
                const card = gamedata.cardsInDiscard[cardsInDiscardKey];
                const cardDiv = 'iot_discard';
                this.createCard(card, cardDiv, card.locationArg * -1, false);
            }

            // Create hands
            for (let cardsInHandKey in gamedata.cardsInHand) {
                const card = gamedata.cardsInHand[cardsInHandKey];
                this.game.playerManager.incrementPlayerHandCounterNoAnimation(card.locationArg, 1);
                if (card.locationArg == this.game.getCurrentPlayerId()) {
                    const cardDiv = 'iot_current_player_hand';
                    this.createCard(card, cardDiv, card.type);

                }
            }

            // Create trains
            for (let cardsInTrainKey in gamedata.cardsInTrain) {
                const card = gamedata.cardsInTrain[cardsInTrainKey];
                const cardDiv = 'iot_player_train_' + card.locationArg;
                this.createCard(card, cardDiv, card.type);
            }
        },

        createCard: function (card, parentDiv, order, faceup = true) {
            this.game.utilities.placeBlock(CARD_TEMPLATE, parentDiv, {
                CARD_ID: card.id,
                CARD_CLASS: faceup ? card.cssClass : 'iot-card-back',
                CARD_ORDER: order,
            });
        },

        createDeckCounter: function (deckCount) {
            this.deckCounter.create('iot_deck_counter');
            this.deckCounter.setValue(deckCount);
        }
    });
});