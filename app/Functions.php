<?php
    if (!function_exists('get_menu_active')) {
        /**
         * Permet d'activer un item de la navbar
         * @param string $page
         * @param string $active
         * @param string $class
         */
        function get_menu_active($page, $active, $class = "active") {
            return $page == $active ? $class : "";
        }
    }