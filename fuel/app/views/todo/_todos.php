    <div class="row">
        
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>DATE</th>
                    <th>TODO</th>
                    <th>ETAT</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="todos">
                <?php foreach ($todos as $i => $e): ?>
                    <tr id="todo_<?php echo $e->id; ?>">

                        <td>
                        <div class="date">
                        <?php echo date("d/m", $e->created_at); ?><br />
                        <small><span><?php echo date("H:i", $e->created_at); ?></span></small>
                        </div>
                        </td>
                        
                        <td><p class="texte"><?php echo $e->texte; ?></p></td>
                        
                        <td>  
                            <div class="switch">
                            <div class="onoffswitch">
                                <input type="checkbox" class="onoffswitch-checkbox" id="statut_<?php echo $e->id; ?>" onchange="mise_a_jour_statut_todo('<?php echo $e->id; ?>', '#statut_<?php echo $e->id; ?>')" <?php if($e->fini==1) { echo 'checked'; } ?> />
                                <label class="onoffswitch-label" for="statut_<?php echo $e->id; ?>"> 
                                        <span class="onoffswitch-inner" data-swchon-text="OUI" data-swchoff-text="NON"></span> 
                                        <span class="onoffswitch-switch"></span>
                                </label> 
                            </div>
                            </div>
                        </td>

                        <td>
                            <div class="boutons">
                            <a class="cliquable" data-toggle="modal" data-reveal-id="modal_supprimer" data-target="#modal_supprimer_<?php echo $e->id; ?>">
                                <i class="fa fa-trash-o fa-2x rouge"></i>
                            </a>
                            </div>
                                <!-- Modal pour la suppression -->
                                <div class="modal fade" id="modal_supprimer_<?php echo $e->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-body"> 
                                        <h4 class="modal-title text-danger" id="myModalLabel">Etes vous vraiment sûr de vouloir supprimer la tâche ?</h4>
                                        <p>Cette opération est irréverssible</p>
                                        <button type="button" class="btn btn-danger" onclick="supprimer_todo('<?php echo $e->id; ?>','#todo_<?php echo $e->id; ?>')">
                                        SUPPRIMER
                                        </button>
                                        <button type="button" class="btn btn-green" data-dismiss="modal">ANNULER</button>
                                      </div>
                                    </div><!-- /.modal-content -->
                                  </div><!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>