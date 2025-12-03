# WebClass System Overview

WebClass is a comprehensive online course management system built with Laravel. The platform provides a complete learning management solution with separate environments for students and administrators.

## System Architecture

The system is divided into two main environments:

- **Student Environment**: Frontend interface for course browsing, enrollment, learning, and assessment
- **Admin Environment**: Backend interface for complete system management and content creation

---

## Student Environment

The student environment provides an intuitive interface for learners to access and complete courses.

### Home Page

The home page welcomes students with featured courses and easy navigation.

**Student Home**

![Student Home](./readme_assets/aluno/home.jpg)

### Course Browsing

Students can browse all available courses organized by categories and trails.

**All Courses**

![All Courses](./readme_assets/aluno/todos-cursos.jpg)

### Categories

Courses are organized into categories for easy discovery.

**Categories List**

![Categories](./readme_assets/aluno/categorias.jpg)

**Category View**

![Category View](./readme_assets/aluno/categoria.jpg)

### Learning Trails

Learning trails group related courses into structured learning paths.

**Trails List**

![Trails](./readme_assets/aluno/trilhas.png)

**Trail Details**

![Trail Details](./readme_assets/aluno/trilha.jpg)

### My Courses

Students can view and manage their enrolled courses.

**My Courses**

![My Courses](./readme_assets/aluno/meus-cursos.png)

### Course States

The system tracks different course states for each student:

**Not Enrolled**

![Course Not Enrolled](./readme_assets/aluno/curso-naoinscrito.jpg)

**Recently Enrolled**

![Recently Enrolled](./readme_assets/aluno/curso-receminscrito.jpg)

**Approved**

![Course Approved](./readme_assets/aluno/curso-aprovado.jpg)

**Failed**

![Course Failed](./readme_assets/aluno/curso-reprovado.jpg)

### Video Lessons

Students can watch video lessons integrated with YouTube.

**Watching Video Lesson**

![Watching Video Lesson](./readme_assets/aluno/assistir-videoaula.jpg)

### Unit Completion

Track progress as units are completed.

**Completed Unit**

![Completed Unit](./readme_assets/aluno/unidade-completa.jpg)

### Examinations

Students take examinations to assess their learning.

**Examination Verification**

![Examination Verification](./readme_assets/aluno/verificar-exame.jpg)

### Ratings and Reviews

Students can rate and review courses.

**Course Ratings**

![Course Ratings](./readme_assets/aluno/avaliacoes.png)

### Instructors

View instructor profiles and their courses.

**Instructors List**

![Instructors List](./readme_assets/aluno/instrutores.jpg)

**Instructor Profile**

![Instructor Profile](./readme_assets/aluno/instrutor.jpg)

### User Profile

Students can manage their profile and change password.

**User Menu**

![User Menu](./readme_assets/aluno/menu-usuario.jpg)

**Change Password**

![Change Password](./readme_assets/aluno/alterar-senha.jpg)

---

## Admin Environment

The admin environment provides comprehensive tools for managing all aspects of the learning platform.

### Dashboard

The admin dashboard provides an overview of the system.

**Admin Home**

![Admin Home](./readme_assets/admin/home.jpg)

### Course Management

Administrators can create and manage courses with detailed information.

**Course List**

![Courses List](./readme_assets/admin/cursos.png)

**Create New Course**

![New Course](./readme_assets/admin/novo-curso.png)

**Edit Course**

![Edit Course](./readme_assets/admin/editar-curso.png)

**Course Details**

![Course Details](./readme_assets/admin/curso.jpg)

### Category Management

Organize courses into categories.

**Categories List**

![Categories](./readme_assets/admin/categorias.jpg)

**Create Category**

![New Category](./readme_assets/admin/nova-categoria.jpg)

**Edit Category**

![Edit Category](./readme_assets/admin/editar-categoria.jpg)

**Category View**

![Category](./readme_assets/admin/categoria.png)

### Trail Management

Create learning trails to group related courses.

**Trails List**

![Trails](./readme_assets/admin/trilhas.jpg)

**Create Trail**

![New Trail](./readme_assets/admin/nova-trilha.jpg)

**Edit Trail**

![Edit Trail](./readme_assets/admin/editar-trilha.jpg)

**Trail Details**

![Trail](./readme_assets/admin/trilha.png)

### Instructor Management

Manage instructor profiles and assignments.

**Create Instructor**

![New Instructor](./readme_assets/admin/novo-instrutor.jpg)

**Edit Instructor**

![Edit Instructor](./readme_assets/admin/editar-instrutor.jpg)

**Instructors List**

![Instructors](./readme_assets/admin/instrutores.jpg)

**Instructor Profile**

![Instructor](./readme_assets/admin/instrutor.png)

### Student Management

Manage student accounts and track progress.

**Students List**

![Students](./readme_assets/admin/alunos.png)

**Create Student**

![New Student](./readme_assets/admin/novo-aluno.jpg)

**Edit Student**

![Edit Student](./readme_assets/admin/editar-aluno.png)

**Student Report**

![Student Report](./readme_assets/admin/relatorio-aluno.jpg)

### Content Management - Units

Organize course content into units.

**Unit View**

![Unit](./readme_assets/admin/unidade.png)

**Unit Without Exam**

![Unit Without Exam](./readme_assets/admin/unidade-semexame.png)

**Create Unit**

![New Unit](./readme_assets/admin/incluir-unidade.jpg)

**Edit Unit**

![Edit Unit](./readme_assets/admin/editar-unidade.jpg)

### Content Management - Video Lessons

Add video lessons to units.

**Create Video Lesson**

![New Video Lesson](./readme_assets/admin/incluir-videoaula.jpg)

**Edit Video Lesson**

![Edit Video Lesson](./readme_assets/admin/editar-videoaula.jpg)

**Watch Video Lesson**

![Watch Lesson](./readme_assets/admin/assistir-videoaula.png)

### Content Management - Course Materials

Upload and manage course materials (PDFs, documents).

**Create Courseware**

![New Courseware](./readme_assets/admin/incluir-arquivo.jpg)

**Edit Courseware**

![Edit Courseware](./readme_assets/admin/editar-arquivo.jpg)

### Examination Management

Create and manage examinations for units.

**Exam Overview**

![Exam](./readme_assets/admin/exame.png)

**Create Exam**

![New Exam](./readme_assets/admin/incluir-exame.jpg)

**Edit Exam**

![Edit Exam](./readme_assets/admin/editar-exame.jpg)

**Initial Exam**

![Initial Exam](./readme_assets/admin/exame-inicial.jpg)

**Final Exam**

![Final Exam](./readme_assets/admin/exame-final.jpg)

### Question Management

Create multiple-choice questions for examinations.

**Create Question**

![New Question](./readme_assets/admin/incluir-questao.png)

**Edit Question**

![Edit Question](./readme_assets/admin/editar-questao.png)

### Ratings Management

View and manage course ratings from students.

**Course Ratings**

![Course Ratings](./readme_assets/admin/avaliacoes.png)

### User Management

Manage user accounts and permissions.

**User Menu**

![User Menu](./readme_assets/admin/menu-usuario.jpg)

**Password Recovery**

![Password Recovery](./readme_assets/admin/recuperacao-senha.png)

**New Password**

![New Password](./readme_assets/admin/nova-senha.png)

**Login**

![Login](./readme_assets/admin/login.jpg)

---

## Key Features Summary

### For Students
✅ Browse courses by category or learning trail  
✅ Enroll in courses  
✅ Watch video lessons (YouTube integration)  
✅ Download course materials  
✅ Take initial and final examinations  
✅ Track learning progress  
✅ Obtain completion certificates (PDF)  
✅ Rate and review courses  
✅ Manage profile and password  

### For Administrators
✅ Complete course management (CRUD)  
✅ Category and trail organization  
✅ Instructor management  
✅ Student management and reporting  
✅ Content creation (units, lessons, materials)  
✅ Examination and question management  
✅ Rating and feedback management  
✅ User authentication and authorization  
✅ PDF certificate generation  

---

## Technology Stack

- **Backend**: Laravel 5.5 (PHP 7+)
- **Database**: MySQL
- **Frontend**: HTML5, CSS3, JavaScript, Bootstrap
- **Video Integration**: YouTube
- **PDF Generation**: DomPDF
- **Security**: HTMLPurifier for content sanitization

---

## Conclusion

WebClass provides a complete, professional solution for online course management. With its dual-environment architecture, it serves both learners seeking knowledge and administrators managing educational content effectively.

For installation and setup instructions, please refer to the [README.md](README.md) file.
