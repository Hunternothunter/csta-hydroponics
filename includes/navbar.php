<?php
require_once('includes/config.php');


session_start();


if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}


// // Check if the user is logged in
// if (!isset($_SESSION['userID'])) {
//   header("Location: login.php"); // Redirect to login page
//   exit();
// }

$userID = $_SESSION['userID'];


try {
  $sql = "SELECT CONCAT(SUBSTRING(firstname, 1, 1), '. ', lastname) full_name, CONCAT(firstname, ' ', lastname) AS fullName, profilepic, userPosition FROM user_login WHERE userID=?";
  $stmt = $conn->prepare($sql);
  $data = array($userID);
  $stmt->execute($data);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($result) {
    $full_name = $result['full_name'];
    $fullName = $result['fullName'];
    $userPosition = $result['userPosition'];
    $imageName = $result['profilepic'];
  }
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
  // exit();
}

?>
<style>
  .icon-wrapper {
    width: 60px;
    /* Adjust as needed */
    height: 40px;
    /* Adjust as needed */
    border-radius: 30px 30px 0 0;
    /* Arc shape */
    display: flex;
    justify-content: center;
    align-items: center;
    transition: background-color 0.3s;
    /* Smooth transition */
  }

  .icon-wrapper.active {
    /* background-color: #007bff; */
    background-color: #F5F5F5;
    /* Your primary color */
    color: #007bff;
    /* Change icon color when active */
  }

  .text-wrapper {
    display: block;
    width: 100%;
    border-radius: 5px 5px 0 0;
    /* Full width for the background */
    text-align: center;
    /* Center the text */
    /* padding: 5px 0; */
    /* Vertical padding for the text */
    transition: background-color 0.3s;
    /* Smooth transition */
  }

  .text-wrapper.active {
    /* background-color: #007bff; */
    background-color: #F5F5F5;
    /* Same primary color for the text background */
    color: #007bff;
    /* White text */
  }
</style>
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="index.php" class="logo d-flex align-items-center">
      <img src="assets/img/logoSIT.png" alt="">
      <span class="d-none d-lg-block">SIT - Admin</span>
    </a>
    <i class="d-none d-sm-block bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">
      <li class="nav-item dropdown pe-3">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <!-- <img src="assets/img/profile-img.png" alt="Profile" class="rounded-circle"> -->
          <img src="public/profile_pictures/<?= htmlspecialchars($imageName); ?>" alt="Profile" id="navbarImage" class="rounded-circle" height="50" width="50">
          <!-- <img src="get_user_profile_image.php" alt="Profile" id="navbarImage" class="rounded-circle"> -->
          <span class="d-none d-md-block dropdown-toggle ps-2" id="navbarFullName"><?= $full_name ?></span>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6 id="navFullName"> <?= $fullName ?></h6>
            <span id="navPosition"><?= $userPosition ?></span>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
              <i class="bi bi-person"></i>
              <span>My Profile</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <hr class="dropdown-divider">
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <form method="POST" action="logout.php">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">
              <button class="dropdown-item d-flex align-items-center" type="submit" name="logout">
                <i class="bi bi-box-arrow-right"></i>
                Logout
              </button>
            </form>

            <!-- <a class="dropdown-item d-flex align-items-center" href="logout.php">
              <i class="bi bi-box-arrow-right"></i>
              <span>Sign Out</span>

            </a> -->
          </li>

        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->

    </ul>
  </nav><!-- End Icons Navigation -->
</header><!-- End Header -->

<script>
  document.addEventListener('contextmenu', event => event.preventDefault());

  document.onkeydown = function(e) {
    if (e.key === "F12") {
      return false; // Disable F12
    }
  };
</script>