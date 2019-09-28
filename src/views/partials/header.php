<?php
/** @var \StanimiraNikolova\Core\ViewInterface $this */ ;
/** @var  \StanimiraNikolova\Models\View\Home\HomeViewModel $model */
$uriJunk = isset($uriJunk) ? $uriJunk : '';

?>

<!DOCTYPE html>
<html lang="en" class="ie8 no-js"> <![endif]-->
<html lang="en" class="ie9 no-js"> <![endif]-->
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Stanimira Nikolova</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $uriJunk?>src/images/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $uriJunk?>src/css/styles.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $uriJunk?>node_modules/font-awesome/css/font-awesome.min.css">

</head>
<body>

<input type="checkbox" name="main-nav-toggle" id="main-nav-toggle">
<header>
    <label id="toggle" for="main-nav-toggle"><i class="fa fa-bars"></i></label>

    <nav class="main">
        <ul>
            <?php foreach ($model->getMenu() as $key => $value) :?>
                <?php if (is_array($value)) : ?>
                    <li>
                        <?php

                            $keyData = array_keys($value);
                            $keyData = isset($keyData[0]) ? $keyData[0] : '';

                            $valueData = array_values($value);
                            $valueData = isset($valueData[0]) ? $valueData[0] : [];
                            $valueData = array_keys($valueData);
                            $valueData = isset($valueData[0]) ? $valueData[0] : '';
                        ?>
                        <a class="<?= ($key === $model->getActive()) ? 'active' : ''?>" href="<?php echo $this->uri('home', 'index', [$key, $valueData])?>"><?=$keyData?></a>
                        <ul>
                            <?php foreach ($value[$keyData] as $subKey => $subValue) :?>
                                <li>
                                    <a class="<?= ($subKey === $model->getSubActive()) ? 'active' : ''?>" href="<?php echo $this->uri('home', 'index', [$key, $subKey])?>"><?=$subValue?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php else: ?>
                    <li><a class="<?= ($key === $model->getActive()) ? 'active' : ''?>" href="<?php echo $this->uri('home', 'index', [$key])?>"><?=$value ?></a></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>
