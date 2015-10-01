	<div class="todos">  

        <br />
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>DATE</th>
                    <th>TÂCHE</th>
                    <th>ETAT</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="todos">
			<?php if (isset($todos)): ?>
                <?php foreach ($todos as $i => $e): ?>
                    <tr id="todo_<?php echo $e->id; ?>">

                        <td>
                        <div class="date">
                        	<?php echo date('d-m-Y', $e->created_at); ?>
	                        <small><span><?php echo date('H:i:s', $e->created_at); ?></span></small>
                        </div>
                        </td>
                        
                        <td><p class="text"><?php echo $e->text; ?></p></td>
                        
                        <td>  
                            <div class="switch">
                                <div class="onoffswitch blank">
                                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="status_<?php echo $e->id; ?>"  onchange="ajax_maj('todo/ajax_maj_status', '<?php echo $e->id; ?>', '#status_<?php echo $e->id; ?>')" <?php if($e->status==1) { echo 'checked'; } ?>>
                                    <label class="onoffswitch-label" for="status_<?php echo $e->id; ?>">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </td>

                        <td>
                            <div class="boutons">
                            <a class="cliquable" data-toggle="modal" data-reveal-id="modal_delete" data-target="#modal_delete_<?php echo $e->id; ?>">
                                <i class="fa fa-trash-o delete"></i>
                            </a>
                            </div>
                                <!-- Modal pour la suppression -->
                                <div class="modal fade" id="modal_delete_<?php echo $e->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-body"> 
                                        <h4 class="modal-title text-danger" id="myModalLabel">Etes vous vraiment sûr de vouloir supprimer la tâche ?</h4>
                                        <p>Cette opération est irréverssible</p>
                                        <button type="button" class="btn btn-danger" onclick="ajax_delete('todo/ajax_delete','<?php echo $e->id; ?>','#todo_<?php echo $e->id; ?>')">
                                        SUPPRIMER
                                        </button>
                                        <button type="button" class="btn btn-info" data-dismiss="modal">ANNULER</button>
                                      </div>
                                    </div><!-- /.modal-content -->
                                  </div><!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
        <br />

    </div>