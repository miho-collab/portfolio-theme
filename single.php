<?php get_header(); ?>

    <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
        
        // カスタムフィールドをまとめて取得
        $site_url = get_field('site_url');
        $skills_highlight = get_field('skills_highlight');
        $work_image = get_field('work_image');
        $works_description = get_field('works_description');
        $works_request = get_field('works_request');
        $works_target = get_field('works_target');
        $works_summary = get_field('works_summary');
        $works_period = get_field('works_period');
        $skills_used = get_field('skills_used');
        $github_url = get_field('github_url');
        $work_pc_image = get_field('work_pc_image');
        $work_sp_image = get_field('work_sp_image');
        ?>
        
        <section class="post section main">
          <div class="innerWidth">
            <div class="post__section">
              <div class="post__box">
                <div class="post__item">
                  <div class="post__body">
                    <!-- カテゴリー表示 -->
                    <div class="post__header">
                      <?php
                      $categories = get_the_category();
                      if (!empty($categories) && !is_wp_error($categories)) {
                        $names = array_map('esc_html', wp_list_pluck($categories, 'name'));
                        echo '<div class="works__category">' . implode(', ', $names) . '</div>';
                      }
                      ?>                
                      <a href="<?php echo esc_url($site_url); ?>"
                        target="_blank"
                        rel="noopener noreferrer">
                        <h3 class="post__title"><?php the_title(); ?></h3>
                        <p class="works__siteUrl">
                          <?php echo nl2br( wp_kses_post($site_url)); ?>
                        </p>
                      </a>
                    </div>

                    <div class="post__images">
                      <?php
                      // 画像を配列にまとめる
                      $images = [];
                      $image_fields = ['work_image', 'work_image_2', 'work_image_3', 'work_image_4'];
                      foreach ($image_fields as $field) {
                        $img = get_field($field);
                        if (!empty($img)) {
                          $images[] = $img;
                        }
                      }
                      ?>
                      <div class="works__images">
                        <?php if (!empty($images)) : ?>

                          <?php if (count($images) === 1) : ?>
                            <!-- 画像1枚の場合：従来の大きい画像 -->
                            <img src="<?php echo esc_url($images[0]['url']); ?>"
                                alt="<?php echo esc_attr($images[0]['alt']); ?>"
                                class="works__image">
                          
                          <?php else : ?>
                            <!-- 画像2〜4枚の場合：横並び（2列まで）-->
                            <div class="works__imagesGroup">
                              <?php foreach ($images as $img) : ?>
                                <div class="works__imageWrap">
                                  <img src="<?php echo esc_url($img['url']); ?>"
                                      alt="<?php echo esc_attr($img['alt']); ?>"
                                      class="works__imageSub">
                                </div>
                              <?php endforeach; ?>
                            </div>
                          <?php endif; ?>

                        <?php endif; ?>

                      </div>
                    </div>
                  </div>
                  
                  <div class="post__text">
                    <ul class="post__details">
                      
                      <li class="post__description post__detailsItem">
                        <?php if ($works_description) : ?>
                          <p><?php echo nl2br( wp_kses_post($works_description)); ?></p><!-- nl2brとwp_kses_postで改行とHTMLタグを許可 --> 
                        <?php endif; ?>
                      </li>

                      <li class="post__request post__detailsItem">
                        <?php if ($works_request) : ?>
                          <dl>
                            <dt><strong>依頼内容</strong></dt>
                            <dd><?php echo nl2br( wp_kses_post($works_request)); ?></dd>
                          </dl>
                        <?php endif; ?>
                      </li>

                      <li class="post__target post__detailsItem">
                        <?php if ($works_target) : ?>
                          <dl>
                            <dt><strong>ターゲット</strong></dt>
                            <dd><?php echo nl2br( wp_kses_post($works_target)); ?></dd>
                          </dl>
                        <?php endif; ?>
                      </li>

                      <li class="post__summary post__detailsItem">
                        <dl>
                        <?php if ($works_summary) : ?>
                          <dt><strong>概要</strong></dt>
                          <dd><?php echo nl2br( wp_kses_post($works_summary)); ?></dd>
                        <?php endif; ?>
                      </li>

                      <li class="post__period post__detailsItem">
                        <?php if ($works_period) : ?>
                          <dl>
                            <dt><strong>制作期間</strong></dt>
                            <dd><?php echo nl2br( wp_kses_post($works_period)); ?></dd>
                          </dl>
                        <?php endif; ?>
                      </li> 

                      <li class="works__skillsUsed post__detailsItem">
                        <?php if ($skills_used && is_array($skills_used)) : ?>
                          <dl>
                            <dt><strong>使用技術</strong></dt>
                            <dd>
                              <ul class="works__skillsList">
                                <?php foreach ($skills_used as $skill) : ?>
                                  <li class="works__skillItem">
                                    <?php echo esc_html(is_array($skill) ? $skill['label'] : $skill); ?>
                                  </li>
                                <?php endforeach; ?>
                              </ul>
                            </dd> 
                        <?php endif; ?>
                      </li>
                                        
                      <li class="post__github post__detailsItem">
                        <?php if ($github_url) : ?>
                          <dl>
                            <dt><strong>GitHub</strong></dt>
                            <dd><a href="<?php echo esc_url($github_url); ?>" 
                              target="_blank" 
                              rel="noopener noreferrer">ポートフォリオテーマのソースコード
                            </a></dd>
                          </dl>
                        <?php endif; ?>
                      </li>
                      
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        
        <?php
      endwhile;
    endif;
    ?>
  </main>
<?php get_footer(); ?>