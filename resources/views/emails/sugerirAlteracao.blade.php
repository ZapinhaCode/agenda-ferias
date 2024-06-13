<!DOCTYPE html>
<html>
<head>
    <title>Sugestão de Mudança na Solicitação de Férias</title>
</head>
<body>
    <h1>Sugestão de Mudança na Solicitação de Férias</h1>
    <p>Olá {{ $details['nome'] }},</p>
    <p>Após analisar sua solicitação de férias de {{ $details['data_inicio'] }} a {{ $details['data_fim'] }}, sugerimos a seguinte mudança:</p>
    <p>{{ $details['solicitacao'] }}</p>
    <p>Por favor, entre em contato com o departamento de Recursos Humanos para discutir essa sugestão.</p>
    <p>Atenciosamente,</p>
    <p>Equipe de Recursos Humanos Freedom Frames</p>
</body>
</html>
