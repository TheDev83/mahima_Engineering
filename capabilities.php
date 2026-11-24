<?php
$title = "our capability";
// $page_css = "./style/capabilities.css";
ob_start();
?>
<!-- CNC BANNER MODULE -->
 <!-- capability section -->
<section class="cnc-banner">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-md-7">
        <div class="banner-content">
          <h1 class="banner-title animate-text">
            Our CNC<br>
            Manufacturing<br>
            Capabilities
          </h1>

          <p class="banner-subtitle animate-text delay-1">
            Get custom milled parts for rapid prototyping and mass production.
          </p>

          <a href="quote.php" class="btn banner-btn animate-text delay-2">
            Get a Quote
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
      <!-- capability section 1 -->
<section class="cnc-modern py-5">
  <div class="container">
    <div class="row align-items-center gy-5">

      <!-- LEFT CONTENT -->
      <div class="col-lg-6">
        <span class="cnc-badge">Precision Engineering</span>
        <h2 class="cnc-title mt-3">CNC Turning</h2>

        <p class="cnc-text mt-4">
          Our CNC turning and lathe services deliver precision-crafted components
          with consistent quality. Whether it's a prototype or mass production,
          we ensure accuracy, reliability, and fast turnaround.
        </p>

        <div class="cnc-points mt-4">
          <div class="point-item">
            <span class="dot"></span>
            Handles multiple industrial-grade materials
          </div>
          <div class="point-item">
            <span class="dot"></span>
            One-off & large-scale production capability
          </div>
          <div class="point-item">
            <span class="dot"></span>
            Competitive pricing with fast delivery
          </div>
        </div>
      </div>

      <!-- RIGHT IMAGE -->
      <div class="col-lg-6">
        <div class="cnc-image-box">
          <img src="./images/CA2.webp" alt="CNC Turning">
        </div>
      </div>

    </div>
  </div>
</section>

      <!-- capability section 2 -->

<section class="cnc-milling">
  <div class="container">
    <div class="row align-items-center g-5">

      <!-- LEFT IMAGE -->
      <div class="col-lg-6">
        <div class="milling-image-box">
          <img src="./images/CA3.webp"
               alt="CNC Milling Process">
        </div>
      </div>

      <!-- RIGHT CONTENT -->
      <div class="col-lg-6">
        <h2 class="milling-title">CNC Milling</h2>

        <p class="milling-text">
          CNC Milling is a machining process that uses computer-controlled
          rotary cutting tools to remove material from a workpiece. The
          process allows the creation of very precise shapes and features.
        </p>

        <p class="milling-text">
          Our CNC milling services use the latest technology and advanced
          equipment to deliver highly accurate, detailed components across
          a wide range of materials.
        </p>

        <div class="milling-points">
          <div class="milling-point">
            <div class="milling-icon"></div>
            It's great for small or large metal and plastic parts.
          </div>

          <div class="milling-point">
            <div class="milling-icon"></div>
            Great for complex and simple shapes.
          </div>

          <div class="milling-point">
            <div class="milling-icon"></div>
            Offers a variety of surface finishes.
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

    <!-- capability section 3 -->

<section class="cnc-modern py-5">
  <div class="container">
    <div class="row align-items-center gy-5">

      <!-- LEFT CONTENT -->
      <div class="col-lg-6">
        
        <h2 class="cnc-title mt-3"> 4 Axis CNC Machining</h2>

        <p class="cnc-text mt-4">
          A 4-axis CNC machine is a computer-controlled machining tool
           that can perform 4-axis machining operations. 4-axis machining
            refers to the ability of the machine to move in 4 
            different axes: X, Y, Z, and B. This allows for
             more complex machining operations to be performed
              than with a traditional 3-axis CNC machine.
        </p>

        <div class="cnc-points mt-4">
          <div class="point-item">
            <span class="dot"></span>
            Greater flexibility and accuracy.
          </div>
          <div class="point-item">
            <span class="dot"></span>
            Used to produce parts with complex shapes.
          </div>
          <div class="point-item">
            <span class="dot"></span>
            Faster and more efficient.
          </div>
        </div>
      </div>

      <!-- RIGHT IMAGE -->
      <div class="col-lg-6">
        <div class="cnc-image-box">
          <img src="./images/CA5.jpg" alt="4 axis CNC milling">
        </div>
      </div>

    </div>
  </div>
</section>


<?php
include 'footer.php';
$content = ob_get_clean();
include 'base.php';

?>
