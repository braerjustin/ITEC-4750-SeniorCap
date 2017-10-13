<?php 
// ++++ Change: Added Delete Profile Module 10/7 KM ++++ 
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/profile_do.php');	
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/profile_model.php');
$P='delete_profile';
?>
<!-- Main Content Section-->
<div class="wrapper">
	<main>
		<?php	
		//----------------- Get Class Info --------------->	
		// ++++ Change: Added Check for IDs module 10/8KM ++++
		// Gets IDs
		include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');
		
		if($LoginID != 0){
			if(!isset($Subj) || empty($Subj)){echo '<div class="error">Uhoh problem getting Profile ID</div>';}
			if(!empty($Subj)){
				//calls class data object and loads table data by ClassID
				$thisStud = new Profile_DO($Subj);
				$rows=$thisStud->listProfile($Subj);
				foreach ($rows as $value){
					$Subj = $Subj;
					$Email = $value['Email'];
					$FName = $value['FName'];
					$LName = $value['LName'];
								
			?>	<!---------------- Show Class Info -------------->
			<table>
				<h1> Deleting Profile?</h1>
				<tr><th>ID: </th><td><?php echo $Subj;?></td></tr>
				<tr><th>Name</th><td><?php echo $FName. ' '.$LName;?></td></tr>
				<tr><th>Email: </th><td> <?php echo $Email;?></td></tr>
				<tr></tr>
			</table>

			<form name="DeleteProfile" method="POST">
				<div>	
					<br/>
					<input type="submit" value="Delete Profile" name="DeleteProfile" id="DeleteProfile">
				</div>
				<?php }
					// -----------------Delete Class --------------------
					if(isset($_POST['DeleteProfile'])){
						$delProfile = new Profile(array(
							'LoginID' => $_SESSION['LoginID'],
							'Role' => 'Student',
							'Password' => 'Password',
							'Subj' => $Subj,
							'Email' => $Email,
							'FName' => $FName,
							'LName' => $LName));
						$delProfile->deleteProfile($LoginID);
						if($delProfile){
							if($LoginID == $Subj){echo "<script>window.open('../../../logout.php','_self') </script>";} 
							if($LoginID != $Subj){
								$StID = '';
								$Subj = '';
								// ++++ Change: Added Check for sending page module 10/8KM ++++
								// Gets sending page and redirects
								include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getPage-Fac.php');
							}
						}
					}
			}//End If !empty  Subj
		}//End If !empty LoginID 

		?> 		
		</form>
	</main>
</div> <!-- End Wrapper -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/facfooter.php');?>
</body>
</html>