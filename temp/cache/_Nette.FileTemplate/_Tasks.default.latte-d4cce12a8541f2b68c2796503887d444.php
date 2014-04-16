<?php //netteCache[01]000400a:2:{s:4:"time";s:21:"0.37856700 1395000720";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:86:"/data/web/virtuals/63036/virtual/www/subdom/intranet/app/templates/Tasks/default.latte";i:2;i:1395000388;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2014-01-01";}}}?><?php

// source file: /data/web/virtuals/63036/virtual/www/subdom/intranet/app/templates/Tasks/default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'klocx43gfh')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb635b237afc_content')) { function _lb635b237afc_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>    <div class="row navbar">
        <div class="col-lg-12">
            <h1 class="page-header">Úkoly</h1>
            <a class="btn btn-primary" href="<?php echo htmlSpecialChars($_control->link("Tasks:new")) ?>
">Přidat</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="table">
                    <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Název
                        </th>
                        <th>
                            Datum ukončení
                        </th>
                        <th>
                            Zadavatel
                        </th>
                    </tr>
                    </thead>
                    <tbody>
<?php $iterations = 0; foreach ($tasks as $task) { ?>
                        <tr <?php echo Nette\Templating\Helpers::escapeHtml($template->RowStatus2($task->read), ENT_NOQUOTES) ?>
 <?php echo Nette\Templating\Helpers::escapeHtml($template->RowStatus($task->worker), ENT_NOQUOTES) ?>>
                            <td><?php echo Nette\Templating\Helpers::escapeHtml($task->id, ENT_NOQUOTES) ?></td>
                            <td><a href="<?php echo htmlSpecialChars($_control->link("Tasks:show", array($task->id))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($task->name, ENT_NOQUOTES) ?></a></td>
                            <td><?php echo Nette\Templating\Helpers::escapeHtml($task->endtime, ENT_NOQUOTES) ?></td>
                            <td><?php echo Nette\Templating\Helpers::escapeHtml($template->UserName($task->user_id), ENT_NOQUOTES) ?></td>
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
if (!function_exists($_l->blocks['head'][] = '_lb1096929e62_head')) { function _lb1096929e62_head($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
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