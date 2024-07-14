## Employee Management System
### Framework used: Laravel Breeze
### RDBMS: MySQL
### Frontend: Blade and Tailwind CSS

## Requirements:
- **View existing employee data**: All employee records are shown 10 at a time using the pagination function.
- **Update employee data**: Each employee record is individually editable.
- **Delete employee data**: The user can delete any employee after giving confirmation.
- **Validation**: Client-side validation in the adding/editing record forms, accepts data of correct format only.
- **Authentication**: The user can only access the database dashboard after successfully logging in.

## To run this project:
1. Set up PHP [Laravel](https://laravel.com/docs/11.x).
2. Install [Node.js](https://nodejs.org/en/download/package-manager)
3. Cd the project root folder and run this command in the terminal to set up and seed db tables: `php artisan migrate:fresh --seed`
4. Run the project using this command: `npm run dev`
