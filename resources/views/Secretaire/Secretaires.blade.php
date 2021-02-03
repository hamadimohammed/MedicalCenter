@extends('layouts.Main_layout',[
    'namePage' => 'List des Secretaires',
    'class' => 'sidebar-mini',
    'activePage' => 'Secretaires',
  ])

@section('contenu')
  <div class="col-md-12">
  <div class="content">
    <div class="row">
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header">
            <h4 class="card-title"> Liste des Secretaires</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-7 pr-1">
                <div class="input-group rounded">
                  <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                  <span class="input-group-text border-0" id="search-addon">
                    <i class="fa fa-search"></i>
                  </span>
                </div>
              </div>
              <div class="col-sm-5 pr-1">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <a href="{{route('secretaire_profile')}}" type="button" class="btn btn-info" data-toggle="button" aria-pressed="false" autocomplete="off">
                    Ajouter une secretaire
                  </a>
                </div>
              </div>
            </div>
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
                    Telephone
                  </th>
                  <th>
                    Email
                  </th>
                  <th scope="col">Actions</th>
                </thead>
                <tbody>
                  @foreach($secretaires as $secretaire)
                  <tr>
                    <td>
                      {{$secretaire->nom}}
                    </td>
                    <td>
                      {{$secretaire->prenom}}
                    </td>
                    <td>
                      {{$secretaire->addresse}}
                    </td>
                    <td>
                      {{$secretaire->phone}}
                    </td>
                    <td >
                      {{$secretaire->email}}
                    </td>
                    <td>
                      <button type="button" class="btn btn-primary"><i class="zmdi zmdi-eye"></i></button>
                      <button type="button" class="btn btn-success"><i class="zmdi zmdi-edit"></i></button>
                      <button type="button" class="btn btn-danger" onClick="new alert('Vous voulez varaiment supprimer $medcin->nom $medcin->prenom')"><i class="zmdi zmdi-delete"></i></button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="preview_medecin_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Hello</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
  </div>
  </div>

</div>
@endsection