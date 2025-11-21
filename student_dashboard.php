<?php include "db.php"; ?>
<?php include "student/header.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - Exam Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            background-color: #f5f7fb;
        }
        
        .dashboard-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 30px 0;
            margin-bottom: 30px;
            border-radius: 0 0 20px 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        
        .result-card {
            border-radius: 16px;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.4s ease;
            overflow: hidden;
            margin-bottom: 25px;
            background: white;
        }
        
        .result-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        }
        
        .card-header-custom {
            background: linear-gradient(135deg, var(--primary-light), var(--primary));
            color: white;
            padding: 15px 20px;
            border-bottom: none;
        }
        
        .progress-container {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 15px;
            margin: 10px 0;
        }
        
        .progress {
            height: 22px;
            border-radius: 12px;
            background-color: #e9ecef;
            overflow: hidden;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .progress-bar {
            border-radius: 12px;
            font-weight: 600;
            line-height: 22px;
            font-size: 0.85rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: width 1.5s ease-in-out;
        }
        
        .btn-paper {
            border-radius: 8px;
            font-weight: 500;
            padding: 8px 16px;
            margin: 5px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-paper:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }
        
        .chart-container {
            background: linear-gradient(135deg, #e0f7fa, #e1bee7);
            border-radius: 20px;
            padding: 25px;
            margin-bottom: 40px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            border: none;
            transition: transform 0.3s ease;
        }
        
        .chart-container:hover {
            transform: scale(1.01);
        }
        
        .subject-badge {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
        }
        
        .marks-display {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
            text-align: center;
            margin: 10px 0;
        }
        
        .performance-indicator {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin: 10px 0;
        }
        
        .performance-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            display: inline-block;
        }
        
        .mark-distribution {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 12px;
            padding: 15px;
            margin: 15px 0;
            text-align: center;
        }
        
        .distribution-item {
            display: inline-block;
            margin: 0 15px;
            text-align: center;
        }
        
        .distribution-value {
            font-size: 1.5rem;
            font-weight: 700;
            display: block;
        }
        
        .distribution-label {
            font-size: 0.85rem;
            opacity: 0.9;
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
        
        .floating-icon {
            position: absolute;
            opacity: 0.1;
            font-size: 4rem;
            z-index: 0;
        }
        
        .floating-icon-1 {
            top: 20px;
            right: 20px;
            animation: float 6s infinite ease-in-out;
        }
        
        .floating-icon-2 {
            bottom: 20px;
            left: 20px;
            animation: float 8s infinite ease-in-out reverse;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(5deg); }
        }
        
        .stats-card {
            background: white;
            border-radius: 16px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        
        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12);
        }
        
        .stats-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: var(--primary);
        }
        
        .stats-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark);
        }
        
        .stats-label {
            font-size: 0.9rem;
            color: #6c757d;
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
            .dashboard-header {
                padding: 20px 0;
                border-radius: 0 0 15px 15px;
            }
            
            .chart-container {
                padding: 15px;
                border-radius: 15px;
            }
            
            .btn-paper {
                width: 100%;
                justify-content: center;
                margin: 5px 0;
            }
            
            .marks-display {
                font-size: 1.5rem;
            }
            
            .distribution-item {
                margin: 10px;
                display: block;
            }
        }
    </style>
</head>
<body>
    <?php
    $id = $_GET['id'];
    
    // Fetch student name
    $student_query = mysqli_query($conn, "SELECT name FROM students WHERE id='$id'");
    $student_data = mysqli_fetch_assoc($student_query);
    $student_name = $student_data['name'];
    
    // Fetch marks with subjects
    $res = mysqli_query($conn, "
        SELECT marks.*, subjects.subject_name 
        FROM marks 
        INNER JOIN subjects ON marks.subject_id = subjects.id
        WHERE student_id='$id'
        ORDER BY marks.created_at DESC
    ");
    
    $total_subjects = mysqli_num_rows($res);
    $total_marks = 0;
    $highest_mark = 0;
    
    // Arrays for Bar Chart
    $subjectNames = [];
    $marksPart1 = [];
    $marksPart2 = [];
    $marksTotal = [];
    
    mysqli_data_seek($res, 0); // Reset pointer to beginning
    ?>
    
    <div class="dashboard-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="fw-bold animate__animated animate__fadeInDown">📊 Your Exam Results</h1>
                    <p class="lead mb-0 animate__animated animate__fadeIn animate__delay-1s">Welcome back, <?php echo $student_name; ?>! Here's your academic performance overview.</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <div class="subject-badge animate__animated animate__zoomIn animate__delay-1s">
                        <i class="fas fa-book me-1"></i> <?php echo $total_subjects; ?> Subjects
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container mt-4">
        <?php if($total_subjects > 0): ?>
            <!-- Mark Distribution Info -->
            <div class="mark-distribution animate-on-scroll">
                <h5 class="mb-3"><i class="fas fa-info-circle me-2"></i>Mark Distribution System</h5>
                <div class="distribution-item">
                    <span class="distribution-value">40</span>
                    <span class="distribution-label">Part 1 Marks</span>
                </div>
                <div class="distribution-item">
                    <span class="distribution-value">60</span>
                    <span class="distribution-label">Part 2 Marks</span>
                </div>
                <div class="distribution-item">
                    <span class="distribution-value">100</span>
                    <span class="distribution-label">Total Marks</span>
                </div>
            </div>
            
            <!-- Stats Cards -->
            <div class="row mb-5">
                <div class="col-md-4">
                    <div class="stats-card animate-on-scroll">
                        <i class="fas fa-chart-line stats-icon"></i>
                        <div class="stats-number"><?php echo $total_subjects; ?></div>
                        <div class="stats-label">Total Subjects</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stats-card animate-on-scroll">
                        <i class="fas fa-star stats-icon"></i>
                        <div class="stats-number">
                            <?php 
                            mysqli_data_seek($res, 0);
                            $total = 0;
                            $count = 0;
                            while($row = mysqli_fetch_assoc($res)) {
                                $total += $row['total_marks'];
                                $count++;
                                if($row['total_marks'] > $highest_mark) {
                                    $highest_mark = $row['total_marks'];
                                }
                            }
                            echo $highest_mark;
                            ?>
                        </div>
                        <div class="stats-label">Highest Score</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stats-card animate-on-scroll">
                        <i class="fas fa-percentage stats-icon"></i>
                        <div class="stats-number">
                            <?php 
                            $avg = $count > 0 ? round($total / $count, 1) : 0;
                            echo $avg;
                            ?>
                        </div>
                        <div class="stats-label">Average Score</div>
                    </div>
                </div>
            </div>
            
            <!-- Results Cards -->
            <div class="row">
                <?php 
                mysqli_data_seek($res, 0);
                $card_count = 0;
                while($row = mysqli_fetch_assoc($res)): 
                    $card_count++;
                    $subjectNames[] = $row['subject_name'];
                    $marksPart1[] = intval($row['marks']);
                    $marksPart2[] = intval($row['total_marks']) - intval($row['marks']);
                    $marksTotal[] = intval($row['total_marks']);
                    
                    // Color for total marks
                    if($row['total_marks'] >= 80) {
                        $color = "success";
                        $performance = "Excellent";
                        $dot_color = "bg-success";
                    } elseif($row['total_marks'] >= 50) {
                        $color = "warning";
                        $performance = "Good";
                        $dot_color = "bg-warning";
                    } else {
                        $color = "danger";
                        $performance = "Needs Improvement";
                        $dot_color = "bg-danger";
                    }
                ?>
                <div class="col-lg-6 mb-4">
                    <div class="result-card animate-on-scroll" style="animation-delay: <?php echo $card_count * 0.1; ?>s">
                        <div class="card-header-custom">
                            <h5 class="mb-0">
                                <i class="fas fa-book-open me-2"></i>
                                <?php echo $row['subject_name']; ?> - <?php echo $row['exam_name']; ?>
                            </h5>
                        </div>
                        <div class="card-body position-relative">
                            <div class="floating-icon floating-icon-1">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="floating-icon floating-icon-2">
                                <i class="fas fa-award"></i>
                            </div>
                            
                            <p class="text-muted mb-3">
                                <i class="far fa-calendar me-1"></i> 
                                <?php echo date('d M Y, H:i A', strtotime($row['created_at'])); ?>
                            </p>
                            
                            <div class="marks-display">
                                <?php echo $row['total_marks']; ?>/100
                            </div>
                            
                            <div class="performance-indicator">
                                <span class="performance-dot <?php echo $dot_color; ?>"></span>
                                <span class="text-muted"><?php echo $performance; ?></span>
                            </div>
                            
                            <!-- Part 1 Progress (40 marks) -->
                            <div class="progress-container">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Part 1: <?php echo $row['marks']; ?>/40</span>
                                    <span><?php echo round(($row['marks']/40)*100, 1); ?>%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" 
                                         style="width: <?php echo ($row['marks']/40)*100; ?>%;" 
                                         aria-valuenow="<?php echo $row['marks']; ?>" 
                                         aria-valuemin="0" 
                                         aria-valuemax="40">
                                        <?php echo $row['marks']; ?>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Part 2 Progress (60 marks) -->
                            <div class="progress-container">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Part 2: <?php echo ($row['total_marks'] - $row['marks']); ?>/60</span>
                                    <span><?php echo round((($row['total_marks'] - $row['marks'])/60)*100, 1); ?>%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" 
                                         style="width: <?php echo (($row['total_marks'] - $row['marks'])/60)*100; ?>%;" 
                                         aria-valuenow="<?php echo ($row['total_marks'] - $row['marks']); ?>" 
                                         aria-valuemin="0" 
                                         aria-valuemax="60">
                                        <?php echo ($row['total_marks'] - $row['marks']); ?>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Total Progress (100 marks) -->
                            <div class="progress-container">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Total: <?php echo $row['total_marks']; ?>/100</span>
                                    <span><?php echo $row['total_marks']; ?>%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-<?php echo $color; ?>" role="progressbar" 
                                         style="width: <?php echo $row['total_marks']; ?>%;" 
                                         aria-valuenow="<?php echo $row['total_marks']; ?>" 
                                         aria-valuemin="0" 
                                         aria-valuemax="100">
                                        <?php echo $row['total_marks']; ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-4 d-flex flex-wrap justify-content-center">
                                <a class="btn btn-outline-primary btn-paper" target='_blank' href='<?php echo $row['paper_part1']; ?>'>
                                    <i class="far fa-eye me-1"></i> View Part 1
                                </a>
                                <a class="btn btn-outline-success btn-paper" download href='<?php echo $row['paper_part1']; ?>'>
                                    <i class="fas fa-download me-1"></i> Download Part 1
                                </a>
                                <a class="btn btn-outline-primary btn-paper" target='_blank' href='<?php echo $row['paper_part2']; ?>'>
                                    <i class="far fa-eye me-1"></i> View Part 2
                                </a>
                                <a class="btn btn-outline-success btn-paper" download href='<?php echo $row['paper_part2']; ?>'>
                                    <i class="fas fa-download me-1"></i> Download Part 2
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            
            <!-- Creative Bar Chart -->
            <div class="chart-container animate-on-scroll">
                <h4 class="text-center mb-4 text-dark fw-bold">
                    <i class="fas fa-chart-bar me-2"></i>Marks Comparison Chart
                </h4>
                <canvas id="marksChart" height="180"></canvas>
            </div>
            
        <?php else: ?>
            <!-- Empty State -->
            <div class="empty-state animate__animated animate__fadeIn">
                <i class="fas fa-clipboard-list"></i>
                <h3 class="mb-3">No Results Available</h3>
                <p class="mb-4">You don't have any exam results yet. Check back later or contact your instructor.</p>
                <a href="index.php" class="btn btn-primary">
                    <i class="fas fa-home me-2"></i>Back to Home
                </a>
            </div>
        <?php endif; ?>
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
            
            // Animate progress bars
            const progressBars = document.querySelectorAll('.progress-bar');
            progressBars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0';
                setTimeout(() => {
                    bar.style.width = width;
                }, 300);
            });
            
            <?php if($total_subjects > 0): ?>
            // Initialize chart
            const ctx = document.getElementById('marksChart');
            
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($subjectNames); ?>,
                    datasets: [
                        {
                            label: 'Part 1 (40)',
                            data: <?php echo json_encode($marksPart1); ?>,
                            backgroundColor: 'rgba(67, 97, 238, 0.8)',
                            borderColor: 'rgba(67, 97, 238, 1)',
                            borderWidth: 1,
                            borderRadius: 5,
                            borderSkipped: false,
                        },
                        {
                            label: 'Part 2 (60)',
                            data: <?php echo json_encode($marksPart2); ?>,
                            backgroundColor: 'rgba(255, 193, 7, 0.8)',
                            borderColor: 'rgba(255, 193, 7, 1)',
                            borderWidth: 1,
                            borderRadius: 5,
                            borderSkipped: false,
                        },
                        {
                            label: 'Total (100)',
                            data: <?php echo json_encode($marksTotal); ?>,
                            backgroundColor: 'rgba(37, 155, 36, 0.7)',
                            borderColor: 'rgba(37, 155, 36, 1)',
                            borderWidth: 1,
                            borderRadius: 5,
                            borderSkipped: false,
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { 
                            position: 'top', 
                            labels: { 
                                boxWidth: 15, 
                                padding: 15,
                                font: { size: 13 }
                            } 
                        },
                        title: { 
                            display: true, 
                            text: 'Marks Overview per Subject', 
                            font: { size: 16, weight: 'bold' },
                            padding: { bottom: 20 }
                        },
                        tooltip: { 
                            mode: 'index', 
                            intersect: false,
                            backgroundColor: 'rgba(0, 0, 0, 0.7)',
                            padding: 10,
                            cornerRadius: 8
                        }
                    },
                    scales: {
                        y: { 
                            beginAtZero: true, 
                            max: 100, 
                            title: { 
                                display: true, 
                                text: 'Marks',
                                font: { weight: 'bold' }
                            },
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            }
                        },
                        x: { 
                            title: { 
                                display: true, 
                                text: 'Subjects',
                                font: { weight: 'bold' }
                            },
                            grid: {
                                display: false
                            }
                        },
                    },
                    interaction: { mode: 'nearest', axis: 'x', intersect: false },
                    animation: {
                        duration: 1500,
                        easing: 'easeOutQuart'
                    }
                }
            });
            <?php endif; ?>
        });
    </script>
</body>
</html>

<?php include "student/footer.php"; ?>