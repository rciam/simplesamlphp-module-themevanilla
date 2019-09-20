<?php

echo('<h2>' . $this->t('{core:no_state:suggestions}') . '</h2>');
echo('<ul class="list-unstyled">');
echo '<li>' . $this->t('{core:no_state:suggestion_badlink}') . '</li>'; 
echo('<li>' . $this->t('{core:no_state:suggestion_goback}') . '</li>');
echo('<li>' . $this->t('{core:no_state:suggestion_closebrowser}') . '</li>');
echo('</ul>');

echo('<h3>' . $this->t('{core:no_state:causes}') . '</h3>');
echo('<ul class="list-unstyled">');
echo '<li>' . $this->t('{core:no_state:cause_badlink}') . '</li>'; 
echo('<li>' . $this->t('{core:no_state:cause_backforward}') . '</li>');
echo('<li>' . $this->t('{core:no_state:cause_openbrowser}') . '</li>');
echo('<li>' . $this->t('{core:no_state:cause_nocookie}') . '</li>');
echo('</ul>');

