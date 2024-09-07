# OneUp

OpenWeather Weather Dashboard using Tailwind CSS, Alpine.js, Laravel 11, and Livewire 3 (TALL stack).

## Preview

### Light Mode

![Light Mode](public/light.png)

### Dark Mode

![Dark Mode](public/dark.png)

## Installation

1. Clone the repository:

```bash
git clone https://github.com/199ocero/oneup.git
```

2. Install the dependencies:

```bash
cd oneup
composer install
npm install
```

3. Copy the `.env.example` file to `.env`.

```bash
cp .env.example .env
```

4. Update the `.env` file with your OpenWeather API key.

```bash
OPENWEATHER_WEATHER_API_URL=https://api.openweathermap.org/data/3.0
OPENWEATHER_GEOCODING_API_URL=https://api.openweathermap.org/geo/1.0
OPENWEATHER_API_KEY=
```

5. Run the migrations:

```bash
php artisan migrate
```

6. Run the application:

```bash
php artisan serve
npm run dev
```

7. Open the application in your browser:

```bash
http://localhost:8000
```

8. If you are using Laravel Herd, you can use the following command:

```bash
herd link oneup
herd secure oneup
herd links # to list all links (you should see oneup and copy the link)
```

9. Update the `.env`.

```bash
APP_URL=http://oneup.test
```

10. Run the application:

```bash
npm run dev
```

11. Open the application in your browser:

```bash
http://oneup.test
```

## Contributing

Contributions are welcome!
