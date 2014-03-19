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
