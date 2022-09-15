/**
 *------
 * BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
 * IsleTrains implementation : © Evan Pulgino <evan.pulgino@gmail.com>
 *
 * This code has been produced on the BGA studio platform for use on http://boardgamearena.com.
 * See http://en.boardgamearena.com/#!doc/Studio for more information.
 * -----
 *
 * iotTicketManager.js
 *
 * Script to manage Ticket tile elements
 *
 */

var isDebug = window.location.host == 'studio.boardgamearena.com';
var debug = isDebug ? console.info.bind(window.console) : function(){};
define([
    'dojo',
    'dojo/_base/declare',
    'ebg/core/gamegui',
], (dojo, declare, on) => {
    return declare('iot.ticketManager', ebg.core.gamegui, {
        constructor: function (game) {
            this.game = game;
        },

        setup: function (gamedata) {
            // Create tickets
            for (let ticketsKey in gamedata.tickets) {
                const ticket = gamedata.tickets[ticketsKey];
                const ticketSlot = ticket.locationArg + 1;
                const ticketDiv = 'iot_island_slot_tiles_' + ticketSlot;
                this.createTicketTile(ticket, ticketDiv);
            }
        },

        createTicketTile: function (ticket, parentDiv) {
            this.game.utilities.placeBlock(TICKET_TEMPLATE, parentDiv, {
                TICKET_ID: ticket.id,
                TICKET_CLASS: ticket.cssClass,
            });
        }
    });
});