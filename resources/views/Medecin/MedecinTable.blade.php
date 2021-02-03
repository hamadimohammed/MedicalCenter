<div class="table-responsive">
                <table class="table">
                  <thead class="text-primary">
                    <th>
                      Nom
                    </th>
                    <th>
                      Prenom
                    </th>
                    <th>
                      Addresse
                    </th>
                    <th>
                      Date naissance
                    </th>
                    <th>
                      Telephone
                    </th>
                    <th>
                      Specialite
                    </th>
                    <th>
                      Email
                    </th>
                    <th scope="col">Actions</th>
                  </thead>
                  <tbody >
                    @foreach($medecins as $medecin)
                    <tr class="{{ ($medecin->grade == 'admin') ? 'table-primary' : 'table-success' }}">
                      <td style="display:none" class="id_medecin">
                        {{$medecin->id}}
                      </td>
                      <td class="nom_medecin">
                        {{$medecin->nom}}
                      </td>
                      <td>
                        {{$medecin->prenom}}
                      </td>
                      <td>
                        {{$medecin->adresse}}
                      </td>
                      <td>
                        {{$medecin->date_naissance}}
                      </td>
                      <td>
                        {{$medecin->phone}}
                      </td>
                      <td>
                        {{$medecin->libelle}}
                      </td>
                      <td >
                        {{$medecin->email}}
                      </td>
                      <td style="display:none" >
                        {{$medecin->grade}}
                      </td>
                      <td style="display:none" >
                        {{$medecin->spec_id}}
                      </td>
                      <td>
                        <!--button type="button" class="btn btn-primary " ><i class="zmdi zmdi-eye"></i></button> data-toggle="modal" data-target="#view_medecin"-->
                        <button type="button" class="btn btn-success edit_btn" 
                          data-id="{{$medecin->id}}"
                          data-nom="{{$medecin->nom}}"
                          data-prenom="{{$medecin->prenom}}"
                          data-adresse="{{$medecin->adresse}}"
                          data-email="{{$medecin->email}}"
                          data-telephone="{{$medecin->phone}}"
                          data-grade="{{$medecin->grade}}"
                          data-spec_id="{{$medecin->spec_id}}"
                          data-date="{{$medecin->date_naissance}}"
                        >
                          <i class="zmdi zmdi-edit"></i>
                        </button>
                        <button type="button" class="btn btn-danger disable_user"
                          data-id="{{$medecin->id}}"
                          data-nom="{{$medecin->nom}}"
                          data-prenom="{{$medecin->prenom}}"
                        >
                          <i class="zmdi zmdi-delete"></i>
                        </button>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>