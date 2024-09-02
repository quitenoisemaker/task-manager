# Simple Task Management System

A simple web-based task management application built with Laravel. This application allows users to create, edit and delete. Tasks are stored in a MySQL database, and the priority is automatically updated based on the order of the tasks. Additionally, tasks can be associated with projects, allowing users to filter and view tasks by project.

## Features

- **Create Task**: Users can create tasks with the following information:
  - Task Name
  - Priority 
  - Timestamps

- **Edit Task**: Users can edit the details of an existing task.

- **Delete Task**: Users can delete tasks from the list.

- **Project Management (BONUS)**: 
  - Users can associate tasks with specific projects.
  - A dropdown allows users to select a project and view only the tasks related to that project.

## Installation

### Prerequisites

- PHP >= 8.2
- Composer
- MySQL
- Node.js and npm (for compiling front-end assets)

### Setup

1. **Clone the Repository:**

    ```bash
    git clone https://github.com/yourusername/task-management.git
    cd task-management
    ```

2. **Install Dependencies:**

    ```bash
    composer install
    npm install
    npm run dev
    ```

3. **Set Up Environment Variables:**

    Copy the `.env.example` file to `.env`:

    ```bash
    cp .env.example .env
    ```

    Update the `.env` file with your database configuration:

    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
    ```

4. **Generate Application Key:**

    ```bash
    php artisan key:generate
    ```

5. **Run Migrations:**

    ```bash
    php artisan migrate
    ```

6. **Seed the Database:**

    ```bash
    php artisan db:seed
    ```

7. **Start the Development Server:**

    ```bash
    php artisan serve
    ```

    Visit `http://localhost:8000` in your browser.

## Usage

### Creating a Task

- Navigate to the tasks page.
- Click "Add Task" and fill out the form with the task name.

### Editing a Task

- Click the "Edit" button next to a task to modify its details.

### Deleting a Task

- Click the "Delete" button next to a task to remove it.

### Project Management (BONUS)

- Assign tasks to specific projects by selecting a project from the dropdown menu.
- Filter tasks by selecting a project from the dropdown to view only tasks associated with that project.

## Database Structure

### Tables

- **tasks**
  - `id`: Primary key
  - `name`: Name of the task
  - `priority`: Priority of the task (integer)
  - `project_id`: Foreign key to the projects table (if the project functionality is implemented)
  - `created_at`: Timestamp of task creation
  - `updated_at`: Timestamp of the last update

- **projects** (BONUS)
  - `id`: Primary key
  - `name`: Name of the project
  - `description`: description of the project (optional)
  - `created_at`: Timestamp of project creation
  - `updated_at`: Timestamp of the last update

## Contributing

Contributions are welcome! Please fork this repository and submit a pull request for any features, bug fixes, or improvements.

