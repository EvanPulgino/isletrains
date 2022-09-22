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
], (dojo, declare, on) => {
    return declare('iot.actionManager', ebg.core.gamegui, {
        constructor: function (game) {
            this.game = game;
        },

        canBuild: function (card, cardsInTrain, canSpend)
        {
            if (card.type != ENGINE && card.cost <= canSpend) {
                return true;
            }
            if (card.type != CABOOSE && card.type != BUILDING) {
                const highestCost = this.getHighestEligibleCost(card.type, cardsInTrain);
                if (highestCost > 0 && (card.cost - highestCost) <= canSpend) {
                    return true;
                }
            }
            return false;
        },

        canDeliver: function ()
        {

        },
        
        canLoad: function (card, cardsInHand, passengers)
        {
            if (card.holds == PASSENGER && passengers.length > 0) {
                return true;
            }

            for (let cardsInHandKey in cardsInHand) {
                const handCard = cardsInHand[cardsInHandKey];
                if (handCard.cargo == card.holds || handCard.cargo == ANY) {
                    return true;
                }
            }
        },

        getHighestEligibleCost: function (type, cardsInTrain)
        {
            let highestCost = 0;
            for (let cardsInTrainKey in cardsInTrain) {
                const card = cardsInTrain[cardsInTrainKey];
                if (card.type == type && card.cost > highestCost) {
                    highestCost = card.cost;
                }
            }
            return highestCost;
        },

        highlightBuildCards: function (args)
        {
            const canSpend = args.cardsInHand.length - 1;
            for (let cardsInHandKey in args.cardsInHand) {
                const card = args.cardsInHand[cardsInHandKey];
                if (this.canBuild(card, args.cardsInTrain, canSpend)) {
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
                if (this.canLoad(card, args.cardsInHand, args.passengers)) {
                    const cardId = 'iot_card_' + card.id;
                    dojo.addClass(cardId, 'iot-clickable');
                }
            }
        },

        highlightTakeCards: function()
        {
            dojo.addClass('iot_deck_counter_container', 'iot-clickable');
            this.connect($('iot_deck_counter_container'), 'onclick', 'onTakeTopCard');
            dojo.query('#iot_card_display > div').addClass('iot-clickable');
            dojo.query('#iot_card_display > div').connect('onclick', this, 'onTakeCard');
        },

        onTakeCard: function (event)
        {
            dojo.stopEvent(event);
            const cardId = event.target.attributes['card_id'].value;
            this.game.utilities.triggerPlayerAction(DRAW_CARD, { cardId: cardId });
        },

        onTakeTopCard: function (event)
        {
            dojo.stopEvent(event);
            this.game.utilities.triggerPlayerAction(DRAW_DECK_CARD, {});
        },

        setupPlayerTurn: function (args)
        {
            this.highlightTakeCards();
            this.highlightBuildCards(args);
            this.highlightLoadCards(args);
        },
    });
});