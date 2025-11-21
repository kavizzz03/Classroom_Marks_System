<footer class="footer bg-dark text-white mt-5">
    <div class="container py-5">
        <div class="row g-4">
            <!-- Company Info -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="footer-brand mb-3">
                    <i class="fas fa-graduation-cap fa-2x text-primary me-2"></i>
                    <span class="h5 fw-bold">Student Result System</span>
                </div>
                <p class="text-light mb-3">
                    Empowering educational institutions with comprehensive student performance tracking and management solutions.
                </p>
                <div class="social-links">
                    <a href="#" class="text-white me-3">
                        <i class="fab fa-facebook-f fa-lg"></i>
                    </a>
                    <a href="#" class="text-white me-3">
                        <i class="fab fa-twitter fa-lg"></i>
                    </a>
                    <a href="#" class="text-white me-3">
                        <i class="fab fa-linkedin-in fa-lg"></i>
                    </a>
                    <a href="#" class="text-white">
                        <i class="fab fa-instagram fa-lg"></i>
                    </a>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="col-lg-4 col-md-6 mb-4">
                <h5 class="fw-bold mb-3 text-primary">Contact Info</h5>
                <div class="contact-item mb-2">
                    <i class="fas fa-phone-alt text-warning me-2"></i>
                    <span>+94 74 089 0730</span>
                </div>
                <div class="contact-item mb-2">
                    <i class="fas fa-envelope text-warning me-2"></i>
                    <span>info@alphasoftware.lk</span>
                </div>
                <div class="contact-item mb-2">
                    <i class="fas fa-map-marker-alt text-warning me-2"></i>
                    <span>12/D/2, High Level Road, Thunnana, Hanwella</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-clock text-warning me-2"></i>
                    <span>Mon - Fri: 9:00 AM - 6:00 PM</span>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class="fw-bold mb-3 text-primary">Quick Links</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="index.php" class="text-white text-decoration-none hover-primary">
                            <i class="fas fa-chevron-right small me-1"></i> Home
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="about.php" class="text-white text-decoration-none hover-primary">
                            <i class="fas fa-chevron-right small me-1"></i> About
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="contact.php" class="text-white text-decoration-none hover-primary">
                            <i class="fas fa-chevron-right small me-1"></i> Contact
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="privacy.php" class="text-white text-decoration-none hover-primary">
                            <i class="fas fa-chevron-right small me-1"></i> Privacy Policy
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Development Team -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class="fw-bold mb-3 text-primary">Developed By</h5>
                <div class="team-info">
                    <div class="team-logo mb-2">
                        <i class="fas fa-code-branch fa-2x text-success"></i>
                    </div>
                    <h6 class="fw-bold text-warning">Team Alpha</h6>
                    <p class="small text-light mb-0">Software Solutions</p>
                    <p class="small text-muted">Innovating Education Technology</p>
                </div>
            </div>
        </div>
        
        <hr class="my-4 bg-light">
        
        <!-- Copyright Section -->
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <p class="mb-0">
                    © <?php echo date("Y"); ?> Student Result System. All Rights Reserved.
                </p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <p class="mb-0">
                    Crafted with <i class="fas fa-heart text-danger"></i> by 
                    <span class="text-warning fw-bold">Team Alpha Software Solutions</span>
                </p>
            </div>
        </div>
    </div>

    <!-- Back to Top Button -->
    <div class="position-relative">
        <button onclick="scrollToTop()" class="btn btn-primary rounded-circle position-absolute top-0 start-50 translate-middle" 
                style="width: 50px; height: 50px; margin-top: -25px;" id="backToTop">
            <i class="fas fa-arrow-up"></i>
        </button>
    </div>
</footer>

<style>
.footer {
    background: linear-gradient(135deg, #1a1a1a, #2d3748) !important;
    position: relative;
    overflow: hidden;
}

.footer::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #4361ee, #4cc9f0, #7209b7);
}

.hover-primary {
    transition: all 0.3s ease;
}

.hover-primary:hover {
    color: #4cc9f0 !important;
    transform: translateX(5px);
}

.contact-item {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.social-links a {
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
}

.social-links a:hover {
    background: #4361ee;
    transform: translateY(-3px);
}

.team-info {
    text-align: center;
    padding: 15px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

#backToTop {
    transition: all 0.3s ease;
    opacity: 0;
    visibility: hidden;
}

#backToTop.show {
    opacity: 1;
    visibility: visible;
}

#backToTop:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(67, 97, 238, 0.4);
}

/* Animation for footer elements */
.footer .col-lg-4, .footer .col-lg-2 {
    animation: fadeInUp 0.6s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .footer .container {
        padding: 30px 20px;
    }
    
    .footer .col-lg-4, .footer .col-lg-2 {
        text-align: center;
    }
    
    .contact-item {
        justify-content: center;
    }
    
    .team-info {
        max-width: 200px;
        margin: 0 auto;
    }
}
</style>

<script>
// Back to top functionality
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// Show/hide back to top button
window.addEventListener('scroll', function() {
    const backToTop = document.getElementById('backToTop');
    if (window.scrollY > 300) {
        backToTop.classList.add('show');
    } else {
        backToTop.classList.remove('show');
    }
});

// Add animation on page load
document.addEventListener('DOMContentLoaded', function() {
    const footerSections = document.querySelectorAll('.footer .col-lg-4, .footer .col-lg-2');
    footerSections.forEach((section, index) => {
        section.style.animationDelay = `${index * 0.1}s`;
    });
});
</script>

</body>
</html>