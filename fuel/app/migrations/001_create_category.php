<?php

namespace Fuel\Migrations;

class Create_category
{
	public function up()
	{
		\DBUtil::create_table('blog_category', array(
			'id'         => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'name'       => array('constraint' => 255, 'type' => 'varchar'),
			'slug'       => array('constraint' => 255, 'type' => 'varchar'),
			'post_count' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
		), array('id'));

		\Model_Category::forge(array('name' => 'Category #1', 'slug' => 'category-1', 'post_count' => 3))->save();
		\Model_Category::forge(array('name' => 'Category #2', 'slug' => 'category-2', 'post_count' => 1))->save();
		\Model_Category::forge(array('name' => 'Category #3', 'slug' => 'category-3', 'post_count' => 0))->save();
		\Model_Category::forge(array('name' => 'Category #4', 'slug' => 'category-4', 'post_count' => 0))->save();
	}

	public function down()
	{
		\DBUtil::drop_table('blog_category');
	}
}