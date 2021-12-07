<?php
// If the all the variables are set when the Submit button is clicked...
if (isset($_POST['field_submit'])) {
    // Refer to conn.php file and open a connection.
    require_once("conn.php");
    // Will get the value typed in the form text field and save into variable
    $var_country = $_POST['field_country'];
    // Save the query into variable called $query. Note that :country_name is a place holder
    
    // This query is used to search by the country name
    $query = "SELECT * FROM search WHERE country = :country_name LIMIT 50;";

    // This query is used to get the average values for the country
    $query_avg = "SELECT * FROM allcountries WHERE country = :country_name;";




try
    {
      // Create a prepared statement. Prepared statements are a way to eliminate SQL INJECTION.
      $prepared_stmt = $dbo->prepare($query);
      //bind the value saved in the variable $var_country to the place holder :country_name  
      // Use PDO::PARAM_STR to sanitize user string.
      $prepared_stmt->bindValue(':country_name', $var_country, PDO::PARAM_STR);
      $prepared_stmt->execute();
      // Fetch all the values based on query and save that to variable $result
      $result = $prepared_stmt->fetchAll();


      $prepared_stmt_avg = $dbo->prepare($query_avg);
      //bind the value saved in the variable $var_country to the place holder :country_name  
      // Use PDO::PARAM_STR to sanitize user string.
      $prepared_stmt_avg->bindValue(':country_name', $var_country, PDO::PARAM_STR);
      $prepared_stmt_avg->execute();
      // Fetch all the values based on query and save that to variable $result
      $result_avg = $prepared_stmt_avg ->fetchAll();

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
        <a class="nav-link active" href="searchCountry.php">Search by Country</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="countryAvg.php">View Country Averages</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="addData.php">Take Questionnaire</a>
        </li>
        <li class="nav-item">
					<a class="nav-link" href="editData.php">Update/Delete Data</a>
				</li>
      </ul>
      </div>
    </div>
	</nav>
    
  <div class = "content">
    <h1> Search Data by Country</h1>
    <!-- This is the start of the form. This form has one text field and one button.
      See the project.css file to note how form is stylized.-->
    <form method="post">

      <label for="id_director">Country</label>
      <!-- The input type is a text field. Note the name and id. The name attribute
        is referred above on line 7. $var_country = $_POST['field_country']; id attribute is referred in label tag above on line 52-->
      <input type="text" name="field_country" id = "id_director">
      <!-- The input type is a submit button. Note the name and value. The value attribute decides what will be dispalyed on Button. In this case the button shows Submit.
      The name attribute is referred  on line 3 and line 61. -->
      <input type="submit" name="field_submit" value="Submit">
    </form>
  </div>

    
    
    <?php
      if (isset($_POST['field_submit'])) {
        
        // If the query executed (result is true) and the row count returned from the query is greater than 0 then...
        if ($result && $prepared_stmt->rowCount() > 0) { ?>
          
          <div class="table-container">
            <div class = "table-wrapper">
              <!-- first show the header RESULT -->
              <h3>Average Values for <?php echo $_POST['field_country']; ?></h3>
              <!-- THen create a table like structure. See the project.css how table is stylized. -->
              <table class="avg-table">
                <!-- Create the first row of table as table head (thead). -->
                <thead>
                   <!-- The top row is table head with four columns named -- ID, Title ... -->
                  <tr>
                    <th class="data-th">Country</th>
                    <th class="data-th"></th>
                    <th class="data-th"></th>
                    <th class="data-th">Extraversion</th>
                    <th class="data-th">Agreeableness</th>
                    <th class="data-th">Conscientiousness</th>
                    <th class="data-th">Openness</th>
                    <th class="data-th">Neuroticism/Emotional Stability</th>
                  </tr>
                </thead>
                 <!-- Create rest of the the body of the table -->
                <tbody>
                   <!-- For each row saved in the $result variable ... -->
                  <?php foreach ($result_avg as $row) { ?>
                    <tr>
                      <td class="data-td"><?php echo $row["country"]; ?></td>
                      <td class="data-td"><?php echo $row["lat_appx_lots_of_err"]; ?></td>
                      <td class="data-td"><?php echo $row["long_appx_lots_of_err"]; ?></td>
                      <td class="data-td"><?php echo $row["extraversion"]; ?></td>
                      <td class="data-td"><?php echo $row["agreeableness"]; ?></td>
                      <td class="data-td"><?php echo $row["openness"]; ?></td>
                      <td class="data-td"><?php echo $row["conscientiousness"]; ?></td>
                      <td class="data-td"><?php echo $row["neuroticism"]; ?></td>
                    <!-- End first row. Note this will repeat for each row in the $result variable-->
                    </tr>
                    
                    
                  <?php } ?>
                  <!-- End table body -->
                </tbody>
                <!-- End table -->
              </table>


              <h3>Individual Survey Results for <?php echo $_POST['field_country']; ?></h3>
              <table>
                <!-- Create the first row of table as table head (thead). -->
                <thead>
                   <!-- The top row is table head with four columns named -- ID, Title ... -->
                  <tr>
                    <th class="data-th">Country</th>
                    <th class="data-th">Latitude</th>
                    <th class="data-th">Longitude</th>
                    <th class="data-th">Extraversion</th>
                    <th class="data-th">Agreeableness</th>
                    <th class="data-th">Conscientiousness</th>
                    <th class="data-th">Openness</th>
                    <th class="data-th">Neuroticism/Emotional Stability</th>
                  </tr>
                </thead>
                 <!-- Create rest of the the body of the table -->
                <tbody>
                   <!-- For each row saved in the $result variable ... -->
                  <?php foreach ($result as $row) { ?>
                    <tr>
                      <td class="data-td"><?php echo $row["country"]; ?></td>
                      <td class="data-td"><?php echo $row["lat_appx_lots_of_err"]; ?></td>
                      <td class="data-td"><?php echo $row["long_appx_lots_of_err"]; ?></td>
                      <td class="data-td"><?php echo $row["extraversion"]; ?></td>
                      <td class="data-td"><?php echo $row["agreeableness"]; ?></td>
                      <td class="data-td"><?php echo $row["openness"]; ?></td>
                      <td class="data-td"><?php echo $row["conscientiousness"]; ?></td>
                      <td class="data-td"><?php echo $row["neuroticism"]; ?></td>
                    <!-- End first row. Note this will repeat for each row in the $result variable-->
                    </tr>
                    
                    
                  <?php } ?>
                  <!-- End table body -->
                </tbody>
                <!-- End table -->
              </table>
            </div>
          </div>

          

  
        <?php } else { ?>
          <!-- IF query execution resulted in error display the following message-->
          <h3>Sorry, no results found for country <?php echo $_POST['field_country']; ?>. </h3>
        <?php }
    } ?>


    
  </body>
</html>






