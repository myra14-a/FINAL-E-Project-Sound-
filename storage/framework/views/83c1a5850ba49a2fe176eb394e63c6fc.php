<?php $__env->startSection('content'); ?>
    
   <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact__address">
                        <div class="section-title">
                            <h2>Contact info</h2>
                        </div>
                        <p>We're here to help—reach out anytime.</p>
                        <ul>
                            <li>
                                <i class="fa fa-map-marker"></i>
                                <h5>Address</h5>
                                <p>Los Angeles Gournadi, 1230 Bariasl</p>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i>
                                <h5>Hotline</h5>
                                <span>1-677-124-44227</span>
                                <span>1-688-356-66889</span>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                <h5>Email</h5>
                                <p>soundsupport@gmail.com</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="contact__form">
                        <div class="section-title">
                            <h2>Get in touch</h2>
                        </div>
                        <p>Have a question, song request, or feedback? We'd love to hear from you. Connect with the BEATX team and 
                            we'll get back to you as soon as possible. </p>
                        <form action="/submit" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="input__list">
                                <input type="text" name="username" value="<?php echo e(old('username')); ?>" placeholder="Name" required>
                                <input type="email" name="useremail" value="<?php echo e(old('useremail')); ?>" placeholder="Email" required>
                                <input type="text" name="userreason" value="<?php echo e(old('userreason')); ?>" placeholder="Reason For Contact" required>
                            </div>
                            <textarea name="comment" placeholder="Comment" required><?php echo e(old('comment')); ?></textarea>
                            <button type="submit" class="site-btn">SEND MESSAGE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LAPVY\Desktop\FINAL-E-Project-Sound-\resources\views/user/contact.blade.php ENDPATH**/ ?>