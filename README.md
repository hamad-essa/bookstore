# Bookstore Management System

This is a Laravel-based Bookstore Management System with a REST API. This README will guide you through the installation process and provide key information on how to use the application.

## Table of Contents

- [Installation](#installation)
- [Demo](#demo)
- [API Credentials](#api-credentials)
- [Postman Collection](#postman-collection)
- [License](#license)

## Installation

Follow these steps to set up the project on your local machine:

1. **Clone the repository:**

   ```bash
   git clone https://github.com/hamad-essa/bookstore.git
   cd bookstore
   ```

2. **Install dependencies:**

   Ensure you have Composer installed, then run:

   ```bash
   composer install
   ```

3. **Copy the `.env` file:**

   ```bash
   cp .env.example .env
   ```

4. **Update the `.env` file:**

   Open the `.env` file in your preferred text editor and change the `APP_URL` to your desired URL:

   ```plaintext
   APP_URL=http://your-app-url
   ```

5. **Run migrations and seed the database:**

   ```bash
   php artisan migrate --seed
   ```

6. **Link Storge directory to Public:**

   ```bash
   php artisan storage:link
   ```

6. **Start the development server:**

   ```bash
   php artisan serve
   ```

   Your application should now be running at [http://localhost:8000](http://localhost:8000).

## Demo

You can access the live demo of the application at:

**Demo URL:** [bookstore.vue.ly](http://bookstore.vue.ly)

## API Credentials

To access the API, you will need the following credentials:

- **API Key:** `f1aae435-79a4-4731-88ee-fcb28131b8de`
- **Username:** `admin@admin.com`
- **Password:** `password`

## Postman Collection

A Postman collection file is included with the project, which contains all the API endpoints along with documentation. You can import the collection into Postman to explore and test the API.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

---

Feel free to reach out for any questions or issues you encounter while setting up or using the application!
