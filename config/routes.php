<?php

return array(

	'album/([0-9]+)'=> 'albums/album/$1', //actionAlbum в AlbumsController
	'stock' => 'stock/index',
	'service' => 'service/index', //actionIndex in ServiceController
	'albums'=> 'albums/index',
	'([a-zA-z0-9]+)'=>'site/index',
	''=>'site/index',
);