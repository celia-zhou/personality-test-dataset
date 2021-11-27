<?php

try
    {
        require_once("conn.php");
        $query = "SELECT country AS EST FROM personality_test LIMIT 5";
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
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.html">5 Personality Test</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.html">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="getMovie.php">Search by Country</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="countryAvg.php">View Country Averages</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="addData.php">Take Questionnaire</a>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled">Delete</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

    

    <div class = "table-wrapper">
        <h3>Five Personality Test</h3>

        <p class="form-label agree">Strongly Agree</p>
        <p class = "form-label neutral">Neutral</p>
        <p class = "form-label disagree">Strongly Disagree</p>

        <form>
            <table class = "form-table">
            <tr>
                <td class="question-text">do you like pizza?</td>
                <td><input type="radio" value="1" name="q1" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q1" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q1" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q1" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q1" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">do you like pizza?</td>
                <td><input type="radio" value="1" name="q2" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q2" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q2" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q2" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q2" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">do you like pizza?</td>
                <td><input type="radio" value="1" name="q3" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q3" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q3" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q3" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q3" class="radiobutton"></td>
            </tr>
            <tr>
                <td class="question-text">do you like pizza?</td>
                <td><input type="radio" value="1" name="q4" class="radiobutton"></td>
                <td><input type="radio" value="2" name="q4" class="radiobutton"></td>
                <td><input type="radio" value="3" name="q4" class="radiobutton"></td>
                <td><input type="radio" value="4" name="q4" class="radiobutton"></td>
                <td><input type="radio" value="5" name="q4" class="radiobutton"></td>
            </tr>
            <table>
        </form>
    </div>
    
 


    
  </body>
</html>