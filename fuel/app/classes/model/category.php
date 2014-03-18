<?php

class Model_Category extends \Orm\Model
{

    protected static $_properties = array(
        'id',
        'name' => array(
            'label' => 'Name',
            'default' => '',
            'null' => false,
            'validation' => array('required', 'min_length' => array(3)),
        ),
        'slug' => array(
            'label' => 'Slug',
            'default' => '',
            'null' => false,
            'validation' => array('required'),
        ),
        'post_count' => array(
            'form' => array('type' => false),
            'default' => 0,
            'null' => false,
            'validation' => array('is_numeric'),
        ),
        'created_at' => array(
            'form' => array('type' => false),
            'default' => 0,
            'null' => false,
        ),
        'updated_at' => array(
            'form' => array('type' => false),
            'default' => 0,
            'null' => false,
        ),
    );

    protected static $_conditions = array(
        'order_by' => array('name' => 'asc'),
    );

    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => false,
        ),
        'Orm\Observer_UpdatedAt' => array(
            'events' => array('before_update'),
            'mysql_timestamp' => false,
        ),
    );

    protected static $_table_name = 'blog_category';
    
    /**
     * Category HasMany Posts
     * 
     * @var array
     */
    protected static $_has_many = array(
        'posts' => array(
            'key_from' => 'id',
            'model_to' => 'Model_Post',
            'key_to' => 'category_id',
            'cascade_save' => false,
            'cascade_delete' => true,  // We delete all post from the category deleted
        ),
    );
    
}