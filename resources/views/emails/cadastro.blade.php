<!DOCTYPE html>
<html>
<head>
    <title>Bem-vindo(a) ao Sistema</title>
</head>
<body>
    <h1>Olá {{ $details['nome'] }}</h1>
    <p>Estamos felizes em informar que seu cadastro no nosso sistema foi realizado com sucesso!</p>
    <p>A partir de agora, você poderá acessar todas as funcionalidades e benefícios que nosso sistema oferece.</p> 
    <p>Utilize o e-mail {{ $details['email'] }} e senha <strong>{{ $details['senha'] }}</strong> cadastrados para fazer login.</p>
    <p>Esta senha foi gerada ao realizar o seu cadastro, fique a vontade para mudá-la a hora que quiser dentro do nosso sistema</p>
    <p>Se precisar de qualquer ajuda ou tiver alguma dúvida, não hesite em nos contatar.</p>
    <p>Atenciosamente,</p>
    <p>Equipe de Recursos Humanos Freedom Frames.</p>
</body>