# Career Guidance Chatbot

An intelligent web-based platform designed to help students explore suitable career paths using machine learning and connect with alumn.

## Project Overview

The Career Guidance and Alumni Connect System is an interactive web application that allows students to:
- Predict career paths based on their skills and interests.
- Get personalized recommendations powered by machine learning.
- View alumni profiles categorized by domain and company.
- Connect with alumni for mentorship and career advice.

Unlike static platforms or disconnected career fairs, this system offers dynamic, real-time insights and fosters a strong student-alumni ecosystem.

---

## Features

- Career prediction using a trained machine learning model.
- Skill-based input form for personalized recommendations.
- Alumni directory filterable by company and career domain.
- Modern and responsive UI using Bootstrap.
- Login system with session management (Admin).
- personalized career roadmap

---

## Tools and Technologies Used

### Frontend
- HTML5 – Structure and layout
- CSS3 – Custom styling
- Bootstrap – Responsive design and components

### Backend
- PHP – Server-side scripting and logic
- Python – Machine learning model for career prediction
- Pickle – Model serialization and integration

### Database
- MySQL – Relational database to store user data, alumni info, and logs

### Machine Learning
- Scikit-learn – For training models (Random Forest, Decision Tree, etc.)
- Pandas, NumPy – For data preprocessing

### Additional Tools
- Git – Version control for collaborative development
- XAMPP – Local LAMP stack for development and testing

---

## System Architecture

The system follows a hybrid architecture:
- Frontend built with HTML/CSS, and Bootstrap.
- Backend logic with PHP and predictions handled by Python.
- MySQL database for persistent storage.
- Python and PHP communicate.

---

## Installation and Setup

1. Clone the repository
   ```bash
   https://github.com/SiddharthGogireddy/chatbot.git
   cd chatbot
   ```

2. Set up a local PHP server (e.g., XAMPP/WAMP)
   - Move project files to the `htdocs` folder.
   - Start Apache and MySQL.

3. Import the MySQL database
   - Open MySQL workbench or shell.
   - Create a new database.
   - Import the provided .sql file (if available).

4. Start using the platform
   - Open `http://localhost/chatbot_final/main.php` in your browser.

---

## Contributors
 
- Aditya Y – Machine Learning Model, Backend Integration  
- Siddharth G – Frontend Development, version control 
- Siddhartha K – Database Design, Alumni Module, UI/UX
