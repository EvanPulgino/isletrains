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
define('BUILD', 'build');
define('LOAD', 'load');
define('TAKE_CARDS', 'takeCards');
define('TAKE_CARDS_DISCARD', 'takeCardsDiscard');
define('TAKE_PASSENGERS', 'takePassengers');
define('TAKE_VP', 'takeVP');

/**
 * CARGO TYPES
 */
define('ANY', 1);
define('BOX', 2);
define('COAL', 3);
define('OIL', 4);

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
 * FLIPPED STATUS
 */
define('UNFLIPPED', 1);
define('FLIPPED', 2);

/**
 * LOCATIONS
 */
define('ISLAND', 'island');
define('TICKET', 'ticket');

/**
 * MATERIAL ATTRIBUTES
 */
define('ACTION_TYPE', 'actionType');
define('ACTION_TYPES', 'actionTypes');
define('ACTION_VALUE', 'actionValue');
define('CARGO', 'cargo');
define('CONTRACTS', 'contracts');
define('CONTRACT_TYPE', 'contractType');
define('NAME', 'name');
define('ORDER', 'order');
define('POINTS', 'points');
define('TICKET_SPACES', 'ticketSpaces');

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
 * JSTPL TEMPLATES
 */
define('ISLAND_TEMPLATE', 'jstpl_island');
define('TICKET_TEMPLATE', 'jstpl_ticket');