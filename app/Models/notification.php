<?php

class Notificacao extends CI_Model {

    public $html;
    public $assunto = "BoraConstuir";
    public $destinatario = "boraconstruir@labpix.com.br";
    public $header = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><title>Bora Construir</title><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><style type="text/css">td img {display: block;}</style></head><style type="text/css">body{margin:0;padding:0;}a{text-decoration:none;color:#67d9ff;}img{border:0 none;height:auto;line-height:100%;outline:none;text-decoration:none;}a img{border:0 none;}.imageFix{display:block;}table, td{border-collapse:collapse;}#bodyTable{height:100% !important;margin:0;padding:0;width:100% !important;}</style><body bgcolor="#f3f3f3"><center>';
    public $footer = '<tr bgcolor="#ececec"><td><table style="display: inline-table;" border="0" cellpadding="0" cellspacing="0" width="601"><tr><td><img src="http://boraconstruir.com.br/assets/emails/alterar_senha/img/espaco6.jpg" width="29" height="62" /></td> <td><font face="tahoma" size="4" color="#073f2e"><b>Compre e venda direto do seu celular!</b><br /></font><font face="tahoma" size="1" color="#073f2e"><b>Baixe <font face="arial" size="1" color="#ffa900">GRÁTIS</font> o app do Bora Construir no IOS ou Android</b></font></td><td><img src="http://boraconstruir.com.br/assets/emails/alterar_senha/img/espaco7.jpg" width="75" height="62" /></td><td><a href=" " target="parent"><img src="http://boraconstruir.com.br/assets/emails/alterar_senha/img/iphone.jpg" width="53" height="62" /></a></td><td><img src="http://boraconstruir.com.br/assets/emails/alterar_senha/img/android.jpg" width="60" height="62" /></td>                     </tr></table></td></tr><tr><td>                 <img src="http://boraconstruir.com.br/assets/emails/alterar_senha/img/detalhe.jpg" width="601" height="17" /></td></table></center></body></html>';

    public function enviar() {
        $CI = &get_instance();
        $CI->load->library('email');

        $config['protocol'] = "smtp";
        $config['smtp_host'] = "smtp.boraconstruir.com.br";
        $config['smtp_port'] = "587";
        $config['smtp_user'] = "noreply@boraconstruir.com.br";
        $config['smtp_pass'] = "pmpo120w";
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";
        $config['priority'] = 3;
        $config['charset'] = 'utf-8';
        $config['smtp_timeout'] = 5;
        $config['mailtype'] = 'html';

        $CI->email->initialize($config);
        $CI->email->from('noreply@boraconstruir.com.br');
        $CI->email->to($this->destinatario);
        $CI->email->subject($this->assunto);
        $CI->email->message($this->header . $this->html . $this->footer);
        
        
        if ($CI->email->send()) {
            return true;
        } else {
            return false;
        }
         
         
    }

    public static function nova_obra($obra) {
        $html = '<table style="display: inline-table;" border="0" cellpadding="0" cellspacing="0" width="601">';
        $html .= '<tr>';
        $html .= '<td>';
        $html .= '</tr>';
        $html .= '<tr bgcolor="#fdaf17" height="101">';
        $html .= '<td>';
        $html .= '<table style="display: inline-table;" border="0" cellpadding="0" cellspacing="0" width="601">';
        $html .= '<center>';
        $html .= '<font face="tahoma" size="6" color="#ffffff">';
        $html .= 'Nova obra no Sistema';
        $html .= '</center>';
        $html .= '</font>';
        $html .= '</table>';
        $html .= '</td>';
        $html .= '</tr>';
        $html .= '<tr bgcolor="#ffffff">';
        $html .= '<td>';
        $html .= '<table style="display: inline-table;" border="0" cellpadding="0" cellspacing="0" width="601">';
        $html .= '<tr>';
        $html .= '<td>';
        $html .= '<img src="http://boraconstruir.com.br/assets/emails/bem_vindo/img/espaco.jpg" width="73" height="56" />';
        $html .= '</td>';
        $html .= '<td>';
        $html .= '<center>';
        $html .= '<font face="tahoma" size="5" color="#000000">';
        $html .= '<br/>';
        $html .= '</font>';
        $html .= '<font face="tahoma" size="5" color="#fdaf17">';
        $html .= $obra["bairro"] . ' <br/>';
        $html .= '</font>';
        $html .= '<font face="tahoma" size="3" color="#666666">';
        $html .= '<br/>Acesse o sistema e encontre os profissionais para esta obra';
        $html .= '<br />';
        $html .= '<br />';
        $html .= '</font>';
        $html .= '<font face="tahoma" size="2" color="#666666">';
        $html .= '<b>';
        $html .= '</center>';
        $html .= '</td>';
        $html .= '<td>';
        $html .= '<img src="http://boraconstruir.com.br/assets/emails/bem_vindo/img/espaco.jpg" width="73" height="56" />';
        $html .= '</td>';
        $html .= '</tr>';
        $html .= '</table>';
        $html .= '</td>';
        $html .= '</tr>';
        $html .= '<tr bgcolor="#ffffff">';
        $html .= '<td>';
        $html .= '<img src="http://boraconstruir.com.br/assets/emails/bem_vindo/img/espaco1.jpg" width="601" height="61" />';
        $html .= '</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td>';
        $html .= '<table style="display: inline-table;" border="0" cellpadding="0" cellspacing="0" width="601">';
        $html .= '<tr>';
        $html .= '<td>';
        $html .= '<img src="http://boraconstruir.com.br/assets/emails/bem_vindo/img/espaco2.jpg" width="180" height="55" />';
        $html .= '</td>';
        $html .= '<td>';
        $html .= '<img src="http://boraconstruir.com.br/assets/emails/bem_vindo/img/espaco3.jpg" width="163" height="55" />';
        $html .= '</td>';
        $html .= '</tr>';
        $html .= '</table>';
        $html .= '</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td>';
        $html .= '<img src="http://boraconstruir.com.br/assets/emails/bem_vindo/img/espaco1.jpg" width="601" height="61" />';
        $html .= '</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td>';
        $html .= '<table style="display: inline-table;" border="0" cellpadding="0" cellspacing="0" width="601">';
        $html .= '<tr>';
        $html .= '<td>';
        $html .= '<img src="http://boraconstruir.com.br/assets/emails/bem_vindo/img/espaco4.jpg" width="180" height="90" />';
        $html .= '</td>';
        $html .= '<td>';
        $html .= '<center>';
        $html .= '<img src="http://boraconstruir.com.br/assets/emails/bem_vindo/img/celular.jpg" width="258" height="90"/>';
        $html .= '</center>';
        $html .= '</td>';
        $html .= '<td>';
        $html .= '<img src="http://boraconstruir.com.br/assets/emails/bem_vindo/img/espaco5.jpg" width="163" height="90" />';
        $html .= '</td>';
        $html .= '</tr>';
        $html .= '</table>';
        $html .= '</td>';
        $html .= '</tr>';

        $notificacao = new Notificacao();
        $notificacao->html = $html;
        $notificacao->assunto = "Boraconsturir - Nova Obra";
        $notificacao->destinatario = "boraconstruir@labpix.com.br";
        $retorno = $notificacao->enviar();

        if ($retorno):
            return true;
        else:
            return false;
        endif;
    }
    
    public static function novo_profissional($profissional) {
        $html = '<table style="display: inline-table;" border="0" cellpadding="0" cellspacing="0" width="601">';
        $html .= '<tr>';
        $html .= '<td>';
        $html .= '</tr>';
        $html .= '<tr bgcolor="#fdaf17" height="101">';
        $html .= '<td>';
        $html .= '<table style="display: inline-table;" border="0" cellpadding="0" cellspacing="0" width="601">';
        $html .= '<center>';
        $html .= '<font face="tahoma" size="6" color="#ffffff">';
        $html .= 'Nova profissional no Sistema';
        $html .= '</center>';
        $html .= '</font>';
        $html .= '</table>';
        $html .= '</td>';
        $html .= '</tr>';
        $html .= '<tr bgcolor="#ffffff">';
        $html .= '<td>';
        $html .= '<table style="display: inline-table;" border="0" cellpadding="0" cellspacing="0" width="601">';
        $html .= '<tr>';
        $html .= '<td>';
        $html .= '<img src="http://boraconstruir.com.br/assets/emails/bem_vindo/img/espaco.jpg" width="73" height="56" />';
        $html .= '</td>';
        $html .= '<td>';
        $html .= '<center>';
        $html .= '<font face="tahoma" size="5" color="#000000">';
        $html .= '<br/>';
        $html .= '</font>';
        $html .= '<font face="tahoma" size="5" color="#fdaf17">';
        $html .= $profissional["nome"] . ' <br/>';
        $html .= '</font>';
        $html .= '<font face="tahoma" size="3" color="#666666">';
        $html .= '<br/>Acesse o sistema e ajuste o cadastro.';
        $html .= '<br />';
        $html .= '<br />';
        $html .= '</font>';
        $html .= '<font face="tahoma" size="2" color="#666666">';
        $html .= '<b>';
        $html .= '</center>';
        $html .= '</td>';
        $html .= '<td>';
        $html .= '<img src="http://boraconstruir.com.br/assets/emails/bem_vindo/img/espaco.jpg" width="73" height="56" />';
        $html .= '</td>';
        $html .= '</tr>';
        $html .= '</table>';
        $html .= '</td>';
        $html .= '</tr>';
        $html .= '<tr bgcolor="#ffffff">';
        $html .= '<td>';
        $html .= '<img src="http://boraconstruir.com.br/assets/emails/bem_vindo/img/espaco1.jpg" width="601" height="61" />';
        $html .= '</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td>';
        $html .= '<table style="display: inline-table;" border="0" cellpadding="0" cellspacing="0" width="601">';
        $html .= '<tr>';
        $html .= '<td>';
        $html .= '<img src="http://boraconstruir.com.br/assets/emails/bem_vindo/img/espaco2.jpg" width="180" height="55" />';
        $html .= '</td>';
        $html .= '<td>';
        $html .= '<img src="http://boraconstruir.com.br/assets/emails/bem_vindo/img/espaco3.jpg" width="163" height="55" />';
        $html .= '</td>';
        $html .= '</tr>';
        $html .= '</table>';
        $html .= '</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td>';
        $html .= '<img src="http://boraconstruir.com.br/assets/emails/bem_vindo/img/espaco1.jpg" width="601" height="61" />';
        $html .= '</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td>';
        $html .= '<table style="display: inline-table;" border="0" cellpadding="0" cellspacing="0" width="601">';
        $html .= '<tr>';
        $html .= '<td>';
        $html .= '<img src="http://boraconstruir.com.br/assets/emails/bem_vindo/img/espaco4.jpg" width="180" height="90" />';
        $html .= '</td>';
        $html .= '<td>';
        $html .= '<center>';
        $html .= '<img src="http://boraconstruir.com.br/assets/emails/bem_vindo/img/celular.jpg" width="258" height="90"/>';
        $html .= '</center>';
        $html .= '</td>';
        $html .= '<td>';
        $html .= '<img src="http://boraconstruir.com.br/assets/emails/bem_vindo/img/espaco5.jpg" width="163" height="90" />';
        $html .= '</td>';
        $html .= '</tr>';
        $html .= '</table>';
        $html .= '</td>';
        $html .= '</tr>';

        $notificacao = new Notificacao();
        $notificacao->html = $html;
        $notificacao->assunto = "Boraconsturir - Novo Profissional";
        $notificacao->destinatario = "boraconstruir@labpix.com.br";
        $retorno = $notificacao->enviar();

        if ($retorno):
            return true;
        else:
            return false;
        endif;
    }

}
