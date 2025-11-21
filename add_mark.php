<?php
include "db.php";

// Set timezone to Colombo, Sri Lanka
date_default_timezone_set('Asia/Colombo');
$current_time = date("Y-m-d H:i:s");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student Marks - Classroom Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
            padding: 20px;
        }
        
        .main-container {
            max-width: 800px;
            margin: 0 auto;
            animation: fadeInUp 0.8s ease-out;
        }
        
        .header-card {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border-radius: 20px 20px 0 0;
            padding: 40px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .header-card::before {
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
        
        .form-icon {
            font-size: 4rem;
            margin-bottom: 20px;
            display: block;
            animation: bounce 2s infinite;
            filter: drop-shadow(0 4px 8px rgba(0,0,0,0.2));
        }
        
        .form-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 0 0 20px 20px;
            padding: 40px 30px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .form-section {
            margin-bottom: 30px;
            padding: 25px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            border-left: 4px solid var(--primary);
            transition: all 0.3s ease;
        }
        
        .form-section:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }
        
        .section-title {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.2rem;
        }
        
        .form-control {
            border: 2px solid #e1e5ee;
            border-radius: 12px;
            padding: 12px 15px;
            font-size: 16px;
            transition: all 0.3s;
            background: #f8f9fa;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            background: white;
            box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.15);
            transform: translateY(-2px);
        }
        
        .form-label {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .marks-preview {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-radius: 12px;
            padding: 20px;
            margin-top: 15px;
            text-align: center;
            border: 2px dashed #dee2e6;
            display: none;
            animation: fadeInUp 0.5s ease;
        }
        
        .marks-preview.active {
            display: block;
        }
        
        .preview-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-top: 15px;
        }
        
        .preview-item {
            background: white;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        
        .preview-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        }
        
        .preview-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 5px;
        }
        
        .preview-label {
            font-size: 0.85rem;
            color: #6c757d;
            font-weight: 500;
        }
        
        .file-upload-container {
            position: relative;
            border: 2px dashed #dee2e6;
            border-radius: 12px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }
        
        .file-upload-container:hover {
            border-color: var(--primary);
            background: rgba(67, 97, 238, 0.05);
        }
        
        .file-upload-container.dragover {
            border-color: var(--success);
            background: rgba(75, 181, 67, 0.1);
        }
        
        .upload-icon {
            font-size: 3rem;
            color: var(--primary);
            margin-bottom: 15px;
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
            margin-top: 20px;
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
            background: linear-gradient(135deg, #3a56d4, #5a08a0);
        }
        
        .success-message {
            background: linear-gradient(135deg, rgba(75, 181, 67, 0.1), rgba(75, 181, 67, 0.05));
            color: var(--success);
            border: 1px solid rgba(75, 181, 67, 0.2);
            border-radius: 12px;
            padding: 20px;
            margin: 25px 0;
            animation: slideInDown 0.5s ease-out;
            box-shadow: 0 4px 15px rgba(75, 181, 67, 0.1);
            display: flex;
            align-items: center;
            gap: 15px;
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
        
        .floating-shapes {
            position: fixed;
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
        }
        
        .shape-2 {
            width: 150px;
            height: 150px;
            background: white;
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }
        
        .shape-3 {
            width: 100px;
            height: 100px;
            background: var(--success);
            bottom: 20%;
            left: 15%;
            animation-delay: 4s;
        }
        
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(10deg); }
        }
        
        @keyframes slideInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .progress-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            position: relative;
        }
        
        .progress-step {
            text-align: center;
            flex: 1;
            position: relative;
            z-index: 2;
        }
        
        .step-number {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #e9ecef;
            color: #6c757d;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .step-active .step-number {
            background: var(--primary);
            color: white;
            transform: scale(1.1);
        }
        
        .step-label {
            font-size: 0.8rem;
            color: #6c757d;
            font-weight: 500;
        }
        
        .step-active .step-label {
            color: var(--primary);
            font-weight: 600;
        }
        
        .progress-line {
            position: absolute;
            top: 20px;
            left: 20px;
            right: 20px;
            height: 3px;
            background: #e9ecef;
            z-index: 1;
        }
        
        .mark-distribution-info {
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
            border-radius: 10px;
            padding: 15px;
            margin: 15px 0;
            border-left: 4px solid var(--primary);
        }
        
        .distribution-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px solid rgba(0,0,0,0.1);
        }
        
        .distribution-item:last-child {
            border-bottom: none;
        }
        
        .distribution-value {
            font-weight: 600;
            color: var(--primary);
        }
        
        @media (max-width: 768px) {
            .header-card {
                padding: 30px 20px;
            }
            
            .form-card {
                padding: 30px 20px;
            }
            
            .form-section {
                padding: 20px;
            }
            
            .preview-grid {
                grid-template-columns: 1fr;
            }
            
            .progress-indicator {
                flex-direction: column;
                gap: 20px;
            }
            
            .progress-line {
                display: none;
            }
        }
        
        .file-info {
            font-size: 0.8rem;
            color: #6c757d;
            margin-top: 5px;
        }
        
        .input-with-progress {
            position: relative;
        }
        
        .progress-bar-container {
            height: 4px;
            background: #e9ecef;
            border-radius: 2px;
            margin-top: 5px;
            overflow: hidden;
        }
        
        .progress-bar {
            height: 100%;
            border-radius: 2px;
            transition: width 0.3s ease;
        }
        
        .progress-part1 {
            background: var(--primary);
        }
        
        .progress-part2 {
            background: var(--secondary);
        }
    </style>
</head>
<body>
    <div class="floating-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
    </div>
    
    <div class="main-container">
        <a href="admin_dashboard.php" class="back-link animate__animated animate__fadeInLeft">
            <i class="fas fa-arrow-left"></i> Back to Dashboard
        </a>
        
        <div class="header-card">
            <div class="header-content">
                <i class="fas fa-chart-line form-icon"></i>
                <h2 class="display-6 fw-bold">Add Student Marks</h2>
                <p class="mb-0">Record academic performance and upload examination papers</p>
            </div>
        </div>
        
        <div class="form-card">
            <!-- Progress Indicator -->
            <div class="progress-indicator">
                <div class="progress-line"></div>
                <div class="progress-step step-active">
                    <div class="step-number">1</div>
                    <div class="step-label">Student Info</div>
                </div>
                <div class="progress-step">
                    <div class="step-number">2</div>
                    <div class="step-label">Marks Entry</div>
                </div>
                <div class="progress-step">
                    <div class="step-number">3</div>
                    <div class="step-label">Upload Papers</div>
                </div>
            </div>

            <!-- Mark Distribution Info -->
            <div class="mark-distribution-info">
                <h6 class="mb-3"><i class="fas fa-info-circle me-2"></i>Mark Distribution System</h6>
                <div class="distribution-item">
                    <span>Part 1 (Theory/Objective)</span>
                    <span class="distribution-value">40 Marks</span>
                </div>
                <div class="distribution-item">
                    <span>Part 2 (Practical/Subjective)</span>
                    <span class="distribution-value">60 Marks</span>
                </div>
                <div class="distribution-item">
                    <span><strong>Total Marks</strong></span>
                    <span class="distribution-value"><strong>100 Marks</strong></span>
                </div>
            </div>

            <form method="POST" enctype="multipart/form-data" id="marksForm">
                <!-- Student Information Section -->
                <div class="form-section">
                    <h5 class="section-title">
                        <i class="fas fa-user-graduate"></i>
                        Student Information
                    </h5>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                <i class="fas fa-user"></i>Select Student
                            </label>
                            <select name="student_id" class="form-control" required>
                                <option value="">-- Choose Student --</option>
                                <?php
                                $res = mysqli_query($conn, "SELECT * FROM students");
                                while($row = mysqli_fetch_assoc($res)){
                                    echo "<option value='{$row['id']}'>{$row['name']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                <i class="fas fa-book"></i>Select Subject
                            </label>
                            <select name="subject_id" class="form-control" required>
                                <option value="">-- Choose Subject --</option>
                                <?php
                                $res = mysqli_query($conn, "SELECT * FROM subjects");
                                while($row = mysqli_fetch_assoc($res)){
                                    echo "<option value='{$row['id']}'>{$row['subject_name']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">
                            <i class="fas fa-clipboard-list"></i>Exam Name
                        </label>
                        <input type="text" name="exam" class="form-control" placeholder="e.g., Term Test 1, Final Examination, Mid-Term" required>
                    </div>
                </div>

                <!-- Marks Entry Section -->
                <div class="form-section">
                    <h5 class="section-title">
                        <i class="fas fa-pencil-alt"></i>
                        Marks Entry
                    </h5>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                <i class="fas fa-file-alt"></i>Part 1 Marks
                            </label>
                            <div class="input-with-progress">
                                <input type="number" name="marks1" class="form-control" placeholder="Out of 40" min="0" max="40" required 
                                       oninput="updateMarksPreview()" onkeyup="updateProgressBar(this, 40, 'part1')">
                                <div class="progress-bar-container">
                                    <div class="progress-bar progress-part1" id="progressPart1" style="width: 0%"></div>
                                </div>
                            </div>
                            <div class="file-info">Maximum: 40 marks (Theory/Objective)</div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                <i class="fas fa-file-alt"></i>Part 2 Marks
                            </label>
                            <div class="input-with-progress">
                                <input type="number" name="marks2" class="form-control" placeholder="Out of 60" min="0" max="60" required 
                                       oninput="updateMarksPreview()" onkeyup="updateProgressBar(this, 60, 'part2')">
                                <div class="progress-bar-container">
                                    <div class="progress-bar progress-part2" id="progressPart2" style="width: 0%"></div>
                                </div>
                            </div>
                            <div class="file-info">Maximum: 60 marks (Practical/Subjective)</div>
                        </div>
                    </div>
                    
                    <!-- Marks Preview -->
                    <div class="marks-preview" id="marksPreview">
                        <h6 class="text-center mb-3">
                            <i class="fas fa-chart-bar"></i>Marks Summary
                        </h6>
                        <div class="preview-grid">
                            <div class="preview-item">
                                <div class="preview-value" id="previewPart1">0</div>
                                <div class="preview-label">Part 1 / 40</div>
                            </div>
                            <div class="preview-item">
                                <div class="preview-value" id="previewPart2">0</div>
                                <div class="preview-label">Part 2 / 60</div>
                            </div>
                            <div class="preview-item">
                                <div class="preview-value" id="previewTotal">0</div>
                                <div class="preview-label">Total / 100</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- File Upload Section -->
                <div class="form-section">
                    <h5 class="section-title">
                        <i class="fas fa-file-upload"></i>
                        Upload Examination Papers
                    </h5>
                    
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">
                                <i class="fas fa-file-pdf"></i>Paper Part 1 (PDF)
                            </label>
                            <div class="file-upload-container" id="uploadContainer1">
                                <i class="fas fa-cloud-upload-alt upload-icon"></i>
                                <h6>Upload Part 1 Paper</h6>
                                <p class="text-muted mb-3">Theory/Objective Questions</p>
                                <input type="file" name="paper1" class="form-control" accept="application/pdf" required>
                                <div class="file-info">Maximum size: 10MB • PDF format only</div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <label class="form-label">
                                <i class="fas fa-file-pdf"></i>Paper Part 2 (PDF)
                            </label>
                            <div class="file-upload-container" id="uploadContainer2">
                                <i class="fas fa-cloud-upload-alt upload-icon"></i>
                                <h6>Upload Part 2 Paper</h6>
                                <p class="text-muted mb-3">Practical/Subjective Questions</p>
                                <input type="file" name="paper2" class="form-control" accept="application/pdf" required>
                                <div class="file-info">Maximum size: 10MB • PDF format only</div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                if(isset($_POST['save'])){
                    $sid = $_POST['student_id'];
                    $sub = $_POST['subject_id'];
                    $exam = $_POST['exam'];

                    $m1 = intval($_POST['marks1']);
                    $m2 = intval($_POST['marks2']);

                    $total = $m1 + $m2;  // Final marks out of 100

                    // Upload PDF files
                    $uploadDir = "uploads/";
                    if(!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

                    $p1 = $uploadDir . time() . "_part1_" . basename($_FILES['paper1']['name']);
                    move_uploaded_file($_FILES['paper1']['tmp_name'], $p1);

                    $p2 = $uploadDir . time() . "_part2_" . basename($_FILES['paper2']['name']);
                    move_uploaded_file($_FILES['paper2']['tmp_name'], $p2);

                    // Insert into DB with current Colombo time
                    mysqli_query($conn, "
                        INSERT INTO marks(student_id,subject_id,exam_name,marks,paper_part1,paper_part2,total_marks,created_at)
                        VALUES('$sid','$sub','$exam','$m1','$p1','$p2','$total','$current_time')
                    ");

                    // Send Email to Student
                    include "email_notify.php";
                    sendMail($sid);

                    echo "<div class='success-message'>
                            <i class='fas fa-check-circle fa-2x'></i>
                            <div>
                                <h5 class='mb-2'>Success!</h5>
                                <p class='mb-0'>Marks saved, papers uploaded, and email notification sent successfully.</p>
                            </div>
                          </div>";
                }
                ?>

                <button type="submit" name="save" class="btn-submit">
                    <i class="fas fa-save"></i> 
                    <span>Save Marks & Send Notification</span>
                </button>
            </form>
        </div>
    </div>

    <script>
        // Update marks preview
        function updateMarksPreview() {
            const marks1 = parseInt(document.querySelector('input[name="marks1"]').value) || 0;
            const marks2 = parseInt(document.querySelector('input[name="marks2"]').value) || 0;
            const total = marks1 + marks2;
            
            document.getElementById('previewPart1').textContent = marks1;
            document.getElementById('previewPart2').textContent = marks2;
            document.getElementById('previewTotal').textContent = total;
            
            const preview = document.getElementById('marksPreview');
            if (marks1 > 0 || marks2 > 0) {
                preview.classList.add('active');
            } else {
                preview.classList.remove('active');
            }
        }
        
        // Update progress bars
        function updateProgressBar(input, maxValue, part) {
            const value = parseInt(input.value) || 0;
            const percentage = Math.min((value / maxValue) * 100, 100);
            document.getElementById(`progress${part.charAt(0).toUpperCase() + part.slice(1)}`).style.width = `${percentage}%`;
        }
        
        // File upload drag and drop
        const uploadContainers = document.querySelectorAll('.file-upload-container');
        
        uploadContainers.forEach(container => {
            const fileInput = container.querySelector('input[type="file"]');
            
            container.addEventListener('dragover', (e) => {
                e.preventDefault();
                container.classList.add('dragover');
            });
            
            container.addEventListener('dragleave', () => {
                container.classList.remove('dragover');
            });
            
            container.addEventListener('drop', (e) => {
                e.preventDefault();
                container.classList.remove('dragover');
                fileInput.files = e.dataTransfer.files;
            });
            
            fileInput.addEventListener('change', () => {
                if (fileInput.files.length > 0) {
                    container.style.borderColor = 'var(--success)';
                    container.style.background = 'rgba(75, 181, 67, 0.1)';
                }
            });
        });
        
        // Form validation
        document.getElementById('marksForm').addEventListener('submit', function(e) {
            const marks1 = parseInt(document.querySelector('input[name="marks1"]').value);
            const marks2 = parseInt(document.querySelector('input[name="marks2"]').value);
            
            if (marks1 > 40) {
                e.preventDefault();
                alert('Part 1 marks cannot exceed 40!');
                document.querySelector('input[name="marks1"]').focus();
                return false;
            }
            
            if (marks2 > 60) {
                e.preventDefault();
                alert('Part 2 marks cannot exceed 60!');
                document.querySelector('input[name="marks2"]').focus();
                return false;
            }
            
            if (marks1 < 0 || marks2 < 0) {
                e.preventDefault();
                alert('Marks cannot be negative!');
                return false;
            }
        });
        
        // Progress indicator update
        const formSections = document.querySelectorAll('.form-section');
        const progressSteps = document.querySelectorAll('.progress-step');
        
        formSections.forEach((section, index) => {
            const inputs = section.querySelectorAll('input, select');
            inputs.forEach(input => {
                input.addEventListener('focus', () => {
                    progressSteps.forEach(step => step.classList.remove('step-active'));
                    progressSteps[index].classList.add('step-active');
                });
            });
        });
        
        // Initialize marks preview
        document.addEventListener('DOMContentLoaded', function() {
            updateMarksPreview();
        });
    </script>
</body>
</html>