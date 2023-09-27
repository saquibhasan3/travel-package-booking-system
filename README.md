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

4. Setting Up the .env File
    Before you can run the application, you need to configure your environment variables in the `.env` file. Follow these steps:

    1. **Copy the .env.example file:**

    In the project root directory, you'll find a file named `.env.example`. Make a copy of this file and rename it to `.env`.

    ```bash
    cp .env.example .env

5. Create a new MySQL database and update the .env file with your database configuration.

    --dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password

6. Run migrations to create the necessary database tables:

   ```bash
   php artisan migrate

7. Generate the application key:

   ```bash
   php artisan key:generate

8. Start the development server:

   ```bash
   php artisan serve

9. Access the application in your web browser: http://localhost:8000

### Usage

- Register as a customer to book travel packages.
- Agents can add, edit, and delete travel packages, as well as view customer bookings.
- Customers can view and book available travel packages.

### Deployment

To deploy this project to a production environment, you'll need to set up a web server (e.g., Apache or Nginx) and configure it to serve the project's public directory. Don't forget to update your `.env` file with production settings and consider using HTTPS for secure communication.

## Contributing

We welcome contributions from the community. If you have any ideas, improvements, or bug fixes, please open an issue or submit a pull request.

## License

This project is open-source and available under the [MIT License](LICENSE).

## Acknowledgments

- Laravel community for providing a powerful PHP framework.
- Bootstrap for responsive design components.
- [Font Awesome](https://fontawesome.com/) for icons.