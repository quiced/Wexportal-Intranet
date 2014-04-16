<?php //netteCache[01]000400a:2:{s:4:"time";s:21:"0.52230500 1395057611";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:86:"/data/web/virtuals/63036/virtual/www/subdom/intranet/app/templates/Users/profile.latte";i:2;i:1395000390;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2014-01-01";}}}?><?php

// source file: /data/web/virtuals/63036/virtual/www/subdom/intranet/app/templates/Users/profile.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'd7tucr04q6')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbea018dacb0_content')) { function _lbea018dacb0_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>    <div class="row">
        <div class="col-lg-12">
            <h1>Můj profil</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Informace o uživateli
                    </div>
                    <div class="panel-body">
<?php $_ctrl = $_control->getComponent("updateProfileForm"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <div class="form-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Změna hesla
                        </div>
                        <div class="panel-body">
<?php $_ctrl = $_control->getComponent("updateProfilePassForm"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 