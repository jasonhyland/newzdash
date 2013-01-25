<?php
/*
	print "Form submitted successfully: <br>Movies set to <b>".$_POST['show_movies']."</b>
						TV set to <b>".$_POST['show_tv']."</b>
						Music set to <b>".$_POST['show_music']."</b>
						Games set to <b>".$_POST['show_games']."</b>
						PC set to <b>".$_POST['show_pc']."</b>
						Other set to <b>".$_POST['show_other']."</b>
						XXX set to <b>".$_POST['show_xxx']."</b>
						<br>Pre-Processing set to <b>".$_POST['show_processing']."</b>
						RPC set to <b>".$_POST['show_rpc']."</b>
						RPG set to <b>".$_POST['show_rpg']."</b>
	                                        <br>Newznab URL set to: <b>".$_POST['newznab_url']."</b>
						Directory set to: <b>".$_POST['newznab_directory']."</b><br>";
*/

	
	print '<div class="alert alert-info" id="savemessage"><strong>Success!</strong> The setttings have been saved.</div>';
	
	print '<script type="text/javascript">
			window.setTimeout(function() {
				$("#savemessage").fadeTo(500, 0).slideUp(500, function(){
				$(this).remove(); 
				});
			}, 5000);
			</script>';
?>

