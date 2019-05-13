<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.full.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.8.2/js/all.js" integrity="sha384-DJ25uNYET2XCl5ZF++U8eNxPWqcKohUUBUpKGlNLMchM7q4Wjg2CUpjHLaL8yYPH" crossorigin="anonymous"></script>



    <style>
        body { 
            padding-top: 65px; 
        }
    </style>

    <script src="{{ asset('js/helpers/DateHelper.js') }}"></script>
    <script src="{{ asset('js/services/HttpService.js') }}"></script>
    <script src="{{ asset('js/services/CityService.js') }}"></script>
    <script src="{{ asset('js/views/View.js') }}"></script>
    <script src="{{ asset('js/views/CitiesView.js') }}"></script>
    <script src="{{ asset('js/controllers/CityController.js') }}"></script>

    <title>{{ env('APP_NAME') }}</title>
  </head>
  <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarItems"
                aria-controls="navbarItems" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarItems">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ $page == 'index' ? 'active' : ''}}">
                        <a class="nav-link" href="/">Cidades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#modal-cadastro-cidade">Cadastro</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main role="main">
        <div class="container-fluid">
            @yield('content')
        </div>
    </main>

    @include('modal.cadastro-cidade')

    <script>
        let cityController = new CityController();
    </script>
  </body>
</html>