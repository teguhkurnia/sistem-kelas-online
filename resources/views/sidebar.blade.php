 <div class="c-sidebar-brand d-lg-down-none">

    </div>
    <ul class="c-sidebar-nav ps">
      @php
          $role = new App\Role;
          $menu = $role->showMenu(auth()->user()->roles->first()->id);
      @endphp

      @foreach ($menu as $m)
        <li class="c-sidebar-nav-title">{{ $m->name }}</li>
        @foreach ($m->items as $submenu)
            @if ($submenu->child->count() > 0)
            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-dropdown-toggle" aria-expanded="false">
                    <i class="c-sidebar-nav-icon {{$submenu->icon}}"></i><span class="hide-menu">{{ $submenu->title }}</span>
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @foreach ($submenu->child as $child)
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link justify-content-between" href="{{ $child->link() }}">
                            <span>{{ $child->title }}</span>
                            <i class="{{$child->icon}}"></i>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>
            @else
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ $submenu->link() }}">
                    <i class="c-sidebar-nav-icon {{$submenu->icon}}"></i>
                    <span>{{ $submenu->title }}</span>
                </a>
            </li>
            @endif

        @endforeach
      @endforeach
    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
      data-class="c-sidebar-minimized">
    </button>
