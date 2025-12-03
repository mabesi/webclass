# WEBCLASS - Sistema de Cursos Online

Sistema completo de gerenciamento de cursos online desenvolvido em Laravel, com ambientes separados para Alunos e Administradores.

> **[Read in English](README.md)** 🇺🇸

<kbd>
    <img src="./banner.png" />
</kbd>

## :speech_balloon: Descrição

O WebClass é um sistema robusto de gerenciamento de cursos online que permite a criação, organização e distribuição de conteúdo educacional. O sistema é dividido em dois ambientes principais: **Aluno** (frontend) e **Admin** (backend), oferecendo uma experiência completa tanto para estudantes quanto para administradores de conteúdo.

Para uma visão detalhada do sistema com capturas de tela e funcionalidades, consulte o [OVERVIEW.md](OVERVIEW.md).

## Índice

- [WEBCLASS - Sistema de Cursos Online](#webclass---sistema-de-cursos-online)
  - [:speech\_balloon: Descrição](#speech_balloon-descrição)
  - [Índice](#índice)
  - [Funcionalidades](#funcionalidades)
    - [Ambiente do Aluno](#ambiente-do-aluno)
    - [Ambiente do Administrador](#ambiente-do-administrador)
  - [Tecnologias Utilizadas](#tecnologias-utilizadas)
  - [Começando](#começando)
    - [Pré-requisitos](#pré-requisitos)
    - [Instalação](#instalação)
    - [Configuração](#configuração)
    - [Uso](#uso)
  - [Estrutura do Sistema](#estrutura-do-sistema)
    - [Principais Entidades](#principais-entidades)
  - [Contribuindo](#contribuindo)
  - [Autor](#autor)
  - [Licença](#licença)

## Funcionalidades

### Ambiente do Aluno

- **Navegação de Cursos**: Explore cursos por categorias ou trilhas de aprendizado
- **Inscrição em Cursos**: Inscreva-se em cursos de interesse
- **Videoaulas**: Assista videoaulas integradas com YouTube
- **Material Didático**: Faça download de arquivos e materiais complementares
- **Avaliações**: Realize exames iniciais e finais para cada unidade
- **Acompanhamento de Progresso**: Visualize seu progresso em cada curso
- **Certificados**: Obtenha certificados de conclusão em PDF
- **Avaliações de Cursos**: Avalie cursos concluídos
- **Gerenciamento de Perfil**: Altere senha e gerencie informações pessoais

### Ambiente do Administrador

- **Gerenciamento de Cursos**: Crie, edite e organize cursos
- **Categorias e Trilhas**: Organize cursos em categorias e trilhas de aprendizado
- **Gestão de Instrutores**: Cadastre e gerencie instrutores
- **Gestão de Alunos**: Administre usuários e visualize relatórios de progresso
- **Criação de Conteúdo**: 
  - Organize cursos em unidades
  - Adicione videoaulas e materiais didáticos
  - Crie exames com questões de múltipla escolha
- **Relatórios**: Acompanhe o desempenho e progresso dos alunos
- **Gestão de Avaliações**: Visualize e gerencie avaliações de cursos

## Tecnologias Utilizadas

- **Framework**: Laravel 5.5
- **Linguagem**: PHP >= 7.0.0
- **Banco de Dados**: MySQL
- **Frontend**: 
  - HTML5
  - CSS3
  - JavaScript
  - Bootstrap
- **Bibliotecas PHP**:
  - Laravel DomPDF (geração de certificados)
  - HTMLPurifier (sanitização de conteúdo)
- **Ferramentas de Build**:
  - Laravel Mix
  - Webpack
  - NPM

## Começando

### Pré-requisitos

- PHP >= 7.0.0
- Composer
- MySQL >= 5.7
- Node.js >= 8.0
- NPM ou Yarn

### Instalação

Clone o repositório em sua máquina local:

```bash
$ git clone https://github.com/mabesi/webclass.git
$ cd webclass
```

Instale as dependências do PHP usando Composer:

```bash
$ composer install
```

Instale as dependências do Node.js:

```bash
$ npm install
```

Ou usando Yarn:

```bash
$ yarn install
```

### Configuração

1. Clone o arquivo `.env.example` para `.env`:

```bash
$ cp .env.example .env
```

2. Configure as variáveis de ambiente no arquivo `.env`:

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
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=seu_usuario_email
MAIL_PASSWORD=sua_senha_email
```

3. Gere a chave da aplicação:

```bash
$ php artisan key:generate
```

4. Execute as migrations para criar as tabelas do banco de dados:

```bash
$ php artisan migrate
```

5. (Opcional) Execute os seeders para popular o banco com dados de exemplo:

```bash
$ php artisan db:seed
```

6. Compile os assets:

```bash
$ npm run dev
```

### Uso

Inicie o servidor de desenvolvimento:

```bash
$ php artisan serve
```

Acesse a aplicação em [http://localhost:8000](http://localhost:8000).

Para desenvolvimento com hot reload dos assets:

```bash
$ npm run watch
```

Para build de produção:

```bash
$ npm run production
```

## Estrutura do Sistema

O sistema é organizado em três áreas principais:

- **Frontend (Aluno)**: Interface para estudantes acessarem cursos, videoaulas e materiais
- **Backend (Admin)**: Painel administrativo para gerenciamento completo do sistema
- **Auth**: Sistema de autenticação e recuperação de senha

### Principais Entidades

- **Courses**: Cursos disponíveis no sistema
- **Categories**: Categorias para organização de cursos
- **Trails**: Trilhas de aprendizado (conjunto de cursos)
- **Instructors**: Instrutores responsáveis pelos cursos
- **Unities**: Unidades que compõem um curso
- **Lessons**: Videoaulas dentro de cada unidade
- **Coursewares**: Materiais didáticos (PDFs, documentos)
- **Examinations**: Exames de avaliação
- **Questions**: Questões de múltipla escolha para os exames
- **Ratings**: Avaliações dos cursos pelos alunos

## Contribuindo

Contribuições são bem-vindas! Siga os passos abaixo para contribuir:

1. Fork o projeto
2. Crie uma branch para sua feature: `git checkout -b minha-nova-feature`
3. Adicione suas mudanças: `git add .`
4. Commit suas mudanças: `git commit -am 'Adiciona nova feature'`
5. Push para a branch: `git push origin minha-nova-feature`
6. Envie um Pull Request

## Autor

| [<img loading="lazy" src="https://github.com/mabesi/mabesi/blob/master/octocat-mabesi.png" width=115><br><sub>Plinio Mabesi</sub>](https://github.com/mabesi) |
| :---: |

## Licença

Este projeto está licenciado sob a [Licença MIT](LICENSE.md).
