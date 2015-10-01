<?php
class Controller_Todo extends Controller_Base {
   
    public function before() {
        parent::before(); 
    }
        
    public function after($response) {
        return parent::after($response);
    }

    // Index // PAge d'accueil
    public function action_index() {  
       $data['todos'] = Model_Todo::find('all', array(
                'order_by' => array('created_at' => 'asc')
            ));
        $this->template->content = View::forge('todo/index', $data);
    }

    // Add // Ajax // Post // Json
    public function action_ajax_add() {
        $d=array();
        if (Input::method() == 'POST') {
            $text = $_POST['value'];
            if ($text=='') {
                    $d['result'] = 0;
                    $d['message'] = "La tâche ne peut pas être vide.";
            } else {    
                $e = Model_Todo::forge(array(
                    'text' => $text,
                    'status' => '0',
                ));
                if ($e and $e->save()) {
                    $d['result'] =  1;
                    $d['message'] = "La tâche a été ajoutée.";
					// Pour le refresh
		            $d['url'] = "todo/ajax_refresh/".$e->id;
		            $d['data'] = "";
		            $d['div'] = "#todos";
                } else {
                    $d['result'] =  0;
                    $d['message'] =  "Impossible d'ajouter la tâche.";
                }
            }
        }  
        return json_encode($d);
    }
    
    // Refresh // Ajax // Get // Html
	// J'ai fais le choix de chercher l'enregistrement ajouté pour l'afficher via un partial à la suite des enregistrements déjà affichés.
	// Il aurrait été plus simple et plus rapide de rafraichir l'index lors d'un ajout réussi. 
    public function action_ajax_refresh($id) {
        $data['e'] = Model_Todo::find($id);
		$d=View::forge('todo/_todo', $data);
		return $d;
    }
	
	// Maj status // Ajax // Post // Json
    public function action_ajax_maj_status() {
        $d=array();
        if (Input::method() == 'POST') {
            $id = $_POST['value'];
            $e = Model_Todo::find($id);
            if ($e->status==1) {
                $status=0;
                $d['message'] =  "La tâche est à faire.";
            } else {
                $status=1;
                $d['message'] =  "La tâche est finie.";
            }
            $up=DB::update('todos')
               ->value("status", $status)
               ->where('id', '=', $id)
               ->execute();
            $d['result'] =  $status;
        } 
        return json_encode($d);
    }

    // Delete // Ajax // Post // Json
    public function action_ajax_delete() {
        $d=array();
        if (Input::method() == 'POST') {
            $id = $_POST['value'];
            if ($e = Model_Todo::find($id)) {
                $d['result'] =  1;
                $d['message'] =  "La tâche a été supprimée.";
                $e->delete();
            } else {
                $d['result'] =  0;
                $d['message'] = "Impossible de supprimer la tâche.";
            }
        } 
        return json_encode($d);
    }
    
}