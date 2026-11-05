# 🥭 कोकण मेवा (Konkan Meva) - Regional E-Commerce Platform

[![PHP Version](https://img.shields.io/badge/PHP-8.x-777BB4?logo=php&logoColor=white)](https://www.php.net/)
[![Database](https://img.shields.io/badge/Database-MySQL%20%2F%20MariaDB-4479A1?logo=mysql&logoColor=white)](https://www.mysql.com/)
[![Frontend](https://img.shields.io/badge/Frontend-Bootstrap%20%7C%20jQuery%20%7C%20Swiper-563D7C?logo=bootstrap&logoColor=white)](https://getbootstrap.com/)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

An authentic e-commerce web platform dedicated to farm-fresh agricultural delicacies, GI-tagged Alphonso mangoes, and traditional organic products from the coastal Konkan region of Maharashtra (Ratnagiri & Sindhudurg).

---

## 🌟 Key Features

### 🛍️ Customer Storefront
* **Dynamic Promotional Showcase**: Swiper-powered interactive hero carousel featuring signature specialties (Alphonso Mango Pulp, Kokum Agal, Kairi Panhe, Jamun Juice).
* **10 Regional Product Categories**:
  * Konkani Fruits (with Subcategories: Alphonso Mangoes, Cashews & Nuts, Berries & Kokum, Jackfruit & Seasonal)
  * Syrups & Concentrates
  * Traditional Jams & Muramba
  * Coastal Pickles & Thecha
  * Authentic Flours & Bhajni
  * Snacks & Crisps
  * Papad & Fruit Poli
  * Authentic Chutneys & Masalas
  * Instant Specials & Regional Staples
  * Traditional Maharashtrian Sweets
* **Live Product Search**: Asynchronous auto-complete search bar with instant product redirection to full product details.
* **Product Detail Pages (`product_detail.php`)**: Full nutritional/heritage description, high-resolution imagery, stock tracker, and related product recommendations.
* **Cart & Wishlist Engine**: AJAX-powered instant Add-to-Cart and Add-to-Wishlist actions with guest login prompting.
* **Checkout & Orders**: Multi-method checkout (Cash on Delivery & Online Simulation), order summary, and itemized customer order tracking (`my_orders.php`).
* **Customer Authentication**: Secure registration, login modal, and profile manager.

### ⚙️ Admin Management Panel (`/admin`)
* **KPI Dashboard**: Real-time sales statistics, order status counters (Pending, Delivered, Paid), and customer tracking.
* **Product Catalog CRUD**: Add, edit, and delete products with image upload and category/subcategory linkages.
* **Category & Subcategory Hierarchy**: Add and manage parent categories and nested seasonal subcategories.
* **Order Fulfillment**: Track customer details, mobile contact, shipping addresses, and payment workflows.

---

## 🚀 Quick Setup & Installation

### Prerequisites
* [XAMPP](https://www.apachefriends.org/) (PHP 8.0+ and MySQL / MariaDB) or any standard Apache/PHP stack.
* Web Browser (Chrome, Edge, Firefox, Safari).

### Step 1: Clone or Download Repository
```bash
git clone https://github.com/your-username/Konkan-Meva.git
```
Or place the folder into your web server directory (e.g. `C:/xampp/htdocs/Konkan-Meva` or any workspace directory).

### Step 2: Import the Database
1. Start **Apache** and **MySQL** in your XAMPP Control Panel.
2. Open **phpMyAdmin** (`http://localhost/phpmyadmin`).
3. Create a new database named:
   ```sql
   konkanmewa_db
   ```
4. Click **Import** and select the schema file:
   ```
   database/konkanmewa_db.sql
   ```
   *(Alternatively, run: `mysql -u root konkanmewa_db < database/konkanmewa_db.sql`)*

### Step 3: Run the Application
You can run it via standard Apache (`http://localhost/Konkan-Meva`) or using PHP's built-in server:
```bash
cd Konkan-Meva
php -S localhost:8085
```
Open **[http://localhost:8085](http://localhost:8085)** in your browser!

---

## 🔐 Default Demo Credentials

| Role | Access URL | Login Identifier | Password |
| :--- | :--- | :--- | :--- |
| **Admin** | `http://localhost:8085/admin` | `admin` | `password` *(or `admin123`)* |
| **Customer** | `http://localhost:8085` *(Login modal)* | `disha@example.com` | `123456` |

---

## 📁 Project Directory Structure

```
Konkan-Meva/
├── admin/                      # Admin control panel
│   ├── assets/                 # Admin styles, icons & scripts
│   ├── uploads/                # Admin media uploads
│   │   ├── category/           # Category thumbnail images
│   │   ├── products/           # Product media folders (by ID)
│   │   └── subcategory/        # Subcategory media folders
│   ├── dashboard.php           # Admin analytics & metrics
│   ├── productList.php         # Product management table
│   ├── ordersList.php          # Order fulfillment table
│   └── usersList.php           # Customer directory
├── assets/                     # Storefront assets
│   ├── css/                    # Bootstrap & custom stylesheets
│   ├── js/                     # jQuery, Popper, Swiper & custom scripts
│   └── images/                 # Theme graphics, banners & fruit assets
├── database/                   # Database export
│   └── konkanmewa_db.sql       # Full schema & seeded products
├── index.php                   # Storefront home page
├── shop.php                    # All products catalog with pagination
├── webproduct.php              # Category & subcategory filtering
├── product_detail.php          # Product detail view
├── cart.php                    # Shopping cart
├── checkout.php                # Shipping & payment checkout
├── my_orders.php               # Customer order history
├── profile.php                 # Customer profile
└── README.md                   # Documentation
```

---

## 📜 License
This project is open source and available under the [MIT License](LICENSE).
