<?php
	//Connects to the server
	require_once '..\functions/server.php';
	
	//Define alert as nothing
	$alert="";
	
	//Check if Post is populated
	if(isset($_POST["category"]))
	{
		//Attribute POST values to variables
		$id="";
		$category = $_POST["category"];
		
		$query = "SELECT id,enabled FROM tbl_product_category WHERE category='" . $category . "'";
		$result = check_data($query) or die("Erro: " . mysqli_error($db_link));
			
		//Failure for existing product
		if(mysqli_num_rows($result)<>0)
		{
			$row = mysqli_fetch_array($result);
			if($row['enabled']==0)
			{
				$alert = "This category alreredy exists! But was deleted.
				<br><br>
				<table width='100%'>
				<tr>
				<td class='top_header_link' align='center'>
				<a href='undelete.php?tbl=tbl_product_category&col=id&val=" . $row['id'] . "' title='Undelete'>
				[Undelete Category]
				</a>
				</td>
				</tr>
				</table>";
				$id = $row['id'];
			}
			else
			{
				$alert = "This product alredy exists<br>[Esse produto já existe]";
			}				
		}
		else
		{
			//Insert new product
			$query = "INSERT INTO tbl_product_category(category, enabled) VALUES ('" . $category . "','1')";
			check_data($query) or die("Erro: " . mysqli_error($db_link));
			
			//Refresh the page
			header("Location: product_category.php");
		}
	}
?>

<link rel="stylesheet" type="text/css" href="../css/style.css">

<div id="main_small">
	<div id="div_left_small">
    	<h3 class="blue_title">Manage Existing Categories</h3>
        
        <table id="db_list">
        	<tr>
                <th width="100%">Category</th>
                <th>Manage</th>
            </tr>
                <?php
					$query="SELECT id, category 
					FROM tbl_product_category
					WHERE enabled=1 ORDER BY category ASC";
					$result = check_data($query) or die("Erro: " . mysqli_error($db_link));
					
					$tbl="tbl_product_category";
					$col="id";
					
					for($j=1;$row=mysqli_fetch_array($result);$j++)
					{
						$color="";
						if($j%2==0){ $color="#dddddd"; }
						else{ $color="#ffffff"; }					
						
						$get_info="tbl=" . $tbl . "&col=" . $col . "&val=" . $row['id'];
						
						echo "<tr style='background-color:" .  $color . ";'>
								<td>" . $row['category'] . "</td>
								<td align='center'><a href='delete.php?" . $get_info . "' title='Delete " . $row['category'] . "'><img src='..\images\delete.png' /></a></td>
							  </tr>";
					}
				?>
        	<tr>
            	<th>
                	<?php 
						echo "Quantity: " . mysqli_num_rows($result);
					?>
                </th>
                <th>
                	<?php echo "<a href='' title='Export list to Excel'><img src='..\images/excel.gif' /></a>"; ?>
                </th>
            </tr>
        </table>
        
    </div> <!-- div_left -->
    
    <div id="div_right_small"> <!-- This div contains the form to insert new products -->
        <h3 class="blue_title">Insert New Categories</h3>
    
        <form name="category_registration" class="login_form" action="product_category.php" method="post">
            <p>
            	<input name="id" type="hidden" value"<?php if(isset($id) && $alert<>""){ echo $id; }?>" />
                <input name="category" type="text" placeholder="Category Name" value="<?php if(isset($category) && $alert<>""){ echo $category; } ?>" autofocus required>
            </p>
                        
            <?php
                    //In case there is an alert
                    if($alert <> "")
                    {
                        echo "<h5 class='red_danger'>" . $alert . "</h5>";
                    }
                    else
                    {
                        echo "<br>";
                    }
            ?>
            
            <p>
                <input type="submit" class="button_blue" id="submit" value="Insert">
            </p>
            
        </form>
    </div> <!-- div_right -->
</div> <!-- main -->