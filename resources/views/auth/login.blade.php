<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .role-buttons button {
            margin: 5px 0;
            width: 100%;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .btn-primary:disabled {
            background-color: #d6d6d6;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="text-center mb-4">
            <img src="{{ asset('images/logo_posyandu.png') }}" alt="Logo Posyandu" width="100">
            <h4>Posyandu Desa Kadugenep</h4>
        </div>
        
        <form method="POST" action="{{ route('login.process') }}" id="loginForm">
            @csrf
            <input type="hidden" id="role" name="role" value="">
            
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan Username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password" required>
            </div>
            
            <div class="role-buttons">
                <button type="button" class="btn btn-outline-primary role-btn" data-role="admin">Admin</button>
                <button type="button" class="btn btn-outline-success role-btn" data-role="kader">Kader</button>
                <button type="button" class="btn btn-outline-info role-btn" data-role="ibu_balita">Ibu Balita</button>
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3" id="submitButton" disabled>Masuk</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const roleButtons = document.querySelectorAll('.role-btn');
        const roleInput = document.getElementById('role');
        const submitButton = document.getElementById('submitButton');
        const form = document.getElementById('loginForm');

        roleButtons.forEach(button => {
            button.addEventListener('click', function() {
                roleButtons.forEach(btn => btn.classList.remove('active')); // Reset active state
                this.classList.add('active');
                roleInput.value = this.getAttribute('data-role'); // Set hidden input value
                checkFormValidity(); // Check if form can be submitted
            });
        });

        form.addEventListener('input', checkFormValidity);

        function checkFormValidity() {
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value.trim();
            const role = roleInput.value.trim();
            submitButton.disabled = !(username && password && role); // Enable/disable button
        }
    </script>
</body>
</html>
