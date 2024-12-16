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
    return confirm("Are you sure you want to delete this user?");
}
