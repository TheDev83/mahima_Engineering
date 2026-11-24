
<?php
$title = "Get your Quote";

ob_start();
?>
<section class="quote-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="quote-box">
                    <h3 class="mb-3 text-center">Request a Quotation</h3>
                    <p class="text-center text-muted mb-4">
                        Fill in your requirements and we’ll contact you shortly.
                    </p>

                    <form action="./server/submit_quote.php" method="POST" enctype="multipart/form-data">

                        <!-- Name -->
                        <div class="mb-3">
                            <label class="form-label">Full Name *</label>
                            <input type="text" name="full_name" class="form-control" required>
                        </div>

                        <!-- Company -->
                        <div class="mb-3">
                            <label class="form-label">Company Name</label>
                            <input type="text" name="company_name" class="form-control">
                        </div>

                        <!-- Email & Phone -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email *</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone *</label>
                                <input type="tel" name="phone" class="form-control" required>
                            </div>
                        </div>

                        <!-- Service -->
                        <div class="mb-3">
                            <label class="form-label">Service Required *</label>
                            <select name="service_type" class="form-select" required>
                                <option value="">Select Service</option>
                                <option>CNC Machining</option>
                                <option>Fabrication</option>
                                <option>Laser Cutting</option>
                                <option>Assembly</option>
                                <option>Other</option>
                            </select>
                        </div>

                        <!-- Material & Quantity -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Material</label>
                                <input type="text" name="material" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Quantity</label>
                                <input type="number" name="quantity" class="form-control">
                            </div>
                        </div>

                        <!-- Delivery -->
                        <div class="mb-3">
                            <label class="form-label">Expected Delivery Date</label>
                            <input type="date" name="delivery_date" class="form-control">
                        </div>

                        <!-- Message -->
                        <div class="mb-3">
                            <label class="form-label">Project Details</label>
                            <textarea name="message" rows="4" class="form-control"></textarea>
                        </div>

                        <!-- File -->
                        <div class="mb-4">
                            <label class="form-label">Upload Drawing (PDF / DWG)</label>
                            <input type="file" name="file" class="form-control">
                        </div>

                        <!-- Submit -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                Submit Quote Request
                            </button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();

include 'base.php';
?>

