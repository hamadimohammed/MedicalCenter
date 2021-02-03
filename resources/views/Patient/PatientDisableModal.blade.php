<!-- Modal -->
<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <input type="hidden" name="id_medecin" id="id_medecin">
                      <h5 class="modal-title" >Désactiver un Medecin </h5>
                      
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Voulez-vous vraiment desactiver le patient <span class="nom_field"></span> <span class="prenom_field"></span></p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" id="disableUserSubmit" class="btn btn-primary">Desactiver</button>
                    </div>
                  </div>
                </div>
              </div>