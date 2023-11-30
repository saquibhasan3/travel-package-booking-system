# Travel Package Booking System

Greetings, Earthlings! 🌍 Welcome to the intergalactic travel extravaganza brought to you by the genius minds behind this Laravel-based Travel Package Booking System. Strap in and prepare for a journey that's more entertaining than a camel riding a unicycle!

## Features That Will Make You Go "WOW!"

- **User Authentication:** Because we don't want any aliens or time travelers messing with our travel plans, we've got a slick registration and login system using Laravel Middleware.

- **Dashboard (For Agents):** Agents, you're in control! Add, edit, and delete travel packages. It's like playing Sims, but with real-world consequences!

- **Travel Package Display (For Customers):** Humans, rejoice! Browse travel packages, search for destinations, and book your dream vacation. Elon Musk, eat your heart out!

- **UI Enhancements:** We've sprinkled some JavaScript magic to filter packages in real-time. It's like having a personal travel genie. Responsive design for mobile views because, hey, even aliens use smartphones.

## How to Join the Galactic Party

To embark on this space odyssey, make sure your spaceship has the following onboard:

### Prerequisites for Earthlings (Humans)

- PHP (>=7.3)
- Composer
- Laravel CLI
- MySQL or any other database that understands our earthly databasespeak
- Web server (e.g., Apache, Nginx)

### Installation - The Earthling Way

1. Clone the repository:

   ```bash
   git clone https://github.com/saquibhasan3/travel-package-booking-system.git
   ```

2. Navigate to the project folder:

   ```bash
   cd travel-package-booking-system
   ```

3. Install dependencies:

   ```bash
   composer install
   ```

4. **Setting Up the .env File - For Earth Dwellers**

   - Copy the `.env.example` file:

     ```bash
     cp .env.example .env
     ```

   - Create a MySQL database and update the `.env` file with your database coordinates.

5. Run migrations and seeders:

   ```bash
   php artisan migrate --seed
   ```

6. Generate the application key:

   ```bash
   php artisan key:generate
   ```

7. Start the development server:

   ```bash
   php artisan serve
   ```

8. Access the application in your web browser: http://localhost:8000

9. If you want to experience the demo, follow this [link](https://saquib.blog/travel/public/). (No guarantees for extraterrestrial compatibility)

### Usage

- Humans: Register, book, and explore the wonders of the world.
- Agents: Create, edit, and delete packages. Feel the power!

### Deployment

For those thinking about taking this system to the stars, set up a web server and configure it. Update your `.env` file with production settings and maybe consider a rocket-propelled SSL for secure communication.

## Contributing

Space cadets of the universe, unite! Contribute your ideas, improvements, or bug fixes by opening an issue or sending a pull request. Let's make this system as epic as a Marvel vs. DC crossover!

## License

This project is open-source and available under the [MIT License](LICENSE). Feel free to use it on any planet in the galaxy.

## Acknowledgments

- Thanks to the Laravel community for the fantastic PHP framework.
- Bootstrap, you're the real MVP for responsive design.
- [Font Awesome](https://fontawesome.com/) for providing the cosmic icons that make our UI shine brighter than a supernova.
