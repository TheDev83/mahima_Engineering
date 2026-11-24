<?php
$title = "Contact Us";
ob_start();
?>
<div class="container contact-wrapper">
  <div class="row contact-card shadow-lg">

    <!-- LEFT SIDE -->
    <div class="col-md-6 contact-info">
      <h2>Get in Touch</h2>
      <p class="sub-text">We’d love to hear from you!</p>
      <p>If you have any inquiries or just want to say hi, please fill out the form.</p>

      <div class="contact-email">
        ✉ mahimaengineering@gmail.com <br>
        📞 +91 1111111111
      </div>

      <div class="social-icons mt-4">
        <span>👍</span>
        <span>📷</span>
        <span>🔗</span>
        <span>🐦</span>
      </div>
    </div>

    <!-- RIGHT SIDE FORM -->
    <div class="col-md-6">
      <form action="./server/save_contact.php" method="POST">

        <div class="row">
          <div class="col-md-6 mb-3">
            <label>First Name</label>
            <input type="text" name="first_name" class="form-control" required>
          </div>
          <div class="col-md-6 mb-3">
            <label>Last Name</label>
            <input type="text" name="last_name" class="form-control" required>
          </div>
        </div>

        <div class="mb-3">
          <label>Company Name</label>
          <input type="text" name="company_name" class="form-control">
        </div>

        <div class="mb-3">
          <label>Contact Number</label>
          <input type="tel" name="contact_number" class="form-control" placeholder="+91 XXXXX XXXXX" required>
        </div>

        <div class="mb-3">
          <label>Address</label>
          <textarea name="address" rows="2" class="form-control"></textarea>
        </div>

        <div class="mb-3">
          <label>Email *</label>
          <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
          <label>Message</label>
          <textarea name="message" rows="4" class="form-control" required></textarea>
        </div>

        <button type="submit" class="send-btn mt-3">Send Message</button>
        <button type="reset" class="rst-btn mt-3">Reset</button>
      </form>
    </div>

  </div>
</div>

<?php
include 'footer.php';
$content = ob_get_clean();
include 'base.php';
?>
