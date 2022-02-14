<!DOCTYPE html>
<html>
<head>
    <title>{{ $ficha->titulo }}</title>
</head>
<body>
    <h1>Titulo da ficha: {{ $ficha->titulo }}</h1>
    <h2>Ficha subtitulo: {{ $ficha->subtitulo }}</h2>
    <p>Cutter: {{ $ficha->cutter}}</p>
    <p>Classificação: {{ $ficha->classificacao }}</p>
    <p>Local: {{ $ficha->local }}</p>
    <p>Ano: {{ $ficha->ano }}</p>
    <p>Folhas: {{ $ficha->folhas }}</p>
    <p>Ilustração: {{ $ficha->ilustracao }}</p>
    @foreach($palavras as $palavra)
        <p>Palavras-chave: {{ $palavra->palavra }}</p>
    @endforeach
    @if($tipo_documento == 'Monografia')
        <p>Orientador: {{ $documento->orientador }}</p>
        <p>Titulo do orientador: {{ $documento->titulacao_orientador }}</p>
        <p>Coorientador: {{ $documento->coorientador }}</p>
        <p>Titulo do coorientador: {{ $documento->titulacao_coorientador }}</p>

    @elseif($tipo_documento == 'Tese')
        <p>Orientador: {{ $documento->orientador }}</p>
        <p>Titulo do orientador: {{ $documento->titulacao_orientador }}</p>
        <p>Coorientador: {{ $documento->coorientador }}</p>
        <p>Titulo do coorientador: {{ $documento->titulacao_coorientador }}</p>
        <p>Programa: {{ $documento->programa }}</p>

    @elseif($tipo_documento = 'TCC')
        <p>Orientador: {{ $documento->orientador }}</p>
        <p>Titulo do orientador: {{ $documento->titulacao_orientador }}</p>
        <p>Coorientador: {{ $documento->coorientador }}</p>
        <p>Titulo do coorientador: {{ $documento->titulacao_coorientador }}</p>
        <p>Referência: {{ $documento->referencia }}</p>
        <p>Campus: {{ $documento->campus }}</p>
        <p>Curso: {{ $documento->curso }}</p>

    @elseif($tipo_documento = 'ProgramaEduc')
        <p>Programa: {{ $documento->programa }}</p>
        <p>Campus: {{ campus }}</p>

    @else
        <p>Orientador: {{ $documento->orientador }}</p>
        <p>Titulo do orientador: {{ $documento->titulacao_orientador }}</p>
        <p>Coorientador: {{ $documento->coorientador }}</p>
        <p>Titulo do coorientador: {{ $documento->titulacao_coorientador }}</p>
        <p>Programa: {{ $documento->programa }}</p>
        <p>Campus: {{ $documento->campus }}</p>
    @endif
    <p>Tipo do documento: {{ $tipo_documento }}</p>
</body>
</html>
