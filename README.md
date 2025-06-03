

Here’s a **simple checklist + commands** your partner can follow to get the Laravel + Filament project running locally with SQLite:

---

## ✅ Prerequisites
- [PHP 8.1+](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org/)
- [Node.js + npm](https://nodejs.org/)
- [Git](https://git-scm.com/)
- Optional: Docker (for later)

---

## 🛠️ Commands to Get the Project Running

### 1. **Clone the repo**
```bash
git clone https://github.com/your-org/your-repo-name.git
cd your-repo-name
```

---

### 2. **Install PHP dependencies**
```bash
composer install
```

---

### 3. **Set up environment**
```bash
cp .env.example .env
```

Edit `.env` and set:

```env
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

Then:

```bash
touch database/database.sqlite
php artisan key:generate
```

---

### 4. **Run migrations and create admin user**
```bash
php artisan migrate
php artisan make:filament-user
```

> He’ll be prompted to create an admin email + password for `/admin`.

---

### 5. **Link storage for uploaded images**
```bash
php artisan storage:link
```

---

### 6. **Start the local server**
```bash
php artisan serve
```

Visit:
```
http://localhost:8000
http://localhost:8000/admin
```

---

## 🧠 Optional: Frontend Assets

If using Tailwind or custom styles:

```bash
npm install
npm run dev
```

---

## 🚀 TL;DR Script

```bash
composer install
cp .env.example .env
touch database/database.sqlite
php artisan key:generate
php artisan migrate
php artisan make:filament-user
php artisan storage:link
php artisan serve
```

---

UPDATE 10/04: 

You'll have to install the basic tailwind CSS model to not throw an error. This is a summary of all the commands: 
composer install
cp .env.example .env
php artisan key:generate
mkdir -p database && touch database/database.sqlite
php artisan migrate
php artisan make:filament-user
npm install
npm run dev
php artisan serve


### AS OF JUNE 3rd (after adding login): 
Exactly — since your partner already has the Laravel environment set up, they’ll just need to run a couple of commands to sync up:

---


1. **Pull the latest changes from Git**

```bash
git pull origin develop
```

2. **Install any new dependencies** (just in case)

```bash
composer install
```

3. **Run the new migration** (for `storybook_users`)

```bash
php artisan migrate
```

4. **Clear config cache** (needed for new guard)

```bash
php artisan config:clear
php artisan config:cache
```

5. **Run the dev server**

```bash
php artisan serve
```

6. **(Optional) Run Vite if Tailwind/UI is involved**

```bash
npm install
npm run dev
```

---

### 🧪 Quick Test Instructions



* Visit `/storybook` — should redirect to `/storybook/login`
* Enter name + email — should be redirected back to the app
* `/admin` (or wherever Filament lives) will now show “Storybook Users”

---

