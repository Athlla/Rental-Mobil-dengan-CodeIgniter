<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $judul; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/animate.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/notika-custom-icon.css">
</head>

<body>
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="<?= base_url(); ?>"><img src="<?= base_url(); ?>assets/img/logo/logo.png"></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">
                            <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-menus"></i></span></a>
                                <div role="menu" class="dropdown-menu message-dd task-dd animated bounceInDown">
                                    <div class="hd-mg-va">
                                        <a href="<?php echo base_url(); ?>site/logout">Sign Out</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap">
                        <li class="active"><a data-toggle="tab" href="#Home"></i> Transaksi</a>
                        </li>
                        <li><a data-toggle="tab" href="#merkmobil"></i> Merk Mobil</a>
                        </li>
                        <li><a data-toggle="tab" href="#mobil"></i> Mobil</a>
                        <li><a data-toggle="tab" href="#supir"></> Supir</a>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="Home" class="tab-pane in active notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="<?= base_url(); ?>transaksi">Data Transaksi</a>
                                </li>
                                <li><a href="<?= base_url(); ?>transaksi/add">Tambah Transaksi</a>
                                </li>
                            </ul>
                        </div>
                        <div id="merkmobil" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="<?= base_url(); ?>merk">Data Merk Mobil</a>
                                </li>
                                <li><a href="<?= base_url(); ?>merk/add">Tambah Data Merk Mobil</a>
                                </li>
                            </ul>
                        </div>
                        <div id="mobil" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="<?= base_url(); ?>mobil">Data Mobil</a>
                                </li>
                                <li><a href="<?= base_url(); ?>mobil/add">Tambah Data Mobil</a>
                                </li>
                            </ul>
                        </div>
                        <div id="supir" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="<?= base_url(); ?>supir">Data Supir</a>
                                </li>
                                <li><a href="<?= base_url(); ?>supir/add">Tambah Data Supir</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
