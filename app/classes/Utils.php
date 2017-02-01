<?php 

class Utils{

	public function cleanWords($text) {
		$array1 = array("á", "à", "â", "ã", "ä", "é", "è", "ê", "ë", "í", "ì", "î", "ï", "ó", "ò", "ô", "õ", "ö", "ú", "ù", "û", "ü", "ç"
			, "Á", "À", "Â", "Ã", "Ä", "É", "È", "Ê", "Ë", "Í", "Ì", "Î", "Ï", "Ó", "Ò", "Ô", "Õ", "Ö", "Ú", "Ù", "Û", "Ü", "Ç", " ", "&");
		$array2 = array("a", "a", "a", "a", "a", "e", "e", "e", "e", "i", "i", "i", "i", "o", "o", "o", "o", "o", "u", "u", "u", "u", "c"
			, "A", "A", "A", "A", "A", "E", "E", "E", "E", "I", "I", "I", "I", "O", "O", "O", "O", "O", "U", "U", "U", "U", "C", "-", "e");
		$text = str_replace($array1, $array2, $text);

      // trim
		$text = trim($text, '-');

      // lowercase
		$text = strtolower($text);

		if (empty($text))
		{
        //return 'n-a';
			return time();
		}

		return $text;
	}
        public function calcularIdade($dia, $mes, $ano) {
            $hoje = getdate();
            $idade = $hoje['year'] - $ano;
            if ($hoje['mon'] < $mes || ($hoje['mon'] == $mes && $hoje['mday'] < $dia)) {
                $idade -= 1;
            }
            return $idade;
        }
        
        public function urlAmigavel($string){
            $table = array(
                'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z',
                'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
                'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
                'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
                'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
                'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U',
                'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
                'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
                'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
                'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
                'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
                'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u',
                'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
                'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r',
            );
            // Traduz os caracteres em $string, baseado no vetor $table
            $string = strtr($string, $table);
            // converte para minúsculo
            $string = strtolower($string);
            // remove caracteres indesejáveis (que não estão no padrão)
            $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
            // Remove múltiplas ocorrências de hífens ou espaços
            $string = preg_replace("/[\s-]+/", " ", $string);
            // Transforma espaços e underscores em hífens
            $string = preg_replace("/[\s_]/", "-", $string);
            // retorna a string
            return $string;
}
}