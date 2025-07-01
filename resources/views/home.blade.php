<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexus - Conectando para o Bem-Estar Mental</title>
    <style>
        /* Estilos Globais */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Cabeçalho */
        .header {
            background-color: #fff;
            padding: 20px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header .logo {
            font-size: 2.5em;
            font-weight: bold;
            display: flex;
            align-items: center;
        }

        .header .logo span:first-child { /* Para o 'O' de Conexus */
            color: #59dda0; /* Cor verde especificada */
        }

        .header .nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .header .nav ul li {
            margin-left: 30px;
        }

        .header .nav ul li a {
            text-decoration: none;
            color: #555;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .header .nav ul li a:hover {
            color: #59dda0;
        }

        /* Seção Hero */
        .hero {
            background-color: #f9f9f9;
            text-align: center;
            padding: 80px 20px;
        }

        .hero h1 {
            font-size: 3em;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2em;
            color: #666;
            max-width: 800px;
            margin: 0 auto 30px auto;
        }

        .hero .btn {
            display: inline-block;
            background-color: #59dda0;
            color: white;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .hero .btn:hover {
            background-color: #4ac78f;
        }

        /* Seção de Recursos/Benefícios */
        .features {
            padding: 60px 20px;
            text-align: center;
        }

        .features h2 {
            font-size: 2.5em;
            color: #2c3e50;
            margin-bottom: 40px;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }

        .feature-item {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            text-align: left;
        }

        .feature-item h3 {
            color: #59dda0;
            margin-bottom: 15px;
            font-size: 1.5em;
        }

        .feature-item p {
            color: #777;
        }

        /* Rodapé */
        .footer {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 30px 20px;
            margin-top: 50px;
        }

        .footer p {
            margin: 0;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                text-align: center;
            }

            .header .nav ul {
                flex-direction: column;
                margin-top: 20px;
            }

            .header .nav ul li {
                margin: 10px 0;
            }

            .hero h1 {
                font-size: 2.2em;
            }

            .hero p {
                font-size: 1em;
            }

            .features h2 {
                font-size: 2em;
            }
        }

        @media (max-width: 480px) {
            .hero {
                padding: 50px 15px;
            }

            .hero h1 {
                font-size: 1.8em;
            }

            .hero .btn {
                padding: 12px 25px;
            }

            .feature-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="logo">C<span>o</span>nexus</div>
            <nav class="nav">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Sobre</a></li>
                    <li><a href="#">Como Funciona</a></li>
                    <li><a href="#">Contato</a></li>
                    <li><a href="/register">Cadastre-se</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <h1>Conexus: Conectando Mentes, Construindo Bem-Estar.</h1>
                <p>Ambiente seguro e acolhedor para compartilhar experiências, conversar sobre saúde mental e encontrar apoio em rodas mediadas por psicólogos e profissionais.</p>
                <a href="/register" class="btn">Participe Agora!</a>
            </div>
        </section>

        <section class="features">
            <div class="container">
                <h2>O que a Conexus oferece?</h2>
                <div class="feature-grid">
                    <div class="feature-item">
                        <h3>Rodas de Conversa</h3>
                        <p>Participe de grupos virtuais mediadas por especialistas, onde você pode compartilhar e aprender em um ambiente de apoio.</p>
                    </div>
                    <div class="feature-item">
                        <h3>Profissionais Qualificados</h3>
                        <p>Nossas rodas são conduzidas por psicólogos e profissionais da saúde experientes, garantindo um suporte de qualidade.</p>
                    </div>
                    <div class="feature-item">
                        <h3>Comunidade Acolhedora</h3>
                        <p>Conecte-se com pessoas que entendem suas vivências e construa uma rede de apoio mútua.</p>
                    </div>
                    <div class="feature-item">
                        <h3>Temas Variados</h3>
                        <p>Abordamos diversos temas relevantes para a saúde mental, permitindo que você encontre rodas de seu interesse.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 Conexus. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>