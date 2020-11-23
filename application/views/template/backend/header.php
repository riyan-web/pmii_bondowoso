<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?> - <?= $this->session->userdata['nama_komcab'] ?></title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="<?= base_url(); ?>apple-icon.png">
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/backend/images/favicon.ico">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/backend/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/backend/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/backend/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/backend/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/backend/vendors/selectFX/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="<?= base_url(); ?>assets/backend/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/backend/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"> -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/backend/coba/css/jquery.dataTables.css' ?>">





    <link rel="stylesheet" href="<?= base_url(); ?>assets/backend/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <!-- <script src="<?= base_url(); ?>assets/backend/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/backend/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/backend/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/backend/js/main.js"></script> -->
    <script type="text/javascript" src="<?= base_url() . 'assets/backend/coba/js/jquery.js' ?>"></script>
    <script type="text/javascript" src="<?= base_url() . 'assets/backend/vendors/bootstrap/dist/js/bootstrap.min.js' ?>"></script>
    <script type="text/javascript" src="<?= base_url() . 'assets/backend/coba/js/jquery.dataTables.js' ?>"></script>
    <script src="<?= base_url() . 'assets/backend/vendors/ckeditor/ckeditor.js' ?>"></script>
    <style>
        .info-box {
            display: block;
            min-height: 90px;
            background: #fff;
            width: 100%;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
            border-radius: 2px;
            margin-bottom: 15px;
        }

        .info-box small {
            font-size: 14px;
        }

        .info-box .progress {
            background: rgba(0, 0, 0, 0.2);
            margin: 5px -10px 5px -10px;
            height: 2px;
        }

        .info-box .progress,
        .info-box .progress .progress-bar {
            border-radius: 0;
        }

        .info-box .progress .progress-bar {
            background: #fff;
        }

        .info-box-icon {
            border-top-left-radius: 2px;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 2px;
            display: block;
            float: left;
            height: 90px;
            width: 90px;
            text-align: center;
            font-size: 45px;
            line-height: 90px;
            background: rgba(0, 0, 0, 0.2);
        }

        .info-box-icon>img {
            max-width: 100%;
        }

        .info-box-content {
            padding: 5px 10px;
            margin-left: 90px;
        }

        .info-box-number {
            display: block;
            font-weight: bold;
            font-size: 18px;
        }

        .progress-description,
        .info-box-text {
            display: block;
            font-size: 14px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .info-box-text {
            text-transform: uppercase;
        }

        .info-box-more {
            display: block;
        }


        .alert {
            border-radius: 3px;
        }

        .alert h4 {
            font-weight: 600;
        }

        .alert .icon {
            margin-right: 10px;
        }

        .alert .close {
            color: #000;
            opacity: 0.2;
            filter: alpha(opacity=20);
        }

        .alert .close:hover {
            opacity: 0.5;
            filter: alpha(opacity=50);
        }

        .alert a {
            color: #fff;
            text-decoration: underline;
        }

        .alert-success {
            border-color: #008d4c;
        }

        .alert-danger,
        .alert-error {
            border-color: #d73925;
        }

        .alert-warning {
            border-color: #e08e0b;
        }

        .alert-info {
            border-color: #00acd6;
        }

        .alert-danger,
        .alert-error {
            background-color: #dd4b39 !important;
        }

        .bg-yellow,
        .alert-warning,
        .label-warning {
            background-color: #f39c12 !important;
        }

        .bg-aqua,
        .alert-info {
            background-color: #00c0ef !important;
        }

        .alert-success,
        .alert-danger,
        .alert-error,
        .alert-warning,
        .alert-info {
            color: #fff !important;
        }
    </style>
</head>