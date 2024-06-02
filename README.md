# Contact Management System

This is a Contact Management System built with Laravel and Vue.js using Inertia.js. The system allows users to manage contacts, including creating, updating, deleting, and searching contacts. Additionally, the system supports sorting and pagination.

## Table of Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Running the Application](#running-the-application)
- [Testing](#testing)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

## Requirements

- PHP >= 8.0
- Composer
- Node.js & npm
- MySQL or any other supported database

## Installation

1. **Clone the repository:**

    ```sh
    git clone https://github.com/achrafbouhadou/HopTest.git
    cd HopTest
    ```

2. **Install PHP dependencies:**

    ```sh
    composer install
    ```

3. **Install JavaScript dependencies:**

    ```sh
    npm install
    ```

## Configuration

1. **Copy the `.env.example` file to `.env`:**

    ```sh
    cp .env.example .env
    ```

2. **Generate an application key:**

    ```sh
    php artisan key:generate
    ```

3. **Set up your database credentials in the `.env` file:**

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

4. **Run the database migrations:**

    ```sh
    php artisan migrate
    ```

5. **(Optional) Seed the database with test data:**

    ```sh
    php artisan db:seed
    ```

## Running the Application

1. **Compile the assets:**

    ```sh
    npm run dev
    ```

2. **Run the development server:**

    ```sh
    php artisan serve
    ```

3. **Open your browser and navigate to:**

    ```
    http://localhost:8000
    ```


## Usage

### Creating a Contact

1. Click the "+ Ajouter" button to open the contact creation form.
2. Fill in the contact details.
3. Click "Valider" to save the contact.

### Updating a Contact

1. Click the pencil icon next to a contact to open the contact editing form.
2. Update the contact details.
3. Click "Valider" to save the changes.

### Deleting a Contact

1. Click the trash icon next to a contact.
2. Confirm the deletion in the popup.

### Viewing a Contact

1. Click the eye icon next to a contact to view the contact details in a read-only form.

### Searching Contacts

1. Use the search bar at the top to filter contacts by name or company.

### Sorting Contacts

1. Click on the column headers ("Nom du contact", "Société", "Statut") to sort contacts by that column.
2. Click again to toggle between ascending and descending order.

