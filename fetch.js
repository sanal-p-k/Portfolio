// fetch.js

document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    // Collect form data
    const formData = new FormData(this);
    
    // Send data using fetch
    fetch('forms\contact.php', { // Replace with the correct path to your PHP file
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.text(); // Assuming your PHP returns a simple text response
    })
    .then(data => {
        console.log('Success:', data);
        document.getElementById('output').textContent = 'Message sent successfully!';
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('output').textContent = 'Error sending message: ' + error.message;
    });
});
