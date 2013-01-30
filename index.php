
<?php

include('config.php');


if (!file_exists(NEWZNAB_HOME."/www/config.php"))
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


	
		
</body>
</html>
