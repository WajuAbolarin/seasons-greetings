<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Season's Greetings</a>

    <div class="ml-auto mt-xs-2 d-flex justify-content-between w-10">
        <form id="logout-form" method="POST" style="display:none" action="{{route('logout') }}">
            @csrf
        </form>
        <button class="btn bbtn-secondary my-sm-0 mr-2" type="submit" onclick="
            event.preventDefault;
            document.querySelector('#logout-form').submit()
         ">Sign out</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nbg
        avbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
  </nav>
