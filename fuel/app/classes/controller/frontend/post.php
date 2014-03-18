<?php

class Controller_Frontend_Post extends \Controller_Base_Frontend
{

    public function action_index()
    {
		$posts = $this->data['posts'] = \Model_Post::query()->order_by('created_at', 'DESC')->get();
		$this->theme->set_partial('content', 'frontend/post/index')->set($this->data, null, false); 
    }

    public function action_show($slug = false)
    {
    	$post = $this->data['post'] = \Model_Post::query()->where('slug', $slug)->get_one();

    	if ( ! $post)
    	{
    		\Messages::error(__('frontend.post.not-found'));
    		\Response::redirect_back('/');
    	}
    	else
    	{
    		$this->theme->set_partial('content', 'frontend/post/show')->set($this->data, null, false);
    	}
    }
}
