# Kratos vs Wild Monster Battle Simulation

A PHP Laravel battle simulation project built as a full-stack web application that models a combat encounter between Kratos and a randomly generated monster. The project demonstrates backend game logic, API design, database persistence, and a modern Vue front-end UI.

## Project aim

This application follows the assignment brief for a battle simulation inspired by the story of Kratos:

- Kratos has a set of randomized stats within specified ranges
- Wild monsters are also generated with randomized attributes
- The first attacker is determined by speed, with luck as the tie-breaker
- Attack damage is calculated using the rule: `Damage = Attacker Strength - Defender Defence`
- Attacks can miss based on the defender's luck
- Kratos has special skills: Rapid Fire and Magic Armour
- The battle ends when one participant loses all health or after 15 turns
- Each turn logs the event details, including damage, skills used, and remaining health

## Why this project is valuable

This project is designed to showcase a range of practical software engineering skills, including:

- PHP and Laravel backend development
- Object-oriented design and reusable service logic
- REST API development
- Data modeling and database integration
- Vue front-end implementation
- Clean separation of responsibilities and scalable architecture
- Automated validation with tests and Laravel's testing tools

## Core gameplay rules implemented

### Character generation

- Kratos stats:
  - Health: 65-100
  - Strength: 75-90
  - Defence: 40-50
  - Speed: 40-50
  - Luck: 10%-20%

- Monster stats:
  - Health: 50-80
  - Strength: 55-80
  - Defence: 50-70
  - Speed: 40-60
  - Luck: 30%-45%

### Skills

- Rapid Fire: Kratos can strike twice during his attack turn with a 15% chance per attack
- Magic Armour: Kratos reduces incoming damage by half with a 15% chance when defending

### Turn system

- The faster participant attacks first
- If speeds are equal, the character with higher luck attacks first
- After each attack, roles switch
- The battle ends when one fighter reaches 0 health or when the maximum of 15 turns is reached
- The result is persisted and displayed in the UI

## Tech stack

- PHP 8.3
- Laravel 13
- Vue 3
- Vite
- SQLite (default configuration)
- Laravel Sail / Docker-ready setup
- Composer and npm for dependency management

## Application architecture

The project follows a clean Laravel full-stack structure:

- `app/Services/BattleEngine.php` — contains the combat simulation and core battle rules
- `app/Http/Controllers/BattleController.php` — exposes battle API endpoints
- `app/Models/Battle.php` and `app/Models/BattleLog.php` — persistence models for battle history
- `routes/api.php` — defines the application routes
- `resources/js/` — Vue components for the battle UI
- `database/migrations/` — battle data schema

This design keeps the business logic separated from HTTP and UI concerns, making it easier to extend with new abilities, units, or battle rules.

## Features

- Randomized character generation for every battle
- Logic-driven turn resolution
- Skill handling for Kratos
- Persistent battle history in the database
- API endpoints for running a battle and retrieving battle records
- Vue-based interface to display battle stats and logs
- Reusable service layer for future expansion

## Project structure

```text
app/
  Http/Controllers/
  Models/
  Services/
config/
database/
resources/
  js/
routes/
tests/
```


## API endpoints

### Run a battle

```http
POST /api/battles/run
```

This creates a new battle simulation and stores the result in the database.

### List all battles

```http
GET /api/battles
```

This returns the battle history in descending order.

## Testing

This project is built with testing and maintainability in mind. Run the Laravel test suite with:

```bash
php artisan test
```

## Production build

```bash
npm run build
```

## Quick setup shortcut

A Composer script is included for a faster setup:

```bash
composer run setup
```

This installs dependencies, generates the Laravel app key, runs migrations, and builds the frontend assets.

## Skills demonstrated

This project highlights a strong combination of backend and full-stack capabilities, including:

- PHP development
- Laravel MVC and API patterns
- Service-oriented architecture
- Database design and Eloquent usage
- Front-end integration with Vue and Vite
- Clean coding practices and scalable logic design
- Problem-solving through game logic implementation

