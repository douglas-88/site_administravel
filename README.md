# Site Administrável  em PHP
### Descrição do Projeto
Projeto desenvolvido de forma procedural, com o intuito de se praticar a linguagem PHP de forma simples e objetiva.
### Requisitos para utilizar este projeto
- PHP (7.2.* Recomendado)
- PHPMyAdmin
- Servidor Apache
- Servidor MySQL 5.7+
- GIT

### Como realizar o Build
Para testar a aplicação, iremos usar o Servidor web embutido do PHP, mas também é possivel utilizar outro servidor HTTP (Apache por exemplo).

#### Instalando
Para utilizar esta aplicação, primeiro é necessário fazer um clone do repositório.

```
git clone https://github.com/douglas-88/site_administravel.git
```

#### Configurando o banco de dados
Utilize o phpMyAdmin , ou qualquer outro meio para criar um banco de dados com nome de sua preferência.

copie o arquivo **config_example.ini** e renomeio para **config.ini** localizado na raiz da aplicação, e edite o conteúdo das variáveis.

```
[database]
host = nome do host
port = numero da porta
dbname = nome do banco de dados
username = usuario do banco de dados
password = senha 
```


Altere o nome do host,port,dbname,username e password, conforme as configurações do seu servidor MySQL.

#### Iniciando o Servidor
Por fim, com o terminal aberto no diretório da aplicação, inicie o servidor embutido do PHP com o seguinte comando:

```shell
$ php -S localhost:8080 -t public
```



