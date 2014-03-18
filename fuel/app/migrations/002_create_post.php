<?php

namespace Fuel\Migrations;

class Create_post
{
	public function up()
	{
		\DBUtil::create_table('blog_post', array(
			'id'          => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'name'        => array('constraint' => 255, 'type' => 'varchar'),
			'slug'        => array('constraint' => 255, 'type' => 'varchar'),
			'content'     => array('type' => 'text'),
			'category_id' => array('constraint' => 11, 'type' => 'int'),
			'user_id'     => array('constraint' => 11, 'type' => 'int'),
			'created_at'  => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at'  => array('constraint' => 11, 'type' => 'int', 'null' => true),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('blog_post');
	}
}