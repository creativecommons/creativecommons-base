<?php do_action( 'cc_theme_before_footer' ); ?>
<!--BEGIN FOOTER-->
<footer class="main-footer">
	<?php do_action( 'cc_theme_before_footer_content' ); ?>
	<div id="footer-cc">
      <cc-global-footer
        donation-url="https://www.classy.org/give/313412/#!/donation/checkout?c_src=website&c_src2=footer"
      />
    </div>
	<?php do_action( 'cc_theme_after_footer_content' ); ?>
	<!-- Script to initialize CC Global Components -->
	<script>
		/* Import and use the CC Explore component */
		const cc_explore = Vue.createApp({});
		cc_explore.use(CcGlobals);
		cc_explore.mount("#explore-cc");

		/* Import and use the CC Global Footer component */
		const cc_footer = Vue.createApp({});
		cc_footer.use(CcGlobals);
		cc_footer.mount("#footer-cc");
	</script>
</footer>
<!--END FOOTER-->
<?php do_action( 'cc_theme_after_footer' ); ?>
<?php wp_footer(); ?>
</body>
</html>
