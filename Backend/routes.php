<?php

$router->get('/listings', 'ListingController@listings');
$router->get('/listings/{id}', 'ListingController@listing');
