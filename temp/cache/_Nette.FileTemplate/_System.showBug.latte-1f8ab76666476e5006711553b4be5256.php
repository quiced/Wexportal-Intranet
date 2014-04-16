<?php //netteCache[01]000401a:2:{s:4:"time";s:21:"0.17407800 1394049575";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:87:"/data/web/virtuals/63036/virtual/www/subdom/intranet/app/templates/System/showBug.latte";i:2;i:1394047790;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2014-01-01";}}}?><?php

// source file: /data/web/virtuals/63036/virtual/www/subdom/intranet/app/templates/System/showBug.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '6x0c77zne7')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb9150d547c8_content')) { function _lb9150d547c8_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>    <div class="row">
        <div class="col-lg-9">
            <div class="panel panel-danger">
                <div class="panel-heading text-right">
                    <p class="text-left">Název: <?php echo Nette\Templating\Helpers::escapeHtml($data->name, ENT_NOQUOTES) ?></p>
                </div>
                <div class="panel-body foo bar">
                    <div class="form-group">
                        <p class="form-control-static"><?php echo $template->nl2br($data->text) ?></p>
                    </div>
                </div>
<?php if ($data->active == 0) { ?>
                    <div class="panel-footer text-right">
                        <a class="text-right btn btn-primary" onclick="return confirm('Jste si jistí?')" href="<?php echo htmlSpecialChars($_control->link("System:succesBug", array($data->id))) ?>
"><i class="fa fa-check fa-fw"></i></a>
                    </div>
<?php } ?>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    Info
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label>Zadavatel</label>

                        <p class="form-control-static">
                            <?php echo Nette\Templating\Helpers::escapeHtml($template->Username($data->user), ENT_NOQUOTES) ?>

                        </p>
                    </div>
                    <div class="form-group">
                        <label>Čas</label>

                        <p class="form-control-static">
                            <?php echo Nette\Templating\Helpers::escapeHtml($template->date($data->time, '%H:%m - %d.%m.%Y'), ENT_NOQUOTES) ?>

                        </p>
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