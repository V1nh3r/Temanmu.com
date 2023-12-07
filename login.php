<!DOCTYPE html>
<?php
session_start(); // Start a new session

// Include database connection file
require_once 'db_connection.php';

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL to check the username and password
    $sql = "SELECT id, password FROM users WHERE username = ?";

    // Prepare statement
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $username);
        
        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            $stmt->store_result();

            // Check if username exists
            if ($stmt->num_rows == 1) {
                $stmt->bind_result($id, $hashed_password);
                if ($stmt->fetch()) {
                    // Verify the password
                    if (password_verify($password, $hashed_password)) {
                        // Password is correct, start a new session
                        $_SESSION['loggedin'] = true;
                        $_SESSION['id'] = $id;
                        $_SESSION['username'] = $username;                        
                        header("Location: homepage_logged.php");
                        exit();
                    } else {
                        $error = "Invalid password.";
                    }
                }
            } else {
                $error = "Invalid username.";
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        $stmt->close();
    }
}
$conn->close();
?>


<html>
  <head>
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="style_login.css" />
  </head>
  <body>
    <div class="landing-masuk-noreen">
      <div class="div">
        <header class="header">
          <div class="text-wrapper">
            <a href="homepage.php" class="home_button">Temanmu.com</a>
          <div class="frame">
            <div class="frame-2">
              <div class="button-text-wrapper">
                <a href="homepage.php" class="button-text-2">Beranda</a>
              </div>
              <div class="button-text-wrapper">
                <a href="topik.php" class="button-text-2">Topik</a>
              </div>
              <div class="button-text-wrapper"><div class="button-text-2">Curhatanmu</div></div>
              <div class="button-text-wrapper"><div class="button-text-2">Tentang</div></div>
              <div class="div-wrapper"><div class="button-text-2">Testimoni</div></div>
            </div>
            <div class="icon-profile-wrapper"><img class="icon-profile" src="btn/profile_button.png" /></div>
          </div>
        </header>
        <footer class="footer">
          <div class="text-wrapper-2">
            <a href="homepage.php" class="home_button">Temanmu.com</a>
          </div>
          <div class="text-wrapper-3">Temanmu, pendengarmu</div>
          <div class="frame-3">
            <img class="img-2" src="btn/facebook_button.png" />
            <img class="img-3" src="btn/twitter_button.png" />
            <img class="img-4" src="btn/instagram_button.png" />
          </div>
          <div class="text-wrapper-4">Sitemap</div>
          <div class="frame-4">
            <div class="button-text-3">
                <a href="homepage.php" class="button-text-4">Beranda</a>
            </div>
            <div class="button-text-3">
                <a href="topik.php" class="button-text-4">Topik</a>
            </div>
            <div class="button-text-3"><div class="button-text-4">Curhatanmu</div></div>
            <div class="button-text-3"><div class="button-text-4">Tentang Kami</div></div>
            <div class="button-text-3"><div class="button-text-4">Testimoni</div></div>
          </div>
        </footer>
        <div class="overlap-group">
          <div class="body"><div class="body-2">dengan Temanmu, pendengarmu</div></div>
          <div class="heading"><div class="heading-2">Mulai ceritamu</div></div>
        </div>
        <div class="heading-3"></div>
        <div class="body-3"></div>
        <div class="overlap">
          <div class="heading-wrapper"><div class="heading-4">Masuk untuk mulai ceritamu</div></div>
          <div class="body-wrapper"><div class="body-4">Belum punya akun?</div></div>
          <div class="body-5">
            <div class="body-6" id="daftar-button">
              <a href="register.php">Daftar</a>
            </div>
        </div>
        <!-- <div class="popup" id="popup">
          <div class="popup-content">
              <div class="heading-5"><div class="text-wrapper-5">Buat Akun</div></div>
              <div class="heading-6"><div class="text-wrapper-6">Sudah punya akun?</div>
              <button id="close-popup">kembali</button>
              <div class="body-12"><div class="body-14">Nama (anonymus)</div></div>
              <div class="body-15"><div class="body-14">Password</div></div>
              <div class="body-13"><div class="body-14">Email</div></div>
              <div class="rectangle">
                <form>
                  <input type="text-daftar" name="username" placeholder="Enter your username" />
                  <input type="password-daftar" name="password" placeholder="Enter your password" /> 
                  <input type="email-daftar" name="username" placeholder="Enter your email" /> 
                </form>
              </div>
              </div>
              <div class="body-daftar"><div class="body-tulisan">Sambungkan akun ke</div></div>
              <div class="body-daftar-1"><div class="body-tulisan-1">Spotify</div></div>
              <div class="primary-button-daftar">
                <a href="login.php" class="primary-button-m-2">Daftar</a>
              </div>
           </div> -->
        </div>
        <div class="body-7"><div class="body-8">Username</div></div>
        <div class="body-9"><div class="body-8">Password</div></div>
        <div class="rectangle">
          <<form method="post" action="login.php">
            <input type="text" name="username" placeholder="Enter your username" required />
            <input type="password" name="password" placeholder="Enter your password" required />
            <input type="submit" value="Masuk">
          </form>
          
        </div>
        

        <div class="primary-button-m">
        <a href="homepage_logged.php" class="primary-button-m-2">Masuk</a>
        </div>
        <div class="body-10"><div class="body-4">Sambungkan akun ke</div></div>
        <div class="body-11"><div class="body-6">Spotify</div></div>
      </div>
    </div>
  </body>
</html>


<script>
  const daftarButton = document.getElementById("daftar-button");
  const popup = document.getElementById("popup");
  const closePopupButton = document.getElementById("close-popup");

  daftarButton.addEventListener("click", () => {
      popup.style.display = "block";
  });

  closePopupButton.addEventListener("click", () => {
      popup.style.display = "none";
  });
</script>
