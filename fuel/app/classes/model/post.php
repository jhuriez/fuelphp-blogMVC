<?php

class Model_Post extends \Orm\Model
{

    protected static $_properties = array(
        'id',
        'name' => array(
            'label' => 'Name',
            'null' => false,
            'validation' => array('required', 'min_length' => array(3)),
        ),
        'slug' => array(
            'label' => 'Slug',
            'form' => array('type' => false),
            'null' => false,
        ),
        'content' => array(
            'label' => 'Content',
            'null' => false,
            'validation' => array('required'),
        ),
        'category_id' => array(
            'form' => array('type' => 'select'),
            'null' => false,
            'validation' => array('required', 'is_numeric'),
        ),
        'user_id' => array(
            'form' => array('type' => false),
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
        'order_by' => array('created_at' => 'desc'),
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
    
    protected static $_table_name = 'posts';
    
    /**
     * Post BelongsTo Category
     * Post BelongsTo User
     * 
     * @var array
     */
    protected static $_belongs_to = array(
        'category' => array(
            'key_from' => 'category_id',
            'model_to' => 'Model_Category',
            'key_to' => 'id',
            'cascade_save' => false,
            'cascade_delete' => false,
        ),
        'user' => array(
            'key_from' => 'user_id',
            'model_to' => 'Model_User',
            'key_to' => 'id',
            'cascade_save' => false,
            'cascade_delete' => false,
        ),
    );
    
    /**
     * Post HasMany Comments
     * @var array
     */
    protected static $_has_many = array(
        'comments' => array(
            'key_from' => 'id',
            'model_to' => 'Model_Comment',
            'key_to' => 'post_id',
            'cascade_save' => false,
            'cascade_delete' => true,  // We delete all comments from the post deleted
        ),
    );

}