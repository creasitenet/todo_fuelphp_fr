
$(document).ready(function(){
});
  
// ajout d'un todo
function ajouter_todo(data) {
    $.post('todo/ajax_ajouter',{texte:data},function(response){ 
        if (response.resultat==1) { 
            montrer_notification('success', response.message);
            $('#input_ajouter_todo').val("");
            $.get('todo/ajax_ajouter_a_la_liste/'+ response.todo_id,function(responseget){ 
                $('#todos').append(responseget)
                $('#todo_'+response.todo_id).show('slow');
            });  
        } else { 
            montrer_notification('error', response.message);
        }
    },"json");
}

// mise à jour du statut d'un todo
function mise_a_jour_todo(id,div) {
    $.post('todo/ajax_mise_a_jour_statut',{id:id},function(response){ 
        if ($('#statut_'+id).prop('checked')) {
            $('#statut_'+id).prop('checked', false);              
        } else {
            $('#statut_'+id).prop('checked', true);          
        }
        if (response.resultat==1) { 
            $('#statut_'+id).prop('checked', true); 
            montrer_notification('success', response.message);
        } else { 
            $('#statut_'+id).prop('checked', false); 
            montrer_notification('error', response.message);
        }
    },"json");
}

// notification
function montrer_notification(typo,texte){
  if (typo=='error') {
    $.growl.error({ message: texte});  
  }
  if (typo=='success') {
    $.growl.notice({ message: texte});
  }
}    

//suppression
function supprimer_todo(id) { 
    $.post('todo/ajax_supprimer',{id:id},function(response){ 
        $('#todo_'+id).animate({opacity: 0.30}, "slow");
        if (response.resultat==1) { 
          montrer_notification('success', response.message);
          $('#todo_'+id).slideUp("slow",function(){$('#todo_'+id).remove();});
        } else { 
          montrer_notification('error', response.message);
          $('#todo_'+id).animate({opacity: 1}, "slow");
        }
        $('#modal_supprimer_'+id).modal('toggle');
    },"json");
}   