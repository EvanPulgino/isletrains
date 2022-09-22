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
    'dojo/on',
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
                this.createCard(card, cardDiv, card.locationArg * -1, false, false);
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
                this.createCard(card, cardDiv, card.locationArg * -1, true, false);
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

            this.setupNotifications();
        },

        createCard: function (card, parentDiv, order, faceup = true, tooltip = true) {
            this.game.utilities.placeBlock(CARD_TEMPLATE, parentDiv, {
                CARD_ID: card.id,
                CARD_CLASS: faceup ? card.cssClass : 'iot-card-back',
                CARD_ORDER: order,
            });
            if (tooltip) {
                this.createCardTooltip(card);
            }
        },

        createDeckCounter: function (deckCount) {
            this.deckCounter.create('iot_deck_counter');
            this.deckCounter.setValue(deckCount);
        },

        createCardTooltip: function (card) {
            const args = this.getTooltipArgs(card);
            this.game.addTooltipHtml('iot_card_' + card.id, this.game.utilities.formatBlock(TRAIN_TOOLTIP_TEMPLATE, args));
        },

        getTooltipArgs: function (card)
        { 
            return {
                CARD_ID: card.id,
                CARD_NAME: card.name,
                CARD_COST: card.cost,
                POINTS_ROW: this.getTooltipPointsRow(card),
                CARGO_ICON: this.getTooltipResourceIcon(card.cargo),
                WEIGHT_ROW: this.getTooltipWeightRow(card),
                CARGO_ROWS: this.getTooltipCargoRows(card),
                PASSENGER_ROW: this.getTooltipPassengerRow(card),
                CARD_ABILITY: this.getTooltipAbility(card),
            };
        },

        getTooltipAbility: function (card)
        { 
            let tooltip = '';
            for (let actionTypesKey in card.actionTypes) {
                const actionType = card.actionTypes[actionTypesKey];
                if (tooltip.length == 0) {
                    tooltip = actionType.actionTooltip;
                } else {
                    tooltip = tooltip + ' AND ' + actionType.actionTooltip;
                }
            }
            
            return tooltip;
        },

        getTooltipCargoRows: function (card)
        { 
            if (card.capacity > 0) {
                return '<div id="tooltip_capacity_' + card.id + '" class="iot-card-tooltip-row"><span class="iot-card-tooltip-label">' + CARGO_CAPACITY_LABEL + ': </span>' + card.capacity + '</div><div id="tooltip_holds_' + card.id + '" class="iot-card-tooltip-row"><span class="iot-card-tooltip-label">' + CARGO_ACCEPTED_LABEL + ': </span>' + this.getTooltipResourceIcon(card.holds) + '</div>';
            }
            return '';
        },

        getTooltipPassengerRow: function (card)
        { 
            if (card.passengers > 0) {
                return '<div id="tooltip_passengers_' + card.id + '" class="iot-card-tooltip-row"><span class="iot-card-tooltip-label">' + PASSENGERS_LABEL + ': </span>' + card.passengers + '</div>';
            }
            return '';
        },

        getTooltipPointsRow: function (card)
        { 
            if (card.type != BUILDING) {
                return '<div id="tooltip_points_'+card.id+'" class="iot-card-tooltip-row"><span class="iot-card-tooltip-label">'+POINTS_LABEL+': </span>'+card.points+'</div>';
            }
            return '';
        },

        getTooltipResourceIcon: function (resource)
        { 
            switch (resource) {
                case ANY:
                    return '<span class="iot-resource-icon iot-coal"></span> \/ <span class="iot-resource-icon iot-oil"></span> \/ <span class="iot-resource-icon iot-box"></span>'
                case BOX:
                    return '<span class="iot-resource-icon iot-box"></span>';
                case COAL:
                    return '<span class="iot-resource-icon iot-coal"></span>';
                case OIL:
                    return '<span class="iot-resource-icon iot-oil"></span>';
                case PASSENGER:
                    return '<span class="iot-resource-icon iot-passenger-cargo"></span>';
                default:
                    return '';
            }
        },

        getTooltipWeightRow: function (card)
        { 
            if (card.weight != 0) {
                const label = card.weight > 0 ? ENGINE_CAPACITY_LABEL : WEIGHT_LABEL;
                const val = Math.abs(card.weight);
                return '<div id="tooltip_weight_' + card.id + '" class="iot-card-tooltip-row"><span class="iot-card-tooltip-label">' + label + ': </span>' + val + '</div>';
            }
            return '';
        },

        incrementDeckCounter: function (delta)
        {
            this.deckCounter.incValue(delta);
        },

        setupNotifications: function ()
        {
            dojo.subscribe(DRAW_CARD, this, 'notif_drawCard');
        },

        notif_drawCard: function (notif)
        {
            const playerId = this.game.getActivePlayerId();
            const card = notif.args.card;
            const cardElement = 'iot_card_' + card.id;
            const fromDeck = notif.args.fromDeck;

            if (this.game.isCurrentPlayerActive()) {
                const activePlayerHand = 'iot_current_player_hand';

                $(cardElement).style.removeProperty('order');
                dojo.setStyle(cardElement, 'order', card.type);

                this.attachToNewParent(cardElement, activePlayerHand);
                var moveCard = this.slideToObject(cardElement, activePlayerHand).play();
                if (fromDeck) {
                    dojo.removeClass(cardElement, 'iot-card-back');
                    dojo.addClass(cardElement, card.cssClass);
                }
                on(moveCard, "End", function () {
                    $(cardElement).style.removeProperty('top');
                    $(cardElement).style.removeProperty('left');
                })
            } else {
                const activePlayerCardCounter = 'iot_hand_card_count_container_' + playerId;
                this.game.slideToObjectAndDestroy(cardElement, activePlayerCardCounter);
            }

            if (fromDeck) {
                this.incrementDeckCounter(-1);
            }
            this.game.playerManager.incrementPlayerHandCounter(playerId, 1);
        },
    });
});