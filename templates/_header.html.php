<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width"/>
    <title>Media Bank</title>
    <link rel="stylesheet" type="text/css" href="/node_modules/bootstrap/dist/css/bootstrap.css ">
    <link rel="stylesheet" type="text/css" href="/assets/css/index.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light shadow p-3 mb-5 bg-white rounded border border-secondary">
    <a class="navbar-brand" href="/"><img src="/assets/images/logo-thumb.png"/></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto ">
            <?php if(!array_key_exists("user", $_SESSION)) {?>
            <li class="nav-item">
                <a class="nav-link" href="/login">
                    <img class="img-fluid" src="/assets/images/log-in.png" style="height: 5vh; width: 10vw;"/>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="/signup">
                    <img class="img-fluid" src="/assets/images/sign-up.png" style="height: 5vh; width: 10vw;"/>
                </a>
            </li>
            <?php } else{ ?>
                <li>
                   <a href="/profile"> <?php echo $_SESSION["user"]->getName()?> </a>
                </li>
                <li>
                    <a class="nav-link" href="/logout">
                        <h2 >Log Out</h2>
                    </a>
                </li>
            <?php } ?>
            <li class="nav-item">
                <a class="nav-link" href="/search">
                    <img class="img-fluid" src="/assets/images/search.png" style="height: 5vh; width: 10vw;"/>
                </a>
            </li>

<!--           navBar collapse-->
            <li>
                <a class="nav-link" href="/login">
                <h2 class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent">Log In</h2>
                </a>
            </li>
            <li>
                <a class="nav-link" href="/signup">
                <h2 class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent">Sign Up</h2>
                </a>
            </li>
            <li>
                <a class="nav-link" href="/search">
                <h2 class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent">Search</h2>
                </a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search Media" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>