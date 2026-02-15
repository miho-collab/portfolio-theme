  <div class="about__skills innerWidth">
    <h3 class="about__subTitle">
        SKILLS
    </h3>

    <div class="about__skillContent">
      <div class="skills__box"> 
        <?php
          $args_all = array(
            'post_type'      => 'skill_level',
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'DESC',
            'post_status'    => 'publish',
            // 'category_name'  => 'skills', // ← いったんコメントアウト
          );
        $skills_query_all = new WP_Query($args_all);
        if ( $skills_query_all->have_posts() ) :
          while ( $skills_query_all->have_posts() ) : $skills_query_all->the_post();
            $skill_image = get_field('skill_image');
            $level       = get_field('skill_level_value');   // ★ 5段階の値
        ?> 

          <div class="skills__item">
            <div class="skills__image">
              <?php if ($skill_image) : ?>
                <img src="<?php echo esc_url($skill_image['url']); ?>" alt="<?php echo esc_attr($skill_image['alt']); ?>">
              <?php endif; ?>
            </div>

            <!-- スキルレベル（5段階） -->
            <?php
            // ★ ACFからレベル値を取得（1〜5 を想定）
            $level = (int) get_field('skill_level_value');

            // ★ 万一 1〜5 以外の値だった場合の保険
            $desc = isset($descriptions[$level]) ? $descriptions[$level] : 'スキルレベル未設定';
            ?>

            <div class="skills__value" data-desc="<?php echo esc_attr($desc); ?>">
              <?php
                for ($i = 1; $i <= 5; $i++) {
                  echo $i <= $level ? '★' : '☆';
                }
              ?>
            </div>
          </div><!-- /.skills__item -->

        <?php
          endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </div>
    </div>
  </div>