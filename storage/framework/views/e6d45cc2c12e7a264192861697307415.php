<?php $__env->startSection('content'); ?>

<style>
    .video-upload-page {
        min-height: 100vh;
        padding: 40px 25px;
        background: #09070D;
        color: #F8F5FF;
        font-family: Arial, sans-serif;
    }

    .video-breadcrumb {
        color: #A99ABF;
        font-size: 14px;
        margin-bottom: 25px;
    }

    .video-breadcrumb span {
        color: #D45CFF;
    }

    .video-page-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 30px;
    }

    .video-page-heading h2 {
        font-size: 30px;
        font-weight: 700;
        margin: 0 0 8px;
        color: #FFFFFF;
    }

    .video-page-heading p {
        color: #A99ABF;
        margin: 0;
        font-size: 15px;
    }

    .video-upload-card {
        max-width: 760px;
        margin: 0 auto;
        padding: 32px;
        background: linear-gradient(145deg, #17111F, #0E0B13);
        border: 1px solid #302239;
        border-radius: 18px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
    }

    .video-card-heading {
        font-size: 21px;
        font-weight: 600;
        margin-bottom: 8px;
        color: #FFFFFF;
    }

    .video-card-description {
        color: #A99ABF;
        font-size: 14px;
        margin-bottom: 28px;
    }

    .video-file-area {
        display: block;
        text-align: center;
        padding: 30px 20px;
        border: 2px dashed #684080;
        border-radius: 12px;
        background: rgba(174, 60, 240, 0.06);
        margin-bottom: 25px;
        cursor: pointer;
        transition: 0.3s ease;
    }

    .video-file-area:hover {
        border-color: #D45CFF;
        background: rgba(174, 60, 240, 0.12);
    }

    .video-upload-icon {
        font-size: 38px;
        color: #D45CFF;
        margin-bottom: 12px;
    }

    .video-file-title {
        display: block;
        font-size: 16px;
        font-weight: 600;
        color: #FFFFFF;
        margin-bottom: 8px;
    }

    .video-file-help {
        display: block;
        font-size: 13px;
        color: #A99ABF;
    }

    .video-file-input {
        display: block;
        width: 100%;
        margin-top: 18px;
        color: #D9CDE5;
        font-size: 13px;
    }

    .video-form-label {
        display: block;
        margin-bottom: 10px;
        color: #E8DDF2;
        font-size: 14px;
        font-weight: 600;
    }

    .video-name-input {
        width: 100%;
        box-sizing: border-box;
        padding: 14px 16px;
        margin-bottom: 24px;
        background: #0B0810;
        border: 1px solid #3B2B47;
        border-radius: 8px;
        color: #FFFFFF;
        font-size: 15px;
        outline: none;
        transition: 0.3s ease;
    }

    .video-name-input::placeholder {
        color: #8F819B;
    }

    .video-name-input:focus {
        border-color: #C53FEA;
        box-shadow: 0 0 0 3px rgba(197, 63, 234, 0.12);
    }

    .video-submit-btn {
        width: 100%;
        padding: 15px;
        border: none;
        border-radius: 9px;
        background: linear-gradient(90deg, #A83CF0, #E83EC9);
        color: #FFFFFF;
        font-size: 16px;
        font-weight: 700;
        cursor: pointer;
        transition: 0.3s ease;
    }

    .video-submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 22px rgba(197, 63, 234, 0.25);
    }

    .video-upload-note {
        margin-top: 20px;
        color: #8F819B;
        font-size: 12px;
        text-align: center;
    }

    @media (max-width: 576px) {
        .video-upload-page {
            padding: 25px 15px;
        }

        .video-upload-card {
            padding: 22px 18px;
        }

        .video-page-heading h2 {
            font-size: 25px;
        }
    }
</style>

<div class="video-upload-page">

    <div class="video-breadcrumb">
        Administrator / <span>Videos / Upload</span>
    </div>

    <div class="video-page-heading">
        <div>
            <h2>Video Upload</h2>
            <p>Upload and manage your video content.</p>
        </div>
    </div>

    <div class="video-upload-card">

        <h3 class="video-card-heading">
            Upload New Video
        </h3>

        <p class="video-card-description">
            Select a video file and enter a name to upload it.
        </p>

        <form action="/videoupload"
              method="POST"
              enctype="multipart/form-data">

            <?php echo csrf_field(); ?>

            <label for="video" class="video-file-area">

                <div class="video-upload-icon">
                    <i class="fas fa-cloud-upload-alt"></i>
                </div>

                <span class="video-file-title">
                    Choose Video File
                </span>

                <span class="video-file-help">
                    Select a video from your computer
                </span>

                <input
                    type="file"
                    name="video"
                    id="video"
                    class="video-file-input"
                    accept="video/*"
                    required
                >

            </label>

            <label for="name" class="video-form-label">
                Video Name
            </label>

            <input
                type="text"
                name="name"
                id="name"
                class="video-name-input"
                placeholder="Enter video name..."
                required
            >

            <button type="submit"
                    name="submit"
                    class="video-submit-btn">

                <i class="fas fa-cloud-upload-alt"></i>
                &nbsp; Upload Video

            </button>

        </form>

        <div class="video-upload-note">
            Please select your video file before uploading.
        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LAPVY\Desktop\FINAL-E-Project-Sound-\resources\views/admin/video uploading.blade.php ENDPATH**/ ?>