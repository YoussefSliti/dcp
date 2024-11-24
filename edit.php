
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Edit News</title>
</head>
<body>
    <h1>Edit News</h1>
    <form action="edit_action.php" method="POST">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id']); ?>">

        <label for="news-content">Content:</label>
        <textarea id="news-content" name="content"></textarea>

        <br>
        <label for="news-date">Date:</label>
        <input type="date" id="news-date" name="date">
        <br>
        <button type="submit" name="submit">Save Changes</button>
    </form>
    <style>
      /* General Reset */
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    color: #333;
}

/* Container */
.container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Header */
h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #4CAF50;
}

/* Form */
form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

label {
    font-weight: bold;
}

textarea, input[type="date"], button {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    width: 100%;
}

/* Buttons */
button {
    cursor: pointer;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #45a049;
}

/* Back to Dashboard Button */
.back-btn {
    margin-top: 20px;
    display: inline-block;
    padding: 10px 15px;
    background: #2196F3;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    text-align: center;
    transition: background-color 0.3s;
}

.back-btn:hover {
    background: #1976D2;
}

/* Success/Error Messages */
.message {
    padding: 15px;
    margin: 20px 0;
    border-radius: 5px;
    font-weight: bold;
}

.message.success {
    background-color: #dff0d8;
    color: #3c763d;
}

.message.error {
    background-color: #f2dede;
    color: #a94442;
}

    </style>
</body>
</html>

