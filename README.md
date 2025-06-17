# Purrsue

É com muita empolgação que apresento o **Purrsue**: uma rede simples de cadastro de dados sobre - veja só - _gatinhos_!

## 1. Considerações

Pessoalmente - e antes de mais nada - quero _agradecer ao professor Jason_ por nos guiar pela matéria de PHP. Desde o início da faculdade - e, sinceramente, em alguns bons anos -, esse foi o projeto que mais me diverti fazendo. Por querer, faz tempo, aprender comunicação cliente-servidor melhor, PHP caiu como uma luva, e por isso sou muito grato!

## 2. Conceito

Com o Purrsue, você pode cadastrar informações sobre seus gatinhos favoritos e deixar o sistema cuidar da parte complicada. Você só precisa logar, cadastrar seu bichano e pronto! Ele fica disponível para consulta até segunda ordem.

## 3. Rodar na sua máquina

### 3.1 Requisitos

- Xampp;
- PHP;
    - Preferencialmente, use 8.1, pois não estou familiarizado com as nuances entre as versões do PHP até o momento da escrita desse README.
- Mais ou menos meia dúzia de boas fotos de gatos...

### 3.2 Clonando o repositório

1. Na sua linha de comando, viaje para a pasta htdocs do xampp:

    ![Primeiro passo](/Readme/01%20-%20Pasta%20htdocs.png)

    - No Windows, esse caminho fica, normalmente, em **C:/xampp/htdocs**.
    - No Ubuntu, você pode encontrá-la em **/opt/lampp/htdocs** (Imagem acima).

2. **IMPORTANTE**: Esvazie o conteúdo de seu htdocs.
    O projeto foi criado com a ideia de que rodará diretamente no htdocs, sem nenhuma outra pasta intermediária!

3. **Rode o seguinte comando** no seu terminal para clonar o repositório na sua máquina na pasta atual:

    `git clone https://github.com/ApenasOLinco/Purrsue.git ./`

    Ao terminar de clonar o repositório, seus arquivos se parecerão com isso:

    ~ ✅ **Correto:**

    ![Modelo correto](/Readme/02%20-%20Modelo%20correto%20do%20repositório.png)
    
    Todos os arquivos diretamente na pasta htdocs.

    ~ ❌ **Incorreto**:

    ![Modelo incorreto](/Readme/03%20-%20Modelo%20incorreto%20do%20repositório.png)

    Os arquivos foram clonados para uma dentro de htdocs.

Considerando que seus arquivos estejam como na imagem do exemplo correto, você está livre para iniciar o web server e o phpmyadmin!

### Importando o banco de dados

1. Com o seu phpmyadmin rodando e aberto no browser, vá para a aba "Import", mostrada na imagem:

    ![Botão de import](/Readme/04%20-%20Botão%20de%20import.png)

2. Clique no botão "Browse" (ou Navegar/Procurar):

    ![Botão Browse](/Readme/05%20-%20Botão%20Browse.png)

3. Navegue até seu htdocs, onde você clonou o repositório, e selecione o arquivo "purrsue.sql":

    ![purrsue.sql](/Readme/06%20-%20purrsue.sql.png)