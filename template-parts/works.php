<section class="works section">
  <div class="innerWidth">
    <h2 class="section__title">
      <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>">
        WORKS
      </a>
    </h2>

    <div class="works__section">
      <h3 class="works__sectionTitle">Webサイト制作 — Web Design & Coding</h3>
      <div class="works__box"> 
        <?php
        $args_all = array(
          'post_type'      => 'post',
          'posts_per_page' => -1,     // 全件取得（必要に応じて数値に変更してください）
          'orderby'        => 'date',
          'order'          => 'DESC',
          'category_name' => 'web'
        );
        $works_query_all = new WP_Query($args_all);
        if ( $works_query_all->have_posts() ) :
          while ( $works_query_all->have_posts() ) : $works_query_all->the_post();
            $work_image = get_field('work_image');
            $skills_highlight = get_field('skills_highlight');
            if ( ! is_array( $skills_highlight ) ) {
              $skills_highlight = $skills_highlight ? array( $skills_highlight ) : [];
            }
        ?> 
        <div class="works__item"
          data-url="<?php echo esc_url( get_field('site_url') ); ?>"
          data-sitename="<?php echo esc_attr( get_the_title() ); ?>">
          <div class="works__body">
            <!-- Display categories -->
            <?php
            $categories = get_the_category();
            if ( ! empty( $categories ) && ! is_wp_error( $categories
            ) ) {
              $names = array_map( 'esc_html', wp_list_pluck( $categories, 'name' ) );
              echo '<div class="works__category">' . implode( ', ', $names ) . '</div>';
            }
            ?>
            <h3 class="works__title"><?php the_title(); ?></h3>
            <div class="works__images">
                <?php if ($work_image) : ?>
                  <img src="<?php echo esc_url($work_image['url']); ?>" alt="<?php echo esc_attr($work_image['alt']); ?>" class="works__image">
                <?php endif; ?>
            </div>
          </div>
          <div class="works__text">
            <ul class="works__details">         
              <li class="works__skillsUsed">
                <?php
                $skills_used = get_field('skills_used');
                if ($skills_used && is_array($skills_used)) {
                  echo '<ul class="works__skillsList">';
                  foreach ($skills_used as $skill) {
                    echo '<li class="works__skillItem">' . esc_html(is_array($skill) ? $skill['label'] : $skill) . '</li>';
                  }
                  echo '</ul>';
                }
                ?>
              </li>
              <li class="works__description">
                <?php the_field('works_description'); ?>
              </li>                 
              <li class="works__github">
                <?php if (get_field('github_url')) : ?>
                  <p><a href="<?php the_field('github_url'); ?>" target="_blank" rel="noopener noreferrer" class="js-tooltip-link">GitHubを見る</a></p>
                <?php endif; ?>
              </li>
            </ul>
          </div>
        </div>
        <?php
          endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </div>
    </div>

    <div class="works__section">
      <h3 class="works__sectionTitle">チラシ・印刷物 — Print & Flyers</h3>
      <div class="works__box"> 
        <?php
        $args_all = array(
          'post_type'      => 'post',
          'posts_per_page' => -1,     // 全件取得（必要に応じて数値に変更してください）
          'orderby'        => 'date',
          'order'          => 'DESC',
          'category_name' => 'dtp'
        );
        $works_query_all = new WP_Query($args_all);
        if ( $works_query_all->have_posts() ) :
          while ( $works_query_all->have_posts() ) : $works_query_all->the_post();
            $work_image = get_field('work_image');
            $skills_highlight = get_field('skills_highlight');
            if ( ! is_array( $skills_highlight ) ) {
              $skills_highlight = $skills_highlight ? array( $skills_highlight ) : [];
            }
        ?> 
        <div class="works__item"
          data-url="<?php echo esc_url( get_field('site_url') ); ?>"
          data-sitename="<?php echo esc_attr( get_the_title() ); ?>">
          <div class="works__body">
            <!-- Display categories -->
            <?php
            $categories = get_the_category();
            if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
              $names = array_map( 'esc_html', wp_list_pluck( $categories, 'name' ) );
              echo '<div class="works__category">' . implode( ', ', $names ) . '</div>';
            }
            ?>
            <h3 class="works__title"><?php the_title(); ?></h3>
            <div class="works__images">
                <?php if ($work_image) : ?>
                  <img src="<?php echo esc_url($work_image['url']); ?>" alt="<?php echo esc_attr($work_image['alt']); ?>" class="works__image">
                <?php endif; ?>
            </div>
          </div>
          <div class="works__text">
            <ul class="works__details">
              <li class="works__skillsUsed">
                <?php
                $skills_used = get_field('skills_used');
                if ($skills_used && is_array($skills_used)) {
                  echo '<ul class="works__skillsList">';
                  foreach ($skills_used as $skill) {
                    echo '<li class="works__skillItem">' . esc_html(is_array($skill) ? $skill['label'] : $skill) . '</li>';
                  }
                  echo '</ul>';
                }
                ?>
              </li>
              <li class="works__description">
                <?php the_field('works_description'); ?>
              </li>                  
              <li class="works__github">
                <?php if (get_field('github_url')) : ?>
                  <p><a href="<?php the_field('github_url'); ?>" target="_blank" rel="noopener noreferrer">GitHubを見る</a></p>
                <?php endif; ?>
              </li>
            </ul>
          </div>
        </div>
        <?php
          endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </div>
    </div>



  </div>
</section>