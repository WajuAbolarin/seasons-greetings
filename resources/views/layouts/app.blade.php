<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Season's greetings, Simplified, Organised and Efficient Bulk Messaging this yuletide and always">
    <meta name="author" content="Abolarin Olanrewaju Olabode ">
    <link rel="icon" href="favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Season\'s Greetings - Home')</title>
    <link href="{{ mix('/css/app.css')}}" rel="stylesheet">
  </head>

  <body>
      @include('partials.header')

    <div class="container-fluid">
        <div class="row">
        @include('partials.sidebar')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
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

            @yield('content')

            </main>
        </div>
    </div>
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
  </body>
</html>
