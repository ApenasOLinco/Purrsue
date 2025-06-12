<?php
/**
 * Os códigos de status que serão enviados de volta ao index.php em certas ocasiões.
 * Criada pra facilitar expansão com possíveis novas mensagens de erro.
 */
enum Status: int
{
    case CREDENCIAIS_INVALIDAS = 1;

    case METODO_INVALIDO = 2;

    case FORM_EM_BRANCO = 3;

    case ERRO_NA_CONSULTA = 4;
    
    public function getMensagem(): string
    {
        return match ($this) {
            self::CREDENCIAIS_INVALIDAS => "Credenciais inválidas. Entre com uma conta existente.",
            self::METODO_INVALIDO => "Método Inválido. Esse recurso não pode ser acessado dessa forma.",
            self::FORM_EM_BRANCO => "Formulário em Branco. Preencha todos os campos do formulário.",
            self::ERRO_NA_CONSULTA => "Ocorreu um erro ao verificar seus dados. Tente novamente em alguns minutos."
        };
    }
}
