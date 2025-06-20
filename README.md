
# Sports Warehouse Website for PHP Learning

This website is an interactive learning platform designed to help me master PHP programming through structured instructional materials. It offers hands-on experience with key web development principles, database integration, and dynamic content creation.

## Stealing this code

Much of the code is borrowed from TAFE teacher Michael to fully implement this assessment!"


# Website Architecture Overview

This document provides an overview of the website's architecture.

## Entry Points

*   `index.php` and `home.php`: Display a selection of products. They appear to be identical and may be aliased.
*   `category.php`: Displays products for a specific category, based on the `categoryId` parameter passed in the URL.
*   `product.php`: Displays details for a specific product, based on the `id` parameter passed in the URL.

## Routing

The website likely uses direct mapping of URLs to PHP files, as there is no `.htaccess` file.

## Includes

*   `includes/common.php`: Defines constants for directory paths, loads the Composer autoloader, includes `secrets.php` (likely containing database credentials), includes `database.php` (which establishes the database connection), and defines an `esc()` function for escaping HTML output.
*   `includes/database.php`: Provides database access functionality through the `DBAccess` class.
*   `includes/formHelpers.php`: Provides functions for handling form input.
*   `includes/emailHelpers.php`: Provides functions for sending emails.
*   `includes/secrets.php`: Stores sensitive information like database credentials.

## Templates

*   `templates/_layout.html.php`: The main layout template, likely containing the overall page structure, header, footer, and navigation.
*   `templates/_indexPage.html.php`: Template for displaying the home page content (products under $20 and over $50).
*   `templates/_products.html.php`: Template for displaying a list of products (used in `category.php`).
*   `templates/_productPage.html.php`: Template for displaying a single product's details (used in `product.php`).
*   `templates/_error.html.php`: Template for displaying error messages.

## Database

The website uses a database to store product and category information. The `DBAccess` class in `classes/DBAccess.php` handles database connections and queries.

## Assets

The `assets` directory contains the `sportswh.sql` file, which is likely a database dump.

## Styles

The `styles` directory contains the `styles_improved.css` file, which provides the website's styling.

## Architecture Diagram

![alt text](<assets/Editor _ Mermaid Chart-2025-06-19-065505.png>)

## User Diagram

![alt text](<assets/Editor _ Mermaid Chart-2025-06-19-064420.png>)


## Database Diagram 
![alt text](<assets/Editor _ Mermaid Chart-2025-06-19-054541.png>)

* 	item ||--o{ category : categoryId (An item belongs to one category, and a category can have zero or many items)
* 	orderitem }o--|| item : itemId (An order item relates to one item, and an item can be in zero or many order items)
* 	orderitem }o--|| shoppingorder : shoppingOrderId (An order item relates to one shopping order, and a shopping order can have zero or many order items
