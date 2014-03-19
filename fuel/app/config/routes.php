<?php
return array(
	'_root_'  => 'frontend/post/index',  // The default route
	'_404_'   => 'frontend/index/404',    // The main 404 route

	'backend' => 'backend/post',
	'backend/(:any)' => 'backend/$1',

	'user/login' => 'user/login',
	'user/logout' => 'user/logout',
	'favicon' => 'favicon',
	'(:any)' => 'frontend/post/show/$1',
);