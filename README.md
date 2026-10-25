# Zeowl Infotech - PHP Laravel Backend API

A complete, production-ready REST API and management backend for Zeowl Infotech, built with **PHP 8.2+** and **Laravel 12**.

---

## 🚀 Quick Start

### 1. Start Server
Run the batch launcher from the root or inside `backend/`:
```bash
# From workspace root:
.\start-backend.bat

# Or directly in terminal:
cd backend
$env:Path = "C:\xampp\php;$env:Path"
php artisan serve --port=8080
```
- **Web Admin Dashboard & API Explorer:** `http://localhost:8080/dashboard`
- **Filament Admin Panel:** `http://localhost:8080/admin`
- **REST API Base URL:** `http://localhost:8080/api`

---

## 🔐 Credentials & Default Admin

- **Admin Email:** `admin@zeowl.com`
- **Admin Password:** `password123`

---

## 📡 REST API Reference

### Public Endpoints
| Method | Endpoint | Description |
|---|---|---|
| `GET` | `/api/health` | System health check and runtime info |
| `POST` | `/api/contact` | Submit a client inquiry |
| `POST` | `/api/newsletter` | Subscribe to newsletter |
| `GET` | `/api/services` | Retrieve list of all active services |
| `GET` | `/api/services/{slug}` | Retrieve single service details |
| `GET` | `/api/portfolio` | Retrieve portfolio projects (supports `?category=...`) |
| `GET` | `/api/portfolio/{slugOrId}` | Retrieve single project case study |
| `GET` | `/api/blogs` | Retrieve paginated blog posts (supports `?q=...` & `?category=...`) |
| `GET` | `/api/blogs/{slug}` | Retrieve single blog post |
| `GET` | `/api/testimonials` | Retrieve client reviews & ratings |
| `POST` | `/api/auth/login` | Obtain Sanctum Bearer token |

### Protected Endpoints (Bearer Token required)
Include header: `Authorization: Bearer <your-token>`

| Method | Endpoint | Description |
|---|---|---|
| `POST` | `/api/auth/logout` | Revoke current token |
| `GET` | `/api/auth/me` | Current user profile |
| `GET` | `/api/admin/dashboard` | Aggregated metrics & recent leads |
| `GET` | `/api/admin/contacts` | Paginated inquiries with status filter |
| `PATCH` | `/api/admin/contacts/{id}/status` | Update inquiry status & notes |
| `DELETE` | `/api/admin/contacts/{id}` | Delete inquiry |
| `POST` | `/api/admin/services` | Create new service |
| `PUT` | `/api/admin/services/{id}` | Update existing service |
| `DELETE`| `/api/admin/services/{id}` | Delete service |
| `POST` | `/api/admin/portfolio` | Create portfolio project |
| `PUT` | `/api/admin/portfolio/{id}`| Update portfolio project |
| `DELETE`| `/api/admin/portfolio/{id}`| Delete portfolio project |
| `POST` | `/api/admin/blogs` | Create blog post |
| `PUT` | `/api/admin/blogs/{id}` | Update blog post |
| `DELETE`| `/api/admin/blogs/{id}` | Delete blog post |

---

## 🗄️ Database Configuration

By default, the backend uses **SQLite** (`database/database.sqlite`), which works out-of-the-box without starting any database servers.

### Switching to MySQL (XAMPP):
1. Start **MySQL** in XAMPP Control Panel.
2. Create database `zeowl_db`:
   ```sql
   CREATE DATABASE zeowl_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```
3. Update `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=zeowl_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```
4. Run migrations and seeds:
   ```bash
   php artisan migrate --seed
   ```
