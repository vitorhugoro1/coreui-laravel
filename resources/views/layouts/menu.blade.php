<nav class="navbar navbar-light sticky-top bg-white d-flex justify-content-start">
    <div class="col-6 d-flex justify-content-start">
        <div class="col-2">
            <a href="{{ url('/') }}" class="navbar-brand">
                <img src="{{ asset('img/logo.png') }}" class="d-inline-block align-top" width="89" height="25" alt="{{ config('app.name') }}">
            </a>
        </div>
        <div class="col-10">
            <form action="/" method="get">
                <label for="q" class="sr-only">search</label>
                <input type="search" id="q" name="q" placeholder="Find an Event or Championship" class="shadow-none bg-light border-0 col-12 font-lg rounded search-input" value="{{ request('q') }}">
            </form>
        </div>
    </div>
    <div class="col-6 font-lg font-weight-bold d-flex justify-content-end">
        <a href="#" class="d-block menu-link px-3 text-black-50">Events</a>
        <a href="#" class="d-block menu-link px-3 text-black-50">Events</a>
        <a href="#" class="d-block menu-link px-3 text-black-50">Events</a>
        <a href="#" class="d-block menu-link px-3 text-success">Login</a>
    </div>
</nav>