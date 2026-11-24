<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

/* PAGINATION */
$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1);
$offset = ($page - 1) * $limit;

$countRes = mysqli_query($conn, "SELECT COUNT(*) total FROM Clientquotations");
$total = mysqli_fetch_assoc($countRes)['total'];
$totalPages = ceil($total / $limit);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Dashboard | Mahima Engg</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

<style>
/* YOUR CSS – UNCHANGED */
*{margin:0;padding:0;box-sizing:border-box;font-family:'Inter',sans-serif;}
body{background:#f5f7fb;color:#1f2937;}
.wrapper{display:flex;min-height:100vh;}
.sidebar{width:260px;background:#111827;padding:24px;position:fixed;height:100vh;}
.brand{display:flex;align-items:center;gap:12px;margin-bottom:30px;text-decoration:none;}
.brand img{width:42px;background:#fff;padding:6px;border-radius:10px;}
.brand span{color:#fff;font-weight:600;}
.sidebar a{display:flex;align-items:center;gap:12px;color:#cbd5e1;padding:12px 14px;text-decoration:none;border-radius:10px;margin-bottom:6px;cursor:pointer;}
.sidebar a:hover,.sidebar a.active{background:#1f2937;color:#fff;}
.main{margin-left:260px;padding:30px;width:100%;}
.topbar{background:#fff;padding:18px 22px;border-radius:14px;display:flex;justify-content:space-between;box-shadow:0 8px 20px rgba(0,0,0,.06);}
.section{background:#fff;padding:30px;border-radius:18px;margin-top:30px;box-shadow:0 15px 35px rgba(0,0,0,.08);display:none;}
.section.active{display:block;}
@media(max-width:900px){
.sidebar{position:relative;width:100%;height:auto;}
.main{margin-left:0;}
}
</style>
</head>

<body>
<div class="wrapper">

<!-- SIDEBAR -->
<aside class="sidebar">
<a href="../index.php" class="brand">
<img src="../images/mEE.png">
<span>Mahima Engg</span>
</a>

<a class="active" onclick="showSection('dashboard',this)">
<i class="fa fa-home"></i> Dashboard
</a>

<a onclick="showSection('quotation',this)">
<i class="fa fa-file"></i> Quotations
</a>

<a onclick="showSection('contact',this)">
<i class="fa fa-address-book"></i> Contacts
</a>

<!-- ✅ BILLING MENU -->
<a onclick="showSection('billing',this)">
<i class="fa fa-receipt"></i> Billing
</a>

<a href="logout.php">
<i class="fa fa-sign-out-alt"></i> Logout
</a>
</aside>

<!-- MAIN -->
<main class="main">

<!-- DASHBOARD -->
<div id="dashboard" class="section active">

<div class="topbar">
<h5>Welcome, <?= htmlspecialchars($_SESSION['user']) ?></h5>
<a href="logout.php" class="btn btn-sm btn-outline-danger">Logout</a>
</div>

<h5 class="mt-4">Recent 7 Days Quotations</h5>

<input type="text" class="form-control mb-3"
placeholder="Search..."
onkeyup="tableSearch(this,'dashTable')">

<div class="table-responsive">
<table class="table table-bordered" id="dashTable">
<thead class="table-primary text-center">
<tr>
<th>Name</th><th>Email</th><th>Phone</th><th>Service</th><th>File</th><th>Date</th>
</tr>
</thead>
<tbody>
<?php
$r=mysqli_query($conn,"
SELECT * FROM Clientquotations
WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)
ORDER BY created_at DESC
");
while($row=mysqli_fetch_assoc($r)){
?>
<tr>
<td><?= $row['full_name'] ?></td>
<td><?= $row['email'] ?></td>
<td><?= $row['phone'] ?></td>
<td><?= $row['service_type'] ?></td>
<td>
<?php if($row['file_path']){ ?>
<a target="_blank" href="../server/uploads/<?= basename($row['file_path']) ?>" class="btn btn-sm btn-outline-primary">View</a>
<?php } else echo "-"; ?>
</td>
<td><?= date('d M Y',strtotime($row['created_at'])) ?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>

<!-- ALL QUOTATIONS -->
<div id="quotation" class="section">
<h5>All Quotations</h5>
<input type="text" class="form-control mb-3"
placeholder="Search..."
onkeyup="tableSearch(this,'quoteTable')">
<div class="table-responsive">
<table class="table table-bordered" id="quoteTable">
<thead class="table-dark text-center">
<tr>
<th>Name</th><th>Email</th><th>Phone</th><th>Service</th><th>File</th><th>Action</th>
</tr>
</thead>
<tbody>
<?php
$q=mysqli_query($conn,"SELECT * FROM Clientquotations ORDER BY created_at DESC LIMIT $limit OFFSET $offset");
while($row=mysqli_fetch_assoc($q)){
?>
<tr>
<td><?= $row['full_name'] ?></td>
<td><?= $row['email'] ?></td>
<td><?= $row['phone'] ?></td>
<td><?= $row['service_type'] ?></td>
<td>
<?php if($row['file_path']){ ?>
<a target="_blank" class="btn btn-sm btn-outline-primary"
href="../server/uploads/<?= basename($row['file_path']) ?>">View</a>
<?php } ?>
</td>
<td>
<button class="btn btn-sm btn-primary"
onclick="alert(`<?= $row['full_name'] ?>\n<?= $row['email'] ?>\n<?= $row['phone'] ?>`)">
Details
</button>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>

<!-- CONTACTS -->
<div id="contact" class="section">
<h5>All Contacts</h5>
<input type="text" class="form-control mb-3"
placeholder="Search..."
onkeyup="tableSearch(this,'contactTable')">
<div class="table-responsive">
<table class="table table-striped" id="contactTable">
<thead class="table-dark">
<tr>
<th>Name</th><th>Company</th><th>Email</th><th>Phone</th><th>Action</th>
</tr>
</thead>
<tbody>
<?php
$c=mysqli_query($conn,"SELECT * FROM contacts ORDER BY created_at DESC");
while($row=mysqli_fetch_assoc($c)){
?>
<tr>
<td><?= $row['first_name'].' '.$row['last_name'] ?></td>
<td><?= $row['company_name'] ?></td>
<td><?= $row['email'] ?></td>
<td><?= $row['contact_number'] ?></td>
<td>
<button class="btn btn-sm btn-primary"
onclick="alert(`<?= $row['email'] ?>`)">
Details
</button>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>

<!-- ✅ BILLING SECTION (BLANK FOR NOW) -->
<div id="billing" class="section">
<h5>Billing</h5>
<p class="text-muted">Billing module will be added here.</p>
</div>

</main>
</div>

<script>
function showSection(id,el){
document.querySelectorAll('.section').forEach(s=>s.classList.remove('active'));
document.getElementById(id).classList.add('active');
document.querySelectorAll('.sidebar a').forEach(a=>a.classList.remove('active'));
el.classList.add('active');
}

function tableSearch(input, tableId){
let filter = input.value.toLowerCase();
let rows = document.querySelectorAll(`#${tableId} tbody tr`);
rows.forEach(row=>{
row.style.display = row.innerText.toLowerCase().includes(filter) ? '' : 'none';
});
}
</script>

</body>
</html>
