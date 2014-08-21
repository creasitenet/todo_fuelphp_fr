<?php
class Controller_Base extends Controller_Template {

    public $template = 'template';

	public function before(){		
		parent::before();  

        // Assigner l'utilisateur à une varibale pour que les vues puissent l'utilier
        // Avec Simpleauth (Model_User)
        $this->auth = Auth::instance();
        $user = $this->auth->check() ? Model_User::find_by_username($this->auth->get_screen_name()) : null;
        View::set_global('user', $user); 

	}

    public function after($response) {
        return parent::after($response);
    }

}