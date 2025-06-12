<?php
/**
 * Os códigos de status que serão enviados de volta ao index.php em certas ocasiões.
 * Criada pra facilitar expansão com possíveis novas mensagens de erro ou de sucesso.
 */
enum Status: int
{
    /**
     * Nome de usuário ou senha não coincidem com nenhum registro no banco de dados.
     */
    case CREDENCIAIS_INVALIDAS = 1;

    /**
     * Tentativa de acesso via GET em uma página POST e vice-versa.
     */
    case METODO_INVALIDO = 2;

    /**
     * Os dados enviados via POST contém campos nulos ou vazios.
     */
    case FORM_EM_BRANCO = 3;

    /**
     * Erro inesperado durante a consulta.
     */
    case ERRO_NA_CONSULTA = 4;

    /**
     * Tentativa de cadastro com um nome de usuário que já existe no banco de dados.
     */
    case USUARIO_EXISTENTE = 5;

    /**
     * Tentativa de cadastro com um e-mail já associado a uma conta no banco de dados
     */
    case EMAIL_EXISTENTE = 6;

    /**
     * Erro não previsto durante a criação de uma conta
     */
    case ERRO_NA_INSERCAO = 7;

    /**
     * Cadastro realizado com sucesso
     */
    case CADASTRO_SUCESSO = 8;

    /**
     * Retorna a mensagem associada ao objeto que está chamando essa função, de acordo com seu tipo.
     * @return string A mensagem associada ao objeto que está chamando essa função
     */
    public function getMensagem(): string
    {
        return match ($this) {
            self::CREDENCIAIS_INVALIDAS => "Credenciais inválidas. Entre com uma conta existente.",
            self::METODO_INVALIDO => "Método Inválido. Esse recurso não pode ser acessado dessa forma.",
            self::FORM_EM_BRANCO => "Formulário em Branco. Preencha todos os campos do formulário.",
            self::ERRO_NA_CONSULTA => "Ocorreu um erro ao verificar seus dados. Tente novamente em alguns minutos.",
            self::USUARIO_EXISTENTE => "Esse nome de usuário já está em uso. Tente novamente com outro nome de usuário.",
            self::EMAIL_EXISTENTE => "Esse endereço de e-mail já está em uso. Tente novamente com outro endereço de e-mail.",
            self::ERRO_NA_INSERCAO => "Ocorreu um erro ao criar sua conta. Tente novamente em alguns minutos.",
            self::CADASTRO_SUCESSO => "Cadastro realizado com sucesso. Você já pode fazer login!"
        };
    }
}
