<?php snippet('header') ?>

<h1 class="intro">We are a digital product agency that focuses on strategy and design.</h1>

<?php if ($cover = $page->cover()): ?>
<figure>
  <a href="<?= $cover->url() ?>" data-lightbox class="img" style="--w:2;--h:1">
    <?= $cover->crop(1200, 600) ?>
  </a>
</figure>
<?php endif ?>

<hr>


<section class="section grid">

</section>

<?php snippet('footer') ?>