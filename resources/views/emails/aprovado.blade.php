<!DOCTYPE html>
<html>
<head>
    <title>Aprovação de Solicitação de Férias</title>
</head>
<body>
    <h1>Solicitação de Férias Aprovada</h1>
    <p>Olá {{ $details['nome'] }},</p>
    <p>Temos o prazer de informar que sua solicitação de férias de {{ $details['data_inicio'] }} a {{ $details['data_fim'] }} foi aprovada!!</p>
    <p>Desejamos que você tenha um ótimo descanso!</p>
    <p>Atenciosamente,</p>
    <p>Equipe de Recursos Humanos Freedom Frames.</p>
</body>