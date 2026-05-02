# Laravel Performance Task: 100k Records Optimization

This repository contains a high-performance Laravel application developed as a technical assessment. The project demonstrates the efficient management, seeding, and display of a dataset containing **100,000 records**, ensuring a smooth user experience and fast server response times.

## 🚀 Key Features
*   **High-Volume Data Seeding**: Custom seeders optimized for bulk insertion of 100,000 records using database transactions.
*   **Optimized Search**: Fast server-side filtering and querying designed to handle large datasets without lag.
*   **Modern UI**: A clean, responsive interface built with Tailwind CSS.
*   **Cloud-Optimized Build**: Configured to handle restricted-memory environments (e.g., Railway/PaaS) by utilizing pre-compiled assets.

## 🛠 Tech Stack
*   **Framework**: Laravel 11/12
*   **PHP Version**: 8.4+
*   **Database**: MySQL
*   **Frontend**: Tailwind CSS & Vite
*   **Development Tools**: VS Code, Git, PHPUnit

## ⚡ Performance Optimizations
To meet the requirement of handling 100,000 records efficiently, the following strategies were implemented:
1.  **Database Indexing**: Critical columns (such as names or emails) are indexed to maintain search speeds under 200ms.
2.  **Batch Processing**: The database seeder uses batch inserts rather than individual row creation, drastically reducing the initial setup time.
3.  **Memory Management**: Implemented `LazyCollection` and Eloquent chunking for data processing to keep the server's RAM footprint minimal.
4.  **Server-Side Pagination**: Ensures the frontend remains fast by only loading a small subset of records at any given time.

## 💻 Local Setup

1.  **Clone the repository**
    ```bash
    git clone [https://github.com/zuma2002/laravel-task.git](https://github.com/zuma2002/laravel-task.git)
    cd laravel-task
    ```

2.  **Install PHP dependencies**
    ```bash
    composer install
    ```

3.  **Install Frontend dependencies & Build**
    ```bash
    npm install
    npm run build
    ```

4.  **Environment Configuration**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

5.  **Database Migration & Seeding**
    *Ensure your database credentials are set in the .env file.*
    ```bash
    php artisan migrate --seed
    ```

6.  **Run Application**
    ```bash
    php artisan serve
    ```

## 🌐 Deployment Note
For deployment on platforms with strict memory limits (like Railway), this project is configured to bypass heavy `npm install` processes during the build phase by including pre-compiled assets in the repository. Ensure `SKIP_INSTALL_DEPS=true` is set in your environment variables.

---
**Developed by:** Muhammad Naqiuddin bin Azamlee  
**Role:** IT Student at Universiti Kebangsaan Malaysia (UKM)
