<?php

if (isset($_POST['f_submit'])) {

    require_once("conn.php");

    $var_mID = $_POST['f_mID'];
    $var_title = $_POST['f_title'];
    $var_year = $_POST['f_year'];
    $var_director = $_POST['f_director'];

    $query = "INSERT INTO Movie (mID, title, movieYear, director) "
            . "VALUES (:mID, :title, :year, :director)";

    try
    {
      $prepared_stmt = $dbo->prepare($query);
      $prepared_stmt->bindValue(':mID', $var_mID, PDO::PARAM_INT);
      $prepared_stmt->bindValue(':title', $var_title, PDO::PARAM_STR);
      $prepared_stmt->bindValue(':year', $var_year, PDO::PARAM_INT);
      $prepared_stmt->bindValue(':director', $var_director, PDO::PARAM_STR);
      $result = $prepared_stmt->execute();

    }
    catch (PDOException $ex)
    { // Error in database processing.
      echo $sql . "<br>" . $error->getMessage(); // HTTP 500 - Internal Server Error
    }
}

?>

<html>
  <head>
    <!-- THe following is the stylesheet file. The CSS file decides look and feel -->
    <link rel="stylesheet" type="text/css" href="project.css" />
  </head> 

  <body>
    <div id="navbar">
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="getMovie.php">Search Movie</a></li>
        <li><a href="insertMovie.php">Insert Movie</a></li>
        <li><a href="deleteMovie.php">Delete Movie</a></li>
      </ul>
    </div>

<h1> Insert Movie </h1>

    <form method="post">
    	<label for="id_mID">mID</label>
    	<input type="text" name="f_mID" id="id_mID"> 

    	<label for="id_title">title</label>
    	<input type="text" name="f_title" id="id_title">

    	<label for="id_year">year</label>
    	<input type="text" name="f_year" id="id_year">

    	<label for="id_director">director</label>
    	<input type="text" name="f_director" id="id_director">
    	
    	<input type="submit" name="f_submit" value="Submit">
    </form>
    <?php
      if (isset($_POST['f_submit'])) {
        if ($result) { 
    ?>
          Movie data was inserted successfully.
    <?php 
        } else { 
    ?>
          <h3> Sorry, there was an error. Movie data was not inserted. </h3>
    <?php 
        }
      } 
    ?>


    
  </body>
</html>