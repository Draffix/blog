<?php //netteCache[01]000375a:2:{s:4:"time";s:21:"0.05020400 1371894459";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:53:"C:\wamp\www\blog\app\templates\Homepage\default.latte";i:2;i:1371894211;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"c0332ac released on 2013-03-08";}}}?><?php

// source file: C:\wamp\www\blog\app\templates\Homepage\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'e65l3ft8t7')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb491f121ad1_content')) { function _lb491f121ad1_content($_l, $_args) { extract($_args)
?><h1>Můj blogísek</h1>
<div id="posts">
<?php if (count($posts)): $iterations = 0; foreach ($posts as $post): ?>
        <div class="post">
            <h3><?php echo Nette\Templating\Helpers::escapeHtml($post['title'], ENT_NOQUOTES) ?></h3>
            <small>Přidáno <?php echo Nette\Templating\Helpers::escapeHtml($template->date($post['date']), ENT_NOQUOTES) ?></small>
            <p><?php echo Nette\Templating\Helpers::escapeHtml($template->truncate($post['body'], 300), ENT_NOQUOTES) ?></p>
            <a href="<?php echo htmlSpecialChars($_control->link("Homepage:single", array($post['id']))) ?>
">Více…</a>
        </div>
<?php $iterations++; endforeach ;else: ?>
        Zatím nebyl napsán žádný článek.
<?php endif ?>
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