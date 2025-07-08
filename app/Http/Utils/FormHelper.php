<?php


/***
 * @param $content
 * @return string|string[]
 */
function FixFroalaEditorContent($content){
    $froalaCopyRight = '<p data-f-id="pbf" style="text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;">Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a></p>';
    $froalaCopyRight2 = 'Powered by';
    $froalaCopyRight3 = 'Froala Editor';
    return str_replace([$froalaCopyRight,$froalaCopyRight2,$froalaCopyRight3],'',$content);
}
