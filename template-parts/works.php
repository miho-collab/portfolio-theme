<section class="works section">
  <div class="innerWidth">
    <h2 class="section__title">
      <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>">
        WORKS<i class="fa-sharp-duotone fa-solid fa-angles-right works__arrow"></i>
      </a>
    </h2>

    <!-- Web -->
    <div class="works__section">
      <h3 class="works__sectionTitle">Webサイト制作 — Web Design & Coding</h3>
      <div class="works__box">
        <?php
        $args_all = array(
          'post_type'      => 'post',
          'posts_per_page' => -1,
          'orderby'        => 'date',
          'order'          => 'DESC',
          'category_name'  => 'web'
        );
        $works_query_all = new WP_Query($args_all);

        if ( $works_query_all->have_posts() ) :
          while ( $works_query_all->have_posts() ) : $works_query_all->the_post();

            // カスタムフィールドをまとめて取得（この投稿分）
            $works_subTitle    = get_field('works_subtitle');
            $works_title       = get_field('works_title');
            $work_image        = get_field('work_image');
            $works_description = get_field('works_description');
            $works_summary     = get_field('works_summary');
            $skills_used       = get_field('skills_used');
        ?>
          <a href="<?php the_permalink(); ?>" class="works__item">
            <div class="works__body">
              <!-- categories -->
              <?php
              $categories = get_the_category();
              if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
                $names = array_map( 'esc_html', wp_list_pluck( $categories, 'name' ) );
                echo '<div class="works__category">' . implode( ', ', $names ) . '</div>';
              }
              ?>

              <div class="works__title">
                <p class="works__subTitle"><?php echo nl2br( esc_html( $works_subTitle ) ); ?></p>
                <h3 class="works__mainTitle"><?php echo nl2br( esc_html( $works_title ) ); ?></h3>
              </div>

              <div class="works__images">
                <?php if ( $work_image ) : ?>
                  <img
                    src="<?php echo esc_url( $work_image['url'] ); ?>"
                    alt="<?php echo esc_attr( $work_image['alt'] ); ?>"
                    class="works__image"
                  >
                <?php endif; ?>
              </div>
            </div>

            <div class="works__text">
              <ul class="works__details">

                <!-- description (改行 + strong OK) -->
                <li class="works__detailsItem works__description">
                  <?php if ( $works_description ) : ?>
                    <p><?php echo nl2br( wp_kses_post( $works_description ) ); ?></p>
                  <?php endif; ?>
                </li>

                <!-- skills_used (HTMLなし) -->
                <li class="works__detailsItem works__skillsUsed">
                  <?php if ( $skills_used && is_array( $skills_used ) ) : ?>
                    <ul class="works__skillsList">
                      <?php foreach ( $skills_used as $skill ) : ?>
                        <li class="works__skillItem">
                          <?php echo esc_html( is_array( $skill ) ? $skill['label'] : $skill ); ?>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  <?php endif; ?>
                </li>

              </ul>
            </div>
          </a>
        <?php
          endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </div>
    </div>

    <!-- DTP -->
    <div class="works__section works__section--dtp">
      <h3 class="works__sectionTitle">チラシ・印刷物 — Print & Flyers</h3>
      <div class="works__box">
        <?php
        $args_all = array(
          'post_type'      => 'post',
          'posts_per_page' => -1,
          'orderby'        => 'date',
          'order'          => 'DESC',
          'category_name'  => 'dtp'
        );
        $works_query_all = new WP_Query($args_all);

        if ( $works_query_all->have_posts() ) :
          while ( $works_query_all->have_posts() ) : $works_query_all->the_post();

            // カスタムフィールドをまとめて取得（この投稿分）
            $works_subTitle    = get_field('works_subtitle');
            $works_title       = get_field('works_title');
            $work_image        = get_field('work_image');
            $works_description = get_field('works_description');
            $works_summary     = get_field('works_summary');
            $skills_used       = get_field('skills_used');
        ?>
          <a href="<?php the_permalink(); ?>" class="works__item">
            <div class="works__body">
              <!-- categories -->
              <?php
              $categories = get_the_category();
              if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
                $names = array_map( 'esc_html', wp_list_pluck( $categories, 'name' ) );
                echo '<div class="works__category">' . implode( ', ', $names ) . '</div>';
              }
              ?>

              <div class="works__title">
                <p class="works__subTitle"><?php echo nl2br( esc_html( $works_subTitle ) ); ?></p>
                <h3 class="works__mainTitle"><?php echo nl2br( esc_html( $works_title ) ); ?></h3>
              </div>

              <div class="works__images">
                <?php if ( $work_image ) : ?>
                  <img
                    src="<?php echo esc_url( $work_image['url'] ); ?>"
                    alt="<?php echo esc_attr( $work_image['alt'] ); ?>"
                    class="works__image"
                  >
                <?php endif; ?>
              </div>
            </div>

            <div class="works__text">
              <ul class="works__details">

                <!-- description (改行 + strong OK) -->
                <li class="works__detailsItem works__description">
                  <?php if ( $works_description ) : ?>
                    <p><?php echo nl2br( wp_kses_post( $works_description ) ); ?></p>
                  <?php endif; ?>
                </li>

                <!-- skills_used (HTMLなし) -->
                <li class="works__detailsItem works__skillsUsed">
                  <?php if ( $skills_used && is_array( $skills_used ) ) : ?>
                    <ul class="works__skillsList">
                      <?php foreach ( $skills_used as $skill ) : ?>
                        <li class="works__skillItem">
                          <?php echo esc_html( is_array( $skill ) ? $skill['label'] : $skill ); ?>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  <?php endif; ?>
                </li>
              </ul>
            </div>
          </a>
        <?php
          endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </div>
    </div>

  </div>
</section>