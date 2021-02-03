@extends('layouts.main_layout',[
    'class' => 'sidebar-mini ',
    'namePage' => 'User Profile',
    'activePage' => 'profile'
])

@section('contenu')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" Ajouter un Patient")}}</h5>
          </div>
          <div class="card-body">
            @if(session('success_create_patient'))
              <div class="row">
                  <h5 class="alert alert-success">{{session('success_create_patient')}}</h5>
              </div>
            @endif

            @if(session('error_create_patient'))
              <div class="row">
                  <h5 class="alert alert-danger">session('error_create_patient')</h5>
              </div>
            @endif
            <form method="post" action="{{route('patient_create_submit')}}" autocomplete="off"
            enctype="multipart/form-data">
              @csrf
                <div class="row">
                    <div class="col-md-6 pr-1">
                        <div class="form-group">
                            <label>{{__(" Nom")}}</label>
                            <input type="text" name="nom" value="{{ old('nom') }}" class="form-control {{ $errors->has('nom') ? ' is-invalid' : '' }}" required>
                        </div>
                        @error('nom')
                          <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 pr-1">
                        <div class="form-group">
                            <label>{{__(" Prenom")}}</label>
                            <input type="text" name="prenom" value="{{ old('prenom') }}"  class="form-control {{ $errors->has('prenom') ? ' is-invalid' : '' }} " required >
                        </div>
                        @error('prenom')
                          <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-5 pr-1">
                        <div class="form-group ">
                            <label>{{__(" Phone")}}</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" pattern="[0-9]{8,}" >
                        </div>
                        @error('phone')
                          <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 pr-1">
                        <div class="form-group">
                            <label>{{__(" Numero de securite social")}}</label>
                            <input type="text" name="num_sec_soc" value="{{ old('num_sec_soc') }}"  pattern="[0-9]{8,}" class="form-control {{ $errors->has('num_sec_soc') ? ' is-invalid' : '' }} "  >
                        </div>
                        @error('num_sec_soc')
                          <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 pr-1">
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
                  <div class="col-md-7 pr-1">
                    <div class="form-group-lg">
                      <label for="exampleInputEmail1">{{__("Address")}}</label>
                      <input type="text" name="adresse" value="{{ old('adresse') }}" class="form-control" placeholder="Adresse">
                    </div>
                    @error('addresse')
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
                  <div class="col-md-4 pr-1">
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
                  <div class="col-md-4 pr-1">
                    <div class="form-group">
                      <label for="exampleInputEmail1">{{__("Mot de pass")}}</label>
                      <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Nouveau Mot de pass') }}" type="password" name="password" required>
                    </div>
                    @error('password')
                          <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-4 pr-1">
                    <div class="form-group">
                      <label for="exampleInputEmail1">{{__("Confirmer Mot de pass")}}</label>
                      <input class="form-control {{ $errors->has('confirme_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Confirmer Mot de pass') }}" type="password" name="confirme_password" required>
                    </div>
                    @error('confirme_password')
                          <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                  </div>
                </div>
              <div class="card-footer ">
                <div class="row">
                  <div class="col-md-6">
                      <input type="file" name="image" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <button type="submit" class="btn btn-primary btn-round">{{__('Save')}}</button>
                  </div>
                </div>
              </div>
              <hr class="half-rule"/>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-user">
          <div class="card-body">
            <div class="author">
              <h5 class="title">{{ 'Les antécédents' }}</h5>
              <textarea class="form-control rounded-2" id="exampleFormControlTextarea2" rows="20"></textarea>
            </div>
          </div>
        </div>
  </div>

    </div>
  </div>
</div>
  
@endsection