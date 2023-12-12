<?php
require_once 'db_connection.php';

// Check if the button has been pressed
if(isset($_POST['run_script'])) {
    // Replace 'python' with the full path to the Python executable if it's not in the PATH
    $pythonExecutable = 'C:\Users\user\AppData\Local\Programs\Python\Python310\python.exe';
    $pythonScript = 'D:\\Xammp\\htdocs\\Temanmu.com-main\\API_Spot.py';
    exec("\"{$pythonExecutable}\" \"{$pythonScript}\"", $output, $return_var);
    // Handle the output if needed
    header('Content-Type: application/json');
    echo json_encode($output);
    exit;
}
?>


<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="style_homepage.css" />
  </head> 
  <body>
    <div class="home-brenda">
      <div class="div">
        <div class="landing-page">
            <div class="overlap-group">
            <header class="header">
              <div class="text-wrapper">
                <a href="homepage.php" class="home_button">Temanmu.com</a>
              </div>            
              <div class="frame">
                <div class="frame-2">
                  <div class="button-text"><div class="button-text-2">Beranda</div></div>
                  <div class="button-text-wrapper">
                    <a href="topik.php" class="button-text-2">Topik</a>
                  </div>
                  <div class="button-text-wrapper"><div class="button-text-2">Curhatanmu</div></div>
                  <div class="button-text-wrapper">
                    <a href="tentang-kami.php" class="button-text-2">Tentang kami</a>
                  </div>
                  <div class="div-wrapper"><div class="button-text-2">Testimoni</div></div>
                </div>
                <div class="icon-profile-wrapper"><img class="icon-profile" src="btn/profile_button.png" />
                  <div class="popup-content">
                      <p><a href="register.php">Register</a></p>
                      <p><a href="login.php">Login</a></p>
                  </div>
              </div>
              </div>
            </header>
            <div class="container">
              <div class="overlap-group-bg-hal-1">
                <img class="hal-1" src="btn/img_1_homepage.png"/>
                <img class="hal-1" src="btn/img_2_homepage.png"/>
                <img class="hal-1" src="btn/img_3_homepage.png"/>
              </div>
              <div class="overlap-group-bg"></div>
            </div>
            <div class="frame-3">
              <div class="button-text-wrapper">
                <p class="p">Temukan temanmu untuk mendengarkan curhatanmu disini.<br> Dapatkan pendengarmu untuk mental yang lebih sehat</p><br>             
              </div>
            </div>
            <div class="heading-wrapper">
              <div class="heading"><div class="heading-2">Temanmu, pendengarmu</div></div>
            </div>
            <div class="primary-button-l">
              <div class="primary-button-l-wrapper">
                <div class="primary-button-l-2">
                    <a href="topik.php" class="primary-button-l-3">Telusuri Temanmu</a>
                </div>
            </div>
            </div>
          </div>
        </div>
        
        <div class="desktop">
          <div class="overlap">
            <div class="learn-more"></div>
            <div class="body-wrapper">
              <div class="body">
                <p class="body-2">
                  Dengan menghubungkan aplikasi spotify, kamu bisa membalas cerita<br />seseorang menggunakan lagu yang
                  menurut kamu relatable dengan<br />ceritanya!
                </p>
              </div>
            </div>
            <div class="frame-4">
              <div class="heading-3"><div class="heading-4">Hubungkan ke</div></div>
              <img class="btn-spotify" src="btn/spotify_button.svg" />
            </div>
            <div class="frame-5">
              <div class="primary-button-l-4" onclick="showPopup()">
                <div class="primary-button-l-wrapper">
                  <div class="primary-button-l-2"><div class="primary-button-l-3">Hubungkan</div></div>
                </div>
                <div class="pop-up-login-spotify" id="popup">
                  <img class="vector" src="btn/icon-spotify.svg" />
                  <p class="millions-of-songs">Millions of songs,<br />Free on Spotify</p>
                  <div class="frame-spotify">
                    <div class="div">
                      <div class="text-wrapper-spotify" id="runPythonScriptButton">Log In</div>
                      <img class="group-spotify" src="btn/vector.svg" />
                    </div>
                  </div>
                  

                  <p class="new-to-spotify-sign">
                    <span class="span">New to Spotify?</span>
                    <span class="text-wrapper-2-spotify">&nbsp;</span>
                    <a href="https://www.spotify.com/signup/" class="text-wrapper-3-spotify">Sign up for free</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="desktop-2">
          <div class="overlap-2">
            <div class="frame-6">
              <div class="heading-5"><div class="heading-4">Yuk curhat!</div></div>
            </div>
            <div class="primary-button-l-5">
              <div class="primary-button-l-wrapper">
                <div class="primary-button-l-2">
                    <a href="login.php" class="primary-button-l-3">Mulai Curhat</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="desktop-0">
          <div class="overlap-group-0">
            <div class="rectangle"></div>
            <p class="temanmu-merupakan">
              Temanmu, merupakan sebuah website yang dirancang untuk pengguna dapat bercerita, curhat, menyuarakan pendapat
              dan juga merespon cerita dari pengguna lain. Temanmu hadir karena kebanyakan orang enggan atau sulit untuk
              menyampaikan hal mengenai perasaannya. Kami ingin pengguna merasa didengar dan leluasa saat
              bercerita,&nbsp;&nbsp;sehingga kami membuat Temanmu.
            </p>
            <div class="text-wrapper-0">Tentang Kami</div>
          </div>
          <img class="unsplash" src="btn/hal_2_homepage.png" />
        </div>
        <div class="desktop-3">
          <div class="overlap-3">
            <div class="frame-10">
              <div class="heading-6"><div class="heading-7">Sistem Pointmu!</div></div>
            </div>
            <div class="group">
              <img class="btn-heart1" src="btn/hati_1.png"/>
              <img class="btn-heart1" src="btn/hati_2.png"/>
              <img class="btn-heart1" src="btn/hati_3.png"/>
              <img class="btn-heart1" src="btn/hati_4.png"/>
            </div>
          </div>
        </div>
        <footer class="footer">
          <div class="text-wrapper-2">
            <a href="homepage.php" class="home_button">Temanmu.com</a>
          </div>
          <div class="text-wrapper-3">Temanmu, pendengarmu</div>
          <div class="frame-7">
            <img class="img-2" src="btn/facebook_button.png" />
            <img class="img-3" src="btn/twitter_button.png" />
            <img class="img-4" src="btn/instagram_button.png" />
          </div>
          <div class="text-wrapper-4">Sitemap</div>
          <div class="frame-8">
            <div class="button-text-3">
              <a href="homepage.php">
                  <div class="button-text-4">Beranda</div>
              </a>
          </div>
          <div class="button-text-3">
              <a href="topik.php">
                  <div class="button-text-4">Topik</div>
              </a>
          </div>
            <div class="button-text-3"><div class="button-text-4">Curhatanmu</div></div>
            <div class="button-text-3">
              <a href="tentang-kami.php">
                  <div class="button-text-4">Tentang kami</div>
              </a>
          </div>           
           <div class="button-text-3"><div class="button-text-4">Testimoni</div></div>
          </div>
        </footer>
      </div>
    </div>
    <script src="js_body.js"></script> 
    <script>
      // JavaScript untuk menampilkan dan menyembunyikan popup
      function showPopup() {
        var popup = document.getElementById('popup');
        popup.style.display = (popup.style.display === 'none' || popup.style.display === '') ? 'block' : 'none';
      }
    </script>
    <script>
      $(document).ready(function(){
        $("#loginButton").click(function(){
          // Menjalankan skrip Python menggunakan Ajax
          $.ajax({
            type: "GET",
            url: "Non_API_Spot.py",
            success: function(response){
              console.log("Skrip Python dijalankan: " + response);
            },
            error: function(error){
              console.log("Error: " + error);
            }
          });
        });
      });
      </script>
      <script>
      document.getElementById('loginButton').addEventListener('click', function() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "path_to_your_php_script.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            // Handle response
            console.log(JSON.parse(xhr.responseText));
        }
    }
    xhr.send("run_script=true");
});
</script>
<script>
    function runPythonScript() {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "homepage.php", true); // POST request to the same PHP file
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                // Handle response here, for example, log it or display it on the page
                console.log(JSON.parse(xhr.responseText));
            }
        }
        xhr.send("run_script=true");
    }

    // Assuming you've updated your button's id to be unique, e.g., "runPythonScriptButton"
    document.getElementById('runPythonScriptButton').addEventListener('click', runPythonScript);
</script>
      
  </body>
</html>
