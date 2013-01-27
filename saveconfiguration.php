<?php

    # We should make sure that that the NEWZNAB_HOME value provided is valid
    # That is, there should be a config.php in the NEWZNAB_HOME/www directory
    if (file_exists($_POST['newznab_home']."/www/config.php"))
    {
        $newconfig .= "<?php\n";
        
        $newconfig .= "define('NEWZNAB_URL','".$_POST['newznab_url']."');\n";
        $newconfig .= "define('NEWZNAB_HOME','".$_POST['newznab_home']."');\n";
        
        $newconfig .= "define('SHOW_MOVIES','".$_POST['show_movies']."');\n";include(NEWZNAB_HOME.'/www/config.php');
        
        $newconfig .= "define('SHOW_TV','".$_POST['show_tv']."');\n";
        $newconfig .= "define('SHOW_MUSIC','".$_POST['show_music']."');\n";
        $newconfig .= "define('SHOW_GAMES','".$_POST['show_games']."');\n";
        $newconfig .= "define('SHOW_PC','".$_POST['show_pc']."');\n";
        $newconfig .= "define('SHOW_OTHER','".$_POST['show_other']."');\n";
        $newconfig .= "define('SHOW_XXX','".$_POST['show_xxx']."');\n";
        
        $newconfig .= "define('SHOW_PROCESSING','".$_POST['show_processing']."');\n";
        $newconfig .= "define('SHOW_RPC','".$_POST['show_rpc']."');\n";
        $newconfig .= "define('SHOW_RPG','".$_POST['show_rpg']."');\n";
        
        $newconfig .= "include(NEWZNAB_HOME.'/www/config.php');\n";
        
        $newconfig .= "?>\n";
        
        $newconfigfile=__DIR__ . "/config.php";
        file_put_contents($newconfigfile, $newconfig);
        
        
        print '<div class="alert alert-info" id="savemessage"><strong>Success!</strong> The setttings have been saved!</div>';
                
        print '<script type="text/javascript">
            window.setTimeout(function() {
            $("#savemessage").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
            });
            }, 5000);
            </script>';    
    }
    else
    {
        print '<div class="alert alert-error" id="savemessage"><strong>Error!</strong> The value for the NewzNab Directory does not appear to be valid.</div>';
                
        print '<script type="text/javascript">
            window.setTimeout(function() {
            $("#savemessage").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
            });
            }, 5000);
            </script>';  
    }
    
    
?>

