<style>
  .identife {
    font-size: 1.5rem;
    font-weight: bold;
    color: white;
    margin: 20px 0; 
    text-align: center; 
    text-transform: capitalize;
    letter-spacing: 1px; 
}

</style>
<nav>
    <div class="navbar">
      <div class="logo"><a href="#">Emp1re</a></div>
      <div class="identite">
        <?php 
        echo "<h4 class='identife'>".$_SESSION['user_name']." ".$_SESSION['user_family_name']."</h4>";
        ?>
      </div>
      <ul class="menu">
        <li><a href="../../Pages/HomePage/Admin.php">Home</a></li>
        <li><a href="../../Pages/News/admin.php">News</a></li>
        <li><a href="../../Pages/CategoriesPage/Category.html">Category</a></li>
        <li><a href="../../Pages/AboutPage/AboutPage.html">About</a></li>
        <li><a href="../../Pages/ContactPage/ContactPage.html">Contact</a></li>
      </ul>
    </div>
  </nav>