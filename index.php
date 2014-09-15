<?php

require 'vendor/autoload.php';

$app = new \Slim\Slim();

$app->get('/books/:id',	'getBook');
$app->post('/books', 'addBook');

$app->run();

function getBook($id) {

	$db = getConnection();

	$books = $db->books;

	$query = array('id' => $id);

	$cursor = $books->find($query);

	foreach($cursor as $mybook) {
		echo '{"nom": ' . json_encode($mybook["nom"]) . ',"auteur": ' . json_encode($mybook["auteur"]) . ',"note": ' . json_encode($mybook["note"]) . '}';
	}
}


function addBook() {

	$request = Slim\Slim::getInstance()->request();
	$body=$request->getBody();
	$newBook = json_decode($body);
	
	$db = getConnection();

	$books = $db->books;

	$books->insert($newBook);
}

function getConnection() {
	$uri = "mongodb://api_slim:motdepasse@xxxxxx.mongolab.com:31988/books";
	$options = array("connectTimeoutMS" => 30000);
	$client = new MongoClient($uri, $options );
	$db = $client->selectDB("books");
	return $db;
}

?>
