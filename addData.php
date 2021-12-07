<?php
// If the all the variables are set when the Submit button is clicked...
if (isset($_POST['form_submit'])) {
    // Refer to conn.php file and open a connection.
    require_once("conn.php");
    // Will get the value typed in the form text field and save into variable
    // One variable is used for one question on the test
    $var_EXT1 = $_POST['q1'];
    $var_EXT2 = $_POST['q2'];
    $var_EXT3 = $_POST['q3'];
    $var_EXT4 = $_POST['q4'];
    $var_EXT5 = $_POST['q5'];
    $var_EXT6 = $_POST['q6'];
    $var_EXT7 = $_POST['q7'];
    $var_EXT8 = $_POST['q8'];
    $var_EXT9 = $_POST['q9'];
    $var_EXT10 = $_POST['q10'];
    $var_EST1 = $_POST['q11'];
    $var_EST2 = $_POST['q12'];
    $var_EST3 = $_POST['q13'];
    $var_EST4 = $_POST['q14'];
    $var_EST5 = $_POST['q15'];
    $var_EST6 = $_POST['q16'];
    $var_EST7 = $_POST['q17'];
    $var_EST8 = $_POST['q18'];
    $var_EST9 = $_POST['q19'];
    $var_EST10 = $_POST['q20'];
    $var_AGR1 = $_POST['q21'];
    $var_AGR2 = $_POST['q22'];
    $var_AGR3 = $_POST['q23'];
    $var_AGR4 = $_POST['q24'];
    $var_AGR5 = $_POST['q25'];
    $var_AGR6 = $_POST['q26'];
    $var_AGR7 = $_POST['q27'];
    $var_AGR8 = $_POST['q28'];
    $var_AGR9 = $_POST['q29'];
    $var_AGR10 = $_POST['q30'];
    $var_CSN1 = $_POST['q31'];
    $var_CSN2 = $_POST['q32'];
    $var_CSN3 = $_POST['q33'];
    $var_CSN4 = $_POST['q34'];
    $var_CSN5 = $_POST['q35'];
    $var_CSN6 = $_POST['q36'];
    $var_CSN7 = $_POST['q37'];
    $var_CSN8 = $_POST['q38'];
    $var_CSN9 = $_POST['q39'];
    $var_CSN10 = $_POST['q40'];
    $var_OPN1 = $_POST['q41'];
    $var_OPN2 = $_POST['q42'];
    $var_OPN3 = $_POST['q43'];
    $var_OPN4 = $_POST['q44'];
    $var_OPN5 = $_POST['q45'];
    $var_OPN6 = $_POST['q46'];
    $var_OPN7 = $_POST['q47'];
    $var_OPN8 = $_POST['q48'];
    $var_OPN9 = $_POST['q49'];
    $var_OPN10 = $_POST['q50'];
    

    // Each query is used to insert into the each of the normalized tables
    $query_ext = "INSERT INTO ext "
            . "VALUES (:EXT1,:EXT2,:EXT3,:EXT4,:EXT5,:EXT6,:EXT7,:EXT8,:EXT9,:EXT10, null);";

   $query_est = "INSERT INTO est "
   . "VALUES (:EST1,:EST2,:EST3,:EST4,:EST5,:EST6,:EST7,:EST8,:EST9,:EST10, null);";

   $query_agr = "INSERT INTO agr "
    . "VALUES (:AGR1,:AGR2,:AGR3,:AGR4,:AGR5,:AGR6,:AGR7,:AGR8,:AGR9,:AGR10, null);";

  $query_csn = "INSERT INTO csn "
    . "VALUES (:CSN1,:CSN2,:CSN3,:CSN4,:CSN5,:CSN6,:CSN7,:CSN8,:CSN9,:CSN10, null);";

  $query_opn = "INSERT INTO opn "
    . "VALUES (:OPN1,:OPN2,:OPN3,:OPN4,:OPN5,:OPN6,:OPN7,:OPN8,:OPN9,:OPN10, null);";

    // The location is set to US by default
    $query_loc = "INSERT INTO location "
    . "VALUES (null, 'US', null, null, :personID);";


    // This is used to obtain the person ID for this survey
    $query_result = "SELECT last_insert_id();";



    try
    {
        // The results are sanitized to prevent SQL injection
      $prepared_stmt_ext = $dbo->prepare($query_ext);
      $prepared_stmt_ext->bindValue(':EXT1', $var_EXT1, PDO::PARAM_INT);
      $prepared_stmt_ext->bindValue(':EXT2', $var_EXT2, PDO::PARAM_INT);
      $prepared_stmt_ext->bindValue(':EXT3', $var_EXT3, PDO::PARAM_INT);
      $prepared_stmt_ext->bindValue(':EXT4', $var_EXT4, PDO::PARAM_INT);
      $prepared_stmt_ext->bindValue(':EXT5', $var_EXT5, PDO::PARAM_INT);
      $prepared_stmt_ext->bindValue(':EXT6', $var_EXT6, PDO::PARAM_INT);
      $prepared_stmt_ext->bindValue(':EXT7', $var_EXT7, PDO::PARAM_INT);
      $prepared_stmt_ext->bindValue(':EXT8', $var_EXT8, PDO::PARAM_INT);
      $prepared_stmt_ext->bindValue(':EXT9', $var_EXT9, PDO::PARAM_INT);
      $prepared_stmt_ext->bindValue(':EXT10', $var_EXT10, PDO::PARAM_INT);
      $result_ext = $prepared_stmt_ext->execute();


      $prepared_stmt_est = $dbo->prepare($query_est);
      $prepared_stmt_est->bindValue(':EST1', $var_EST1, PDO::PARAM_INT);
      $prepared_stmt_est->bindValue(':EST2', $var_EST2, PDO::PARAM_INT);
      $prepared_stmt_est->bindValue(':EST3', $var_EST3, PDO::PARAM_INT);
      $prepared_stmt_est->bindValue(':EST4', $var_EST4, PDO::PARAM_INT);
      $prepared_stmt_est->bindValue(':EST5', $var_EST5, PDO::PARAM_INT);
      $prepared_stmt_est->bindValue(':EST6', $var_EST6, PDO::PARAM_INT);
      $prepared_stmt_est->bindValue(':EST7', $var_EST7, PDO::PARAM_INT);
      $prepared_stmt_est->bindValue(':EST8', $var_EST8, PDO::PARAM_INT);
      $prepared_stmt_est->bindValue(':EST9', $var_EST9, PDO::PARAM_INT);
      $prepared_stmt_est->bindValue(':EST10', $var_EST10, PDO::PARAM_INT);
      $result_est = $prepared_stmt_est->execute();

      $prepared_stmt_agr = $dbo->prepare($query_agr);
      $prepared_stmt_agr->bindValue(':AGR1', $var_AGR1, PDO::PARAM_INT);
      $prepared_stmt_agr->bindValue(':AGR2', $var_AGR2, PDO::PARAM_INT);
      $prepared_stmt_agr->bindValue(':AGR3', $var_AGR3, PDO::PARAM_INT);
      $prepared_stmt_agr->bindValue(':AGR4', $var_AGR4, PDO::PARAM_INT);
      $prepared_stmt_agr->bindValue(':AGR5', $var_AGR5, PDO::PARAM_INT);
      $prepared_stmt_agr->bindValue(':AGR6', $var_AGR6, PDO::PARAM_INT);
      $prepared_stmt_agr->bindValue(':AGR7', $var_AGR7, PDO::PARAM_INT);
      $prepared_stmt_agr->bindValue(':AGR8', $var_AGR8, PDO::PARAM_INT);
      $prepared_stmt_agr->bindValue(':AGR9', $var_AGR9, PDO::PARAM_INT);
      $prepared_stmt_agr->bindValue(':AGR10', $var_AGR10, PDO::PARAM_INT);
      $result_agr = $prepared_stmt_agr->execute();

      $prepared_stmt_csn = $dbo->prepare($query_csn);
      $prepared_stmt_csn->bindValue(':CSN1', $var_CSN1, PDO::PARAM_INT);
      $prepared_stmt_csn->bindValue(':CSN2', $var_CSN2, PDO::PARAM_INT);
      $prepared_stmt_csn->bindValue(':CSN3', $var_CSN3, PDO::PARAM_INT);
      $prepared_stmt_csn->bindValue(':CSN4', $var_CSN4, PDO::PARAM_INT);
      $prepared_stmt_csn->bindValue(':CSN5', $var_CSN5, PDO::PARAM_INT);
      $prepared_stmt_csn->bindValue(':CSN6', $var_CSN6, PDO::PARAM_INT);
      $prepared_stmt_csn->bindValue(':CSN7', $var_CSN7, PDO::PARAM_INT);
      $prepared_stmt_csn->bindValue(':CSN8', $var_CSN8, PDO::PARAM_INT);
      $prepared_stmt_csn->bindValue(':CSN9', $var_CSN9, PDO::PARAM_INT);
      $prepared_stmt_csn->bindValue(':CSN10', $var_CSN10, PDO::PARAM_INT);
      $result_csn = $prepared_stmt_csn->execute();

      $prepared_stmt_opn = $dbo->prepare($query_opn);
      $prepared_stmt_opn->bindValue(':OPN1', $var_OPN1, PDO::PARAM_INT);
      $prepared_stmt_opn->bindValue(':OPN2', $var_OPN2, PDO::PARAM_INT);
      $prepared_stmt_opn->bindValue(':OPN3', $var_OPN3, PDO::PARAM_INT);
      $prepared_stmt_opn->bindValue(':OPN4', $var_OPN4, PDO::PARAM_INT);
      $prepared_stmt_opn->bindValue(':OPN5', $var_OPN5, PDO::PARAM_INT);
      $prepared_stmt_opn->bindValue(':OPN6', $var_OPN6, PDO::PARAM_INT);
      $prepared_stmt_opn->bindValue(':OPN7', $var_OPN7, PDO::PARAM_INT);
      $prepared_stmt_opn->bindValue(':OPN8', $var_OPN8, PDO::PARAM_INT);
      $prepared_stmt_opn->bindValue(':OPN9', $var_OPN9, PDO::PARAM_INT);
      $prepared_stmt_opn->bindValue(':OPN10', $var_OPN10, PDO::PARAM_INT);
      $result_opn = $prepared_stmt_opn->execute();


      $last_id = $dbo->lastInsertId();

      $prepared_stmt_loc = $dbo->prepare($query_loc);
      $prepared_stmt_loc->bindValue(':personID', $last_id, PDO::PARAM_INT);
      $result_result = $prepared_stmt_loc->execute();

      
      $success = true;
      //echo "new record of person id " . $last_id;

      $result = $result_ext && $result_est && $result_agr && $result_csn && $result_opn;
    }
    catch (PDOException $ex)
    { // Error in database processing.
      echo $sql . "<br>" . $error->getMessage(); // HTTP 500 - Internal Server Error
    }
}
?>

<html>
<!-- Any thing inside the HEAD tags are not visible on page.-->
  <head>
    <!-- THe following is the stylesheet file. The CSS file decides look and feel -->
    <link rel="stylesheet" type="text/css" href="project.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head> 
<!-- Everything inside the BODY tags are visible on page.-->
  <body>

  <!-- This is the navigation bar, which is used to move between the pages -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.html">5 Personality Test</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.html">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="searchCountry.php">Search by Country</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="countryAvg.php">View Country Averages</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="addData.php">Take Questionnaire</a>
            </li>
            <li class="nav-item">
				<a class="nav-link" href="editData.php">Update/Delete Data</a>
			</li>
        </ul>
        </div>
    </div>
    </nav>

    
    <!-- This section contains the survey for the test -->
    <div class = "table-wrapper">
        <h2>Five Personality Test</h2>

        <p class="form-label agree">Agree</p>
        <p class = "form-label neutral">Neutral</p>
        <p class = "form-label disagree">Disagree</p>

        <form method="post">
            <table class = "form-table">
            <tr>
                <td class="question-text">I am the life of the party.	</td>
                <td><input type="radio" value="1" name="q1" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q1" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q1" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q1" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q1" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I feel little concern for others.	</td>
                <td><input type="radio" value="1" name="q2" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q2" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q2" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q2" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q2" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I am always prepared.	</td>
                <td><input type="radio" value="1" name="q3" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q3" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q3" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q3" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q3" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I get stressed out easily.	</td>
                <td><input type="radio" value="1" name="q4" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q4" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q4" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q4" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q4" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I have a rich vocabulary.	</td>
                <td><input type="radio" value="1" name="q5" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q5" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q5" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q5" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q5" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I don't talk a lot.	</td>
                <td><input type="radio" value="1" name="q6" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q6" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q6" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q6" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q6" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I am interested in people.	</td>
                <td><input type="radio" value="1" name="q7" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q7" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q7" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q7" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q7" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I leave my belongings around.	</td>
                <td><input type="radio" value="1" name="q8" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q8" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q8" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q8" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q8" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I am relaxed most of the time.	</td>
                <td><input type="radio" value="1" name="q9" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q9" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q9" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q9" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q9" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I have difficulty understanding abstract ideas.	</td>
                <td><input type="radio" value="1" name="q10" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q10" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q10" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q10" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q10" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I feel comfortable around people.	</td>
                <td><input type="radio" value="1" name="q11" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q11" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q11" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q11" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q11" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I insult people.	</td>
                <td><input type="radio" value="1" name="q12" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q12" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q12" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q12" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q12" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I pay attention to details.	</td>
                <td><input type="radio" value="1" name="q13" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q13" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q13" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q13" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q13" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I worry about things.	</td>
                <td><input type="radio" value="1" name="q14" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q14" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q14" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q14" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q14" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I have a vivid imagination.	</td>
                <td><input type="radio" value="1" name="q15" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q15" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q15" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q15" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q15" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I keep in the background.	</td>
                <td><input type="radio" value="1" name="q16" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q16" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q16" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q16" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q16" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I sympathize with others' feelings.	</td>
                <td><input type="radio" value="1" name="q17" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q17" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q17" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q17" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q17" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I make a mess of things.	</td>
                <td><input type="radio" value="1" name="q18" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q18" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q18" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q18" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q18" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I seldom feel blue.	</td>
                <td><input type="radio" value="1" name="q19" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q19" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q19" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q19" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q19" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I am not interested in abstract ideas.	</td>
                <td><input type="radio" value="1" name="q20" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q20" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q20" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q20" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q20" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I start conversations.	</td>
                <td><input type="radio" value="1" name="q21" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q21" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q21" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q21" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q21" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I am not interested in other people's problems.	</td>
                <td><input type="radio" value="1" name="q22" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q22" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q22" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q22" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q22" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I get chores done right away.	</td>
                <td><input type="radio" value="1" name="q23" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q23" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q23" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q23" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q23" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I am easily disturbed.	</td>
                <td><input type="radio" value="1" name="q24" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q24" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q24" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q24" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q24" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I have excellent ideas.	</td>
                <td><input type="radio" value="1" name="q25" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q25" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q25" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q25" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q25" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I have little to say.	</td>
                <td><input type="radio" value="1" name="q26" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q26" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q26" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q26" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q26" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I have a soft heart.	</td>
                <td><input type="radio" value="1" name="q27" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q27" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q27" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q27" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q27" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I often forget to put things back in their proper place.	</td>
                <td><input type="radio" value="1" name="q28" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q28" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q28" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q28" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q28" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I get upset easily.	</td>
                <td><input type="radio" value="1" name="q29" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q29" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q29" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q29" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q29" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I do not have a good imagination.	</td>
                <td><input type="radio" value="1" name="q30" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q30" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q30" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q30" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q30" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I talk to a lot of different people at parties.	</td>
                <td><input type="radio" value="1" name="q31" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q31" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q31" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q31" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q31" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I am not really interested in others.	</td>
                <td><input type="radio" value="1" name="q32" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q32" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q32" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q32" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q32" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I like order.	</td>
                <td><input type="radio" value="1" name="q33" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q33" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q33" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q33" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q33" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I change my mood a lot.	</td>
                <td><input type="radio" value="1" name="q34" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q34" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q34" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q34" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q34" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I am quick to understand things.	</td>
                <td><input type="radio" value="1" name="q35" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q35" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q35" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q35" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q35" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I don't like to draw attention to myself.	</td>
                <td><input type="radio" value="1" name="q36" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q36" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q36" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q36" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q36" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I take time out for others.	</td>
                <td><input type="radio" value="1" name="q37" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q37" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q37" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q37" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q37" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I shirk my duties.	</td>
                <td><input type="radio" value="1" name="q38" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q38" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q38" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q38" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q38" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I have frequent mood swings.	</td>
                <td><input type="radio" value="1" name="q39" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q39" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q39" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q39" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q39" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I use difficult words.	</td>
                <td><input type="radio" value="1" name="q40" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q40" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q40" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q40" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q40" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I don't mind being the center of attention.	</td>
                <td><input type="radio" value="1" name="q41" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q41" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q41" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q41" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q41" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I feel others' emotions.	</td>
                <td><input type="radio" value="1" name="q42" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q42" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q42" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q42" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q42" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I follow a schedule.	</td>
                <td><input type="radio" value="1" name="q43" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q43" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q43" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q43" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q43" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I get irritated easily.	</td>
                <td><input type="radio" value="1" name="q44" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q44" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q44" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q44" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q44" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I spend time reflecting on things.	</td>
                <td><input type="radio" value="1" name="q45" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q45" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q45" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q45" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q45" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I am quiet around strangers.	</td>
                <td><input type="radio" value="1" name="q46" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q46" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q46" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q46" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q46" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I make people feel at ease.	</td>
                <td><input type="radio" value="1" name="q47" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q47" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q47" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q47" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q47" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I am exacting in my work.	</td>
                <td><input type="radio" value="1" name="q48" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q48" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q48" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q48" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q48" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I often feel blue.	</td>
                <td><input type="radio" value="1" name="q49" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q49" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q49" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q49" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q49" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">I am full of ideas.	</td>
                <td><input type="radio" value="1" name="q50" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q50" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q50" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q50" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q50" class="radiobutton"></td>
            </tr>
            
            <table>
            <input class="btn btn-primary" type="submit" name="form_submit" value="Submit" style = "margin: 10px;">
        </form>
    </div>





    <?php
      if (isset($_POST['form_submit'])) {
        if ($success) { 
    ?>

        <!-- This helps provide the person id for the user after they successfully complete the test -->
            <h2>
            <?php     
            echo "Survey successfully completed with Person ID of: " . $last_id;
            ?>
            </h2>
        
                  




    <?php 
        } else { 
    ?>
          <h3> Sorry, there was an error. Data was not inserted. </h3>
    <?php 
        }
      } 
    ?>


    
 


    
  </body>
</html>