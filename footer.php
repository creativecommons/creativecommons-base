<?php do_action( 'cc_theme_before_footer' ); ?>
<footer class="main-footer">
  <?php do_action( 'cc_theme_before_footer_content' ); ?>
  <div class="container">
    <div class="columns">
      <div class="column">
        <a href="https://creativecommons.org" class="main-logo margin-bottom-bigger">
          <span class="has-text-white">
            <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidyMid meet" viewBox="0 0 304 73">
              <use  xlink:href="<?php echo get_bloginfo('template_directory').'/assets/img/logos/cc/logomark.svg#creativecommons'?>"></use>
            </svg>
          </span>
        </a>
        <p>
          <address class="margin-bottom-normal"> Creative Commons <br> PO Box 1866, Mountain View CA 94042</address>
          <a href="mailto:info@creativecommons.org" class="mail">info@creativecommons.org</a>
          <a href="tel://+1-415-429-6753" class="phone">+1-415-429-6753</a>
        </p>
      </div>
      <div class="column is-half">
        <nav class="footer-navigation">
        <?php 
          $args = array(
            'theme_location' => 'footer-navigation',
            'container' => '',
            'fallback_cb' => false,
            );
          wp_nav_menu( $args );
        ?>
        </nav>
        <div class="subscription">
          <h5 class="b-header">Subscribe to our newsletter</h5>
          <form class="newsletter">
            <input type="text" class="input" placeholder="Your email">
            <input type="submit" value="subscribe" class="button small">
          </form>
        </div>
        <div class="attribution margin-top-bigger">
          <p class="caption">Except where otherwise <a href="https://creativecommons.org/policies#license" target="_blank">noted</a>, content on this site is licensed under a <a href="https://creativecommons.org/licenses/by/4.0/" target="_blank">Creative Commons Attribution 4.0 International license</a>. <a href="https://creativecommons.org/website-icons" target="_blank">Icons</a> by Noun Project.</p>
        </div>
      </div>
      <div class="column">
        <aside class="donate-section">
          <h5>Our work relies on you!</h5>
          <p>Help us keep the internet free and open.</p>
          <a class="button small donate">
             <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidyMid meet" viewBox="0 0 100 75">
              <use  xlink:href="<?php echo get_bloginfo('template_directory').'/assets/img/logos/cc/letterheart.svg#creativecommons'?>"></use>
            </svg>
             Donate now
          </a>
        </aside>
      </div>
    </div>
  </div>
  <?php do_action( 'cc_theme_after_footer_content' ); ?>
</footer>
<?php do_action( 'cc_theme_after_footer' ); ?>
<?php wp_footer(); ?>
</body>
</html>