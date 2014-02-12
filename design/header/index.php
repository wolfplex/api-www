<?php

/**
 * Wolfplex API - Design API - Header provider
 */

///
/// Helper class to load CSS and HTML
///

/**
 * Static helper methods to print header elements
 */
class HeaderDesignElement {
    /**
     * Prints the CSS code
     *
     * @param string $accent The design accent
     */
    public static function printCSS ($accent) {
        echo trim(`php elements/css.php '$accent' | myth`), "\n";
    }

    /**
     * Prints the HTML code
     *
     * @param string $accent The URL to the homepage
     */
    public static function printHTML ($homeHref = '/') {
        include('elements/html.php');
    }

    /**
     * Determines if the specified framework value is valid
     *
     * @return bool true if the specified framework value is valid is valid ; otherwise, false.
     */
    public static function isValidFramework ($framework) {
        $acceptableFrameworks = [ 'html5', 'bootstrap2', 'foundation5' ];
        return in_array($framework, $acceptableFrameworks);
    }

    /**
     * Prints the specified header code
     *
     * @param string $content The content to print
     * @param string $framework The front-end framework to target
     * @param string $accent The design accent
     * @param string $homeHref The URL to the homepage
     */
    public static function printOutput ($content, $framework, $accent = '', $homeHref = '/') {
        if (!static::isValidFramework($framework)) {
            throw new InvalidArgumentException("Invalid value for framework parameter: \"$framework\"");
        }

        switch ($content) {
            case 'css':
                header('Content-Type: text/css');
                static::printCSS($accent);
                break;

            case 'html':
                static::printHTML($homeHref);
                break;

            case 'html-with-css':
                echo "<style>\n";
                static::printCSS($accent);
                echo "</style>\n";
                static::printHTML($homeHref);
                break;

            default:
                throw new InvalidArgumentException("Invalid value for content parameter: \"$content\"");
        }
    }
}

///
/// Procedural code
///

//Gets parameters
$content = isset($_REQUEST['content']) && $_REQUEST['content'] ? $_REQUEST['content'] : 'html-with-css';
$accent = isset($_REQUEST['accent']) ? $_REQUEST['accent'] : '';
$homeHref = isset($_REQUEST['homeHref']) ? $_REQUEST['homeHref'] : '';
$framework = isset($_REQUEST['framework']) && $_REQUEST['framework'] ? $_REQUEST['framework'] : 'html5';

//Runs API
HeaderDesignElement::printOutput($content, $framework, $accent);
