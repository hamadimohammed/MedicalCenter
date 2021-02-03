<!-- Modal -->
<div class="modal fade" id="edit_medecin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<form action="{{route('update_medecin')}}" method="post">
@CSRF
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLongTitle">Medecin</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
<input type="hidden" name="id" id="id_medecin" class="form-control">
</div>
<div class="modal-body">
<div class="row">
<div class="col-md-4 pr-1">
<div class="form-group">
<label>{{__(" Nom")}}</label>
<input type="text" name="nom" id="nom" class="form-control" required >
</div>
</div>
<div class="col-md-4 pr-1">
<div class="form-group">
<label>{{__(" Prenom")}}</label>
<input type="text" name="prenom" id="prenom" class="form-control" required >
</div>
</div>
<div class="col-md-4 pr-1">
<div class="form-group">
<label>{{__(" Date naissance")}}</label>
<input type="date" name="date_naissance" id="date_naissance" class="form-control" required >
</div>
</div>
</div>
<div class="row">
<div class="col-md-7 pr-1">
<div class="form-group">
<label>{{__(" Email")}}</label>
<input type="email" name="email" id="email" class="form-control" required >
</div>
</div>
<div class="col-md-5 pr-1">
<div class="form-group">
<label>{{__(" Telephone")}}</label>
<input type="text" name="telephone" id="telephone" class="form-control" >
</div>
</div>
</div>
<div class="row">
<div class="col-md-12 pr-1">
<div class="form-group">
<label>{{__(" Adresse")}}</label>
<input type="text" name="adresse" id="adresse" class="form-control" >
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6 pr-1">
<div class="form-group">
<label>{{__(" Specialite")}}</label>
<select class="form-control form-control-lg" name="spec_id"  id="spec_id" required>
@if(count($specialites)>0)
@foreach($specialites as $spec )
<option value="{{$spec->id}}">{{$spec->libelle}}</option>
@endforeach
@endif
</select>
</div>
</div>
<div class="col-sm-6 pr-1">
<div class="form-group">
<label>{{__(" Grade")}}</label>
<select class="form-control form-control-lg" id="grade" name="grade" required>
<option value="admin">Admin</option>
<option value="medecin" >Medecin</option>
</select>
</div>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" id="delete_btn" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="button" id="updateButton" class="btn btn-primary" class="btn btn-primary">Update</button>
</div>
</form> 
</div>
</div>
</div>