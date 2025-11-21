<footer class="footer mt-5">
    <div class="container">
        <div class="footer-content">
            <!-- Main Footer Section -->
            <div class="footer-main">
                <div class="footer-brand">
                    <i class="fas fa-graduation-cap footer-icon"></i>
                    <div class="brand-text">
                        <h5>Classroom Marks System</h5>
                        <p>Empowering parents to track academic excellence</p>
                    </div>
                </div>
                
                <div class="footer-stats">
                    <div class="stat-item">
                        <i class="fas fa-users"></i>
                        <div>
                            <div class="stat-number">Parent Portal</div>
                            <div class="stat-label">Active Access</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="footer-section">
                <h6>Quick Links</h6>
                <div class="footer-links">
                    <a href="index.php" class="footer-link">
                        <i class="fas fa-home"></i>
                        Home
                    </a>
                    <a href="parent_login.php" class="footer-link">
                        <i class="fas fa-sign-in-alt"></i>
                        Parent Login
                    </a>
                    <a href="student_login.php" class="footer-link">
                        <i class="fas fa-user-graduate"></i>
                        Student Login
                    </a>
                    <a href="contact.php" class="footer-link">
                        <i class="fas fa-envelope"></i>
                        Contact Support
                    </a>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="footer-section">
                <h6>Support</h6>
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <span>+94 74 089 0730</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <span>parentsupport@alphasoftware.lk</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-clock"></i>
                        <span>Mon-Fri: 8:00 AM - 5:00 PM</span>
                    </div>
                </div>
            </div>

            <!-- Developer Info -->
            <div class="footer-section">
                <h6>Developed By</h6>
                <div class="developer-info">
                    <div class="team-logo">
                        <i class="fas fa-code"></i>
                    </div>
                    <div class="team-info">
                        <strong>Team Alpha</strong>
                        <div class="developer-name">Kavindu Bogahawatte</div>
                        <small>Software Solutions</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyright Section -->
        <div class="footer-bottom">
            <div class="copyright-text">
                <p>
                    © 2025 <strong>Classroom Marks System</strong> | 
                    Designed with <i class="fas fa-heart pulse"></i> by 
                    <span class="highlight">Team Alpha Software Solutions</span> - 
                    <strong>Kavindu Bogahawatte</strong>
                </p>
            </div>
            
            <div class="social-links">
                <a href="#" class="social-link" title="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="social-link" title="Twitter">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="social-link" title="LinkedIn">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="#" class="social-link" title="Email">
                    <i class="fas fa-envelope"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Back to Top Button -->
    <button class="back-to-top" onclick="scrollToTop()">
        <i class="fas fa-chevron-up"></i>
    </button>
</footer>

<style>
    .footer {
        background: linear-gradient(135deg, #1a1a1a 0%, #2d3748 100%);
        color: white;
        padding: 50px 0 20px;
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

    .footer-content {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1fr;
        gap: 40px;
        margin-bottom: 40px;
    }

    .footer-main {
        display: flex;
        flex-direction: column;
        gap: 25px;
    }

    .footer-brand {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .footer-icon {
        font-size: 2.5rem;
        color: #4cc9f0;
        background: linear-gradient(135deg, #4361ee, #7209b7);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .brand-text h5 {
        font-weight: 700;
        margin-bottom: 5px;
        color: white;
    }

    .brand-text p {
        color: rgba(255, 255, 255, 0.7);
        margin: 0;
        font-size: 0.9rem;
    }

    .footer-stats {
        display: flex;
        gap: 20px;
    }

    .stat-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 15px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        transition: all 0.3s ease;
    }

    .stat-item:hover {
        background: rgba(255, 255, 255, 0.1);
        transform: translateY(-2px);
    }

    .stat-item i {
        font-size: 1.5rem;
        color: #4cc9f0;
    }

    .stat-number {
        font-weight: 600;
        font-size: 0.9rem;
    }

    .stat-label {
        font-size: 0.8rem;
        color: rgba(255, 255, 255, 0.6);
    }

    .footer-section h6 {
        color: #4cc9f0;
        font-weight: 600;
        margin-bottom: 20px;
        font-size: 1rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .footer-links {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .footer-link {
        color: rgba(255, 255, 255, 0.7);
        text-decoration: none;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 8px 0;
    }

    .footer-link:hover {
        color: #4cc9f0;
        transform: translateX(5px);
    }

    .footer-link i {
        width: 16px;
        text-align: center;
    }

    .contact-info {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .contact-item {
        display: flex;
        align-items: center;
        gap: 12px;
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.9rem;
    }

    .contact-item i {
        color: #4cc9f0;
        width: 16px;
        text-align: center;
    }

    .developer-info {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 20px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .team-logo {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: linear-gradient(135deg, #4361ee, #7209b7);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        color: white;
    }

    .team-info {
        display: flex;
        flex-direction: column;
    }

    .team-info strong {
        color: white;
        font-size: 0.9rem;
    }

    .developer-name {
        color: #4cc9f0;
        font-weight: 600;
        font-size: 0.85rem;
        margin: 2px 0;
    }

    .team-info small {
        color: rgba(255, 255, 255, 0.6);
        font-size: 0.75rem;
    }

    .footer-bottom {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 25px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .copyright-text {
        color: rgba(255, 255, 255, 0.6);
        font-size: 0.9rem;
    }

    .copyright-text .highlight {
        color: #4cc9f0;
        font-weight: 600;
    }

    .copyright-text strong {
        color: white;
    }

    .pulse {
        animation: pulse 2s infinite;
        color: #e63946;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.1); }
    }

    .social-links {
        display: flex;
        gap: 15px;
    }

    .social-link {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-decoration: none;
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .social-link:hover {
        background: #4361ee;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(67, 97, 238, 0.4);
    }

    .back-to-top {
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: linear-gradient(135deg, #4361ee, #7209b7);
        color: white;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        opacity: 0;
        visibility: hidden;
    }

    .back-to-top.show {
        opacity: 1;
        visibility: visible;
    }

    .back-to-top:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(67, 97, 238, 0.4);
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .footer-content {
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }
        
        .footer-main {
            grid-column: 1 / -1;
        }
    }

    @media (max-width: 768px) {
        .footer {
            padding: 40px 0 20px;
        }
        
        .footer-content {
            grid-template-columns: 1fr;
            gap: 30px;
        }
        
        .footer-stats {
            flex-direction: column;
        }
        
        .footer-bottom {
            flex-direction: column;
            gap: 20px;
            text-align: center;
        }
        
        .back-to-top {
            bottom: 20px;
            right: 20px;
            width: 45px;
            height: 45px;
        }
    }

    @media (max-width: 576px) {
        .footer-brand {
            flex-direction: column;
            text-align: center;
            gap: 10px;
        }
        
        .developer-info {
            flex-direction: column;
            text-align: center;
            gap: 10px;
        }
        
        .copyright-text {
            font-size: 0.8rem;
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
        const backToTop = document.querySelector('.back-to-top');
        if (window.scrollY > 300) {
            backToTop.classList.add('show');
        } else {
            backToTop.classList.remove('show');
        }
    });

    // Add animation on page load
    document.addEventListener('DOMContentLoaded', function() {
        const footerSections = document.querySelectorAll('.footer-section, .footer-main');
        footerSections.forEach((section, index) => {
            section.style.animationDelay = `${index * 0.1}s`;
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>