<?php

$polylang = PLL();

function create_language($locale, $args = array())
{
    global $polylang;
    $languages = include PLL_SETTINGS_INC . '/languages.php';
    $values = $languages[$locale];
    $values['slug'] = $values['code'];
    $values['rtl'] = (int) ('rtl' === $values['dir']);
    $values['term_group'] = 0; // default term_group
    $args = array_merge($values, $args);
    $polylang->model->add_language($args);
    unset($GLOBALS['wp_settings_errors']); // Clean "errors"
}

create_language( 'en_US' );
create_language( 'fi' );
