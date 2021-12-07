<?php

try
    {
        require_once("conn.php");
        // This directly uses the view to return the result
        $query = "SELECT * FROM allcountries;";
        // Create a prepared statement. Prepared statements are a way to eliminate SQL INJECTION.
        $prepared_stmt = $dbo->prepare($query);
        
        // Use PDO::PARAM_STR to sanitize user string.
        $prepared_stmt->execute();
        // Fetch all the values based on query and save that to variable $result
        $result = $prepared_stmt->fetchAll();

    }
    catch (PDOException $ex)
    { // Error in database processing.
      echo $sql . "<br>" . $error->getMessage(); // HTTP 500 - Internal Server Error
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
        <a class="nav-link active" href="countryAvg.php">View Country Averages</a>
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
    <?php
      
        
        // If the query executed (result is true) and the row count returned from the query is greater than 0 then...
        if ($result && $prepared_stmt->rowCount() > 0) { ?>
          
          <div class="table-container">
            <div class = "table-wrapper">
              <!-- first show the header RESULT -->
              <h2>Average Traits For Each Country</h2>
              <!-- THen create a table like structure. See the project.css how table is stylized. -->
              <table>
                <!-- Create the first row of table as table head (thead). -->
                <thead>
                   <!-- The top row is table head with four columns named -- ID, Title ... -->
                  <tr>
                    <th class="data-th">Country</th>
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
                      <td class="data-td"><?php echo $row["extraversion"]; ?></td>
                      <td class="data-td"><?php echo $row["agreeableness"]; ?></td>
                      <td class="data-td"><?php echo $row["conscientiousness"]; ?></td>
                      <td class="data-td"><?php echo $row["openness"]; ?></td>
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
          <h3>Sorry, no results found. </h3>
        <?php }
     ?>


    
  </body>
</html>






