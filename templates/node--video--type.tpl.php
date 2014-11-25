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
    <div class="images" >
      <?php $image_arr = array_map("rtrim",explode("\n",render($content['product:field_images'])));
      print $image_arr[1].$image_arr[2];
      $image_arr[1] = "";
      $image_arr[2] = "";
      $images_others = implode($image_arr); ?>
    </div>
    <div class="thumbs" >
        <div class="thumbs-inner" >
          <?php print str_replace("/product_full/","/thumbnail/",$images_others); ?>
        </div>
      </div>
    <div class="other" >
      <?php
        // We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        hide($content['product:field_options']);
        hide($content['title_field']);
        hide($content['field_space_under']);
        hide($content['body']); ?>
      <?php
       if ($content['product:field_options']['#object']->field_options  == array()) {
         print render($content); 
       }
      ?>
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
    <nav class="links node-links clearfix"><?php print render($content['links']); ?></nav>
    <?php endif; ?>
    <?php
  
      print render($content['field_space_under']);
  if ($content['product:field_options']['#object']->field_options  != array()) {
    print "<h2 class='options-title'>Pick Your Options</h2>" . render($content['product:field_options'] );
    print "<div class='other_2'>" . render($content) ."</div>"; 
  }
    print render($content['comments']);
    ?>
  </div>
</article>
