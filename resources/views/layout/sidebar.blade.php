<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}"><i class="icon-speedometer"></i> Dashboard <span class="badge badge-info">NEW</span></a>
            </li>

            <li class="nav-title">
                UI Elements
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> Components</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/templates/buttons') }}"><i class="icon-puzzle"></i> Buttons</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/templates/social') }}"><i class="icon-puzzle"></i> Social Buttons</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/templates/cards') }}"><i class="icon-puzzle"></i> Cards</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/templates/forms') }}"><i class="icon-puzzle"></i> Forms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/templates/modals') }}"><i class="icon-puzzle"></i> Modals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/templates/switches') }}"><i class="icon-puzzle"></i> Switches</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/templates/tables') }}"><i class="icon-puzzle"></i> Tables</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/templates/tabs') }}"><i class="icon-puzzle"></i> Tabs</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> Icons</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/templates/font-awesome-icons') }}"><i class="icon-star"></i> Font Awesome</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/templates/simple-line-icons') }}"><i class="icon-star"></i> Simple Line Icons</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/templates/widgets') }}"><i class="icon-calculator"></i> Widgets <span class="badge badge-info">NEW</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/templates/charts') }}"><i class="icon-pie-chart"></i> Charts</a>
            </li>
            <li class="divider"></li>
            <li class="nav-title">
                Extras
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> Pages</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        {{-- <a class="nav-link" href="{{ url('/templates/login') }}" target="_top"><i class="icon-star"></i> Login</a> --}}
                        <a class="nav-link" href="{{ route('login') }}" target="_top"><i class="icon-star"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/templates/register') }}" target="_top"><i class="icon-star"></i> Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/templates/error404') }}" target="_top"><i class="icon-star"></i> Error 404</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/templates/error500') }}" target="_top"><i class="icon-star"></i> Error 500</a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
</div>
