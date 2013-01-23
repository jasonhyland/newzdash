<?php
require_once('config.php');
require_once(WWW_DIR."/lib/releases.php");
require_once(WWW_DIR."/lib/groups.php");
require_once(WWW_DIR."/lib/framework/db.php");
require_once(WWW_DIR."/lib/category.php");
require_once(WWW_DIR."/lib/site.php");


class DashData
{
    
	/**
	 * getLastGroupUpdate
	 */
	public function getLastGroupUpdate()
	{
	    $sql=sprintf("select name,last_updated from groups order by last_updated desc limit 0,5");
	    $db = new DB;
	    $data = $db->queryOneRow($sql);
	
	    $last = "unknown";
	    
	    printf('<span class="icon32 icon-blue icon-clock"></span>
			<div>Last Group Update</div>
			<div>%s</div>', $data['last_updated']);
	}
    
	/**
	 * getLastBinaryAdded
	 */
	public function getLastBinaryAdded()
	{
	    $sql=sprintf("select relname,dateadded from binaries order by dateadded desc limit 0,5");
	    $db = new DB;
	    $data = $db->queryOneRow($sql);
	
	    
	    printf('<span class="icon32 icon-blue icon-clock"></span>
			<div>Last Binary Added</div>
			<div>%s</div>', $data['dateadded']);
	}	
    
	/**
	 * getLastReleaseCreated
	 */
	public function getLastReleaseCreated()
	{
	    $sql=sprintf("select name,adddate from releases order by adddate desc limit 0,5");
	    $db = new DB;
	    $data = $db->queryOneRow($sql);
	  
	    printf('<span class="icon32 icon-blue icon-clock"></span>
			<div>Last Release Created</div>
			<div>%s</div>', $data['adddate']);
	}    
    				
   
    
	/**
	 * getRegexInfo
	 */
	public function getRegexInfo()
	{
	    $sql=sprintf("select * from site where `setting`='latestregexrevision'");
	    $db = new DB;
	    $data = $db->queryOneRow($sql);
	
	    printf('<span class="icon32 icon-blue icon-gear"></span>
			<div>Regex Version</div>
			<div>%s</div>', $data['value']);
	}
	
    	/**
	 * getDatabaseInfo
	 */
	public function getDatabaseInfo()
	{
	    $sql=sprintf("select * from site where `setting`='dbversion'");
	    $db = new DB;
	    $data = $db->queryOneRow($sql);
	    # $version = $data['value'];
	    # now, we want just the numbers as the version is stored as '#Rev: number $'
	    preg_match('/[0-9]+/', $data['value'], $version);

	    printf('<span class="icon32 icon-blue icon-gear"></span>
			<div>Database Version</div>
			<div>%s</div>', $version[0]);
	}
    
	/**
	 * getSubversionInfo
	 */
	public function getSubversionLatestFromRss()
	{

	    # cache the rss feed so we don't hammer the server
	    # and a slight delay in knowing a new release is available is not that bad
	    if (xcache_isset("newznabrss"))
	    {
		$xml_source = xcache_get("newznabrss");
	    }
	    else
	    {
		$xml_source = file_get_contents('http://newznab.com/plussvnrss.xml');
		# store it for 15 minutes
		xcache_set("newznabrss", $xml_source, 60*15);
	    }
	    
	    $x = simplexml_load_string($xml_source);
	    
	    if(count($x) == 0)
		return "";

	    $rev=$x->channel->item[0]->title;
	    preg_match('/[0-9]+/', $rev, $latest);

	    return $latest[0];

	}
	
	/**
	 * getSubversionInfo
	 */
	public function getSubversionInfo()
	{

	    #svn_auth_set_parameter( SVN_AUTH_PARAM_DEFAULT_USERNAME, SVN_USERNAME );
	    #svn_auth_set_parameter( SVN_AUTH_PARAM_DEFAULT_PASSWORD, SVN_PASSWORD );
	    $svn_stat=svn_status(realpath(NEWZNAB_HOME), SVN_NON_RECURSIVE|SVN_ALL);
	    $current_version=sprintf("%s", $svn_stat[0]["revision"]);
	    
    
	    #$svn_info=svn_info(realpath(NEWZNAB_HOME), SVN_SHOW_UPDATES);
	    #$latest_version=sprintf("%s", $svn_info[0]["last_changed_rev"]);
	    $latest_version=DashData::getSubversionLatestFromRss();

	      	
	    if ($current_version === $latest_version)
	    {
		$version_string=sprintf("Running latest version (%s)", $current_version);
		$notification_string="";
	    }
	    else
	    {
		$version_string=sprintf("Running %s, Latest available is %s", $current_version, $latest_version);
		$updates_available=intval($latest_version)-intval($current_version);
		$notification_string=sprintf('<span class="notification red">%d</span>', $updates_available);
	    }
	    
	    printf('<span class="icon32 icon-blue icon-gear"></span>
			<div>SVN Revision</div>
			<div>%s</div>
			%s', $version_string, $notification_string);
				
	}
	

        /**
         * count of releases
         */
        public function getReleaseCount()
        {                       
            $r=new Releases;
            $total_releases = $r->getCount();
	
	    printf('<span class="icon32 icon-blue icon-star-on"></span>
			<div>Total Releases</div>
			<div>%s</div>', $total_releases);    
        }
        
        public function getActiveGroupCount()
        {
            $g = new Groups;
            $active_groups = $g->getCount("", true);
 				
	    printf('<span class="icon32 icon-blue icon-comment"></span>
			<div>Active Groups</div>
			<div>%s</div>', $active_groups);   					
        }
        
        public function getPendingProcessingCount()
        {
            $db=new DB;
            
            # $sql_query=sprintf("select COUNT(*) AS ToDo from releases r left join category c on c.ID = r.categoryID where (r.passwordstatus between -6 and -1) or (r.haspreview = -1 and c.disablepreview = 0)");

             /////////////amount of books left to do//////
            $sql_query = "select count(*) as ToDo from releases use index (ix_releases_categoryID) where (bookinfoID IS NULL and categoryID = 7020) or ";
            /////////////amount of games left to do//////
            $sql_query= $sql_query . " (consoleinfoID IS NULL and categoryID in ( select ID from category where parentID = 1000 )) or ";
            /////////////amount of movies left to do//////
            $sql_query = $sql_query . "(imdbID IS NULL and categoryID in ( select ID from category where parentID = 2000 )) or ";
            /////////////amount of music left to do//////
            $sql_query = $sql_query . "(musicinfoID IS NULL and categoryID in ( select ID from category where parentID = 3000 )) or ";
            /////////////amount of tv left to do/////////
            $sql_query = $sql_query . "(rageID = -1 and categoryID in ( select ID from category where parentID = 5000 ));";

            
            $data = $db->query($sql_query);
	    $total = $data[0]['ToDo'];

	    printf('<span class="icon32 icon-blue icon-star-off"></span>
			<div>Pending Processing</div>
			<div>%s</div>', $total);   	
    
    
        }
        

}
        
                        




?>