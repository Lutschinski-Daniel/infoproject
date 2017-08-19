<?php
/* Smarty version 3.1.30, created on 2017-08-19 12:08:08
  from "C:\xampp\htdocs\Crexam\templates\exam_saved.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59980e08cefbe5_81600994',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '398d33154003d874f8af547fc3b5ccf0c920d633' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\templates\\exam_saved.tpl',
      1 => 1503136849,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59980e08cefbe5_81600994 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1>Klausur erfolgreich erstellt!</h1>
<h3>Pfade zu den Dateien:</h3>
<br/>
<div>/Crexam/tex/klausur.tex</div>
<br/>
<div>/Crexam/tex/musterloesung/musterloesung.tex</div>

<div class="download-exam-files-btn"><a href="/Crexam/php/controller/exam_download.php" target="_blank">Download Klausur</a></div>
<div class="download-exam-files-btn"><a href="/Crexam/php/controller/exam_download_loesung.php" target="_blank">Download Lösung</a></div><?php }
}
