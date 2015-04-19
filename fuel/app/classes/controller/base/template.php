<?php

class Controller_Base_Template extends \Controller_Hybrid
{
	public $template = 'template';
	public $dataGlobal = array();


    public function before() {
        // Set template
        $this->theme = \Theme::instance();
        $this->theme->set_template($this->template);

        // Load translation
        \Lang::load('blog');

        //  Get current segments
        $segments = \Uri::segments();
        empty($segments) and $segments[0] = 'home';
        $this->dataGlobal['segments'] = $segments;

        // If ajax or content_only, set a theme with an empty layout
        if (\Input::is_ajax())
        {
            return parent::before();
        }

        // Don't re-set Media if is an HMVC request
        !\Request::is_hmvc() and $this->setMedia();
    }

    public function action_index()
    {

    }

    public function action_404()
    {
        $messages = array('Uh Oh!', 'Huh ?');
        $data['notfound_title'] = $messages[array_rand($messages)];
        $this->dataGlobal['pageTitle'] = __('page-not-found');
        $this->theme->set_partial('content', '404')->set($data);
    }
    
    public function after($response)
    {
        !\Request::is_hmvc() and $this->theme->get_template()->set_global($this->dataGlobal);
        
        // If nothing was returned set the theme instance as the response
        if (empty($response))
        {
            $response = \Response::forge($this->theme);
        }

        if (!$response instanceof \Response)
        {
            $response = \Response::forge($response);
        }
        
        return parent::after($response);
    }

    public function setMedia()
    {
        $this->theme->asset->css('blog.css', array(), 'css_core', false);
    }
}