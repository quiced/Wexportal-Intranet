<?php //netteCache[01]000397a:2:{s:4:"time";s:21:"0.72153500 1395058047";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:83:"/data/web/virtuals/63036/virtual/www/subdom/intranet/app/templates/Tasks/show.latte";i:2;i:1395000389;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2014-01-01";}}}?><?php

// source file: /data/web/virtuals/63036/virtual/www/subdom/intranet/app/templates/Tasks/show.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '0ayaqz7fnx')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb6e9b28eb82_content')) { function _lb6e9b28eb82_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Úkol: <?php echo Nette\Templating\Helpers::escapeHtml($taskData->name, ENT_NOQUOTES) ?></h1>
        </div>
        <div class="col-lg-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <p><?php echo $template->nl2br($taskData->text) ?></p>
                </div>
                <div class="panel-footer">

                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    Vložte nový příspěvek
                </div>
                <div class="panel-body">
<?php $_ctrl = $_control->getComponent("chatForm"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>
                </div>
            </div>
            <!--mesages -->
<div id="<?php echo $_control->getSnippetId('header') ?>"><?php call_user_func(reset($_l->blocks['_header']), $_l, $template->getParameters()) ?>
</div>
        </div>
        <div class="col-lg-3">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    Info o úkolu
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="text-left"><strong>Pracující:</strong></p>

                            <p><?php echo Nette\Templating\Helpers::escapeHtml($template->WorkerName($taskData->worker), ENT_NOQUOTES) ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <p><strong>Zadavatel:</strong></p>

                            <p> <?php echo Nette\Templating\Helpers::escapeHtml($template->UserName($taskData->user_id), ENT_NOQUOTES) ?></p>
                        </div>
                        <div class="col-lg-12">
                            <p><strong>Datum ukončení:</strong></p>

                            <p> <?php echo Nette\Templating\Helpers::escapeHtml($taskData->endtime, ENT_NOQUOTES) ?> </p>
                        </div>
                    </div>
                </div>
            </div>

<?php if ($user->isInRole('admin')) { ?>
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        Akce
                    </div>
                    <div class="panel-body">
                        <a class="btn btn-primary btn-outline" href="<?php echo htmlSpecialChars($_control->link("Tasks:edit", array($taskData->id))) ?>
">Upravit</a>
                        <a class="btn btn-danger btn-outline"
                           onclick="return confirm('Jste si jistí?')" href="<?php echo htmlSpecialChars($_control->link("Tasks:deleteTask", array($taskData->id))) ?>
">Smazat</a>
                    </div>
                </div>
<?php } elseif ($taskData->user_id == $user->id) { ?>
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        Akce
                    </div>
                    <div class="panel-body">
                        <a class="btn btn-primary btn-outline" href="<?php echo htmlSpecialChars($_control->link("Tasks:edit", array($taskData->id))) ?>
">Upravit</a>
                        <a class="btn btn-danger btn-outline"
                           onclick="return confirm('Jste si jistí?')" href="<?php echo htmlSpecialChars($_control->link("Tasks:deleteTask", array($taskData->id))) ?>
">Smazat</a>
                    </div>
                </div>
<?php } ?>
        </div>
    </div>
<?php
}}

//
// block _header
//
if (!function_exists($_l->blocks['_header'][] = '_lbe74b115e90__header')) { function _lbe74b115e90__header($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->validateControl('header')
?>                <div class="itemsContainer">
                    <h2>Příspěvky:</h2>
<?php $iterations = 0; foreach ($chat as $chatmessages) { ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <p class="text-left"><em><?php echo Nette\Templating\Helpers::escapeHtml($template->UserName($chatmessages->user_id), ENT_NOQUOTES) ?></em></p>
                                    </div>
                                    <div class="col-lg-2 col-lg-offset-8">
                                        <p class="text-right"><?php echo Nette\Templating\Helpers::escapeHtml($template->date($chatmessages->time, '%H:%m - %d.%m.%Y'), ENT_NOQUOTES) ?> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <p><?php echo $template->nl2br($chatmessages->message) ?></p>
                            </div>
                        </div>
<?php $iterations++; } ?>
                </div>
<?php
}}

//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lb8cd6a8a608_head')) { function _lb8cd6a8a608_head($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>    <script>
        window.onload = function () {
            CKEDITOR.replace('content');
        }
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