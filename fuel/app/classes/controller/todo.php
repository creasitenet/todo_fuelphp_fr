<?php
class Controller_Todo extends Controller_Base {
   
    public function before() {
        parent::before(); 
    }
        
    public function after($response) {
        return parent::after($response);
    }

    // Accueil
    public function action_index() {  
        if ($this->auth->check()) {   // Identifié
            $data['todos'] = Model_Todo::find('all', array(
                'where' => array(array('user_id', '=', $this->auth->get('id'))),
                'order_by' => array('created_at' => 'asc')
            ));
        } else {
            $data['todos'] = Model_Todo::find('all', array(
                'where' => array(array('user_id', '=', 0)),
                'order_by' => array('created_at' => 'asc')
            ));
        }
        $this->template->content = View::forge('todo/index', $data);
    }

    // Ajouter. Ajax. Retour Json.
    public function action_ajax_ajouter() {
        $d=array();
        if (Input::method() == 'POST') {
            $texte = $_POST['texte'];
            if ($texte=='') {
                    $d["resultat"] = 0;
                    $d["message"] = "La tâche ne peut pas être vide.";
            } else {     
                if ($this->auth->check()) {   // Identifié
                    $user_id = $this->auth->get('id');
                } else {
                    $user_id = 0;
                }
                $e = Model_Todo::forge(array(
                    'texte' => $texte,
                    'user_id' => $user_id,
                    'statut' => '0',
                ));
                if ($e and $e->save()) {
                    $d["resultat"] =  1;
                    $d["message"] = "La tâche a été ajoutée.";
                    $d["todo_id"] = $e->id;
                } else {
                    $d["resultat"] =  0;
                    $d["message"] =  "Impossible d'ajouter la tâche.";
                }
            }
        }  
        return json_encode($d);
    }
    
    // Maj statut. Ajax. Retour Html.
    public function action_ajax_ajouter_a_la_liste($id) {
        $data['t'] = Model_Todo::find($id);
        $d=View::forge('todo/ajax_ajouter_a_la_liste', $data);
        return $d;
    }

    // Maj statut. Ajax. Retour Json.
    public function action_ajax_mise_a_jour_statut() {
        $d=array();
        if (Input::method() == 'POST') {
            $id = $_POST['id'];
            $e = Model_Todo::find($id);
            if ($e->statut==1) {
                $statut=0;
            } else {
                $statut=1;
            }
            $up=DB::update('todos')
               ->value("statut", $statut)
               ->where('id', '=', $id)
               ->execute();
            $d["resultat"] =  $statut;
            if ($statut==1) {
                $d["message"] =  "La tâche est finie.";
            } elseif ($statut==0) {
                $d["message"] =  "La tâche est à faire.";
            }
        } 
        return json_encode($d);
    }

    // Supprimer.  Ajax. Retour Json.
    public function action_ajax_supprimer() {
        $d=array();
        if (Input::method() == 'POST') {
            $id = $_POST['id'];
            if ($e = Model_Todo::find($id)) {
                $d["resultat"] =  1;
                $d["message"] =  "La tâche a été supprimée.";
                $e->delete();
            } else {
                $d["resultat"] =  0;
                $d["message"] = "Impossible de supprimer la tâche.";
            }
        } 
        return json_encode($d);
    }
    
}