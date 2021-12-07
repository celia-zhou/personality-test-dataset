<?php
$var_person = $var_pID;
// If the all the variables are set when the Submit button is clicked...
if (isset($_POST['form_submit'])) {
    // Refer to conn.php file and open a connection.
    require_once("conn.php");
    // Will get the value typed in the form text field and save into variable
    $var_pID = $_POST['field_pid'];

    $query= "SELECT country, 
        EXT1, EXT2, EXT3, EXT4, EXT5, EXT6, EXT7, EXT8, EXT9, EXT10, 
        EST1, EST2, EST3, EST4, EST5, EST6, EST7, EST8, EST9, EST10, 
        AGR1, AGR2, AGR3, AGR4, AGR5, AGR6, AGR7, AGR8, AGR9, AGR10, 
        CSN1, CSN2, CSN3, CSN4, CSN5, CSN6, CSN7, CSN8, CSN9, CSN10, 
        OPN1, OPN2, OPN3, OPN4, OPN5, OPN6, OPN7, OPN8, OPN9, OPN10
        FROM ext INNER JOIN agr ON ext.p_id = agr.p_id
            INNER JOIN opn ON ext.p_id = opn.p_id
            INNER JOIN csn ON ext.p_id = csn.p_id
            INNER JOIN est ON ext.p_id = est.p_id
            INNER JOIN location ON ext.p_id = location.p_id
        WHERE est.p_id = :pID;";

    try
    {
      $prepared_stmt = $dbo->prepare($query);
      $prepared_stmt->bindValue(':pID', $var_pID, PDO::PARAM_INT);
      $result = $prepared_stmt->execute();
      $result = $prepared_stmt->fetchAll();

    }
    catch (PDOException $ex)
    { // Error in database processing.
      echo $sql . "<br>" . $error->getMessage(); // HTTP 500 - Internal Server Error
    }
}



if (isset($_POST['form_delete'])) {
    // Refer to conn.php file and open a connection.
    require_once("conn.php");
    // Will get the value typed in the form text field and save into variable
    // $var_pID = $_POST['field_pid'];
    $var_tmp = $_POST['field_tmp'];
    
    $query_delete = "CALL deleteRecord(:pID);";
    try
    {
      $prepared_stmt_delete = $dbo->prepare($query_delete);
      $prepared_stmt_delete->bindValue(':pID', $var_tmp, PDO::PARAM_INT);
      $result_delete = $prepared_stmt_delete->execute();
      

    }
    catch (PDOException $ex)
    { // Error in database processing.
      echo $sql . "<br>" . $error->getMessage(); // HTTP 500 - Internal Server Error
    }
}



if (isset($_POST['form_edit'])) {
    // Refer to conn.php file and open a connection.
    require_once("conn.php");
    // Will get the value typed in the form text field and save into variable
    // $var_pID = $_POST['field_pid'];

    $query_update= "CALL updateRecord(:person_ID, :newCountry);";
    $var_newCountry = $_POST['field_country'];
    $var_tmp2 = $_POST['field_tmp2'];
    try
    {
        
      $prepared_stmt_update = $dbo->prepare($query_update);
      $prepared_stmt_update->bindValue(':newCountry', $var_newCountry, PDO::PARAM_STR);
      $prepared_stmt_update->bindValue(':person_ID', $var_tmp2, PDO::PARAM_INT);
      $result_update = $prepared_stmt_update->execute();
      

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
            <a class="nav-link" href="addData.php">Take Questionnaire</a>
            </li>
            <li class="nav-item">
					<a class="nav-link active" href="editData.php">Update/Delete Data</a>
			</li>
        </ul>
        </div>
    </div>
    </nav>


    <div class = "content">
    <h1> Edit/Delete Data by Person ID</h1>
    <!-- This is the start of the form. This form has one text field and one button.
      See the project.css file to note how form is stylized.-->
    <form method="post">

      <label for="id_director">Person ID:</label>
      <!-- The input type is a text field. Note the name and id. The name attribute
        is referred above on line 7. $var_country = $_POST['field_country']; id attribute is referred in label tag above on line 52-->
      <input type="text" name="field_pid" id = "id_director">
      <!-- The input type is a submit button. Note the name and value. The value attribute decides what will be dispalyed on Button. In this case the button shows Submit.
      The name attribute is referred  on line 3 and line 61. -->
      <td><input type="submit" name="form_submit" value="Submit"></td>
    </form>
    </div>

    <?php
      if (isset($_POST['form_submit'])) {
        if ($result) { 
    ?>

            <!-- This section is to display the user's survey results -->
        <div class="table-container">
            <div class = "table-wrapper">
              <!-- first show the header RESULT -->
              <h3>Survey Results for Person ID: <?php echo $_POST['field_pid']; ?></h3>
              <!-- THen create a table like structure. See the project.css how table is stylized. -->
              <table class="search-table" style = "margin-bottom: 0px;">
                <!-- Create the first row of table as table head (thead). -->
                <thead>
                   <!-- The top row is table head with four columns named -- ID, Title ... -->
                  <tr>
                    <th class="data-th">Country</th>
                    <th class="data-th">EXT1</th>
                    <th class="data-th">EXT2</th>
                    <th class="data-th">EXT3</th>
                    <th class="data-th">EXT4</th>
                    <th class="data-th">EXT5</th>
                    <th class="data-th">EXT6</th>
                    <th class="data-th">EXT7</th>
                    <th class="data-th">EXT8</th>
                    <th class="data-th">EXT9</th>
                    <th class="data-th">EXT10</th>
                    <th class="data-th">AGR1</th>
                    <th class="data-th">AGR2</th>
                    <th class="data-th">AGR3</th>
                    <th class="data-th">AGR4</th>
                    <th class="data-th">AGR5</th>
                    <th class="data-th">AGR6</th>
                    <th class="data-th">AGR7</th>
                    <th class="data-th">AGR8</th>
                    <th class="data-th">AGR9</th>
                    <th class="data-th">AGR10</th>
                    <th class="data-th">OPN1</th>
                    <th class="data-th">OPN2</th>
                    <th class="data-th">OPN3</th>
                    <th class="data-th">OPN4</th>
                    <th class="data-th">OPN5</th>
                    <th class="data-th">OPN6</th>
                    <th class="data-th">OPN7</th>
                    <th class="data-th">OPN8</th>
                    <th class="data-th">OPN9</th>
                    <th class="data-th">OPN10</th>
                    <th class="data-th">CSN1</th>
                    <th class="data-th">CSN2</th>
                    <th class="data-th">CSN3</th>
                    <th class="data-th">CSN4</th>
                    <th class="data-th">CSN5</th>
                    <th class="data-th">CSN6</th>
                    <th class="data-th">CSN7</th>
                    <th class="data-th">CSN8</th>
                    <th class="data-th">CSN9</th>
                    <th class="data-th">CSN10</th>
                    <th class="data-th">EST1</th>
                    <th class="data-th">EST2</th>
                    <th class="data-th">EST3</th>
                    <th class="data-th">EST4</th>
                    <th class="data-th">EST5</th>
                    <th class="data-th">EST6</th>
                    <th class="data-th">EST7</th>
                    <th class="data-th">EST8</th>
                    <th class="data-th">EST9</th>
                    <th class="data-th">EST10</th>
                  </tr>
                </thead>
                 <!-- Create rest of the the body of the table -->
                <tbody>
                   <!-- For each row saved in the $result variable ... -->
                  <?php foreach ($result as $row) { ?>
                    <tr>
                      <td class="data-td"><?php echo $row["country"]; ?></td>
                      <td class="data-td"><?php echo $row["EXT1"]; ?></td>
                      <td class="data-td"><?php echo $row["EXT2"]; ?></td>
                      <td class="data-td"><?php echo $row["EXT3"]; ?></td>
                      <td class="data-td"><?php echo $row["EXT4"]; ?></td>
                      <td class="data-td"><?php echo $row["EXT5"]; ?></td>
                      <td class="data-td"><?php echo $row["EXT6"]; ?></td>
                      <td class="data-td"><?php echo $row["EXT7"]; ?></td>
                      <td class="data-td"><?php echo $row["EXT8"]; ?></td>
                      <td class="data-td"><?php echo $row["EXT9"]; ?></td>
                      <td class="data-td"><?php echo $row["EXT10"]; ?></td>
                      <td class="data-td"><?php echo $row["AGR1"]; ?></td>
                      <td class="data-td"><?php echo $row["AGR2"]; ?></td>
                      <td class="data-td"><?php echo $row["AGR3"]; ?></td>
                      <td class="data-td"><?php echo $row["AGR4"]; ?></td>
                      <td class="data-td"><?php echo $row["AGR5"]; ?></td>
                      <td class="data-td"><?php echo $row["AGR6"]; ?></td>
                      <td class="data-td"><?php echo $row["AGR7"]; ?></td>
                      <td class="data-td"><?php echo $row["AGR8"]; ?></td>
                      <td class="data-td"><?php echo $row["AGR9"]; ?></td>
                      <td class="data-td"><?php echo $row["AGR10"]; ?></td>
                      <td class="data-td"><?php echo $row["OPN1"]; ?></td>
                      <td class="data-td"><?php echo $row["OPN2"]; ?></td>
                      <td class="data-td"><?php echo $row["OPN3"]; ?></td>
                      <td class="data-td"><?php echo $row["OPN4"]; ?></td>
                      <td class="data-td"><?php echo $row["OPN5"]; ?></td>
                      <td class="data-td"><?php echo $row["OPN6"]; ?></td>
                      <td class="data-td"><?php echo $row["OPN7"]; ?></td>
                      <td class="data-td"><?php echo $row["OPN8"]; ?></td>
                      <td class="data-td"><?php echo $row["OPN9"]; ?></td>
                      <td class="data-td"><?php echo $row["OPN10"]; ?></td>
                      <td class="data-td"><?php echo $row["CSN1"]; ?></td>
                      <td class="data-td"><?php echo $row["CSN2"]; ?></td>
                      <td class="data-td"><?php echo $row["CSN3"]; ?></td>
                      <td class="data-td"><?php echo $row["CSN4"]; ?></td>
                      <td class="data-td"><?php echo $row["CSN5"]; ?></td>
                      <td class="data-td"><?php echo $row["CSN6"]; ?></td>
                      <td class="data-td"><?php echo $row["CSN7"]; ?></td>
                      <td class="data-td"><?php echo $row["CSN8"]; ?></td>
                      <td class="data-td"><?php echo $row["CSN9"]; ?></td>
                      <td class="data-td"><?php echo $row["CSN10"]; ?></td>
                      <td class="data-td"><?php echo $row["EST1"]; ?></td>
                      <td class="data-td"><?php echo $row["EST2"]; ?></td>
                      <td class="data-td"><?php echo $row["EST3"]; ?></td>
                      <td class="data-td"><?php echo $row["EST4"]; ?></td>
                      <td class="data-td"><?php echo $row["EST5"]; ?></td>
                      <td class="data-td"><?php echo $row["EST6"]; ?></td>
                      <td class="data-td"><?php echo $row["EST7"]; ?></td>
                      <td class="data-td"><?php echo $row["EST8"]; ?></td>
                      <td class="data-td"><?php echo $row["EST9"]; ?></td>
                      <td class="data-td"><?php echo $row["EST10"]; ?></td>
                    <!-- End first row. Note this will repeat for each row in the $result variable-->
                  </tr>
                  <?php } ?>
                  <!-- End table body -->
                </tbody>
                <!-- End table -->
              </table>


             <!-- This section is to delete the record -->
            <h3>Delete Record</h3>
            <form method="post">
                <input type="text" name="field_tmp" id = "tmp_pid"
                style = "visibility: hidden; width: 0px;" value = <?php echo $var_pID ?>>
                <input type="submit" name="form_delete" value="Delete">
            </form>
            
             <!-- This section is to edit the user's survey country -->
            <h3> Edit Country</h3>
            <form method="post">
                <label for="country_name">Country:</label>
                <input type="text" name="field_country" id = "country_name">
                <input type="text" name="field_tmp2" id = "tmp2_pid" 
                style = "visibility: hidden; width: 0px;" value = <?php echo $var_pID ?>>
                <input type="submit" name="form_edit" value="Submit">
            </form>
            </div>
          </div>
          
    <?php 
        } else { 
    ?>
          <h3> Person ID was not found. </h3>
    <?php 
        }
      } 
    ?>
  </body>
</html>