<?php
?>
<!DOCTYPE html>
<html lang="fr">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <?php foreach ($kirby->languages() as $language) : ?>
  <link rel="alternate" hreflang="<?php echo strtolower(html($language->code())); ?>" href="<?= $page->url($language->code()); ?>" />
  <?php endforeach; ?>
  <link rel="alternate" hreflang="x-default" href="<?= $page->url($kirby->defaultLanguage()->code()); ?>" />

  
  <?php
  ?>
  <title><?= $site->title() ?> | <?= $page->title() ?></title>

  <?php
  /*
    Stylesheets can be included using the `css()` helper.
    Kirby also provides the `js()` helper to include script file.
    More Kirby helpers: https://getkirby.com/docs/reference/templates/helpers
  */
  ?>
  <?= css([
    'assets/css/prism.css',
    'assets/css/lightbox.css',
    'assets/css/index.css',
    'assets/css/header_transiton.css',
    '@auto'
  ]) ?>

  <?php
  /*
    The `url()` helper is a great way to create reliable
    absolute URLs in Kirby that always start with the
    base URL of your site.
  */
  ?>
  <link rel="shortcut icon" type="image/x-icon" href="<?= url('favicon.ico') ?>">
</head>
<body>

  <header class="header">
    <?php
    /*
      We use `$site->url()` to create a link back to the homepage
      for the logo and `$site->title()` as a temporary logo. You
      probably want to replace this with an SVG.
    */
    ?>
    <a class="logo js-page-transition" href="<?= $site->url() ?>">
      <?= $site->title()->html() ?>
    </a>

    <a class="nav__logo js-page-transition" href="<?= $site->url() ?>">
                    <svg id="Layer_1" width="200px" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 841.89 595.28"><defs><style>.cls-1{fill:#fff;}</style></defs><path class="cls-1" d="M553.62,309.27c3.43-.36,122.21-.29,124.32,0,.57.79.32,1.73.33,2.61,0,6.74,0,13.48,0,20.23v30.61c0,1,0,2-.08,3.1-.65.08-1.17.19-1.69.21-.73,0-1.46,0-2.18,0h-145c-8.74-6.87-149.92-125.49-151.77-127.51.11-.49.53-.42.86-.43.73,0,1.46,0,2.19,0h85.56a9.91,9.91,0,0,0,1.09,0,4.84,4.84,0,0,1,3.92,1.44c5.88,5,11.85,10,17.77,14.94a7.84,7.84,0,0,1,2.2,2.21,5.39,5.39,0,0,1-1.11.29c-.81,0-1.64,0-2.46,0H432.93a9.55,9.55,0,0,0-3.16.19c-.2.8.39,1,.77,1.35q5.83,4.94,11.7,9.85,19.88,16.69,39.76,33.38l41.88,35.11c3.63,3,7.29,6,10.88,9.13a3.83,3.83,0,0,0,2.94,1.13c.63,0,1.28,0,1.91,0H655.24c1.17,0,2.35,0,3.61,0a7.62,7.62,0,0,0,.29-1.42c0-5.47,0-10.93,0-16.4a11,11,0,0,0-.15-1.19,12.48,12.48,0,0,0-1.57-.25c-.81-.05-1.63,0-2.45,0q-38.15,0-76.27,0c-3.6,0-2.6.41-5.39-1.91-6-5-12-10.07-18-15.11C554.85,310.41,554.41,310,553.62,309.27Z"/><path class="cls-1" d="M202.56,293.86c0,3.3,0,6.21,0,9.12s.09,5.79-.08,8.81a16.41,16.41,0,0,1-4.7.27c-1.54.05-3.09,0-4.64,0s-3.1,0-4.65,0-3.08.24-4.59-.24a2.9,2.9,0,0,1-.27-.82q0-35.94,0-71.88a3.08,3.08,0,0,1,.31-.85c.61-.05,1.23-.15,1.85-.16,1.82,0,3.64,0,5.46,0H329.55c3.07,0,3.05,0,5.36,2L368,267.81l49.58,41.64q20.82,17.48,41.67,34.93l24.29,20.35a6,6,0,0,0,.8.53c-.31,1.06-1,.79-1.44.79-6.28,0-12.57,0-18.86,0-2.28,0-4.55,0-6.83,0a3.77,3.77,0,0,1-2.7-1c-6-5.13-12.13-10.2-18.21-15.29l-33.71-28.25-26.79-22.49-33.91-28.44-13.39-11.25c-.55-.47-1.16-.89-1.68-1.4a3.4,3.4,0,0,0-2.74-.95c-.54,0-1.09,0-1.64,0H203a4.42,4.42,0,0,0-.38,1.14q0,7.8,0,15.58a5.12,5.12,0,0,0,.23.93c.52,0,1,.13,1.56.15.82,0,1.64,0,2.46,0H315.34c.64,0,1.28.05,1.91,0a4.22,4.22,0,0,1,3.23,1.14q9.9,8.37,19.87,16.7a4.5,4.5,0,0,1,.47.56c-.05.57-.41.59-.77.59H206.39C205.22,293.8,204.06,293.84,202.56,293.86Z"/><path class="cls-1" d="M567.64,413.5h-8.1c-.81,0-1.31-.56-1.87-1l-6.49-5.44L513.93,375.8l-40.17-33.73q-22.92-19.23-45.82-38.46Q404.6,284,381.25,264.48l-51.67-43.39-33.07-27.74A13.39,13.39,0,0,1,294,191c.2-.21.31-.44.43-.44,2.73,0,5.45,0,8.18,0a.72.72,0,0,1,.26.08,3.47,3.47,0,0,1,.42.34L567,412.22l.4.37a.76.76,0,0,1,.13.23C567.51,412.9,567.52,413,567.64,413.5Z"/></svg>
                </a>
    
                <div class="nav__burger">
                    <div class="nav__burger-inner">
                        <a href="#" class="text-image__trigger js-text-image__trigger"></a>
                        <div class="text-image__text-inner js-text-image__text-inner">
                            <div class="js-text-image__text-wrapper">
                                    <?php
      /*
        In the menu, we only fetch listed pages,
        i.e. the pages that have a prepended number
        in their foldername.

        We do not want to display links to unlisted
        `error`, `home`, or `sandbox` pages.

        More about page status:
        https://getkirby.com/docs/reference/panel/blueprints/page#statuses
      */
      ?>
                            <?php foreach ($site->children()->listed() as $item): ?>
                                <ul>
                                    <li><a class="nav__link js-page-transition" <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
                                </ul>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <a href="#" class="text-image__trigger js-text-image__trigger"></a>
                    </div>
                </div>

  </header>

  <div class="page-transition">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 841.89 595.28"><defs>
                <style>.cls-1{fill:#fff;}</style></defs>
                <path id="pageTransitionClip" class="cls-1" d="M553.62,309.27c3.43-.36,122.21-.29,124.32,0,.57.79.32,1.73.33,2.61,0,6.74,0,13.48,0,20.23v30.61c0,1,0,2-.08,3.1-.65.08-1.17.19-1.69.21-.73,0-1.46,0-2.18,0h-145c-8.74-6.87-149.92-125.49-151.77-127.51.11-.49.53-.42.86-.43.73,0,1.46,0,2.19,0h85.56a9.91,9.91,0,0,0,1.09,0,4.84,4.84,0,0,1,3.92,1.44c5.88,5,11.85,10,17.77,14.94a7.84,7.84,0,0,1,2.2,2.21,5.39,5.39,0,0,1-1.11.29c-.81,0-1.64,0-2.46,0H432.93a9.55,9.55,0,0,0-3.16.19c-.2.8.39,1,.77,1.35q5.83,4.94,11.7,9.85,19.88,16.69,39.76,33.38l41.88,35.11c3.63,3,7.29,6,10.88,9.13a3.83,3.83,0,0,0,2.94,1.13c.63,0,1.28,0,1.91,0H655.24c1.17,0,2.35,0,3.61,0a7.62,7.62,0,0,0,.29-1.42c0-5.47,0-10.93,0-16.4a11,11,0,0,0-.15-1.19,12.48,12.48,0,0,0-1.57-.25c-.81-.05-1.63,0-2.45,0q-38.15,0-76.27,0c-3.6,0-2.6.41-5.39-1.91-6-5-12-10.07-18-15.11C554.85,310.41,554.41,310,553.62,309.27Z"/><path class="cls-1" d="M202.56,293.86c0,3.3,0,6.21,0,9.12s.09,5.79-.08,8.81a16.41,16.41,0,0,1-4.7.27c-1.54.05-3.09,0-4.64,0s-3.1,0-4.65,0-3.08.24-4.59-.24a2.9,2.9,0,0,1-.27-.82q0-35.94,0-71.88a3.08,3.08,0,0,1,.31-.85c.61-.05,1.23-.15,1.85-.16,1.82,0,3.64,0,5.46,0H329.55c3.07,0,3.05,0,5.36,2L368,267.81l49.58,41.64q20.82,17.48,41.67,34.93l24.29,20.35a6,6,0,0,0,.8.53c-.31,1.06-1,.79-1.44.79-6.28,0-12.57,0-18.86,0-2.28,0-4.55,0-6.83,0a3.77,3.77,0,0,1-2.7-1c-6-5.13-12.13-10.2-18.21-15.29l-33.71-28.25-26.79-22.49-33.91-28.44-13.39-11.25c-.55-.47-1.16-.89-1.68-1.4a3.4,3.4,0,0,0-2.74-.95c-.54,0-1.09,0-1.64,0H203a4.42,4.42,0,0,0-.38,1.14q0,7.8,0,15.58a5.12,5.12,0,0,0,.23.93c.52,0,1,.13,1.56.15.82,0,1.64,0,2.46,0H315.34c.64,0,1.28.05,1.91,0a4.22,4.22,0,0,1,3.23,1.14q9.9,8.37,19.87,16.7a4.5,4.5,0,0,1,.47.56c-.05.57-.41.59-.77.59H206.39C205.22,293.8,204.06,293.84,202.56,293.86Z"/><path class="cls-1" d="M567.64,413.5h-8.1c-.81,0-1.31-.56-1.87-1l-6.49-5.44L513.93,375.8l-40.17-33.73q-22.92-19.23-45.82-38.46Q404.6,284,381.25,264.48l-51.67-43.39-33.07-27.74A13.39,13.39,0,0,1,294,191c.2-.21.31-.44.43-.44,2.73,0,5.45,0,8.18,0a.72.72,0,0,1,.26.08,3.47,3.47,0,0,1,.42.34L567,412.22l.4.37a.76.76,0,0,1,.13.23C567.51,412.9,567.52,413,567.64,413.5Z"/></svg>
        </div>


        <script type="text/javascript" src="/assets/js/header_transition.js"></script>

  <main class="main">
