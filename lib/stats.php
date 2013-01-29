<?php


require_once(WWW_DIR."/lib/releases.php");
require_once(WWW_DIR."/lib/groups.php");
require_once(WWW_DIR."/lib/framework/db.php");
require_once(WWW_DIR."/lib/category.php");
require_once(WWW_DIR."/lib/site.php");


class Stats
{
        
        public function buildReleaseTable()
        {
	    if (SHOW_RPC!='checked')
	    {
		return;
	    }
	    
	    print('<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-th"></i> Releases per Category</h2>
						<div class="box-icon">

							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
													</div>
					</div>
					<div class="box-content">');
	    
            echo '<table class="table table-striped table-bordered bootstrap-datatable datatable">
							  <thead>
								  <tr>
									  <th>Category</th>
									  <th>Releases</th>                                
								  </tr>
							  </thead>   
							  <tbody>';
                                                          
            $category=new Category;
            # get all the active categories
            $allcategories=$category->get(true);
            
            $db = new DB();
            
            foreach ($allcategories as $cat)
            {
                $sql = sprintf("select count(ID) as num from releases where categoryID = %s", $cat['ID']);
                $res = $db->queryOneRow($sql);              
                
                if ($res["num"] > 0)
                {
                    echo '<tr>';
                    echo '<td>';
                    echo $cat['title'];
                    echo '</td>';

                    echo '<td class="right">';
                    echo $res["num"];
                    echo '</td>';
                    echo '</tr>';
                }
            }
            

            echo '</tbody>
						 </table>  ';
	    
	    print '</div></div></div>';
        }
        
        public function buildGroupTable()
        {
	    if (SHOW_RPG!='checked')
	    {
		return;
	    }
	    
	    print('<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-th"></i> Releases per Group</h2>
						<div class="box-icon">

							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
													</div>
					</div>
					<div class="box-content">');
								    
            echo '<table class="table table-striped table-bordered bootstrap-datatable datatable">
							  <thead>
								  <tr>
									  <th>Group</th>
									  <th>Releases</th>                                
								  </tr>
							  </thead>   
							  <tbody>';
                                                          
            $group=new Groups;
            # get all the groups
            $allgroups=$group->getAll();
            
            $db = new DB();
            
            
            foreach ($allgroups as $group)
            {
                $sql = sprintf("select count(ID) as num from releases where groupID = %s", $group['ID']);
                $res = $db->queryOneRow($sql);
                
                if ($res["num"] > 0)
                {
                    echo '<tr>';
                    echo '<td>';
                    echo $group['name'];
                    echo '</td>';
                
                    echo '<td class="right">';
                    echo $res["num"];
                    echo '</td>';
                    echo '</tr>';
                }
            
            }

            echo '</tbody>
						 </table>  ';
						 
	    print '</div></div></div>';						 
        }
        
        public function buildPendingTable()
        {
	    if (SHOW_PROCESSING!='checked')
	    {
		return;
	    }
	    
	    print('<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-th"></i> To Be Processed</h2>
						<div class="box-icon">

							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
													</div>
					</div>
					<div class="box-content">');
							
            echo '<table class="table table-striped table-bordered ">
							  <thead>
								  <tr>
									  <th>Group</th>
									  <th>Pending</th>                                
								  </tr>
							  </thead>   
							  <tbody>';
                                                          
            $category=new Category;
            # get all the active categories
            $allcategories=$category->get(true);
            
            $db = new DB();
            
            
             /////////////amount of books left to do//////
            $book_query = "select count(*) as ToDo from releases use index (ix_releases_categoryID) where bookinfoID IS NULL and categoryID = 7020;";
            /////////////amount of games left to do//////
            $console_query = "SELECT count(*) as ToDo from releases use index (ix_releases_categoryID) where consoleinfoID IS NULL and categoryID in ( select ID from category where parentID = 1000 );";
            /////////////amount of movies left to do//////
            $movies_query = "SELECT count(*) as ToDo from releases use index (ix_releases_categoryID) where imdbID IS NULL and categoryID in ( select ID from category where parentID = 2000 );";
            /////////////amount of music left to do//////
            $music_query = "SELECT count(*) as ToDo from releases use index (ix_releases_categoryID) where musicinfoID IS NULL and categoryID in ( select ID from category where parentID = 3000 );";
            /////////////amount of tv left to do/////////
            $tvrage_query = "SELECT count(*) as ToDo from releases where rageID = -1 and categoryID in ( select ID from category where parentID = 5000 );";

            # books
            echo '<tr>';
            echo '<td>';
            echo 'Books';
            echo '</td>';
            echo '<td class="right">';
            $res = $db->queryOneRow($book_query);    
            echo $res["ToDo"];
            echo '</td>';
            echo '</tr>';        
            # console
            echo '<tr>';
            echo '<td>';
            echo 'Console';
            echo '</td>';
            echo '<td class="right">';
            $res = $db->queryOneRow($console_query);    
            echo $res["ToDo"];
            echo '</td>';
            echo '</tr>';
            # movies
            echo '<tr>';
            echo '<td>';
            echo 'Movies';
            echo '</td>';
            echo '<td class="right">';
            $res = $db->queryOneRow($movies_query);    
            echo $res["ToDo"];
            echo '</td>';
            echo '</tr>';
            # music
            echo '<tr>';
            echo '<td>';
            echo 'Music';
            echo '</td>';
            echo '<td class="right">';
            $res = $db->queryOneRow($music_query);    
            echo $res["ToDo"];
            echo '</td>';
            echo '</tr>';
            # tv
            echo '<tr>';
            echo '<td>';
            echo 'Television';
            echo '</td>';
            echo '<td class="right">';
            $res = $db->queryOneRow($tvrage_query);    
            echo $res["ToDo"];
            echo '</td>';
            echo '</tr>';

 

            echo '</tbody>
						 </table>  ';
						 
	    print '</div></div></div>';
        }
}
        
                        




?>