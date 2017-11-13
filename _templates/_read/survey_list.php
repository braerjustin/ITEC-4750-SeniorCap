<?php 
// Change Added Survey_List 10/29/17 KM
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');?>
<div class="col-md-7 col-centered">
	<table class="table table-striped">

		<tbody>
			<?php	
			if($LoginID!=0){
				$surveydo = new Survey_DO();
				$rows=$surveydo->loadByLoginID($LoginID);
				// ------------- User's (faculty) Class Info Table ------------
				foreach ($rows as $value){
					echo '<tr>';
					//if from student view group_surveys
					if($P=='group_surveys'){
						//++++ Change: Only lists surveys that have unevaluated team members KM 11/11 ++++
						$GroupID=$value['GroupID'];
						$GSurveyID=$value['GSurveyID'];
						include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/unevaluated_list.php');
						if($GMLength>1){
							echo '<td>';
								echo $value['ClassName'];
							echo '</td>';
							echo '<td>';
								echo $value['GroupName'];
							echo '</td>'; 
							echo '<td>';
									echo '<a href="student_group_survey.php?gid='.$value['GroupID'].'&gsid='.$value['GSurveyID'].'">'.$value['GSurveyName'].'</a>';
							echo '</td>'; 
							echo '<td>';
								echo $value['ExpDate'];
							echo '</td>'; 
						}
					}
					//if not from student view group_surveys
					if($P=='yoursurveys'){
						echo '<td>';
							echo $value['ClassName'];
						echo '</td>';
						echo '<td>';
							echo $value['GroupName'];
						echo '</td>';
						 
						echo '<td>';
						echo '<a href="group_survey.php?gid='.$value['GroupID'].'&gsid='.$value['GSurveyID'].'">'.$value['GSurveyName'].'</a>';
						echo '</td>'; 
						echo '<td>';
							echo $value['ExpDate'];
						echo '</td>'; 
					}
					echo '</tr>';	
				}		
			}//If logged in
				?>
		</tbody>
	</table>
</div>