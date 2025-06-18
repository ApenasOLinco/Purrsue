# Purrsue

É com muita empolgação que apresento o **Purrsue**: uma rede simples de cadastro de dados sobre - veja só - _gatinhos_!

## 1. Considerações

Pessoalmente - e antes de mais nada - quero _agradecer ao professor Jason_ por nos guiar pela matéria de PHP. Desde o início da faculdade - e, sinceramente, em alguns bons anos -, esse foi o projeto que mais me diverti fazendo. Por querer, faz tempo, aprender comunicação cliente-servidor melhor, PHP caiu como uma luva, e por isso sou muito grato!

## 2. Conceito

Com o Purrsue, você pode cadastrar informações sobre seus gatinhos favoritos e deixar o sistema cuidar da parte complicada. Você só precisa logar, cadastrar seu bichano e pronto! Ele fica disponível para consulta até segunda ordem.

## 3. Tema, Inspirações

Explorei territórios que ainda não havia nesse projeto. Dessa vez, resolvi incorporar um pouco da [estética neobrutalista](https://blog.logrocket.com/ux-design/neubrutalism-web-design/) para websites.

Bordas muito bem definidas, cores fortes e, ao mesmo tempo, um design plano. Isso tudo parecia se encaixar bem com a ideia do projeto. Escolhi um tema claro, pois eu estava apenas experimentando e o neobrutalismo funciona bem com cores claras.

Espero que goste!

## 4. Rodar na sua máquina

### 4.1 Requisitos

- Xampp;
- PHP;
    - Use a partir da versão 8.1! Enums são usados no código, e eles foram adicionados nessa versão.
- Mais ou menos meia dúzia de boas fotos de gatos...

### 4.2 Clonando o repositório

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

    Os arquivos foram clonados para uma pasta que fica dentro do htdocs.

Considerando que seus arquivos estejam como na imagem do exemplo correto, você está livre para iniciar o web server e o phpmyadmin!

### 4.3 Importando o banco de dados

1. Com o seu phpmyadmin rodando e aberto no browser, vá para a aba "Import", mostrada na imagem:

    ![Botão de import](/Readme/04%20-%20Botão%20de%20import.png)

2. Clique no botão "Browse" (ou Navegar/Procurar):

    ![Botão Browse](/Readme/05%20-%20Botão%20Browse.png)

3. Navegue até seu htdocs, onde você clonou o repositório, e selecione o arquivo "purrsue.sql":

    ![purrsue.sql](/Readme/06%20-%20purrsue.sql.png)

4. Depois de selecionar o arquivo purrsue.sql, navegue até o final da página e clique no botão para importar:

    ![Botão para importar](Readme/07%20-%20Rodar%20sql.png)

Pronto! O banco de dados estará criado no seu servidor local.

## 5. Contas de teste

Foram criadas duas contas de teste para facilitar o processo de avaliação: uma _com muitos gatos_ cadastrados, e uma _sem gatos_.

### Conta com gatos
- Usuário: LINCO
- Senha: linco123

### Conta sem gatos
- Usuário: NLINCO
- Senha: linco321

Eu deixei umas fotos que achei engraçadas de gatinhos na conta com gatos, então aproveite com moderação :)
