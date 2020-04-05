<html>
<?php 
    //header("Content-type: text/html; charset=UTF-8");

    if (session_status() != 2) {
        session_start();
    } 
    echo "       
            <nav alt='' class='navbar navbar-expand-md navbar-dark cornavfooter fixed-top'>            
            <a class='navbar-brand' href='index.php'>Gamestuff</a> <!-- home -->
            <!-- LINK DE PULAR DIRETO PARA A PÁGINA (RENATA) -->
            <div id='topo' class='skippy' alt=''>
                <a class='sr-only sr-only-focusable' href='#content' alt=''>
                    <div class='container text-center'>
                        <span class='skiplink-text'>". Translate('PULAR PARA CONTEÚDO PRINCIPAL') ."</span>
                    </div>
                </a>
            </div>
			<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarsExampleDefault' aria-controls='navbarsExampleDefault' aria-expanded='false' aria-label='Toggle navigation'>
				<span class='navbar-toggler-icon'></span>
			</button>
			<div class='collapse navbar-collapse' id='navbarsExampleDefault'>
				<ul class='navbar-nav mr-auto'>
                <li class='nav-item dropdown'>
						<a class='nav-link dropdown-toggle' href='#' id='dropdown01' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>". Translate('JOGOS') ."</a>
						<div class='dropdown-menu' aria-labelledby='dropdown01' style='border:0 2 2 2; box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius:0px;'>
                            <a class='dropdown-item' href='mobilereleases.php'>". Translate('MOBILE') ."</a>
                            <a class='dropdown-item' href='classicoshome.php'>". Translate('CLÁSSICOS') ."</a>
							<a class='dropdown-item' href='pchome.php'>". Translate('PC') ."</a>
                            <a class='dropdown-item' href='videogameshome.php'>". Translate('VIDEOGAMES') ."</a>
						</div>
					</li>
				
					<li class='nav-item'>
						<a class='nav-link' href='lancamentoshome.php'>". Translate('LANÇAMENTOS') ."</a>
						<!---->
					</li>
				
					<li class='nav-item'>
						<a class='nav-link' href='bestxxihome.php'>". Translate('MELHORES DO SÉCULO') ."</a>
						<!---->
					</li>
				
					<li class='nav-item'>
						<a class='nav-link' href='devcriators.php'>". Translate('DESENVOLVEDORAS') ."</a>
						<!---->
					</li>
				
					<li class='nav-item dropdown'>
						<a class='nav-link dropdown-toggle' href='#' id='dropdown01' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>". Translate('OUTROS') ."</a>
						<div class='dropdown-menu' aria-labelledby='dropdown01' style='border:0 2 2 2; box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius:0px;'>
							<a class='dropdown-item' href='contato.php'>". Translate('CONTATOS') ."</a>
							<a class='dropdown-item' href='quemsomos.php'>". Translate('QUEM SOMOS') ."</a>
							<a class='dropdown-item' href='politicasdeuso.php'>". Translate('NORMAS DE UTILIZAÇÃO') ."</a>
                            <a class='dropdown-item' href='criarConta.php'>". Translate('CRIAR CONTA') ."</a>
						</div>
					</li>
                </ul>
			</div> </nav>";

        /*-- CONDICIONAL PARA MONTAGEM DO BREADCRUMB --*/
        
        function breadcrumb($url_pieces = array(), $divisor = '>') {        
         //verifica se foram passados parametros
         if ($url_pieces) {
            $url_crumb = $url_pieces;
            $http = null;
         } else {
            //senão não houver parametro
            //então criar a url automaticamente
            $http = 'http://'; 
            $request = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
            $explode = explode('/', $request);
            foreach($explode as $explode) {
                $url_crumb[str_replace('.php', '', $explode)] = str_replace('.php', '', $explode);
            }
         }
         //quantidade de fragmentos da url
            $count = sizeof($url_crumb);
         //inicia contador
            $i = 1;
            foreach($url_crumb as $link=>$value) {
                //verifica se é o primeiro fragmento da url
                if($i == 1) {
                    $href = $http.$link;
                } else {
                    $href = '/'.$link;
                }
                //verifica se é o ultimo fragmento da url
                if($i == $count) {
                    //mostrar fragmento sem link
                    $crumb[] = '<span>'.($value).'</span>';
                } else {
                    //mostrar fragmento com link para a pagina
                    $crumb[] = '<a href="'.$href.'" title="'.$value.'">'.$value.'</a>&nbsp'.$divisor.'&nbsp';
                }
                $i++;
            }
         //mostrar breadcrumb na tela
            echo "<div class='breadcrumb'>";
            foreach($crumb as $crumb) {
                echo $crumb;
            }
            echo "</div>";
        }
?>

</html>