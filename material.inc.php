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



