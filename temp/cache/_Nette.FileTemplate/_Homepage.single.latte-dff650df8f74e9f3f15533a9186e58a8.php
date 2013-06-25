<?php //netteCache[01]000379a:2:{s:4:"time";s:21:"0.88669500 1372173772";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:57:"C:\wamp\www\blog\blog\app\templates\Homepage\single.latte";i:2;i:1372173239;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"c0332ac released on 2013-03-08";}}}?><?php

// source file: C:\wamp\www\blog\blog\app\templates\Homepage\single.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'hqxouu0nma')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbf46636eb13_content')) { function _lbf46636eb13_content($_l, $_args) { extract($_args)
?><a href="<?php echo htmlSpecialChars($_control->link("Homepage:")) ?>">&lt;&lt; home </a>
<div class="post">
    <h1><?php echo Nette\Templating\Helpers::escapeHtml($post['title'], ENT_NOQUOTES) ?></h1>
    <small>Přidáno <?php echo Nette\Templating\Helpers::escapeHtml($template->date($post['date']), ENT_NOQUOTES) ?></small>
    <p><?php echo Nette\Templating\Helpers::escapeHtml($post['body'], ENT_NOQUOTES) ?></p>
</div>

<h3>Komentáře:</h3>
<div id="comments">
<?php if ($comments): $iterations = 0; foreach ($comments as $comment): ?>
                <p><?php echo Nette\Templating\Helpers::escapeHtml($comment['body'], ENT_NOQUOTES) ?></p>
                <small><?php echo Nette\Templating\Helpers::escapeHtml($comment['author'], ENT_NOQUOTES) ?>
, <?php echo Nette\Templating\Helpers::escapeHtml($template->date($comment['date']), ENT_NOQUOTES) ?></small>
                <hr />
<?php $iterations++; endforeach ;else: ?>
        Ke článku zatím nebyly napsány žádné komentáře. Buďte první!
<?php endif ?>
</div>

<?php $_ctrl = $_control->getComponent("commentForm"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render() ;
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