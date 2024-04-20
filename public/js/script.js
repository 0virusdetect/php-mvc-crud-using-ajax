console.log('hello');

function showMessageCard(message, duration) {
var messageCard = $('<div class="message-card"></div>').text(message);
$('body').append(messageCard);
setTimeout(function() {
messageCard.remove();
}, duration);
}
var base = "mvc_ajax_crud";
// var base = "https://zerovirusdetect.000webhostapp.com";
// insert data h
$('#myForm').submit(function(e) {
e.preventDefault();
$.ajax({
type: 'POST',
url: base +'/inserted',
data: $(this).serialize(),
success: function(response) {
showMessageCard("Inserted Successfully", 1000);
$('#myForm')[0].reset();
},
error: function(xhr, status, error) {
console.error(xhr.responseText);
}
});
});

function refreshData() {
$.ajax({
type: 'GET',
url: base +'/fetch_display',
success: function(response) {
$('#dataContainer').html(response);
},
error: function(xhr, status, error) {
console.error(xhr.responseText);
}
});
}
// update data in the form
function editRow(id, row) {
var popup = document.getElementById('editForm');
var name = $(row).find('span:eq(0)').text().trim();
var email = $(row).find('span:eq(1)').text().trim();
var mobile = $(row).find('span:eq(2)').text().trim();
$('#editUserId').val(id);
$('#editName').val(name);
$('#editEmail').val(email);
$('#editMobile').val(mobile);
if (popup.style.display === 'none' || popup.style.display === '') {
popup.style.display = 'block';
} else {
popup.style.display = 'none';
}
}
// update data final 
$(document).ready(function() {
refreshData(); // Initial loading of data
// AJAX for updating user data
$('#editUserForm').submit(function(e) {
e.preventDefault();
var formData = $(this).serialize();
$.ajax({
type: 'POST',
url: base +'/edit_final',
data: formData,
success: function(response) {
showMessageCard("Updated Successfully", 3000);
// Hide edit form after successful update
$('#editForm').hide();
// Refresh data after updating
refreshData();
},
error: function(xhr, status, error) {
console.error(xhr.responseText);
}
});
});
});


// Function to delete a user
function refreshData1() {
$.ajax({
type: 'GET',
url: base +'/delete_fetch',
success: function(response) {
$('#dataContainer1').html(response);
},
error: function(xhr, status, error) {
console.error(xhr.responseText);
}
});
}
refreshData1();
function deleteUser(id) {
if (confirm("Are you sure you want to delete this user?")) {
$.ajax({
type: 'POST',
url: base +'/deleted', // Update with actual URL
data: {
id: id
},
success: function(response) {
showMessageCard("Deleted successfully", 3000);
refreshData1();
},
error: function(xhr, status, error) {
console.error(xhr.responseText);
}
});
}
}


// validation for email,name,mobile_number starts
$(document).ready(function() {
var emailValid = false; // Track email validation status
var mobileValid = false; // Track mobile number validation status
var surNameValid = false; // Track surname validation status

// Email validation
$('#email').on('input', function() {
var email = $(this).val();
$.ajax({
type: 'POST',
url: base +'/check_email',
data: {email: email},
success: function(response) {
if (response == 'taken') {
$('#emailError').text('Email already exists').addClass('error');
emailValid = false; // Set email validation status to false
} else {
$('#emailError').text('true').removeClass('error');
emailValid = true; // Set email validation status to true
}
updateSubmitButtonStatus();
}
});
});

// Mobile number validation
$('#mobile').on('input', function() {
var mobile = $(this).val();
// Check if mobile number is empty
if (mobile === '') {
$('#mobileError').text('Mobile number cannot be empty').addClass('error');
mobileValid = false; // Set mobile number validation status to false
updateSubmitButtonStatus();
return; // Exit the function if mobile number is empty
}
// Check if mobile number length is not equal to 10
if (mobile.length !== 10) {
$('#mobileError').text('Mobile number should be 10 digits').addClass('error');
mobileValid = false; // Set mobile number validation status to false
updateSubmitButtonStatus();
return; // Exit the function if mobile number length is not 10
}
$.ajax({
type: 'POST',
url: base +'/check_mobile',
data: {mobile: mobile},
success: function(response) {
if (response == 'taken') {
$('#mobileError').text('Mobile number already exists').addClass('error');
mobileValid = false; // Set mobile number validation status to false
}  else {
$('#mobileError').text('true').removeClass('error');
mobileValid = true; // Set mobile number validation status to true
}
updateSubmitButtonStatus();
}
});
});

// Surname validation
$('#surname').on('input', function() {
var surname = $(this).val().trim();
if (surname === '') {
$('#surnameError').text('false').addClass('error');
surNameValid = false;
} else if (surname.length < 3) {
$('#surnameError').text('surname should be atleast 3 letters').addClass('error');
surNameValid = false;
} 
else {
$('#surnameError').text('true').removeClass('error');
surNameValid = true;
}
updateSubmitButtonStatus();
});


// Update validation status when email input field changes
$('#email').on('change', function() {
updateSubmitButtonStatus();
});

// Update validation status when mobile input field changes
$('#mobile').on('change', function() {
updateSubmitButtonStatus();
});

// Update validation status when surname input field changes
$('#surname').on('change', function() {
updateSubmitButtonStatus();
});

function updateSubmitButtonStatus() {
if (emailValid && mobileValid && surNameValid) {
$('#submitBtn').prop('disabled', false); // Enable submit button if all validations pass
} else {
$('#submitBtn').prop('disabled', true); // Disable submit button otherwise
}
}
});
// validation for email,name,mobile_number ends

// insert data 
$('#myForm1').submit(function(e) {
e.preventDefault();
$.ajax({
type: 'POST',
url: base +'/signup_inserted',
data: $(this).serialize(),
success: function(response) {
showMessageCard("Inserted Successfully", 1000);
$('#myForm1')[0].reset();
},
error: function(xhr, status, error) {
console.error(xhr.responseText);
}
});
});