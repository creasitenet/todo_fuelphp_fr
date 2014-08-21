//  preloader function
$(window).load( function(){
    var mainDiv = $('#container'),
        preloader = $('.preloader');

        preloader.fadeOut(400, function(){
        mainDiv.delay(400).addClass('visible');
          preloader.hide();
        });
});

$(document).ready(function(){
  
  // Menu
	$('#menuToggle, .menu-close').on('click', function(){
		$('#menuToggle').toggleClass('active');
		$('body').toggleClass('body-push-toleft');
		$('#theMenu').toggleClass('menu-open');
	});

});
  
// Fonction d'ajout d'un element 
function ajouter_todo(data) {
    $.post('todo/ajax_ajouter',{texte:data},function(response){ 
        //console.log(response);
        if (response.resultat==1) { 
          montrer_notification('success', response.message);
          ajouter_todo_a_la_liste(response.todo_id);
          $('#input_ajouter_todo').val("");
        } else { 
          montrer_notification('error', response.message);
        }
    },"json");
}

// Fonction d'ajout d'un element a une liste via Ajax 
function ajouter_todo_a_la_liste(todo_id) {
    $.get('todo/ajax_ajouter_a_la_liste/'+ todo_id,function(response){ 
        $('#todos').append(response)
        $('#todo_'+todo_id).show('slow');
      });  
}

// Fonction de mise à jour du statut d'un todo
function mise_a_jour_statut_todo(id, div) {
    $.post('todo/ajax_mise_a_jour_statut',{id:id},function(response){ 
      //$(div).on('change', function (e) {
          if ($(div).prop('checked')) {
            $(div).prop('checked', false);              
          } else {
            $(div).prop('checked', true);          
          }
      //});
     if (response.resultat==1) { // L'élément est affiché
        $(div).prop('checked', true); 
        montrer_notification('info', response.message);
      } else { // L'élément n'est pas affiché
        $(div).prop('checked', false); 
        montrer_notification('info', response.message);
      }
    },"json");
}

// Fonction pour montrer une notification, ne reste pas affichée
function montrer_notification(typo,texto){
  if (typo=='error') {
    $.growl.error({ message: texto});  
  }
  if (typo=='info') {
    $.growl.info({ message: texto});  
  }
  if (typo=='success') {
    $.growl.notice({ message: texto});
  }
}    

// Fonction de suppression d'un element d'une liste via Ajax 
function supprimer_todo(id, div) { //, div_modale
    $.post('todo/ajax_supprimer',{id:id},function(response){ 
        //console.log(response);
        $(div).animate({opacity: 0.30}, "slow");
        if (response.resultat==1) { // L'élément a été supprimé
          montrer_notification('success', response.message);
          $(div).slideUp("slow",function(){$(div).remove();});
        } else { // L'élément n'a pas été supprimé
          montrer_notification('error', response.message);
          $(div).animate({opacity: 1}, "slow");
        }
        // on ferme le modal au cas ou
        $('#modal_supprimer_'+id).modal('toggle');
    },"json");
}   