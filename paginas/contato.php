<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Contato | Menqz</title>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><!--tags complementares para jogar na web-->
		<meta name="url" content ="www.menqz.pe.hu"/>
		<meta name="viewport" content="width=360px, device-width=360px, user-scalable=no" />
		<meta name="viewport" content="width=320px, device-width=320px, user-scalable=no" />
		<script type="text/javascript" src="js/angular-1.0.1.min.js"></script>
		<script type="text/javascript" src="js/jquery-2.2.3.js"></script>
		<script type="text/javascript" src="js/plugin-cicle.js"></script>
		<link rel="shortcut icon" href="img/icon.ico" />
	</head>
	<body>
		<!-- Google Tag Manager -->
		<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-KZ242Z"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-KZ242Z');</script>
		<!-- End Google Tag Manager -->
		<header>
			<div id="header_principal">
				<div id="header_logo">
					<img src="img/header_logo.png" alt="Logo" title="Menqz logo">
				</div>
				<div id="header_img">
					<img src="img/header_img.png" alt="Logo" title="Menqz informática">
				</div>
				<div id="header_menu">
					<nav id="menu_principal">
						<ul id="lst_menu_principal">
              <li><a href="../index.html" title="Home">HOME</a></li>
              <li><a href="portfolio.php" title="Portfólio">PORTFÓLIO</a></li>
              <li><a href="projetos.php" title="Projetos">PROJETOS</a></li>
              <li><a href="menqz.php" title="Sobre nós">MENQZ</a></li>
              <li><a href="contato.php" title="Contatos">CONTATO</a></li>
						</ul>
					</nav>
				</div>
				<div id="menu_device">
					<nav>
						<ul id="lista" >
              <li><a href="../index.html" title="Home">HOME</a></li>
              <li><a href="portfolio.php" title="Portfólio">PORTFÓLIO</a></li>
              <li><a href="projetos.php" title="Projetos">PROJETOS</a></li>
              <li><a href="menqz.php" title="Sobre nós">MENQZ</a></li>
              <li><a href="contato.php" title="Contatos">CONTATO</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</header>
		<div id="slides">
			<!--<ul>
				<li><img src="01.jpg" /></li>
				<li><img src="02.jpg" /></li>
				<li><img src="03.jpg" /></li>
			</ul>-->
		</div>
		<div id="principal">
			<div id="contato">
        <form method="post" action="enviar_email.php" name="formulario">
          <table>
            <tr>
                <td class="nome">
                  Nome:
                </td>
                <td>
                    <input type="text" name="txtnome" value="" />
                </td>
            </tr>
            <tr>
                <td class="nome">
                  Email:
                </td>
                <td>
                    <input type="email" name="txtemail" value="" />
                </td>
            </tr>
            <tr>
                <td class="nome">
                  Telefone:
                </td>
                <td>
                    <input type="text" name="txttelefone" value="" />
                </td>
            </tr>
            <tr>
                <td class="nome">
                  Mensagem:
                </td>
                <td>
                    <textarea name="txtmensagem" maxlength="255"></textarea>
                </td>
            </tr>
            <tr>
                <td class="nome">
                </td>
                <td>
                    <input type="submit" name="btnenviar" value="Enviar" />
                </td>
            </tr>
          </table>
        </form>
      </div>
      <div id="itens_contato">
        <h1><span>Menqz Tecnologia</h1>
          <div>
          </div>
      </div>
		</div>
		<footer>
			<div id="footer_principal">
			</div>
			<div id="footer_copy">
				<strong>Copyright © 2015 Menqz Tecnologia Ltda | Todos os direitos reservados.</strong>
			</div>
		</footer>
	</body>
</html>
