<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email</title>

    <!-- Basic CSS styling -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 24px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 12px;
            margin: 8px 0 16px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .error {
            color: red;
            font-size: 14px;
        }

        .success {
            color: green;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Add Details for Send Email</h1>

        <!-- Email Form -->
        <form action="<?php echo e(url('send-mail')); ?>" method="post" id="emailForm">
            <?php echo csrf_field(); ?>

            <!-- Email Address -->
            <div class="form-group">
                <input type="text" name="to" id="to" placeholder="Enter Email Address" required>
                <span class="error" id="toError"></span>
            </div>

            <!-- Subject -->
            <div class="form-group">
                <input type="text" name="subject" id="subject" placeholder="Enter Email Subject" required>
                <span class="error" id="subjectError"></span>
            </div>

            <!-- Message -->
            <div class="form-group">
                <textarea name="msg" id="msg" placeholder="Type your mail" required></textarea>
                <span class="error" id="msgError"></span>
            </div>

            <!-- Submit Button -->
            <button type="submit">Send Email</button>

            <!-- Success Message -->
            <div class="success" id="successMessage"></div>
        </form>
    </div>

    <!-- JavaScript to handle form validation and submission -->
    <script>
        document.getElementById("emailForm").addEventListener("submit", function(event) {
            event.preventDefault();  // Prevent form submission

            // Clear previous error messages
            document.getElementById("toError").textContent = "";
            document.getElementById("subjectError").textContent = "";
            document.getElementById("msgError").textContent = "";
            document.getElementById("successMessage").textContent = "";

            // Validate fields
            let isValid = true;

            const email = document.getElementById("to").value;
            const subject = document.getElementById("subject").value;
            const message = document.getElementById("msg").value;

            // Validate email address
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (!email.match(emailPattern)) {
                isValid = false;
                document.getElementById("toError").textContent = "Please enter a valid email address.";
            }

            // Validate subject
            if (subject.trim() === "") {
                isValid = false;
                document.getElementById("subjectError").textContent = "Subject cannot be empty.";
            }

            // Validate message
            if (message.trim() === "") {
                isValid = false;
                document.getElementById("msgError").textContent = "Message cannot be empty.";
            }

            // If valid, submit the form (here you can add AJAX to submit without reloading)
            if (isValid) {
                document.getElementById("emailForm").submit();  // This submits the form
                document.getElementById("successMessage").textContent = "Email sent successfully!";
            }
        });
    </script>

</body>
</html>
<?php /**PATH H:\email\resources\views/send-email.blade.php ENDPATH**/ ?>