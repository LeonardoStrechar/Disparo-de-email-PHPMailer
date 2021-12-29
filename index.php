<?php
    require_once('src/PHPMailer.php');
    require_once('src/SMTP.php');
    require_once('src/Exception.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //para ver log de erro
    $mail = new PHPMailer(false);

    try {
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = '(SERVIDOR DE EMAIL) EXEMPLO:   smtp.titan.email';
        $mail->SMTPAuth = true;
        $mail->Username = 'EMAIL DA CONTA DO REMETENTE (QUEM ENVIARÁ O EMAIL)';
        $mail->Password = 'SENHA DA CONTA DO REMETENTE (QUEM ENVIARÁ O EMAIL)';
        $mail->Port = 587('PORTA DO SERVIDOR, VERIFICAR COM A CONEXÃO SMTP DO SERVIDOR');

        $mail->setFrom('EMAIL DO REMETENTE');
        $mail->addAddress('EMAIL DE QUEM RECEBERÁ A MENSAGEM');

        $mail->isHTML(true);
        $mail->Subject = 'teste de email';
        $mail->Body = 'chegou o email de teste <strong>confirmar</strong>';
        $mail->AltBody = 'chegou o email sem html';

        if($mail->send()){
            echo 'email enviado com sucesso';
        } else {
            echo 'email não enviado';
        }

    } catch (Exception $e) {
        echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
    }