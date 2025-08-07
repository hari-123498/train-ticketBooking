# 🚆 Train Ticket Booking System

A simple web-based *Train Ticket Booking System* built using *HTML, CSS, Bootstrap* for frontend and *PHP & MySQL* (with *XAMPP*) for backend functionality.

## 📋 Features

- 🏠 Home Page
- 📝 User Registration
- 🔐 User Login
- 🚪 Logout functionality
- 🎫 Train ticket booking form
- 💾 Data stored and fetched from MySQL
- 📱 Responsive design using Bootstrap

## 🗂 Project Structure

/train-ticket-booking/
│
├── css/               → Custom stylesheets  
├── php/               → Backend PHP files (login, register, booking, etc.)  
├── sql/               → SQL file to import database schema  
├── images/            → Icons and banners  
├── index.php          → Homepage  
├── login.php          → Login page  
├── register.php       → Registration page  
├── logout.php         → Logout script  
├── booking.php        → Ticket booking form  
└── README.md          → This file

## 🛠 Setup Instructions

### 🔧 Requirements
- [XAMPP](https://www.apachefriends.org/index.html) (Apache + MySQL + PHP)

### 🚀 Steps to Run

1. *Start XAMPP*
   - Open XAMPP Control Panel
   - Start *Apache* and *MySQL*

2. *Move Project*
   - Copy the project folder (e.g., train-ticket-booking) to:
     C:/xampp/htdocs/

3. *Import Database*
   - Open your browser and go to: http://localhost/phpmyadmin
   - Create a database (e.g., train_db)
   - Import the train_db.sql file from the /sql/ folder

4. *Run the Project*
   - Open browser and go to:  
     http://localhost/train-ticket-booking/

## 📌 Notes

- This is a basic project suitable for beginners learning PHP + MySQL.
- No advanced authentication (e.g., hashing or validation) is included — ideal for learning purposes.

## 👨‍💻 Author

Developed by: Hari Aravapalli 
Feel free to customize this project or enhance it with new features!

## 📜 License

This project is open source and free to use for educational purposes.
