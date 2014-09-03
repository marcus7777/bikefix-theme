<?php if (!$page) { ?>
<article<?php print $attributes; ?>>
  <?php print $user_picture; ?>
  <?php print render($title_prefix); ?>
  <?php if (!$page && $title): ?>
  <header>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
  </header>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($display_submitted): ?>
  <footer class="submitted">
    <?php print $submitted; ?>
  </footer>
  <?php endif; ?>

  <div<?php print $content_attributes; ?>>
    <?php
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>
</article>
<?php } else { ?>
<article<?php print $attributes; ?>>
  <?php print $user_picture; ?>
  <?php print render($title_prefix); ?>
  <?php if (!$page && $title): ?>
  <header>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
  </header>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <div class="container-24 grid-12 clearfix">
    <?php if ($content['field_image']) :  ?>
    <div class="images" >
      <?php print render($content['field_image']); ?>
      <div class="thumbs" >
	<div class="thumbs-inner" >
          <?php print render($content['field_images']); ?>
        </div> 
      </div>
    </div>
    <?php endif; ?>
    <div class="other" >
      <?php
        // We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        hide($content['title_field']);
        hide($content['field_baby_ducks']);
        hide($content['body']); 
        hide($content['field_space_under']); ?>
      <?php print render($content); ?>
    </div>
  </div>
  <div class="container-24 grid-11 prefix-1">
    <div<?php print $content_attributes; ?>>
      <?php
        print render($content['title_field']);
        print render($content['body']);
      ?>
    </div>
  </div>
  <div class="container-24 grid-24 clearfix">
    <?php if (!empty($content['links'])): ?>
    <?php /* <nav class="links node-links clearfix"><?php print render($content['links']); ?></nav>
           */
    ?>
    <?php endif; ?>
    <?php
      print render($content['field_space_under']);
      print render($content['field_baby_ducks']);
      print render($content['comments']);
    ?>
  </div>
</article>
<?php } ?>
