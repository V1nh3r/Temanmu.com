<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="style_curhatanmu.css" />
  </head> 
  <body>
    <div class="curhatanmu">
      <div class="div">
        <div class="landing-page">
            <div class="overlap-group">
            <header class="header">
              <div class="text-wrapper">
                <a href="homepage_logged.html" class="home_button">Temanmu.com</a>
              </div>            
              <div class="frame">
                <div class="frame-2">
                  <div class="button-text">
                    <a href="homepage_logged.html" class="button-text-2">Beranda</a></div>
                  <div class="button-text-wrapper">
                    <a href="topik_logged.html" class="button-text-2">Topik</a>
                  </div>
                  <div class="button-text-wrapper"><div class="button-text-2">Curhatanmu</div></div>
                  <div class="button-text-wrapper">
                    <a href="tentang-kami_logged.html" class="button-text-2">Tentang kami</a>
                  </div>
                  <div class="div-wrapper"><div class="button-text-2">Testimoni</div></div>
                </div>
                <div class="icon-profile-wrapper"><img class="icon-profile" src="btn/profile_button.png" />
                  <div class="popup-content">
                      <p><a href="register.html">Register</a></p>
                      <p><a href="login.html">Login</a></p>
                  </div>
              </div>
              </div>
            </header>
          </div>
        </div>
        <div class="box"><div class="background-biru"></div></div>
        <div class="heading"><div class="text-wrapper">Mulai ceritamu</div></div>
        <div class="heading-1"><div class="text-wrapper-1">dengan Temanmu, pendengarmu</div></div>
        <div class="dropdown-fix">
            <div class="frame" >
              <div class="pilih-topikmu" id="selectedOption">Keuangan</div>
              <img class="u-angle-down" src="btn/u_angle-down.svg" onclick="toggleDropdown()" />
           </div>
           <div class="dropdown-content" id="myDropdown">
            <a href="#" onclick="selectOption('Percintaan')">Percintaan</a>
            <a href="#" onclick="selectOption('Persahabatan')">Persahabatan</a>
            <a href="#" onclick="selectOption('Keuangan')">Keuangan</a>
          </div>
        </div>
        <div class="icon-mau-curhat">
            <img class="icon-mau-curhta" src="btn/icon-mau-curhta.svg" />
            <div class="mau-curhat" onclick="showPopup()"><div class="text-wrapper-5">Mau Curhat?</div></div>
        </div>
        <div id="popup" class="rectangle">
            <div class="secondary-button-s">
                <button class="close-wrapper" onclick="closePopup()">Cancel</button>
            </div>
            <div class="primary-button-s">
                <button class="post-wrapper">Post</button>
            </div>
            <div class="rectangle-1">
                <form>
                    <textarea id="postText" name="postText" rows="4" cols="50" placeholder="Tuliskan keluh kesah kamu..."></textarea>
                </form>
            </div>           
        </div>

        <div id="postedTextContainer" class="posted-text-container">
            <!-- Kotak untuk menampilkan teks yang telah diposting -->
        </div>



        <footer class="footer">
          <div class="text-wrapper-2">
            <a href="homepage_logged.html" class="home_button">Temanmu.com</a>
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
              <a href="homepage_logged.html">
                  <div class="button-text-4">Beranda</div>
              </a>
          </div>
          <div class="button-text-3">
              <a href="topik_logged.html">
                  <div class="button-text-4">Topik</div>
              </a>
          </div>
            <div class="button-text-3"><div class="button-text-4">Curhatanmu</div></div>
            <div class="button-text-3">
              <a href="tentang-kami_logged.html">
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
      function showPopup() {
        var popup = document.getElementById('popup');
        popup.style.display = (popup.style.display === 'none' || popup.style.display === '') ? 'block' : 'none';
      }
    </script>
    <script>
        function toggleDropdown() {
          var dropdown = document.getElementById("myDropdown");
          dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";
        }
      
        function selectOption(option) {
          var selectedOptionElement = document.getElementById("selectedOption");
          selectedOptionElement.textContent = option;
          toggleDropdown(); // Hide dropdown after selecting an option
        }
      
        // Menutup dropdown jika di luar dropdown diklik
        window.onclick = function(event) {
          if (!event.target.matches('.u-angle-down')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            for (var i = 0; i < dropdowns.length; i++) {
              var openDropdown = dropdowns[i];
              if (openDropdown.style.display === 'block') {
                openDropdown.style.display = 'none';
              }
            }
          }
        }
    </script>
    <script>
        function showPopup() {
            var popup = document.getElementById("popup");
            popup.style.display = "block";
        }
        
        function closePopup() {
            var popup = document.getElementById("popup");
            popup.style.display = "none";
        }        
    </script>     
  </body>
</html>
