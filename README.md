# 📚 Repositório de Trabalhos de Conclusão de Curso

Sistema web desenvolvido em **Laravel** para gerenciamento e repositório de TCCs, permitindo o cadastro de membros de banca e trabalhos acadêmicos.

> Projeto desenvolvido na cadeira de **Programação IV**, ministrada pelo professor **Daniel Boemo**.

---

## 🚀 Tecnologias Utilizadas

- [Laravel 10+](https://laravel.com/)
- PHP 8+
- MySQL
- Bootstrap 5
- Blade Templates

---

## ⚙️ Requisitos

- PHP >= 8.0
- Composer
- [Laragon](https://laragon.org/download/) (recomendado)

---

## 📦 Instalação

**1. Instale o [Laragon](https://laragon.org/download/) e inicie os serviços (Apache e MySQL)**

**2. Clone o repositório dentro da pasta `www` do Laragon:**
```bash
cd C:/laragon/www
git clone https://github.com/jvsobroza/Repositorio-Trabalho-Conclusao-Curso.git
cd Repositorio-Trabalho-Conclusao-Curso
```

**3. Instale as dependências:**
```bash
composer install
npm install
```

**4. Crie o banco de dados `repotcc` pelo HeidiSQL ou pelo terminal:**
```sql
CREATE DATABASE repotcc;
```

**5. Execute as migrations na ordem correta por causa dos relacionamentos:**
```bash
php artisan migrate --path=/database/migrations/2026_03_24_232552_create_bancas_table.php
php artisan migrate --path=/database/migrations/2026_03_24_232543_create_tccs_table.php
```

**6. Inicie o servidor:**
```bash
php artisan serve
```

**7. Acesse o projeto pelo navegador:**
```
http://localhost/Repositorio-Trabalho-Conclusao-Curso/public/tcc
```

---

## 📋 Funcionalidades

### 👨‍🏫 Banca
- Cadastro, edição, visualização e exclusão de membros de banca
- Campos: nome e titulação

### 📄 TCCs
- Cadastro, edição, visualização e exclusão de TCCs
- Campos: título, páginas, data, hora, aluno, resumo, palavras-chave, PDF, orientador, banca 1 e banca 2
- Upload de arquivo PDF armazenado em `public/pdfs`
- Visualização do PDF diretamente no navegador

---

## 🗂️ Estrutura Principal
```
app/
├── Http/
│   ├── Controllers/
│   │   ├── BancaController.php
│   │   └── TccController.php
│   └── Requests/
├── Models/
│   ├── Banca.php
│   └── Tcc.php
resources/
└── views/
    ├── banca/
    └── tcc/
```

---

## ⚠️ Observação

O arquivo `.env` está incluído no repositório pois as credenciais são locais e padrão do Laragon. Não utilize essas configurações em ambiente de produção.

---

## 👨‍💻 Autor

**João Victor Sobroza**

[![Gmail](https://img.shields.io/badge/Gmail-D14836?style=for-the-badge&logo=gmail&logoColor=white)](mailto:joaovictor0908.jv@gmail.com)
[![GitHub](https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white)](https://github.com/jvsobroza)
[![LinkedIn](https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/joao-sobroza)

---

## 📝 Licença

Este projeto está sob a licença MIT.
