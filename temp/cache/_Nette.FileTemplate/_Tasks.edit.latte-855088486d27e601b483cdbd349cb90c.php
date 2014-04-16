<?php //netteCache[01]000397a:2:{s:4:"time";s:21:"0.49109000 1396864321";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:83:"/data/web/virtuals/63036/virtual/www/subdom/intranet/app/templates/Tasks/edit.latte";i:2;i:1395000388;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2014-01-01";}}}?><?php

// source file: /data/web/virtuals/63036/virtual/www/subdom/intranet/app/templates/Tasks/edit.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '042c2jdnz7')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbd9d931ec18_content')) { function _lbd9d931ec18_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>    <div class="row">
        <div class="col-lg-12">
            <h1>Edit úkolu</h1>

<?php $_ctrl = $_control->getComponent("editTaskForm"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>


        </div>
    </div>
<?php
}}

//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lbc1c37c3a2b_head')) { function _lbc1c37c3a2b_head($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" href="<?php echo htmlSpecialChars($basePath) ?>/public/css/jquery-ui-1.10.4.custom.css" />
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script>
        $(function () {
            $(".datepicker").datepicker({
                numberOfMonths: 3,
                showButtonPanel: true
            });
            $(".datepicker").datepicker("option", "dateFormat", 'dd.mm yy');

        });
    </script>
    <script>
        window.onload = function () {
            CKEDITOR.replace('text');
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