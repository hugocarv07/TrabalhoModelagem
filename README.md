# Como executar o projeto?

Este projeto utiliza **Laravel** junto com **MySQL**, portanto é necessário ter um ambiente configurado com essas tecnologias previamente instaladas.

## Pré-requisitos:
- PHP (versão compatível com Laravel)
- Composer
- Node.js e npm
- MySQL
- Um servidor local (pode ser XAMPP, Laragon ou outro de sua preferência)
- Editor de código (exemplo: VSCode)


## Passo a passo para executar o projeto:

1. **Clonar o repositório**  
   Faça o download ou clone o repositório para sua máquina.

2. **Abrir no editor de código**  
   Abra o projeto no seu editor de preferência (no meu caso, utilizei o VSCode).

3. **Instalar as dependências do projeto**  
   No terminal, dentro da pasta do projeto, execute:

   npm install
   composer install


4. **Configurar o arquivo `.env`**  
   Duplique o arquivo `.env.example` e renomeie para `.env`, configurando corretamente:
   - Conexão com seu banco de dados MySQL (DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD)

5. **Gerar chave da aplicação**  
   Execute:

   php artisan key:generate
  

6. **Rodar as migrações para criar o banco de dados**  
   Execute:

   php artisan migrate
   

7. **Subir o servidor Laravel**  
   Execute:
  
   php artisan serve
  

8. **Compilar os assets com o Vite**  
   Execute:
   
   npm run dev
   



Se tudo estiver configurado corretamente, o projeto estará rodando e acessível pelo navegador no endereço padrão:  
[http://localhost:8000](http://localhost:8000)

