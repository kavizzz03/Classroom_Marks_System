# 🎓 Classroom Marks & Exam Result Management System  
A modern and fully automated **student result management system** built with PHP, MySQL, JavaScript, Bootstrap, and PHPMailer.  
Designed for schools, teachers, parents, and students to view results, analyze performance, and download exam papers.

---

## 🚀 Features

### ✅ **Admin/Teacher Panel**
- Add subjects, exams, and student results  
- Upload exam papers (PDF)  
- Automatic email alerts to students & parents  
- Bar chart analytics (performance visualization)  
- View student performance history  
- Creative UI with smooth navigation  

### 👨‍👩‍👦 **Parent Portal (No Login Required)**
- Select subject  
- View updated exams  
- View results of all students  
- Leaderboard (highest to lowest marks)  
- Part 1 & Part 2 marks included  
- Secure PDF exam paper viewer  

### 🎓 **Student Portal**
- View results  
- View exam history  
- Download exam papers  
- See rank & leaderboard  
- Receive email notifications  

---

## 📊 Dashboard Visualizations
- Full bar chart representation  
- High-resolution analytics  
- Auto-updated exam statistics  
- Clean, attractive academic UI  

---

## ✉️ Email Notifications (PHPMailer)
Students receive an automatic **"New Exam Result Released"** email with:  
- Student name  
- Subject  
- Direct quick-links for:
  - Student portal  
  - Parent result portal  
- No-reply format  
- Google App Password-based secure sending  

---

## 📁 File Upload Support
- PDF  
- Paper images  
- Documents related to exams  
All stored securely and retrievable from the admin panel.

---

## 🕒 Time Zone Support
✔ Automatically fetches **current Colombo, Sri Lanka** time for timestamping new results.

---

## ⚙️ Technologies Used
- **HTML, CSS, JavaScript, Bootstrap**
- **PHP (Backend)**
- **MySQL (Database)**
- **PHPMailer (Email System)**
- **Chart.js (Bar Charts)**

---

## 📂 Project Structure
```
📦 project/
 ┣ 📂 admin/
 ┣ 📂 students/
 ┣ 📂 parents/
 ┣ 📂 upload_papers/
 ┣ 📂 includes/
 ┃ ┣ header.php
 ┃ ┣ footer.php
 ┣ 📂 api/
 ┣ db.php
 ┣ sendMail.php
 ┣ index.php
 ┣ README.md
```

---

## 🔧 Installation Guide

### 1️⃣ Clone the repository
```bash
https://github.com/kavizzz03/Classroom_Marks_System.git
```

### 2️⃣ Setup database
- Import the SQL file  
- Update database credentials in `db.php`

### 3️⃣ Configure email (PHPMailer)
Add your Gmail app password in:
```
sendMail.php
```

### 4️⃣ Run project
Place into XAMPP → `htdocs` or a live server.

---

## 👨‍💻 Contributing
Pull Requests are welcome! If you’d like enhancements or bug fixes, feel free to submit.

---

## 📜 License
This project is open-source and free to use.

---

## ⭐ Support
If you like this project:  
**→ Star the repo 🌟**  
**→ Share with your friends and school developers**

---

Made with ❤️ by Kavindu – Alpha Software Solutions
