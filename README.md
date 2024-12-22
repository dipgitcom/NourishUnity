# NourishUnity
NourishUnity is a web platform designed to address food waste, promote social welfare, and connect communities. It integrates various functionalities such as food rescue, donation management, chef registration, and a platform for ordering food at affordable rates. 
# Food Rescue Platform

A platform to connect contributors, donors, volunteers, chefs, and users for the purpose of rescuing and distributing food, donating to those in need, and ordering food from local chefs. The platform also highlights community impact through blog posts.

## Features

### Frontend Features
- **Landing Page**: Describes the platform's mission and vision with a navigation bar linking to the following sections:
  - Food Rescue
  - Donate
  - Order Food
  - Blog
  - Registration/Login

- **Food Rescue and Distribution Page**: 
  - Form for contributors to join or volunteer.
  - Display sections for distributing food (Iftar, lunch, etc.) with today’s menu, quantity, and recipient lists.
  - Comment box for feedback.

- **Donation Page**: 
  - Predefined donation amounts with an option for custom input.
  - One-time or monthly donation options.
  - Integration of payment methods like Bkash.

- **Order Food Page**: 
  - Displays menu items with images, descriptions, and prices.
  - Form to select quantity and payment method.

- **Chef Page**: 
  - Chef registration form with fields like name, address, phone number, and experience.
  - List of existing chefs.

- **Login/Registration**: 
  - Simple and user-friendly login and signup forms with options to reset the password.

- **Blog Section**: 
  - Articles or posts highlighting community impact, chef stories, or updates.

- **Footer**: 
  - Links to social media, contact information, and a brief about the platform.

### Backend Features
- **Database Schema**:
  - `Users`: Stores user details (id, name, email, password, role).
  - `Chefs`: Stores chef details (id, name, address, phone number, experience).
  - `Donations`: Stores donation records (id, user_id, amount, payment method, frequency).
  - `Food Orders`: Stores food orders (id, user_id, item, quantity, payment status).
  - `Volunteer Contributions`: Stores volunteer contributions (id, name, role, comments).
  - `Blog Posts`: Stores blog articles (id, title, content, author_id, timestamp).

- **Authentication**:
  - Secure login/logout functionality.
  - User registration with form validation and password encryption.
  - Password reset functionality.

- **Admin Dashboard**:
  - Manage chefs, users, donations, and food distribution.
  - Post new blog articles.

- **Data Handling**:
  - Store chef registrations and update their statuses.
  - Record donations with detailed logs.
  - Display menu items and handle food order requests.

### Technologies Used
- **Frontend**: 
  - HTML
  - CSS (for styling)
  - Bootstrap (for responsive layout)
  - JavaScript (for interactivity)

- **Backend**: 
  - PHP (for server-side logic)
  - MySQL (for database management)

- **Payment Gateway Integration**: 
  - APIs for platforms like Bkash for processing donations.

- **Hosting**: 
  - Development on platforms like XAMPP/WAMP.
  - Deployment to cloud services like AWS or Heroku for production.

## How to Use

### 1. Clone the repository:
```bash
git clone https://github.com/your-username/food-rescue-platform.git
