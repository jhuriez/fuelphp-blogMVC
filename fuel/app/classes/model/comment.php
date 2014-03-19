<?php

class Model_Comment extends \Orm\Model
{

    protected static $_properties = array(
        'id',
        'username' => array(
            'label' => 'comment.model.username',
            'null' => false,
            'validation' => array('required', 'min_length' => array(3)),
        ),
        'mail' => array(
            'label' => 'comment.model.mail',
            'null' => false,
            'validation' => array('valid_email'),
        ),
        'content' => array(
            'label' => 'comment.model.content',
            'null' => false,
            'form' => array('type' => 'textarea'),
            'validation' => array('required'),
        ),
        'post_id' => array(
            'form' => array('type' => false),
            'null' => false,
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
    
    protected static $_table_name = 'blog_comment';
    
    /**
     * Comment BelongsTo Post
     * @var array
     */
    protected static $_belongs_to = array(
        'post' => array(
            'key_from' => 'post_id',
            'model_to' => 'Model_Post',
            'key_to' => 'id',
            'cascade_save' => false,
            'cascade_delete' => false,
        ),
    );
    
}