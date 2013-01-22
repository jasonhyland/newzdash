<?php
require_once('config.php');
require_once(WWW_DIR."/lib/releases.php");
require_once(WWW_DIR."/lib/groups.php");
require_once(WWW_DIR."/lib/framework/db.php");
require_once(WWW_DIR."/lib/category.php");
require_once(WWW_DIR."/lib/site.php");


class RecentReleases
{

	
        public function buildRecentTable($newznab_cat)
        {
		echo '<table class="table">
							  <thead>
								  <tr>
									  <th>Name</th>
									  <th>Category<th>
									  <th>Date</th>                                
								  </tr>
							  </thead>   
							  <tbody>';
                                                          
							  
		# we are dealing with categories where the parent ID is 'CAT_PARENT_MOVIE'					
		$category=new Category;
		# get all the child categories
		$allcategories=$category->getChildren($newznab_cat);
            
		$db = new DB();
            
		$catarray=Array();
		
		foreach ($allcategories as $cat)
		{
			array_push($catarray, $catstring.($cat['ID']));
		}
		
		$catstring=implode(',', $catarray);		
		
                # $sql = sprintf("SELECT * FROM `releases` where categoryID in (%s) order by updatedate desc limit 0,10", $catstring);
                $sql = sprintf("select r.name as name,r.updatedate as updatedate,c.title as title from releases r inner join category c on c.ID=r.categoryID where r.categoryID in (%s) order by r.updatedate desc limit 0,10", $catstring);
		# print $sql;
		
                $res = $db->query($sql);              
                
                foreach ($res as $row)
                {
                    echo '<tr>';
                    echo '<td>';
                    echo $row['name'];
                    echo '</td>';

		    echo '<td>';
                    echo $row['title'];
                    echo '</td>';
		    
                    echo '<td >';
                    echo $row["updatedate"];
                    echo '</td>';
                    echo '</tr>';
                }
            
            

            echo '</tbody>
						 </table>  ';
        }
        
        public function buildRecentMoviesTable()
        {
		RecentReleases::buildRecentTable(Category::CAT_PARENT_MOVIE);
	}	

	public function buildRecentMusicTable()
        {
		RecentReleases::buildRecentTable(Category::CAT_PARENT_MUSIC);
	}
	
	public function buildRecentGameTable()
        {
		RecentReleases::buildRecentTable(Category::CAT_PARENT_GAME);
	}		
	
	public function buildRecentTVTable()
        {
		RecentReleases::buildRecentTable(Category::CAT_PARENT_TV);
	}
	
	public function buildRecentPCTable()
        {
		RecentReleases::buildRecentTable(Category::CAT_PARENT_PC);
	}		
	
	public function buildRecentOtherTable()
        {
		RecentReleases::buildRecentTable(Category::CAT_PARENT_MISC);
	}
	
	public function buildRecentXXXTable()
        {
		RecentReleases::buildRecentTable(Category::CAT_PARENT_XXX);
	}		
}
        
                        




?>