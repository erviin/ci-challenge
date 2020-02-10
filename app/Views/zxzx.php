




<!DOCTYPE html>
<html>

<head>
    <title>Checkout</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="/assets/css/demo.css">
    <link rel="stylesheet" href="/assets/css/elementsModal.css" />
    <script src="https://js.stripe.com/v3/"></script>
    <script src="assets/js/elementsModal.js"></script>
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

        .example.example2 {
            background-color: #fff;
        }

        .example.example2 * {
            font-family: Source Code Pro, Consolas, Menlo, monospace;
            font-size: 16px;
            font-weight: 500;
        }

        .example.example2 .row {
            display: -ms-flexbox;
            display: flex;
            margin: 0 5px 10px;
        }

        .example.example2 .field {
            position: relative;
            width: 100%;
            height: 50px;
            margin: 0 10px;
        }

        .example.example2 .field.half-width {
            width: 50%;
        }

        .example.example2 .field.quarter-width {
            width: calc(25% - 10px);
        }

        .example.example2 .baseline {
            position: absolute;
            width: 100%;
            height: 1px;
            left: 0;
            bottom: 0;
            background-color: #cfd7df;
            transition: background-color 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .example.example2 label {
            position: absolute;
            width: 100%;
            left: 0;
            bottom: 8px;
            color: #cfd7df;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            transform-origin: 0 50%;
            cursor: text;
            pointer-events: none;
            transition-property: color, transform;
            transition-duration: 0.3s;
            transition-timing-function: cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .example.example2 .input {
            position: absolute;
            width: 100%;
            left: 0;
            bottom: 0;
            padding-bottom: 7px;
            color: #32325d;
            background-color: transparent;
        }

        .example.example2 .input::-webkit-input-placeholder {
            color: transparent;
            transition: color 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .example.example2 .input::-moz-placeholder {
            color: transparent;
            transition: color 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .example.example2 .input:-ms-input-placeholder {
            color: transparent;
            transition: color 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .example.example2 .input.StripeElement {
            opacity: 0;
            transition: opacity 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            will-change: opacity;
        }

        .example.example2 .input.focused,
        .example.example2 .input:not(.empty) {
            opacity: 1;
        }

        .example.example2 .input.focused::-webkit-input-placeholder,
        .example.example2 .input:not(.empty)::-webkit-input-placeholder {
            color: #cfd7df;
        }

        .example.example2 .input.focused::-moz-placeholder,
        .example.example2 .input:not(.empty)::-moz-placeholder {
            color: #cfd7df;
        }

        .example.example2 .input.focused:-ms-input-placeholder,
        .example.example2 .input:not(.empty):-ms-input-placeholder {
            color: #cfd7df;
        }

        .example.example2 .input.focused+label,
        .example.example2 .input:not(.empty)+label {
            color: #aab7c4;
            transform: scale(0.85) translateY(-25px);
            cursor: default;
        }

        .example.example2 .input.focused+label {
            color: #24b47e;
        }

        .example.example2 .input.invalid+label {
            color: #ffa27b;
        }

        .example.example2 .input.focused+label+.baseline {
            background-color: #24b47e;
        }

        .example.example2 .input.focused.invalid+label+.baseline {
            background-color: #e25950;
        }

        .example.example2 input,
        .example.example2 button {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            outline: none;
            border-style: none;
        }

        .example.example2 input:-webkit-autofill {
            -webkit-text-fill-color: #e39f48;
            transition: background-color 100000000s;
            -webkit-animation: 1ms void-animation-out;
        }

        .example.example2 .StripeElement--webkit-autofill {
            background: transparent !important;
        }

        .example.example2 input,
        .example.example2 button {
            -webkit-animation: 1ms void-animation-out;
        }

        .example.example2 button {
            display: block;
            width: calc(100% - 30px);
            height: 40px;
            margin: 40px 15px 0;
            background-color: #24b47e;
            border-radius: 4px;
            color: #fff;
            text-transform: uppercase;
            font-weight: 600;
            cursor: pointer;
        }

        .example.example2 .error svg {
            margin-top: 0 !important;
        }

        .example.example2 .error svg .base {
            fill: #e25950;
        }

        .example.example2 .error svg .glyph {
            fill: #fff;
        }

        .example.example2 .error .message {
            color: #e25950;
        }

        .example.example2 .success .icon .border {
            stroke: #abe9d2;
        }

        .example.example2 .success .icon .checkmark {
            stroke: #24b47e;
        }

        .example.example2 .success .title {
            color: #32325d;
            font-size: 16px !important;
        }

        .example.example2 .success .message {
            color: #8898aa;
            font-size: 13px !important;
        }

        .example.example2 .success .reset path {
            fill: #24b47e;
        }
    </style>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>

    <nav class="teal" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="#" class="brand-logo">Checkout!</a>
        </div>

    </nav>
    <!-- <div class="container"> -->
    <!-- <div class="row">
            <div class="cell example example2" id="example-2">
                <form>
                    <div data-locale-reversible="">
                        <div class="row">
                            <div class="field">
                                <input id="example2-address" data-tid="elements_examples.form.address_placeholder" class="input empty" type="text" placeholder="185 Berry St" required="" autocomplete="address-line1">
                                <label for="example2-address" data-tid="elements_examples.form.address_label">Address</label>
                                <div class="baseline"></div>
                            </div>
                        </div>
                        <div class="row" data-locale-reversible="">
                            <div class="field half-width">
                                <input id="example2-city" data-tid="elements_examples.form.city_placeholder" class="input empty" type="text" placeholder="San Francisco" required="" autocomplete="address-level2">
                                <label for="example2-city" data-tid="elements_examples.form.city_label">City</label>
                                <div class="baseline"></div>
                            </div>
                            <div class="field quarter-width">
                                <input id="example2-state" data-tid="elements_examples.form.state_placeholder" class="input empty" type="text" placeholder="CA" required="" autocomplete="address-level1">
                                <label for="example2-state" data-tid="elements_examples.form.state_label">State</label>
                                <div class="baseline"></div>
                            </div>
                            <div class="field quarter-width">
                                <input id="example2-zip" data-tid="elements_examples.form.postal_code_placeholder" class="input empty" type="text" placeholder="94107" required="" autocomplete="postal-code">
                                <label for="example2-zip" data-tid="elements_examples.form.postal_code_label">ZIP</label>
                                <div class="baseline"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="field">
                            <div id="example2-card-number" class="input empty StripeElement">
                                <div class="__PrivateStripeElement" style="margin: 0px !important; padding: 0px !important; border: none !important; display: block !important; background: transparent !important; position: relative !important; opacity: 1 !important;"><iframe frameborder="0" allowtransparency="true" scrolling="no" name="__privateStripeFrame8" allowpaymentrequest="true" src="https://js.stripe.com/v3/elements-inner-card-858faacfb0c723bc20d829e1351032dd.html#style[base][color]=%2332325D&amp;style[base][fontWeight]=500&amp;style[base][fontFamily]=Source+Code+Pro%2C+Consolas%2C+Menlo%2C+monospace&amp;style[base][fontSize]=16px&amp;style[base][fontSmoothing]=antialiased&amp;style[base][::placeholder][color]=%23CFD7DF&amp;style[base][:-webkit-autofill][color]=%23e39f48&amp;style[invalid][color]=%23E25950&amp;style[invalid][::placeholder][color]=%23FFCCA5&amp;locale=en&amp;componentName=cardNumber&amp;wait=true&amp;rtl=false&amp;keyMode=test&amp;apiKey=pk_test_6pRNASCoBOKtIshFeQd4XMUh&amp;origin=https%3A%2F%2Fstripe.dev&amp;referrer=https%3A%2F%2Fstripe.dev%2Felements-examples%2F&amp;controllerId=__privateStripeController1" title="Secure payment input frame" style="border: none !important; margin: 0px !important; padding: 0px !important; width: 1px !important; min-width: 100% !important; overflow: hidden !important; display: block !important; user-select: none !important; height: 19.2px;"></iframe><input class="__PrivateStripeElement-input" aria-hidden="true" aria-label=" " autocomplete="false" maxlength="1" style="border: none !important; display: block !important; position: absolute !important; height: 1px !important; top: 0px !important; left: 0px !important; padding: 0px !important; margin: 0px !important; width: 100% !important; opacity: 0 !important; background: transparent !important; pointer-events: none !important; font-size: 16px !important;"></div>
                            </div>
                            <label for="example2-card-number" data-tid="elements_examples.form.card_number_label">Card number</label>
                            <div class="baseline"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="field half-width">
                            <div id="example2-card-expiry" class="input empty StripeElement">
                                <div class="__PrivateStripeElement" style="margin: 0px !important; padding: 0px !important; border: none !important; display: block !important; background: transparent !important; position: relative !important; opacity: 1 !important;"><iframe frameborder="0" allowtransparency="true" scrolling="no" name="__privateStripeFrame9" allowpaymentrequest="true" src="https://js.stripe.com/v3/elements-inner-card-858faacfb0c723bc20d829e1351032dd.html#style[base][color]=%2332325D&amp;style[base][fontWeight]=500&amp;style[base][fontFamily]=Source+Code+Pro%2C+Consolas%2C+Menlo%2C+monospace&amp;style[base][fontSize]=16px&amp;style[base][fontSmoothing]=antialiased&amp;style[base][::placeholder][color]=%23CFD7DF&amp;style[base][:-webkit-autofill][color]=%23e39f48&amp;style[invalid][color]=%23E25950&amp;style[invalid][::placeholder][color]=%23FFCCA5&amp;locale=en&amp;componentName=cardExpiry&amp;wait=true&amp;rtl=false&amp;keyMode=test&amp;apiKey=pk_test_6pRNASCoBOKtIshFeQd4XMUh&amp;origin=https%3A%2F%2Fstripe.dev&amp;referrer=https%3A%2F%2Fstripe.dev%2Felements-examples%2F&amp;controllerId=__privateStripeController1" title="Secure payment input frame" style="border: none !important; margin: 0px !important; padding: 0px !important; width: 1px !important; min-width: 100% !important; overflow: hidden !important; display: block !important; user-select: none !important; height: 19.2px;"></iframe><input class="__PrivateStripeElement-input" aria-hidden="true" aria-label=" " autocomplete="false" maxlength="1" style="border: none !important; display: block !important; position: absolute !important; height: 1px !important; top: 0px !important; left: 0px !important; padding: 0px !important; margin: 0px !important; width: 100% !important; opacity: 0 !important; background: transparent !important; pointer-events: none !important; font-size: 16px !important;"></div>
                            </div>
                            <label for="example2-card-expiry" data-tid="elements_examples.form.card_expiry_label">Expiration</label>
                            <div class="baseline"></div>
                        </div>
                        <div class="field half-width">
                            <div id="example2-card-cvc" class="input empty StripeElement">
                                <div class="__PrivateStripeElement" style="margin: 0px !important; padding: 0px !important; border: none !important; display: block !important; background: transparent !important; position: relative !important; opacity: 1 !important;"><iframe frameborder="0" allowtransparency="true" scrolling="no" name="__privateStripeFrame10" allowpaymentrequest="true" src="https://js.stripe.com/v3/elements-inner-card-858faacfb0c723bc20d829e1351032dd.html#style[base][color]=%2332325D&amp;style[base][fontWeight]=500&amp;style[base][fontFamily]=Source+Code+Pro%2C+Consolas%2C+Menlo%2C+monospace&amp;style[base][fontSize]=16px&amp;style[base][fontSmoothing]=antialiased&amp;style[base][::placeholder][color]=%23CFD7DF&amp;style[base][:-webkit-autofill][color]=%23e39f48&amp;style[invalid][color]=%23E25950&amp;style[invalid][::placeholder][color]=%23FFCCA5&amp;locale=en&amp;componentName=cardCvc&amp;wait=true&amp;rtl=false&amp;keyMode=test&amp;apiKey=pk_test_6pRNASCoBOKtIshFeQd4XMUh&amp;origin=https%3A%2F%2Fstripe.dev&amp;referrer=https%3A%2F%2Fstripe.dev%2Felements-examples%2F&amp;controllerId=__privateStripeController1" title="Secure payment input frame" style="border: none !important; margin: 0px !important; padding: 0px !important; width: 1px !important; min-width: 100% !important; overflow: hidden !important; display: block !important; user-select: none !important; height: 19.2px;"></iframe><input class="__PrivateStripeElement-input" aria-hidden="true" aria-label=" " autocomplete="false" maxlength="1" style="border: none !important; display: block !important; position: absolute !important; height: 1px !important; top: 0px !important; left: 0px !important; padding: 0px !important; margin: 0px !important; width: 100% !important; opacity: 0 !important; background: transparent !important; pointer-events: none !important; font-size: 16px !important;"></div>
                            </div>
                            <label for="example2-card-cvc" data-tid="elements_examples.form.card_cvc_label">CVC</label>
                            <div class="baseline"></div>
                        </div>
                    </div>
                    <button type="submit" data-tid="elements_examples.form.pay_button">Pay $25</button>

                </form> -->
    <!-- <div class="success">
                    <div class="icon">
                        <svg width="84px" height="84px" viewBox="0 0 84 84" version="1.1" xmlns="http://www.w3.org/2000/svg" xlink="http://www.w3.org/1999/xlink">
                            <circle class="border" cx="42" cy="42" r="40" stroke-linecap="round" stroke-width="4" stroke="#000" fill="none"></circle>
                            <path class="checkmark" stroke-linecap="round" stroke-linejoin="round" d="M23.375 42.5488281 36.8840688 56.0578969 64.891932 28.0500338" stroke-width="4" stroke="#000" fill="none"></path>
                        </svg>
                    </div>
                    <h3 class="title" data-tid="elements_examples.success.title">Payment successful</h3>
                    <p class="message"><span data-tid="elements_examples.success.message">Thanks for trying Stripe Elements. No money was charged, but we generated a token:</span><span class="token">tok_189gMN2eZvKYlo2CwTBv9KKh</span></p>
                    <a class="reset" href="#">
                        <svg width="32px" height="32px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xlink="http://www.w3.org/1999/xlink">
                            <path fill="#000000" d="M15,7.05492878 C10.5000495,7.55237307 7,11.3674463 7,16 C7,20.9705627 11.0294373,25 16,25 C20.9705627,25 25,20.9705627 25,16 C25,15.3627484 24.4834055,14.8461538 23.8461538,14.8461538 C23.2089022,14.8461538 22.6923077,15.3627484 22.6923077,16 C22.6923077,19.6960595 19.6960595,22.6923077 16,22.6923077 C12.3039405,22.6923077 9.30769231,19.6960595 9.30769231,16 C9.30769231,12.3039405 12.3039405,9.30769231 16,9.30769231 L16,12.0841673 C16,12.1800431 16.0275652,12.2738974 16.0794108,12.354546 C16.2287368,12.5868311 16.5380938,12.6540826 16.7703788,12.5047565 L22.3457501,8.92058924 L22.3457501,8.92058924 C22.4060014,8.88185624 22.4572275,8.83063012 22.4959605,8.7703788 C22.6452866,8.53809377 22.5780351,8.22873685 22.3457501,8.07941076 L22.3457501,8.07941076 L16.7703788,4.49524351 C16.6897301,4.44339794 16.5958758,4.41583275 16.5,4.41583275 C16.2238576,4.41583275 16,4.63969037 16,4.91583275 L16,7 L15,7 L15,7.05492878 Z M16,32 C7.163444,32 0,24.836556 0,16 C0,7.163444 7.163444,0 16,0 C24.836556,0 32,7.163444 32,16 C32,24.836556 24.836556,32 16,32 Z"></path>
                        </svg>
                    </a>
                </div> -->
    <!-- 
            </div>
        </div>
    </div> -->
    <div id="startstate" class="demo">
        <h2>KAVHOLM</h2>
        <div class="container">
            <img alt="Kavholm dining chair" class="product-image" src="product.png" />
            <div class="price-and-button-container">
                <div>
                    <div class="product-name">Chair set</div>
                    <div class="product-price">$19.99</div>
                </div>
                <button type="button" class="btn" onClick="window.elementsModal.toggleElementsModalVisibility();">
                    Buy now
                </button>
            </div>
        </div>
    </div>
    <div id="endstate" class="demo endstate">
        <h2>KAVHOLM</h2>
        <div class="success-message">
            <div class="success-text">
                Your test payment was successful. <br />Complete the order by using
                the
                <a href="https://stripe.com/docs/payments/payment-intents/quickstart#fulfillment">payment_intent.succeeded webhook</a>.
            </div>
            <div>
                <a class="replay" href="/">Replay demo</a>
            </div>
        </div>
    </div>
</body>

<script>
    window.elementsModal.create({
        // the modal demo will handle non-zero currencies automatically
        // items sent into the server can calculate their amounts and send back to the client
        items: [{
            sku: "sku_1234",
            quantity: 1
        }],
        // Supported currencies here https://stripe.com/docs/currencies#presentment-currencies
        currency: "USD",
        businessName: "KAVHOLM",
        productName: "Chair",
        customerEmail: "me@kavholm.com",
        customerName: "Customer Kavholm"
    });
    // Remove the comment for this to automatically open the modal demo
    // when the page is loaded
    // window.elementsModal.toggleElementsModalVisibility();
</script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<!-- <script src="https://js.stripe.com/v3/"></script>
    <script>
        (function() {
            $('form').submit(function() {
                var stripe = Stripe('pk_test_orCVw9oNvGplRkfVETTizKQD00NBBNrPLe');
                stripe.redirectToCheckout({
                    // Make the id field from the Checkout Session creation API response
                    // available to this file, so you can provide it as parameter here
                    // instead of the {{CHECKOUT_SESSION_ID}} placeholder.
                    sessionId: ''
                }).then(function(result) {
                    console.log(result);
                    // If `redirectToCheckout` fails due to a browser or network
                    // error, display the localized error message to your customer
                    // using `result.error.message`.
                });
            });
        });
    </script> -->
<!-- <script>
        (function() {
            'use strict';
            var stripe = Stripe('pk_test_orCVw9oNvGplRkfVETTizKQD00NBBNrPLe');
            var elements = stripe.elements({
                fonts: [{
                    cssSrc: 'https://fonts.googleapis.com/css?family=Source+Code+Pro',
                }, ],
                // Stripe's examples are localized to specific languages, but if
                // you wish to have Elements automatically detect your user's locale,
                // use `locale: 'auto'` instead.
                locale: window.__exampleLocale
            });

            // Floating labels
            var inputs = document.querySelectorAll('.cell.example.example2 .input');
            Array.prototype.forEach.call(inputs, function(input) {
                input.addEventListener('focus', function() {
                    input.classList.add('focused');
                });
                input.addEventListener('blur', function() {
                    input.classList.remove('focused');
                });
                input.addEventListener('keyup', function() {
                    if (input.value.length === 0) {
                        input.classList.add('empty');
                    } else {
                        input.classList.remove('empty');
                    }
                });
            });

            var elementStyles = {
                base: {
                    color: '#32325D',
                    fontWeight: 500,
                    fontFamily: 'Source Code Pro, Consolas, Menlo, monospace',
                    fontSize: '16px',
                    fontSmoothing: 'antialiased',

                    '::placeholder': {
                        color: '#CFD7DF',
                    },
                    ':-webkit-autofill': {
                        color: '#e39f48',
                    },
                },
                invalid: {
                    color: '#E25950',

                    '::placeholder': {
                        color: '#FFCCA5',
                    },
                },
            };

            var elementClasses = {
                focus: 'focused',
                empty: 'empty',
                invalid: 'invalid',
            };

            // var cardNumber = elements.create('cardNumber', {
            //     style: elementStyles,
            //     classes: elementClasses,
            // });
            // cardNumber.mount('#example2-card-number');

            // var cardExpiry = elements.create('cardExpiry', {
            //     style: elementStyles,
            //     classes: elementClasses,
            // });
            // cardExpiry.mount('#example2-card-expiry');

            // var cardCvc = elements.create('cardCvc', {
            //     style: elementStyles,
            //     classes: elementClasses,
            // });
            // cardCvc.mount('#example2-card-cvc');

            // registerElements([cardNumber, cardExpiry, cardCvc], 'example2');
        })();
    </script> -->

<!--JavaScript at end of body for optimized loading-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<!-- <script>
        var stripe = Stripe('pk_test_orCVw9oNvGplRkfVETTizKQD00NBBNrPLe');
        var elements = stripe.elements();
        var style = {
            base: {
                color: "#32325d",
            }
        };

        var card = elements.create("card", {
            style: style
        });

        card.mount("#card-element");
        card.addEventListener('change', ({
            error
        }) => {
            const displayError = document.getElementById('card-errors');
            if (error) {
                displayError.textContent = error.message;
            } else {
                displayError.textContent = '';
            }
        });

        var form = document.getElementById('payment-form');

        form.addEventListener('submit', function(ev) {
            ev.preventDefault();
            stripe.confirmCardPayment('sk_test_jY8VJ0W8C1iOau5cqQmGJuIt00iWHEHnpl', {
                payment_method: {
                    card: card,
                    billing_details: {
                        name: 'Jenny Rosen'
                    }
                }
            }).then(function(result) {
                if (result.error) {
                    // Show error to your customer (e.g., insufficient funds)
                    console.log(result.error.message);
                } else {
                    // The payment has been processed!
                    if (result.paymentIntent.status === 'succeeded') {
                        // Show a success message to your customer
                        // There's a risk of the customer closing the window before callback
                        // execution. Set up a webhook or plugin to listen for the
                        // payment_intent.succeeded event that handles any business critical
                        // post-payment actions.
                    }
                }
            });
        });
    </script> -->
</body>

</html>