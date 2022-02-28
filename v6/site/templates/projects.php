<?php
?>
<?php snippet('header') ?>

<body>
  
<div class="scrolling-wrapper-flexbox">
<?php foreach ($page->children()->listed() as $project): ?>

  <a class="js-page-transition" href="<?= $project->url() ?>">
   <div class="card">
     
   <figure>
        <span class="img-carousel" >

        <span class="hover-background"></span>
          <?= ($cover = $project->cover()) ?>
          <figcaption class="img-caption right">
          <?= $project->title()->html() ?>
        </figcaption>
        </span>
    </figure>    

    
   </div>
  </a>

  <?php endforeach ?>
  </div>
  </body>


<style >

html, body {
    max-width: 100%;
    overflow-x: hidden;
    height: 100vh !important;
    overflow-y: hidden;
}

/* Hide scrollbar for Chrome, Safari and Opera */
.scrolling-wrapper-flexbox::-webkit-scrollbar {
  display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
.scrolling-wrapper-flexbox {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}

img:last-of-type{
  margin-right:48px;
}


img {
  width: 950px;
  top: -900px;
  position: relative;
  z-index: -1;
}

.scrolling-wrapper-flexbox {
  display: flex;
  padding-right: 3rem !important;
  z-index: 0;
}
  .card {
    flex: 0 0 auto;
  }


.card {
  width: 350px;
  height: 100%;
  margin-right: -10px;
}



.scrolling-wrapper-flexbox {
  height: -webkit-fill-available;
  margin-bottom: 20px;
  width: 100%;
  -webkit-overflow-scrolling: touch;
  -webkit-scrollbar: none;
  overflow-x: auto !important;
}

.img-caption.right {
  text-align: right;
    left: 580px;
    position: relative;
    display: none;
    transition: transform 0.1s ease-in;

    margin-top: -900px;

}

.hover-background:hover ~ .img-caption.right {
  display: block;
}


.hover-background{
  display: block;
  width: 180px;
  height: 900px;
  transform: rotate(-50deg) translateX(322px) translateY(210px);
  z-index: 10000;
}

.hover-background:hover ~ img {
  transform: scale(0.96);
  transition: transform 0.2s ease-in-out;
}
</style>