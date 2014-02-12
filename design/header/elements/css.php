<?php

/**
 * Wolfplex API - Design API - Header provider - CSS
 */

///
/// Gets the accent to use
///

require('../kibaone/accents/KibaOneAccents.php');

$accent = 'bluegray';

if (isset($_REQUEST['accent'])) {
    $accent = $_REQUEST['accent'];
}

if (isset($argc) && $argc > 1 && $argv[1] !== '') {
    $accent = $argv[1];
}

try {
    $accentColor = KibaOneAccents::getAccentColor($accent);
} catch (InvalidArgumentException $ex) {
    die("Unknown accent: $accent");
}

///
/// CSS output
///

?>:root {
    var-accent-color: <?= $accentColor ?>;
    var-logo-color: #4b4b50;
}

/*  -------------------------------------------------------------
    Header
    - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -    */

#wolfplex-header {
    height: 105px;
    width: 100%;

    background-color: black;
    color: var(logo-color);

    border-top: 4px solid var(accent-color);

    background-position: right;
    background-image: url(//assets.wolfplex.org/kibaone/img/TunnelMetroFantome-169x105.jpg);
    background-repeat: no-repeat;
}

#wolfplex-logo {
    margin-left: 81px;
    margin-top: 13px;
}
