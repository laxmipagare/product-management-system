A simple Laravel-based product management system with AJAX CRUD functionality, multiple image uploads, and dynamic table updates.

This project demonstrates your skills in Laravel, jQuery, AJAX, Bootstrap 5, and Git version control.

**Features**

**Product CRUD**

Create, Read, Update, Delete products without page reload using AJAX.

**Multiple Image Uploads**

Upload multiple images per product.

Replace previous images when editing.

**Dynamic Table**

Products list updates automatically after add/update/delete.

**Bootstrap**

Responsive design with AdminLTE styling.

**Success/Error Alerts**

Shows success/error messages after operations.

**Secure & Clean**

.env and vendor ignored in Git.

CSRF protection enabled.

**Technologies Used**

**Backend**: Laravel 10

**Frontend**: HTML5, CSS3, Bootstrap

**JS Libraries**: jQuery, AJAX

**Database**: MySQL

**Version Control**: Git, GitHub

**Other**: AdminLTE

**Installation**
**Clone Repository**
git clone https://github.com/YOUR_USERNAME/product-management-system.git
cd product-management-system

**Install Dependencies**
composer install
npm install
npm run dev

**Configure Environment**

Copy .env.example to .env
cp .env.example .env
Update .env with your database credentials

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password

**Generate App Key**
php artisan key:generate

**Run Migrations**

php artisan migrate
**Start Development Server**
bash
Copy code
php artisan serve
Open http://127.0.0.1:8000/products in your browser

**Usage**
Add a product using “+” button

Edit a product using “Edit” button

Delete a product using “Delete” button

Success and error messages will show dynamically at the top

**GitHub Repository**

https://github.com/laxmipagare/product-management-system
