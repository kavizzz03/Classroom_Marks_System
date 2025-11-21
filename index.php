<?php include "header.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classroom Marks System</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Animate.css for animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3126/3126533.png" type="image/png">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4cc9f0;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --success-color: #4bb543;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }
        
        .hero-section {
            padding: 120px 20px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
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
        
        .hero-content {
            position: relative;
            z-index: 1;
        }
        
        .btn-custom {
            width: 200px;
            padding: 14px;
            font-size: 18px;
            border-radius: 50px;
            transition: all 0.3s ease;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            margin: 10px;
        }
        
        .btn-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }
        
        .btn-admin {
            background: white;
            color: var(--primary-color);
            border: 2px solid white;
        }
        
        .btn-admin:hover {
            background: transparent;
            color: white;
            border: 2px solid white;
        }
        
        .btn-student {
            background: var(--accent-color);
            color: white;
            border: 2px solid var(--accent-color);
        }
        
        .btn-student:hover {
            background: transparent;
            color: var(--accent-color);
            border: 2px solid var(--accent-color);
        }
        
        .btn-parent {
            background: var(--success-color);
            color: white;
            border: 2px solid var(--success-color);
        }
        
        .btn-parent:hover {
            background: transparent;
            color: var(--success-color);
            border: 2px solid var(--success-color);
        }
        
        .feature-card {
            border: none;
            border-radius: 15px;
            transition: all 0.3s ease;
            overflow: hidden;
            height: 100%;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);


        }
        
        .feature-icon {
            font-size: 3rem;
            margin-bottom: 20px;
            color: var(--primary-color);
        }
        
        .stats-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 80px 0;
        }
        
        .stat-item {
            text-align: center;
            padding: 20px;
        }
        
        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .stat-label {
            font-size: 1.2rem;
            opacity: 0.9;
        }
        
        .testimonial-section {
            background-color: var(--light-color);
            padding: 80px 0;
        }
        
        .testimonial-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            margin: 15px;
            height: 100%;
        }
        
        .testimonial-text {
            font-style: italic;
            margin-bottom: 20px;
        }
        
        .testimonial-author {
            font-weight: 600;
            color: var(--primary-color);
        }
        
        .cta-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 80px 0;
            text-align: center;
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
        }
        
        .shape-1 {
            width: 200px;
            height: 200px;
            background: var(--accent-color);
            top: 10%;
            left: 5%;
            animation: float 15s infinite ease-in-out;
        }
        
        .shape-2 {
            width: 150px;
            height: 150px;
            background: white;
            top: 60%;
            right: 10%;
            animation: float 12s infinite ease-in-out reverse;
        }
        
        .shape-3 {
            width: 100px;
            height: 100px;
            background: var(--success-color);
            bottom: 20%;
            left: 15%;
            animation: float 10s infinite ease-in-out;
        }
        
        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(10deg);
            }
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
        
        footer {
            background-color: var(--dark-color);
            color: white;
            padding: 40px 0 20px;
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="floating-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div>
        <div class="container hero-content">
            <h1 class="fw-bold display-4 mb-4 animate__animated animate__fadeInDown">Welcome to Classroom Marks System</h1>
            <p class="mt-3 mb-4 fs-5 animate__animated animate__fadeIn animate__delay-1s">Manage student marks, subjects, exams, and results with ease and efficiency.</p>
            
            <div class="d-flex justify-content-center gap-3 flex-wrap mt-5 animate__animated animate__fadeInUp animate__delay-1s">
                <a href="admin_login.php" class="btn btn-custom btn-admin">
                    <i class="fas fa-user-shield me-2"></i> Admin Login
                </a>

                <a href="student_login.php" class="btn btn-custom btn-student">
                    <i class="fas fa-user-graduate me-2"></i> Student Login
                </a>
                
                <a href="parent_login.php" class="btn btn-custom btn-parent">
                    <i class="fas fa-users me-2"></i> Parent Login
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="container mt-5 py-5">
        <h2 class="text-center mb-5 fw-bold">Why Choose Our System?</h2>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card feature-card animate-on-scroll">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h5 class="card-title fw-bold">Easy Marks Management</h5>
                        <p class="card-text">Admins can add subjects, exams, and marks in seconds with our intuitive interface designed for efficiency.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card feature-card animate-on-scroll">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon">
                            <i class="fas fa-file-upload"></i>
                        </div>
                        <h5 class="card-title fw-bold">Upload Papers</h5>
                        <p class="card-text">Attach exam papers so students can review their mistakes and learn more effectively.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card feature-card animate-on-scroll">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h5 class="card-title fw-bold">Instant Email Alerts</h5>
                        <p class="card-text">Students and parents receive immediate email notifications when new exam results are published.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row g-4 mt-3">
            <div class="col-md-4">
                <div class="card feature-card animate-on-scroll">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h5 class="card-title fw-bold">Mobile Friendly</h5>
                        <p class="card-text">Access the system from any device with our responsive design that works perfectly on smartphones and tablets.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card feature-card animate-on-scroll">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h5 class="card-title fw-bold">Secure & Private</h5>
                        <p class="card-text">Your data is protected with industry-standard security measures and privacy controls.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card feature-card animate-on-scroll">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                        <h5 class="card-title fw-bold">Analytics & Reports</h5>
                        <p class="card-text">Generate comprehensive reports and analytics to track student performance over time.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 col-6 stat-item animate-on-scroll">
                    <div class="stat-number">500+</div>
                    <div class="stat-label">Schools Using</div>
                </div>
                <div class="col-md-3 col-6 stat-item animate-on-scroll">
                    <div class="stat-number">50K+</div>
                    <div class="stat-label">Students</div>
                </div>
                <div class="col-md-3 col-6 stat-item animate-on-scroll">
                    <div class="stat-number">1M+</div>
                    <div class="stat-label">Exams Processed</div>
                </div>
                <div class="col-md-3 col-6 stat-item animate-on-scroll">
                    <div class="stat-number">99.9%</div>
                    <div class="stat-label">Uptime</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
  

    <!-- Call to Action Section -->
    <section class="cta-section">
        <div class="container">
            <h2 class="fw-bold mb-4">Ready to Get Started?</h2>
            <p class="mb-5 fs-5">Join hundreds of educational institutions using our system to streamline their assessment processes.</p>
            
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="admin_login.php" class="btn btn-light btn-custom fw-bold">
                    <i class="fas fa-user-shield me-2"></i> Admin Login
                </a>

                <a href="student_login.php" class="btn btn-outline-light btn-custom fw-bold">
                    <i class="fas fa-user-graduate me-2"></i> Student Login
                </a>
                
                <a href="parent_login.php" class="btn btn-outline-light btn-custom fw-bold">
                    <i class="fas fa-users me-2"></i> Parent Login
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5>Classroom Marks System</h5>
                    <p>Streamlining educational assessment management for schools, teachers, students, and parents.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="admin_login.php" class="text-white text-decoration-none">Admin Login</a></li>
                        <li><a href="student_login.php" class="text-white text-decoration-none">Student Login</a></li>
                        <li><a href="parent_login.php" class="text-white text-decoration-none">Parent Login</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Contact Support</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Contact Us</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-envelope me-2"></i> support@classroommarks.com</li>
                        <li><i class="fas fa-phone me-2"></i> +94 74 089 0730</li>
                        <li><i class="fas fa-map-marker-alt me-2"></i> 12/D/2 ,High Level Road, Thunnana, Hanwella</li>
                    </ul>

                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p>&copy; 2025 Team Alpha Software Solutions. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
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
        });
    </script>
</body>
</html>

<?php include "footer.php"; ?>