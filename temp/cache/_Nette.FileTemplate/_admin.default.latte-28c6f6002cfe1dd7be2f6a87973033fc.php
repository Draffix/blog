<?php //netteCache[01]000389a:2:{s:4:"time";s:21:"0.34746700 1372420035";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:67:"C:\wamp\www\blog\blog\app\AdminModule\templates\admin\default.latte";i:2;i:1372326513;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"c0332ac released on 2013-03-08";}}}?><?php

// source file: C:\wamp\www\blog\blog\app\AdminModule\templates\admin\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'hllmyx80t6')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb7889231ed7_content')) { function _lb7889231ed7_content($_l, $_args) { extract($_args)
?><div id="posts">
<?php if (count($posts)): ?>
        <h3>Seznam článků</h3>
        <table border="0">
<?php $iterations = 0; foreach ($posts as $post): ?>
                <div class="post">
                    <tr>
                        <td>
                            <a href="<?php echo htmlSpecialChars($_control->link(":Front:Homepage:single", array($post['id']))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($post['title'], ENT_NOQUOTES) ?></a> (
                            <small>Přidáno <?php echo Nette\Templating\Helpers::escapeHtml($template->date($post['date']), ENT_NOQUOTES) ?></small>
                            )
                        </td>
                        <td>
                            <a href="<?php echo htmlSpecialChars($_control->link("Admin:single", array($post->id))) ?>
">Upravit</a> | <a href="<?php echo htmlSpecialChars($_control->link("deleteArticle!", array($post->id))) ?>
">Smazat</a>
                        </td>
                    </tr>
                </div>
<?php $iterations++; endforeach ?>
        </table>
<?php else: ?>
        Zatím nebyl napsán žádný článek.
<?php endif ?>

    <h5><a href="<?php echo htmlSpecialChars($_control->link("Admin:addArticle")) ?>
">Přidat nový článek</a></h5>
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