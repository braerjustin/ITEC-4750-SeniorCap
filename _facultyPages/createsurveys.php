<?php
// ++++ Change: Added Title 10/25 KM ++++
$title = 'Your Surveys';
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
// ++++ Change: Added survey_do object 10/28 KM ++++
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/survey_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/new_survey_model.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/drop_do.php');

// ++++ Change: Added Page Identifier 10/10 KM ++++
$P='yoursurveys';
?>

<h2 class="center">Create Group Survey</h2>
<h3 class="center">Using Existing Questions</h3>
<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
	<div class="row">
	<!-- ++++ Change: Added Survey List by LoginID 10/28/17 KM ++++ -->
		<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_create/create_gsurvey.php');?>
	</div>
</div>
	
	<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/facfooter.php');?>

</body>
</html>