<?php
function logout()
{
    session_destroy();
    header("location: /home");
}
$navBar = function () use ($conn) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['loginUser'])) {
            $secretKey = "6LfAbs0bAAAAAEOHA9bbqbqbRFTnclsFjn_PbsUo";
            $responseKey = $_POST['g-recaptcha-response'];
            $UserIP = $_SERVER['REMOTE_ADDR'];
            $url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secretKey . "&response=" . $responseKey . "&remoteip=" . $UserIP;
            $response = file_get_contents($url);
            $response = json_decode($response);
            if ($response->success) {
                $sql = "SELECT * FROM users WHERE username=:un AND password=:pw";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    ':un' => $_POST['uname'],
                    ':pw' => $_POST['pword']
                ]);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $count = $stmt->rowCount();
                $stmt->closeCursor();
                if ($count == 1) {
                    $userID = $row['user_id'];
                    $_SESSION['user'] = $_POST['uname'];
                    $_SESSION['user_id'] =  $userID;
                    echo ("<script>window.onload = (event) => {toastr.success('Login Successful!')}</script>");
                } else {
                    echo ("<script>window.onload = (event) => {toastr.error('Invalid username and/or password!')}</script>");
                }
            } else {
                echo ("<script>window.onload = (event) => {toastr.error('Invalid Captcha, Please Try again')}</script>");
            }
        }
        if (isset($_POST['registerUser'])) {
            $secretKey = "6LfXy70gAAAAAC0ij5aI5PfU0P7cQ-IQtPkKKxny";
            $responseKey = $_POST['g-recaptcha-response'];
            $UserIP = $_SERVER['REMOTE_ADDR'];
            $url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secretKey . "&response=" . $responseKey . "&remoteip=" . $UserIP;
            $response = file_get_contents($url);
            $response = json_decode($response);
            if ($response->success) {
                $sql = "SELECT * FROM users WHERE username=:un";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    ':un' => $_POST['regUname']
                ]);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $count = $stmt->rowCount();
                $stmt->closeCursor();
                if ($count == 1) {
                    echo ("<script>window.onload = (event) => {toastr.warning('Username Already Taken!')}</script>");
                } else {
                    $sql = "INSERT INTO users (username, password) VALUES (:uname, :pwd)";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([
                        ':uname' => $_POST['regUname'],
                        ':pwd' => $_POST['regPword']
                    ]);
                    $stmt->closeCursor();
                    echo ("<script>window.onload = (event) => {toastr.success('Registered Successfully!')}</script>");
                }
            } else {
                echo ("<script>window.onload = (event) => {toastr.error('Invalid Captcha, Please Try again')}</script>");
            }
        }
        if (isset($_POST['logoutUser'])) {
            logout();
        }
    }
};
$watchAddMV = function () use ($conn) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['watchAddMV'])) {
            $sql = "SELECT movieID FROM watchlist WHERE movieID=:id";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':id' => $_POST['watchIDMV']
            ]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $count = $stmt->rowCount();
            $stmt->closeCursor();
            if ($count == 1) {
                echo ("<script>window.onload = (event) => {toastr.warning('The Movie is already in your Watchlist')}</script>");
            } else {
                $sql = "INSERT INTO watchlist (user_id, movieID) VALUES (:user, :watchIDMV)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    ':user' => $_SESSION['user_id'],
                    ':watchIDMV' => $_POST['watchIDMV']
                ]);
                $stmt->closeCursor();
                echo ("<script>window.onload = (event) => {toastr.success('Added to Watchlist')}</script>");
            }
        }
    }
};
$watchAddTV = function () use ($conn) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['watchAddTV'])) {
            $sql = "SELECT tvID FROM watchlist WHERE tvID=:id";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':id' => $_POST['watchIDTV']
            ]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $count = $stmt->rowCount();
            $stmt->closeCursor();
            if ($count == 1) {
                echo ("<script>window.onload = (event) => {toastr.warning('The Show is already in your Watchlist')}</script>");
            } else {
                $sql = "INSERT INTO watchlist (user_id, tvID) VALUES (:user, :watchIDTV)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    ':user' => $_SESSION['user_id'],
                    ':watchIDTV' => $_POST['watchIDTV']
                ]);
                $stmt->closeCursor();
                echo ("<script>window.onload = (event) => {toastr.success('Added to Watchlist')}</script>");
            }
        }
    }
};
?>
<?php ?>