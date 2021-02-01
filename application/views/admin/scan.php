<html>

<head>
    <meta charset="UTF-8">
    <title>Login with Qrcode</title>
    <style>
        .sidebar {
            width: 350px;
            margin: auto;
            padding: 10px
        }

        .camera {
            width: 610px;
            margin: auto;
        }
    </style>
    <script src="<?= base_url(); ?>assets/backend/js/scanner/js/jquery-3.4.1.min.js"></script>
    <!-- scanner -->
    <script src="<?= base_url(); ?>assets/backend/js/scanner/modernizr/modernizr.js"></script>
    <script src="<?= base_url(); ?>assets/backend/js/scanner/vue/vue.min.js"></script>
</head>

<body>

    <!-- scan -->
    <div id="app" class="row box">
        <div class="col-md-4 col-md-offset-4 sidebar">
            <ul>
                <li v-if="cameras.length === 0" class="empty">No cameras found</li>
                <li v-for="camera in cameras">
                    <span v-if="camera.id == activeCameraId" :title="formatName(camera.name)" class="active"><input type="radio" class="align-middle mr-1" checked> {{ formatName(camera.name) }}</span>
                    <span v-if="camera.id != activeCameraId" :title="formatName(camera.name)">
                        <a @click.stop="selectCamera(camera)"> <input type="radio" class="align-middle mr-1">@{{ formatName(camera.name) }}</a>
                    </span>
                </li>
            </ul>
            <div class="clearfix"></div>
            <?= $this->session->flashdata('message'); ?>
            <!-- form scan -->
            <form action="<?= base_url('login/scan'); ?>" method="POST" id="myForm">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border"> Form Scan </legend>
                    <input type="text" name="qrcode" id="code" autofocus>
                </fieldset>
            </form>
        </div>
        <div class="col-xs-12 preview-container camera">
            <video id="preview" class="thumbnail"></video>
        </div>
    </div>
    <!-- scanner -->
    <script src="<?= base_url(); ?>assets/backend/js/scanner/js/app.js"></script>
    <script src="<?= base_url(); ?>assets/backend/js/scanner/instascan/instascan.min.js"></script>
    <script src="<?= base_url(); ?>assets/backend/js/scanner/js/scanner.js"></script>
</body>

</html>