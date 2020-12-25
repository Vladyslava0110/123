<?php

RewriteEngine on

#If a directory or a file exists, use it directory
RewriteCond %{RRQUEST_FILENAME} !-f
RewriteCond %{RRQUEST_FILENAME} !-d
#otherwise forwsrd it to index.php
RewriteRule . index.php