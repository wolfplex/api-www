<?php

/**
 * Wolfplex Kiba One design available accents
 */
class KibaOneAccents {
	/**
	 * @var string The color to use like a white
	 */
	const WHITE = '#ffffff'; //We currently don't consider a grayish white for cyan compliance.

	/**
	 * @var string The color to use like a black
	 */
	const BLACK = '#000000'; //We currently don't consider a dark gray for citron compliance.

	/**
	 * Gets the accents
	 *
	 * @return array An array of all available accents, each item an array of three strings: the accent name, the accent
	 */
	public static function getAccents () {
		return [
			// Main colors
			[ 'black',           '#000000', '#4b4b50'     ],
			[ 'zedgray',         '#343434', static::WHITE ],
			[ 'bluegray',        '#4b4b50', static::WHITE ],

			// Colored accents
			[ 'cyan',            '#2ba6cb', static::WHITE ],
			[ 'lime',            '#e7fb03', static::BLACK ],
			[ 'magenta',         '#f608b0', static::WHITE ],
			[ 'craie',           '#f3f3f3', static::BLACK ],
			[ 'grenade',         '#f34723', static::WHITE ],
			[ 'sorbier',         '#fb8507', static::WHITE ],
			[ 'purple',          '#998cfb', static::WHITE ],
			[ 'citron',          '#fcff00', static::BLACK ],
			[ 'blueribbon',      '#1d62ff', static::WHITE ],
			[ 'bigstone',        '#142B43', static::WHITE ],
			[ 'red',             '#f60000', static::WHITE ],
		];
	}

	/**
	 * Determines if an accent exists
	 *
	 * @param string $accent The name fo the accent to determine the existence
	 * @return boolean true if the accent exists ; otherwise, false
	 */
	public static function exists ($accentName) {
		foreach (static::getAccents() as $candidateAccent) {
			if ($candidateAccent[0] == $accentName) {
				return true;
			}
		}
		return false;
	}

	/**
	 * Gets a color from the specified accent
	 *
	 * @param string $accentName The name of the accent
	 * @param int $index the color index  (0 for accent, 1 for headings)
	 * @return string The accent's requested color
	 */
	protected static function getColor ($accentName, $index) {
		++$index;
		foreach (static::getAccents() as $candidateAccent) {
			if ($candidateAccent[0] == $accentName) {
				return $candidateAccent[$index];
			}
		}
		throw new InvalidArgumentException("The accent doesn't exist: $accentName");
	}

	/**
	 * Gets the accent color
	 *
	 * @param string $accentName The name of the accent
	 * @return string The accent color
	 */
	public static function getAccentColor ($accentName) {
		return static::getColor($accentName, 0);
	}

	/**
	 * Gets the headings color
	 *
	 * @param string $accentName The name of the accent
	 * @return string The headings color
	 */
	public static function getHeadingsColor ($accentName) {
		return static::getColor($accentName, 1);
	}
}
