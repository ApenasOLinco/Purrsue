<?php
/**
 * Os códigos de status que serão enviados de volta ao index.php em certas ocasiões.
 * Criada pra facilitar expansão com possíveis novas mensagens de erro ou de sucesso.
 */
enum Status: int
{
    /**
     * Tentativa de acesso a uma parte do site sem permissão correta
     */
    case NAO_AUTORIZADO = 1;
    
    /**
     * Nome de usuário ou senha não coincidem com nenhum registro no banco de dados
     */
    case CREDENCIAIS_INVALIDAS = 2;

    /**
     * Tentativa de acesso via GET em uma página POST e vice-versa
     */
    case METODO_INVALIDO = 3;

    /**
     * Os dados enviados via POST contém campos nulos ou vazios
     */
    case FORM_EM_BRANCO = 4;

    /**
     * Erro inesperado durante a consulta
     */
    case ERRO_NA_CONSULTA = 5;

    /**
     * Tentativa de cadastro com um nome de usuário que já existe no banco de dados
     */
    case USUARIO_EXISTENTE = 6;

    /**
     * Tentativa de cadastro com um e-mail já associado a uma conta no banco de dados
     */
    case EMAIL_EXISTENTE = 7;

    /**
     * Erro inesperado durante a criação de uma conta ou no cadastro de um gato
     */
    case ERRO_NA_INSERCAO = 8;

    /**
     * Cadastro realizado com sucesso
     */
    case CADASTRO_SUCESSO = 9;

    /**
     * Realização de um Logout
     */
    case LOGOUT = 10;

    /**
     * Provisão de uma URL inválida ao enviar um link via formulário
     */
    case URL_INVALIDA = 11;

    /**
     * Erro inesperado durante a exclusão de um gato
     */
    case ERRO_NA_EXCLUSAO = 12;

    /**
     * Exclusão de um gato realizada com suceso
     */
    case EXCLUSAO_SUCESSO = 13;
    
    /**
     * Retorna a mensagem associada ao objeto que está chamando essa função.
     * @return string A mensagem associada ao objeto que está chamando essa função
     */
    public function getMensagem(): string
    {
        return match ($this) {
            self::NAO_AUTORIZADO        => "Você não tem acesso suficiente para ver essa parte do site. Entre em uma conta válida e tente novamente.",
            self::CREDENCIAIS_INVALIDAS => "Credenciais inválidas. Entre com uma conta existente.",
            self::METODO_INVALIDO       => "Método Inválido. Esse recurso não pode ser acessado dessa forma.",
            self::FORM_EM_BRANCO        => "Formulário em Branco. Preencha todos os campos do formulário.",
            self::ERRO_NA_CONSULTA      => "Ocorreu um erro ao verificar seus dados. Tente novamente em alguns minutos.",
            self::USUARIO_EXISTENTE     => "Esse nome de usuário já está em uso. Tente novamente com outro nome de usuário.",
            self::EMAIL_EXISTENTE       => "Esse endereço de e-mail já está em uso. Tente novamente com outro endereço de e-mail.",
            self::ERRO_NA_INSERCAO      => "Ocorreu um erro ao fazer o cadastro. Tente novamente em alguns minutos.",
            self::CADASTRO_SUCESSO      => "Cadastro realizado com sucesso. Yaaaay!",
            self::LOGOUT                => "Você fez logout do Purrsue. Já estamos com saudade!",
            self::URL_INVALIDA          => "Uma URL provida é inválida. Tente novamente com URLs diferentes.",
            self::ERRO_NA_EXCLUSAO      => "Ocorreu um erro ao excluir o gato. Tente novamente em alguns minutos",
            self::EXCLUSAO_SUCESSO      => "Exclusão do gato bem-sucedida. Tadinho! :(",
        };
    }
}
