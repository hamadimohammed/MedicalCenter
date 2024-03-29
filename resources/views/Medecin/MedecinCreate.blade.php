@extends('layouts.main_layout',[
    'class' => 'sidebar-mini ',
    'namePage' => 'User Profile',
    'activePage' => 'profile'
])

@section('contenu')
  <div class="panel-header panel-header-md">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" Ajouter un Medecin")}}</h5>
          </div>
          <div class="card-body">
            @if(session('success_create'))
              <div class="row">
                  <h5 class="alert alert-success">{{session('success_create')}}</h5>
              </div>
            @endif

            @if(session('error_create'))
              <div class="row">
                  <h5 class="alert alert-danger">session('error_create')</h5>
              </div>
            @endif
            <form method="post" action="{{route('insert_medecin')}}" autocomplete="off"
            enctype="multipart/form-data">
              @csrf
                <div class="row">
                    <div class="col-md-2 pr-1">
                        <div class="form-group">
                            <label>{{__(" Nom")}}</label>
                            <input type="text" name="nom" value="{{ old('nom') }}" class="form-control {{ $errors->has('nom') ? ' is-invalid' : '' }}" required>
                        </div>
                        @error('nom')
                          <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-2 pr-1">
                        <div class="form-group">
                            <label>{{__(" Prenom")}}</label>
                            <input type="text" name="prenom" value="{{ old('prenom') }}"  class="form-control {{ $errors->has('prenom') ? ' is-invalid' : '' }} " required >
                        </div>
                        @error('prenom')
                          <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 pr-1">
                        <div class="form-group ">
                            <label>{{__(" Phone")}}</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" pattern="[0-9]{10}" >
                            <!--div class="row">
                              <div class="col-sm-3 pr-1"> 
                                <select  class=" form-control-sm">
                                  <option>05</option>
                                  <option>06</option>
                                  <option>07</option>
                                </select >
                              </div>
                              <div class="col-md-9 pr-1">
                              </div>
                            </div-->
                        </div>
                        @error('phone')
                          <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-5 pr-1">
                        <div class="form-group">
                            <label>{{__(" Email addresse")}}</label>
                                <input type="text" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" required value="{{ old('email') }}">
                                
                        </div>
                        @if(session('email_exist'))
                          <div class="alert alert-danger">{{session('email_exist')}}</div>
                        @endif
                        @error('email')
                          <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-7 pr-1">
                    <div class="form-group-lg">
                      <label for="exampleInputEmail1">{{__("Address")}}</label>
                      <input type="text" name="addresse" value="{{ old('addresse') }}" class="form-control" placeholder="Addresse">
                    </div>
                    @error('addresse')
                          <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-5 pr-1">
                      <div class="form-group-lg">
                        <label >{{__("Date Naissance")}}</label>
                        <input type="date" name="date_naissance" value="{{ old('date_naissance') }}" class="form-control" placeholder="Date Naissance" required>
                      </div>
                      @error('date_naissance')
                            <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 pr-1">
                    <div class="form-group">
                      <label for="exampleInputEmail1">{{__("Login")}}</label>
                      <input type="text" name="login" value="{{ old('login') }}" class="form-control {{ $errors->has('login') ? ' is-invalid' : '' }} " placeholder="Login" required>
                    </div>
                    @if(session('login_exist'))
                      <div class="alert alert-danger">{{session('login_exist')}}</div>
                    @endif

                      @error('login')
                          <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                  </div>
                  <div class="col-md-6 pr-1">
                    <div class="form-group">
                      <label for="exampleInputEmail1">{{__("Mot de pass")}}</label>
                      <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Nouveau Mot de passe') }}" type="password" name="password" required>
                    </div>
                    @error('password')
                          <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                      <input type="file" name="image" class="form-control">
                  </div>
                  <div class="col-md-3">
                    <div>
                      <select class="form-control" name="specialite"  id="id_spec" required>
                        @if(count($specialites)>0)
                            @foreach($specialites as $spec )
                                <option value="{{$spec->id}}" selected>{{$spec->libelle}}</option>
                            @endforeach
                        @endif
                      </select>
                    </div>
                    @error('specialite')
                      <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-3">
                    <div>
                      <select class="form-control" name="grade" required>
                        <option value="{{ old('grade')? old('grade') : 'admin'}}" selected>Medecin Admin</option>
                        <option value="{{ old('grade')? old('grade') : 'medecin'}}" >Medecin</option>
                      </select>
                    </div>
                    @error('type')
                      <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                  </div>
                </div>
              <div class="card-footer ">
                <button type="submit" class="btn btn-primary btn-round">{{__('Save')}}</button>
              </div>
              <hr class="half-rule"/>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
@endsection