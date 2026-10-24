<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# HealthyLife (MVP)

> Versión ligera y enfocada de la aplicación web de salud y bienestar diseñada para usuarios latinoamericanos. Planes de alimentación con alimentos reales y accesibles en Colombia, y tracking diario simplificado — potenciados por IA.

---

## Tabla de contenido

- [Stack tecnológico](#-stack-tecnológico)
- [Arquitectura](#-arquitectura)
- [Requisitos previos](#-requisitos-previos)
- [Instalación y configuración](#-instalación-y-configuración)
- [Base de datos](#-base-de-datos)
- [Convenciones de código](#-convenciones-de-código)
- [Flujo de trabajo con Git](#-flujo-de-trabajo-con-git)
- [Equipo](#-equipo)

---

## Stack tecnológico

| Capa            | Tecnología                     | Versión                  |
| --------------- | ------------------------------ | ------------------------ |
| Backend / API   | PHP + Laravel                  | PHP ^8.3 · Laravel ^13.x |
| Frontend web    | React                          | ^18.x                    |
| Base de datos   | PostgreSQL[[PostgreSQL]]       | ^15.x                    |
| ORM             | Eloquent (incluido en Laravel) | —                        |
| Autenticación   | Laravel Sanctum                | ^4.x                     |
| IA nutricional  | Claude API (Anthropic)         | claude-3-5-sonnet        |
| Testing backend | Pest PHP                       | ^3.x                     |
| HTTP Client     | Guzzle (incluido en Laravel)   | ^7.x                     |

---

## Arquitectura (MVP)

```text
┌─────────────────────────────────────────────────────────┐
│                     CLIENTE                             │
│                   React 18 (Web)                        │
└────────────────────────┬────────────────────────────────┘
                         │ HTTP / JSON (REST API)
┌────────────────────────▼────────────────────────────────┐
│                  BACKEND — Laravel                       │
│                                                         │
│  Routes → Middleware → Controller → Service → Model     │
│                                                         │
│  ┌─────────────────┐      ┌──────────────────────────┐  │
│  │  Laravel        │      │  AI Service              │  │
│  │  Sanctum (Auth) │      │  (Generador de dietas)   │  │
│  └─────────────────┘      └────────────┬─────────────┘  │
└───────────────────────────────────────┼─────────────────┘
                         ┌──────────────┘
            ┌────────────▼──────────┐    ┌─────────────────┐
            │ PostgreSQL Database   │    │  Anthropic API  │
            │   (Eloquent ORM)      │    │  Claude Sonnet  │
            └───────────────────────┘    └─────────────────┘
```

---

## Requisitos previos

Asegúrate de tener instalado lo siguiente antes de clonar el proyecto:

- **PHP** >= 8.3
- **Composer** >= 2.x
- **Node.js** >= 20.x y **npm** >= 10.x
- **PostgreSQL** >= 15.x
- **Git**

---

## Instalación y configuración

```bash
# 1. Clonar el repositorio
git clone https://github.com/ospinaesteban151-prog/HealthyLifeMVP.git
cd HealthyLifeMVP

# 2. Instalar dependencias
composer install
npm install

# 3. Copiar el archivo de entorno
cp .env.example .env

# 4. Generar la clave de la aplicación
php artisan key:generate

# 5. Correr las migraciones con seeders
php artisan migrate --seed

# 6. Levantar el servidor de desarrollo
composer run dev
```

---

## 🗄 Base de datos (Esquema MVP)

El MVP se enfoca en las siguientes 4 tablas principales en **PostgreSQL**:

| Tabla | Descripción |
|---|---|
| `users` | Datos del usuario, país, meta calórica, nivel de actividad. |
| `foods` | Catálogo de alimentos locales con calorías y país de origen (ej. CO). |
| `meal_plans` | Planes de comida semanales generados por IA. |
| `daily_logs` | Registro diario simplificado: calorías consumidas, agua y check de ejercicio. |

---

## Convenciones de código

- **Patrón de Backend:** Controllers delgados (solo validan y responden), la lógica va en los `Services`.
- **Validaciones:** Siempre usar Form Requests (`php artisan make:request`).
- **Nombres de clases:** `PascalCase` → `MealPlanService`
- **Nombres de métodos y variables:** `camelCase` → `generarPlanComida()`
- **Nombres de tablas y columnas en BD:** `snake_case` → `meal_plans`, `created_at`
- **Rutas API:** `kebab-case` → `/api/meal-plans`

---

## Flujo de trabajo con Git

```bash
# 1. Siempre trabajar en una rama propia por feature
git checkout -b feat/setup-postgres

# 2. Hacer commits descriptivos (usar prefijos: feat, fix, docs, chore)
git commit -m "feat: add initial PostgreSQL migrations for users and foods"

# 3. Subir la rama y crear Pull Request
git push origin feat/setup-postgres
```

---

## Equipo

| Miembro | Rol | GitHub |
|---|---|---|
| Esteban (Elbnha) | Full-Stack · Arquitectura · Auth · Integración de IA | [@ospinaesteban151-prog](https://github.com/ospinaesteban151-prog) |
| Marlon | Bases de Datos · Modelado en PostgreSQL · Seeders | [@marlon15smith](https://github.com/marlon15smith) |

---
*Distribuido bajo la Licencia MIT.*