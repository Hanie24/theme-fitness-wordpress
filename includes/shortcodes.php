<?php

function fitness_location_shortcode(){
    $location = get_field('ubicacion');

    ?>

    <div class="location">
        <input type="hidden" id="lat" value="<?php echo $location['lat']; ?>" />
        <input type="hidden" id="lng" value="<?php echo $location['lng']; ?>" />
        <input type="hidden" id="direction" value="<?php echo $location['address']; ?>" />
        <div id="map"></div>
    </div>

    <?php
}

add_shortcode('fitness_location', 'fitness_location_shortcode');

