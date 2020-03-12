  <footer class="site-footer container">
    <div class="footer-content">
      <!-- Display Footer -->
      <?php
        $args = [
          'theme_location' => 'main-menu',
          'container' => 'nav',
          'container_class' => 'footer-menu',
        ];
        wp_nav_menu($args);
      ?>

      <!-- Legal -->
      <p class="copyright">
        All Rights Reserved.
        <?php echo get_bloginfo('name') . " &ndash; " . date('Y'); ?>
      </p>
    </div>
  </footer>

  <?php wp_footer(); ?>
  </body>

  </html>