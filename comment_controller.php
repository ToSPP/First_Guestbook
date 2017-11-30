<?php 
date_default_timezone_set('Europe/Moscow');
class Comment
{
	public $name;
	public $text;
	private $comments;
	
	public function __construct($name, $text)
	{		
		$this->setName($name);
		$this->setText($text);
		$query = "INSERT INTO comments (name, text) VALUES ('" . $this->name . "', '" . $this->text . "')";
		$this->mysqli_req($query);	
	}

	public function setName($name)
	{
		$this->name = strip_tags($name);
	}

	public function setText($text)
	{
		$this->text = htmlentities($text, ENT_QUOTES, "utf-8");
	}

	public static function show() 
	{
		$query = "SELECT name, text, created_at FROM comments";
		return $comments = self::mysqli_req($query)->fetch_all(MYSQLI_ASSOC);
	}

	private static function mysqli_req($query) {
		$mysqli = new mysqli("localhost", "root", "", "guestbook");
		$mysqli->set_charset("utf8");
		if ($mysqli->connect_errno) {
		    printf("Connect error: %s", $mysqli->connect_error);
		    exit();
		}
		return $mysqli->query($query);
		
	}
}
?>