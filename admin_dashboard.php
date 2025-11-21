<?php 
// Start session and check admin authentication
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Classroom Marks System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
     <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3126/3126533.png" type="image/png">
    <style>
        :root {
            --primary: #4361ee;
            --primary-dark: #3a56d4;
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
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        
        /* Header Styles */
        .navbar {
            background: linear-gradient(135deg, var(--primary), var(--secondary)) !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            padding: 15px 0;
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
            width: 45px;
            height: 45px;
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
        
        /* Dashboard Styles */
        .dashboard-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 40px 0;
            margin-bottom: 40px;
            border-radius: 0 0 25px 25px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            position: relative;
            overflow: hidden;
        }
        
        .dashboard-header::before {
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
        
        .dashboard-content {
            position: relative;
            z-index: 1;
        }
        
        .welcome-text {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 10px;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 50px;
        }
        
        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
        }
        
        .stat-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .stat-icon {
            font-size: 3rem;
            margin-bottom: 20px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 10px;
        }
        
        .stat-label {
            font-size: 1.1rem;
            color: #6c757d;
            font-weight: 500;
        }
        
        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }
        
        .action-card {
            background: white;
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            position: relative;
            overflow: hidden;
        }
        
        .action-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
        }
        
        .action-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }
        
        .action-icon {
            font-size: 4rem;
            margin-bottom: 25px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            transition: all 0.3s ease;
        }
        
        .action-card:hover .action-icon {
            transform: scale(1.1) rotate(5deg);
        }
        
        .action-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 15px;
        }
        
        .action-description {
            color: #6c757d;
            margin-bottom: 25px;
            line-height: 1.6;
        }
        
        .btn-action {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            border-radius: 12px;
            padding: 14px 30px;
            font-size: 1.1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }
        
        .btn-action:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(67, 97, 238, 0.3);
            color: white;
        }
        
        /* Footer Styles */
        .footer {
            background: linear-gradient(135deg, #1a1a1a, #2d3748);
            color: white;
            padding: 50px 0 20px;
            margin-top: 80px;
            position: relative;
        }
        
        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--primary), var(--accent), var(--secondary));
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }
        
        .footer-brand {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s ease;
            display: block;
            margin-bottom: 8px;
        }
        
        .footer-links a:hover {
            color: white;
            transform: translateX(5px);
        }
        
        .contact-item {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
            color: rgba(255, 255, 255, 0.7);
        }
        
        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-links a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            color: white;
            text-decoration: none;
        }
        
        .social-links a:hover {
            background: var(--primary);
            transform: translateY(-3px);
        }
        
        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.6);
        }
        
        /* Animations */
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-8px); }
            60% { transform: translateY(-4px); }
        }
        
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }
        
        .animate-on-scroll.animated {
            opacity: 1;
            transform: translateY(0);
        }
        
        .floating-shapes {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }
        
        .shape {
            position: absolute;
            opacity: 0.1;
            border-radius: 50%;
            animation: float 15s infinite ease-in-out;
        }
        
        .shape-1 {
            width: 150px;
            height: 150px;
            background: var(--accent);
            top: 10%;
            right: 5%;
        }
        
        .shape-2 {
            width: 100px;
            height: 100px;
            background: white;
            bottom: 20%;
            left: 10%;
            animation-delay: 2s;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(10deg); }
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .dashboard-header {
                padding: 30px 0;
                border-radius: 0 0 20px 20px;
            }
            
            .stats-grid,
            .actions-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .stat-card,
            .action-card {
                padding: 25px 20px;
            }
            
            .action-icon {
                font-size: 3rem;
            }
            
            .navbar-brand span {
                display: none;
            }
            
            .nav-user-info .user-name {
                display: none;
            }
        }
        
        @media (max-width: 576px) {
            .dashboard-header h1 {
                font-size: 2rem;
            }
            
            .welcome-text {
                font-size: 1rem;
            }
            
            .stat-number {
                font-size: 2rem;
            }
            
            .action-title {
                font-size: 1.3rem;
            }
            
            .btn-action {
                padding: 12px 25px;
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="admin_dashboard.php">
                <i class="fas fa-user-shield brand-icon"></i>
                <span>Admin Portal</span>
            </a>
            
            <div class="d-flex align-items-center">
                <div class="nav-user-info">
                    <div class="user-avatar">
                        <i class="fas fa-user-cog"></i>
                    </div>
                    <div class="user-name">
                        <?php echo isset($_SESSION['admin_name']) ? htmlspecialchars($_SESSION['admin_name']) : 'Administrator'; ?>
                    </div>
                </div>
                
                <a href="logout_admin.php" class="btn btn-logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="d-none d-md-inline">Logout</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <div class="floating-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
        </div>
        <div class="container dashboard-content">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-3 animate__animated animate__fadeInDown">
                        Admin Dashboard
                    </h1>
                    <p class="welcome-text animate__animated animate__fadeIn animate__delay-1s">
                        Welcome back, <?php echo isset($_SESSION['admin_name']) ? htmlspecialchars($_SESSION['admin_name']) : 'Administrator'; ?>! 
                        Manage your educational institution with powerful tools.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <div class="bg-white rounded-pill px-4 py-2 d-inline-block animate__animated animate__zoomIn animate__delay-1s">
                        <small class="text-primary fw-bold">
                            <i class="fas fa-circle text-success me-1"></i>
                            System Online
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dashboard Content -->
    <div class="container">
        <!-- Statistics Cards -->
        <div class="stats-grid">
            <div class="stat-card animate-on-scroll">
                <i class="fas fa-user-graduate stat-icon"></i>
                <div class="stat-number">0</div>
                <div class="stat-label">Total Students</div>
            </div>
            
            <div class="stat-card animate-on-scroll">
                <i class="fas fa-book stat-icon"></i>
                <div class="stat-number">0</div>
                <div class="stat-label">Subjects</div>
            </div>
            
            <div class="stat-card animate-on-scroll">
                <i class="fas fa-chart-bar stat-icon"></i>
                <div class="stat-number">0</div>
                <div class="stat-label">Marks Entered</div>
            </div>
            
            <div class="stat-card animate-on-scroll">
                <i class="fas fa-clipboard-list stat-icon"></i>
                <div class="stat-number">0</div>
                <div class="stat-label">Exams Conducted</div>
            </div>
        </div>

        <!-- Action Cards -->
        <div class="actions-grid">
            <div class="action-card animate-on-scroll">
                <i class="fas fa-user-plus action-icon"></i>
                <h3 class="action-title">Add Student</h3>
                <p class="action-description">
                    Register new students to the system with their personal and academic details.
                </p>
                <a href="add_student.php" class="btn-action">
                    <i class="fas fa-plus-circle"></i>
                    Add Student
                </a>
            </div>
            
            <div class="action-card animate-on-scroll">
                <i class="fas fa-book-medical action-icon"></i>
                <h3 class="action-title">Add Subject</h3>
                <p class="action-description">
                    Create new subjects and manage the curriculum for different classes and streams.
                </p>
                <a href="add_subject.php" class="btn-action">
                    <i class="fas fa-plus-circle"></i>
                    Add Subject
                </a>
            </div>
            
            <div class="action-card animate-on-scroll">
                <i class="fas fa-chart-line action-icon"></i>
                <h3 class="action-title">Add Marks</h3>
                <p class="action-description">
                    Enter examination marks for students and generate performance reports.
                </p>
                <a href="add_mark.php" class="btn-action">
                    <i class="fas fa-plus-circle"></i>
                    Add Marks
                </a>
            </div>
            
            <div class="action-card animate-on-scroll">
                <i class="fas fa-cog action-icon"></i>
                <h3 class="action-title">System Settings</h3>
                <p class="action-description">
                    Configure system preferences, user permissions, and academic settings.
                </p>
                <a href="settings.php" class="btn-action">
                    <i class="fas fa-sliders-h"></i>
                    Manage Settings
                </a>
            </div>
            
            <div class="action-card animate-on-scroll">
                <i class="fas fa-file-export action-icon"></i>
                <h3 class="action-title">Reports</h3>
                <p class="action-description">
                    Generate comprehensive reports, analytics, and performance insights.
                </p>
                <a href="reports.php" class="btn-action">
                    <i class="fas fa-chart-pie"></i>
                    View Reports
                </a>
            </div>
            
            <div class="action-card animate-on-scroll">
                <i class="fas fa-users-cog action-icon"></i>
                <h3 class="action-title">User Management</h3>
                <p class="action-description">
                    Manage user accounts, permissions, and access controls for the system.
                </p>
                <a href="user_management.php" class="btn-action">
                    <i class="fas fa-user-cog"></i>
                    Manage Users
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div>
                    <div class="footer-brand">
                        <i class="fas fa-graduation-cap"></i>
                        Classroom Marks System
                    </div>
                    <p class="text-light mb-3">
                        Empowering educational institutions with comprehensive student performance tracking and management solutions.
                    </p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                
                <div>
                    <h5 class="text-white mb-3">Quick Links</h5>
                    <div class="footer-links">
                        <a href="admin_dashboard.php">Dashboard</a>
                        <a href="add_student.php">Add Student</a>
                        <a href="add_subject.php">Add Subject</a>
                        <a href="add_mark.php">Add Marks</a>
                        <a href="reports.php">Reports</a>
                    </div>
                </div>
                
                <div>
                    <h5 class="text-white mb-3">Contact Info</h5>
                    <div class="contact-item">
                        <i class="fas fa-phone text-primary"></i>
                        <span>+94 74 089 0730</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope text-primary"></i>
                        <span>support@alphasoftware.lk</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt text-primary"></i>
                        <span>12/D/2, High Level Road, Thunnana, Hanwella</span>
                    </div>
                </div>
            </div>
            
            <div class="copyright">
                <p class="mb-0">
                    © <?php echo date("Y"); ?> Classroom Marks System. All Rights Reserved. | 
                    Developed by <span class="text-warning">Team Alpha Software Solutions</span>
                </p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Animation on scroll
        document.addEventListener('DOMContentLoaded', function() {
            const animatedElements = document.querySelectorAll('.animate-on-scroll');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animated');
                    }
                });
            }, {
                threshold: 0.1
            });
            
            animatedElements.forEach(element => {
                observer.observe(element);
            });
            
            // Add scroll effect to navbar
            window.addEventListener('scroll', function() {
                const navbar = document.querySelector('.navbar');
                if (window.scrollY > 50) {
                    navbar.style.padding = '10px 0';
                    navbar.style.boxShadow = '0 4px 15px rgba(0, 0, 0, 0.2)';
                } else {
                    navbar.style.padding = '15px 0';
                    navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.15)';
                }
            });
        });
    </script>
</body>
</html>