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
            this.createIslandTooltip(island);
        },

        createIslandTooltip: function (island)
        { 
            const args = this.getTooltipArgs(island);
            this.game.addTooltipHtml('iot_island_' + island.id, this.game.utilities.formatBlock(ISLAND_TOOLTIP_TEMPLATE, args));
        },

        getTooltipArgs: function (island)
        { 
            return {
                CARD_ID: island.id,
                CARD_NAME: island.name,
                CARD_CONTRACTS: this.getContractTooltipRows(island),
            };
        },

        getContractTooltipRows: function (island)
        { 
            let contractRows = '';
            for (let contractsKey in island.contracts) {
                const contract = island.contracts[contractsKey];
                const contractType = contract.type == PRIMARY ? PRIMARY_CONTRACT_LABEL : SECONDARY_CONTRACT_LABEL;
                contractRows = contractRows + '<div class="iot-card-tooltip-row"><span class="iot-card-tooltip-label">' + contractType + ': </span>' + this.getContractTooltipInfo(contract) + '</div>';
            }
            return contractRows;
        },

        getContractTooltipInfo: function (contract)
        { 
            let textInfo = '';
            for (let cargoKey in contract.cargo) {
                const cargo = contract.cargo[cargoKey];
                textInfo = textInfo + this.getTooltipResourceIcon(cargo);
            }
            textInfo = textInfo + '---> ' + contract.points + ' ' + POINTS_LABEL;
            return textInfo;
        },

        getTooltipResourceIcon: function (resource)
        { 
            switch (resource) {
                case ANY:
                    return '<span class="iot-resource-icon iot-any"></span>'
                case BOX:
                    return '<span class="iot-resource-icon iot-box"></span>';
                case COAL:
                    return '<span class="iot-resource-icon iot-coal"></span>';
                case OIL:
                    return '<span class="iot-resource-icon iot-oil"></span>';
                default:
                    return '';
            }
        },
    });
});