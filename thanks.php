<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0
        }

        .svg-box {
            display: inline-block;
            position: relative;
            width: 150px
        }

        .green-stroke {
            stroke: #7cb342
        }

        .red-stroke {
            stroke: #ff6245
        }

        .yellow-stroke {
            stroke: #ffc107
        }

        .circular circle.path {
            stroke-dasharray: 330;
            stroke-dashoffset: 0;
            stroke-linecap: round;
            opacity: .4;
            animation: .7s draw-circle ease-out
        }

        .checkmark {
            stroke-width: 6.25;
            stroke-linecap: round;
            position: absolute;
            top: 56px;
            left: 49px;
            width: 52px;
            height: 40px
        }

        .checkmark path {
            animation: 1s draw-check ease-out
        }

        @keyframes draw-circle {
            0% {
                stroke-dasharray: 0, 330;
                stroke-dashoffset: 0;
                opacity: 1
            }

            80% {
                stroke-dasharray: 330, 330;
                stroke-dashoffset: 0;
                opacity: 1
            }

            100% {
                opacity: .4
            }
        }

        @keyframes draw-check {
            0% {
                stroke-dasharray: 49, 80;
                stroke-dashoffset: 48;
                opacity: 0
            }

            50% {
                stroke-dasharray: 49, 80;
                stroke-dashoffset: 48;
                opacity: 1
            }

            100% {
                stroke-dasharray: 130, 80;
                stroke-dashoffset: 48
            }
        }

        .cross {
            stroke-width: 6.25;
            stroke-linecap: round;
            position: absolute;
            top: 54px;
            left: 54px;
            width: 40px;
            height: 40px
        }

        .cross .first-line {
            animation: .7s draw-first-line ease-out
        }

        .cross .second-line {
            animation: .7s draw-second-line ease-out
        }

        @keyframes draw-first-line {
            0% {
                stroke-dasharray: 0, 56;
                stroke-dashoffset: 0
            }

            50% {
                stroke-dasharray: 0, 56;
                stroke-dashoffset: 0
            }

            100% {
                stroke-dasharray: 56, 330;
                stroke-dashoffset: 0
            }
        }

        @keyframes draw-second-line {
            0% {
                stroke-dasharray: 0, 55;
                stroke-dashoffset: 1
            }

            50% {
                stroke-dasharray: 0, 55;
                stroke-dashoffset: 1
            }

            100% {
                stroke-dasharray: 55, 0;
                stroke-dashoffset: 70
            }
        }

        .alert-sign {
            stroke-width: 6.25;
            stroke-linecap: round;
            position: absolute;
            top: 40px;
            left: 68px;
            width: 15px;
            height: 70px;
            animation: .5s alert-sign-bounce cubic-bezier(.175, .885, .32, 1.275)
        }

        .alert-sign .dot {
            stroke: none;
            fill: #ffc107
        }

        @keyframes alert-sign-bounce {
            0% {
                transform: scale(0);
                opacity: 0
            }

            50% {
                transform: scale(0);
                opacity: 1
            }

            100% {
                transform: scale(1)
            }
        }
    </style>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            font-size: 18px;
            background-color: #F7F7F7;
            padding: 50px 25px;
        }

        @media (max-width: 768px) {
            body {
                font-size: 16px;
            }
        }
    </style>
    <!-- FOR TRANSLATE -->
    <title>Thank you!</title>
    <!-- FOR TRANSLATE -->

</head>

<body style="text-align:center;">


    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', <?= @$_GET['fbp'] ?>);
        fbq('track', 'Lead');
        fbq('track', 'Purchase');
        Purchase
    </script>
    <noscript><img height="1" lf width="1" style="display:none"
            src="https://www.facebook.com/tr?id=<?= @$_GET['fbp'] ?>&ev=Lead&noscript=1" /></noscript>
    <noscript><img height="1" lf width="1" style="display:none"
            src="https://www.facebook.com/tr?id=<?= @$_GET['fbp'] ?>&ev=Purchase&noscript=1" /></noscript>




    <div class="svg-box">
        <svg class="circular green-stroke">
            <circle class="path" cx="75" cy="75" r="50" fill="none" stroke-width="5" stroke-miterlimit="10" />
        </svg>
        <svg class="checkmark green-stroke">
            <g transform="matrix(0.79961,8.65821e-32,8.39584e-32,0.79961,-489.57,-205.679)">
                <path class="checkmark__check" fill="none" d="M616.306,283.025L634.087,300.805L673.361,261.53" />
            </g>
        </svg>
    </div>
    <!-- FOR TRANSLATE -->

    <h1>Muchas gracias. ¡Su solicitud ha sido aceptada!</h1>

    <p>Nuestro operador se pondrá en contacto con usted para confirmar y asesorarle sobre su pedido.</p>
    <!-- FOR TRANSLATE -->


</body>

</html>