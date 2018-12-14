<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Season's greetings, Simplified, Organised and Efficient Bulk Messaging this yuletide and always">
    <meta name="author" content="Abolarin Olanrewaju Olabode ">
    <link rel="icon" href="favicon2.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Season\'s Greetings - Home')</title>
    <link href="{{ mix('/css/app.css')}}" rel="stylesheet">
      <style>
          .debug {outline: 1px solid red;}
          .scroll {overflow: auto;}
          .contain-h {max-height: 15em;}
          .text-bold {font-weight:bold;}
      </style>
  </head>

  <body>
      @include('partials.header')

    <div class="container-fluid">
        <div class="row">
        @include('partials.sidebar')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" id="app">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">


          <h1 class="h2">@yield('page-title', 'Dashboard')</h1>
            <!-- <div class="btn-toolbar mb-2 mb-md-0">
              <!-- <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <<button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button>
            </div> -->
          </div>
        <flash :message="{{json_encode(["message" => "my messsage", "level" =>"success"])}}"></flash>
            @yield('content')

            </main>
        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1"> &copy; {{ now()->format('Y') }} Season's Greetings</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>

    @stack('page-scripts')
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
  </body>
</html>
