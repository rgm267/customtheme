<?php

$menu_locations = get_nav_menu_locations();
$menu_ID = isset($menu_locations['primary']) ? $menu_locations['primary'] : null;

$menu_items = null;
if ($menu_ID)
    $menu_items = wp_get_nav_menu_items($menu_ID);

if ($menu_items) {
    ?>
    <div id="primary-menu" class="menu">
        <?php
        foreach ($menu_items as $navItem)
            echo '<li><a href="' . $navItem->url . '" title="' . $navItem->title . '">' . $navItem->title . '</a></li>';
        ?>
    </div>
    <?php
}