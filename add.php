<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add News</title>
  <link rel="stylesheet" href="admin.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="form-container">
    <header>
      <h1>Add News</h1>
    </header>
    <main>
      <form action="add.php" method="POST">
       
      <label for="news-content">Content:</label>
      <textarea id="news-content" name="content" rows="5" required></textarea>

        <label for="news-date">Date:</label>
        <input type="date" id="news-date" name="date" required>

       

        <button type="submit" name="submit" class="submit-btn">Add News</button>
      </form>
      <a href="admin.php"><button class="back-btn">Back to Dashboard</button></a>
    </main>
  </div>
  
  <?php
  if (isset($_POST['submit'])) {
    $cnx = mysqli_connect("127.0.0.1", "root", "", "dcp");
    if (!$cnx) {
      die("Connection failed: " . mysqli_connect_error());
    }

    
    $date = mysqli_real_escape_string($cnx, $_POST['date']);
    $content = mysqli_real_escape_string($cnx, $_POST['content']);

    $req = "INSERT INTO messages  VALUES ('', '$content','$date')";
    if (mysqli_query($cnx, $req)) {
      echo "<p class='success-msg'>News added successfully!</p>";
    } else {
      echo "<p class='error-msg'>Error: " . mysqli_error($cnx) . "</p>";
    }

    mysqli_close($cnx);
  }
  ?>
</body>
</html>
