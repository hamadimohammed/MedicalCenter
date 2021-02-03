<div class="sidebar" data-color="yellow">
      <!--Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"-->
      <div class="logo">
        <p class="simple-text">{{__('Cabinet Medical El Tedj')}}</p>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav flex-column">
          <li class="{{ (request()->is('Acceuil')) ? 'active' : '' }}">
            <a href="{{('/Acceuil') }}">
            <i class="zmdi zmdi-landscape"></i>
              <p>{{ __('Dashboard') }}</p>
            </a>
          </li>
          <li class="{{ (request()->is('Medecins')) ? 'active' : ''}}  internal">
            <a href="{{route('listes_medecins')}}">
              <i class="zmdi zmdi-accounts"></i>
              <p>{{ __('Medcins') }}</p></a>
            </a>
          </li>
          <li class="{{ (request()->is('Secretaires')) ? 'active' : '' }}">
            <a href="{{route('secretaires')}}">
              <i class="zmdi zmdi-account-o"></i>
              <p>{{ __('Secretaires') }}</p>
            </a>
          </li>
          <li class="{{ (request()->is('Patients')) ? 'active' : '' }}">
            <a href="{{ route('patients') }}">
              <i class="zmdi zmdi-account-box-mail"></i>
              <p>{{ __('Patients') }}</p>
            </a>
          </li>
          <li class="{{ (request()->is('Rendu-vous')) ? 'active' : '' }}">
            <a href="{{ ('') }}">
              <i class="zmdi zmdi-calendar"></i>
              <p>{{ __('Rendu-Vous') }}</p>
            </a>
          </li>
          <li class="{{ (request()->is('Ordonances')) ? 'active' : '' }}">
            <a href="{{ ('') }}">
              <i class="zmdi zmdi-assignment-o"></i>
              <p>{{ __('Ordonances') }}</p>
            </a>
          </li>
          <li class="{{ (request()->is('Lettres')) ? 'active' : '' }}">
            <a href="{{ ('') }}">
              <i class="zmdi zmdi-comment-alt-text"></i>
              <p>{{ __('Lettre Orientation') }}</p>
            </a>
          </li>
            
        </ul>
      </div>
    </div>
    <!--end of sidebar -->