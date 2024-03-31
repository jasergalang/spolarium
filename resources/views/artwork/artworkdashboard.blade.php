<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artist Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<!-- Navbar
<nav class="navbar navbar-expand-lg navbar-dark bg-gray-800">
    <div class="container">
        <a class="navbar-brand" href="#">Artist Dashboard</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav> -->

<!-- Main Content -->
<div class="container mx-auto mt-8">
    <!-- Artworks Table -->
    <table id="artworkTable" class="table table-bordered table-hover">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th>Name of Artwork</th>
                <th>Price</th>
                <th>Description</th>
                <th>Category</th>
                <th>Dimensions</th>
                <th>Actions</th> <!-- Added column for CRUD actions -->
            </tr>
        </thead>
        <tbody>
            <!-- Populate your table with data dynamically -->
            <tr>
                <td>Artwork 1</td>
                <td>$100</td>
                <td>Description of Artwork 1</td>
                <td>Painting</td>
                <td>24"x36"</td>
                <td class="text-center">
                    <button class="btn btn-sm btn-primary me-2" data-bs-toggle="modal" data-bs-target="#showArtworkModal"><i class="fas fa-eye"></i> Show</button>
                    <button class="btn btn-sm btn-primary me-2"><i class="fas fa-edit"></i> Edit</button>
                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</button>
                </td>
            </tr>
            <tr>
                <td>Artwork 2</td>
                <td>$150</td>
                <td>Description of Artwork 2</td>
                <td>Digital Art</td>
                <td>1200x800px</td>
                <td class="text-center">
                    <button class="btn btn-sm btn-primary me-2" data-bs-toggle="modal" data-bs-target="#showArtworkModal"><i class="fas fa-eye"></i> Show</button>
                    <button class="btn btn-sm btn-primary me-2"><i class="fas fa-edit"></i> Edit</button>
                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</button>
                </td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table>

    <!-- Add Artwork Button -->
    <button class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#addArtworkModal"><i class="fas fa-plus"></i> Add Artwork</button>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- Initialize DataTables -->
<script>
    $(document).ready(function() {
        $('#artworkTable').DataTable();
    });
</script>

<!-- Show Artwork Modal -->
<div class="modal fade" id="showArtworkModal" tabindex="-1" aria-labelledby="showArtworkModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showArtworkModalLabel">Artwork</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="https://via.placeholder.com/800x600" class="img-fluid rounded" alt="Artwork">
            </div>
        </div>
    </div>
</div>
</body>
</html>
