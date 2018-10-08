<footer class="text-muted bg-white">
    <div class="container-fluid p-2 p-md-5">
        <ul class="list-inline">
            <li class="list-inline-item">
                <a href="{{ url('/') }}" class="text-muted">{{ __('Home') }}</a>
            </li>
            <li class="list-inline-item">
                <a href="{{ route('championships.index') }}" class="text-muted">{{ __('Championships') }}</a>
            </li>
            <li class="list-inline-item">
                <a href="{{ url('/contact') }}" class="text-muted">{{ __('Contacts') }}</a>
            </li>
            <li class="list-inline-item">
                <a href="{{ url('/about') }}" class="text-muted">{{ __('About') }}</a>
            </li>
        </ul>
    </div>
</footer>