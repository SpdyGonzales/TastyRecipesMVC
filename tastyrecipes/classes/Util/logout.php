<?php
session_start();
session_destroy();

header("Location: ../../resources/views/index.php");