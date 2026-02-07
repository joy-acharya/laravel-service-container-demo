# Laravel Service Container & Service Provider Demo

**Production-Ready Example** demonstrating Laravel Service Container, Service Providers, Dependency Injection, and runtime service selection.

This project is suitable for learning, interviews, and as a starter template for real-world applications.

---

## 🚀 Features

- Dependency Injection via **Service Container**
- Interface-based design (**MessageSender**)
- Email and SMS services implementing the interface
- **Runtime service selection** via query parameter (`type=email` / `type=sms`)
- Fully unit-tested for both Email and SMS services
- Follows **SOLID principles** and production-ready coding standards
- Fully compatible with **Laravel 11+**

---

## 📌 Concepts

### Service Container
A powerful **IoC (Inversion of Control) container** in Laravel that automatically resolves class dependencies.
It injects objects into controllers, jobs, events, and other Laravel components.

**Definition:**
> The service container is a dependency injection container that manages class dependencies and instantiates objects automatically.

**Example:**
```php
public function send(MessageSender $sender)
```
Here, `$sender` is automatically provided by the service container, so the controller does not need to know which concrete class is being used.

### Service Provider
Service Providers are classes that **register bindings and services** into the service container.

**Definition:**
> A service provider tells Laravel how to bind an interface to a concrete class and provides a place to register services in the application.

In this project, the **MessageServiceProvider** dynamically chooses between **EmailSender** and **SmsSender** based on a query parameter:
```php
$this->app->bind(MessageSender::class, function ($app) {
    $request = $app->make(Request::class);
    return $request->query('type') === 'sms'
        ? $app->make(SmsSender::class)
        : $app->make(EmailSender::class);
});
```
✅ Controller remains unchanged; the provider decides which service is injected.

---

## 📂 Project Structure

```
app/
├── Contracts/        # Interface definitions
│   └── MessageSender.php
├── Services/         # Concrete implementations
│   ├── EmailSender.php
│   └── SmsSender.php
├── Providers/        # Service Providers
│   └── MessageServiceProvider.php
├── Http/Controllers/
│   └── MessageController.php
routes/
└── web.php           # Routes
tests/
└── Feature/MessageSenderTest.php  # Unit tests
```

---

## ⚡ Getting Started

### 1️⃣ Clone Repository
```bash
git clone https://github.com/joy-acharya/laravel-service-container-demo.git
cd laravel-service-container-demo
```

### 2️⃣ Install Dependencies
```bash
composer install
```

### 3️⃣ Generate App Key
```bash
php artisan key:generate
```

### 4️⃣ Start Laravel Server
```bash
php artisan serve
```
Server runs at:
```bash
http://127.0.0.1:8000
```

---

## 🔄 API Usage Examples

The project has **one main endpoint**:
```
GET /send
```
It accepts an optional query parameter `type`:

| URL                  | Description                  | Output Example                       |
|----------------------|-----------------------------|-------------------------------------|
| `/send`              | Default (Email service)     | `EMAIL SENT: Hello from Laravel`    |
| `/send?type=email`   | Force Email service         | `EMAIL SENT: Hello from Laravel`    |
| `/send?type=sms`     | Force SMS service           | `SMS SENT: Hello from Laravel`      |

### Example Using cURL
```bash
# Default (Email)
curl http://127.0.0.1:8000/send

# Force Email
curl http://127.0.0.1:8000/send?type=email

# Force SMS
curl http://127.0.0.1:8000/send?type=sms
```

### Example Using Postman / Browser
- Open browser or Postman  
- Hit the URL: `http://127.0.0.1:8000/send` → returns Email  
- Hit the URL: `http://127.0.0.1:8000/send?type=sms` → returns SMS  

---

## 🧪 Unit Tests

Unit tests cover:

- Email service  
- SMS service  
- Runtime service container binding for `/send` route

Run tests with:
```bash
php artisan test
```

---

## 🐳 Docker Support

Run the project using Docker:

```bash
    docker compose up --build

---
🎯 Why This Project is Production-Ready

- **Interface abstraction** → Loose coupling, easy to extend  
- **Service Container** → Automatic dependency resolution  
- **Service Provider** → Clean separation of feature-specific bindings  
- **Runtime switching** → Flexible, no code duplication  
- **Unit-tested** → Safe for refactoring  
- **SOLID principles** → Dependency inversion, clean architecture  
- Compatible with **Laravel 11+ standards**

## 👨‍💻 Author
Joy Acharya

### 🤝 Let's Connect!
- 💼 [LinkedIn](https://www.linkedin.com/in/staywithjoy)
- 📧 [Email](mailto:joycseuiu@gmail.com)

---
*"Always learning, always building."*