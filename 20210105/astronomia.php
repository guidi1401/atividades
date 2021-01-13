<DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>Acessibilidade - Astronomia</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="astronomia.css" />
        <script>
            window.onload = function() {
                var elementBody = document.querySelector('body');
                var elementBtnIncreaseFont = document.getElementById('increase-font');
                var elementBtnDecreaseFont = document.getElementById('decrease-font');
                var fontSize = 100;
                var increaseDecrease = 10;
                elementBtnIncreaseFont.addEventListener('click', function(event) {
                    fontSize = fontSize + increaseDecrease;
                    elementBody.style.fontSize = fontSize + '%';
                });
                elementBtnDecreaseFont.addEventListener('click', function(event) {
                    fontSize = fontSize - increaseDecrease;
                    elementBody.style.fontSize = fontSize + '%';
                });
            }
        </script>
    </head>
    <body>
        <div class="container">
            <div class="btn-container">
                <button name="increase-font" id="increase-font" title="Aumentar Fonte">Aumentar fonte</button>
                <button name="decrease-font" id="decrease-font" title="Diminuir Fonte">Diminuir fonte</button>
            </div>
            <header>
                <h1>Astronomia</h1>
            </header>
            <div class="flex-container">
            <p class="texto"> "Astronomia é uma ciência natural que estuda corpos celestes (como estrelas, planetas, cometas, nebulosas, aglomerados de estrelas, galáxias) e fenômenos que se originam fora da atmosfera da Terra (como a radiação cósmica de fundo em micro-ondas). Preocupada com a evolução, a física, a química e o movimento de objetos celestes, bem como a formação e o desenvolvimento do universo.
            </p>
            <center> <img class="img" src="foto.gif".gif"></img> </center>
            <p class="texto"> A Astronomia tem acompanhado a nossa história e cultura e tem constantemente revolucionado o nosso pensamento, presenteado a Humanidade com pistas em direcção ao futuro. No passado, a astronomia foi usada por diversas razões práticas, como medir o tempo, marcar as estações do ano ou navegar nos vastos oceanos.</p>
            <p class="texto"> Os resultados do desenvolvimento científico e tecnológico da astronomia e áreas afins têm vindo recorrentemente a transformar-se em aplicações essenciais para o nosso dia-a-dia, como computadores pessoais, satélites de comunicação, telemóveis, Sistema de Posicionamento Global (popularmente conhecido por GPS), painéis solares, scanners de ressonância magnética, micro laser e muitas outras aplicações para a medicina."</p>
        </div>
    </body>
</html>