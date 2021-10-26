<?php
$html_template_path = "./cp/email_templates/autorresponder.html";
$html_template = fopen($html_template_path, "r") or die("Unable to open html template for autorresponder");
$html_content = fread($html_template, filesize($html_template_path));

echo $html_content;