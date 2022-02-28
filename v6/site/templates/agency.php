<?php snippet('agency/header') ?>

<h1 class="intro">We are a digital product agency that focuses on strategy and design.</h1>

<?php if ($cover = $page->cover()): ?>
<figure>
  <a href="<?= $cover->url() ?>" data-lightbox class="img" style="--w:2;--h:1">
    <?= $cover->crop(1200, 600) ?>
  </a>
</figure>
<?php endif ?>

<hr>

  <h1><?= $page->headline()->or($page->title())->html() ?></h1>
  <?php if ($page->subheadline()->isNotEmpty()): ?>
  <p class="color-grey"><?= $page->subheadline()->html() ?></p>
  <?php endif ?>

<?php if ($projects->count()): ?>
<h2 class="h1" id="projects">Featured work</h2>
<?php snippet('agency/projects', ['projects' => $projects, 'columns' => 4]) ?>
<hr>
<?php endif ?>

<?php if ($clients->count()): ?>
<h2 class="h1" id="clients">Our clients</h2>
<?php snippet('agency/clients', ['clients' => $clients]) ?>
<hr>
<?php endif ?>

<section class="section grid">
  <div class="column" style="--columns: 4">
    <h2 class="intro"><?= $home->contactHeading()->escape() ?></h2>
    <div class="text">
      <?= $home->contactText()->kt() ?>
      <p><?= html::email($home->contactAddress()) ?></p>
    </div>
  </div>
</section>

<?php snippet('agency/footer') ?>