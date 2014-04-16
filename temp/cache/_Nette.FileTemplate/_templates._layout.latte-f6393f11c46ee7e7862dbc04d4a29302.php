<?php //netteCache[01]000394a:2:{s:4:"time";s:21:"0.94518800 1395000397";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:80:"/data/web/virtuals/63036/virtual/www/subdom/intranet/app/templates/@layout.latte";i:2;i:1395000393;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2014-01-01";}}}?><?php

// source file: /data/web/virtuals/63036/virtual/www/subdom/intranet/app/templates/@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '0xa7fpveg8')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lba9017e6e81_title')) { function _lba9017e6e81_title($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
}}

//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lbb461d3dbb3_head')) { function _lbb461d3dbb3_head($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
}}

//
// block ckeditor
//
if (!function_exists($_l->blocks['ckeditor'][] = '_lb5f2599dd98_ckeditor')) { function _lb5f2599dd98_ckeditor($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
}}

//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbc811b5e3c9_content')) { function _lbc811b5e3c9_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
}}

//
// block sign
//
if (!function_exists($_l->blocks['sign'][] = '_lbdb12c24892_sign')) { function _lbdb12c24892_sign($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
}}

//
// block scripts
//
if (!function_exists($_l->blocks['scripts'][] = '_lb448c9fd3e7_scripts')) { function _lb448c9fd3e7_scripts($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>    <script src="<?php echo htmlSpecialChars($basePath) ?>/public/js/netteForms.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/public/js/main.js"></script>
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
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
<?php if (isset($robots)) { ?>    <meta name="robots" content="<?php echo htmlSpecialChars($robots) ?>" />
<?php } ?>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title><?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
ob_start(); call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars()); echo $template->upper($template->striptags(ob_get_clean()))  ?></title>

    <!-- Core CSS - Include with every page -->
    <link href="<?php echo htmlSpecialChars($basePath) ?>/public/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo htmlSpecialChars($basePath) ?>/public/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo htmlSpecialChars($basePath) ?>/public/css/dataTables.bootstrap.css" rel="stylesheet" />

    <!-- Page-Level Plugin CSS - Blank -->

    <!-- SB Admin CSS - Include with every page -->
    <link href="<?php echo htmlSpecialChars($basePath) ?>/public/css/sb-admin.css" rel="stylesheet" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
        $(document).ready(function () {
            $('.showless').hide();
            $('.showless').slideDown(500).delay(1000).slideUp(500);
        });
    </script>
    <?php call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars())  ?>

    <?php call_user_func(reset($_l->blocks['ckeditor']), $_l, get_defined_vars())  ?>


</head>

<body>
<script> document.documentElement.className += ' js' </script>
<?php if ($user->isLoggedIn()) { ?>
    <div id="wrapper">

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo htmlSpecialChars($_control->link("Homepage:")) ?>
">WexPortal - intranet</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li><a href="<?php echo htmlSpecialChars($_control->link("Users:profile")) ?>
"><i class="fa fa-user fa-fw"></i> Nastavení účtu</a>
                </li>
                <li class="divider"></li>
                <li><a href="<?php echo htmlSpecialChars($_control->link("Sign:out")) ?>
"><i class="fa fa-sign-out fa-fw"></i> Odhlášení</a>
                </li>
            </ul>
            <!-- /.navbar-top-links -->

        </nav>
        <!-- /.navbar-static-top -->

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="<?php echo htmlSpecialChars($_control->link("Homepage:")) ?>
">
                            <i class="fa fa-home fa-fw"></i> Domů</a>
                    </li>
<?php if ($user->isInRole('admin')) { ?>
                        <li>
                            <a href="<?php echo htmlSpecialChars($_control->link("Users:list")) ?>
">
                                <i class="fa fa-user fa-fw"></i> Uživatelé</a>
                        </li>
<?php } ?>
                    <li>
                        <a href="<?php echo htmlSpecialChars($_control->link("Users:")) ?>
">
                            <i class="fa fa-user fa-fw"></i> Adresář</a>
                    </li>
                    <li class="hidden">
                        <a href="<?php echo htmlSpecialChars($_control->link("Chat:")) ?>
">
                            <i class="fa fa-envelope fa-fw"></i> Chat</a>
                    </li>
                    <li>
                        <a href="<?php echo htmlSpecialChars($_control->link("Tasks:")) ?>
">
                            <i class="fa fa-tags fa-fw"></i> Úkoly</a>
                    </li>
                    <li>
                        <a href="<?php echo htmlSpecialChars($_control->link("Forum:")) ?>
">
                            <i class="fa fa-list-alt fa-fw"></i> Fórum</a>
                    </li>
                    <li class="hidden">
                        <a href="<?php echo htmlSpecialChars($_control->link("Calendar:")) ?>
">
                            <i class="fa fa-calendar fa-fw"></i> Kalendář</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> Systém<span
                                    class="fa arrow"></span></a>

                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo htmlSpecialChars($_control->link("System:bug")) ?>
"><i class="fa fa-warning fa-fw"></i> Nahlásit bug</a>
                            </li>
                            <li>
                                <a href="<?php echo htmlSpecialChars($_control->link("System:update")) ?>
"><i class="fa fa-pencil fa-fw"></i> Update / přidání funkce</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li class="hidden">
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span
                                    class="fa arrow"></span></a>

                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Second Level Item</a>
                            </li>
                            <li>
                                <a href="#">Second Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                </ul>
                                <!-- /.nav-third-level -->
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                </ul>
                <!-- /#side-menu -->
            </div>
            <!-- /.sidebar-collapse -->
        </nav>
        <!-- /.navbar-static-sie -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <br />

<?php $iterations = 0; foreach ($flashes as $flash) { ?>                    <div class="alertspace alert showless <?php echo htmlSpecialChars($flash->type) ?>"><i
                                class="fa fa-info fa-fw"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                        </button> <?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; } ?>
                </div>
            </div>


<?php call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars())  ?>
        </div>
        <!-- /#page-wrapper -->

    </div>
<?php } else { try { $_presenter->link("Sign:in"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")) { ?>


<?php call_user_func(reset($_l->blocks['sign']), $_l, get_defined_vars())  ?>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <br />
<?php $iterations = 0; foreach ($flashes as $flash) { ?>                <div class="alertspace alert showless <?php echo htmlSpecialChars($flash->type) ?>"><i
                            class="fa fa-info fa-fw"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                    </button> <?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; } ?>
            </div>
        </div>
<?php } } ?>
<!-- /#wrapper -->

<!-- Core Scripts - Include with every page -->
<script src="<?php echo htmlSpecialChars($basePath) ?>/public/js/bootstrap.min.js"></script>
<script src="<?php echo htmlSpecialChars($basePath) ?>/public/js/jquery.metisMenu.js"></script>

<!-- Page-Level Plugin Scripts - Blank -->

<!-- SB Admin Scripts - Include with every page -->
<script src="<?php echo htmlSpecialChars($basePath) ?>/public/js/sb-admin.js"></script>

<!-- Page-Level Demo Scripts - Blank - Use for reference -->
<?php call_user_func(reset($_l->blocks['scripts']), $_l, get_defined_vars())  ?>
</body>

</html>
