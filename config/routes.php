<?php

return array(


    'stock/([0-9]+)' => 'stock/view/$1', //actionView in StockController with 1 parameters

	'album/([0-9]+)'=> 'albums/album/$1', //actionAlbum в AlbumsController

	'stock/page-([0-9]+)' => 'stock/index/$1', //actionIndex in StockController with parameter for paginator
	'service' => 'service/index', //actionIndex in ServiceController
	'albums'=> 'albums/index',
	'([a-zA-z0-9]+)'=>'site/index',
	''=>'site/index',
);