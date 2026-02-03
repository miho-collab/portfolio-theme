<section class="works section">
  <div class="section__inner">
    <h2 class="works__title section__title">WORKS</h2>

    <!-- webセクション -->
    <section class="works__section works__section--web">
      <h3 class="works__sectionTitle">Web制作実績 — Client Websites</h3>
      <?php
      $args_web = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
        'category_name' => 'web'
      );
      $works_query_web = new WP_Query($args_web);
      if ($works_query_web->have_posts()) :
        while ($works_query_web->have_posts()) : $works_query_web->the_post();
          $pc_image = get_field('pc_image');
          $sp_image = get_field('sp_image');
          $skills = get_field('skills_used');
          if (!is_array($skills)) {
            $skills = $skills ? array($skills) : [];
          }
      ?>
      <div class="works__item works__item--web">
        <div class="works__body">
          <h3 class="works__title"><?php the_title(); ?></h3>
          <div class="works__images">
            <?php if ($sp_image) : ?>
              <img src="<?php echo esc_url($sp_image['url']); ?>" alt="<?php echo esc_attr($sp_image['alt']); ?>" class="works__image--sp">
            <?php endif; ?>
          </div>
          <div class="works__text">
            <ul class="works__details">
              <li class="works__desc"><?php the_field('works_description'); ?></li>
              <li class="works__summary"><?php the_field('works_summary'); ?></li>
              <li class="works__skills">
                <?php if ($skills && is_array($skills)) {
                  echo '<ul class="works__skillsList">';
                  foreach ($skills as $skill) {
                    echo '<li class="works__skillItem">' . esc_html(is_array($skill) ? $skill['label'] : $skill) . '</li>';
                  }
                  echo '</ul>';
                } ?>
              </li>
              <li class="works__github">
                <?php if (get_field('github_url')) : ?>
                  <p><a href="<?php the_field('github_url'); ?>" target="_blank" rel="noopener noreferrer">GitHubを見る</a></p>
                <?php endif; ?>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <?php
        endwhile;
        wp_reset_postdata();
      endif;
      ?>
    </section>

    <!-- dtpセクション -->
    <section class="works__section works__section--dtp">
      <h3 class="works__sectionTitle">チラシ・印刷物 — Print & Flyers</h3>
      <?php
      $args_dtp = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
        'category_name' => 'dtp'
      );
      $works_query_dtp = new WP_Query($args_dtp);
      if ($works_query_dtp->have_posts()) :
        while ($works_query_dtp->have_posts()) : $works_query_dtp->the_post();
          $thumbnail = get_the_post_thumbnail_url();
          $skills = get_field('skills_used');
          if (!is_array($skills)) {
            $skills = $skills ? array($skills) : [];
          }
      ?>
      <div class="works__item works__item--dtp">
        <div class="works__body">
          <h3 class="works__title"><?php the_title(); ?></h3>
          <div class="works__article flex">
            <div class="works__dtpImages">
              <a href="<?php the_permalink(); ?>" class="works__thumbLink">
                <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php the_title_attribute(); ?>" class="works__image works__image--dtp">
              </a>
            </div>
            <div class="works__text">
              <ul class="works__details">
                <li class="works__desc"><?php the_field('works_description'); ?></li>
                <li class="works__summary"><?php the_field('works_summary'); ?></li>
                <li class="works__skills">
                  <?php if ($skills && is_array($skills)) {
                    echo '<ul class="works__skillsList">';
                    foreach ($skills as $skill) {
                      echo '<li class="works__skillItem">' . esc_html(is_array($skill) ? $skill['label'] : $skill) . '</li>';
                    }
                    echo '</ul>';
                  } ?>
                </li>
                <li class="works__github">
                  <?php if (get_field('github_url')) : ?>
                    <p><a href="<?php the_field('github_url'); ?>" target="_blank" rel="noopener noreferrer">GitHubを見る</a></p>
                  <?php endif; ?>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <?php
        endwhile;
        wp_reset_postdata();
      endif;
      ?>
    </section>

    <!-- fictitiousセクション -->
    <section class="works__section works__section--fictitious">
      <h3 class="works__sectionTitle">架空サイト — Concept / Spec</h3>
      <?php
      $args_fictitious = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
        'category_name' => 'fictitious'
      );
      $works_query_fictitious = new WP_Query($args_fictitious);
      if ($works_query_fictitious->have_posts()) :
        while ($works_query_fictitious->have_posts()) : $works_query_fictitious->the_post();
          $sp_image = get_field('sp_image');
          $skills = get_field('skills_used');
          if (!is_array($skills)) {
            $skills = $skills ? array($skills) : [];
          }
      ?>
      <div class="works__item works__item--fictitious">
        <div class="works__body">
          <h3 class="works__title"><?php the_title(); ?></h3>
          <div class="works__images">
            <?php if ($pc_image) : ?>
              <img src="<?php echo esc_url($pc_image['url']); ?>" alt="<?php echo esc_attr($pc_image['alt']); ?>" class="works__image--pc">
            <?php endif; ?>
            <?php if ($sp_image) : ?>
              <img src="<?php echo esc_url($sp_image['url']); ?>" alt="<?php echo esc_attr($sp_image['alt']); ?>" class="works__image--sp">
            <?php endif; ?>
          </div>
          <div class="works__text">
            <ul class="works__details">
              <li class="works__desc"><?php the_field('works_description'); ?></li>
              <li class="works__summary"><?php the_field('works_summary'); ?></li>
              <li class="works__skills">
                <?php if ($skills && is_array($skills)) {
                  echo '<ul class="works__skillsList">';
                  foreach ($skills as $skill) {
                    echo '<li class="works__skillItem">' . esc_html(is_array($skill) ? $skill['label'] : $skill) . '</li>';
                  }
                  echo '</ul>';
                } ?>
              </li>
              <li class="works__github">
                <?php if (get_field('github_url')) : ?>
                  <p><a href="<?php the_field('github_url'); ?>" target="_blank" rel="noopener noreferrer">GitHubを見る</a></p>
                <?php endif; ?>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <?php
        endwhile;
        wp_reset_postdata();
      endif;
      ?>
    </section>
  </div>
</section>