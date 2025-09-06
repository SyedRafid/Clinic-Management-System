# Clinic-Management-System

A **web-based Clinic Management System**. The system streamlines **patient record management, appointment scheduling, and medical history tracking**, replacing inefficient paper-based processes with a secure, user-friendly digital solution.

---

## 🚀 Features

### 👨‍⚕️ Admin

- Secure login with email & password
- Register and manage doctors
- Add, edit, delete patient information
- Book appointments for non-registered patients
- Monitor login activities (detect suspicious accounts)
- Generate reports between specific dates

### 🧑‍⚕️ Doctor

- Secure login & profile management
- Manage patient information and update medical records
- View appointment history & update status

### 🧑‍💻 Patient (User)

- Self-registration & login
- Book appointments
- View appointment history
- Access personal medical history

---

## 🏗️ System Architecture

- **Frontend:** HTML, CSS, Bootstrap, JavaScript
- **Backend:** PHP
- **Database:** MySQL (phpMyAdmin)
- **Web Server:** Apache

---

## 🚀 Setup Instructions

### ✅ Requirements

- PHP 7.4+
- MySQL
- Apache Server (e.g., XAMPP, WAMP, LAMP)
- phpMyAdmin (for DB import)

### 📥 1. Clone the Project

```bash
git clone https://github.com/SyedRafid/Clinic-Management-System.git
cd Clinic-Management-System
```

### 📂 2. Importing the Database using phpMyAdmin

This project uses a MySQL database named **`cms_db`**. To set it up locally, follow these steps:

1. **Create the Database:**

   - Open **phpMyAdmin** in your browser (e.g., http://localhost/phpmyadmin).
   - Click on the **Databases** tab.
   - In the "Create database" field, enter the name:
     ```
     cms_db
     ```
   - Choose the collation (e.g., `utf8mb4_general_ci`) and click **Create**.

2. **Import the SQL File:**

   - Click on the newly created `cms_db` database in phpMyAdmin.
   - Go to the **Import** tab.
   - Click **Choose File** and browse to the project folder's `database` directory.
   - Select the SQL file (e.g., `cms_db.sql`).
   - Click **Go** at the bottom to start the import.
   - Wait for the success message confirming the import.

### 🗝️ Admin Login (Default)

- **Email:** syed.shuvon@gmail.com
- **Password:** syed.shuvon@gmail.com

### 🗝️ Doctor Login (Default)

- **Email:** amivbmbc@gmail.com
- **Password:** amivbmbc@gmail.com

### 🗝️ Doctor Login (Default)

- **Email:** bonnie95@gmail.com
- **Password:** bonnie95@gmail.com

> ⚠️ This is the default account. Please log in and change the password immediately after setup for security.

---

## 🔒 Security Features

- Role-based access (Admin / Doctor / Patient)

- Session-based authentication

- Restricted data access (patients see only their own records)

- Basic suspicious activity detection

---

## 🧪 Testing

- Unit Testing: PHP functions (CRUD)

- Integration Testing: Database operations with MySQL

- User Testing: Conducted with clinic staff & patients

---

## 📊 Methodology

- Developed using Rapid Application Development (RAD)

- Iterative prototyping for faster user feedback and system improvement

---

## 🙏 Thank You!

Thank you for checking out this project!  
If you find it helpful, please consider giving it a ⭐️ on GitHub.

Feel free to open issues or submit pull requests — contributions and feedback are always welcome!  

Happy coding and best of luck managing your clinic operations efficiently! 🏥✨
