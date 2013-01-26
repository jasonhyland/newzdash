
<?php

include('config.php');


if (DB_TYPE!="mysql")
{
	# send the browser to the configuration page, something is wrong!
	header("Location: configure.php");
}

require_once("lib/dashdata.php");

$dashdata = new DashData;

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
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Dashboard</a> 
					</li>					
				</ul>
			</div>
			<!-- breadcrumbs end -->
			
			<!-- Count Dashboard summaries start -->
			<div class="row-fluid">
				<a data-rel="tooltip" title="Total Releases" class="well span4 top-block" href="#">
				      <?php $dashdata->getReleaseCount(); ?>
				</a>

				<a data-rel="tooltip" title="Active Groups" class="well span4 top-block" href="#">
				      <?php $dashdata->getActiveGroupCount(); ?>
				</a>

				<a data-rel="tooltip" title="Release Pending Post-Processing" class="well span4 top-block" href="#">
				      <?php echo $dashdata->getPendingProcessingCount(); ?>
				</a>

			
			</div>
			<!-- Dashboard summaries end -->
			
			<!-- Date summaries start -->
			<div class="row-fluid">
				
				<a data-rel="tooltip" title="Last Group Update" class="well span4 top-block" href="#">
					<?php $dashdata->getLastGroupUpdate(); ?>
				</a>
				
				<a data-rel="tooltip" title="Last Binary Added" class="well span4 top-block" href="#">
					<?php $dashdata->getLastBinaryAdded(); ?>
				</a>

				<a data-rel="tooltip" title="Last Release Created" class="well span4 top-block" href="#">
					<?php $dashdata->getLastReleaseCreated(); ?>
				</a>
			</div>
			<!-- Date summaries end -->			
			
			<!-- Version summaries start -->
			<div class="row-fluid">
				
				<a data-rel="tooltip" title="Subversion" class="well span4 top-block" href="#">
					<?php $dashdata->getSubversionInfo(); ?>
				</a>
				
				<a data-rel="tooltip" title="Versions" class="well span4 top-block" href="#">
					<?php $dashdata->getDatabaseAndRegexInfo(); ?>
				</a>

				<a data-rel="tooltip" title="NewzDash" class="well span4 top-block" href="#">
					<?php $dashdata->getNewzDashInfo(); ?>
				</a>
			</div>
			<!-- Version summaries end -->
					


		  
       
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		<hr>


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
