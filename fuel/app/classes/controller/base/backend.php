<?php

class Controller_Base_Backend extends \Controller_Base_Template
{
    public $template = "backend_template";

    public function before()
    {
        parent::before();
       
        // Get action, module and controller name
        $this->actionName = \Request::active()->action;
        $this->moduleName = \Request::active()->module;

        $this->controllerName = strtolower(str_replace('Controller_', '', \Request::active()->controller));
        $this->controllerName = str_replace($this->moduleName.'\\', '', $this->controllerName);

        // Check Auth Access
        if ( ! \Auth::check())
        {
            \Messages::info(__('user.login.not-logged'));
            \Response::redirect(\Router::get('login'));
        }

        // Set global
        $this->dataGlobal['title'] = \Config::get('application.seo.backend.title');
    }
 
    public function setMedia()
    {
        parent::setMedia();

        $this->theme->asset->css('bootstrap.css', array(), 'css_core', false);
    }

}
