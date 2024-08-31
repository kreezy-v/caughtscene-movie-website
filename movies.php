<?php
session_start();
include("php/caughtscene.php");
include("php/funtions.php");
if (!isset($_GET['video'])) {
    header("Location: movielist");
    exit();
} else {
    $video = $_GET['video'];
    if (!isset($_GET['server'])) {
        $setServer = 1;
    } else {
        if ($_GET['server'] > 2 || $_GET['server'] < 1) {
            $setServer = 1;
        } else {
            $setServer = $_GET['server'];
        }
    }
}
$sql = "SELECT * FROM `movies-list` WHERE `Links`= :video";
$stmt = $conn->prepare($sql);
$stmt->execute([
    ':video' => $video
]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();
$stmt->closeCursor();
if ($count > 0) {
    $sql = "SELECT * FROM `movies-list` WHERE `Links`= '$video'";
    $result = $conn->query($sql);
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $movieID = $row['movieID'];
        $title = $row['Title'];
        $image = $row['Image'];
        $director = $row['Director'];
        $cast = $row['Cast'];
        $genre = $row['Genre'];
        $date = $row['Date'];
        $story = $row['Story'];
        $server1 = $row['server'];
        $server2 = $row['server2'];
    }
    $result->closeCursor();
} else {
    header("Location: /404");
    exit();
}
if (isset($_SESSION['user'])) {
    $sql = "SELECT `movieID` FROM `watchlist` WHERE `movieID` = :mvID AND `user_id` = :id";
    $result = $conn->prepare($sql);
    $result->execute([
        ':mvID' => $movieID,
        ':id' => $_SESSION['user_id']
    ]);
    $row =  $result->fetch(PDO::FETCH_ASSOC);
    $count = $result->rowCount();
    $result->closeCursor();
    if ($count > 0) {
        $sql = "DELETE FROM `watchlist` WHERE `movieID` = :mvID AND `user_id` = :id";
        $result = $conn->prepare($sql);
        $result->execute([
            ':mvID' => $movieID,
            ':id' => $_SESSION['user_id']
        ]);
        $result->closeCursor();
    }
}
$navBar();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CaughtScene | <?php echo "Watch $title for FREE" ?></title>
    <meta property="og:locale" content="en_PH" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="CaughtScene" />
    <meta property="og:url" content="https://www.caughtscene.ml" />
    <meta property="og:site_name" content="CaughtScene" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/style.css" />
</head>

<body>
    <header class="header fixed-top">
        <nav class="navbar navbar-expand-lg header-nav navbar-dark bg-dark py-0">
            <div class="container-fluid">
                <a class="navbar-brand mx-auto" href="/home">
                    <img src="https://i.postimg.cc/HLk8gLPx/caughtscene-logo.webp" height="60" alt="CaughtScene Logo" />
                </a>
                <ul class="navbar-nav mx-auto align-items-center">
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link active" href="/home">Home</a>
                    </li>
                    <li class="nav-item dropdown d-none d-lg-block">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Movies
                        </a>
                        <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/movielist"> Latest Movies</a>
                            <a class="dropdown-item" href="/movielist/pinoy">Pinoy Movies</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown d-none d-lg-block">
                        <a class="nav-link dropdown-toggle" role="button" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            TV-Shows
                        </a>
                        <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/tvlist">Latest TV-Shows</a>
                            <a class="dropdown-item" href="/tvlist/asian">Asian Shows</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown d-none d-lg-block">
                        <a class="nav-link dropdown-toggle" role="button" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            About Us
                        </a>
                        <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/faq">FAQ</a>
                            <a class="dropdown-item" href="/contact">Contact</a>
                        </div>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <i role="button" class="nav-link fa-solid fa-moon text-white mx-3 fs-4" id="theme-toggle"></i>
                    </li>

                </ul>
                <div class="mx-auto d-flex justify-content-around align-items-center">
                    <li class="nav-item">
                        <?php
                        if (!isset($_SESSION['user'])) {
                            echo '<button class="nav-item btn btn-danger" onclick="watchList()">
              <i class="fa-brands fa-youtube"></i> <span class="d-none d-md-inline-block">Watch List</span>
            </button>';
                        } else {
                            echo ' <a class="nav-item btn btn-danger" href="/watchlist">
              <i class="fa-brands fa-youtube"></i> <span class="d-none d-md-inline-block">Watch List</span>
            </a>';
                        }
                        ?>
                    </li>
                    <li class="nav-item dropdown">
                        <?php
                        if (!isset($_SESSION['user'])) {
                            echo '<i class="fa-solid fa-user text-white fs-5" role="button" data-bs-toggle="modal" data-bs-target="#loginModal"></i>';
                        } else {
                            echo '<i class="fa-solid fa-user text-white fs-5" role="button" data-bs-toggle="dropdown" data-bs-target="#userDrop"></i>
              <form method="POST" class="dropdown-menu dropdown-menu-end mt-4 p-0" aria-labelledby="dropdownMenuButton">
                <a class="nav-link bg-dark text-white" style="font-size: 85%;">Welcome, ' . $_SESSION['user'] . '</a>
                <input type="submit" name="logoutUser" class="btn btn-danger w-100 rounded-0" value="Logout">
              </form>';
                        }
                        ?>
                    </li>
                    <li class="nav-item">
                        <i class="fa-solid fa-magnifying-glass text-white fs-5" role="button" type="button" data-bs-toggle="collapse" data-bs-target=".collapseSearch" aria-expanded="true" aria-controls="collapseSearch1 collapseSearch2"></i>
                    </li>
                </div>
            </div>
        </nav>
        <div class="collapse collapseSearch" id="collapseSearch1" style="padding: 0;">
            <div class="bg-dark">
                <div class="col-md-8 col-lg-6 col-11 mx-auto my-auto pb-3">
                    <form action="/search" method="post" class="input-group form-container ">
                        <input type="textbox" name="search" value="" class="form-control form-control" placeholder="Search..." autofocus autocomplete="off" required>
                        <button class="landing-search btn btn-danger d-flex align-items-center" type="submit" name="submit" value="submit">
                            <i class="fa-solid fa-magnifying-glass" type="submit" name="submit" value="submit"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <div style=" height: 70px;"></div>
    <div class="collapse collapseSearch" id="collapseSearch2" style="padding: 0;">
        <div style="height: 54px;"></div>
    </div>

    <div class="d-flex flex-column align-items-center w-100">
        <div class="search-fix">
            <div class="mt-4 mx-5">
                <ul class="nav text-wrap ">
                    <li class="nav-item"> <a class="nav-link text-color text-hover" href="/home">Home</a></li>
                    <li class="nav-item"><span class="nav-link text-color text-hover-style">/</span></li>
                    <li class="nav-item">
                        <a class="nav-link text-color text-hover" href="/movielist">Movies</a>
                    </li>
                    <li class="nav-item"><span class="nav-link text-color text-hover-style">/</span></li>
                    <li class="nav-item">
                        <?php echo "<a  class='nav-link text-color text-hover' href='/movies/$video'>$title</a>" ?>
                    </li>
                </ul>
            </div>
            <div class="card text-white bg-danger my-3 mx-5 shadow-lg">
                <div class="card-header text-center py-1">
                    <div class="fs-6"> Note: The player page has pop-up and native ads. Pop-up ads sometimes automatically open a link when you click anywhere on the page.</div>
                </div>
            </div>
            <div class="px-5">
                <div class="ratio ratio-16x9">
                    <?php if ($setServer == 1) {
                        $movieFrame = "<iframe src='https://caughtscene.tk/f/$server1";
                    } else {
                        $movieFrame = "<iframe src='https://sbfull.com/e/$server2";
                    }
                    echo "$movieFrame' frameborder='0' marginwidth='0' marginheight='0' scrolling='no' width='100%' height='100%' allowfullscreen></iframe>"; ?>
                    <script src='https://caughtscene.tk/player/script.php?width=100%&height=100%'></script>
                </div>
            </div>
            <div class="card my-4 mx-5 text-center container-bg">
                <div class="card-header text-color">
                    If current server doesn't work please try other servers below.
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-4 py-1">
                            <a class="btn btn-danger w-50" href="<?php echo "/movies/$video/1" ?>"><i class="fas fa-server"></i> Server 1</a>
                        </div>
                        <div class="col-12 col-md-4 py-1">
                            <a class="btn btn-danger w-50" href="<?php echo "/movies/$video/2" ?>"><i class="fas fa-server"></i> Server 2</a>
                        </div>
                        <div class="col-12 col-md-4 py-1">
                            <a class="btn btn-danger w-50" href="<?php echo "https://sbfull.com/$server2" ?>" target='_blank' rel='noopener noreferrer'><i class="fas fa-cloud-download-alt"></i> Download</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-4 mx-5">
                <div class="row">
                    <div class="col-12 col-md-3 py-2">
                        <div class="card border-0">
                            <?php echo "<img class='card-img rounded card-img-top' src='$image' alt='$title'>" ?>
                        </div>
                    </div>
                    <div class="col-12 col-md-9 py-2">
                        <div class="text-color">
                            <div class="h2 fw-bolder"><?php echo $title ?></div>
                            <div class="h5">Director:<p class="fw-light"><?php echo $director ?></div>
                            <div class="h5">Cast:<p class="fw-light"><?php echo $cast ?></p>
                            </div>
                            <div class="h5">Genre:<p class="fw-light"><?php echo $genre ?></p>
                            </div>
                            <div class="h5">Release:<p class="fw-light"><?php echo $date ?></p>
                            </div>
                            <div class="h5">Story: <p class="fw-light"><?php echo $story ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-dark text-white">
        <div class="main-footer row p-3 w-100">
            <div class="container col-12 col-md-6 my-2">
                <h2 class="h4">ABOUT US</h2>
                <div class="foot">
                    <p>CaughtScene is a free streaming website, it allows you to watch movies online in high quality for free. No
                        registration is required. Multi-language subtitles supported. Please help us by sharing this site with your
                        friends. Thanks!</p>
                    <div class="social">
                        <a href="https://facebook.com/caughtscene"><span class="fab fa-facebook-f" aria-hidden="true"></span></a>
                        <a><span class="fab fa-twitter" aria-hidden="true"></span></a>
                        <a><span class="fab fa-instagram" aria-hidden="true"></span></a>
                    </div>
                </div>
            </div>
            <div class="container col-12 col-md-6 my-2">
                <h2 class="h4">ADDRESS</h2>
                <div class="foot">
                    <div class="content">
                        <div class="place my-2"> <span class="fas fa-map-marker-alt" aria-hidden="true"></span> <span class="h6 foot-text">
                                Cagayan,
                                Philippines</span> </div>
                        <div class="email my-2"> <span class="fas fa-envelope" aria-hidden="true"></span> <span class="h6 foot-text">
                                caughtscene.support@protonmail.com</span> </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bottom-foot p-2">
            <div class="text-center pb-5 pb-lg-0">
                <span class="credit">Created By
                    <a href="/faq" class="text-decoration-none text-danger">CaughtScene DEV GROUP</a>
                    <span class="far fa-copyright" aria-hidden="true"></span><span> 2021-2022 All rights reserved.</span>
            </div>
        </div>
    </footer>
    <?php
    if (!isset($_SESSION['user'])) {
        echo ' <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content rounded">
        <div class="modal-header bg-dark">
          <h5 class="modal-title text-light">Login</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form method="POST" class="login-form">
            <div class="form-group row mb-2">
              <label class="col-3 col-form-label">Username:</label>
              <div class="col-9">
                <input class="form-control" type="text" name="uname" placeholder="Enter Username" required />
              </div>
            </div>
            <div class="form-group row mb-2">
              <label class="col-3 col-form-label">Password:</label>
              <div class="col-9">
                <input class="form-control" type="password" name="pword" placeholder="Enter Password" id="password-field" required />
                <i class="fa-solid fa-eye field-icon toggle-password" toggle="#password-field"></i>
              </div>
            </div>
            <div style="text-align: center">
              <div style="display: inline-block" class="g-recaptcha" data-sitekey="6LfAbs0bAAAAAIQma-lGsE4bZtJQ7udK4LNvFlpN"></div>
            </div>
            <div class="form-group d-flex mb-2">
              <div class="mx-auto">
                <button type="button" data-bs-dismiss="modal" class="btn btn-dark px-5">
                  <i class="bi bi-back"></i> Back
                </button>
              </div>
              <div class="mx-auto">
                <button type="submit" name="loginUser" class="btn btn-success px-5">
                  Login
                </button>
              </div>
            </div>
          </form>
          <!-- <a href="#" class="clearfix overflow-hidden text-decoration-none text-danger">Forgot password?</a> -->
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger mx-auto" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#registerModal">
            Don\'t have an account yet? Sign Up Now
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content rounded">
        <div class="modal-header bg-dark">
          <h5 class="modal-title text-light">Sign Up</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form method="POST" class="signup-form">
            <div class="form-group row mb-2">
              <label class="col-4 col-form-label">Username:</label>
              <div class="col-8">
                <input class="form-control" type="text" name="regUname" placeholder="Enter Username" required />
              </div>
            </div>
            <div class="form-group row mb-2">
              <label class="col-4 col-form-label">Password:</label>
              <div class="col-8">
                <input class="form-control" type="password" placeholder="Enter Password" id="Regpassword-field" required />
                <i class="fa-solid fa-eye field-icon toggle-Regpassword" toggle="#Regpassword-field"></i>
              </div>
            </div>
            <div class="form-group row mb-2">
              <label class="col-4 col-form-label">Confirm Password:</label>
              <div class="col-8">
                <input class="form-control" type="password" name="regPword" placeholder="Confirm Password" id="confirm-field" required />
                <i class="fa-solid fa-eye field-icon toggle-confirm" toggle="#confirm-field"></i>
              </div>
            </div>
            <div class="alert" id="not-match" role="alert" style="display: none;">
            </div>
            <div style="text-align: center">
              <div style="display: inline-block" class="g-recaptcha" data-sitekey="6LfXy70gAAAAAIxRxi9-EaOQ4UsXwQb5-tkQsTRO"></div>
            </div>
            <div class="form-group d-flex mb-2">
              <div class="mx-auto">
                <button type="button" data-bs-toggle="modal" data-bs-target="#loginModal" class="btn btn-dark px-5">
                  <i class="bi bi-back"></i> Back
                </button>
              </div>
              <div class="mx-auto">
                <button type="submit" name="registerUser" class="btn btn-success px-5 " id="signup-btn" disabled>
                  Sign Up
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>';
        $conn = null;
    }
    ?>
    <div class="theme-mob d-lg-none d-md-block shadow-lg">
        <i role="button" class="fa-solid fa-moon text-white h3 mx-3 mob-icon" id="theme-toggleMob"></i>
    </div>
    <div class="d-lg-none d-md-block" style="height: 72px;"></div>
    <div class="d-lg-none d-md-block mob-bg" style="height: 82px;"></div>
    <div class="mob-nav d-lg-none d-md-block">
        <ul class="nav flex-nowrap">
            <span class="mob-nav-indicator" style="left: 15px;"></span>
            <li>
                <a href="/movielist" class="movies-drop btn-light rounded" role="button">Latest</a>
                <a href="/movielist/pinoy" class="movies-drop btn-light rounded" role="button">Filipino</a>
                <a role="button" class="movies-nav mob-nav-item-active">
                    <i class="fa-solid fa-film"></i>
                    <span class="title">Movies</span>
                </a>
            </li>
            <li>
                <a href="/tvlist" class="tv-drop btn-light rounded" role="button">Latest</a>
                <a href="/tvlist/asian" class="tv-drop btn-light rounded" role="button">Asian</a>
                <a role="button" class="tv-nav">
                    <i class="fa-solid fa-tv"></i>
                    <span class="title">TV-Shows</span>
                </a>
            </li>
            <li>
                <a role="button" class="home">
                    <i class="fa-solid fa-house"></i>
                    <span class="title">Home</span>
                </a>
            </li>
            <li>
                <a role="button" class="faq">
                    <i class="fa-solid fa-circle-info"></i>
                    <span class="title">FAQ</span>
                </a>
            </li>
            <li>
                <a role="button" class="contact">
                    <i class="fa-solid fa-phone"></i>
                    <span class="title">Contact US</span>
                </a>
            </li>
        </ul>
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" id="filter-svg">
            <defs>
                <filter id="goo">
                    <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                    <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
                    <feBlend in="SourceGraphic" in2="goo" />
                </filter>
            </defs>
        </svg>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js" integrity="sha512-OvBgP9A2JBgiRad/mM36mkzXSXaJE9BEIENnVEmeZdITvwT09xnxLtT4twkCa8m/loMbPHsvPl0T8lRGVBwjlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer" async defer></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>