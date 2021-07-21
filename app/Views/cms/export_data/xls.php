<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?PHP
date_default_timezone_set('America/Sao_Paulo');
$arquivo = 'newsletter - '. date('d-m-Y H-m-s');

header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=\"{$arquivo}\".xls" );
header ("Content-Description: PHP Generated Data" );
?>
<table>
    <thead>
        <tr>
            <th>E-mail</th>
            <th>Data de Cadastro</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($newsletter as $email) :?>
        <tr>
            <td><?php echo $email->email?></td>
            <td><?php echo format_data_mysql($email->cadastro)?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php die(); ?>