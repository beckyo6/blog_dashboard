@include('templates.header')
<div class="container-fluid">
    <div class="row">
        {{-- main sidebar --}}
        @include('templates.nav')
        {{-- main sidebar --}}

        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
            <div class="main-navbar sticky-top bg-white">
                {{-- main navbar --}}
                @include('templates.nav2')
                {{-- main navbar --}}
            </div>
            <!-- main-panel -->
            <div class="main-content-container container-fluid px-4">
                @yield('content')
            </div>
            <!-- main-panel ends -->
            @include('templates.copyright')
        </main>
        <!-- page-body-wrapper ends -->
    </div>
</div>

@include('templates.footer')
