<?PHP

function dump($var){
	echo "<pre>";
	var_dump($var);
	exit;
}

function get_youtube_code($url) {
	parse_str(parse_url($url, PHP_URL_QUERY), $my_array_of_vars);
	if(isset($my_array_of_vars['v'])){
		return $my_array_of_vars['v'];	
	} else {
		return $url;
	}
}

function slugify($text) {
	$text = preg_replace('~[^\\pL\d]+~u', '_', $text);
	$text = trim($text, '_');
	$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
	$text = strtolower($text);
	$text = preg_replace('~[^-\w]+~', '', $text);
	if(empty($text)) {
		return 'n-a';
	}
	return $text;
}

function return_timestamp($date) {
	if ($date) {
		list($dia, $mes, $ano) = explode('/', $date);
		return "$ano-$mes-$dia";
	} else {
		return false;
	}
}

function return_date($date) {
	if ($date) {
		list($data, $hora) = explode(' ', $date);
		list($ano, $mes, $dia) = explode('-', $data);
		return "$dia/$mes/$ano";
	} else {
		return false;
	}
}

function retorna_fone($fone){
	$fone = str_replace("(", "", $fone);
	$fone = str_replace(")", "", $fone);
	$fone = str_replace("-", "", $fone);
	$fone = str_replace(" ", "", $fone);
	return $fone;
}

function retornar_parceiro($parceiroID){
	$parceiroModel = new \App\Models\ParceiroModel();
	$parceiro = $parceiroModel->asObject()->find($parceiroID);
	return $parceiro->nome;
}

function retornar_produto($produtoID){
	if($produtoID == 0){
		return "Produto ainda não selecionado";
	}
	$produtoModel = new \App\Models\ProdutoModel();
	$produto = $produtoModel->asObject()->find($produtoID);
	return $produto->nome;
}

function retornar_cliente($clienteID){
	if($clienteID == 0){
		return "Cliente não cadastrado";
	}
	$clienteModel = new \App\Models\ClienteModel();
	$cliente = $clienteModel->asObject()->find($clienteID);
	return $cliente->nome;
}

function rent_status($var){
	switch ($var) {
		case 0:
		return "Agurando Aprovação do Parceiro";
		break;
		case 1:
		return "Rent Aprovado";
		break;
		case 2:
		return "Rent Cancelado";
		break;
		case 3:
		return "Rent Finalizado";
		break;
		default:
			# code...
		break;
	}
}

function nova_senha() {
	$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
	for ($i = 0; $i < 8; $i++) {
		$n = rand(0, strlen($alphabet)-1);
		$pass[$i] = $alphabet[$n];
	}
	return implode($pass);
}

function return_status($var){
	switch ($var) {
		case 0:
		return '<label class="amarelo">Aguardando Aprovação</label>';
		break;
		case 1:
		return '<label class="verde">Aprovado</label>';
		break;
		case 2:
		return '<label class="vermelho">Bloqueado</label>';
		break;
		
		default:
		return '<label class="vermelho">Ops</label>';
		break;
	}
}

function return_score($var){
	switch ($var) {
		case 0:
		return '<i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>';
		break;
		case 1:
		return '<i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>';
		break;
		case 2:
		return '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>';
		break;
		case 3:
		return '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>';
		break;
		case 4:
		return '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>';
		break;
		case 5:
		return '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
		break;
		default:
			# code...
		break;
	}
}


