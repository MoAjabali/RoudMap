# Roud - Tech Career Roadmap Platform

**Roud** is a comprehensive educational platform designed to help aspiring developers and tech professionals visualize and navigate their career paths. It provides structured "roadmaps" for various technical specializations, breaking them down into manageable skills and curated learning resources.

Developed by: **Mohammed Al-Jablai**

---

## 🚀 Key Features

- **🗺️ Interactive Career Roadmaps**: Explore detailed learning paths for multiple tech specializations (Frontend, Backend, Mobile Development, and more).
- **📊 Granular Skill Breakdown**: Each specialization is dissected into specific skills required to master the field.
- **📚 Curated Learning Resources**: Access hand-picked educational materials including articles, videos, and documentation for every individual skill.
- **🔐 User Personalization**: Secure authentication system (Login/Register) to track progress and personalize the learning experience.
- **📈 Live Statistics**: Real-time tracking of available specializations, skills, and active learners.
- **📱 Responsive Design**: A modern, mobile-friendly interface built with Bootstrap 5.
- **💬 Support & FAQ**: Built-in contact forms, FAQ sections, and policy documentation for a professional user experience.

---

## 🛠️ Tech Stack

- **Backend**: PHP (Vanilla PHP with structured Model-Controller separation)
- **Database**: MySQL (PDO for secure database interactions)
- **Frontend**: 
    - Bootstrap 5 (Styling Framework)
    - FontAwesome (Icons)
    - Vanilla JavaScript (Interactions)
- **Architecture**: Organized directory-based structure for modular development and easy scaling.

---

## 📁 Project Structure

```text
roud/
├── app/                # Core Application Logic
│   ├── controllers/    # Business Logic & Request Handlers
│   ├── models/         # Database Interactions & Data Structures
│   ├── database/       # Schema Definitions & Connection logic
│   └── helpers/        # Utility functions (Toasts, Redirects)
├── assets/             # UI Components & Styling
│   ├── css/            # Custom Stylesheets
│   ├── js/             # Frontend Logic
│   └── layout/         # Reusable Header/Footer components
├── auth/               # User Authentication (Login, Register)
├── specializations/    # Specialization-specific views and logic
├── skills/             # Skill-specific views
├── profile/            # User Profile management
└── index.php           # Landing Page with Hero section and Stats
```

---

## 🏁 Setup & Installation

Follow these steps to set up the project locally:

### 1. Prerequisites
- PHP 7.4 or higher
- MySQL Server (via XAMPP / WAMP / MAMP)
- A local web server (Apache)

### 2. Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/MoAjabali/roud.git
   ```
2. Move the project folder to your server's root directory (e.g., `htdocs`).

### 3. Database Configuration
1. Create a new MySQL database named `roud`.
2. Import the SQL schema (located in `app/database/` if available).
3. Update your database connection settings in the application configuration.

### 4. Running the Project
Navigate to `http://localhost/roud` in your web browser.

---

## 🤝 Contact & Support

For any inquiries or feedback, feel free to reach out via the built-in contact page or check the FAQ.

**Developer**: Mohammed Al-Jablai  
**GitHub**: [@MoAjabali](https://github.com/MoAjabali)

---
Built with ❤️ by Mohammed Al-Jablai.
