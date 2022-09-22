<?php
/**
 *------
 * BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
 * IsleTrains implementation : © Evan Pulgino <evan.pulgino@gmail.com>
 *
 * This code has been produced on the BGA studio platform for use on https://boardgamearena.com.
 * See http://en.doc.boardgamearena.com/Studio for more information.
 * -----
 * 
 * constants.inc.php
 * 
 * Constants defintion
 * 
 */

/**
 * ACTION TYPES
 */
define('ACTION', 'action');
define('BUILD', 'build');
define('DELIVER', 'deliver');
define('DELIVER_OR_LOAD', 'deliverOrLoad');
define('DISCARD_CARDS', 'discardCards');
define('DRAW_CARD', 'drawCard');
define('DRAW_DECK_CARD', 'drawDeckCard');
define('GAIN_ABILITY', 'gainAbility');
define('GAIN_END_GAME_SCORING', 'gainEndGameScoring');
define('LOAD', 'load');
define('TAKE_CARDS', 'takeCards');
define('TAKE_CARDS_DISCARD', 'takeCardsDiscard');
define('TAKE_PASSENGERS', 'takePassengers');
define('TAKE_VP', 'takeVP');

/**
 * CARD TYPES
 */
define('ENGINE', 1);
define('BOXCAR', 2);
define('COACH', 3);
define('HOPPER', 4);
define('TANKER', 5);
define('CABOOSE', 6);
define('BUILDING', 7);

/**
 * CARGO TYPES
 */
define('ANY', 1);
define('BOX', 2);
define('COAL', 3);
define('PASSENGER', 4);
define('OIL', 5);
define('NOTHING', 6);

/**
 * CONTRACT TYPES
 */
define('PRIMARY', 1);
define('SECONDARY', 2);

/**
 * CSS CLASSES
 */
define('HIDDEN', 'iot-hidden');

/**
 * DATABASE COLUMNS
 */
define('AVATAR', 'avatar');
define('COLOR', 'color');
define('ELIMINATED', 'eliminated');
define('ID', 'id');
define('LOCATION', 'location');
define('LOCATION_ARG', 'location_arg');
define('NATURAL_ORDER', 'naturalOrder');
define('NUMBER', 'nbr');
define('SCORE', 'score');
define('TYPE', 'type');
define('TYPE_ARG', 'type_arg');
define('ZOMBIE', 'zombie');

/**
 * GAME STATES
 */
define('STATE_GAME_SETUP', 1);
define('STATE_PLAYER_TURN', 2);
define('STATE_NEXT_PLAYER', 3);
define('STATE_GAME_END', 99);

/**
 * GAME STATE NAMES
 */
define('END_GAME', 'endGame');
define('NEXT_ACTION', 'nextAction');
define('NEXT_PLAYER', 'nextPlayer');
define('NEXT_TURN', 'nextTurn');
define('PLAYER_TURN', 'playerTurn');

/**
 * GLOBAL VARIABLES
 */
define('ACTION_NUMBER', 'actionNumber');
define('CURRENT_PROGRESS', 'currentProgress');
define('SELECTED_ACTION', 'selectedAction');

/**
 * FLIPPED STATUS
 */
define('UNFLIPPED', 1);
define('FLIPPED', 2);

/**
 * ISLAND TYPES
 */
define('FLINT_BEACH', 1);
define('CAMP_EAGLE', 2);
define('DEVON_CITY', 3);
define('CACTUS_MINES', 4);
define('BILLINGTONS', 5);
define('ALPINE_LODGE', 6);
define('RESEARCH_STATION', 7);

/**
 * LOCATIONS
 */
define('BAG', 'bag');
define('BUILDING_SLOT', 'buildingSlot');
define('DECK', 'deck');
define('DISCARD', 'discard');
define('DISPLAY', 'display');
define('HAND', 'hand');
define('ISLAND', 'island');
define('LEVEL_ONE_ENGINES', 'l1engines');
define('TABLEAU', 'tableau');
define('TICKET', 'ticket');
define('TRAIN', 'train');

/**
 * MATERIAL ATTRIBUTES
 */
define('ACTION_TYPE', 'actionType');
define('ACTION_TYPES', 'actionTypes');
define('ACTION_VALUE', 'actionValue');
define('CAPACITY', 'capacity');
define('CARGO', 'cargo');
define('CONTRACTS', 'contracts');
define('CONTRACT_TYPE', 'contractType');
define('COST', 'cost');
define('HOLDS', 'holds');
define('NAME', 'name');
define('ORDER', 'order');
define('PASSENGERS', 'passengers');
define('POINTS', 'points');
define('TICKET_SPACES', 'ticketSpaces');
define('WEIGHT', 'weight');

/**
 * JSTPL TEMPLATES
 */
define('CARD_TEMPLATE', 'jstpl_card');
define('ISLAND_TEMPLATE', 'jstpl_island');
define('ISLAND_TOOLTIP_TEMPLATE', 'jstpl_island_tooltip');
define('PASSENGER_TEMPLATE', 'jstpl_passenger');
define('TICKET_TEMPLATE', 'jstpl_ticket');
define('TRAIN_TEMPLATE', 'jstpl_train');
define('TRAIN_TOOLTIP_TEMPLATE', 'jstpl_train_tooltip');

/**
 * UI LABELS
 */
define('ABILITY_LABEL', clienttranslate('Ability'));
define('CARGO_LABEL', clienttranslate('Cargo'));
define('CARGO_ACCEPTED_LABEL', clienttranslate('Cargo Accepted'));
define('CARGO_CAPACITY_LABEL', clienttranslate('Cargo Capacity'));
define('COST_LABEL', clienttranslate('Cost'));
define('DELIVER_LABEL', clienttranslate('Deliver'));
define('ENGINE_CAPACITY_LABEL', clienttranslate('Engine Capacity'));
define('PASSENGERS_LABEL', clienttranslate('Passengers Upon Build'));
define('POINTS_LABEL', clienttranslate('Points'));
define('PRIMARY_CONTRACT_LABEL', clienttranslate('Primary Contract'));
define('SECONDARY_CONTRACT_LABEL', clienttranslate('Secondary Contract'));
define('WEIGHT_LABEL', clienttranslate('Weight'));
define('YOUR_HAND_LABEL', clienttranslate('Your Hand'));