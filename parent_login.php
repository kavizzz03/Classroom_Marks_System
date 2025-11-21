<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent View - Classroom Results</title>
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
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f5 100%);
            min-height: 100vh;
        }
        
        .page-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 50px 0;
            margin-bottom: 40px;
            border-radius: 0 0 25px 25px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            position: relative;
            overflow: hidden;
        }
        
        .page-header::before {
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
        
        .header-content {
            position: relative;
            z-index: 1;
        }
        
        .selection-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            border: none;
            transition: all 0.4s ease;
        }
        
        .selection-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }
        
        .form-select {
            border-radius: 12px;
            padding: 12px 20px;
            border: 2px solid #e1e5ee;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            background: linear-gradient(45deg, transparent, #f8f9fa);
        }
        
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.15);
            transform: translateY(-2px);
        }
        
        .leaderboard-card {
            background: white;
            border-radius: 20px;
            padding: 0;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 25px;
            border: none;
            overflow: hidden;
            transition: all 0.4s ease;
            position: relative;
        }
        
        .leaderboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }
        
        .rank-badge {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.2rem;
            color: white;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        
        .rank-1 {
            background: linear-gradient(135deg, #FFD700, #FFA500);
        }
        
        .rank-2 {
            background: linear-gradient(135deg, #C0C0C0, #A0A0A0);
        }
        
        .rank-3 {
            background: linear-gradient(135deg, #CD7F32, #A56C27);
        }
        
        .rank-other {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
        }
        
        .card-header-custom {
            background: linear-gradient(135deg, var(--primary-light), var(--primary));
            color: white;
            padding: 25px 30px 25px 90px;
            border-bottom: none;
        }
        
        .student-name {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .marks-display {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            padding: 25px 30px;
        }
        
        .mark-item {
            text-align: center;
            padding: 15px;
            border-radius: 12px;
            background: #f8f9fa;
            transition: all 0.3s ease;
        }
        
        .mark-item:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-3px);
        }
        
        .mark-value {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .mark-label {
            font-size: 0.9rem;
            opacity: 0.8;
            font-weight: 500;
        }
        
        .paper-section {
            padding: 0 30px 25px;
        }
        
        .paper-toggle {
            background: linear-gradient(135deg, var(--accent), #3a86ff);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 12px 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }
        
        .paper-toggle:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(58, 134, 255, 0.4);
        }
        
        .paper-container {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 20px;
            margin-top: 15px;
            display: none;
            animation: fadeIn 0.5s ease;
        }
        
        .paper-container.active {
            display: block;
        }
        
        .paper-frame {
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border: 2px solid #e1e5ee;
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
            width: 120px;
            height: 120px;
            background: var(--accent);
            top: 10%;
            right: 5%;
        }
        
        .shape-2 {
            width: 80px;
            height: 80px;
            background: white;
            bottom: 20%;
            left: 10%;
            animation-delay: 2s;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(10deg); }
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
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
        
        .leaderboard-title {
            background: linear-gradient(135deg, var(--success), #2ecc71);
            color: white;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            margin: 30px 0;
            box-shadow: 0 8px 25px rgba(46, 204, 113, 0.3);
            position: relative;
            overflow: hidden;
        }
        
        .leaderboard-title::before {
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
        
        .leaderboard-title h4 {
            position: relative;
            z-index: 1;
            margin: 0;
            font-weight: 700;
        }
        
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #6c757d;
        }
        
        .empty-state i {
            font-size: 4rem;
            margin-bottom: 20px;
            color: #dee2e6;
        }
        
        @media (max-width: 768px) {
            .page-header {
                padding: 30px 0;
                border-radius: 0 0 20px 20px;
            }
            
            .selection-card {
                padding: 20px;
            }
            
            .marks-display {
                grid-template-columns: 1fr;
                padding: 20px;
            }
            
            .card-header-custom {
                padding: 20px 20px 20px 70px;
            }
            
            .rank-badge {
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }
            
            .paper-section {
                padding: 0 20px 20px;
            }
        }
        
        @media (max-width: 576px) {
            .page-header h2 {
                font-size: 1.8rem;
            }
            
            .student-name {
                font-size: 1.2rem;
            }
            
            .mark-value {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Page Header -->
    <div class="page-header">
        <div class="floating-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
        </div>
        <div class="container header-content">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h2 class="display-5 fw-bold mb-3 animate__animated animate__fadeInDown">
                        <i class="fas fa-users me-3"></i>Parent View - Classroom Results
                    </h2>
                    <p class="lead mb-0 animate__animated animate__fadeIn animate__delay-1s">
                        Track your child's academic performance and compare with classmates
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <!-- Step 1: Select Subject -->
        <div class="selection-card animate__animated animate__fadeInUp">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h4 class="mb-4 text-primary">
                        <i class="fas fa-book me-2"></i>Step 1: Select Subject
                    </h4>
                    <form method="GET">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <select name="subject_id" class="form-select" required onchange="this.form.submit()">
                                    <option value="">-- Choose a Subject --</option>
                                    <?php
                                    $subjects = mysqli_query($conn, "SELECT * FROM subjects");
                                    while($sub = mysqli_fetch_assoc($subjects)){
                                        $selected = (isset($_GET['subject_id']) && $_GET['subject_id'] == $sub['id']) ? "selected" : "";
                                        echo "<option value='{$sub['id']}' $selected>{$sub['subject_name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php
        // Step 2: Show Exams if subject selected
        if(isset($_GET['subject_id'])){
            $subject_id = intval($_GET['subject_id']);
            
            // Get subject name
            $subject_query = mysqli_query($conn, "SELECT subject_name FROM subjects WHERE id='$subject_id'");
            $subject_data = mysqli_fetch_assoc($subject_query);
            $subject_name = $subject_data['subject_name'];
        ?>
            <div class="selection-card animate__animated animate__fadeInUp">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h4 class="mb-4 text-success">
                            <i class="fas fa-clipboard-list me-2"></i>Step 2: Select Exam for <?php echo $subject_name; ?>
                        </h4>
                        <form method="GET">
                            <input type="hidden" name="subject_id" value="<?php echo $subject_id; ?>">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <select name="exam_name" class="form-select" required onchange="this.form.submit()">
                                        <option value="">-- Choose an Exam --</option>
                                        <?php
                                        $exams = mysqli_query($conn, "SELECT DISTINCT exam_name FROM marks WHERE subject_id='$subject_id'");
                                        $has_exams = mysqli_num_rows($exams) > 0;
                                        
                                        if($has_exams) {
                                            while($exam = mysqli_fetch_assoc($exams)){
                                                $selected = (isset($_GET['exam_name']) && $_GET['exam_name'] == $exam['exam_name']) ? "selected" : "";
                                                echo "<option value='{$exam['exam_name']}' $selected>{$exam['exam_name']}</option>";
                                            }
                                        } else {
                                            echo "<option value='' disabled>No exams available</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php
        // Step 3: Show leaderboard if exam selected
        if(isset($_GET['exam_name']) && isset($_GET['subject_id'])){
            $exam_name = $_GET['exam_name'];
            $subject_id = intval($_GET['subject_id']);

            // Fetch results ordered by total marks descending
            $results = mysqli_query($conn, "
                SELECT marks.*, students.name 
                FROM marks 
                INNER JOIN students ON marks.student_id = students.id
                WHERE subject_id='$subject_id' AND exam_name='$exam_name'
                ORDER BY total_marks DESC
            ");

            if(mysqli_num_rows($results) > 0) {
        ?>
                <div class="leaderboard-title animate__animated animate__fadeInUp">
                    <h4>
                        <i class="fas fa-trophy me-2"></i>
                        Leaderboard - <?php echo $exam_name; ?>
                    </h4>
                </div>

                <?php
                $rank = 1;
                while($row = mysqli_fetch_assoc($results)){
                    $rank_class = $rank <= 3 ? "rank-$rank" : "rank-other";
                ?>
                    <div class="leaderboard-card animate-on-scroll" style="animation-delay: <?php echo ($rank-1)*0.1; ?>s">
                        <div class="rank-badge <?php echo $rank_class; ?>">
                            <?php echo $rank; ?>
                        </div>
                        
                        <div class="card-header-custom">
                            <div class="student-name"><?php echo $row['name']; ?></div>
                            <small>Performance Overview</small>
                        </div>
                        
                        <div class="marks-display">
                            <div class="mark-item">
                                <div class="mark-value"><?php echo $row['marks']; ?></div>
                                <div class="mark-label">Part 1 (40)</div>
                            </div>
                            <div class="mark-item">
                                <div class="mark-value"><?php echo ($row['total_marks'] - $row['marks']); ?></div>
                                <div class="mark-label">Part 2 (60)</div>
                            </div>
                            <div class="mark-item">
                                <div class="mark-value"><?php echo $row['total_marks']; ?></div>
                                <div class="mark-label">Total (100)</div>
                            </div>
                        </div>
                        
                        <div class="paper-section">
                            <button class="paper-toggle" onclick="togglePapers(this)">
                                <i class="fas fa-file-alt"></i>
                                View Exam Papers
                            </button>
                            
                            <div class="paper-container">
                                <h6 class="mb-3 text-primary">
                                    <i class="fas fa-file-pdf me-2"></i>Part 1 Paper
                                </h6>
                                <iframe src="<?php echo $row['paper_part1']; ?>" class="paper-frame" width="100%" height="400px"></iframe>
                                
                                <h6 class="mb-3 mt-4 text-primary">
                                    <i class="fas fa-file-pdf me-2"></i>Part 2 Paper
                                </h6>
                                <iframe src="<?php echo $row['paper_part2']; ?>" class="paper-frame" width="100%" height="400px"></iframe>
                            </div>
                        </div>
                    </div>
                <?php
                    $rank++;
                }
            } else {
                echo '<div class="empty-state animate__animated animate__fadeIn">
                        <i class="fas fa-clipboard-list"></i>
                        <h3 class="mb-3">No Results Available</h3>
                        <p class="mb-4">No student results found for this exam. Please check back later.</p>
                      </div>';
            }
        }
        ?>
    </div>

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

        // Toggle paper visibility
        function togglePapers(button) {
            const paperContainer = button.nextElementSibling;
            paperContainer.classList.toggle('active');
            
            if (paperContainer.classList.contains('active')) {
                button.innerHTML = '<i class="fas fa-eye-slash"></i> Hide Exam Papers';
            } else {
                button.innerHTML = '<i class="fas fa-file-alt"></i> View Exam Papers';
            }
        }

        // Add smooth transitions for form elements
        document.querySelectorAll('.form-select').forEach(select => {
            select.addEventListener('focus', function() {
                this.parentElement.parentElement.parentElement.style.transform = 'translateY(-2px)';
            });
            
            select.addEventListener('blur', function() {
                this.parentElement.parentElement.parentElement.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>
</html>

<?php include "footer.php"; ?>