<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Note: To replace any of the default section-definition in a child blade file, simply define a @section/@endsection with the same name.
         To insert code before/after the default section defined in this app blade template, use "@parent" - see: https://laravel.com/docs/7.x/blade#template-inheritance --}}

    <!-- Scripts -->
    @section('scripts')
    <script>
        @section('laravel_app_globals')
                var LaravelAppGlobals = Object.freeze({!! json_encode([
                    'guest' => auth()->guest(),
                    'user' => auth()->user(),
                    'csrf-token' => csrf_token(),
                    'config' => [
                        'name' => config('app.name'),
                        'url' => config('app.url'),
                        ],
                ]) !!});
            @show
    </script>
    <script src="{{ mix('js/app.js') }}" defer></script>
    @show

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <v-app id="inspire" class="ma-1">

            @section('drawer')
            <the-navigation-drawer :drawer.sync="drawer">
            </the-navigation-drawer>
            @show

            @section('appbar')
            <the-app-bar @toggle-drawer="toggleDrawer" @logout="logout"></the-app-bar>
            @show

            <v-main>
                @section('main')
                @guest
                @section('guest')
                <v-card class="ma-4 pa-8" min-height="400px">
                    <v-card-title style="pb-8">Not Logged In</v-card-title>
                    You are not logged in.<br />
                    <v-btn href="/login" color="primary" class="my-5 px-12">Login</v-btn>
                </v-card>
                @show
                @else
                @section('logged-in')
                @can('use-app')
                @section('logged-in-and-can-use-app')
                <v-card class="ma-4 pa-8" min-height="400px">
                    <v-card-title>Coming Soon</v-card-title>
                    <v-card-text>We’re working hard to make this website available soon</v-card-text>
                </v-card>
                @show
                @else
                @section('logged-in-unauthorised')
                <v-alert text color="info" class="ma-10">
                    <h3 class="mb-8">No Access</h3>
                    <p>
                        Your user account does not currently have access to the {{ config('app.name', 'Laravel') }} system.
                        <br>
                        Please contact a system administator if you need access to this system - providing the email address
                        you used to sign-up / log-in.
                    </p>
                </v-alert>
                @show
                @endcan
                @show
                @endguest

                @show
            </v-main>
        </v-app>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>

</html>