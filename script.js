// Function to format and display the current date
function displayDate() {
    const dateElement = document.getElementById('date-display');
    const now = new Date();
    const formattedDate = now.toLocaleDateString('en-US', {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
    dateElement.textContent = formattedDate;
}

// Call the function when the page loads
window.onload = displayDate;

// Function to confirm user deletion
function confirmDeleteUser() {
    var isConfirmed = confirm("Are you sure you want to delete this user?");
    
    if (isConfirmed) {
        alert("User has been deleted!"); 
        return true; 
    }
    
    return false; 
}

function confirmAddUser() {
    var isConfirmed = confirm("Are you sure you want to add this user?");
    
    if (isConfirmed) {
        alert("User has been added!"); 
        return true; 
    }
    
    return false; 
}

function confirmEditUser() {
    var isConfirmed = confirm("Are you sure you want to make changes to user?");
    
    if (isConfirmed) {
        alert("User record has been updated!"); 
        return true; 
    }
    
    return false; 
}