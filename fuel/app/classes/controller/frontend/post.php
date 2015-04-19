<?php

class Controller_Frontend_Post extends \Controller_Base_Frontend
{

    /**
     * Get the sidebar view (HMVC Only)
     */
    public function get_sidebar()
    {
        if (\Request::is_hmvc())
        {
            // Get sidebar in cache
            try
            {
                $sidebar = \Cache::get('sidebar');
            }
            catch (\CacheNotFoundException $e)
            {
                // If Cache doesn't exist, get data and cache the view
                $this->data['categories'] = \Model_Category::find('all');
                $this->data['lastPosts'] = \Model_Post::query()->order_by('created_at', 'DESC')->limit(5)->get();
                $sidebar = $this->theme->view('frontend/post/sidebar', $this->data);

                \Cache::set('sidebar', $sidebar);
            }

            return $sidebar;
        }
    }

    /**
     * Get all posts
     */
    public function action_index()
    {
        // Pagination
        $config = array(
            'pagination_url' => \Uri::current(),
            'total_items'    => \Model_Post::count(),
            'per_page'       => \Config::get('application.pagination.per_page'),
            'uri_segment'    => 'page',
        );
        $this->data['pagination'] = $pagination = \Pagination::forge('post_pagination', $config);

        // Get posts
        $this->data['posts'] = \Model_Post::query()
                                        ->offset($pagination->offset)
                                        ->limit($pagination->per_page)
                                        ->order_by('created_at', 'DESC')
                                        ->get();

		$this->theme->set_partial('content', 'frontend/post/index')->set($this->data, null, false); 
    }

    /**
     * Get all posts from category
     * @param  string $category slug
     */
    public function action_show_by_category($category = false)
    {
        $category = $this->data['category'] = \Model_Category::query()->where('slug', $category)->get_one();

        if ( ! $category)
        {
            \Messages::error(__('frontend.category.not-found'));
            \Response::redirect_back(\Router::get('homepage'));
        }
        else
        {
            // Pagination
            $config = array(
                'pagination_url' => \Uri::current(),
                'total_items'    => $category->post_count,
                'per_page'       => \Config::get('application.pagination.per_page'),
                'uri_segment'    => 'page',
            );
            $this->data['pagination'] = $pagination = \Pagination::forge('post_pagination', $config);

            // Get posts
            $this->data['posts'] = \Model_Post::query()
                                            ->where('category_id', $category->id)
                                            ->order_by('created_at', 'DESC')
                                            ->offset($pagination->offset)
                                            ->limit($pagination->per_page)
                                            ->get();

            $this->theme->set_partial('content', 'frontend/post/category')->set($this->data, null, false);
        }
    }

    /**
     * Get all posts from author
     * @param  string $author username
     */
    public function action_show_by_author($author = false)
    {
        $author = $this->data['author'] = \Model_User::query()->where('username', $author)->get_one();

        if ( ! $author)
        {
            \Messages::error(__('frontend.author.not-found'));
            \Response::redirect_back(\Router::get('homepage'));
        }
        else
        {
            // Pagination
            $config = array(
                'pagination_url' => \Uri::current(),
                'total_items'    => count($author->posts),
                'per_page'       => \Config::get('application.pagination.per_page'),
                'uri_segment'    => 'page',
            );
            $this->data['pagination'] = $pagination = \Pagination::forge('post_pagination', $config);

            // Get posts
            $this->data['posts'] = \Model_Post::query()
                                            ->where('user_id', $author->id)
                                            ->order_by('created_at', 'DESC')
                                            ->offset($pagination->offset)
                                            ->limit($pagination->per_page)
                                            ->get();

            $this->theme->set_partial('content', 'frontend/post/author')->set($this->data, null, false);
        }
    }

    /**
     * Show a post
     * @param  string $slug 
     */
    public function action_show($slug = false)
    {
        // Get post by slug
    	$post = $this->data['post'] = \Model_Post::query()->where('slug', $slug)->get_one();

    	if ( ! $post)
    	{
    		\Messages::error(__('frontend.post.not-found'));
    		\Response::redirect_back(\Router::get('homepage'));
    	}
    	else
    	{

            // Prepare comment form fieldset
            $form = \Fieldset::forge('post_comment');
            $form->add_model('Model_Comment');
            $form->add('submit', '', array(
                'type' => 'submit',
                'value' => __('submit'),
                'class' => 'btn btn-primary')
            );

            // If submit comment
            if (\Input::post('submit'))
            {
                $form->validation()->run();

                if ( ! $form->validation()->error())
                {
                    // Create and populate the comment object
                    $comment = \Model_Comment::forge();
                    $comment->from_array(array(
                        'username' => $form->validated('username'),
                        'mail' => $form->validated('mail'),
                        'content' => $form->validated('content'),
                        'post_id' => $post->id,
                    ));

                    if ($comment->save())
                    {
                        \Messages::success(__('frontend.comment.added'));
                        \Response::redirect_back(\Router::get('show_post', array('segment' => $post->slug)));
                    }
                    else
                    {
                        \Messages::error(__('error'));
                    }
                }
                else
                {
                    // Output validation errors     
                    foreach ($form->validation()->error() as $error)
                    {
                        \Messages::error($error);
                    }
                }
            }
            $form->repopulate();
            $this->data['form'] = $form;

    		$this->theme->set_partial('content', 'frontend/post/show')->set($this->data, null, false);
    	}
    }
}
