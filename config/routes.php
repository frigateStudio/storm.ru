<?php

return array(

	//'([0-9]+)' => 'site/index/$1', // actionCategory в CatalogController
	//'category/([0-9]+)' => 'catalog/category/$1', // actionCategory в CatalogController
	//'([0-9]+)/([0-9]+)' => 'site/index/$1/$2',
	
	'service' => 'service/index', //actionIndex in ServiceController
	'record/do'=>'record/doRecord',
	'ajax/master/([0-9]+)'=> 'master/info/$1', //actionInfo в MasterController
	'record/([0-9]+)/([0-9]+)'=>'record/viewTable/$1/$2',
	'([a-zA-z0-9]+)'=>'site/index',
	''=>'site/index',


	

);