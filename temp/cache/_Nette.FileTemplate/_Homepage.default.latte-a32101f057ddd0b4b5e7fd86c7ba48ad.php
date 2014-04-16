<?php //netteCache[01]000403a:2:{s:4:"time";s:21:"0.27997900 1395000710";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:89:"/data/web/virtuals/63036/virtual/www/subdom/intranet/app/templates/Homepage/default.latte";i:2;i:1395000706;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2014-01-01";}}}?><?php

// source file: /data/web/virtuals/63036/virtual/www/subdom/intranet/app/templates/Homepage/default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'drluv3q32q')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbcfbb0a3a60_content')) { function _lbcfbb0a3a60_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>    <br />
    <div class="alertspace alert alert-warning"><i class="fa fa-info fa-fw"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Vaše návrhy a bugy prosím směřujte do sekcí <a class="text-primary" href="<?php echo htmlSpecialChars($_control->link("System:bug")) ?>
">Nahlásit bug</a> a <a href="<?php echo htmlSpecialChars($_control->link("System:update")) ?>
">Návrh na update/přidání funkce</a>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Aktualizace
                </div>
                <div class="panel-body">
                    <ul>
<?php if ($user->isInRole('admin')) { ?>
                            <li>
                                16.03.2014 - Proběhla aktualizace systému
                                <ol class="list">
                                    <li>
                                        přidáno:
                                        <ul>
                                            <li>
                                                mazání uživatelů
                                            </li>
                                            <li>
                                                data posledního přihlášení uživatelů
                                            </li>
                                        </ul>
                                    </li>
                                </ol>
                            </li>
<?php } ?>
                        <li>
                            04.03.2014 - Proběhla aktualizace systému
                            <ol class="list">
                                <li>
                                    přidáno:
                                    <ul>
                                        <li>
                                            Hlášení bugů
                                        </li>
                                        <li>
                                            Návrh na update/přidání funkce
                                        </li>
                                        <li>
                                            Tlačítko domů
                                        </li>
                                        <li>
                                            Opraven čas v úkolech
                                        </li>
                                    </ul>
                                </li>
                            </ol>
                        </li>
                        <li>
                            03.03.2014 - Proběhla aktualizace systému
                            <ol class="list">
                                <li>
                                    přidány další položky v profilu
                                </li>
                            </ol>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Plánované aktualizace
                </div>
                <div class="panel-body">
                    <ol>
                        <li>
                            Přidání chatu
                        </li>
                        <li>
                            Přidání "fora"
                        </li>
                        <li>
                            Přidání funkce posílání zpráv
                        </li>
                        <li>
                            Přidání notifikací
                        </li>
                        <li>
                            Přidání kalendáře
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-lg-4 hidden">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bell fa-fw"></i> Panel notifikací - testovací režim
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="list-group hidden">
                        <a href="#" class="list-group-item">
                            <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small"><em>4 minutes ago</em>
                                    </span>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small"><em>12 minutes ago</em>
                                    </span>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small"><em>27 minutes ago</em>
                                    </span>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small"><em>43 minutes ago</em>
                                    </span>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small"><em>11:32 AM</em>
                                    </span>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-bolt fa-fw"></i> Server Crashed!
                                    <span class="pull-right text-muted small"><em>11:13 AM</em>
                                    </span>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-warning fa-fw"></i> Server Not Responding
                                    <span class="pull-right text-muted small"><em>10:57 AM</em>
                                    </span>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
                                    <span class="pull-right text-muted small"><em>9:49 AM</em>
                                    </span>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-money fa-fw"></i> Payment Received
                                    <span class="pull-right text-muted small"><em>Yesterday</em>
                                    </span>
                        </a>
                    </div>
                    <a href="#" class="btn btn-default btn-block hidden">View All Alerts</a>
                </div>
            </div>
        </div>

    </div>
<?php if ($user->isInRole('admin')) { ?>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        Hlášené bugy
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Název</th>
                                <th>Uživatel</th>
                                <th>Čas</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
<?php $iterations = 0; foreach ($bugs as $item) { ?>
                                <tr>
                                    <td><?php echo Nette\Templating\Helpers::escapeHtml($item->id, ENT_NOQUOTES) ?></td>
                                    <td><?php echo Nette\Templating\Helpers::escapeHtml($item->name, ENT_NOQUOTES) ?></td>
                                    <td><?php echo Nette\Templating\Helpers::escapeHtml($template->UserName($item->user), ENT_NOQUOTES) ?></td>
                                    <td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($item->time, '%H:%m - %d.%m.%Y'), ENT_NOQUOTES) ?></td>
                                    <td><a class="btn btn-primary" href="<?php echo htmlSpecialChars($_control->link("System:ShowBug", array($item->id))) ?>
"><i
                                                    class="fa fa-eye fa-fw"></i></a></td>
                                </tr>
<?php $iterations++; } if (count($bugs) == 0) { ?>
                                <tr>
                                    <td colspan="4">Žádné hlášené bugy</td>

                                </tr>
<?php } ?>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <a class="text-danger" href="<?php echo htmlSpecialChars($_control->link("System:bugs")) ?>
">Zobrazit všechny</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Návrhy na přidání/update
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Název</th>
                                <th>Uživatel</th>
                                <th>Čas</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
<?php $iterations = 0; foreach ($updates as $item) { ?>
                                <tr>
                                    <td><?php echo Nette\Templating\Helpers::escapeHtml($item->id, ENT_NOQUOTES) ?></td>
                                    <td><?php echo Nette\Templating\Helpers::escapeHtml($item->name, ENT_NOQUOTES) ?></td>
                                    <td><?php echo Nette\Templating\Helpers::escapeHtml($template->UserName($item->user), ENT_NOQUOTES) ?></td>
                                    <td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($item->time, '%H:%m - %d.%m.%Y'), ENT_NOQUOTES) ?></td>
                                    <td><a class="btn btn-primary" href="<?php echo htmlSpecialChars($_control->link("System:ShowUpdate", array($item->id))) ?>
"><i
                                                    class="fa fa-eye fa-fw"></i></a></td>
                                </tr>
<?php $iterations++; } ?>

                        </table>
                    </div>
                    <div class="panel-footer">
                        <a class="text-primary" href="<?php echo htmlSpecialChars($_control->link("System:updates")) ?>
">Zobrazit všechny</a>
                    </div>
                </div>
            </div>

        </div>
<?php } 
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