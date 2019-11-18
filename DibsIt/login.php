<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>

<body>
    <section class="section">
        <div class="columns">
            <div class="column is-4 is-offset-4">
                <!-- Dropdown -->
                <div class="dropdown">
                    <div class="dropdown-trigger">
                        <button class="button" aria-haspopup="true" aria-controls="dropdown-menu">
                            <span>Dropdown button</span>
                            <span class="icon is-small">
                                <i class="fas fa-angle-down" aria-hidden="true"></i>
                            </span>
                        </button>
                    </div>
                    <div class="dropdown-menu" id="dropdown-menu" role="menu">
                        <div class="dropdown-content">
                            <a href="#" class="dropdown-item">
                                Dropdown item
                            </a>
                            <a class="dropdown-item">
                                Other dropdown item
                            </a>
                            <a href="#" class="dropdown-item is-active">
                                Active dropdown item
                            </a>
                            <a href="#" class="dropdown-item">
                                Other dropdown item
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                With a divider
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Brugernavn -->
                <div class="field">
                    <p class="control has-icons-left has-icons-right">
                        <input class="input" type="username" placeholder="Brugernavn">
                        <span class="icon is-small is-left">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fa fa-check"></i>
                        </span>
                    </p>
                </div>
                <!-- Kodeord -->
                <div class="field">
                    <p class="control has-icons-left">
                        <input class="input" type="password" placeholder="Kodeord">
                        <span class="icon is-small is-left">
                            <i class="fa fa-lock"></i>
                        </span>
                    </p>
                </div>
                <div class="field">
                    <p class="control">
                        <button class="button is-success">
                            Login
                        </button>
                    </p>
                </div>
            </div>
        </div>
    </section>
</body>

<script type="text/javascript" src="login.js"></script>

</html>