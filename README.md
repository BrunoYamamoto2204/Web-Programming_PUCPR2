# 🌐 Fundamentos de Programação Web (PUCPR)

Este repositório contém os materiais e o **projeto final** desenvolvidos para a disciplina de **Fundamentos de Programação Web**. O principal objetivo da matéria foi construir conhecimentos sólidos para o desenvolvimento web full-stack, utilizando tecnologias como **HTML, CSS, JavaScript, PHP e MySQL**.

---

## 📚 Conteúdos 

| Semana | Conteúdo                              |
|--------|----------------------------------------|
| 1      | Introdução ao HTML                    |
| 2      | Estilização com CSS                   |
| 3      | Lógica com JavaScript                 |
| 4      | Integração Front-End (HTML + JS + CSS)|
| 5      | Introdução ao PHP                     |
| 6      | Fundamentos de SQL                    |
| 7      | Integração com Back-End (PHP + SQL)   |
| 8      | Projeto Full Stack (Front + Back)     |
| 9      | Revisão e Avaliações Finais           |

---

## 🧩 Projeto Final: CRUD Full Stack de Produtos

Como aplicação prática de todos os conhecimentos adquiridos ao longo do módulo, foi desenvolvido um **sistema web  CRUD completo de cadastro e gerenciamento de produtos eletrônicos**, como teclados, mouses, monitores, laptops e desktops.

O sistema simula o painel de administração de um e-commerce e foi desenvolvido utilizando o **XAMPP**, com o **Apache** para o servidor local e o **MySQL** para o banco de dados.

### ✅ Funcionalidades Implementadas

- **🔐 Login:** Acesso ao sistema por meio de autenticação com validação de usuário e senha.
- **📝 Cadastro de Usuários:** Registro de novos usuários com validações de entrada.
- **📦 Cadastro de Produtos (CREATE):** Formulário para inserção de novos produtos no banco.
- **📋 Listagem de Produtos (READ):** Visualização de todos os produtos cadastrados com imagem, preço, descrição e categoria.
- **✏️ Edição de Produtos (UPDATE):** Permite modificar os dados dos produtos existentes.
- **🗑️ Exclusão de Produtos (DELETE):** Remoção permanente de produtos cadastrados.
- **👤 Exclusão de Conta:** O próprio usuário pode deletar sua conta.
- **🔒 Proteção de rotas:** Páginas principais só são acessíveis após login válido.
- **📁 Dados permanentes:** Todas as alterações são salvas no banco de dados MySQL.


### 📂 Arquivo Principal:
A lógica principal e a execução do projeto estão contidas no diretório: [`Somativa2-Web`](./Somativa2-Web)

---

## 💡 Tecnologias Utilizadas

- **Visual Studio Code (VSCode)**
- **HTML5**
- **CSS3**
- **JavaScript**
- **PHP 8+**
- **MySQL** (via phpMyAdmin)
- **XAMPP** (Apache + MySQL local)

---

## 🚀 Como Executar Localmente

1. **Clone o repositório:**

```bash
git clone https://github.com/seu-usuario/nome-do-repositorio.git
```

2.  **Copie o projeto para o diretório do XAMPP:**

O projeto precisa estar dentro da pasta htdocs, que é o diretório raiz do Apache no XAMPP.
    
```bash
C:\xampp\htdocs\nome-do-diretorio
```

3.  **Abra o projeto no VSCode (opcional):**
```bash
cd C:\xampp\htdocs\nome-do-diretorio
code .
```

4.  **Inicie o XAMPP:**
- Abra o XAMPP Control Panel.
- Clique em Start nos serviços Apache e MySQL.
- ⚠️ Dica: Desative o MySQL Workbench se estiver usando a porta 3306 para evitar conflito.


5. **Importe o banco de dados:**
-Acesse http://localhost/phpmyadmin
-Crie um novo banco com o nome usado no conectaBD.php.
-Importe o arquivo .sql do projeto (se houver).

6. **Acesse o sistema pelo navegador:**
```bash
http://localhost/nome-do-diretorio
```

---
## 📌 Observações
- Este projeto foi desenvolvido exclusivamente para fins acadêmicos.
- Simula um painel de administração simples, mas com práticas reais de desenvolvimento web full stack.

