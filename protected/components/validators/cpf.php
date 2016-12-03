<?php


class cpf extends CValidator { //in?cio da Classe

  public function validateAttribute($object, $attribute) {
      if (!$this->validaCPF($object->$attribute)) {
         $message=$this->message!==null?$this->message:Yii::t('cpf', '{attribute} nao e um CPF valido.');
         $this->addError($object, $attribute, $message);
      }

   
     
}
public function clientValidateAttribute($object, $attribute) {
        
        $value = "\$('#" . (CHtml::activeId($object, $attribute)) . "').val()";
        
        return "
                cpf = {$value};
                exp = /\.|-/g;
                cpf = cpf.toString().replace(exp, \"\");
                var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));
                var soma1=0, soma2=0;
                var vlr =11;
                for(i=0;i<9;i++){
                   soma1+=eval(cpf.charAt(i)*(vlr-1));
                   soma2+=eval(cpf.charAt(i)*vlr);
                   vlr--;
                }
                soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));
                soma2 = (((soma2+(2*soma1))*10)%11);
                if(cpf == \"11111111111\" || cpf == \"22222222222\" || cpf ==
                   \"33333333333\" || cpf == \"44444444444\" || cpf == \"55555555555\" || cpf ==
                   \"66666666666\" || cpf == \"77777777777\" || cpf == \"88888888888\" || cpf ==
                   \"99999999999\" || cpf == \"00000000000\" )
                {
                   var digitoGerado = null;
                }else{
                   var digitoGerado = (soma1*10) + soma2;
                }

                if(digitoGerado != digitoDigitado){
                   messages.push(" . CJSON::encode("CPF Inv?lido") . ");
                }
                ";
        
    }
    
    private function validaCPF($cpf) { 
        
        $cpf = str_pad(preg_replace('/[^0-9_]/', '', $cpf), 11, '0', STR_PAD_LEFT);
        
        for ($x = 0; $x < 10; $x++) {
            if ($cpf == str_repeat($x, 11)) {
                return false;
            }
        }

        if (strlen($cpf) != 11) {
            return false;
        } else {   
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }

                $d = ((10 * $d) % 11) % 10;

                if ($cpf{$c} != $d) {
                    return false;
                }
            }

            return true;
        }
    }
}
?>
