<?php //netteCache[01]000400a:2:{s:4:"time";s:21:"0.40938700 1395040521";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:86:"/data/web/virtuals/63036/virtual/www/subdom/intranet/app/templates/Forum/default.latte";i:2;i:1395000383;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2014-01-01";}}}?><?php

// source file: /data/web/virtuals/63036/virtual/www/subdom/intranet/app/templates/Forum/default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'bqjla57oxh')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb2e3c5d6b3d_content')) { function _lb2e3c5d6b3d_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Fórum</h1>
            <a class="btn btn-primary" href="<?php echo htmlSpecialChars($_control->link("Forum:new")) ?>
"><i class="fa fa-pencil fw"></i> Nové téma</a>
            <br /><br />

            <div class="table-responsive">
                <table class="table table-striped table-hover" id="table">
                    <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Téma
                        </th>
                        <th>
                            Založil
                        </th>
                        <th>
                            Datum
                        </th>
                        <th>
                            Stav
                        </th>
                    </tr>
                    </thead>
                    <tbody>
<?php $iterations = 0; foreach ($data as $item) { ?>
                        <tr>
                            <td>
                                <?php echo Nette\Templating\Helpers::escapeHtml($item->id, ENT_NOQUOTES) ?>

                            </td>
                            <td>
                                <a title="" href="<?php echo htmlSpecialChars($_control->link("Forum:theme", array($item->id))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($item->name, ENT_NOQUOTES) ?></a>
                            </td>
                            <td><?php echo Nette\Templating\Helpers::escapeHtml($template->Username($item->user), ENT_NOQUOTES) ?></td>
                            <td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($item->time, '%H:%m - %d.%m.%Y'), ENT_NOQUOTES) ?></td>
                            <td><?php if ($item->active == 1) { ?>aktivní<?php } elseif ($item->active == 0) { ?>
ukončeno<?php } ?></td>
                        </tr>
<?php $iterations++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php
}}

//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lbd9ccb35119_head')) { function _lbd9ccb35119_head($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>    <script src="<?php echo htmlSpecialChars($basePath) ?>/public/js/jquery.dataTables.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/public/js/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#table').dataTable({
                "aaSorting": [[0,'desc']],
                "aLengthMenu": [[20, 50, 100, -1], [20, 50, 100, "Vše"]],
                "aoColumnDefs": [
                    { "bSearchable": false, "bVisible": false, "aTargets": [ 0 ] }
                ] } );
        });
    </script>
<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars()) ; 