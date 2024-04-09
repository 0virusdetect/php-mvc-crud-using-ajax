<?php 
include '../app/views/user/layout/header.php';
?>
<main>
<form id="myForm" method="post">
<label for="name">Name:</label>
<input required type="text" name="insert_name" id="name1"><br>
<label for="email">email:</label>
<input required type="text" name="insert_email" id="email1"><br>
<label for="mobile_number">Mobile Number:</label>
<input required type="text" name="insert_mobile_number" id="mobile_number1"><br>
<input type="submit" value="Submit">
</form>
</main>
<?php 
include '../app/views/user/layout/footer.php';
?>