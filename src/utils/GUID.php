<?php

namespace jbr\SurrealDB;

use Hidehalo\Nanoid\Client;
use Hidehalo\Nanoid\GeneratorInterface;

$client = new Client();
$client->formattedId("1234567890abcdefghijklmnopqrstuvwxyz", 10);

class GUID {
	public function __construct() {
        return $client;
    }
}