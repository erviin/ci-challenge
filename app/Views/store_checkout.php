<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link rel="stylesheet" href="/assets/css/demo.css" />
    <link rel="stylesheet" href="/assets/css/elementsModal.css" />
    <script src="https://js.stripe.com/v3/"></script>
    <script src="/assets/js/elementsModal.js"></script>

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
    </style>
</head>

<body>
    <div class="container">
        <div class="row">

            <div class="col s12 m6">
                <div id="startstate" class="demo">
                    <h2 id='title'></h2>

                    <div class="container1 hoverable">
                        <img />
                        <div class="progress">
                            <div class="indeterminate"></div>
                        </div>
                        <div class="price-and-button-container">

                            <div>
                                <div class="product-price">Price : $00.00</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="row">
                    <div class="col s12">
                        <form class="row demo">
                            <h2>Your data</h2>
                            <div class="input-field col s12">
                                <input type="text" id="business_name" class="autocomplete" required>
                                <label for="autocomplete-input">Business Name</label>
                            </div>
                            <div class="input-field col s12">
                                <input type="text" id="name" class="autocomplete" required>
                                <label for="autocomplete-input">Name</label>
                            </div>
                            <div class="input-field col s12">
                                <input type="email" id="email" class="autocomplete" required>
                                <label for="autocomplete-input">Email</label>
                            </div>
                            <button type="submit" class="btn"">
                                PAY NOW
                            </button>
                            
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

<script src=" https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


                                <script>
                                    let data;
                                    fetch('https://my-json-server.typicode.com/erviin/ci-challenge/albums/<?php echo $product_id; ?>')
                                        .then(response => response.json())
                                        .then(function(json) {
                                            data = json;
                                            $("img").attr('src', json['image'])
                                            $("#title").html(json['title'])
                                            $(".product-price").html('Price : ' + json['price'])
                                            $(".progress").remove()

                                        });

                                    $(function() {
                                        $("form").submit(function(e) {
                                            e.preventDefault();

                                            $(this).append('<div class="progress">' +
                                                ' <div class="indeterminate"></div>' +
                                                '</div>');

                                            var business_name = $("#business_name").val();
                                            var name = $("#name").val();
                                            var email = $("#email").val();
                                            window.elementsModal.create({
                                                // the modal demo will handle non-zero currencies automatically
                                                // items sent into the server can calculate their amounts and send back to the client
                                                items: [{
                                                    sku: data['id'],
                                                    quantity: 1
                                                }],
                                                // Supported currencies here https://stripe.com/docs/currencies#presentment-currencies
                                                currency: "USD",
                                                amount: data['price'],
                                                businessName: business_name,
                                                productName: data['id'],
                                                customerEmail: email,
                                                customerName: name
                                            })




                                        });
                                    });
                                    // window.elementsModal.create({
                                    //     // the modal demo will handle non-zero currencies automatically
                                    //     // items sent into the server can calculate their amounts and send back to the client
                                    //     items: [{
                                    //         sku: "sku_1234",
                                    //         quantity: 1
                                    //     }],
                                    //     // Supported currencies here https://stripe.com/docs/currencies#presentment-currencies
                                    //     currency: "USD",
                                    //     businessName: "KAVHOLM",
                                    //     productName: "Chair",
                                    //     customerEmail: "me@kavholm.com",
                                    //     customerName: "Customer Kavholm"
                                    // });
                                    // Remove the comment for this to automatically open the modal demo
                                    // when the page is loaded
                                    // window.elementsModal.toggleElementsModalVisibility();
                                </script>
</body>

</html>