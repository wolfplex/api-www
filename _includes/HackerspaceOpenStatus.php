<?php
/**
 * Class to determine if the space is currently open or closed
 */
class HackerspaceOpenStatus {
	private $isOpen;
	public $date;
	public $who;
	public $comment;

	/**
	 * Initializes a new instance of the HackerspaceOpenStatus object
	 *
	 * @param bool $isOpen true if the space is open; otherwise, false
	 * @param int $date The unixtime of the last modification
	 * @param string $who The name of the last person to have updated the status
	 * @param string $comment The comment associated to this operation
	 */
	public function __construct ($isOpen, $date = null, $who = '', $comment = '') {
		$this->isOpen = $isOpen;
		$this->date = ($date === null) ? time() : $date;
		$this->who = $who;
		$this->comment = $comment;
	}

	/**
	 * Determines if the space is currently open or closed
	 *
	 * @return bool True if the space is currently open; otherwise, false.
	 */
	public function IsOpen () {
		return $this->isOpen;
	}
}

/**
 * Determines the hackerspace open status, using the wiki
 */
class MediaWikiHackerspaceOpenStatus extends HackerspaceOpenStatus {
	/**
	 * Initializes a new instance of the HackerspaceOpenStatus object
	 */
	public function __construct ($api_url, $page_title, $open_content = 'yes') {
		//Gets the last revision content and metadata from the wiki
		$url = "$api_url?action=query&prop=revisions&titles=$page_title&rvprop=timestamp|user|comment|content&format=json";
		$data = json_decode(file_get_contents($url), true);
		$data = array_pop($data['query']['pages']);
		$data = $data['revisions'][0];

		//Fills properties
		parent::__construct(
			$data['*'] == $open_content,
			strtotime($data['timestamp']),
			self::isIp($data['user']) ? '' : $data['user'],
			$data['comment']
		);
	}

	/**
	 * Determines if the expression is a valid IPv4 or IPv6
	 *
	 * @param string $expression The expression to validate
	 * @return bool true if the expression is a valid IP; otherwise, false.
	 */
	public static function isIp ($expression) {
		return
			preg_match('/^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/', $expression)
		||
			preg_match('/^(?>(?>([a-f0-9]{1,4})(?>:(?1)){7}|(?!(?:.*[a-f0-9](?>:|$)){8,})((?1)(?>:(?1)){0,6})?::(?2)?)|(?>(?>(?1)(?>:(?1)){5}:|(?!(?:.*[a-f0-9]:){6,})(?3)?::(?>((?1)(?>:(?1)){0,4}):)?)?(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[1-9]?[0-9])(?>\.(?4)){3}))$/iD', $expression);
		;
	}
}
