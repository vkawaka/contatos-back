# Backend - Administração de Contatos.

Este repositório é responsável por gerenciar a lógica do servidor e as operações com o banco de dados para o sistema. 

Vamos configurar e rodar tudo certinho? 😉

---

## 🛠️ Pré-requisitos

Antes de começar, certifique-se de ter as ferramentas abaixo instaladas:

- **[XAMPP](https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/8.2.12/)** (instale o pacote **xampp-windows-x64-8.2.12-0-VS16-installer.exe**).

> 🔥 **Importante:** O **XAMPP** é um pacote completo que facilita a configuração do ambiente local. Ele vem com os principais servidores de código aberto, como o **Apache** para hospedar a aplicação, o **MySQL** para o banco de dados e suporte para linguagens como **PHP** e **Perl**. 🚀
---

## 🔧 Configuração

### Instale o XAMPP em sua máquina 
Clique no link e siga os passos para o download e configuração do pacote **XAMPP** na sua máquina local.
>🔥**DICA:** Para a instalação, você pode assistir a esse vídeo tutorial: **[XAMPP Installation | PHP Tutorial For Beginners Full [ Beginner To Advance ]](https://youtu.be/qkDvtfkkz_4?si=ZA5QgPeDJ2JdopXQ)**.

### Clone o repositório

Depois de instalado e configurado, clone o repositório dentro do repositório **[htdocs]**, localizado no repositório **XAMPP** onde você extraiu (geralmente na pasta C: do seu computador.)

```bash
git clone https://github.com/vkawaka/contatos-back.git
cd contatos-back
```

### Banco de dados

Dentro da pasta deste repositório, você encontrará o arquivo de **dump** do banco de dados. Siga os passos:

1. **Abra o PHPmyadmin**: no seu navegador, digite: **[localhost/phpmyadmin]**
2. **Rode o script ou crie manualmente o banco de dados**.

---

## 🚀 Como rodar o servidor

Certifique-se de que o **MySQL** está rodando e o banco foi configurado corretamente. ✅
Certifique-se também, que o repositório se encontra dentro de **htdocs**. ✅
Agora, no seu navegador, digite: **localhost/contatos-back/public/contatos**, para acessar o método GET do projeto.

O backend estará rodando localmente na porta padrão! 🎉

## 🛣️ Rotas e Endpoints

Aqui estão as rotas da API para facilitar a integração! 🚀

| **Rota**                                  |  **Método**  | **Descrição**                    |
|-------------------------------------------|--------------|----------------------------------|
| `/contatos-back/public/contatos`          |  **GET**     | Retorna todos os contatos        |
| `/contatos-back/public/contato/:id`       |  **GET**     | Retorna um contato específico    |
| `/contatos-back/public/contatos`          |  **POST**    | Cria um novo contato             |
| `/contatos-back/public/contatos/:id`      |  **PUT**     | Atualiza um contato existente    |
| `/contatos-back/public/contatos/:id`      |  **DELETE**  | Deleta um contato                |
---

---

## 🌐 Integração com o Frontend

Para testar o sistema completo, é necessário também rodar o frontend. Você pode encontrar o repositório correspondente aqui:

➡️ [Frontend](https://github.com/vkawaka/contatos)

Basta seguir as instruções no frontend e garantir que o backend está rodando ao mesmo tempo.