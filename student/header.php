<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Results</title>
  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --primary: #4361ee;
            --primary-dark: #3a56d4;
            --secondary: #7209b7;
            --accent: #4cc9f0;
            --light: #f8f9fa;
            --dark: #212529;
        }
        
        .navbar {
            background: linear-gradient(135deg, var(--primary), var(--secondary)) !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            padding: 12px 0;
            transition: all 0.3s ease;
        }
        
        .navbar-brand {
            font-size: 1.6rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s ease;
        }
        
        .navbar-brand:hover {
            transform: translateY(-2px);
        }
        
        .brand-icon {
            font-size: 1.8rem;
            animation: bounce 2s infinite;
        }
        
        .nav-user-info {
            display: flex;
            align-items: center;
            gap: 15px;
            color: white;
            margin-right: 20px;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
        }
        
        .user-avatar:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: scale(1.1);
        }
        
        .user-name {
            font-weight: 500;
            font-size: 0.95rem;
        }
        
        .btn-logout {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 8px;
            padding: 8px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-logout:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            color: white;
        }
        
        .nav-divider {
            width: 1px;
            height: 30px;
            background: rgba(255, 255, 255, 0.3);
            margin: 0 15px;
        }
        
        .navbar-toggler {
            border: 2px solid rgba(255, 255, 255, 0.3);
            padding: 5px 10px;
        }
        
        .navbar-toggler:focus {
            box-shadow: none;
        }
        
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
        
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ff4757;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: pulse 2s infinite;
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-5px); }
            60% { transform: translateY(-3px); }
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            padding: 8px 16px !important;
            border-radius: 6px;
            transition: all 0.3s ease;
            margin: 0 2px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .nav-link:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
            color: white !important;
        }
        
        .nav-link.active {
            background: rgba(255, 255, 255, 0.2);
            color: white !important;
        }
        
        .dropdown-menu {
            background: white;
            border: none;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            margin-top: 10px;
        }
        
        .dropdown-item {
            padding: 10px 16px;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .dropdown-item:hover {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            transform: translateX(5px);
        }
        
        @media (max-width: 991.98px) {
            .nav-user-info {
                margin-right: 0;
                margin-bottom: 15px;
                justify-content: center;
                width: 100%;
            }
            
            .nav-divider {
                display: none;
            }
            
            .navbar-nav {
                text-align: center;
                margin: 15px 0;
            }
            
            .nav-link {
                justify-content: center;
                margin: 5px 0;
            }
        }
        
        @media (max-width: 576px) {
            .navbar-brand {
                font-size: 1.4rem;
            }
            
            .brand-icon {
                font-size: 1.6rem;
            }
            
            .user-name {
                display: none;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
  <div class="container">
    <a class="navbar-brand animate__animated animate__fadeInLeft" href="student_dashboard.php">
        <i class="fas fa-graduation-cap brand-icon"></i>
        <span>Student Portal</span>
    </a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item animate__animated animate__fadeInDown">
                <a class="nav-link active" href="student_dashboard.php">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item animate__animated animate__fadeInDown" style="animation-delay: 0.1s">
                <a class="nav-link" href="results.php">
                    <i class="fas fa-chart-bar"></i>
                    Results
                </a>
            </li>
            <li class="nav-item animate__animated animate__fadeInDown" style="animation-delay: 0.2s">
                <a class="nav-link" href="profile.php">
                    <i class="fas fa-user"></i>
                    Profile
                </a>
            </li>
            <li class="nav-item dropdown animate__animated animate__fadeInDown" style="animation-delay: 0.3s">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                    <i class="fas fa-cog"></i>
                    Settings
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="change_password.php">
                        <i class="fas fa-key"></i> Change Password
                    </a></li>
                    <li><a class="dropdown-item" href="notifications.php">
                        <i class="fas fa-bell"></i> Notifications
                        <span class="notification-badge">3</span>
                    </a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="help.php">
                        <i class="fas fa-question-circle"></i> Help & Support
                    </a></li>
                </ul>
            </li>
        </ul>
        
        <div class="d-flex align-items-center">
            <div class="nav-user-info animate__animated animate__fadeInRight">
                <div class="user-avatar">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div class="user-name">
                    <?php 
                    if(isset($_SESSION['student_name'])) {
                        echo htmlspecialchars($_SESSION['student_name']);
                    } else {
                        echo "Student";
                    }
                    ?>
                </div>
            </div>
            
            <div class="nav-divider d-none d-lg-block"></div>
            
            <a href="logout.php" class="btn btn-logout animate__animated animate__fadeInRight" style="animation-delay: 0.1s">
                <i class="fas fa-sign-out-alt"></i>
                <span class="d-none d-md-inline">Logout</span>
            </a>
        </div>
    </div>
  </div>
</nav>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Add scroll effect to navbar
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.style.padding = '8px 0';
            navbar.style.boxShadow = '0 4px 15px rgba(0, 0, 0, 0.2)';
        } else {
            navbar.style.padding = '12px 0';
            navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.15)';
        }
    });
    
    // Add active class to current page
    document.addEventListener('DOMContentLoaded', function() {
        const currentLocation = window.location.href;
        const navLinks = document.querySelectorAll('.nav-link');
        
        navLinks.forEach(link => {
            if(link.href === currentLocation) {
                link.classList.add('active');
            }
        });
    });
</script>

</body>
</html>