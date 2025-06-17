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

- Na sua linha de comando, viaje para a pasta htdocs do xampp:

    ![Primeiro passo](/Readme/01%20-%20Pasta%20htdocs.png)

    - No Windows, esse caminho fica, normalmente, em **C:/xampp/htdocs**.
    - No Ubuntu, você pode encontrá-la em **/opt/lampp/htdocs** (Imagem acima).

- **IMPORTANTE**: Esvazie o conteúdo de seu htdocs.
    O projeto foi criado com a ideia de que rodará diretamente no htdocs, sem nenhuma outra pasta intermediária!

- _Rode o seguinte comando_ no seu terminal para clonar o repositório na sua máquina na pasta atual:

    `git clone https://github.com/ApenasOLinco/Purrsue.git ./`

    Ao terminar de clonar o repositório, seus arquivos se parecerão com isso:

    ✅ **Correto:**

    ![Modelo correto](/Readme/02%20-%20Modelo%20correto%20do%20repositório.png)

    Todos os arquivos diretamente na pasta htdocs.