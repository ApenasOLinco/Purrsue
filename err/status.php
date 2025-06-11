<?php
/**
 * Os códigos de status que serão enviados de volta ao index.php em certas ocasiões.
 * Criada pra facilitar a expansão de possíveis novas mensagens de erro.
 */
enum Status: int
{
    case CREDENCIAIS_INVALIDAS = 1;

    case METODO_INVALIDO = 2;

    case FORM_EM_BRANCO = 3;

    public function getMensagem(): string
    {
        return match ($this) {
            self::CREDENCIAIS_INVALIDAS => "Credenciais inválidas. Entre com uma conta existente.",
            self::METODO_INVALIDO => "Método Inválido. Esse recurso não pode ser acessado dessa forma.",
            self::FORM_EM_BRANCO => "Formulário em Branco. Preencha todos os campos do formulário."
        };
    }
}
