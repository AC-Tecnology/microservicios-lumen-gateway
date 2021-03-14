<?php

return [
	'authors' => [
		'base_uri' => env('AUTHORS_SERVICE_API_BASE_URL'),
		'secret' => env('AUTHORS_SERVICE_API_SECRET')
	],

	'books' => [
		'base_uri' => env('BOOKS_SERVICE_API_BASE_URL'),
		'secret' => env('BOOKS_SERVICE_API_SECRET')
	],

];