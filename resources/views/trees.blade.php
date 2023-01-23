<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/tree.css') }}">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    @livewireStyles

</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Tree View</h1>
                @if($trees)
                <div class="tree">

                    <ul>

                            <li>
                                <a href="#">{{ $trees->name }}</a>
                                @if (count($trees->childrenRecursive))
                                    @include('children', ['children' => $trees->childrenRecursive])
                                @endif
                            </li>

                    </ul>
                    {{--  <ul>
                        <li>
                            <a href="#">Parent</a>
                            <ul>
                                <li>
                                    <a href="#">Child</a>
                                    <ul>
                                        <li>
                                            <a href="#">Grand Child</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Child</a>
                                    <ul>
                                        <li>
                                            <a href="#">Grand Child</a>
                                        </li>
                                        <li>
                                            <a href="#">Grand Child</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>  --}}
                </div>
                @endif
            </div>
        </div>
    </div>

    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body">
                <h1>Search Node</h1>
                <livewire:search-nodes />
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
</body>
</html>
