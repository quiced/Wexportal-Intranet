<?php //netteCache[01]000404a:2:{s:4:"time";s:21:"0.63471000 1395051064";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:90:"/data/web/virtuals/63036/virtual/www/subdom/intranet/app/templates/Users/userprofile.latte";i:2;i:1395000390;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2014-01-01";}}}?><?php

// source file: /data/web/virtuals/63036/virtual/www/subdom/intranet/app/templates/Users/userprofile.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '7ukvrqt96y')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb1fa381dcd4_content')) { function _lb1fa381dcd4_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Profil uživatele: <?php echo Nette\Templating\Helpers::escapeHtml($data->nick, ENT_NOQUOTES) ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Informace o uživateli
                </div>
                <div class="panel-body">
                    <div class="form-group">

                        <p><strong>Jméno a příjmení</strong></p>

                        <p class="form-control-static"><?php echo Nette\Templating\Helpers::escapeHtml($data->name, ENT_NOQUOTES) ?>
 <?php echo Nette\Templating\Helpers::escapeHtml($data->surname, ENT_NOQUOTES) ?></p>
                    </div>
                    <div class="form-group">
                        <p><strong>Email</strong></p>

                        <p class="form-control-static"><a target="_blank"
                                                          href="mailto:<?php echo htmlSpecialChars($data->email) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($data->email, ENT_NOQUOTES) ?></a></p>
                    </div>
                    <div class="form-group">
                        <p><strong>Telefon</strong></p>

                        <p class="form-control-static"><a target="_blank"
                                                          href="tel:+420<?php echo htmlSpecialChars($data->phone) ?>
">+420<?php echo Nette\Templating\Helpers::escapeHtml($data->phone, ENT_NOQUOTES) ?></a></p>
                    </div>
                    <div class="form-group">
                        <p><strong>Skype</strong></p>

                        <p class="form-control-static"><?php echo Nette\Templating\Helpers::escapeHtml($data->skype, ENT_NOQUOTES) ?></p>
                    </div>
                    <div class="form-group">
                        <p><strong>Specializace</strong></p>

                        <p class="form-control-static"><?php echo Nette\Templating\Helpers::escapeHtml($data->ability, ENT_NOQUOTES) ?></p>
                    </div>
                    <div class="form-group">
                        <p><strong>Kraj</strong></p>

                        <p class="form-control-static"><?php echo Nette\Templating\Helpers::escapeHtml($template->Kraj($data->kraj), ENT_NOQUOTES) ?></p>
                    </div>
                    <div class="form-group">
                        <p><strong>Město</strong></p>

                        <p class="form-control-static"><?php echo Nette\Templating\Helpers::escapeHtml($data->city, ENT_NOQUOTES) ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">

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