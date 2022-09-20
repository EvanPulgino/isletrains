<?php
/**
 *------
 * BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
 * IsleTrains implementation : © Evan Pulgino <evan.pulgino@gmail.com>
 * 
 * This code has been produced on the BGA studio platform for use on http://boardgamearena.com.
 * See http://en.boardgamearena.com/#!doc/Studio for more information.
 * -----
 *
 * material.inc.php
 *
 * IsleTrains game material description
 *
 * Here, you can describe the material of your game with PHP variables.
 *   
 * This file is loaded in your game logic class constructor, ie these variables
 * are available everywhere in your game logic code.
 *
 */

/**
 * CARDS
 */
$this->card = array(
  1 => array(
    NAME => clientTranslate('Level 1 Engine'),
    TYPE => ENGINE,
    TYPE_ARG => 1,
    NUMBER => 4,
    COST => 1,
    POINTS => 0,
    PASSENGERS => 0,
    CAPACITY => 1,
    HOLDS => PASSENGER,
    WEIGHT => 4,
    CARGO => ANY,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => TAKE_CARDS,
        ACTION_VALUE => 2
      ),
    ),
  ),
  2 => array(
    NAME => clienttranslate('Level 2 Engine'),
    TYPE => ENGINE,
    TYPE_ARG => 2,
    NUMBER => 6,
    COST => 3,
    POINTS => 2,
    PASSENGERS => 1,
    CAPACITY => 1,
    HOLDS => PASSENGER,
    WEIGHT => 6,
    CARGO => OIL,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => TAKE_CARDS,
        ACTION_VALUE => 2
      ),
    ),
  ),
  3 => array(
    NAME => clienttranslate('Level 3 Engine'),
    TYPE => ENGINE,
    TYPE_ARG => 3,
    NUMBER => 5,
    COST => 6,
    POINTS => 4,
    PASSENGERS => 1,
    CAPACITY => 1,
    HOLDS => PASSENGER,
    WEIGHT => 8,
    CARGO => BOX,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => TAKE_CARDS,
        ACTION_VALUE => 2
      ),
    ),
  ),
  4 => array(
    NAME => clienttranslate('Level 1 Boxcar'),
    TYPE => BOXCAR,
    TYPE_ARG => 1,
    NUMBER => 4,
    COST => 3,
    POINTS => 2,
    PASSENGERS => 0,
    CAPACITY => 1,
    HOLDS => BOX,
    WEIGHT => -2,
    CARGO => COAL,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => TAKE_CARDS,
        ACTION_VALUE => 4
      ),
    ),
  ),
  5 => array(
    NAME => clienttranslate('Level 2 Boxcar'),
    TYPE => BOXCAR,
    TYPE_ARG => 2,
    NUMBER => 3,
    COST => 6,
    POINTS => 5,
    PASSENGERS => 0,
    CAPACITY => 2,
    HOLDS => BOX,
    WEIGHT => -3,
    CARGO => OIL,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => TAKE_CARDS,
        ACTION_VALUE => 4
      ),
      array(
        ACTION_TYPE => LOAD,
        ACTION_VALUE => 1,
      ),
    ),
  ),
  6 => array(
    NAME => clienttranslate('Level 3 Boxcar'),
    TYPE => BOXCAR,
    TYPE_ARG => 3,
    NUMBER => 2,
    COST => 9,
    POINTS => 8,
    PASSENGERS => 0,
    CAPACITY => 3,
    HOLDS => BOX,
    WEIGHT => -2,
    CARGO => BOX,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => TAKE_CARDS,
        ACTION_VALUE => 5
      ),
      array(
        ACTION_TYPE => DISCARD_CARDS,
        ACTION_VALUE => 1,
      ),
      array(
        ACTION_TYPE => LOAD,
        ACTION_VALUE => 1,
      ),
    ),
  ),
  7 => array(
    NAME => clienttranslate('Level 1 Coach'),
    TYPE => COACH,
    TYPE_ARG => 1,
    NUMBER => 4,
    COST => 1,
    POINTS => 1,
    PASSENGERS => 1,
    CAPACITY => 1,
    HOLDS => PASSENGER,
    WEIGHT => 0,
    CARGO => COAL,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => TAKE_CARDS,
        ACTION_VALUE => 3
      ),
      array(
        ACTION_TYPE => TAKE_VP,
        ACTION_VALUE => 1,
      ),
    ),
  ),
  8 => array(
    NAME => clienttranslate('Level 2 Coach'),
    TYPE => COACH,
    TYPE_ARG => 2,
    NUMBER => 3,
    COST => 4,
    POINTS => 2,
    PASSENGERS => 2,
    CAPACITY => 2,
    HOLDS => PASSENGER,
    WEIGHT => -1,
    CARGO => OIL,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => TAKE_CARDS,
        ACTION_VALUE => 3
      ),
      array(
        ACTION_TYPE => TAKE_VP,
        ACTION_VALUE => 2,
      ),
    ),
  ),
  9 => array(
    NAME => clienttranslate('Level 3 Coach'),
    TYPE => COACH,
    TYPE_ARG => 3,
    NUMBER => 2,
    COST => 7,
    POINTS => 3,
    PASSENGERS => 3,
    CAPACITY => 3,
    HOLDS => PASSENGER,
    WEIGHT => 0,
    CARGO => BOX,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => TAKE_CARDS,
        ACTION_VALUE => 3
      ),
      array(
        ACTION_TYPE => TAKE_VP,
        ACTION_VALUE => 3,
      ),
    ),
  ),
  10 => array(
    NAME => clienttranslate('Level 1 Hopper'),
    TYPE => HOPPER,
    TYPE_ARG => 1,
    NUMBER => 4,
    COST => 1,
    POINTS => 2,
    PASSENGERS => 0,
    CAPACITY => 1,
    HOLDS => COAL,
    WEIGHT => -1,
    CARGO => COAL,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => TAKE_CARDS,
        ACTION_VALUE => 3
      ),
      array(
        ACTION_TYPE => DISCARD_CARDS,
        ACTION_VALUE => 1,
      ),
    ),
  ),
  11 => array(
    NAME => clienttranslate('Level 2 Hopper'),
    TYPE => HOPPER,
    TYPE_ARG => 2,
    NUMBER => 3,
    COST => 4,
    POINTS => 5,
    PASSENGERS => 0,
    CAPACITY => 2,
    HOLDS => COAL,
    WEIGHT => -2,
    CARGO => OIL,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => TAKE_CARDS,
        ACTION_VALUE => 2
      ),
      array(
        ACTION_TYPE => BUILD,
        ACTION_VALUE => 1,
      ),
    ),
  ),
  12 => array(
    NAME => clienttranslate('Level 3 Hopper'),
    TYPE => HOPPER,
    TYPE_ARG => 3,
    NUMBER => 2,
    COST => 7,
    POINTS => 8,
    PASSENGERS => 0,
    CAPACITY => 3,
    HOLDS => COAL,
    WEIGHT => -1,
    CARGO => BOX,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => TAKE_CARDS,
        ACTION_VALUE => 2
      ),
      array(
        ACTION_TYPE => ACTION,
        ACTION_VALUE => 1,
      ),
    ),
  ),
  13 => array(
    NAME => clienttranslate('Level 1 Tanker'),
    TYPE => TANKER,
    TYPE_ARG => 1,
    NUMBER => 4,
    COST => 2,
    POINTS => 2,
    PASSENGERS => 0,
    CAPACITY => 1,
    HOLDS => OIL,
    WEIGHT => -1,
    CARGO => COAL,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => TAKE_CARDS,
        ACTION_VALUE => 3
      ),
    ),
  ),
  14 => array(
    NAME => clienttranslate('Level 2 Tanker'),
    TYPE => TANKER,
    TYPE_ARG => 2,
    NUMBER => 3,
    COST => 5,
    POINTS => 5,
    PASSENGERS => 0,
    CAPACITY => 2,
    HOLDS => OIL,
    WEIGHT => -2,
    CARGO => OIL,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => TAKE_CARDS,
        ACTION_VALUE => 3
      ),
      array(
        ACTION_TYPE => DELIVER,
        ACTION_VALUE => 1
      ),
    ),
  ),
  15 => array(
    NAME => clienttranslate('Level 3 Tanker'),
    TYPE => TANKER,
    TYPE_ARG => 3,
    NUMBER => 2,
    COST => 8,
    POINTS => 8,
    PASSENGERS => 0,
    CAPACITY => 3,
    HOLDS => OIL,
    WEIGHT => -1,
    CARGO => BOX,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => TAKE_CARDS,
        ACTION_VALUE => 3
      ),
      array(
        ACTION_TYPE => DELIVER_OR_LOAD,
        ACTION_VALUE => 1
      ),
    ),
  ),
  16 => array(
    NAME => clienttranslate('Caboose 1'),
    TYPE => CABOOSE,
    TYPE_ARG => 1,
    NUMBER => 1,
    COST => 3,
    POINTS => 2,
    PASSENGERS => 1,
    CAPACITY => 0,
    HOLDS => NOTHING,
    WEIGHT => -2,
    CARGO => BOX,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => GAIN_ABILITY,
        ACTION_VALUE => 1
      ),
    ),
  ),
  17 => array(
    NAME => clienttranslate('Caboose 2'),
    TYPE => CABOOSE,
    TYPE_ARG => 2,
    NUMBER => 1,
    COST => 3,
    POINTS => 2,
    PASSENGERS => 1,
    CAPACITY => 0,
    HOLDS => NOTHING,
    WEIGHT => -2,
    CARGO => COAL,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => GAIN_ABILITY,
        ACTION_VALUE => 2
      ),
    ),
  ),
  18 => array(
    NAME => clienttranslate('Caboose 3'),
    TYPE => CABOOSE,
    TYPE_ARG => 3,
    NUMBER => 1,
    COST => 3,
    POINTS => 2,
    PASSENGERS => 1,
    CAPACITY => 1,
    HOLDS => ANY,
    WEIGHT => -2,
    CARGO => COAL,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => GAIN_ABILITY,
        ACTION_VALUE => 3
      ),
    ),
  ),
  19 => array(
    NAME => clienttranslate('Caboose 4'),
    TYPE => CABOOSE,
    TYPE_ARG => 4,
    NUMBER => 1,
    COST => 3,
    POINTS => 2,
    PASSENGERS => 1,
    CAPACITY => 0,
    HOLDS => NOTHING,
    WEIGHT => -2,
    CARGO => COAL,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => GAIN_ABILITY,
        ACTION_VALUE => 4
      ),
    ),
  ),
  20 => array(
    NAME => clienttranslate('Caboose 5'),
    TYPE => CABOOSE,
    TYPE_ARG => 5,
    NUMBER => 1,
    COST => 3,
    POINTS => 2,
    PASSENGERS => 1,
    CAPACITY => 0,
    HOLDS => NOTHING,
    WEIGHT => -2,
    CARGO => COAL,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => GAIN_ABILITY,
        ACTION_VALUE => 5
      ),
    ),
  ),
  21 => array(
    NAME => clienttranslate('Caboose 6'),
    TYPE => CABOOSE,
    TYPE_ARG => 6,
    NUMBER => 1,
    COST => 3,
    POINTS => 1,
    PASSENGERS => 1,
    CAPACITY => 0,
    HOLDS => NOTHING,
    WEIGHT => 2,
    CARGO => OIL,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => GAIN_ABILITY,
        ACTION_VALUE => 6
      ),
    ),
  ),
  22 => array(
    NAME => clienttranslate('Caboose 7'),
    TYPE => CABOOSE,
    TYPE_ARG => 7,
    NUMBER => 1,
    COST => 3,
    POINTS => 2,
    PASSENGERS => 1,
    CAPACITY => 0,
    HOLDS => NOTHING,
    WEIGHT => -2,
    CARGO => COAL,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => GAIN_ABILITY,
        ACTION_VALUE => 7
      ),
    ),
  ),
  23 => array(
    NAME => clienttranslate('Caboose 8'),
    TYPE => CABOOSE,
    TYPE_ARG => 8,
    NUMBER => 1,
    COST => 3,
    POINTS => 0,
    PASSENGERS => 2,
    CAPACITY => 0,
    HOLDS => NOTHING,
    WEIGHT => -2,
    CARGO => COAL,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => GAIN_ABILITY,
        ACTION_VALUE => 8
      ),
    ),
  ),
  24 => array(
    NAME => clienttranslate('Caboose 9'),
    TYPE => CABOOSE,
    TYPE_ARG => 9,
    NUMBER => 1,
    COST => 3,
    POINTS => 3,
    PASSENGERS => 1,
    CAPACITY => 0,
    HOLDS => NOTHING,
    WEIGHT => -2,
    CARGO => OIL,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => GAIN_ABILITY,
        ACTION_VALUE => 9
      ),
    ),
  ),
  25 => array(
    NAME => clienttranslate('Caboose 10'),
    TYPE => CABOOSE,
    TYPE_ARG => 10,
    NUMBER => 1,
    COST => 3,
    POINTS => 2,
    PASSENGERS => 1,
    CAPACITY => 0,
    HOLDS => NOTHING,
    WEIGHT => -2,
    CARGO => BOX,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => GAIN_ABILITY,
        ACTION_VALUE => 10
      ),
    ),
  ),
  26 => array(
    NAME => clienttranslate('Bank'),
    TYPE => BUILDING,
    TYPE_ARG => 1,
    NUMBER => 1,
    COST => 6,
    POINTS => 0,
    PASSENGERS => 0,
    CAPACITY => 0,
    HOLDS => NOTHING,
    WEIGHT => 0,
    CARGO => ANY,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => GAIN_END_GAME_SCORING,
        ACTION_VALUE => 1
      ),
    ),
  ),
  27 => array(
    NAME => clienttranslate('Coal Factory'),
    TYPE => BUILDING,
    TYPE_ARG => 2,
    NUMBER => 1,
    COST => 6,
    POINTS => 0,
    PASSENGERS => 0,
    CAPACITY => 0,
    HOLDS => NOTHING,
    WEIGHT => 0,
    CARGO => ANY,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => GAIN_END_GAME_SCORING,
        ACTION_VALUE => 2
      ),
    ),
  ),
  28 => array(
    NAME => clienttranslate('Customs House'),
    TYPE => BUILDING,
    TYPE_ARG => 3,
    NUMBER => 1,
    COST => 6,
    POINTS => 0,
    PASSENGERS => 0,
    CAPACITY => 0,
    HOLDS => NOTHING,
    WEIGHT => 0,
    CARGO => ANY,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => GAIN_END_GAME_SCORING,
        ACTION_VALUE => 3
      ),
    ),
  ),
  29 => array(
    NAME => clienttranslate('Grand Central'),
    TYPE => BUILDING,
    TYPE_ARG => 4,
    NUMBER => 1,
    COST => 6,
    POINTS => 0,
    PASSENGERS => 0,
    CAPACITY => 0,
    HOLDS => NOTHING,
    WEIGHT => 0,
    CARGO => ANY,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => GAIN_END_GAME_SCORING,
        ACTION_VALUE => 4
      ),
    ),
  ),
  30 => array(
    NAME => clienttranslate('Middle Station'),
    TYPE => BUILDING,
    TYPE_ARG => 5,
    NUMBER => 1,
    COST => 6,
    POINTS => 0,
    PASSENGERS => 0,
    CAPACITY => 0,
    HOLDS => NOTHING,
    WEIGHT => 0,
    CARGO => ANY,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => GAIN_END_GAME_SCORING,
        ACTION_VALUE => 5
      ),
    ),
  ),
  31 => array(
    NAME => clienttranslate('Northern Station'),
    TYPE => BUILDING,
    TYPE_ARG => 6,
    NUMBER => 1,
    COST => 6,
    POINTS => 0,
    PASSENGERS => 0,
    CAPACITY => 0,
    HOLDS => NOTHING,
    WEIGHT => 0,
    CARGO => ANY,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => GAIN_END_GAME_SCORING,
        ACTION_VALUE => 6
      ),
    ),
  ),
  32 => array(
    NAME => clienttranslate('Oil Refinery'),
    TYPE => BUILDING,
    TYPE_ARG => 7,
    NUMBER => 1,
    COST => 6,
    POINTS => 0,
    PASSENGERS => 0,
    CAPACITY => 0,
    HOLDS => NOTHING,
    WEIGHT => 0,
    CARGO => ANY,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => GAIN_END_GAME_SCORING,
        ACTION_VALUE => 7
      ),
    ),
  ),
  33 => array(
    NAME => clienttranslate('Rail Yard'),
    TYPE => BUILDING,
    TYPE_ARG => 8,
    NUMBER => 1,
    COST => 6,
    POINTS => 0,
    PASSENGERS => 0,
    CAPACITY => 0,
    HOLDS => NOTHING,
    WEIGHT => 0,
    CARGO => ANY,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => GAIN_END_GAME_SCORING,
        ACTION_VALUE => 8
      ),
    ),
  ),
  34 => array(
    NAME => clienttranslate('Southern Station'),
    TYPE => BUILDING,
    TYPE_ARG => 9,
    NUMBER => 1,
    COST => 6,
    POINTS => 0,
    PASSENGERS => 0,
    CAPACITY => 0,
    HOLDS => NOTHING,
    WEIGHT => 0,
    CARGO => ANY,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => GAIN_END_GAME_SCORING,
        ACTION_VALUE => 9
      ),
    ),
  ),
  35 => array(
    NAME => clienttranslate('Town Hall'),
    TYPE => BUILDING,
    TYPE_ARG => 10,
    NUMBER => 1,
    COST => 6,
    POINTS => 0,
    PASSENGERS => 0,
    CAPACITY => 0,
    HOLDS => NOTHING,
    WEIGHT => 0,
    CARGO => ANY,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => GAIN_END_GAME_SCORING,
        ACTION_VALUE => 10
      ),
    ),
  ),
  36 => array(
    NAME => clienttranslate('Time Engine'),
    TYPE => ENGINE,
    TYPE_ARG => 4,
    NUMBER => 1,
    COST => 8,
    POINTS => 5,
    PASSENGERS => 1,
    CAPACITY => 0,
    HOLDS => NOTHING,
    WEIGHT => 7,
    CARGO => ANY,
    ACTION_TYPES => array(
      array(
        ACTION_TYPE => TAKE_CARDS_DISCARD,
        ACTION_VALUE => 1
      ),
    ),
  ),
);

/**
 * ISLAND CARDS
 */
$this->island = array(
  FLINT_BEACH => array(
    NAME => clienttranslate('Flint Beach'),
    CONTRACTS => array(
      array(
        CONTRACT_TYPE => PRIMARY,
        POINTS => 6,
        CARGO => array(OIL, BOX)
      ),
      array(
        CONTRACT_TYPE => SECONDARY,
        POINTS => 11,
        CARGO => array(OIL, OIL, BOX, BOX)
      ),
      array(
        CONTRACT_TYPE => SECONDARY,
        POINTS => 10,
        CARGO => array(COAL, OIL, BOX, BOX)
      )
    ),
  ),
  CAMP_EAGLE => array(
    NAME => clienttranslate('Camp Eagle'),
    CONTRACTS => array(
      array(
        CONTRACT_TYPE => PRIMARY,
        POINTS => 7,
        CARGO => array(BOX, BOX)
      ),
      array(
        CONTRACT_TYPE => SECONDARY,
        POINTS => 14,
        CARGO => array(OIL, OIL, BOX, BOX, BOX)
      ),
      array(
        CONTRACT_TYPE => SECONDARY,
        POINTS => 10,
        CARGO => array(COAL, OIL, BOX, BOX)
      )
    ),
  ),
  DEVON_CITY => array(
    NAME => clienttranslate('Devon City'),
    CONTRACTS => array(
      array(
        CONTRACT_TYPE => PRIMARY,
        POINTS => 5,
        CARGO => array(OIL, OIL)
      ),
      array(
        CONTRACT_TYPE => SECONDARY,
        POINTS => 9,
        CARGO => array(COAL, COAL, OIL, OIL, OIL)
      ),
      array(
        CONTRACT_TYPE => SECONDARY,
        POINTS => 9,
        CARGO => array(COAL, OIL, OIL, BOX)
      )
    ),
  ),
  CACTUS_MINES => array(
    NAME => clienttranslate('Cactus Mines'),
    CONTRACTS => array(
      array(
        CONTRACT_TYPE => PRIMARY,
        POINTS => 4,
        CARGO => array(COAL, OIL)
      ),
      array(
        CONTRACT_TYPE => SECONDARY,
        POINTS => 9,
        CARGO => array(COAL, OIL, OIL, BOX)
      ),
      array(
        CONTRACT_TYPE => SECONDARY,
        POINTS => 7,
        CARGO => array(COAL, COAL, OIL, OIL)
      )
    ),
  ),
  BILLINGTONS => array(
    NAME => clienttranslate('Billington\'s'),
    CONTRACTS => array(
      array(
        CONTRACT_TYPE => PRIMARY,
        POINTS => 5,
        CARGO => array(COAL, BOX)
      ),
      array(
        CONTRACT_TYPE => SECONDARY,
        POINTS => 9,
        CARGO => array(COAL, COAL, BOX, BOX)
      ),
      array(
        CONTRACT_TYPE => SECONDARY,
        POINTS => 8,
        CARGO => array(COAL, COAL, OIL, BOX)
      )
    ),
  ),
  ALPINE_LODGE => array(
    NAME => clienttranslate('Alpine Lodge'),
    CONTRACTS => array(
      array(
        CONTRACT_TYPE => PRIMARY,
        POINTS => 4,
        CARGO => array(COAL, COAL)
      ),
      array(
        CONTRACT_TYPE => SECONDARY,
        POINTS => 10,
        CARGO => array(COAL, COAL, COAL, BOX, BOX)
      ),
      array(
        CONTRACT_TYPE => SECONDARY,
        POINTS => 8,
        CARGO => array(COAL, COAL, OIL, BOX)
      )
    ),
  ),
  RESEARCH_STATION => array(
    NAME => clienttranslate('Research Station'),
    CONTRACTS => array(
      array(
        CONTRACT_TYPE => PRIMARY,
        POINTS => 4,
        CARGO => array(ANY, ANY, ANY)
      ),
      array(
        CONTRACT_TYPE => SECONDARY,
        POINTS => 7,
        CARGO => array(ANY, ANY, ANY, ANY, ANY)
      )
    ),
  ),
);

/**
 * TICKET TILES
 */
$this->ticket = array(
  1 => array(
    TICKET_SPACES => array(
      array(
        ORDER => 1,
        ACTION_TYPES => array(
          array(
            ACTION_TYPE => TAKE_CARDS,
            ACTION_VALUE => 5
          )
        )
      ),
      array(
        ORDER => 2,
        ACTION_TYPES => array(
          array(
            ACTION_TYPE => TAKE_CARDS,
            ACTION_VALUE => 4
          )
        )
      ),
      array(
        ORDER => 3,
        ACTION_TYPES => array(
          array(
            ACTION_TYPE => TAKE_CARDS,
            ACTION_VALUE => 3
          )
        )
      )
    )
  ),
  2 => array(
    TICKET_SPACES => array(
      array(
        ORDER => 1,
        ACTION_TYPES => array(
          array(
            ACTION_TYPE => TAKE_CARDS,
            ACTION_VALUE => 2
          ),
          array(
            ACTION_TYPE => LOAD,
            ACTION_VALUE => 1
          )
        )
      ),
      array(
        ORDER => 2,
        ACTION_TYPES => array(
          array(
            ACTION_TYPE => TAKE_CARDS,
            ACTION_VALUE => 1
          ),
          array(
            ACTION_TYPE => LOAD,
            ACTION_VALUE => 1
          )
        )
      ),
      array(
        ORDER => 3,
        ACTION_TYPES => array(
          array(
            ACTION_TYPE => LOAD,
            ACTION_VALUE => 1
          )
        )
      )
    )
  ),
  3 => array(
    TICKET_SPACES => array(
      array(
        ORDER => 1,
        ACTION_TYPES => array(
          array(
            ACTION_TYPE => TAKE_CARDS,
            ACTION_VALUE => 5
          )
        )
      ),
      array(
        ORDER => 2,
        ACTION_TYPES => array(
          array(
            ACTION_TYPE => TAKE_VP,
            ACTION_VALUE => 2
          ),
          array(
            ACTION_TYPE => TAKE_CARDS,
            ACTION_VALUE => 2
          )
        )
      ),
      array(
        ORDER => 3,
        ACTION_TYPES => array(
          array(
            ACTION_TYPE => TAKE_VP,
            ACTION_VALUE => 2
          )
        )
      )
    )
  ),
  4 => array(
    TICKET_SPACES => array(
      array(
        ORDER => 1,
        ACTION_TYPES => array(
          array(
            ACTION_TYPE => TAKE_CARDS,
            ACTION_VALUE => 2
          ),
          array(
            ACTION_TYPE => BUILD,
            ACTION_VALUE => 1
          )
        )
      ),
      array(
        ORDER => 2,
        ACTION_TYPES => array(
          array(
            ACTION_TYPE => TAKE_CARDS,
            ACTION_VALUE => 1
          ),
          array(
            ACTION_TYPE => BUILD,
            ACTION_VALUE => 1
          )
        )
      ),
      array(
        ORDER => 3,
        ACTION_TYPES => array(
          array(
            ACTION_TYPE => BUILD,
            ACTION_VALUE => 1
          )
        )
      )
    )
  ),
  5 => array(
    TICKET_SPACES => array(
      array(
        ORDER => 1,
        ACTION_TYPES => array(
          array(
            ACTION_TYPE => TAKE_VP,
            ACTION_VALUE => 4
          )
        )
      ),
      array(
        ORDER => 2,
        ACTION_TYPES => array(
          array(
            ACTION_TYPE => TAKE_VP,
            ACTION_VALUE => 3
          )
        )
      ),
      array(
        ORDER => 3,
        ACTION_TYPES => array(
          array(
            ACTION_TYPE => TAKE_VP,
            ACTION_VALUE => 2
          )
        )
      )
    )
  ),
  6 => array(
    TICKET_SPACES => array(
      array(
        ORDER => 1,
        ACTION_TYPES => array(
          array(
            ACTION_TYPE => TAKE_VP,
            ACTION_VALUE => 4
          )
        )
      ),
      array(
        ORDER => 2,
        ACTION_TYPES => array(
          array(
            ACTION_TYPE => TAKE_VP,
            ACTION_VALUE => 2
          ),
          array(
            ACTION_TYPE => TAKE_CARDS,
            ACTION_VALUE => 2
          )
        )
      ),
      array(
        ORDER => 3,
        ACTION_TYPES => array(
          array(
            ACTION_TYPE => TAKE_CARDS,
            ACTION_VALUE => 3
          )
        )
      )
    )
  ),
  7 => array(
    TICKET_SPACES => array(
      array(
        ORDER => 1,
        ACTION_TYPES => array(
          array(
            ACTION_TYPE => TAKE_CARDS_DISCARD,
            ACTION_VALUE => 3
          )
        )
      ),
      array(
        ORDER => 2,
        ACTION_TYPES => array(
          array(
            ACTION_TYPE => TAKE_CARDS_DISCARD,
            ACTION_VALUE => 2
          )
        )
      ),
      array(
        ORDER => 3,
        ACTION_TYPES => array(
          array(
            ACTION_TYPE => TAKE_CARDS_DISCARD,
            ACTION_VALUE => 1
          )
        )
      )
    )
  ),
  8 => array(
    TICKET_SPACES => array(
      array(
        ORDER => 1,
        ACTION_TYPES => array(
          array(
            ACTION_TYPE => TAKE_CARDS,
            ACTION_VALUE => 3
          ),
          array(
            ACTION_TYPE => TAKE_PASSENGERS,
            ACTION_VALUE => 1
          )
        )
      ),
      array(
        ORDER => 2,
        ACTION_TYPES => array(
          array(
            ACTION_TYPE => TAKE_CARDS,
            ACTION_VALUE => 2
          ),
          array(
            ACTION_TYPE => TAKE_PASSENGERS,
            ACTION_VALUE => 1
          )
        )
      ),
      array(
        ORDER => 3,
        ACTION_TYPES => array(
          array(
            ACTION_TYPE => TAKE_CARDS,
            ACTION_VALUE => 2
          ),
          array(
            ACTION_TYPE => TAKE_VP,
            ACTION_VALUE => 1
          )
        )
      )
    )
  ),
  9 => array(
    TICKET_SPACES => array(
      array(
        ORDER => 1,
        ACTION_TYPES => array(
          array(
            ACTION_TYPE => TAKE_VP,
            ACTION_VALUE => 2
          ),
          array(
            ACTION_TYPE => TAKE_PASSENGERS,
            ACTION_VALUE => 1
          )
        )
      ),
      array(
        ORDER => 2,
        ACTION_TYPES => array(
          array(
            ACTION_TYPE => TAKE_VP,
            ACTION_VALUE => 1
          ),
          array(
            ACTION_TYPE => TAKE_PASSENGERS,
            ACTION_VALUE => 1
          )
        )
      ),
      array(
        ORDER => 3,
        ACTION_TYPES => array(
          array(
            ACTION_TYPE => TAKE_VP,
            ACTION_VALUE => 2
          )
        )
      )
    )
  ),
);

