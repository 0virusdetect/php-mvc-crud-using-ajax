<?php 
include '../app/views/user/layout/header.php';
?>
<main>
<div id="dataContainer"></div>

<!-- Edit Form (hidden by default) -->
<div class="e_editForm" id="editForm" style="display: none;">
<h2>Edit User</h2>
<form id="editUserForm">
<input type="hidden" id="editUserId" name="id">
Name: <input required type="text" id="editName" name="name">
Email: <input required type="text" id="editEmail" name="email"><br>
Mobile Number: <input required type="text" id="editMobile" name="mobile">
<input type="submit" value="Update">
</form>
</div>
</main>
<?php 
include '../app/views/user/layout/footer.php';
?>