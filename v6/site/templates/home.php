  

<?php
?>
<?php snippet('header-intro') ?>

    <body class="main en transition-in transition-out">
      
      <div id="hov">click      <a class="main-link js-page-transition" href="/main"></a></div>

              
          <img class="main"
          id="myVideo"
          src="/assets/files/placeholder-giraldi.webp"
          alt="Agence Giraldi - Architecture Monaco"
        />

          <video class="main" autoplay playsinline muted loop id="myVideo">
              <source src="/assets/files/test-giraldi.mp4" type="video/mp4" />
            </video>

  </body>

 
  <style scoped>



html {
    background: var(--color-black);
}

#myVideo {
    z-index: -1;
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    top: 0;
    height: 100vh;
    width: 100vw;
    -o-object-fit: cover;
    object-fit: cover;
    -o-object-fit: cover;
    object-fit: cover;
    -o-object-position: center;
    object-position: center;
}

.main-link {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    top: 0;
    height: 100vh;
    width: 100vw;
    cursor: none;
    z-index: 99;
}


.main:hover > #hov{
    display : block;
  
  }
  
  #hov{
    display:none;
    position:absolute;
    font-size:20px;
    color: #fff;
    z-index: 100;
  }
  
  .main{
    font-family: Barlow, sans-serif;
    cursor: none;
    z-index: 1;
    left: 0;
    right: 0;
    bottom: 0;
    top: 0;
  }


    </style>
        <script>
function custom(event) {
var el = document.getElementById("hov");
el.style.top = event.clientY + "px";
el.style.left = event.clientX + "px";
    }



window.addEventListener('mousemove', custom);


        </script>