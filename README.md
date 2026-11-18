# Laravel Role-Based Access Control (RBAC) API

**Framework:** Laravel  
**Authentication:** Laravel Sanctum  
**Database:** MySQL  
**API Testing:** Postman  
**Version Control:** Git and GitHub

---

## Project Description

This project demonstrates Authentication and Role-Based Access Control (RBAC) using Laravel Sanctum. It allows authenticated users to access protected API endpoints depending on their assigned roles, such as Admin and Guardian.

The system verifies user identities through authentication and restricts access to specific resources based on user roles.

## API Routes

| Method | Endpoint | Description | Access |
|---|---|---|---|
| POST | `/api/login` | User login | Public |
| GET | `/api/user` | Get authenticated user | Authenticated |
| POST | `/api/logout` | User logout | Authenticated |
| GET | `/api/guardian/dashboard` | Access Guardian Dashboard | Guardian only |
| GET | `/api/admin/dashboard` | Access Admin Dashboard | Admin only |
| GET | `/api/guardian` | Access shared Guardian endpoint | Authenticated |

## HTTP Response Codes

| Status Code | Description |
|---|---|
| 200 OK | Request successful. |
| 401 Unauthorized | No valid authentication token was provided. |
| 403 Forbidden | The user is authenticated but does not have permission to access the requested resource. |
| 404 Not Found | The requested API endpoint does not exist. |

## Authentication vs. Authorization

**Authentication** is the process of verifying the identity of a user through their login credentials. It determines whether the user is valid and allowed to access the system.

**Authorization** determines what an authenticated user is allowed to access based on their assigned role and permissions.

## Why does a Student receive 403 when accessing the Admin Dashboard, but a request without a token receives 401?

A Student receives **403 Forbidden** because the user is successfully authenticated but does not have the required Admin role to access the Admin Dashboard.

On the other hand, a request without a token receives **401 Unauthorized** because the system cannot verify the identity of the requester. Authentication is required before accessing protected API routes.

In short:

- **401:** The user is not authenticated.
- **403:** The user is authenticated but does not have permission.

## Local Testing Instructions

Follow these steps to run the project locally:

1. Clone or download the GitHub repository.

2. Open the project folder in Visual Studio Code.

3. Install the project dependencies:

   ```bash
   composer install
   ```

4. Create your environment file:

   ```bash
   cp .env.example .env
   ```

5. Generate the application key:

   ```bash
   php artisan key:generate
   ```

6. Configure your database credentials in the `.env` file.

7. Run database migrations if required:

   ```bash
   php artisan migrate
   ```

8. Start the Laravel development server:

   ```bash
   php artisan serve
   ```

9. Open Postman and test the API endpoints using the appropriate HTTP methods and authentication tokens.

10. For protected routes, select **Bearer Token** under the Authorization tab and provide a valid Sanctum token.

## Postman Screenshots

The eight Postman testing screenshots are included in the `screenshots/` directory.

These screenshots demonstrate the API authentication, role-based access restrictions, successful requests, and unauthorized access responses.

## Project Structure

```text
project/
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
├── resources/
├── routes/
│   ├── api.php
│   └── web.php
├── screenshots/
│   ├── 01-login.png
│   ├── 02-...
│   ├── 03-admin-denied.png
│   ├── 04-student-login.png
│   ├── 05-student-allowed.png
│   ├── 06-student-denied.png
│   ├── 07-shared-route.png
│   └── 08-no-token.png
├── .env.example
├── .gitignore
└── README.md
```

## Technologies Used

- Laravel
- PHP
- MySQL
- Laravel Sanctum
- Postman
- Git
- GitHub

## Security Reminder

For security purposes, the following files and folders must not be uploaded to the public repository:

- `.env`
- `vendor/`
- `node_modules/`
- Database dumps containing real user information
- Passwords and personal access tokens

The `.gitignore` file is used to prevent sensitive files and unnecessary dependencies from being committed.

## Author

Laravel RBAC API Project

**Academic Activity:** Authentication and Role-Based Access Control (RBAC)