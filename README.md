# Blog App

A simple blog application built with Laravel 13 as part of an internship assignment.

## Features

- User authentication (Login & Register)
- Profile management
- Create, edit, and delete blog posts
- Categories
- Image uploads
- Search posts
- Pagination
- Comments
- Authorization using Laravel Policies

## Technologies Used

- Laravel 13
- PHP
- MySQL
- Bootstrap 5
- Blade Templates

## Installation

Clone the repository:

```bash
git clone https://github.com/uia44/blog-app.git
cd blog-app
```

Install dependencies:

```bash
composer install
npm install
```

Copy the environment file:

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

Configure your database in the `.env` file.

Run the migrations:

```bash
php artisan migrate
```

Create the storage link:

```bash
php artisan storage:link
```

Compile frontend assets:

```bash
npm run dev
```

Start the development server:

```bash
php artisan serve
```

Open:

```
http://127.0.0.1:8000
```

## Author

Mohammed Al Maskari