# Freedom Frames

## Descrição do Projeto
O sistema de gerenciamento de férias proposto visa facilitar a organização e otimização do tempo de férias dos colaboradores dentro de uma empresa, garantindo conformidade com as políticas internas e legislação laboral. Por meio de funcionalidades chave, como solicitação eletrônica de férias, aprovação gerencial automatizada, visualização de calendários de férias integrados, e notificações em tempo real, o sistema busca simplificar o processo de planejamento de férias, melhorar a transparência entre gestores e colaboradores, e contribuir para uma gestão de recursos mais eficiente. Além disso, oferece à empresa a capacidade de gerar relatórios detalhados para análises estratégicas, ajudando a manter um ambiente de trabalho equilibrado e produtivo.

## Funcionalidades
- **Acesso via login:** Cada funcionário terá um login fornecido por um administrador via e-mail. Podendo realizar a troca da senha ao tentar logar no sistema ou com ele já logado.

- **Controle de acesso:** Cada funcionário terá um tipo de permissão tendo três em seu total:
    - **Administrador:** Pode cadastrar, editar e excluir funcionários e setores, onde realiza a verificação das solicitações de férias encaminhadas para análise. Como também pode solicitar elas pelo sistema.
    - **Gestor:** Pode acompanhar as férias da sua equipe para melhor organização, como também solicitar elas.
    - **Funcionário:** Agenda suas férias e envia elas para avaliação de um funcionário administrador.

- **Criação de Planos de Férias:** Permite aos funcionários criar e personalizar seus planos de férias.

- **Calendário:** O sistema fornece uma tela específica onde possui um calendário. La será possível acomanhar as férias que foram aprovadas, e onde são gravadas, podendo ser visualizadas com mais detalhes caso clicar nela.

- **Exportar férias para um arquivo .xlsx:** Permite que todos possam exportar as férias que contém no calendário em um arquivo xlsx caso desejarem.

- **Tela inicial:** Nesta tela poderá verificar algumas informações gerais, como quantos dias possui para agendar as suas férias, e também a data limite para poder usufruí-las. 

- **Notificações por Email:** Os funcionários recebem notificações via email sobre as seguintes questões:
  - Cadastro realizado na base de dados do sistema;
  - Aprovação de férias;
  - Rejeição das férias;
  - Pedido de alteração de alguma informação enviada para análise das férias.

## Tecnologias Utilizadas
- PHP (8.3.6)
- JavaScript
- Laravel (11.4.0)
- Laravel UI (Autenticação dos usuários - 4.5)
- Vite (Gerenciador dos pacotes node - 5.2.11)
- Jquery (3.7.1)
- MySQL (Banco de Dados)
- GitHub
- Bootstrap (Framework CSS - 5.3.3)
- Sass (Estilização CSS - 1.56.1)
- PHPMailer (Biblioteca para envio de emails)
- Composer (Gerenciador de dependências PHP)
- Nginx/Apache (Servidor Web)
- Full Calendar (Biblioteca node para montar o calendário - 6.1.14)
- Select2 (Campos mais intuitivos para campos select - 4.1.0)
- Xlsx (Biblioteca em node para montar arquivos .xlsx - 0.18.5)
- Provedor gmail (Utilizado uma conta gmail nomeado para o sistema, para envio dos emails)
- DataTables (Biblioteca de Jquery onde estiliza as tables principais do sistema - 2.0.7)
- FontAwesome (Biblioteca de ícones para estilização do projeto - 6.5.2)

## Pré-requisitos
- PHP >= 8.3
- Jquery >= 3.7.1
- Bootstrap >= 5.3.3
- DataTables >= 2.0.7
- Select2 >= 4.1.0
- Composer
- MySQL
- Nginx/Apache

## Licença

### Olhar e se inspirar neste projeto

## Instruções de instalação

### Passo 1: Clonar o Repositório
```bash
git clone https://github.com/ZapinhaCode/agenda-ferias.git
cd agenda-ferias
```

### Passo 2: Rodar as dependências do projeto
```
composer install
npm install
```

### Passo 3: Criar o arquivo .env pegando o .env.example como referência
```
APP_NAME=FreedomFrames
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_TIMEZONE=America/Sao_Paulo
APP_URL=http://localhost

APP_LOCALE=pt_BR
APP_FALLBACK_LOCALE=pt_BR
APP_FAKER_LOCALE=pt_BR

APP_MAINTENANCE_DRIVER=file
APP_MAINTENANCE_STORE=database

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=agendaFerias
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=log
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"
```

### Passo 4: Criar a sua key única para o projeto
```
php artisan key:generate
```

### Passo 5: Criar o banco de dados MySQL utilizando as seguintes informações como base
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=agendaFerias
DB_USERNAME=root
DB_PASSWORD=
```

### Passo 6: Rodar as migration para montar as tabelas do seu banco de dados
```
php artisan migrate
```

### Passo 7: Rodar os insert para as tabelas de cargo, estado e cidade
```
Estão compiladas nos arquivos:
    - cargos.sql
    - estados.sql
    - cidades.sql
```

## Instruções de uso

### Passo 1: Em uma janela de terminal rode o comando para abrir a porta do Laravel
```
php artisan serve
```

### Passo 2: Em uma outra janela rode o seguinte comando para abrir a porta do Vite
```
npm run dev
```

## Licença
Este projeto se trata de um open-source que segue os padrões licenciados pela [MIT license](https://opensource.org/licenses/MIT).
