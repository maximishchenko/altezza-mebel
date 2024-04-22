<?php

use frontend\assets\AppAsset;
use frontend\modules\content\models\Lead;
use frontend\modules\content\models\Question;
use yii\bootstrap5\Html;
use frontend\modules\seo\models\MetaTag;
use frontend\modules\seo\models\Script;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?= Html::csrfMetaTags() ?>
    <?php $this->registerCsrfMetaTags() ?>

    <?php
    $metaTag = new MetaTag();
    $h1title = $metaTag->setH1Title();
    $metaTag->setMetaTags();
    if (isset($this->blocks['metaTags'])) { 
        echo $this->blocks['metaTags'];
    } else {
        $metaTag->setMetaTags();
    }
    ?>
    <title>
        <?= Html::encode($this->title) ?>
    </title>

    <?php $this->head() ?>

    <?php Yii::$app->view->registerLinkTag(['rel' => 'canonical', 'href' => Url::canonical()]); ?>

    <!-- Скрипты перед </head> -->
    <?php Script::getScripts(Script::BEFORE_END_HEAD); ?>
</head>
<body>
<?php $this->beginBody() ?>

<!-- Скрипты после <body> -->
<?php Script::getScripts(Script::AFTER_BEGIN_BODY); ?>

<header class="header">
    <?= $this->render('//layouts/template/_header', []); ?>
</header>

<main role="main">
    <div class="container">    
        <!-- "Хлебные крошки" -->
        <?= $this->render('//layouts/template/_breadcrumbs'); ?>

        <?= $h1title; ?>

        <?php if(!empty($metaTag->setDescriptionSnippet())): ?>
            <p class="description__block">
                <?= $metaTag->setDescriptionSnippet(); ?>
            </p>
        <?php endif; ?>

        <?= $content ?>

        <?php $questions = Question::getDb()->cache(function() {
                return Question::find()->active()->ordered()->all();
            }); ?>
            
        <?= $this->render('//layouts/include/_faq', ['questions' => $questions]); ?>

        <?php $lead = new Lead(); ?>
        <?= $this->render('//layouts/include/_contact_inline', ['lead' => $lead]); ?>
        <?= $this->render("//layouts/include/_contact_modal", ['lead' => $lead]); ?>
        <?php
        
        if (isset($this->blocks['custom_map'])) {
            echo $this->blocks['custom_map'];
        }
        ?>
    </div>
</main>

<footer class="footer">
    <?= $this->render('//layouts/template/_footer', []); ?>
</footer>

<!-- Скрипты перед </body> -->
<?php Script::getScripts(Script::BEFORE_END_BODY); ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
