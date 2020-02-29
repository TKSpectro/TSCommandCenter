<?php
User::getInstance()->logout();
header('Location: '.APP_URL);