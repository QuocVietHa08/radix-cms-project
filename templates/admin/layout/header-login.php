<?php
if (!defined('_INCODE')) die('Access Deined...');
autoRemoveTokenLogin();
?>
<html>
<title>
    <?php echo !empty($data['pageTitle']) ? $data['pageTitle'] : 'Edward Ha' ?>
</title>
<meta charset="utf-8" />
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> -->
<link rel="stylesheet" href="<?php echo _WEB_HOST_ADMIN_TEMPLATE ?>/assets/plugins/fontawesome-free/css/all.min.css">

<link rel="stylesheet" href="<?php echo _WEB_HOST_ADMIN_TEMPLATE ?>/assets/css/adminlte.min.css">
<link type="text/css" ref="stylesheet" href="<?php echo _WEB_HOST_ADMIN_TEMPLATE ?>/assets/css/auth.css?ver=<?php echo rand(); ?>" />

</html>

<body>
