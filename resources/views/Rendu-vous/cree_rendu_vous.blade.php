@extends('layouts.Main_layout',[
    'namePage' => 'List des Secretaires',
    'class' => 'sidebar-mini',
    'activePage' => 'Secretaires',
  ])

@section('contenu')
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <input type="hidden" name="deb_s" id="deb_s" value="">
            <input type="hidden" name="fin_s" id="fin_s" value="">
            <form action="{{route('prendre_rendu_vous')}}" method="post" >
                <center><h1>Rendu-vous</h1></center>
                <div class="form-group">
                    <label for="typesalle">Type de Salle :</label>
                    <input type="hidden" name="ids" id="ids">
                    <input type="hidden" name="idjour" id="idjour">
                    <select class="form-control" name="typeSalle" id="typesalle" required>
                        <option value="Amphi" selected>Amphi</option>
                        <option value="Salle TD">Salle TD</option>
                        <option value="Salle TP">Salle TP</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="patient">Patient :</label>
                    <select class="form-control" name="patient" id="id_patient" required>
                        @foreach($patients->all() as $patient)
                            <option value="{{$patient->id}}">{{$patient->nom $patient->prenom}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="patient">Medecin :</label>
                    <select class="form-control" name="medecin" id="id_medecin" required>
                        @foreach($medecins->all() as $medecin)
                            <option value="{{$medecin->id}}">{{$medecin->nom $medecin->prenom}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jours">Jour :</label>
                    <select class="form-control" name="jours" id="jour">
                        <option value="Dimanche" selected>Dimanche</option>
                        <option value="Lundi">Lundi</option>
                        <option value="Mardi">Mardi</option>
                        <option value="Mercredi">Mercredi</option>
                        <option value="Jeudi">Jeudi</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="dateDebutResSalle">Date et Heure de Debut :</label>
                    <div class="d-flex flex-row">
                        <input class="form-control" type="date" name="dateDebutResSalle" id="dateDebutResSalle" min="1900-01-01" max="2100-01-01" required>
                        <input class="form-control" style="margin-left:10px" type="time" name="HeureDebutResSalle" id="HeureDebutResSalle" step="1800" value="08:30:00" min="08:00:00" max="18:00:00"  required>
                        <select class="form-control" style="margin-left:10px" name="resRapideDep" id="resRapideDep">
                            <option value="" disabled selected>Choix predefini</option>
                            <option value="deb_today">Date d'aujourd'hui</option>
                            <option value="deb_semaine">Date après une semaine</option>
                            <option value="deb_2semaine">Date après deux semaines</option>
                            <option value="deb_sem">Debut de Semestre</option>
                        </select> 
                    </div>
                </div>
                <div class="form-group">
                    <label for="dateFinResSalle">Date et Heure de Fin :</label>
                    <div class="d-flex flex-row">
                        <input class="form-control" type="date" name="dateFinResSalle" id="dateFinResSalle" min="1900-01-01" max="2100-01-01" required>
                        <input class="form-control" style="margin-left:20px" type="time" name="HeureFinResSalle" id="HeureFinResSalle" min="8:00:00" max="18:00:00" required>
                        <select class="form-control" style="margin-left:10px" name="resRapideFin" id="resRapideFin">
                            <option value="" disabled selected>Choix predefini</option>
                            <option value="fin_today">Date d'aujourd'hui</option>
                            <option value="fin_semaine">Date après une semaine</option>
                            <option value="fin_2semaine">Date après deux semaines</option>
                            <option value="fin_sem">Fin de Semestre</option>
                        </select> 
                    </div>    
                </div>
                <div class="form-group">
                    <label for="dep">Département Concerné :</label>
                    <select class="form-control"  name="dep" id="dep" required>
                            <option value="" disabled selected>Départements</option>
                            @foreach($deps->all() as $dep)
                                <option value="{{$dep->id}}">{{$dep->nomdepartement}}</option>
                            @endforeach
                    </select> 
                </div>
                <div class="form-group">
                    <label for="nomProf">Nom de l'enseignant</label>
                    <input type="text" class="form-control" id="nomProf" placeholder="Nom de l'enseignant" name="nomProf" required>
                </div>
                <div class="form-group">
                    <label for="dateFinResSalle">Promotion et (Groupe En cas TD/TP)/(Section) :</label>
                    <div class="d-flex flex-row">
                    <input type="text" class="form-control" id="nomPromo" placeholder="Promotion" name="nomPromo" required>
                    <input type="text" class="form-control" style="margin-left:20px"  name="groupePromo" placeholder="groupe" id="groupePromo" required>
                    </div>    
                </div>
                <div class="form-group" id="divcolor" >
                    <label for="colorpromo" >Couleur Promotion</label>
                    <input type="color" class="form-control" id="colorpromo"  value="#000000" name="color" >
                </div>
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success') }}
                    </div>
                @endif
                @if(Session::has('error'))
                    <div class="alert alert-danger">
                        {{Session::get('error') }}
                    </div>
                @endif
                <div class="d-flex flex-row">
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                    @if(\App\Semestre::all()->where('id_faculte',Session::get('id_faculte_admin'))->first() != null)
                        <button type="submit" class="btn submit">Reserver</button>
                        <button type="reset" class="btn reset" >Vider</button>
                    @else
                        <div class="col">
                            <div class="alert alert-warning">
                                Veuillez fixer les dates du semestre !
                            </div>
                            <div  class="d-flex flex-row">
                                <button type="submit" class="btn submit" disabled>Reserver</button>
                                <button type="reset" class="btn reset" disabled>Vider</button>
                            </div>
                        </div>
                     @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection