<?php

class Controller_Backend_Post extends \Controller_Base_Backend
{

    public function action_index()
    {
    	$this->dataGlobal['pageTitle'] = __('backend.post.manage');
    	$this->data['posts'] = \Model_Post::find('all');
		$this->theme->set_partial('content', 'backend/post/index')->set($this->data); 
    }

    public function action_add($id = null)
    {
        $this->data['isUpdate'] = $isUpdate = ($id !== null) ? true : false;

        // Prepare form fieldset
        $form = \Fieldset::forge('post_form', array('form_attributes' => array('class' => 'form-horizontal')));
        $form->add_model('Model_Post');
        $form->add('add', '', array(
            'type' => 'submit',
            'value' => ($isUpdate) ? __('backend.edit') : __('backend.add'),
            'class' => 'btn btn-primary')
        );

        // Get or create the post
		if ($isUpdate)
		{
			$this->data['post'] = $post = \Model_Post::find($id);
	    	$this->dataGlobal['pageTitle'] = __('backend.post.edit');
		}
		else
		{
			$this->data['post'] = $post = \Model_Post::forge();
	    	$this->dataGlobal['pageTitle'] = __('backend.post.add');
		}

		$form->populate($post);

		// If POST submit
		if (\Input::post('add'))
		{
			$form->validation()->run();

			if ( ! $form->validation()->error())
			{
				$post->from_array(array(
					'name' => $form->validated('name'),
					'slug' => ($form->validated('slug') != '') ? \Inflector::friendly_title($form->validated('slug')) : \Inflector::friendly_title($form->validated('name')),
					'category_id' => $form->validated('category_id'),
					'user_id' => $form->validated('user_id'),
					'content' => $form->validated('content'),
				));

				if ($post->save())
				{
					// Delete caches
					\Cache::delete('categories');
					\Cache::delete('last_posts');

					// Category Post count update
					foreach(\Model_Category::find('all') as $category)
					{
						$category->post_count = count($category->posts);
						$category->save();
					}

					if ($isUpdate)
						\Messages::success(__('backend.post.edited'));
					else
						\Messages::success(__('backend.post.added'));

					\Response::redirect_back(\Router::get('admin_post'));
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

		$this->theme->set_partial('content', 'backend/post/add')->set($this->data, null, false);
    }

    public function action_delete($id = null)
    {
        $post = \Model_Post::find($id);
        
        if ($post->delete())
        {
			// Delete caches
			\Cache::delete('categories');
			\Cache::delete('last_posts');
        	
            \Messages::success(__('backend.post.deleted'));
        }
        else
        {
            \Messages::error(__('error'));
        }

        \Response::redirect_back(\Router::get('admin_post'));
    }
}
