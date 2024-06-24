
# Laravel 11 Skeleton API

This project is a base for developing an API using Laravel 11, but with the directory structure of Laravel 10. It includes a Docker development environment configured with Nginx, PHP-FPM, PostgreSQL, Mailpit, Mailhog, and Laravel Pint for code formatting. Feel free to change the database as well as the web server to test the endpoints.

## Prerequisites

- Docker
- Docker Compose
- 
## Environment Setup

1. **Clone the repository:**

   ```sh
   git clone https://github.com/yanbrasiliano/laravel-11-skeleton-api.git
   cd laravel-11-skeleton-api
   ```

2. **Copy the example `.env` file and configure as needed:**

   ```sh
   cp .env.example .env
   ```

3. **Build and start the Docker containers:**

   ```sh
   docker-compose up --build -d
   ```

4. **Install Composer dependencies:**

   Dependencies will be automatically installed during the Docker build process.

5. **Run the migrations:**

   ```sh
   docker-compose exec app php artisan migrate
   ```

## Docker Services

- **App:** Main container running PHP-FPM, supervised by Supervisor.
- **Nginx:** Web server serving the Laravel application.
- **PostgreSQL:** Database for the application.
- **Mailpit:** Tool for viewing emails sent by the application.
- **Mailhog:** Alternative tool for viewing emails.

## Email Configuration in `.env`

```dotenv
MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="example@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

## Laravel Pint Configuration

To run Pint manually:

```sh
docker-compose exec app ./vendor/bin/pint
```

## Useful Commands

- **Start the containers:**

  ```sh
  docker-compose up -d
  ```

- **Stop the containers:**

  ```sh
  docker-compose down
  ```

- **Access the app container:**

  ```sh
  docker-compose exec skeleton-api bash
  ```

- **View app container logs:**

  ```sh
  docker logs skeleton-api
  ```

## License

This project is licensed under the MIT License. See the `LICENSE` file for more details.

---

This project provides a solid foundation for developing APIs in Laravel 11 while maintaining the familiar structure of Laravel 10. Feel free to expand and modify as needed to meet your specific development needs.
