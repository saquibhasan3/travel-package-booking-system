# Travel Package Booking System

This is a simplified travel package booking system implemented in Laravel. It allows agents to manage travel packages and customers to book them.

## Features

- User Authentication:
  - Simple registration and login functionality for both agents and customers using Laravel Middleware.

- Dashboard (For Agents):
  - Add new travel packages with essential details: destination, price, duration, and a brief description.
  - Edit and delete existing packages.
  - View a list of all bookings made by customers.

- Travel Package Display (For Customers):
  - View available travel packages in a list format.
  - Search for packages based on destination.
  - Book a package by selecting it and providing necessary details (name, contact, and travel date).

- UI Enhancements:
  - Use JavaScript to enhance the user experience, such as filtering the package list in real-time.
  - Implement basic responsive design for mobile views.

## Getting Started

These instructions will help you set up and run the project on your local machine for development and testing purposes. 

### Prerequisites

- PHP (>=7.3)
- Composer
- Laravel CLI
- MySQL or other supported database systems
- Web server (e.g., Apache, Nginx)

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/saquibhasan3/travel-package-booking-system.git

2. Navigate to the project folder:

   ```bash
   cd travel-package-booking-system

3. Install dependencies:

   ```bash
   composer install

4. Create a new MySQL database and update the .env file with your database configuration.

5. Run migrations to create the necessary database tables:

   ```bash
   php artisan migrate

6. Generate the application key:

   ```bash
   php artisan key:generate

7. Start the development server:

   ```bash
   php artisan serve

8. Access the application in your web browser: http://localhost:8000


