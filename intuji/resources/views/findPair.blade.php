<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Pair</title>
</head>
<body>
    
<label for="numbersInput">Enter Numbers (comma-separated):</label>
    <input type="text" id="numbersInput">

    <label for="targetNumber">Enter Target Number:</label>
    <input type="number" id="targetNumber">

    <button onclick="submitForm()">Submit</button>

    <script>
        function submitForm() {
            // Get the input values
            const inputElement = document.getElementById('numbersInput');
            const inputValue = inputElement.value;
            const targetElement = document.getElementById('targetNumber');
            const targetValue = targetElement.value;

            // Split the input by commas to create an array
            const numbersArray = inputValue.split(',');

            // Create a form dynamically
            const form = document.createElement('form');
            form.method = 'POST'; // Adjust the method as needed
            form.action = "{{route('findPair')}}"; // Adjust the action URL

            // Add @csrf field
            const csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = '{{ csrf_token() }}'; // Add the CSRF token here
            form.appendChild(csrfInput);

            // Create a hidden input field for the array
            const numbersInput = document.createElement('input');
            numbersInput.type = 'hidden';
            numbersInput.name = 'numbers';
            numbersInput.value = JSON.stringify(numbersArray);
            form.appendChild(numbersInput);

            // Create a hidden input field for the target number
            const targetInput = document.createElement('input');
            targetInput.type = 'hidden';
            targetInput.name = 'target';
            targetInput.value = targetValue;
            form.appendChild(targetInput);

            // Append the form to the document body
            document.body.appendChild(form);

            // Submit the form
            form.submit();
        }
    </script>
</body>
</html>