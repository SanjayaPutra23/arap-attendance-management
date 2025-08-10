
        <button class="c-header-toggler c-class-toggler d-lg-none mr-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show"><span class="c-header-toggler-icon"></span></button><a class="c-header-brand d-sm-none" href="#"><img class="c-header-brand" src="/assets/brand/coreui-base.svg" width="97" height="46" alt="CoreUI Logo"></a>
        <button class="c-header-toggler c-class-toggler ml-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true"><span class="c-header-toggler-icon"></span></button>

        <ul class="c-header-nav ml-auto mr-4">
          <li class="c-header-nav-item dropdown"><a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <div class="c-avatar"><img class="c-avatar-img" src="{{ url('/assets/img/avatars/'.Auth::User()->avatar) }}" alt="user@email.com"></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right pt-0">
              <div class="dropdown-header bg-light py-2"><strong>Account </strong></div>
                <a class="dropdown-item" href="#">
                    <strong>{{ Auth::User()->name }}</strong></a>
                <a class="dropdown-item" href="{{ route('profil.index') }}">
                <i class="cil-user c-icon"></i>
              Profile</a>
                
                @if(session()->get('power'))
                <a class="dropdown-item" href="{{ route('admin.powerless') }}">
                    <i class="cil-user-unfollow c-icon"></i>
                     getback</a>
                @endif
              <div class="dropdown-divider"></div><a class="dropdown-item" href="#">
                <i class="cil-account-logout c-icon"></i>
                <form action="{{ url('/logout') }}" method="POST"> @csrf <button type="submit" class="btn btn-ghost-dark btn-block">Logout</button></form></a>
            </div>
          </li>
        </ul>


