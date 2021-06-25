<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">
                <!-- <img class="d-inline-block" width="32px" height="30.61px" src="" alt=""> -->
            </a>
        </div>
        @foreach ($navigation_links as $link)
        <ul class="sidebar-menu">
            <li class="menu-header">{{ $link->text }}</li>
            @if (!$link->is_multi)
            <li class="{{ Request::routeIs($link->href) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route($link->href) }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            @else
                @foreach ($link->href as $section)
                    @php
                    $routes = collect($section->section_list)->map(function ($child) {
                        return Request::routeIs($child->href);
                    })->toArray();

                    $is_active = in_array(true, $routes);
                    @endphp
                    @if (empty($section->section_list))

                    <li class="dropdown {{ ($is_active) ? 'active' : '' }}">
                        <a href="{{ route($section->href) }}" class="nav-link" ><i class="{{ $section->icon }} "></i><span>{{ $section->section_text }}</span></a>
                    </li>
                    @else
                    <li class="dropdown {{ ($is_active) ? 'active' : '' }}">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="{{ $section->icon }} "></i><span>{{ $section->section_text }}</span></a>
                        <ul class="dropdown-menu">
                            @foreach ($section->section_list as $child)
                                <li class="{{ Request::routeIs($child->href) ? 'active' : '' }}"><a class="nav-link" href="{{ route($child->href) }}">{{ $child->text }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    @endif
                @endforeach
            @endif
        </ul>
        @endforeach
    </aside>
</div>
