# BlueCloud Enrollment System

A web-based student enrollment system built with Laravel. The system supports online student enrollment, PayPal payment processing, certificate of registration (COR) requests, clearance management, and administrative controls for managing students, programs, courses, and academic schedules.

## Features

- **Student Portal** — Online enrollment, payment via PayPal, COR requests, clearance viewing, and profile management
- **Admin Portal** — Manage applicants, enrolled students, programs, courses, assessments, academic schedules, and clearances
- **PayPal Integration** — Sandbox and live payment processing via `srmklive/paypal`
- **PDF Generation** — COR and document exports via `barryvdh/laravel-dompdf`
- **DataTables** — Server-side data tables via `yajra/laravel-datatables-oracle`

## Requirements

- PHP >= 8.5
- Composer
- Node.js & npm
- MySQL

## Installation

1. **Clone the repository**

   ```bash
   git clone https://github.com/MaureenDadap/bluecloud-enrollment.git
   cd bluecloud-enrollment
   ```

2. **Install PHP dependencies**

   ```bash
   composer install
   ```

3. **Install JavaScript dependencies**

   ```bash
   npm install
   ```

4. **Set up the environment file**

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure the database** — Edit `.env` and set your database credentials:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=bluecloud_enrollment
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. **Run migrations and seed the database**

   ```bash
   php artisan migrate --seed
   ```

7. **Build front-end assets**

   ```bash
   npm run build
   ```

8. **Start the development server**

   ```bash
   php artisan serve
   ```

   The application will be available at `http://localhost:8000`.

## Default Accounts

### Admin

| Field    | Value   |
|----------|---------|
| Username | `admin` |
| Password | `admin` |

## PayPal Sandbox Credentials

Use the following sandbox buyer account to test PayPal payments:

| Field          | Value                                    |
|----------------|------------------------------------------|
| Email          | `sb-dq4hu51792815@personal.example.com`  |
| Password       | `ssJM4}X-`                               |
| Country        | United States                            |
| Name           | John Doe                                 |
| Phone          | 2028250400                               |

**Sandbox VISA Card:**

| Field       | Value              |
|-------------|--------------------|
| Card Number | `4032039452888573` |
| Expiry      | `07/2031`          |
| CVV         | Any 3 digits       |

## Application Structure

| Area                    | Path / Route prefix      |
|-------------------------|--------------------------|
| Student dashboard       | `/student/dashboard`     |
| Online enrollment       | `/student/online-enrollment` |
| Payment                 | `/enrollment/payment`    |
| COR request             | `/student/cor`           |
| Clearance               | `/student/clearance`     |
| Student profile         | `/student/profile`       |
| Admin dashboard         | `/admin/dashboard`       |
| Manage applicants       | `/admin/new-enrollees`   |
| Manage students         | `/admin/students`        |
| Manage programs         | `/admin/programs`        |
| Manage courses          | `/admin/courses`         |
| Assessments             | `/admin/assessments`     |
| Academic schedule       | `/admin/academic-schedule` |
| Clearances              | `/admin/clearances`      |

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
