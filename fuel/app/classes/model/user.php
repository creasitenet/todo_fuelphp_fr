<?php
class Model_User extends \Orm\Model {

	protected static $_properties = array(
		'id',
		'username',
		'password',
		'group',
		'email',
		'last_login',
		'login_hash',
		'profile_fields',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory) {
		$val = Validation::forge($factory);
		$val->add_field('username', 'Identifiant', 'required|min_length[5]|max_length[50]');
		$val->add_field('password', 'Mot de passe', 'required|min_length[5]|max_length[20]');
		$val->add_field('email', 'Email', 'required|valid_email|max_length[255]');
		return $val;
	}

	public static function validate_connexion()	{
		$val = Validation::forge('connexion');
		// Regles de validation
		$val->add_field('username', 'Identifiant ou Email', 'required|min_length[5]|max_length[255]');
		$val->add_field('password', 'Mot de passe', 'required|min_length[5]|max_length[20]'); 
		return $val;
	}

	public static function validate_identifiants_perdus() {
		$val = Validation::forge('identifiants_perdus');
		$val->add_field('username', 'Identifiant ou Email', 'required|min_length[5]|max_length[255]');
		return $val;
	}

	public static function validate_incription() {
		$val = Validation::forge('inscription');
		$val->add_callable('MyValidationRules');
		$val->add_field('username', 'Identifiant', 'required|min_length[5]|max_length[20]|trim|strip_tags')
			->add_rule('unique', 'users.username');
		$val->add_field('password', 'Mot de passe', 'required|min_length[5]|max_length[20]|trim|strip_tags'); 
		$val->add_field('email', 'Email', 'required|valid_email|max_length[255]')
			->add_rule('unique', 'users.email');

		return $val;
	}

	// has many souscategories
	protected static $_has_many = array( 
	    'todos' => array(
	        'key_from' => 'id',
	        'model_to' => 'Model_Todo',
	        'key_to' => 'user_id',
	        'cascade_save' => false,
	        'cascade_delete' => false,
	    )
	);

}
