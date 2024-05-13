# Installation Instructions

Make sure that you are using PHP 8.1 andd already have composer and node installed on your system before proceeding.

# Clone the project repository
open your terminal and change the project directory of your choice by typing in

```
cd C:/your/path/to/directory
git clone https://github.com/jerichoempleo/Thumbworx.git
```

# Frontend Setup

Navigate to your frontend folder and install package dependencies by doing

```
cd frontend
npm install
```

# Backend setup

Navigate to your backend folder and install package dependencies by doing
```
cd backend
composer install
```

Should you encounter errors during installation. Reach out. The next step after this, you would need to ask for the .env file and paste the file 
to the root of your backend folder. Afterwards

```
php artisan key:generate
php artisan jwt:secret 
```

and then that should do it for the initial setup

# Run the project

```
cd frontend 
npm run dev 
cd backend 
php artisan serve 
```
