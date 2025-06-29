

# 🍔 FrenzyFood Web App

A complete **food delivery web application** built with **PHP, MySQL, and plain JavaScript/CSS**. It supports three roles:

- **Customer** — Browse restaurants, view menus, place orders, make payments (via eSewa), and track order status.
- **Restaurant** — Manage menu items, view incoming orders, and update order statuses.
- **Delivery** — View assigned deliveries, update delivery status in real-time.
- **Admin** — Manage users, restaurants, and view statistics.


## 🚀 Features

- Multi-role authentication: Admin, Customer, Restaurant, Delivery
- Browse menus by restaurant & special offers
- Cart management & order placement
- eSewa integration for payments
- Role-based dashboards:
  - Customers: Profile, Orders, History
  - Restaurants: Order management, menu editing
  - Delivery: Assigned order queue, status updates
  - Admin: User management, statistics dashboard
- Modular MVC architecture (Controllers, Models, Views)
- Asset management: CSS, JS, images
- File uploads (restaurant logos, menu images, user avatars)

---

## 📁 Project Structure

```

FRENZYFOOD/
│
├─ assets/                # CSS, JS, images
├─ config/db.php          # Database connection settings
├─ controllers/           # Controllers for MVC
├─ models/                # Business logic & DB models
├─ helpers/               # Session & utility functions
├─ views/
│   ├─ auth/              # Login/register/logout
│   ├─ customer/          # Customer dashboards
│   ├─ restaurant/        # Restaurant UI
│   ├─ delivery/          # Delivery dashboard
│   ├─ admin/             # Admin panel
│   └─ partials/          # Shared header/footer, navbars
│
├─ uploads/               # Uploaded images (logos, avatars)
├─ index.php              # App entrypoint
└─ .gitignore             # Files/folders to ignore

````

---

## ⚙️ Setup Instructions

### Requirements
- PHP ≥ 7.4 with GD, MySQLi or PDO
- MySQL or MariaDB
- Apache/Nginx + PHP (e.g., XAMPP/WAMP/LAMP)
- Internet connection for eSewa

### Steps

 Clone the repository:
   ```bash
   git clone https://github.com/bijay-odyssey/FrenzyFood-Web-App.git
   cd FrenzyFood-Web-App
````

 

 

## 🛠️ Usage and Roles

* **Customer**: Register, log in, browse, add to cart, place orders, pay via eSewa, track.
* **Restaurant Owner**: Log in, manage menu (add/edit/remove items), view/update orders.
* **Delivery**: View relevant orders, update delivery status.
* **Admin**: Manage all users/restaurants, view app statistics.

---

 
---

## 👤 Contributing

1. Fork this repo.
2. Create a feature branch: `git checkout –b feature/YourFeature`
3. Commit changes: `git commit -m "Add feature X"`
4. Push: `git push origin feature/YourFeature`
5. Submit a pull request.

---
 
---

## 🤝 Acknowledgments

* Developed by **bijay-odyssey**
* Integration inspired by eSewa payment workflows
* Inspired by popular food delivery systems (UberEats, Foodpanda)

---

Enjoy exploring the **FrenzyFood Web App**! Feel free to create issues, contribute improvements, or just enjoy the food delivery workflow 😊

```

 
