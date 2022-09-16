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
-->

<div id="iot_layout">
    <div id="iot_progress_track" class="iot-progress-track">
        <div id="iot_progress_track_space_0"></div>
        <div id="iot_progress_track_space_1"></div>
        <div id="iot_progress_track_space_2"></div>
        <div id="iot_progress_track_space_3"></div>
        <div id="iot_progress_track_space_4"></div>
        <div id="iot_progress_track_space_5"></div>
        <div id="iot_progress_track_space_6"></div>
        <div id="iot_progress_track_space_7">
            <div id="iot_passenger_bag" class="iot-passenger-bag"></div>
        </div>
    </div>
    <div id="iot_island">
        <div id="iot_island_slot_empty"></div>
        <div id="iot_island_slot_7"></div>
        <div id="iot_island_slot_empty"></div>
        <div id="iot_island_slot_empty"></div>
        <div id="iot_island_slot_tiles_6" class="iot-island-slot-tiles">
            <div id="iot_destination_tile_6" class="iot-destination-tile iot-destination-tile-alpine-lodge"></div>
        </div>
        <div id="iot_island_slot_6"></div>
        <div id="iot_island_slot_5"></div>
        <div id="iot_island_slot_tiles_5" class="iot-island-slot-tiles">
            <div id="iot_destination_tile_5" class="iot-destination-tile iot-destination-tile-billingtons"></div>
        </div>
        <div id="iot_island_slot_tiles_4" class="iot-island-slot-tiles">
            <div id="iot_destination_tile_4" class="iot-destination-tile iot-destination-tile-cactus-mines"></div>
        </div>
        <div id="iot_island_slot_4"></div>
        <div id="iot_island_slot_3"></div>
        <div id="iot_island_slot_tiles_3" class="iot-island-slot-tiles">
            <div id="io_destination_tile_3" class="iot-destination-tile iot-destination-tile-devon-city"></div>
        </div>
        <div id="iot_island_slot_tiles_2" class="iot-island-slot-tiles">
            <div id="iot_destination_tile_2" class="iot-destination-tile iot-destination-tile-camp-eagle"></div>
        </div>
        <div id="iot_island_slot_2"></div>
        <div id="iot_island_slot_1"></div>
        <div id="iot_island_slot_tiles_1" class="iot-island-slot-tiles">
            <div id="iot_destination_tile_1" class="iot-destination-tile iot-destination-tile-flint-beach"></div>
        </div>
    </div>
</div>

<script type="text/javascript">

var jstpl_island = '<div id="iot_island_${ISLAND_ID}" class="iot-island-card ${ISLAND_CLASS}"></div>';
var jstpl_train = '<div id="iot_progress_train" class="iot-progress-train"></div>';
var jstpl_ticket = '<div id="iot_ticket_${TICKET_ID}" class="iot-ticket-tile ${TICKET_CLASS}">\
        <div id="iot_ticket_${TICKET_ID}_space_1" class="iot-ticket-space"></div>\
        <div id="iot_ticket_${TICKET_ID}_space_2" class="iot-ticket-space"></div>\
        <div id="iot_ticket_${TICKET_ID}_space_3" class="iot-ticket-space"></div>\
    </div>';

</script>  

{OVERALL_GAME_FOOTER}
