<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student - Classroom Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
     <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3126/3126533.png" type="image/png">
    <style>
        :root {
            --primary: #4361ee;
            --primary-light: #4895ef;
            --secondary: #7209b7;
            --accent: #4cc9f0;
            --success: #4bb543;
            --warning: #f8961e;
            --danger: #e63946;
            --light: #f8f9fa;
            --dark: #212529;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .form-container {
            width: 100%;
            max-width: 500px;
            animation: fadeInUp 0.8s ease-out;
        }
        
        .form-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            transition: all 0.4s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .form-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4);
        }
        
        .form-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 40px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .form-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="0.1" d="M0,128L48,144C96,160,192,192,288,186.7C384,181,480,139,576,138.7C672,139,768,181,864,181.3C960,181,1056,139,1152,138.7C1248,139,1344,181,1392,202.7L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
            background-size: cover;
            background-position: bottom;
        }
        
        .form-header-content {
            position: relative;
            z-index: 1;
        }
        
        .form-icon {
            font-size: 4rem;
            margin-bottom: 20px;
            display: block;
            animation: bounce 2s infinite;
            filter: drop-shadow(0 4px 8px rgba(0,0,0,0.2));
        }
        
        .form-body {
            padding: 40px 30px;
        }
        
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }
        
        .form-label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: var(--dark);
            transition: color 0.3s;
            font-size: 1.1rem;
        }
        
        .input-with-icon {
            position: relative;
        }
        
        .form-control {
            width: 100%;
            padding: 16px 20px 16px 55px;
            border: 2px solid #e1e5ee;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s;
            background-color: #f8f9fa;
            font-weight: 500;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            background-color: white;
            box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.15);
            outline: none;
            transform: translateY(-2px);
        }
        
        .input-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary);
            font-size: 1.3rem;
            transition: color 0.3s;
        }
        
        .form-control:focus + .input-icon {
            color: var(--secondary);
            animation: shake 0.5s ease-in-out;
        }
        
        .btn-submit {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-top: 10px;
            position: relative;
            overflow: hidden;
        }
        
        .btn-submit::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: 0.5s;
        }
        
        .btn-submit:hover::before {
            left: 100%;
        }
        
        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(67, 97, 238, 0.4);
            background: linear-gradient(135deg, var(--primary-dark), var(--secondary));
        }
        
        .btn-submit:active {
            transform: translateY(-1px);
        }
        
        .success-message {
            background: linear-gradient(135deg, rgba(75, 181, 67, 0.1), rgba(75, 181, 67, 0.05));
            color: var(--success);
            border: 1px solid rgba(75, 181, 67, 0.2);
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 25px;
            animation: slideInDown 0.5s ease-out;
            box-shadow: 0 4px 15px rgba(75, 181, 67, 0.1);
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .floating-shapes {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }
        
        .shape {
            position: absolute;
            opacity: 0.1;
            border-radius: 50%;
            animation: float 15s infinite ease-in-out;
        }
        
        .shape-1 {
            width: 200px;
            height: 200px;
            background: var(--accent);
            top: 10%;
            left: 5%;
            animation-delay: 0s;
        }
        
        .shape-2 {
            width: 150px;
            height: 150px;
            background: white;
            top: 60%;
            right: 10%;
            animation-delay: 2s;
            animation-duration: 12s;
        }
        
        .shape-3 {
            width: 100px;
            height: 100px;
            background: var(--success);
            bottom: 20%;
            left: 15%;
            animation-delay: 4s;
            animation-duration: 10s;
        }
        
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px) scale(0.95); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg) scale(1); }
            33% { transform: translateY(-20px) rotate(10deg) scale(1.05); }
            66% { transform: translateY(10px) rotate(-5deg) scale(0.95); }
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }
        
        @keyframes slideInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .password-toggle {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #6c757d;
            cursor: pointer;
            transition: color 0.3s;
            font-size: 1.2rem;
        }
        
        .password-toggle:hover {
            color: var(--primary);
            transform: translateY(-50%) scale(1.1);
        }
        
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: white;
            text-decoration: none;
            font-weight: 500;
            margin-bottom: 25px;
            transition: all 0.3s;
            background: rgba(255, 255, 255, 0.2);
            padding: 10px 20px;
            border-radius: 50px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .back-link:hover {
            color: white;
            background: rgba(255, 255, 255, 0.3);
            transform: translateX(-5px);
            text-decoration: none;
        }
        
        .form-footer {
            text-align: center;
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid #e1e5ee;
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .pulse-effect {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(67, 97, 238, 0.4); }
            70% { box-shadow: 0 0 0 15px rgba(67, 97, 238, 0); }
            100% { box-shadow: 0 0 0 0 rgba(67, 97, 238, 0); }
        }
        
        @media (max-width: 576px) {
            .form-card {
                border-radius: 15px;
            }
            
            .form-header {
                padding: 30px 20px;
            }
            
            .form-body {
                padding: 30px 20px;
            }
            
            .form-control {
                padding: 14px 15px 14px 50px;
            }
            
            .btn-submit {
                padding: 16px;
            }
            
            .form-icon {
                font-size: 3.5rem;
            }
        }
        
        .strength-meter {
            height: 5px;
            border-radius: 5px;
            margin-top: 8px;
            background: #e9ecef;
            overflow: hidden;
            position: relative;
        }
        
        .strength-fill {
            height: 100%;
            width: 0%;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        
        .strength-weak { background: var(--danger); width: 33%; }
        .strength-medium { background: var(--warning); width: 66%; }
        .strength-strong { background: var(--success); width: 100%; }
        
        .strength-text {
            font-size: 0.8rem;
            margin-top: 5px;
            text-align: right;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="floating-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
    </div>
    
    <div class="form-container">
        <a href="admin_dashboard.php" class="back-link animate__animated animate__fadeInLeft">
            <i class="fas fa-arrow-left"></i> Back to Dashboard
        </a>
        
        <div class="form-card animate__animated animate__fadeInUp">
            <div class="form-header">
                <div class="form-header-content">
                    <i class="fas fa-user-plus form-icon"></i>
                    <h2>Add New Student</h2>
                    <p class="mb-0">Register student to the classroom system</p>
                </div>
            </div>
            
            <div class="form-body">
                <form method="POST" id="studentForm">
                    <div class="form-group">
                        <label class="form-label" for="name">
                            <i class="fas fa-user me-2"></i>Full Name
                        </label>
                        <div class="input-with-icon">
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter student's full name" required value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
                            <i class="fas fa-user input-icon"></i>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="email">
                            <i class="fas fa-envelope me-2"></i>Email Address
                        </label>
                        <div class="input-with-icon">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter student's email" required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                            <i class="fas fa-envelope input-icon"></i>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="password">
                            <i class="fas fa-key me-2"></i>Password
                        </label>
                        <div class="input-with-icon">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Create secure password" required oninput="checkPasswordStrength(this.value)">
                            <i class="fas fa-lock input-icon"></i>
                            <button type="button" class="password-toggle" id="togglePassword">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div class="strength-meter">
                            <div class="strength-fill" id="strengthFill"></div>
                        </div>
                        <div class="strength-text" id="strengthText">Password strength</div>
                    </div>
                    
                    <?php
                    if(isset($_POST['save'])){
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $pass = md5($_POST['password']);

                        // Check if email already exists
                        $check_email = mysqli_query($conn, "SELECT * FROM students WHERE email='$email'");
                        if(mysqli_num_rows($check_email) > 0) {
                            echo '<div class="alert alert-danger animate__animated animate__shakeX">
                                    <i class="fas fa-exclamation-triangle me-2"></i> 
                                    <strong>Error:</strong> Email already exists in the system.
                                  </div>';
                        } else {
                            mysqli_query($conn, "INSERT INTO students(name,email,password) VALUES('$name','$email','$pass')");
                            echo '<div class="success-message">
                                    <i class="fas fa-check-circle fa-lg"></i>
                                    <div>
                                        <strong>Success!</strong> Student has been added successfully.
                                    </div>
                                  </div>';
                        }
                    }
                    ?>
                    
                    <button type="submit" name="save" class="btn-submit pulse-effect">
                        <i class="fas fa-user-plus"></i> 
                        <span>Add Student</span>
                    </button>
                </form>
                
                <div class="form-footer">
                    <p class="mb-0">
                        <i class="fas fa-shield-alt me-1"></i>
                        Student data is securely stored and encrypted
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
        
        // Password strength checker
        function checkPasswordStrength(password) {
            const strengthFill = document.getElementById('strengthFill');
            const strengthText = document.getElementById('strengthText');
            
            let strength = 0;
            let text = '';
            let colorClass = '';
            
            if (password.length >= 8) strength++;
            if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength++;
            if (password.match(/\d/)) strength++;
            if (password.match(/[^a-zA-Z\d]/)) strength++;
            
            switch(strength) {
                case 0:
                case 1:
                    text = 'Weak';
                    colorClass = 'strength-weak';
                    break;
                case 2:
                case 3:
                    text = 'Medium';
                    colorClass = 'strength-medium';
                    break;
                case 4:
                    text = 'Strong';
                    colorClass = 'strength-strong';
                    break;
            }
            
            strengthFill.className = 'strength-fill ' + colorClass;
            strengthText.textContent = text;
        }
        
        // Form validation
        document.getElementById('studentForm').addEventListener('submit', function(e) {
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            
            if (!name || !email || !password) {
                e.preventDefault();
                if (!name) {
                    document.getElementById('name').style.borderColor = 'var(--danger)';
                    document.getElementById('name').focus();
                }
                if (!email && name) {
                    document.getElementById('email').style.borderColor = 'var(--danger)';
                    document.getElementById('email').focus();
                }
                if (!password && name && email) {
                    document.getElementById('password').style.borderColor = 'var(--danger)';
                    document.getElementById('password').focus();
                }
            }
        });
        
        // Reset border color on focus
        document.getElementById('name').addEventListener('focus', function() {
            this.style.borderColor = '#e1e5ee';
        });
        
        document.getElementById('email').addEventListener('focus', function() {
            this.style.borderColor = '#e1e5ee';
        });
        
        document.getElementById('password').addEventListener('focus', function() {
            this.style.borderColor = '#e1e5ee';
        });
        
        // Add typing animation effect
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.form-control');
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    if (this.value.length > 0) {
                        this.style.background = 'linear-gradient(90deg, #f8f9fa 95%, var(--primary) 100%)';
                    } else {
                        this.style.background = '#f8f9fa';
                    }
                });
            });
        });
    </script>
</body>
</html>