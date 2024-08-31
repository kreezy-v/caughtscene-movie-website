<?php
session_start();
include("php/caughtscene.php");
include("php/funtions.php");
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}
$num_per_page = 12;
$start_from = ($page - 1) * $num_per_page;
$sql = "SELECT `tvID`,`Title`,`Image`,`Links` FROM `tv-list` LIMIT " . $start_from . "," . $num_per_page;
$result = $conn->query($sql);
$navBar();
$watchAddTV();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CaughtScene | Movies</title>
  <meta name="description" content="CAUGHTSCENE.ml look for any tv shows you desire only here in our Movie List." />
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
              <i class="fa-brands fa-youtube"></i>  <span class="d-none d-md-inline-block">Watch List</span>
            </button>';
            } else {
              echo ' <a class="nav-item btn btn-danger" href="watchlist">
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
          <form action="search" method="post" class="input-group form-container ">
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
    <div>
      <div class="card text-white bg-success my-3 mx-4">
        <div class="card-header py-1">
          <div class="fs-4">TV SHOWS</div>
        </div>
      </div>
      <div class="page-numbers my-4" id="pagination">
        <?php
        $page_query = "SELECT 'tvID' FROM `tv-list`";
        $page_result = $conn->prepare($page_query);
        $page_result->execute();
        $rowPG = $page_result->fetch(PDO::FETCH_ASSOC);
        $total_record = $page_result->rowCount();
        $total_page = ceil($total_record / $num_per_page);
        $maxLeft = ($page - floor(5 / 2));
        $maxRight = ($page + floor(5 / 2));
        if ($maxLeft < 1) {
          $maxLeft = 1;
          $maxRight = 5;
        }
        if ($maxRight > $total_page) {
          $maxLeft = $total_page - 4;
          $maxRight = $total_page;
          if ($maxLeft < 1) {
            $maxLeft = 1;
          }
        }
        if ($page != 1) {
          echo "<a href='/tvlist/1'>
                      <button class='btn-pagination-control'>First</button>
                    </a>
                    <a href='/tvlist/" . ($page - 1) . "'>
                      <button class='btn-pagination-control'>Prev</button>
                    </a>";
        }
        for ($i = $maxLeft; $i <= $maxRight; $i++) {
          if ($page == $i) {
            $class = "btn-pagination active";
          } else {
            $class = "btn-pagination";
          }
          echo "<a href='/tvlist/" . $i . "'>
                      <button class='" . $class . "'>" . $i . "</button>
                    </a>";
        }
        if ($page != $total_page) {
          echo "<a href='/tvlist/" . ($page + 1) . "'>
                      <button class='btn-pagination-control'>Next</button>
                    </a>
                    <a href='/tvlist/" . $total_page . "'>
                      <button class='btn-pagination-control'>Last</button>
                    </a>";
        }
        ?>
      </div>
      <div class="rounded container-bg my-3 mx-4 shadow-lg">
        <div class="p-4">
          <div class="row ">
            <?php
            if (!isset($_SESSION['user'])) {
              while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="col-6 col-md-3 col-lg-2 py-0 card-hover text-center my-3 align-items-stretch" role="button">
          <div class="card border-0 shadow mb-3">
            <img class="card-img rounded card-img-top" src="' . $row['Image'] . '" alt="' . $row['Title'] . '">
            <a href="/tvshows/' . $row['Links'] . '" class="card-show card-img-overlay bg-dark bg-opacity-50">
              <span class="btn text-white fs-2 rounded py-0 my-1"><i class="fa-solid fa-circle-play"></i></span>
            </a>
          </div>
          <a href="/tvshows/' . $row['Links'] . '" class="text-color text-decoration-none mb-0 text-hover">' . $row['Title'] . '</a>
        </div>';
              }
            } else {
              while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="col-6 col-md-3 col-lg-2 py-0 card-hover text-center my-3" role="button">
          <div class="card border-0 shadow mb-3">
            <img class="card-img rounded card-img-top" src="' . $row['Image'] . '" alt="' . $row['Title'] . '">
            <div class="card-show card-img-overlay bg-dark bg-opacity-50">
              <a href="/tvshows/' . $row['Links'] . '" class="btn text-white fs-2 rounded py-0 my-1"><i class="fa-solid fa-circle-play"></i></a>
              <form method="POST">
              <input type="hidden" name="watchIDTV" value="' . $row['tvID'] . '">
              <button class="btn btn-danger fs-2 rounded py-0 my-1" type="submit" name="watchAddTV"><i class="fa-solid fa-plus"></i></button>
            </form>
            </div>
          </div>
          <a href="/tvshows/' . $row['Links'] . '" class="text-color text-decoration-none mb-0 text-hover">' . $row['Title'] . '</a>
        </div>';
              }
              $result->closeCursor();
            }
            ?>

          </div>

        </div>

      </div>
      <div class="page-numbers my-4" id="pagination">
        <?php
        if ($maxLeft < 1) {
          $maxLeft = 1;
          $maxRight = 5;
        }
        if ($maxRight > $total_page) {
          $maxLeft = $total_page - 4;
          $maxRight = $total_page;
          if ($maxLeft < 1) {
            $maxLeft = 1;
          }
        }
        if ($page != 1) {
          echo "<a href='/tvlist/1'>
                      <button class='btn-pagination-control'>First</button>
                    </a>
                    <a href='/tvlist/" . ($page - 1) . "'>
                      <button class='btn-pagination-control'>Prev</button>
                    </a>";
        }
        for ($i = $maxLeft; $i <= $maxRight; $i++) {
          if ($page == $i) {
            $class = "btn-pagination active";
          } else {
            $class = "btn-pagination";
          }
          echo "<a href='/tvlist/" . $i . "'>
                      <button class='" . $class . "'>" . $i . "</button>
                    </a>";
        }
        if ($page != $total_page) {
          echo "<a href='/tvlist/" . ($page + 1) . "'>
                      <button class='btn-pagination-control'>Next</button>
                    </a>
                    <a href='/tvlist/" . $total_page . "'>
                      <button class='btn-pagination-control'>Last</button>
                    </a>";
        }
        $conn = null;
        ?>
      </div>
    </div>
  </div>
  <footer class="bg-dark text-white ">
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
  }
  ?>
  <div class="theme-mob d-lg-none d-md-block shadow-lg">
    <i role="button" class="fa-solid fa-moon text-white h3 mx-3 mob-icon" id="theme-toggleMob"></i>
  </div>
  <div class="d-lg-none d-md-block" style="height: 72px;"></div>
  <div class="d-lg-none d-md-block mob-bg" style="height: 82px;"></div>
  <div class="mob-nav d-lg-none d-md-block">
    <ul class="nav flex-nowrap">
      <span class="mob-nav-indicator" style="left: 85px;"></span>
      <li>
        <a href="/movielist" class="movies-drop btn-light rounded" role="button">Latest</a>
        <a href="/movielist/pinoy" class="movies-drop btn-light rounded" role="button">Filipino</a>
        <a role="button" class="movies-nav">
          <i class="fa-solid fa-film"></i>
          <span class="title">Movies</span>
        </a>
      </li>
      <li>
        <a href="/tvlist" class="tv-drop btn-light rounded" role="button">Latest</a>
        <a href="/tvlist/asian" class="tv-drop btn-light rounded" role="button">Asian</a>
        <a role="button" class="tv-nav mob-nav-item-active">
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