<section class="works section">
  <div class="section__inner">
    <h2 class="works__title section__title">WORKS</h2>

    <div class="works__section">
      <h3 class="works__sectionTitle">制作実績 — Work</h3>
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
          $sp_image = get_field('sp_image');
          $skills_highlight = get_field('skills_highlight');
          if (!is_array($skills_highlight)) {
            $skills_highlight = $skills_highlight ? array($skills_highlight) : [];
          }
      ?>
      <div class="works__item">
        <div class="works__body">
          <h3 class="works__title"><?php the_title(); ?></h3>
          <div class="works__images">
            <?php if ($sp_image) : ?>
              <img src="<?php echo esc_url($sp_image['url']); ?>" alt="<?php echo esc_attr($sp_image['alt']); ?>" class="works__image--sp">
            <?php endif; ?>
          </div>
          <div class="works__text">
            <ul class="works__details">
              <li class="works__skills">
                <?php if ($skills_highlight && is_array($skills_highlight)) {
                  echo '<ul class="works__skillsList">';
                  foreach ($skills_highlight as $skill) {
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
    </div>
  </div>
</section>