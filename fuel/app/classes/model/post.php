<?php

class Model_Post extends \Orm\Model
{

    protected static $_properties = array(
        'id',
        'name' => array(
            'label' => 'post.model.name',
            'null' => false,
            'validation' => array('required', 'min_length' => array(3)),
        ),
        'slug' => array(
            'label' => 'post.model.slug',
            'null' => false,
        ),
        'content' => array(
            'label' => 'post.model.content',
            'null' => false,
            'validation' => array('required'),
            'form' => array('type' => 'textarea'),
        ),
        'category_id' => array(
            'label' => 'post.model.category_id',
            'form' => array('type' => 'select'),
            'null' => false,
            'validation' => array('required', 'is_numeric'),
        ),
        'user_id' => array(
            'label' => 'post.model.user_id',
            'form' => array('type' => 'select'),
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
    
    protected static $_table_name = 'blog_post';
    
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


    public static function set_form_fields($form, $instance = null)
    {

        // Call parent for create the fieldset and set default value
        parent::set_form_fields($form, $instance);

        // Set authors
        foreach(\Model_User::find('all') as $user)
            $form->field('user_id')->set_options($user->id, $user->username);

        // Set categories
        foreach(\Model_Category::find('all') as $category)
            $form->field('category_id')->set_options($category->id, $category->name);

    }    

}