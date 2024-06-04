# Voting System Prototype

## Introduction

TCAcademy, a training institution, wants to run elections for their student body. The posts include President, Vice President, Secretary, Socials, Treasurer, Education, and Discipline. For each of these roles, 4 candidates have been selected from the lot. This project is a prototype platform to present the students with all the posts and the 4 candidates per post. Each student can vote for one candidate per post, and after each vote, an email is sent to both the student and the system admins with the vote and the current statistics of the election.

## Requirements

- PHP 7.4 or higher
- Composer
- Node.js
- npm

## Installation

1. instal new app:
    ```bash
   laravel new votting_system
    ```


2. Set up environment variables:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

3. Set up database:
    - Configure your database settings in the `.env` file.
    - Run migrations:
        ```bash
        php artisan migrate
        ```

5. Set up authentication:
    ```bash
    composer require laravel/breeze --dev
    php artisan breeze:install
    npm install && npm run dev
    ```

6. Run the application:
    ```bash
    php artisan serve
    ```

7. Use the seeders to insert elements if needed
    Post seeder to insert the various post
    Candidate seeder to insert the candidates
    Admin seeder to insert the admin (default admin@gmail.com   password : "password")
