## To-Do List with Laravel and Livewire

This is a simple To-Do List project using the Laravel framework and Livewire. It allows you to add, edit and remove teams and items from your to-do list.

## Requirements

Make sure you have the following software installed on your computer:

- Docker;

- npm;

## Installation

Clone the repository:

```
git clone <https://github.com/TiagoLemosNeitzke/todo.git>
```

Install the Composer dependencies:

```
cd todo
composer install
```

Install the NPM dependencies:

```
npm install
```

Copy the .env.example file to .env and configure it with your database information: ()

```
cp .env.example .env
```

Generate a new app key:

```
php artisan key:generate
```

Download Laravel sail:

```
composer require laravel/sail --dev
```

Install Laravel sail:

```
php artisan sail:install
```

Start the development server:

```
./vendor/bin/sail up -d
```

Run database migrations:

```
./vendor/bin/sail art artisan migrate
```

Run npm:

```
npm run dev
```

Access the application in your browser at <http://localhost:8000>.

## Use

To start using the application, just create a new account, log in to the application, create a team and start adding tasks to your list. You can mark

tasks as complete or delete them completely.

## License

This project is licensed under the MIT License - see the LICENSE file for details.
