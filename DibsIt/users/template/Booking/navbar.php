<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DibsIt - Bruger</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</head>

<body>
    <nav class="navbar is-primary">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="#" style="font-weight:bold;">
                    DibsIt.Net af Computarum
                </a>
                <span class="navbar-burger burger" data-target="navMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </div>
            <div id="navMenu" class="navbar-menu">
                <div class="navbar-end">
                    <a href="#" class="navbar-item is-active">Hjem</a>
                    <a href="#" class="navbar-item">Book</a>
                    <a href="#" class="navbar-item">Om</a>
                    <a href="#" class="navbar-item">Kontakt</a>
                </div>
            </div>
        </div>
    </nav>
    <script type="text/javascript">
        (function() {
            var burger = document.querySelector('.burger');
            var nav = document.querySelector('#' + burger.dataset.target);

            burger.addEventListener('click', function() {
                burger.classList.toggle('is-active');
                nav.classList.toggle('is-active');
            });
        })();
    </script>
</body>

</html>