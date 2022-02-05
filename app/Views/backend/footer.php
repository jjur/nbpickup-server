
<!-- Main Footer -->
<footer class="main-footer">
    <div class="container">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">

        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2021 <a href="https://nbpickup.com">nbpickup</a>.</strong> All rights reserved.
    </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url(); ?>/assets_admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>/assets_admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?= base_url(); ?>/assets_admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- dropzonejs -->
<script src="<?= base_url(); ?>/assets_admin/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>/assets_admin/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url(); ?>/assets_admin/js/demo.js"></script>
<!-- CodeMirror -->
<script src="<?= base_url(); ?>/assets_admin/plugins/codemirror/codemirror.js"></script>
<script src="<?= base_url(); ?>/assets_admin/plugins/codemirror/mode/python/python.js"></script>

<script src="<?= base_url(); ?>/assets_admin/plugins/moment/moment.min.js"></script>
<script src="<?= base_url(); ?>/assets_admin/plugins/inputmask/jquery.inputmask.min.js"></script>

<script src="<?= base_url(); ?>/assets_admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script>
    $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })</script>
<script>
    $(function () {
        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "python",
            theme: "monokai"
        }).setSize(null,110);
    })
</script>
<script>
    $(function () {
        //Date and time picker
        $('#a_deadline').datetimepicker({ icons: { time: 'far fa-clock' } });


    })




</script>
<script>
    $(".binder_secure").click(function(e){
        e.preventDefault();
        jQuery.ajax({
            type: "GET",
            async: true,
            dataType: "json",
            url: "<?= base_url("Assignments/get_token/". ($id??"0"));?>",
            data: "",
            success: function(response){
                navigator.clipboard.writeText(response["token"]);
                prompt("Please copy this token and paste it inside of Binder to authenticate your session. This token is valid for next 6 hours. Hint: Press CTRL+C", response["token"]);
                window.open($(e.target.parentElement).attr('href'), '_blank').focus();
            }
        });
        });
</script>
<!-- <script>
    // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false

    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    var previewNode = document.querySelector("#template")
    previewNode.id = ""
    var previewTemplate = previewNode.parentNode.innerHTML
    previewNode.parentNode.removeChild(previewNode)

    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
        url: "/target-url", // Set the url
        thumbnailWidth: 80,
        thumbnailHeight: 80,
        parallelUploads: 20,
        previewTemplate: previewTemplate,
        autoQueue: false, // Make sure the files aren't queued until manually added
        previewsContainer: "#previews", // Define the container to display the previews
        clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    })

    myDropzone.on("addedfile", function(file) {
        // Hookup the start button
        file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
    })

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
    })

    myDropzone.on("sending", function(file) {
        // Show the total progress bar when upload starts
        document.querySelector("#total-progress").style.opacity = "1"
        // And disable the start button
        file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
    })

    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
        document.querySelector("#total-progress").style.opacity = "0"
    })

    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function() {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
    }
    document.querySelector("#actions .cancel").onclick = function() {
        myDropzone.removeAllFiles(true)
    }
    // DropzoneJS Demo Code End
</script>-->
</body>
</html>