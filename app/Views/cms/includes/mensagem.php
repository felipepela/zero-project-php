<?PHP
$session = session();
?>

<div class="box-body message-fixed">
    <?PHP if($session->getFlashdata('msg_erro')): ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Issue!</h4>
        <?= $session->getFlashdata('msg_erro'); ?>
    </div>
    <?PHP endif; ?>
    <?PHP if($session->getFlashdata('msg_acerto')): ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Cool!</h4>
        <?= $session->getFlashdata('msg_acerto'); ?>
    </div>
    <?PHP endif; ?>
</div>