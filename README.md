# Alexandre-Borghi-Gava

Instalei todo o ambiente necessário para o desafio. 

Fiz a escolha de usar o XAMPP como banco de dados pois baixando já vem com o php incluso
Extrai o BancoTeste.zip na area de trabalho.

Fiz Instalação do firebird como serviço, IBExpert e FlameRobin
Utilizei o FlameRobin para transformar o arquivo no formato .fbk em .fdb, depois utilizei o firebird junto com o IBExpert para transformar do .fdb para .csv e depois de .csv para .sql para importar a tabela no banco de dados PHPmyADMIN. 
foi necessário a criação de uma conta no IBExpert e gerar um código para usá-lo.

criei o arquivo da API : exemplo.http, nele coloquei as informações que faltavam como senha e email, fiz o request POST e consegui meu id de usuário e o token, colei no local especificado do arquivo, então testei o próximo POST request e deu status 200 OK.  

Ajustei a variavel do php.ini no xampp para conseguir importar arquivos maiores
Fiz os commits e push no final das primeiras 6 horas.

Criei o connection.php para conectar o PHPmyADMIN com o visual studio code usando a linguagem PHP e foi conectado com sucesso, Em seguida criei o index.php para fazer as outras partes do desafio como consultar ao banco de dados PHPmyADMIN, criar o arquivo csv, fazer um loop pelos resultados da consulta, escreve uma linha no arquivo CSV com os dados da linha atual, fechar o arquivo para então enviar o arquivo .csv para a API, onde ela exibe uma resposta e fecha conexão com o banco de dados . Fiz o código para acessar os dados do .sql e transforma-lo em .csv com sucesso, gerando na propria pasta do vscode, fiz os commits e o push no fim do dia.

Continuei implementando o código em php para acessar 4 tabelas no PHPmyADMIN para transformar os dados em um arquivo apenas no formato .csv automaticamente, após de ter feito a junção das tabelas no excel manualmente.

Continuei implementando a parte de enviar para a API, foi apresentado alguns erros de autenticação negada, mas consegui resolver, apareceu como sendo enviado com sucesso o arquivo para a API, utilizei php server, cliquei em server project, e stop server conforme fazia os testes, nesse server localhost:3000/index.php no meu caso mostra que a conexao foi bem succedida e arquivo enviado com sucesso, além de retornar informações sobre a API e seus status.







