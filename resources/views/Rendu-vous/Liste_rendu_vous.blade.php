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
            <h4 class="card-title"> Rendu-vous </h4>
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
                      Prendre un rendu-vous
                    </a>
                  </div>
                </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#preview_medecin_modal">
  Launch demo modal
</button>

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