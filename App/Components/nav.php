<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZenCart-Home</title>
    <link rel="stylesheet" href="../global.css">
</head>
<body>
        <nav>
            <div class="nav-in">
                <div class="nav-in-one">
                <h1>ZenCart</h1>
                </div>
                <div class="nav-in-two">
                <div class="search">
                <div class="dropdown">
                    <button class="dropbtn">
                    Dropdown
                    <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                    </div>
                </div>
                    <input type="text" placeholder="Search">
                    <button>Search</button>
                </div>
                </div>
                <div class="nav-in-three">
                    <div class="user">
                    <?php echo "Welcome " . $_SESSION['username']; ?>
                    </div>
                    <button>Logout</button>
                    <button>
                        cart
                    </button>
                </div>
            </div>
        </nav>
</body>
</html>