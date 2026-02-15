    <?php get_header(); ?>

    <!-- START Main Area -->
    <main class="main contentWidth">
      <!-- START INTRODUCTION ----------------------------------------------------------------------------------->
      <section class="introduction">
        <p class="introduction__lead js-split-text" id="lead">誰かの一歩を後押しする、やさしいWeb制作を。</p>
        <div class="introduction__disc" id="disc">
          <p class="introduction__disc1 introduction__discLow">ホームページは、思いを届ける大切な窓口。</p>
          <p class="introduction__disc2 introduction__discLow">見てくれる人にとっても、依頼してくださる方にとっても、<br>わかりやすく、やさしい場所でありたいと思っています。</p>
          <p class="introduction__disc3 introduction__discLow">双方の気持ちを大切に、<br>丁寧にWebサイトをつくっていきます。</p>
        </div>
      </section>
      <!-- START ABOUT ----------------------------------------------------------------------------------->
      <div id="mainContents" class="mainContents">
      <section id="about" class="about section">
        <div class="innerWidth">
          <h2 class="about__title section__title">ABOUT ME</h2>
          <div class="about__content">
            <div class="about__portrait">
              <img class="about__portraitImg" src="<?php echo get_template_directory_uri(); ?>/img/miho_portrait.png" alt="山本美穂のポートレート写真">
            </div>
              <p class="about__name">山本&nbsp;美穂</p>
              <p class="about__bio">1973年生まれ。長野県浅間山の麓在住</p>
              <p class="about__bio">フリーランスのWeb制作者として活動中。</p>
              <p class="about__bio">趣味：山歩き、読書、パイプオルガン</p>
              <button class="about__readmore" id="aboutReadMore" type="button">Read More</button>
              <div class="about__description-wrapper" id="aboutDescriptionWrapper">
                <p class="about__description" id="aboutDescription" tabindex="-1" aria-hidden="true">
                  大学卒業後、自然の中での暮らしや旅を大切にしながら、さまざまな仕事を経験してきました。<br>
                  夫の会社の立ち上げを手伝う中で、IllustratorやPhotoshopなどのデザインツールに触れたことが、ものづくりの楽しさに気づくきっかけになりました。<br>
                  二人の子育ても一段落した頃、Web制作に興味を持ち、独学とスクールでコーディングを学んだ後、地元の広告代理店にパート勤務。約1年3ヶ月の間、DTP業務を中心に、InDesignを使った紙面づくりや、WordPressサイトの更新・リニューアルにも携わりました。<br>
                  現在は、シンプルで伝わりやすいWebサイトを目指して、小さな案件を一つひとつ丁寧に手がけています。<br>
                </p>
              </div> 
          </div>
        </div>   
      <!-- START SKILLS ----------------------------------------------------------------------------------->
        <?php get_template_part('template-parts/skills'); ?>      
      <!-- START TOOL ----------------------------------------------------------------------------------->
      <div class="about__tool innerWidth">
        <h3 class="about__subTitle">TOOL</h3>
        <div class="about__toolContent">
          <p class="about__toolText">使用ツール：Visual Studio Code、GitHub、Chrome DevTools、Photoshop、Illustrator、InDesign、Adobe XD、Figma、など</p>
        </div>
      </div>
      </section>
      <!-- START WORKS ----------------------------------------------------------------------------------->
        <?php get_template_part('template-parts/works'); ?>      
      <!-- START CONTACT ----------------------------------------------------------------------------------->
      <section id="contact" class="contact section">
        <div class="innerWidth">
          <h2 class="contact__title section__title">CONTACT</h2>
          <?php echo do_shortcode('[contact-form-7 id="04cb788" title="コンタクトフォーム 1"]'); ?>
        </div>
      </section>    
      </div>    
    </main>
    <!-- END Main Area -->

    <?php get_footer(); ?>