<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $nome = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $assunto = htmlspecialchars($_POST['subject']);
    $mensagem = htmlspecialchars($_POST['message']);

    // Endereço de destino
    $destinatario = "seuemail@dominio.com"; // Substitua pelo seu e-mail

    // Assunto do e-mail
    $assuntoEmail = "Nova mensagem de contato: " . $assunto;

    // Corpo do e-mail
    $corpoEmail = "Você recebeu uma nova mensagem de contato:\n\n";
    $corpoEmail .= "Nome: " . $nome . "\n";
    $corpoEmail .= "E-mail: " . $email . "\n";
    $corpoEmail .= "Assunto: " . $assunto . "\n";
    $corpoEmail .= "Mensagem:\n" . $mensagem;

    // Cabeçalhos do e-mail
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";

    // Envia o e-mail
    if (mail($destinatario, $assuntoEmail, $corpoEmail, $headers)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Falha ao enviar a mensagem. Tente novamente mais tarde.";
    }
}
?>
