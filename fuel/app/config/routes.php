<?php
return array(
	'_root_'  => 'frontend/post/index',  // The default route
	'_404_'   => 'frontend/post/404',    // The main 404 route

	'/' => array('frontend/post/index', 'name' => 'homepage'),
	'admin' => array('backend/post', 'name' => 'admin'),
	'admin/post' => array('backend/post', 'name' => 'admin_post'),
	'admin/post/add' => array('backend/post/add', 'name' => 'admin_post_add'),
	'admin/post/add/(:id)' => array('backend/post/add/$1', 'name' => 'admin_post_edit'),
	'admin/post/delete/(:id)' => array('backend/post/delete/$1', 'name' => 'admin_post_delete'),
	'admin/(:any)' => 'backend/$1',

	'category/(:category)' => array('frontend/post/show_by_category/$1', 'name' => 'show_post_category'),
	'author/(:author)' => array('frontend/post/show_by_author/$1', 'name' => 'show_post_author'),

	'user/login' => array('user/login', 'name' => 'login'),
	'user/logout' => array('user/logout', 'name' => 'logout'),
	'favicon' => 'favicon',
	'(:segment)' => array('frontend/post/show/$1', 'name' => 'show_post'),
);