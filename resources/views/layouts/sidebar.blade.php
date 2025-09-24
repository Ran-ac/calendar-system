<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ ((Request::is('dashboard')) ? 'active' : 'collapsed') }}" href="{{ route('dashboard') }}">
            <i style="color:#FF9F9F" class="bi bi-grid"></i>
            <span>Dashboard</span>
            </a>
        </li>

        @if (Auth::user()->account == 'Branch Admin')
        <li class="nav-item">
            <a class="nav-link {{ ((Request::is('calendar')) ? 'active' : 'collapsed') }}" href="{{ route('calendar') }}">
            <i style="color:#B1B2FF" class="bi bi-calendar3"></i>
            <span>Calendar</span>
            </a>
        </li>
        @endif

        @if (Auth::user()->account == 'Branch Public')
        <li class="nav-item">
            <a class="nav-link {{ ((Request::is('public_calendar')) ? 'active' : 'collapsed') }}" href="{{ route('public_calendar') }}">
            <i style="color:#B1B2FF" class="bi bi-calendar3"></i>
            <span>Calendar</span>
            </a>
        </li>
        @endif
        <!-- <li class="nav-item">
            <a class="nav-link {{ ((Request::is('recallblockoff')) ? 'active' : 'collapsed') }}" href="{{ route('recallblockoff') }}">
            <i style="color:#B1B2FF" class="bi bi-calendar3-week"></i>
            <span>Recalls and Blockoffs</span>
            </a>
        </li> -->
        
        {{-- <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#gaoc-nav" data-bs-toggle="collapse" href="#">
            <i style="color:#7895B2" class="bi bi-card-checklist"></i><span>Masterlist</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="gaoc-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ ((Request::is('events')) ? 'active' : 'collapsed') }}" href="{{ route('events') }}">
                    <i class="bi bi-circle"></i><span>Events</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ((Request::is('recalls')) ? 'active' : 'collapsed') }}" href="">
                    <i class="bi bi-circle"></i><span>Recalls</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ((Request::is('blockoffs')) ? 'active' : 'collapsed') }}" href="{{ route('blockoffs') }}">
                    <i class="bi bi-circle"></i><span>Blockoffs</span>
                    </a>
                </li>
            </ul>
        </li><!-- End GAOC Nav --> --}}

        <div id='calendar_nav' style="font-size: 10px; position: absolute; width: 86%; bottom: 0; margin-bottom: 10%;"></div> 
    </ul>

</aside><!-- End Sidebar-->