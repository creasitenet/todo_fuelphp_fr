<?php
class Controller_Email extends Controller {
 
    // L'email d'identifiant perdu pour l'administration
    public function action_nouveau_mot_de_passe($id,$nouveau_mot_de_passe) {
        // Le message $id
        $e = Model_User::find($id);
        if ($e) {
            $data['e'] = $e;
            // Si pas hmvc (on veut voir le mail directement en se rendant sur email/nouveau_mot_de_passe
            if (!Request::is_hmvc()) {
                $data['nouveau_mot_de_passe'] = 'non défini ici';
                return View::forge('email/nouveau_mot_de_passe',$data);
            }
              
            // envoi du mail
            if (Request::is_hmvc()) {
                $data['nouveau_mot_de_passe'] = $nouveau_mot_de_passe;
                Package::load('email');
                $email = Email::forge(); 
                $email->from("from@hostname.com", "Todo"); // from
                $email->to($e->email, $e->username); // to
                $email->subject('Identifiants perdus'); // titre /subject
                $email->html_body(View::forge('email/nouveau_mot_de_passe',$data));
                try {
                    $email->send(); // envoi
                    Session::set_flash('success_flash', e("Un message contenant votre nouveau mot de passe vous a été envoyé."));
                } catch(\EmailSendingFailedException $erreur) {
                    Session::set_flash('error_flash', e("Erreur lors de l'envoi du mail, contactez le webmaster.")); 
                }
            }
        } else {
            Session::set_flash('error_flash', e("Utilisateur non trouvé.")); 
        }
        return true;  
    }

}