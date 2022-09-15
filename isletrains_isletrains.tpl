{OVERALL_GAME_HEADER}

<!-- 
--------
-- BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
-- IsleTrains implementation : © Evan Pulgino <evan.pulgino@gmail.com>
-- 
-- This code has been produced on the BGA studio platform for use on http://boardgamearena.com.
-- See http://en.boardgamearena.com/#!doc/Studio for more information.
-------

    isletrains_isletrains.tpl
    
    This is the HTML template of your game.
    
    Everything you are writing in this file will be displayed in the HTML page of your game user interface,
    in the "main game zone" of the screen.
    
    You can use in this template:
    _ variables, with the format {MY_VARIABLE_ELEMENT}.
    _ HTML block, with the BEGIN/END format
    
    See your "view" PHP file to check how to set variables and control blocks
    
    Please REMOVE this comment before publishing your game on BGA
-->

<div id="iot_layout">
    <div id="iot_island">
        <div id="iot_island_slot_empty"></div>
        <div id="iot_island_slot_7"></div>
        <div id="iot_island_slot_empty"></div>
        <div id="iot_island_slot_empty"></div>
        <div id="iot_island_slot_tiles_6">
            <div id="io_destination_tile_6" class="iot-destination-tile iot-destination-tile-alpine-lodge"></div>
        </div>
        <div id="iot_island_slot_6"></div>
        <div id="iot_island_slot_5"></div>
        <div id="iot_island_slot_tiles_5">
            <div id="io_destination_tile_5" class="iot-destination-tile iot-destination-tile-billingtons"></div>
        </div>
        <div id="iot_island_slot_tiles_4">
            <div id="io_destination_tile_4" class="iot-destination-tile iot-destination-tile-cactus-mines"></div>
        </div>
        <div id="iot_island_slot_4"></div>
        <div id="iot_island_slot_3"></div>
        <div id="iot_island_slot_tiles_3">
            <div id="io_destination_tile_3" class="iot-destination-tile iot-destination-tile-devon-city"></div>
        </div>
        <div id="iot_island_slot_tiles_2">
            <div id="io_destination_tile_2" class="iot-destination-tile iot-destination-tile-camp-eagle"></div>
        </div>
        <div id="iot_island_slot_2"></div>
        <div id="iot_island_slot_1"></div>
        <div id="iot_island_slot_tiles_1">
            <div id="io_destination_tile_1" class="iot-destination-tile iot-destination-tile-flint-beach"></div>
        </div>
    </div>
</div>

<script type="text/javascript">

var jstpl_island = '<div id="iot_island_${ISLAND_ID}" class="iot-island-card ${ISLAND_CLASS}"></div>';

</script>  

{OVERALL_GAME_FOOTER}
