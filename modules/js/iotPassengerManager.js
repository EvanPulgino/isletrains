/**
 *------
 * BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
 * IsleTrains implementation : © Evan Pulgino <evan.pulgino@gmail.com>
 *
 * This code has been produced on the BGA studio platform for use on http://boardgamearena.com.
 * See http://en.boardgamearena.com/#!doc/Studio for more information.
 * -----
 *
 * iotPassengerManager.js
 *
 * Script to manage Passenger elements
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
    return declare('iot.passengerManager', ebg.core.gamegui, {
        constructor: function (game) {
            this.game = game;

            this.remainingPassengerCount = new ebg.counter();
        },
 
        setup: function (gamedata) {
            this.addTooltip('iot_passenger_bag', _('Passenger Bag'), '');

            this.remainingPassengerCount.create('iot_passenger_count');
            this.remainingPassengerCount.setValue(gamedata.remainingPassengers);

            // Create passengers controlled by players
            for (let tableauPassengersKey in gamedata.tableauPassengers) {
                const passenger = gamedata.tableauPassengers[tableauPassengersKey];
                const passengerDiv = 'iot_player_passenger_area_' + passenger.locationArg;
                this.createPassenger(passenger, passengerDiv);
            }

            // Create passengers on tickets
            for (let ticketPassengersKey in gamedata.ticketPassengers) {
                const passenger = gamedata.ticketPassengers[ticketPassengersKey];
                const passengerDiv = 'iot_ticket_' + passenger.type + '_space_' + passenger.locationArg;
                console.log(passengerDiv);
                this.createPassenger(passenger, passengerDiv);
            }
        },
 
        createPassenger: function (passenger, parentDiv) {
            this.game.utilities.placeBlock(PASSENGER_TEMPLATE, parentDiv, {
                PASSENGER_ID: passenger.id,
                PASSENGER_CLASS: passenger.cssClass,
            });
        }
    });
});