<?php

class Controller_Frontend_Index extends \Controller_Base_Frontend
{

    public function action_index()
    {
       $this->theme->set_partial('content', 'frontend/index'); 
    }
}
