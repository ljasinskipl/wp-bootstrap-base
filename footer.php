				</div> <!-- .row -->
			</div> <!-- .container -->
			<footer id='main-footer'>
				<div class='container'>
					<div class="row">
						<div class="span4">
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("footer1") ) : ?><?php endif;?>
						</div>
						<div class="span4">
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("footer2") ) : ?><?php endif;?>
						</div>
						<div class="span4">
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("footer3") ) : ?><?php endif;?>
						</div>
					</div>
					<div class="row">
						<div class="span12" id="copyright-info">
							<p>Copyright &copy; <?php echo date("Y");?> <a href=""><?php bloginfo( 'name' ); ?></a>.</p>
							<p>Powered by <a href="http://wordrpress.org" title="WordPress">WordPress</a> and <a href="http://www.ljasinski.pl">Studio Multimedialne ljasinski.pl</a>.</p>
						</div>				
					</div>
				</div>
			</footer>
		<script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
		<?php wp_footer();?>
	</body>
</html>
