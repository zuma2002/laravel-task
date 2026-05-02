# Laravel Performance Task: 100k Records Optimization

This repository contains a high-performance Laravel application developed as a technical assessment. The project demonstrates the efficient management, seeding, and display of a dataset containing **100,000 records**, ensuring a smooth user experience and fast server response times.

## 🚀 Key Features
*   **High-Volume Data Seeding**: Custom seeders optimized for bulk insertion of 100,000 records using database transactions[cite: 1].
*   **Optimized Search**: Fast server-side filtering and querying designed to handle large datasets without lag[cite: 1].
*   **Modern UI**: A clean, responsive interface built with Tailwind CSS[cite: 1].
*   **Performance Focused**: Optimized for low memory consumption even with high record counts[cite: 1].

## 🛠 Tech Stack
*   **Framework**: Laravel 11/12[cite: 1]
*   **PHP Version**: 8.4+[cite: 1]
*   **Database**: MySQL (Local)[cite: 1]
*   **Frontend**: Tailwind CSS & Vite[cite: 1]
*   **Development Tools**: VS Code, Git, PHPUnit[cite: 1]

## ⚡ Performance Optimizations
To meet the requirement of handling 100,000 records efficiently, the following strategies were implemented[cite: 1]:
1.  **Database Indexing**: Critical columns (such as names or emails) are indexed to maintain search speeds under 200ms[cite: 1].
2.  **Batch Processing**: The database seeder uses batch inserts rather than individual row creation, drastically reducing the initial setup time[cite: 1].
3.  **Memory Management**: Implemented `LazyCollection` and Eloquent chunking for data processing to keep the server's RAM footprint minimal[cite: 1].
4.  **Server-Side Pagination**: Ensures the frontend remains fast by only loading a small subset of records at any given time[cite: 1].

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
    *Note: Update your `.env` file with your local MySQL credentials (DB_DATABASE, DB_USERNAME, DB_PASSWORD).*

5.  **Database Migration & Seeding**
    Run the following command to create the tables and generate the 100,000 records locally[cite: 1]:
    ```bash
    php artisan migrate --seed
    ```

6.  **Run Application**
    ```bash
    php artisan serve
    ```

---
**Developed by:** Muhammad Naqiuddin bin Azamlee  
**Role:** IT Student at Universiti Kebangsaan Malaysia (UKM)[cite: 1]"""
