<?php 
include '../app/views/user/layout/header.php';
?>
<main>
<form  id="myForm1" method="post">

<label for="surname">Name:</label>
<input type="text" id="surname" name="name" required>
<span id="surnameError" class="error" style="color: red;"></span><br>

<label for="email">Email:</label>
<input type="email" id="email" name="email" required>
<span id="emailError" class="error" style="color: red;"></span><br>

<label for="mobile">Mobile Number:</label>
<input type="text" id="mobile" name="mobile" required>
<span id="mobileError" class="error" style="color: red;"></span><br>

<input type="submit" id="submitBtn" value="Submit">
</form>
</main>
<?php 
include '../app/views/user/layout/footer.php';
?>