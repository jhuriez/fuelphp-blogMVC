<?php

class Controller_User extends \Controller_Base_Template
{
    public $template = "user_template";

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

    public function action_login()
    {
        // already logged in?
        if (\Auth::check())
        {
            // yes, so go back to the page the user came from, or the
            // application dashboard if no previous page can be detected
            \Messages::info(__('user.login.already-logged-in'));
            \Response::redirect_back(\Router::get('admin'));
        }

        // was the login form posted?
        if (\Input::method() == 'POST')
        {
            // check the credentials.
            if (\Auth::instance()->login(\Input::param('username'), \Input::param('password')))
            {
                // logged in, go back to the page the user came from, or the
                // application dashboard if no previous page can be detected
                \Response::redirect_back(\Router::get('admin'));
            }
            else
            {
                // login failed, show an error message
                \Messages::error(__('user.login.failure'));
            }
        }

        // display the login page
        $this->theme->set_partial('content', 'user/login');
    }

    public function action_logout()
    {
        // remove the remember-me cookie, we logged-out on purpose
        \Auth::dont_remember_me();

        // logout
        \Auth::logout();

        // inform the user the logout was successful
        \Messages::success(__('user.login.logged-out'));

        // and go back to where you came from (or the application
        // homepage if no previous page can be determined)
        \Response::redirect_back();
    }

}
