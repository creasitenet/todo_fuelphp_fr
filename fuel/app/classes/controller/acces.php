<?php
class Controller_Acces extends Controller_Base { 

	public function before() {
		parent::before();
    }

    public function after($response) { 
        return parent::after($response);
    }

	public function action_index() {
		Response::redirect(Uri::Base());
	}

	public function action_connexion() {
		$val= Model_User::validate_connexion();
		if (Input::method() == 'POST') {			
			if ($val->run()) {
				if ($this->auth->login(Input::post('username'), Input::post('password'))) {
					$user = Model_User::find_by_username($this->auth->get_screen_name());
					Session::set_flash('success', e('Bienvenue, '.$user->username));
					Response::redirect('/');
				} else {
					Session::set_flash('error', e('Identifiants incorrects'));
				}
			} else {
				Session::set_flash('error', $val->error());
			}
		}
		$this->template->content = View::forge('acces/connexion', array('val' => $val), false);
	}

	public function action_deconnexion() {
		Auth::logout();
		Session::set_flash('success_flash', e('Vous avez été déconnecté'));
		Response::redirect(Uri::Base());
	}

	public function action_identifiants_perdus() {
		$val= Model_User::validate_identifiants_perdus();
		if (Input::method() == 'POST') {
			if ($val->run()) {
				$e = Model_User::find('first', array(
					    'where' => array(
					        array('username', Input::post('username')),
					        'or' => array(
					            array('email', Input::post('username')),
					        ),
					    )
            	));
				if ($e) {
					try {
		            	$auth = Auth::instance();
		            	$nouveau_mot_de_passe = $auth->reset_password($e->username);
						Session::set_flash('success', "Mot de passe modifié et envoyé par email.");
						$request = Request::forge('email/nouveau_mot_de_passe')->execute(array('id' => $e->id, 'nouveau_mot_de_passe' => $nouveau_mot_de_passe));
					} catch (SimpleUserUpdateException $erreur) {
						Session::set_flash('error', $erreur->getMessage());
		            }
		            Response::redirect('connexion');	           
				} else {
					Session::set_flash('error', e('Identifiant ou email inconnu'));
					$this->template->set_global('identifiant_ou_email_error', 'Cet identifiant ou email est inconnu.');
				}
			} else {
				Session::set_flash('error', $val->error());
			}
		}
		$this->template->content = View::forge('acces/identifiants_perdus', array('val' => $val), false);
	}
	
	// Inscription
	public function action_inscription() {
		$val = Model_User::validate_incription();		
		if (Input::method() == 'POST') {
			if ($val->run()) {
				$auth = Auth::instance();
				try {
					$auth->create_user(Input::post('username'), Input::post('password'), Input::post('email'), 1);
					$e = Model_User::find('first', array(
						    'where' => array(array('username', Input::post('username')))
	            	));
					if ($e) {
						Session::set_flash('success', e("Inscription enregistrée."));
						Response::redirect('connexion');
					} else {
		        		Session::set_flash('error', "Il y a un problème.");						
					}
				} catch (SimpleUserUpdateException $erreur) {
		        	if($erreur='Username already exists') {
		        		Session::set_flash('error', "Cet identifiant ou adresse email est déjà utilisé");
		        	} else {
		        		Session::set_flash('error', $erreur->getMessage());
		        	}
		        }
			} else {
				Session::set_flash('error', $val->error());
			}
		}
		$this->template->content = View::forge('acces/inscription', array('val' => $val), false);
	}

}