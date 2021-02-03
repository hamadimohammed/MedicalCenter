<div class="table-responsive">
                <table id="table_patient" class="table">
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
                      Numero Social
                    </th>
                    <th>
                      Email
                    </th>
                    <th scope="col">Actions</th>
                  </thead>
                  <tbody >
                    @foreach($patients as $patient)
                    <tr>
                      <td style="display:none" class="id_medecin">
                        {{$patient->id}}
                      </td>
                      <td>
                        {{$patient->nom}}
                      </td>
                      <td>
                        {{$patient->prenom}}
                      </td>
                      <td>
                        {{$patient->adresse}}
                      </td>
                      <td>
                        {{$patient->date_naissance}}
                      </td>
                      <td>
                        {{$patient->phone}}
                      </td>
                      <td>
                        {{$patient->num_sec_soc}}
                      </td>
                      <td >
                        {{$patient->email}}
                      </td>
                      <td>
                        <!--button type="button" class="btn btn-primary " ><i class="zmdi zmdi-eye"></i></button> data-toggle="modal" data-target="#view_medecin"-->
                        <button type="button" class="btn btn-success edit_btn">
                          <i class="zmdi zmdi-edit"></i>
                        </button>
                        <button type="button" class="btn btn-danger disable_user"
                          data-id="{{$patient->id}}"
                          data-nom="{{$patient->nom}}"
                          data-prenom="{{$patient->prenom}}"
                        >
                          <i class="zmdi zmdi-delete"></i>
                        </button>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>