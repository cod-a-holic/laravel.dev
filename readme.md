# Laravel Test App

Project setup:

1. Run this command
            
        composer install
    
        cp .env.example .env
    
        php artisan key.generate
    
2. Configure your database in .env file

3. Fill database with test data

       php artisan db:seed
        
4. To sync the data with the search service:
     
       php artisan scout:import App\\Employee
       