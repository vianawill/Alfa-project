
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerar RDO</title>
</head>
<body>
    <div class="form-box">
        <h2>Gerar RDO</h2>
        @if (session('success'))
            <div style="color: green; margin-bottom: 10px;">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ url('/rdo/gerar') }}" method="POST">
            @csrf <!-- Token de segurança obrigatório para formulários POST no Laravel -->
            
            <label for="numero">Número:</label>
            <input type="text" id="numero" name="numero" placeholder="Número do último + 1" required>
            
            <label for="data">Data:</label>
            <input type="date" id="data" name="data" required>
            
            <label for="obra">Obra:</label>
            <select id="obra" name="obra" required>
                <option value="">Selecione a obra</option>
                <option value="Obra 1">Obra 1</option>
                <option value="Obra 2">Obra 2</option>
                <option value="Obra 3">Obra 3</option>
            </select>
            
            <div class="actions">
                <button type="button" class="btn-cancel" onclick="window.location.href='/rdo';">CANCELAR</button>
                <button type="submit" class="btn-generate">GERAR</button>
            </div>
        </form>
    </div>
</body>
</html>