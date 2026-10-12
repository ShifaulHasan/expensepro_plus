# 💰 ExpenseProPlus

**ExpensePro+** is a web-based expense management application built with **PHP** using the **MVC (Model–View–Controller)** architecture. It helps users record, organize, and keep track of their expenses in one place.

---

## ✨ Features

- Add, view, edit, and delete expense records
- Organized MVC structure for clean, maintainable code
- Database-driven storage with MySQL
- Custom CSS styling for a clean interface
- Extended with additional features beyond the basic version ("Plus")

> 📝 *Update this list with your exact features (e.g. categories, monthly summary, reports, user login, budget limits).*

---

## 🧰 Tech Stack

| Layer        | Technology             |
|--------------|------------------------|
| Backend      | PHP (MVC pattern)      |
| Database     | MySQL / MariaDB        |
| Frontend     | HTML, CSS              |
| Local server | XAMPP / WAMP / LAMP    |

---

## 📁 Project Structure

```
expensepro_plus/
├── assets/
│   └── CSS/          # Stylesheets
├── config/           # Configuration (database connection, etc.)
├── controllers/      # Handle requests and application logic
├── models/           # Database queries and data handling
├── views/            # Pages and UI templates
└── index.php         # Entry point of the application
```

---

## 🚀 Getting Started

### Prerequisites
- [XAMPP](https://www.apachefriends.org/) (Apache + PHP + MySQL) or similar
- A web browser

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/ShifaulHasan/expensepro_plus.git
   ```

2. **Move the project** to your server's web root
   - XAMPP: `C:/xampp/htdocs/expensepro_plus`

3. **Start Apache and MySQL** from the XAMPP Control Panel.

4. **Set up the database**
   - Open [phpMyAdmin](http://localhost/phpmyadmin) and create a new database
   - Create the required tables (or import the SQL file, if you add one)

5. **Configure the connection**
   Open the files inside the `config/` folder and set your database host, username, password, and database name.

6. **Run the project**
   ```
   http://localhost/expensepro_plus/index.php
   ```

---



## 🔮 Future Improvements

- Charts and visual reports
- Export to PDF / CSV
- Budget alerts
- Password hashing and prepared statements for stronger security

---

## 👨‍💻 Author

**Md. Shifaul Hasan**
GitHub: [@ShifaulHasan](https://github.com/ShifaulHasan)
