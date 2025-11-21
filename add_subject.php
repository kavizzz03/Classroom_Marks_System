<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Subject - Classroom Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
     <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3126/3126533.png" type="image/png">
    <style>
        /* Keep all your original CSS as-is */
        :root { --primary: #4361ee; --primary-light: #4895ef; --secondary: #7209b7; --accent: #4cc9f0; --success: #4bb543; --warning: #f8961e; --danger: #e63946; --light: #f8f9fa; --dark: #212529; }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px; }
        .form-container { width: 100%; max-width: 500px; animation: fadeInUp 0.8s ease-out; }
        .form-card { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border-radius: 20px; box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3); overflow: hidden; transition: all 0.4s ease; border: 1px solid rgba(255, 255, 255, 0.2); }
        .form-card:hover { transform: translateY(-10px); box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4); }
        .form-header { background: linear-gradient(135deg, var(--primary), var(--secondary)); color: white; padding: 40px 30px; text-align: center; position: relative; overflow: hidden; }
        .form-header::before { content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="0.1" d="M0,128L48,144C96,160,192,192,288,186.7C384,181,480,139,576,138.7C672,139,768,181,864,181.3C960,181,1056,139,1152,138.7C1248,139,1344,181,1392,202.7L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>'); background-size: cover; background-position: bottom; }
        .form-header-content { position: relative; z-index: 1; }
        .form-icon { font-size: 4rem; margin-bottom: 20px; display: block; animation: bounce 2s infinite; filter: drop-shadow(0 4px 8px rgba(0,0,0,0.2)); }
        .form-body { padding: 40px 30px; }
        .form-group { margin-bottom: 25px; position: relative; }
        .form-label { display: block; margin-bottom: 10px; font-weight: 600; color: var(--dark); transition: color 0.3s; font-size: 1.1rem; }
        .input-with-icon { position: relative; }
        .form-control { width: 100%; padding: 16px 20px 16px 55px; border: 2px solid #e1e5ee; border-radius: 12px; font-size: 16px; transition: all 0.3s; background-color: #f8f9fa; font-weight: 500; text-transform: capitalize; }
        .form-control:focus { border-color: var(--primary); background-color: white; box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.15); outline: none; transform: translateY(-2px); }
        .input-icon { position: absolute; left: 20px; top: 50%; transform: translateY(-50%); color: var(--primary); font-size: 1.3rem; transition: color 0.3s; }
        .form-control:focus + .input-icon { color: var(--secondary); animation: shake 0.5s ease-in-out; }
        .btn-submit { width: 100%; padding: 18px; background: linear-gradient(135deg, var(--primary), var(--secondary)); color: white; border: none; border-radius: 12px; font-size: 18px; font-weight: 600; cursor: pointer; transition: all 0.3s; display: flex; align-items: center; justify-content: center; gap: 12px; margin-top: 10px; position: relative; overflow: hidden; }
        .btn-submit::before { content: ''; position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent); transition: 0.5s; }
        .btn-submit:hover::before { left: 100%; }
        .btn-submit:hover { transform: translateY(-3px); box-shadow: 0 10px 25px rgba(67, 97, 238, 0.4); background: linear-gradient(135deg, #3a56d4, #5a08a0); }
        .btn-submit:active { transform: translateY(-1px); }
        .success-message { background: linear-gradient(135deg, rgba(75, 181, 67, 0.1), rgba(75, 181, 67, 0.05)); color: var(--success); border: 1px solid rgba(75, 181, 67, 0.2); border-radius: 12px; padding: 16px; margin-bottom: 25px; animation: slideInDown 0.5s ease-out; box-shadow: 0 4px 15px rgba(75, 181, 67, 0.1); display: flex; align-items: center; gap: 12px; }
        .error-message { background: linear-gradient(135deg, rgba(230, 57, 70, 0.1), rgba(230, 57, 70, 0.05)); color: var(--danger); border: 1px solid rgba(230, 57, 70, 0.2); border-radius: 12px; padding: 16px; margin-bottom: 25px; animation: shake 0.5s ease-in-out; box-shadow: 0 4px 15px rgba(230, 57, 70, 0.1); display: flex; align-items: center; gap: 12px; }
        .floating-shapes { position: absolute; top: 0; left: 0; width: 100%; height: 100%; overflow: hidden; z-index: -1; }
        .shape { position: absolute; opacity: 0.1; border-radius: 50%; animation: float 15s infinite ease-in-out; }
        .shape-1 { width: 200px; height: 200px; background: var(--accent); top: 10%; left: 5%; animation-delay: 0s; }
        .shape-2 { width: 150px; height: 150px; background: white; top: 60%; right: 10%; animation-delay: 2s; animation-duration: 12s; }
        .shape-3 { width: 100px; height: 100px; background: var(--success); bottom: 20%; left: 15%; animation-delay: 4s; animation-duration: 10s; }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(30px) scale(0.95); } to { opacity: 1; transform: translateY(0) scale(1); } }
        @keyframes bounce { 0%, 20%, 50%, 80%, 100% { transform: translateY(0); } 40% { transform: translateY(-10px); } 60% { transform: translateY(-5px); } }
        @keyframes float { 0%, 100% { transform: translateY(0) rotate(0deg) scale(1); } 33% { transform: translateY(-20px) rotate(10deg) scale(1.05); } 66% { transform: translateY(10px) rotate(-5deg) scale(0.95); } }
        @keyframes shake { 0%, 100% { transform: translateX(0); } 10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); } 20%, 40%, 60%, 80% { transform: translateX(5px); } }
        @keyframes slideInDown { from { opacity: 0; transform: translateY(-20px); } to { opacity: 1; transform: translateY(0); } }
        .back-link { display: inline-flex; align-items: center; gap: 10px; color: white; text-decoration: none; font-weight: 500; margin-bottom: 25px; transition: all 0.3s; background: rgba(255, 255, 255, 0.2); padding: 10px 20px; border-radius: 50px; backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.3); }
        .back-link:hover { color: white; background: rgba(255, 255, 255, 0.3); transform: translateX(-5px); text-decoration: none; }
        .form-footer { text-align: center; margin-top: 25px; padding-top: 25px; border-top: 1px solid #e1e5ee; color: #6c757d; font-size: 0.9rem; }
        .pulse-effect { animation: pulse 2s infinite; }
        @keyframes pulse { 0% { box-shadow: 0 0 0 0 rgba(67, 97, 238, 0.4); } 70% { box-shadow: 0 0 0 15px rgba(67, 97, 238, 0); } 100% { box-shadow: 0 0 0 0 rgba(67, 97, 238, 0); } }
        .subject-preview { background: linear-gradient(135deg, #f8f9fa, #e9ecef); border-radius: 12px; padding: 20px; margin-top: 15px; border: 2px dashed #dee2e6; text-align: center; transition: all 0.3s ease; display: none; }
        .subject-preview.active { display: block; animation: fadeInUp 0.5s ease; }
        .preview-icon { font-size: 2.5rem; color: var(--primary); margin-bottom: 10px; }
        .preview-text { font-size: 1.2rem; font-weight: 600; color: var(--dark); margin: 0; }
        @media (max-width: 576px) { .form-card { border-radius: 15px; } .form-header { padding: 30px 20px; } .form-body { padding: 30px 20px; } .form-control { padding: 14px 15px 14px 50px; } .btn-submit { padding: 16px; } .form-icon { font-size: 3.5rem; } }
        .existing-subjects { margin-top: 30px; padding: 20px; background: rgba(255, 255, 255, 0.8); border-radius: 15px; border: 1px solid rgba(255, 255, 255, 0.3); }
        .subjects-list { display: grid; grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); gap: 10px; margin-top: 15px; }
        .subject-tag { background: linear-gradient(135deg, var(--primary-light), var(--primary)); color: white; padding: 8px 12px; border-radius: 20px; font-size: 0.85rem; font-weight: 500; text-align: center; animation: fadeInUp 0.5s ease; }
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
                    <i class="fas fa-book form-icon"></i>
                    <h2>Add New Subject</h2>
                    <p class="mb-0">Expand your academic curriculum</p>
                </div>
            </div>
            
            <div class="form-body">
                <form method="POST" id="subjectForm">
                    <div class="form-group">
                        <label class="form-label" for="subject_name">
                            <i class="fas fa-book-open me-2"></i>Subject Name
                        </label>
                        <div class="input-with-icon">
                            <input type="text" id="subject_name" name="subject_name" class="form-control" 
                                   placeholder="Enter subject name (e.g., Mathematics, Science)" 
                                   required 
                                   value="<?php echo isset($_POST['subject_name']) ? htmlspecialchars($_POST['subject_name']) : ''; ?>"
                                   oninput="updatePreview(this.value)">
                            <i class="fas fa-book input-icon"></i>
                        </div>
                        
                        <!-- Subject Preview -->
                        <div class="subject-preview" id="subjectPreview">
                            <div class="preview-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <p class="preview-text" id="previewText">Subject Preview</p>
                        </div>
                    </div>
                    
                    <?php
                    if(isset($_POST['save'])){
                        $sub = trim($_POST['subject_name']);
                        
                        if(!empty($sub)) {
                            // Check if subject already exists
                            $check_subject = mysqli_query($conn, "SELECT * FROM subjects WHERE LOWER(subject_name) = LOWER('$sub')");
                            
                            if(mysqli_num_rows($check_subject) > 0) {
                                echo '<div class="error-message">
                                        <i class="fas fa-exclamation-triangle fa-lg"></i>
                                        <div>
                                            <strong>Subject Exists!</strong> "'.$sub.'" is already in the system.
                                        </div>
                                      </div>';
                            } else {
                                mysqli_query($conn, "INSERT INTO subjects(subject_name) VALUES('$sub')");
                                echo '<div class="success-message">
                                        <i class="fas fa-check-circle fa-lg"></i>
                                        <div>
                                            <strong>Success!</strong> "'.$sub.'" has been added to the curriculum.
                                        </div>
                                      </div>';
                            }
                        }
                    }
                    ?>
                    
                    <button type="submit" name="save" class="btn-submit pulse-effect">
                        <i class="fas fa-plus-circle"></i> 
                        <span>Add Subject</span>
                    </button>
                </form>
                
                <!-- Existing Subjects -->
                <div class="existing-subjects">
                    <h6 class="text-center mb-3">
                        <i class="fas fa-list-ul me-2"></i>Current Subjects
                    </h6>
                    <div class="subjects-list">
                        <?php
                        $existing_subjects = mysqli_query($conn, "SELECT subject_name FROM subjects ORDER BY subject_name");
                        $subject_count = 0;

                        while($subject_row = mysqli_fetch_assoc($existing_subjects)){
                            echo '<div class="subject-tag">'.$subject_row['subject_name'].'</div>';
                            $subject_count++;
                        }

                        if($subject_count == 0) {
                            echo '<p class="text-center text-muted w-100">No subjects added yet</p>';
                        }
                        ?>
                    </div>
                </div>
                
                <div class="form-footer">
                    <p class="mb-0">
                        <i class="fas fa-info-circle me-1"></i>
                        Subjects will be available for exam creation and student enrollment
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Update subject preview
        function updatePreview(subjectName) {
            const preview = document.getElementById('subjectPreview');
            const previewText = document.getElementById('previewText');
            
            if (subjectName.trim() !== '') {
                preview.classList.add('active');
                previewText.textContent = subjectName;
            } else {
                preview.classList.remove('active');
                previewText.textContent = 'Subject Preview';
            }
        }

        // Auto dismiss success/error messages after 5 seconds
        setTimeout(() => {
            const messages = document.querySelectorAll('.success-message, .error-message');
            messages.forEach(msg => msg.style.display = 'none');
        }, 5000);
    </script>
</body>
</html>
