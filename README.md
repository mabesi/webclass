# WEBCLASS - Online Course Management System

A complete online course management system built with Laravel, featuring separate environments for Students and Administrators.

> **[Leia em Português](README-PT.md)** 🇧🇷

<kbd>
    <img src="./docs/banner.png" />
</kbd>

## :speech_balloon: Description

WebClass is a robust online course management system that enables the creation, organization, and distribution of educational content. The system is divided into two main environments: **Student** (frontend) and **Admin** (backend), providing a complete experience for both learners and content administrators.

For a detailed system overview with screenshots and features, see the [OVERVIEW.md](docs/OVERVIEW.md).

## Table of Contents

- [WEBCLASS - Online Course Management System](#webclass---online-course-management-system)
  - [:speech\_balloon: Description](#speech_balloon-description)
  - [Table of Contents](#table-of-contents)
  - [Features](#features)
    - [Student Environment](#student-environment)
    - [Administrator Environment](#administrator-environment)
  - [Built With](#built-with)
  - [Getting Started](#getting-started)
    - [Prerequisites](#prerequisites)
    - [Installation](#installation)
    - [Configuration](#configuration)
    - [Usage](#usage)
    - [Building](#building)
  - [System Structure](#system-structure)
    - [Main Entities](#main-entities)
  - [Back Matter](#back-matter)
    - [Contributing](#contributing)
    - [Author](#author)
    - [License](#license)

## Features

### Student Environment

- **Course Browsing**: Explore courses by categories or learning trails
- **Course Enrollment**: Enroll in courses of interest
- **Video Lessons**: Watch video lessons integrated with YouTube
- **Course Materials**: Download files and supplementary materials
- **Assessments**: Take initial and final exams for each unit
- **Progress Tracking**: View your progress in each course
- **Certificates**: Obtain completion certificates in PDF format
- **Course Ratings**: Rate completed courses
- **Profile Management**: Change password and manage personal information

### Administrator Environment

- **Course Management**: Create, edit, and organize courses
- **Categories and Trails**: Organize courses into categories and learning trails
- **Instructor Management**: Register and manage instructors
- **Student Management**: Administer users and view progress reports
- **Content Creation**: 
  - Organize courses into units
  - Add video lessons and course materials
  - Create exams with multiple-choice questions
- **Reports**: Track student performance and progress
- **Rating Management**: View and manage course ratings

## Built With

- **Framework**: Laravel 5.5
- **Language**: PHP >= 7.0.0
- **Database**: MySQL
- **Frontend**: 
  - HTML5
  - CSS3
  - JavaScript
  - Bootstrap
- **PHP Libraries**:
  - Laravel DomPDF (certificate generation)
  - HTMLPurifier (content sanitization)
- **Build Tools**:
  - Laravel Mix
  - Webpack
  - NPM

## Getting Started

### Prerequisites

- PHP >= 7.0.0
- Composer
- MySQL >= 5.7
- Node.js >= 8.0
- NPM or Yarn

### Installation

Clone the repository to your local machine:

```bash
$ git clone https://github.com/mabesi/webclass.git
$ cd webclass
```

Install PHP dependencies using Composer:

```bash
$ composer install
```

Install Node.js dependencies:

```bash
$ npm install
```

Or using Yarn:

```bash
$ yarn install
```

### Configuration

1. Copy the `.env.example` file to `.env`:

```bash
$ cp .env.example .env
```

2. Configure the environment variables in the `.env` file:

```bash
APP_NAME=WebClass
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=webclass
DB_USERNAME=your_username
DB_PASSWORD=your_password

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_email_username
MAIL_PASSWORD=your_email_password
```

3. Generate the application key:

```bash
$ php artisan key:generate
```

4. Run migrations to create database tables:

```bash
$ php artisan migrate
```

5. (Optional) Run seeders to populate the database with sample data:

```bash
$ php artisan db:seed
```

6. Compile assets:

```bash
$ npm run dev
```

### Usage

Start the development server:

```bash
$ php artisan serve
```

Access the application at [http://localhost:8000](http://localhost:8000).

For development with asset hot reload:

```bash
$ npm run watch
```

### Building

For production build:

```bash
$ npm run production
```

## System Structure

The system is organized into three main areas:

- **Frontend (Student)**: Interface for students to access courses, video lessons, and materials
- **Backend (Admin)**: Administrative panel for complete system management
- **Auth**: Authentication and password recovery system

### Main Entities

- **Courses**: Courses available in the system
- **Categories**: Categories for course organization
- **Trails**: Learning trails (course collections)
- **Instructors**: Instructors responsible for courses
- **Unities**: Units that compose a course
- **Lessons**: Video lessons within each unit
- **Coursewares**: Course materials (PDFs, documents)
- **Examinations**: Assessment exams
- **Questions**: Multiple-choice questions for exams
- **Ratings**: Course ratings by students

## Back Matter

### Contributing

Contributions are welcome! Follow these steps to contribute:

1. Fork the project
2. Create your feature branch: `git checkout -b my-new-feature`
3. Add your changes: `git add .`
4. Commit your changes: `git commit -am 'Add some feature'`
5. Push to the branch: `git push origin my-new-feature`
6. Submit a Pull Request

### Author

| [<img loading="lazy" src="https://github.com/mabesi/mabesi/blob/master/octocat-mabesi.png" width=115><br><sub>Plinio Mabesi</sub>](https://github.com/mabesi) |
| :---: |

### License

This project is licensed under the [MIT License](LICENSE.md).
