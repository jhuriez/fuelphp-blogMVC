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

		\Model_Post::forge(array(
			'name' => 'The route of All Evil',
			'slug' => 'the-route-of-all-evil',
			'content' => "Five hours? Aw, man! Couldn't you just get me the death penalty? Daylight and everything. What's with you kids? Every other day it's food, food, food. Alright, I'll get you some stupid food.

## Bendin' in the Wind

![1][4]

Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, modi, libero, earum, fugiat beatae ipsa quae accusamus eligendi minima eos sint consequuntur voluptate nihil inventore voluptatum? Possimus neque similique quam.

Nemo, aliquam non nulla corporis veritatis molestiae omnis nobis dolores dicta dolorum accusamus porro ipsum rem tempora maxime quisquam accusantium facilis saepe consequatur qui doloribus iusto distinctio perspiciatis modi voluptatum?

Illum temporibus natus cumque recusandae non fugiat quisquam fuga repellendus. Quas, esse, a rem possimus vero sequi fugit non dolor corrupti in similique repudiandae excepturi quidem perspiciatis soluta amet qui?

  * Fetal stemcells, aren't those controversial?
  * Yes! In your face, Gandhi!
  * The key to victory is discipline, and that means a well made bed. You will practice until you can make your bed in your sleep.

### Why Must I Be a Crustacean in Love?

![2][5]

We're rescuing ya. I'm Santa Claus! Have you ever tried just turning off the TV, sitting down with your children, and hitting them? Calculon is gonna kill us and it's all everybody else's fault! I just want to talk. It has nothing to do with mating. Fry, that doesn't make sense. Ummm…to eBay?

#### Attack of the Killer App

Why would I want to know that? It's toe-tappingly tragic! You won't have time for sleeping, soldier, not with all the bed making you'll be doing. I've got to find a way to escape the horrible ravages of youth. Suddenly, I'm going to the bathroom like clockwork, every three hours. And those jerks at Social Security stopped sending me checks. Now 'I'' have to pay ''them'! I was all of history's great robot actors - Acting Unit 0.8; Thespomat; David Duchovny! Five hours? Aw, man! Couldn't you just get me the death penalty?

  1. But, like most politicians, he promised more than he could deliver.
  2. Calculon is gonna kill us and it's all everybody else's fault!
  3. Bender?! You stole the atom.

##### A Tale of Two Santas

Kif might! I wish! It's a nickel. OK, this has gotta stop. I'm going to remind Fry of his humanity the way only a woman can. Kif, I have mated with a woman. Inform the men. Look, everyone wants to be like Germany, but do we really have the pure strength of 'will'?


   [4]: http://lorempicsum.com/futurama/200/150/1
   [5]: http://lorempicsum.com/futurama/200/150/2
   [6]: http://lorempicsum.com/futurama/100/100/4
   [7]: http://lorempicsum.com/futurama/100/100/5

  ",
			'category_id' => 1,
			'user_id' => 1
		))->save();

		\Model_Post::forge(array(
			'name' => 'Post 1',
			'slug' => 'post-1',
			'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ligula augue, congue eu diam ut, interdum bibendum mi. Etiam fringilla, diam id vestibulum lobortis, libero ipsum laoreet massa, varius egestas lorem nunc hendrerit nulla. Donec tincidunt nisi odio, vel facilisis justo adipiscing sed. Nulla imperdiet ligula ac ligula fringilla tempor. Pellentesque posuere nulla hendrerit arcu tempor feugiat. Pellentesque magna massa, rutrum eu quam sed, imperdiet ultrices sapien. Nulla at neque ut erat porta feugiat. Nunc rhoncus pretium nisi, bibendum accumsan diam auctor vel. Mauris egestas porta felis, non tempus nibh feugiat fermentum. Aenean luctus sit amet nisi vel volutpat. In rhoncus vulputate fringilla. Nullam id lectus lacus.

Donec posuere, nisl in consectetur convallis, tellus massa sagittis metus, vel tincidunt diam arcu rhoncus metus. Nam at turpis ac urna volutpat vulputate nec nec velit. Maecenas nec venenatis velit, ac eleifend risus. Quisque eu mi nec ante mollis vehicula. Aliquam a eros vel turpis rhoncus elementum ac eu mi. Nunc congue tempus velit sit amet ultrices. Praesent at lacinia purus. Nullam eu dui commodo, facilisis nisi vel, hendrerit lacus. In nec sapien in dolor ullamcorper pharetra. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In magna libero, mattis at accumsan id, fermentum vel dolor. Mauris fermentum egestas bibendum. Integer feugiat at quam quis congue. Duis iaculis purus sit amet felis pulvinar, id ultricies ante scelerisque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',
			'category_id' => 1,
			'user_id' => 1,
		))->save();

		\Model_Post::forge(array(
			'name' => 'Post 2',
			'slug' => 'post-2',
			'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ligula augue, congue eu diam ut, interdum bibendum mi. Etiam fringilla, diam id vestibulum lobortis, libero ipsum laoreet massa, varius egestas lorem nunc hendrerit nulla. Donec tincidunt nisi odio, vel facilisis justo adipiscing sed. Nulla imperdiet ligula ac ligula fringilla tempor. Pellentesque posuere nulla hendrerit arcu tempor feugiat. Pellentesque magna massa, rutrum eu quam sed, imperdiet ultrices sapien. Nulla at neque ut erat porta feugiat. Nunc rhoncus pretium nisi, bibendum accumsan diam auctor vel. Mauris egestas porta felis, non tempus nibh feugiat fermentum. Aenean luctus sit amet nisi vel volutpat. In rhoncus vulputate fringilla. Nullam id lectus lacus.

Donec posuere, nisl in consectetur convallis, tellus massa sagittis metus, vel tincidunt diam arcu rhoncus metus. Nam at turpis ac urna volutpat vulputate nec nec velit. Maecenas nec venenatis velit, ac eleifend risus. Quisque eu mi nec ante mollis vehicula. Aliquam a eros vel turpis rhoncus elementum ac eu mi. Nunc congue tempus velit sit amet ultrices. Praesent at lacinia purus. Nullam eu dui commodo, facilisis nisi vel, hendrerit lacus. In nec sapien in dolor ullamcorper pharetra. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In magna libero, mattis at accumsan id, fermentum vel dolor. Mauris fermentum egestas bibendum. Integer feugiat at quam quis congue. Duis iaculis purus sit amet felis pulvinar, id ultricies ante scelerisque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',
			'category_id' => 1,
			'user_id' => 1,
		))->save();

		\Model_Post::forge(array(
			'name' => 'Post 3',
			'slug' => 'post-3',
			'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ligula augue, congue eu diam ut, interdum bibendum mi. Etiam fringilla, diam id vestibulum lobortis, libero ipsum laoreet massa, varius egestas lorem nunc hendrerit nulla. Donec tincidunt nisi odio, vel facilisis justo adipiscing sed. Nulla imperdiet ligula ac ligula fringilla tempor. Pellentesque posuere nulla hendrerit arcu tempor feugiat. Pellentesque magna massa, rutrum eu quam sed, imperdiet ultrices sapien. Nulla at neque ut erat porta feugiat. Nunc rhoncus pretium nisi, bibendum accumsan diam auctor vel. Mauris egestas porta felis, non tempus nibh feugiat fermentum. Aenean luctus sit amet nisi vel volutpat. In rhoncus vulputate fringilla. Nullam id lectus lacus.

Donec posuere, nisl in consectetur convallis, tellus massa sagittis metus, vel tincidunt diam arcu rhoncus metus. Nam at turpis ac urna volutpat vulputate nec nec velit. Maecenas nec venenatis velit, ac eleifend risus. Quisque eu mi nec ante mollis vehicula. Aliquam a eros vel turpis rhoncus elementum ac eu mi. Nunc congue tempus velit sit amet ultrices. Praesent at lacinia purus. Nullam eu dui commodo, facilisis nisi vel, hendrerit lacus. In nec sapien in dolor ullamcorper pharetra. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In magna libero, mattis at accumsan id, fermentum vel dolor. Mauris fermentum egestas bibendum. Integer feugiat at quam quis congue. Duis iaculis purus sit amet felis pulvinar, id ultricies ante scelerisque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',
			'category_id' => 2,
			'user_id' => 1,
		))->save();

	}

	public function down()
	{
		\DBUtil::drop_table('blog_post');
	}
}