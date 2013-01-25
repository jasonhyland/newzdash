<!DOCTYPE html>
<html lang="en">
<head>
	<!--
		NewzDash v1.0.0

		Copyright 2013 Eric Young
		Licensed under the Apache License v2.0
		http://www.apache.org/licenses/LICENSE-2.0

		http://aceshome.com
	
		Based off original work titled 'Charisma' by Muhammad Usman
		   original license in doc/charisma-license.txt
	-->
	<meta charset="utf-8">
	<title>NewzNab Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Newznab, a usenet indexing web application with community features.">
	<meta name="author" content="Eric Young">

	<!-- The styles -->
	<link id="bs-css" href="css/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/charisma-app.css" rel="stylesheet">
	<link href="css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='css/fullcalendar.css' rel='stylesheet'>
	<link href='css/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='css/chosen.css' rel='stylesheet'>
	<link href='css/uniform.default.css' rel='stylesheet'>
	<link href='css/colorbox.css' rel='stylesheet'>
	<link href='css/jquery.cleditor.css' rel='stylesheet'>
	<link href='css/jquery.noty.css' rel='stylesheet'>
	<link href='css/noty_theme_default.css' rel='stylesheet'>
	<link href='css/elfinder.min.css' rel='stylesheet'>
	<link href='css/elfinder.theme.css' rel='stylesheet'>
	<link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='css/opa-icons.css' rel='stylesheet'>
	<link href='css/uploadify.css' rel='stylesheet'>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="img/favicon.ico">
		
		
	
</head>

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
			

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="/">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Configure</a>
					</li>
				</ul>
			</div>
			

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> Configuration</h2>

					</div>
					<div class="box-content">
						<form class="form-horizontal" method="POST" name="config" id="config" action="" >
							<fieldset>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">NewzNab Directory</label>
								<div class="controls">
								  <input class="input-xlarge" name="newznab_directory" id="newznab_directory" type="text" value="edit NEWZNAB_HOME in config.php">
								</div>
								
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">NewzNab URL</label>
								<div class="controls">
								  <input class="input-xlarge" name="newznab_url" id="newznab_url" type="text" value="edit NEWZNAB_URL in config.php">
								</div>
							  </div>
							  

							 <div class="control-group">
								<label class="control-label" for="optionsShowLatest">Show Recent...</label>
								<div class="controls">
								  <label class="checkbox">
									<input type="checkbox" name="show_movies" id="optionsShowLatest" value="true" >
									Movies
								  </label>								  
								  <label class="checkbox">
									<input type="checkbox" name="show_tv" id="optionsShowLatest" value="true" >
									Television
								  </label>
								  <label class="checkbox">
									<input type="checkbox" name="show_music" id="optionsShowLatest" value="true" >
									Music
								  </label>
								  <label class="checkbox">
									<input type="checkbox" name="show_games" id="optionsShowLatest" value="true" >
									Games
								  </label>
								  <label class="checkbox">
									<input type="checkbox" name="show_pc" id="optionsShowLatest" value="true" >
									PC
								  </label>								  
								  <label class="checkbox">
									<input type="checkbox" name="show_other" id="optionsShowLatest" value="true" >
									Other
								  </label>
								  <label class="checkbox">
									<input type="checkbox" name="show_xxx" id="optionsShowLatest" value="true" >
									XXX
								  </label>								  
								</div>
							  </div>
							 
							 <div class="control-group">
								<label class="control-label" for="optionsShowLatest">Show Statistics...</label>
								<div class="controls">
								  <label class="checkbox">
									<input type="checkbox" name="show_processing" id="optionsShowLatest" value="true" >
									To Be Processed
								  </label>								  
								  <label class="checkbox">
									<input type="checkbox" name="show_rpc" id="optionsShowLatest" value="true" >
									Releases per Category
								  </label>
								  <label class="checkbox">
									<input type="checkbox" name="show_rpg" id="optionsShowLatest" value="true" >
									Releases per Group
								  </label>
								  
								</div>
							  </div>							 

							 
							  <div class="form-actions">
								<button type="submit" class="btn btn-primary">Save changes</button>
								<button class="btn">Cancel</button>
							  </div>
							</fieldset>
						  </form>
					      <div id="results"></div>
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			
    
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		<hr>

		<div id="results"><div>
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
	
	<script src="js/jquery.validate.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$("#config").validate({
			debug: true,
			rules: {
				newznab_url: "required",
				newznab_directory: "required"
			},
			messages: {
				newznab_url: "Please supply the url for newznab.",
				newznab_directory: "Where is newznab installed?",
			},
			submitHandler: function(form) {
				// do other stuff for a valid form
				$.post('saveconfiguration.php', $("#config").serialize(), function(data) {
					$('#results').html(data);
				});
			}
		});
	});
	</script>		
		
</body>
</html>
