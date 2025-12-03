# Visão Geral do Sistema WebClass

WebClass é um sistema abrangente de gerenciamento de cursos online construído com Laravel. A plataforma fornece uma solução completa de gestão de aprendizagem com ambientes separados para alunos e administradores.

## Arquitetura do Sistema

O sistema é dividido em dois ambientes principais:

- **Ambiente do Aluno**: Interface frontend para navegação, inscrição, aprendizado e avaliação de cursos
- **Ambiente Administrativo**: Interface backend para gerenciamento completo do sistema e criação de conteúdo

---

## Ambiente do Aluno

O ambiente do aluno fornece uma interface intuitiva para os aprendizes acessarem e completarem cursos.

### Página Inicial

A página inicial recebe os alunos com cursos em destaque e navegação fácil.

**Página Inicial do Aluno**

![Student Home](./readme_assets/aluno/home.jpg)

### Navegação de Cursos

Os alunos podem navegar por todos os cursos disponíveis organizados por categorias e trilhas.

**Todos os Cursos**

![All Courses](./readme_assets/aluno/todos-cursos.jpg)

### Categorias

Os cursos são organizados em categorias para fácil descoberta.

**Lista de Categorias**

![Categories](./readme_assets/aluno/categorias.jpg)

**Visualização de Categoria**

![Category View](./readme_assets/aluno/categoria.jpg)

### Trilhas de Aprendizagem

As trilhas de aprendizagem agrupam cursos relacionados em caminhos de aprendizado estruturados.

**Lista de Trilhas**

![Trails](./readme_assets/aluno/trilhas.png)

**Detalhes da Trilha**

![Trail Details](./readme_assets/aluno/trilha.jpg)

### Meus Cursos

Os alunos podem visualizar e gerenciar seus cursos inscritos.

**Meus Cursos**

![My Courses](./readme_assets/aluno/meus-cursos.png)

### Estados do Curso

O sistema rastreia diferentes estados de curso para cada aluno:

**Não Inscrito**

![Course Not Enrolled](./readme_assets/aluno/curso-naoinscrito.jpg)

**Recém Inscrito**

![Recently Enrolled](./readme_assets/aluno/curso-receminscrito.jpg)

**Aprovado**

![Course Approved](./readme_assets/aluno/curso-aprovado.jpg)

**Reprovado**

![Course Failed](./readme_assets/aluno/curso-reprovado.jpg)

### Videoaulas

Os alunos podem assistir videoaulas integradas com YouTube.

**Assistindo Videoaula**

![Watching Video Lesson](./readme_assets/aluno/assistir-videoaula.jpg)

### Conclusão de Unidade

Acompanhe o progresso conforme as unidades são concluídas.

**Unidade Completa**

![Completed Unit](./readme_assets/aluno/unidade-completa.jpg)

### Exames

Os alunos fazem exames para avaliar seu aprendizado.

**Verificação de Exame**

![Examination Verification](./readme_assets/aluno/verificar-exame.jpg)

### Avaliações e Comentários

Os alunos podem avaliar e comentar sobre os cursos.

**Avaliações do Curso**

![Course Ratings](./readme_assets/aluno/avaliacoes.png)

### Instrutores

Visualize perfis de instrutores e seus cursos.

**Lista de Instrutores**

![Instructors List](./readme_assets/aluno/instrutores.jpg)

**Perfil do Instrutor**

![Instructor Profile](./readme_assets/aluno/instrutor.jpg)

### Perfil do Usuário

Os alunos podem gerenciar seu perfil e alterar senha.

**Menu do Usuário**

![User Menu](./readme_assets/aluno/menu-usuario.jpg)

**Alterar Senha**

![Change Password](./readme_assets/aluno/alterar-senha.jpg)

---

## Ambiente Administrativo

O ambiente administrativo fornece ferramentas abrangentes para gerenciar todos os aspectos da plataforma de aprendizagem.

### Painel de Controle

O painel administrativo fornece uma visão geral do sistema.

**Página Inicial Admin**

![Admin Home](./readme_assets/admin/home.jpg)

### Gerenciamento de Cursos

Os administradores podem criar e gerenciar cursos com informações detalhadas.

**Lista de Cursos**

![Courses List](./readme_assets/admin/cursos.png)

**Criar Novo Curso**

![New Course](./readme_assets/admin/novo-curso.png)

**Editar Curso**

![Edit Course](./readme_assets/admin/editar-curso.png)

**Detalhes do Curso**

![Course Details](./readme_assets/admin/curso.jpg)

### Gerenciamento de Categorias

Organize cursos em categorias.

**Lista de Categorias**

![Categories](./readme_assets/admin/categorias.jpg)

**Criar Categoria**

![New Category](./readme_assets/admin/nova-categoria.jpg)

**Editar Categoria**

![Edit Category](./readme_assets/admin/editar-categoria.jpg)

**Visualização de Categoria**

![Category](./readme_assets/admin/categoria.png)

### Gerenciamento de Trilhas

Crie trilhas de aprendizagem para agrupar cursos relacionados.

**Lista de Trilhas**

![Trails](./readme_assets/admin/trilhas.jpg)

**Criar Trilha**

![New Trail](./readme_assets/admin/nova-trilha.jpg)

**Editar Trilha**

![Edit Trail](./readme_assets/admin/editar-trilha.jpg)

**Detalhes da Trilha**

![Trail](./readme_assets/admin/trilha.png)

### Gerenciamento de Instrutores

Gerencie perfis de instrutores e atribuições.

**Criar Instrutor**

![New Instructor](./readme_assets/admin/novo-instrutor.jpg)

**Editar Instrutor**

![Edit Instructor](./readme_assets/admin/editar-instrutor.jpg)

**Lista de Instrutores**

![Instructors](./readme_assets/admin/instrutores.jpg)

**Perfil do Instrutor**

![Instructor](./readme_assets/admin/instrutor.png)

### Gerenciamento de Alunos

Gerencie contas de alunos e acompanhe o progresso.

**Lista de Alunos**

![Students](./readme_assets/admin/alunos.png)

**Criar Aluno**

![New Student](./readme_assets/admin/novo-aluno.jpg)

**Editar Aluno**

![Edit Student](./readme_assets/admin/editar-aluno.png)

**Relatório do Aluno**

![Student Report](./readme_assets/admin/relatorio-aluno.jpg)

### Gerenciamento de Conteúdo - Unidades

Organize o conteúdo do curso em unidades.

**Visualização de Unidade**

![Unit](./readme_assets/admin/unidade.png)

**Unidade Sem Exame**

![Unit Without Exam](./readme_assets/admin/unidade-semexame.png)

**Criar Unidade**

![New Unit](./readme_assets/admin/incluir-unidade.jpg)

**Editar Unidade**

![Edit Unit](./readme_assets/admin/editar-unidade.jpg)

### Gerenciamento de Conteúdo - Videoaulas

Adicione videoaulas às unidades.

**Criar Videoaula**

![New Video Lesson](./readme_assets/admin/incluir-videoaula.jpg)

**Editar Videoaula**

![Edit Video Lesson](./readme_assets/admin/editar-videoaula.jpg)

**Assistir Videoaula**

![Watch Lesson](./readme_assets/admin/assistir-videoaula.png)

### Gerenciamento de Conteúdo - Material do Curso

Faça upload e gerencie materiais do curso (PDFs, documentos).

**Criar Material**

![New Courseware](./readme_assets/admin/incluir-arquivo.jpg)

**Editar Material**

![Edit Courseware](./readme_assets/admin/editar-arquivo.jpg)

### Gerenciamento de Exames

Crie e gerencie exames para unidades.

**Visão Geral do Exame**

![Exam](./readme_assets/admin/exame.png)

**Criar Exame**

![New Exam](./readme_assets/admin/incluir-exame.jpg)

**Editar Exame**

![Edit Exam](./readme_assets/admin/editar-exame.jpg)

**Exame Inicial**

![Initial Exam](./readme_assets/admin/exame-inicial.jpg)

**Exame Final**

![Final Exam](./readme_assets/admin/exame-final.jpg)

### Gerenciamento de Questões

Crie questões de múltipla escolha para exames.

**Criar Questão**

![New Question](./readme_assets/admin/incluir-questao.png)

**Editar Questão**

![Edit Question](./readme_assets/admin/editar-questao.png)

### Gerenciamento de Avaliações

Visualize e gerencie avaliações de cursos dos alunos.

**Avaliações do Curso**

![Course Ratings](./readme_assets/admin/avaliacoes.png)

### Gerenciamento de Usuários

Gerencie contas de usuários e permissões.

**Menu do Usuário**

![User Menu](./readme_assets/admin/menu-usuario.jpg)

**Recuperação de Senha**

![Password Recovery](./readme_assets/admin/recuperacao-senha.png)

**Nova Senha**

![New Password](./readme_assets/admin/nova-senha.png)

**Login**

![Login](./readme_assets/admin/login.jpg)

---

## Resumo dos Principais Recursos

### Para Alunos
✅ Navegar cursos por categoria ou trilha de aprendizagem  
✅ Inscrever-se em cursos  
✅ Assistir videoaulas (integração com YouTube)  
✅ Baixar materiais do curso  
✅ Fazer exames iniciais e finais  
✅ Acompanhar progresso de aprendizagem  
✅ Obter certificados de conclusão (PDF)  
✅ Avaliar e comentar sobre cursos  
✅ Gerenciar perfil e senha  

### Para Administradores
✅ Gerenciamento completo de cursos (CRUD)  
✅ Organização de categorias e trilhas  
✅ Gerenciamento de instrutores  
✅ Gerenciamento de alunos e relatórios  
✅ Criação de conteúdo (unidades, aulas, materiais)  
✅ Gerenciamento de exames e questões  
✅ Gerenciamento de avaliações e feedback  
✅ Autenticação e autorização de usuários  
✅ Geração de certificados em PDF  

---

## Stack Tecnológica

- **Backend**: Laravel 5.5 (PHP 7+)
- **Banco de Dados**: MySQL
- **Frontend**: HTML5, CSS3, JavaScript, Bootstrap
- **Integração de Vídeo**: YouTube
- **Geração de PDF**: DomPDF
- **Segurança**: HTMLPurifier para sanitização de conteúdo

---

## Conclusão

WebClass fornece uma solução completa e profissional para gerenciamento de cursos online. Com sua arquitetura de ambiente duplo, atende tanto aprendizes em busca de conhecimento quanto administradores gerenciando conteúdo educacional de forma eficaz.

Para instruções de instalação e configuração, consulte o arquivo [README-PT.md](README-PT.md).
