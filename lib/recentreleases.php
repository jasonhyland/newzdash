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
		echo '<table class="table table-striped table-bordered bootstrap-datatable datatable">
							  <thead>
								  <tr>
									  <th>Name</th>
									  <th>Category</th>
									  <th>Date (GMT)</th>                                
								  </tr>
							  </thead>   
							  <tbody>';
                                                          
							  
				
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
		
		$sql = sprintf("select r.name as name,r.adddate as date,r.guid as guid,c.title as title from releases r inner join category c on c.ID=r.categoryID where r.categoryID in (%s) order by r.adddate desc limit 0,50", $catstring);
		# print $sql;
		
                $res = $db->query($sql);              
                
                foreach ($res as $row)
                {
		    $name=$row["name"];
		    if (strlen($name)>50)
		    {
			$name=substr($row["name"],0,45);
			$name=$name."...";
		    }
                    echo '<tr>';
                    echo '<td>';
		    echo '<a href="'.NEWZNAB_URL.'/details/'.$row["guid"].'" class="btn btn-mini" target="_blank"><i class="icon-globe"></i></a> '.$name;
                    #echo '<a href="'.NEWZNAB_URL.'/details/'.$row["guid"].'">'.$row['name'].'</a>';
                    echo '</td>';

		    echo '<td>';
                    echo $row['title'];
                    echo '</td>';
		    
                    echo '<td>';
                    echo $row["date"];
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