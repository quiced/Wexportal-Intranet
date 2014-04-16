<?php //netteCache[01]000397a:2:{s:4:"time";s:21:"0.39566800 1395000411";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:83:"/data/web/virtuals/63036/virtual/www/subdom/intranet/app/templates/Users/list.latte";i:2;i:1395000390;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2014-01-01";}}}?><?php

// source file: /data/web/virtuals/63036/virtual/www/subdom/intranet/app/templates/Users/list.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'dt9005gwyo')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb756d2059c3_content')) { function _lb756d2059c3_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>    <div class="row navbar">
            <div class="col-lg-12">
                <h1 class="page-header">Správa uživatelů</h1>
                <a class="btn btn-primary" href="<?php echo htmlSpecialChars($_control->link("Users:new")) ?>
">Přidat uživatele</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nick</th>
                            <th>Jméno</th>
                            <th>Příjmení</th>
                            <th>Email</th>
                            <th>Poslední přihlášení</th>
                            <th>Role</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
<?php $iterations = 0; foreach ($users as $userss) { ?>
                            <tr>
                                <td><?php echo Nette\Templating\Helpers::escapeHtml($userss->id, ENT_NOQUOTES) ?></td>
                                <td><?php echo Nette\Templating\Helpers::escapeHtml($userss->nick, ENT_NOQUOTES) ?></td>
                                <td><?php echo Nette\Templating\Helpers::escapeHtml($userss->name, ENT_NOQUOTES) ?></td>
                                <td><?php echo Nette\Templating\Helpers::escapeHtml($userss->surname, ENT_NOQUOTES) ?></td>
                                <td><?php echo Nette\Templating\Helpers::escapeHtml($userss->email, ENT_NOQUOTES) ?></td>
                                <td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($userss->lastLogin, '%H:%m - %d.%m.%Y'), ENT_NOQUOTES) ?></td>
                                <td><?php echo Nette\Templating\Helpers::escapeHtml($userss->role, ENT_NOQUOTES) ?></td>
                                <td>
<?php if ($userss->id != $user->id) { ?>
                                    <a class="btn btn-danger" onclick="return confirm('Jste si jistí?')" href="<?php echo htmlSpecialChars($_control->link("Users:deleteUser", array($userss->id))) ?>
">
                                        <i class="fa fa-fw fa-refresh"></i>
                                    </a>
<?php } ?>
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
if (!function_exists($_l->blocks['head'][] = '_lb49bc3348f5_head')) { function _lb49bc3348f5_head($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
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
                ]
            });
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