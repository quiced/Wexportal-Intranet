<?php //netteCache[01]000400a:2:{s:4:"time";s:21:"0.21279700 1395041528";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:86:"/data/web/virtuals/63036/virtual/www/subdom/intranet/app/templates/Users/default.latte";i:2;i:1395000389;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2014-01-01";}}}?><?php

// source file: /data/web/virtuals/63036/virtual/www/subdom/intranet/app/templates/Users/default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '616ruj97ra')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbff6cc0beae_content')) { function _lbff6cc0beae_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Adresář</h1>

            <div class="table-responsive">
                <table class="table table-striped table-hover" id="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Jméno</th>
                        <th>Přijmení</th>
                        <th>Nick</th>
                        <th>Email</th>
                        <th>Telefon</th>
                        <th>Skype</th>
                        <th>Specializace</th>
                        <th>Info</th>
                    </tr>
                    </thead>
                    <tbody>
<?php $iterations = 0; foreach ($users as $user) { ?>
                        <tr>
                            <td><?php echo Nette\Templating\Helpers::escapeHtml($user->id, ENT_NOQUOTES) ?></td>
                            <td><?php echo Nette\Templating\Helpers::escapeHtml($user->nick, ENT_NOQUOTES) ?></td>
                            <td><?php echo Nette\Templating\Helpers::escapeHtml($user->name, ENT_NOQUOTES) ?></td>
                            <td><?php echo Nette\Templating\Helpers::escapeHtml($user->surname, ENT_NOQUOTES) ?></td>
                            <td><?php echo Nette\Templating\Helpers::escapeHtml($user->email, ENT_NOQUOTES) ?></td>
                            <td><?php echo Nette\Templating\Helpers::escapeHtml($user->phone, ENT_NOQUOTES) ?></td>
                            <td><?php echo Nette\Templating\Helpers::escapeHtml($user->skype, ENT_NOQUOTES) ?></td>
                            <td><?php echo Nette\Templating\Helpers::escapeHtml($template->truncate($user->ability, 40), ENT_NOQUOTES) ?></td>
                            <td>
                                <a class="btn btn-primary" href="<?php echo htmlSpecialChars($_control->link("Users:Userprofile", array($user->id))) ?>
"><i
                                            class="fa fa-user fa fw"></i></a>
                                <a class="btn btn-info hidden" href="<?php echo htmlSpecialChars($_control->link("Messenger:NewMessage")) ?>
"><i
                                            class="fa fa-envelope fa-fw"></i></a>
                            </td>
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
if (!function_exists($_l->blocks['head'][] = '_lbd7c93c37f8_head')) { function _lbd7c93c37f8_head($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>    <script src="<?php echo htmlSpecialChars($basePath) ?>/public/js/jquery.dataTables.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/public/js/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#table').dataTable({
                "aaSorting": [
                    [0, 'asc']
                ],
                "aLengthMenu": [
                    [20, 50, 100, -1],
                    [20, 50, 100, "Vše"]
                ],
                "aoColumnDefs": [
                    { "bSearchable": false, "bVisible": false, "aTargets": [ 0 ] }
                ] });
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