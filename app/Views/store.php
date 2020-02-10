<!DOCTYPE html>
<html>

<head>
    <title>Store gallery</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        .loading {
            position: relative;
            background-color: #E2E2E2;
        }

        .loading::after {
            display: block;
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            transform: translateX(-100%);
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, .2), transparent);
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            100% {
                transform: translateX(100%);
            }
        }

        .card-title.loading {
            height: 1.8rem;
        }

        .card-image.loading {
            height: 215px;
        }

        .card-image {
            max-width: 100%;
            max-height: 20%;
        }
    </style>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <nav class="teal" role="navigation">
        <div class="nav-wrapper ">
            <a id="logo-container" href="#" class="brand-logo">Store Inc</a>
        </div>

    </nav>
    <div id='loading' class="center-align ">
        <div class="progress">
            <div class="indeterminate"></div>
        </div>
    </div>
    <div id='loading' class="row ">
        <div class="col s12 m4">
            <div class="card white darken-1">
                <div class="card-image loading">
                    <img src="" />
                </div>
                <div class="card-content">

                    <span class="card-title loading">Plymouth</span>
                    <span>$183.43</span>

                </div>
                <div class="card-action .loading">
                    <a href="#">
                        <i class="material-icons left">shop</i>
                        BUY
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!--JavaScript at end of body for optimized loading-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        function create_card(data) {
            return '<div class="row ">' +
                '<div class="col s12 m4">' +
                ' <div class="card white darken-1">' +

                ' <div class="card-image" ' +
                'style="height:300px;background-image:url(' + data['image'] + ');background-size:cover;">' +
                ' </div>' +
                '<div class="card-content">' +
                '<span class="card-title ">' + data['title'] + '</span>' +
                '<span>' + data['price'] + '</span>' +
                '</div>' +
                '<div class="card-action">' +
                '<a href="/store/checkout/' + data['id'] + '">' +
                '<i class="material-icons left">shop</i>' +
                'BUY' +
                '</a>' +
                '</div>' +
                '</div>' +
                '</div>';
        }
        fetch('https://my-json-server.typicode.com/erviin/ci-challenge/albums')
            .then(response => response.json())
            .then(function(json) {
                html = '';
                json.forEach(function(item, index) {
                    html += create_card(item);
                });
                $(html).insertAfter('nav');
                $("div#loading").remove();
            });
    </script>
</body>

</html>