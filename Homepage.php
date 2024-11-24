<?php
session_start();


if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$user_name = $_SESSION['user_name'];
$user_family_name = $_SESSION['user_family_name'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
   <meta charset="UTF-8">
   <title>Navigation Bar With Scroll Every Section</title>
 <link rel="stylesheet" href="../../Navigation/TopNavBar/style.css">
 <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="./script.js" defer></script>
   </head>
<body>
  <?php 
    include('../../Navigation/TopNavBar/TopNavBar.php');
   
  ?>

  <div class="main-banner-container">
          <img src="../../public/photo1.jpg" id="main-banner" class="main-image" />
  </div>

  <div class="main-cards-container">
  <script>
    document.addEventListener("DOMContentLoaded", () => {
   
    fetch('./main-games.json') 
        .then(response => response.json())
        .then(data => {
            
            const container = document.querySelector('.main-cards-container');

            
            data.forEach(item => {
                
                const card = document.createElement('div');
                card.classList.add('card');
                const img = document.createElement('img');
                img.src = item.photo;
                img.alt = item.name;
                img.classList.add('card-image');
                const title = document.createElement('h4');
                title.textContent = item.name;
                title.classList.add('card-title');
                const description = document.createElement('p');
                description.textContent = item.description;
                description.classList.add('card-description');
                card.appendChild(img);
                card.appendChild(title);
                card.appendChild(description);
                container.appendChild(card);
            });
        })
        .catch(error => {
            console.error('Error fetching the JSON file:', error);
        });
});

  </script>
  </div>

  <?php 
    include("../../Navigation/BottomNavBar/BottomNavBar.html");
  
  ?>
</body>
</html>