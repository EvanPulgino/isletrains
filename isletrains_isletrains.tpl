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
    <div id="iot_cards_panel">
        <div id="iot_deck_container">
            <span id="iot_deck_counter"></span>
            <div id="iot_deck"></div>
        </div>
        <div id="iot_card_display" class="whiteblock"></div>
        <div id="iot_discard"></div>
    </div>
    <div id="iot_progress_track" class="iot-progress-track">
        <div id="iot_progress_track_space_0"></div>
        <div id="iot_progress_track_space_1"></div>
        <div id="iot_progress_track_space_2"></div>
        <div id="iot_progress_track_space_3"></div>
        <div id="iot_progress_track_space_4"></div>
        <div id="iot_progress_track_space_5"></div>
        <div id="iot_progress_track_space_6"></div>
        <div id="iot_progress_track_space_7">
            <div id="iot_passenger_bag" class="iot-passenger-bag">
                <span id="iot_passenger_count"></span>
            </div>
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
    <div id="iot_current_player_hand" class="whiteblock">
        <h3 id="iot_player_hand_header" class="iot-player-header" style="color: black; background-image: linear-gradient(to right, whitesmoke, black)">
            Your Hand
        </h3>
    </div>
    <!-- BEGIN playertableau -->
    <div id="iot_player_tableau_{PLAYER_ID}" class="iot-player-tableau whiteblock">
        <h3 id="iot_player_header_{PLAYER_ID}" class="iot-player-header" style="color: #{PLAYER_COLOR}; background-image: linear-gradient(to right, whitesmoke, #{PLAYER_COLOR})">
            {PLAYER_NAME}
        </h3>
        <div id="iot_player_info_column_{PLAYER_ID}" class="iot-player-info-column">
            <div id="iot_point_symbol_{PLAYER_ID}" class="iot-point-symbol">
                <div id="iot_points_container_{PLAYER_ID}" class="iot-points-container">
                    <span id="iot_points_counter_{PLAYER_ID}" class="iot-points-counter"></span>
                </div>
            </div>
            <div id="iot_player_tracker_area_{PLAYER_ID}" class="iot-player-tracker-area">
                <div id="iot_player_card_symbol_{PLAYER_ID}" class="iot-mini-card">
                    <div id="iot_hand_card_count_container_{PLAYER_ID}" class="iot-hand-card-count-container">
                        <span id="iot_hand_card_counter_{PLAYER_ID}" class="iot-hand-card-counter"></span>
                    </div>
                </div>
                <div id="iot_player_weight_symbol_{PLAYER_ID}" class="iot-weight">
                    <div id="iot_weight_count_container_{PLAYER_ID}" class="iot-weight-count-container">
                        <span id="iot_weight_counter_{PLAYER_ID}" class="iot-weight-counter">0</span>
                    </div>
                </div>
            </div>
            <div id="iot_player_passenger_area_{PLAYER_ID}" class="iot-player-passenger-area"></div>
        </div>
        <div id="iot_player_train_{PLAYER_ID}" class="iot-player-train"></div>
    </div>
    <!-- END playertableau -->
</div>

<script type="text/javascript">

var jstpl_card = '<div id="iot_card_${CARD_ID}" class="iot-card ${CARD_CLASS}" style="order:${CARD_ORDER};"></div>';
var jstpl_island = '<div id="iot_island_${ISLAND_ID}" class="iot-island-card ${ISLAND_CLASS}"></div>';
var jstpl_passenger = '<div id="iot_passenger_${PASSENGER_ID}" class="iot-passenger ${PASSENGER_CLASS}"></div>';
var jstpl_train = '<div id="iot_progress_train" class="iot-progress-train"></div>';
var jstpl_ticket = '<div id="iot_ticket_${TICKET_TYPE}" class="iot-ticket-tile ${TICKET_CLASS}">\
        <div id="iot_ticket_${TICKET_TYPE}_space_1" class="iot-ticket-space"></div>\
        <div id="iot_ticket_${TICKET_TYPE}_space_2" class="iot-ticket-space"></div>\
        <div id="iot_ticket_${TICKET_TYPE}_space_3" class="iot-ticket-space"></div>\
    </div>';

</script>  

{OVERALL_GAME_FOOTER}
