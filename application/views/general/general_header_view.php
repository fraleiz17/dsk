
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title><?php echo isset($title) ? $title . ' - ' : '' ?> Quierounperro</title>
        <link rel="shortcut icon" href="<?php echo base_url() ?>images/ico.ico" />
        <link rel="stylesheet" href="<?php echo base_url() ?>css/jPages.css"/>
        
        <link href="<?php echo base_url() ?>css/uploadfile.css" rel="stylesheet"/>

        <?php if (isset($links)): ?>
            <?php foreach ($links as $l): ?>
                <link rel="stylesheet" href="<?php echo base_url() ?>css/<?php echo $l ?>.css"/>
            <?php endforeach; ?>
        <?php endif; ?>

        <script type="text/javascript" src="<?php echo base_url() ?>js/jquery-1.8.2.min.js"></script>
        <script src="<?php echo base_url() ?>js/jquery-ui.js"></script>
        <script src="<?php echo base_url() ?>js/jPages.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/jquery.cycle.all.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/validator/languages/jquery.validationEngine-es.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/validator/jquery.validationEngine.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/jquery.uploadfile.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>js/funcion_select.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>js/jquery.customSelect.js"></script>
        

        <?php if (isset($scripts)): ?>
            <?php foreach ($scripts as $s): ?>
                <?php if (strpos($s, 'http://') === false) : ?>
                    <script type="text/javascript" src="<?php echo base_url() ?>js/<?php echo $s ?>.js"></script>
                <?php else: ?>
                    <script type="text/javascript" src="<?php echo $s ?>"></script>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>

        <script>
            if (navigator.userAgent.toLowerCase().indexOf('chrome') > -1) {

                document.write('<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/index_.css" media="screen"></link> <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/general.css" media="screen"></link> ');
            }
            if (navigator.appName == "Microsoft Internet Explorer") {

                document.write('<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/index_explorer.css" media="screen"></link>');
            }
        </script>

