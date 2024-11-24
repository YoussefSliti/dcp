<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="admin.css">
</head>
<body>
  <div class="dashboard-container">
    <header class="dashboard-header">
      <h1>Admin Dashboard</h1>
    </header>

    <main class="dashboard-main">
      <section class="dashboard-section">
        <h2>Manage News</h2>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody id="news-table">
            <?php
            $cnx = mysqli_connect("127.0.0.1", "root", "", "dcp");
            if (!$cnx) {
              die("Connection failed: " . mysqli_connect_error());
            }
            
            $req = "SELECT * FROM messages";
            $res = mysqli_query($cnx, $req);
            while ($t = mysqli_fetch_array($res)) {
              $id = htmlspecialchars($t['idmessage']);
              $title = htmlspecialchars($t['message']);
              $date = htmlspecialchars($t['datemessage']);
              echo "<tr>";
              echo "<td>$id</td>";
              echo "<td>$title</td>";
              echo "<td>$date</td>";
              echo "<td>";
              echo "<a href='edit.php?id=$id'><button class='edit-btn'>Edit</button></a>";


              echo "<a href='delete.php?id=$id'><button class='delete-btn'>Delete</button></a>";
              echo "</td>";
              echo "</tr>";
            }
            
            mysqli_close($cnx);
            ?>
          </tbody>
        </table>
        <a href='add.php'><button id="add-news-btn" class="add-btn">Add News</button></a>
      </section>
    </main>
  </div>

  <script src="script.js"></script>
</body>
</html>
