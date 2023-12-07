
<?php
// Include database connection file
include 'db_connection.php';

// echo '<script>alert("reached point a")</script>';

error_reporting(E_ALL);


// Check if form was submitted
if (isset($_POST['submit'])) {
    echo '<script>alert("reached point b")</script>';
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $nama_lengkap = $_POST['nama_lengkap'];

    // Initialize an array to store potential errors
    $errors = array();

    // Validate inputs
    if (empty($username) || empty($email) || empty($password)) {
        array_push($errors, "Please fill all the fields.");
    }

    echo '<script>alert("reached this point")';

    // If no errors, proceed to insert data into the database
    if (count($errors) == 0) {
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, email, password, nama_lengkap) VALUES (?, ?, ?, ?)";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssss", $username, $email, $password, $nama_lengkap);
            if ($stmt->execute()) {
                // Redirect or inform the user of successful registration
                echo '<script>alert("Register Successful")</script>';
                // header("Location: login.php");
                // exit();
            } else {
                // Handle error in execution
                echo "<script>alert('Something went wrong. Please try again later.')</script>";
            }
            $stmt->close();
        }
    }

    // Close database connection
    $conn->close();
}
?>



<html>
  <head>
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="style_register.css" />
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
          <div class="body-wrapper"><div class="body-4">Sudah punya akun?</div></div>
          <div class="body-5">
            <div class="body-6" id="daftar-button">
                <a href="login.php">masuk</a>
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
        
        <div class="body-13"><div class="body-8">Nama Lengkap</div></div>
        <div class="body-7"><div class="body-8">Username</div></div>
        <div class="body-14"><div class="body-8">Email</div></div>
        <div class="body-9"><div class="body-8">Password</div></div>
        <form method="post" action="">
        <div class="rectangle">
        
        <?php
        // echo '<script>alert("reached point a")</script>';
          if ($_SERVER["REQUEST_METHOD"] == "POST")
          {
            $username = $_POST['username'];
            $nama_lengkap = $_POST['nama_lengkap'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $errors = array();
            if(empty($username) OR empty ($nama_lengkap) OR empty($email) OR empty($password))
            {
              array_push($errors, "Fill all empty fields");
            }

            echo '<script>alert("reached point a")';
          }
          ?>
         
          
            <input type="text-nama" name="nama_lengkap" placeholder="Enter your full name" />
            <input type="text-user" name="username" placeholder="Enter your username" />
            <input type="email-daftar" name="email" placeholder="Enter your email" />
            <input type="password" name="password" placeholder="Enter your password" />
            
          
          
        </div>
        

        <div class="primary-button-m">
        <button type="submit" class="primary-button-m-2" name="submit">Daftar</button>
        </div>
        </form>
        <div class="body-10"><div class="body-4a">Sambungkan akun ke</div></div>
        <div class="body-11"><div class="body-6a">Spotify</div></div>
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
