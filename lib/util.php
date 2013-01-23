<?php
require_once('config.php');
require_once(WWW_DIR."/lib/releases.php");
require_once(WWW_DIR."/lib/groups.php");
require_once(WWW_DIR."/lib/framework/db.php");
require_once(WWW_DIR."/lib/category.php");
require_once(WWW_DIR."/lib/site.php");


class Util
{
        
        public function getNewznabLink()
        {
            # echo "<a href=http://nzbarchive>"; 
	    echo "<a href=\"".NEWZNAB_URL."\">NewzNab</a>"; 
        }
}
        
                        




?>