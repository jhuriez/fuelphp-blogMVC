<?php

class Controller_Frontend_Post extends \Controller_Base_Frontend
{

    public function get_sidebar()
    {
        if (\Request::is_hmvc())
        {
            // Get categories in cache
            try
            {
                $this->data['categories'] = \Cache::get('categories');
            }
            catch (\CacheNotFoundException $e)
            {
                $this->data['categories'] = \Model_Category::find('all');
                \Cache::set('categories', $this->data['categories']);
            }

            // Get lasts posts
            try
            {
                $this->data['lastPosts'] = \Cache::get('last_posts');
            }
            catch (\CacheNotFoundException $e)
            {
                $this->data['lastPosts'] = \Model_Post::query()->order_by('created_at', 'DESC')->limit(5)->get();
                \Cache::set('lastPosts', $this->data['lastPosts']);
            }

            return $this->theme->view('frontend/post/sidebar', $this->data);
        }
    }

    public function action_index()
    {
		$posts = $this->data['posts'] = \Model_Post::query()->order_by('created_at', 'DESC')->get();
		$this->theme->set_partial('content', 'frontend/post/index')->set($this->data, null, false); 
    }

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
            $this->theme->set_partial('content', 'frontend/post/category')->set($this->data, null, false);
        }
    }

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
            $this->theme->set_partial('content', 'frontend/post/author')->set($this->data, null, false);
        }
    }

    public function action_show($slug = false)
    {
    	$post = $this->data['post'] = \Model_Post::query()->where('slug', $slug)->get_one();

    	if ( ! $post)
    	{
    		\Messages::error(__('frontend.post.not-found'));
    		\Response::redirect_back(\Router::get('homepage'));
    	}
    	else
    	{

            // Prepare form fieldset
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
