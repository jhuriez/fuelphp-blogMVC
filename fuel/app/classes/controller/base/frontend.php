<?php

class Controller_Base_Frontend extends \Controller_Base_Template
{
    public $template = "frontend_template";

    public function before()
    {
        parent::before();
       
        // Set global
        $this->dataGlobal['title'] = \Config::get('application.seo.frontend.title');
    }
 
    public function setMedia()
    {
        parent::setMedia();

        $this->theme->asset->css('bootstrap.css', array(), 'css_core', false);
    }

}
