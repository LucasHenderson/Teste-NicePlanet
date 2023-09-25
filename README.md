<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre o Projeto

Esse projeto foi desenvolvido para um desafio teste da <a href="https://www.niceplanet.agr.br/">Niceplanet</a>. Espero que gostem :)

## Tecnologias Utilizadas

- **Laravel**
- **Laragon**
- **MySQL**
- **Insomnia**

## Endpoints
### POST
- **/api/login** => Fazer o login na API
- **/api/logout** => Fazer o logout na API
- **/api/registrar** => Registrar um novo login na API
- **/api/produtor** => Cadastrar um novo produtor
- **/api/propriedade** => Cadastrar uma nova propriedade
- **/api/cadastrorural** => Cadastrar um novo cadastro rural

### GET
- **/api/produtor** => Fazer a listagem de todos os produtores cadastrados
- **/api/propriedade** => Fazer a listagem de todas as propriedades cadastradas
- **/api/produtor/{id}** => Apresenta os dados de apenas 1 produtor cadastrado
- **/api/propriedade/{id}** => Apresenta os dados de apenas 1 propriedade cadastrada
- **/api/cadastrorural** => Faz a listagem de todos os cadastros rurais cadastrados
- **/api/cadastrorural/produtor/{id}** => Faz a listagem de todos os cadastros rurais que tenha um determinado produtor
- **/api/cadastrorural/propriedade/{id}** => Faz a listagem de todos os cadastros rurais que tenha uma determinada propriedade

## Como Utilizar
### Passo 1:
<div style="text-align: justify;">
Depois de clonar o projeto, você pode observar que a pasta <b>vendor</b> e o arquivo <b>.env</b> estão ausentes. Isso foi feito intencionalmente por duas razões principais: otimizar a velocidade de clonagem do projeto e garantir a segurança de dados sensíveis. Então, primeiramente devemos colocar essa pasta e arquivo novamente no projeto, para que ele possa rodar sem problemas. Para a pasta basta usarmos o comando <b>php composer.phar update "vendor/*"</b> ou <b>php composer update</b> no terminal. E para o arquivo basta copiarmos exatamente aquilo que está em <b>.env.example</b>. Pronto, agora o projeto está "preparado" para ser rodado.
</div>

### Passo 2:
<div style="text-align: justify;">
Agora vamos configurar a conexão com o banco de dados. Dentro do arquivo <b>.env</b> faça as seguintes mudanças:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=(coloque o nome da database aqui)
DB_USERNAME=(coloque o nome do usuário aqui)
DB_PASSWORD=(coloque a senha desse usuário aqui)
```

Após isso será necessário rodar as migrations. Abra o terminal dentro do diretório do projeto e execute o seguinte comando:

```
php artisan migrate
```
</div>

### Passo 3:
<div style="text-align: justify;">
Tudo pronto, finalmente podemos rodar o projeto. Abra o terminal dentro do diretório do projeto e execute o seguinte comando:
    
```
php artisan serve
```
</div>
