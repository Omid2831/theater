# Aurora Theater Management System

## Overview

**Aurora Theater** is a web-based management system designed to streamline the operations of a theater. The system provides functionalities for managing shows (voorstellingen), tickets, staff (medewerkers), and user accounts. It is built using PHP with a custom MVC framework and a MySQL database backend.

---

## Aim of the Project

The aim of this project is to provide an integrated platform for theater staff and visitors to:

- View and manage upcoming shows and performances.
- Reserve and manage tickets with seat selection and barcode validation.
- Manage staff and user accounts with role-based access.
- Offer a seamless and user-friendly experience for both administrators and visitors.

---

## Main Features & Functionality

### 1. **Show Management (Voorstellingen)**

- Create, update, and delete theater performances.
- View a list of all upcoming and past shows with details such as name, description, date, time, ticket availability, and assigned staff.

### 2. **Ticket Management**

- Reserve tickets for specific shows with seat selection.
- Generate unique barcodes for each ticket.
- Scan and validate tickets using barcode scanning (with real-time feedback on validity).
- View, update, and delete tickets.

### 3. **Staff Management (Medewerkers)**

- Add, update, and remove staff members.
- Assign staff to specific shows.
- View all staff and their roles.

### 4. **User Account Management**

- User registration and login with secure password hashing.
- Role-based access (Administrator, Staff, Visitor).
- Manage user details and account status.

### 5. **Database Structure**

- Comprehensive SQL schema for users, roles, staff, visitors, shows, tickets, prices, and notifications.
- Example data for quick setup and testing.

### 6. **Modern UI**

- Responsive design using Bootstrap.
- Clean and accessible interface for both desktop and mobile users.

### 7. **Utilities**

- Barcode generator for tickets.
- Search and filter for shows and tickets.
- Toast notifications for user feedback.

---

## Project Structure

```
theater/
  app/
    config/         # Configuration files (database, app root, etc.)
    controllers/    # MVC controllers for each module
    db/             # Database schema and seed scripts
    libraries/      # Core framework classes (MVC, database, etc.)
    Models/         # Data models for each entity
    views/          # HTML/PHP views for all pages and modules
  public/
    css/            # Stylesheets
    img/            # Images and logos
    js/             # JavaScript utilities (barcode, scanner, etc.)
    index.php       # Public entry point
  GUIDELINES.md     # Git and workflow guidelines
```

---

## Getting Started

### Prerequisites

- PHP 8.x or higher
- MySQL 8.x or higher
- Composer (optional, for dependency management)
- Web server (Apache recommended)

### Installation

1. **Clone the repository:**

   ```sh
   git clone https://github.com/Omid2831/theater.git
   cd theater
   ```

2. **Set up the database:**

   - Import the SQL script from `app/db/createscript.sql` into your MySQL server.
   - Update `app/config/config.php` with your database credentials if needed.

3. **Configure your web server:**

   - Set the document root to the `public/` directory.
   - Ensure URL rewriting is enabled (see `.htaccess`).

4. **Access the application:**
   - Open your browser and navigate to the configured URL (e.g., `http://localhost/theater`).

---

## Version Control & Workflow

- Follows **GitFlow** branching strategy.
- Uses **Conventional Commits** for clear commit messages.
- See `GUIDELINES.md` for detailed workflow and command cheat sheet.

---

## Team

- [**Omid2831**](https://github.com/Omid2831) — Scrum Master && Developer
- [**OdiMatar**](https://github.com/OdiMatar) — Developer
- [**Rick**](https://github.com/341381R) — Developer

---

## License

This project is provided for educational and demonstration purposes. For production use, please review and update security, authentication, and deployment settings.

---

## Contact

For questions or suggestions, please open an issue on the repository or contact the author via GitHub.
