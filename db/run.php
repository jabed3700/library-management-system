<?php
include_once('config.php');
if($con == false){
	echo "<h1>Error establish data base.</h1>";
}

function dataDelete($table,$id){
	global $con;
	$sql = "delete from ".$table." where id=".$id;
	mysqli_query($con,$sql);
}

function rawSql($sql){
	global $con;
	
	 mysqli_query($con,$sql);
	 return $con->insert_id;
}
function dataInsert($table,$values){
	global $con;
	$sql = "INSERT INTO ".$table." VALUES(NULL,";

	for($i=0;$i<count($values);$i++){
		$value = $values[$i];
		if($i!=0){
			$sql.=",";
		}
		$sql.="'".$value."'";
	}
	 $sql.=")";
	 //echo "sql     ".$sql;
	 mysqli_query($con,$sql);
	 return $con->insert_id;
}

function printOptions($table,$value,$show){
	global $con;
	$sql="select * from ".$table;
	$result = $con->query($sql);
	echo "<option>Choose</option>";

	while($res=mysqli_fetch_array($result)){
		echo "<option value='".$res[$value]."'>".$res[$show]."</option>";

	}

}

function printOptionsUpdate($table,$value,$show,$val){
	global $con;

	$sql="select * from ".$table;
	$result = $con->query($sql);
	while($res=mysqli_fetch_array($result)){
		echo "<option value='".$res[$value]."'";
		if($res[$value]==$val){
			echo " selected='true'";
		}
		echo ">".$res[$show]."</option>";

	}

}

function printTableBySql($sql,$headers,$column,$edit,$table,$r,$view=false){
	
	global $con;
	
	?>
	<table id="example1" class="table table-bordered table-striped" >
		<thead>
			<tr>
	<?php
	for($i=0;$i<count($headers);$i++){
		echo "<th>".$headers[$i]."</th>";
	}
	?>
	<th>Actions</th>
</tr></thead>
<tbody>

	<?php
	
	$result = $con->query($sql);
	while($res=mysqli_fetch_array($result)){
		?>
		<tr>
			<?php

			for($i=0;$i<count($column);$i++){
				if(gettype($column[$i])=="array"){
				echo "<td><img style='width:50px;border-radius:50%;height:50px' src='".$column[$i][1]."/".$res[$column[$i][0]]."'/></td>";

				}
				else{
				
				echo "<td>".$res[$column[$i]]."</td>";
				
				}

			}
			if($view){
				echo "<td><a class='btn btn-info' href='".$view."?id=".$res['id']."'>View</a></td>";
			}
			echo "<td>";
				echo "<a class='btn btn-sm btn-success' href='".$edit."?id=".$res['id']."'><i class='fas fa-edit' aria-hidden='true'></i></a>";
				?>
				<a onclick='return confirm("Are you sure?")' class='btn btn-sm btn-danger' href='delete.php?id=<?=$res["id"]?>&t=<?=$table?>&r=<?=$r?>'><i class="fas fa-trash-alt"></i></a></td>
				<?php
			?>
		</tr>
		<?php
	}?>
	</tbody>
	</table>
<?php
}


function printTablee($sql,$headers,$column){
	
	global $con;
	
	?>
	<table id="example1" class="table table-bordered table-striped" >
		<thead>
			<tr>
	<?php
	for($i=0;$i<count($headers);$i++){
		echo "<th>".$headers[$i]."</th>";
	}
	?>
</tr></thead>
<tbody>

	<?php
	
	$result = $con->query($sql);
	while($res=mysqli_fetch_array($result)){
		?>
		<tr>
			<?php

			for($i=0;$i<count($column);$i++){
				if(gettype($column[$i])=="array"){
				echo "<td><img style='width:50px;border-radius:50%;height:50px' src='".$column[$i][1]."/".$res[$column[$i][0]]."'/></td>";

				}
				else{
				
				echo "<td>".$res[$column[$i]]."</td>";
				
				}

			}
			?>
		</tr>
		<?php
	}?>
	</tbody>
	</table>
<?php
}















?>