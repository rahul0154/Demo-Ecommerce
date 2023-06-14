# Demo-Ecommerce

To configure the project in your system, follow the steps below:

1. Clone the repository's master branch to your local system.
Use the Git command "**git clone [repository-url]**" to clone the repository.

2. Navigate to the root directory of the project in your terminal or command prompt.

3. Run the command "**composer install**" in the project's root directory.
This will install the required dependencies for the project.

4. Open the .env file located in the project's root directory.
Look for the DATABASE_URL variable in the file.
Update the database name with the appropriate value for your system.

5. Run the Doctrine migrations to update the database schema.
If you have Symfony CLI installed, use the command "**symfony console doctrine:migrations:migrate**".
If you don't have Symfony CLI, use the command "**php bin/console doctrine:migrations:migrate**".

6. Start the Symfony development server.
Use the command "**symfony server:start**" to launch the server.

Once the server is running, you can access the project in your web browser.

Please ensure that you have the necessary requirements installed and properly configured on your system before executing these steps.
