<?php

return array(

    'stock/([0-9]+)' => 'stock/view/$1', //actionView in StockController with 1 parameters
	'stock' => 'stock/index',
	'service' => 'service/index', //actionIndex in ServiceController
	'albums'=> 'albums/index',
	'([a-zA-z0-9]+)'=>'site/index',
	''=>'site/index',
);