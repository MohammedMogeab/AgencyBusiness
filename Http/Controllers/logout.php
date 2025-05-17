<?php

use core\App;
use core\Database;
require base_path('vendor/autoload.php');
session_start();
session_destroy();
header("Location: /");
