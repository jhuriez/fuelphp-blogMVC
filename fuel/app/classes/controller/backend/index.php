<?php

class Controller_Backend_Index extends \Controller_Base_Backend
{

    public function action_index()
    {
       $this->theme->set_partial('content', 'backend/index'); 
    }
}
