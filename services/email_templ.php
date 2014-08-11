<?php
$email_template = '';
$email_template .= '<html>';
$email_template .= '<head>';
$email_template .= '<title>Advanced Hardwood Biofuels Northwest | ' . $title . '</title>';
$email_template .= '</head>';
$email_template .= '<body style="font-family: arial, helvetica; font-size: 1em; color: #333333;">';
$email_template .= '<table width="600" border="1" cellspacing="0" cellpadding="0">';
$email_template .= '<tr>';
$email_template .= '<td><img src="http://hardwoodbiofuels.cahnrs.wsu.edu/email_header.png" width="600" height="104" alt="Header Image" /></td>';
$email_template .= '</tr>';
$email_template .= '<tr>';
$email_template .= '<td style="padding: 25px;">';
$email_template .= '<h1 style="font-family: arial, helvetica; font-size: 1.8em; color: #1d70b9;">' . $title . '</h1>';
$email_template .= '<h2 style="font-size: 1.4em;">' . $subtitle . '</h2>';
$email_template .= '<p>' . $content . '</p>';
$email_template .= '</td>';
$email_template .= '</tr>';
$email_template .= '</table>';
$email_template .= '</body>';
$email_template .= '</html>';
?>