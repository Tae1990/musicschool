<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')):
    throw new NotFoundException('Please replace src/Template/Pages/home.ctp with your own version.');
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
</head>
<body class="home">
    <header>
         <div class="header-image">

            <h1>MUSIC SCHOOL</h1>

        </div>
    </header>
    <div id="content">
        <div class="row">
            <div class="columns large-12 ctp-warning checks">

            </div>


            <div class="columns large-12 checks">
         <li><a target="_blank" href="http://localhost:133/musicschool/users/register">Register</a></li>
				 <li><a target="_blank" href="http://localhost:133/musicschool/users/login">Login</a></li>
				 <li><a target="_blank" href="http://localhost:133/musicschool/users">Contact us</a></li>
			   <li><a target="_blank" href="http://localhost:133/musicschool/users">Instrument rental</a></li>
			</div>

        <div class="row">
            <div class="columns large-6">
                <h3>Copyright</h3>
                <ul>
                    <li>To change the content of this page, edit: src/Template/Pages/home.ctp.</li>
                    <li>You can also add some CSS styles for your pages at: webroot/css/.</li>
                </ul>
            </div>

        </div>
        <hr/>

        <div class="row">

        </div>


    </div>
</body>
</html>
