<!DOCTYPE html>
<?php
require_once('config.php');
if (DB_TYPE!="mysql")
{
	# send the browser to the configuration page, something is wrong!
	header("Location: configure.php");
}
require_once("lib/recentreleases.php");

$rr = new RecentReleases;

?>

<html lang="en">
<?php include 'includes/header.php'; ?>

<body>

	
<?php include 'includes/topbar.php'; ?>

		<div class="container-fluid">
		<div class="row-fluid">
				
<?php include('includes/leftmenu.php'); ?>
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
			<!-- content starts -->
			
			<!-- breadcrumbs start -->
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="/">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Recent</a> 
					</li>					
				</ul>
			</div>
			<!-- breadcrumbs end -->
			
		
					
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-film"></i> Movies</h2>
						<div class="box-icon">

							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						  <!--						
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						-->
						</div>
					</div>
					<div class="box-content">
					  <?php $rr->buildRecentMoviesTable(); ?> 
					</div>
				</div>
						
			</div><!--/row-->

			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-headphones"></i> Music</h2>
						<div class="box-icon">

							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						  <!--						
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						-->
						</div>
					</div>
					<div class="box-content">
					  <?php $rr->buildRecentMusicTable(); ?> 
					</div>
				</div>
						
			</div><!--/row-->

			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-picture"></i> TV</h2>
						<div class="box-icon">

							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						  <!--						
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						-->
						</div>
					</div>
					<div class="box-content">
					  <?php $rr->buildRecentTVTable(); ?> 
					</div>
				</div>
			</div><!--/row-->

			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-flag"></i> Game</h2>
						<div class="box-icon">

							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						  <!--						
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						-->
						</div>
					</div>
					<div class="box-content">
					  <?php $rr->buildRecentGameTable(); ?> 
					</div>
				</div>
			</div><!--/row-->
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-briefcase"></i> PC</h2>
						<div class="box-icon">

							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						  <!--						
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						-->
						</div>
					</div>
					<div class="box-content">
					  <?php $rr->buildRecentPCTable(); ?> 
					</div>
				</div>
			</div><!--/row-->
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-bookmark"></i> Other</h2>
						<div class="box-icon">

							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						  <!--						
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						-->
						</div>
					</div>
					<div class="box-content">
					  <?php $rr->buildRecentOtherTable(); ?> 
					</div>
				</div>
			</div><!--/row-->			

			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-fire"></i> XXX</h2>
						<div class="box-icon">

							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						  <!--						
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						-->
						</div>
					</div>
					<div class="box-content">
					  <?php $rr->buildRecentXXXTable(); ?> 
					</div>
				</div>
			</div><!--/row-->
			
			
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		<hr>

		<!--
		<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here settings can be configured...</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a href="#" class="btn btn-primary">Save changes</a>
			</div>
		</div>
		-->

	  <?php include 'includes/bottombar.php'; ?>
		
	</div><!--/.fluid-container-->
	

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- jQuery -->
	<script src="js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
	<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
	<script src="js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="js/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="js/bootstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="js/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="js/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="js/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src='js/fullcalendar.min.js'></script>
	<!-- data table plugin -->
	<script src='js/jquery.dataTables.min.js'></script>

	<!-- chart libraries start -->
	<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.min.js"></script>
	<script src="js/jquery.flot.pie.min.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="js/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
	<script src="js/charisma.js"></script>
	


</body>
</html>
