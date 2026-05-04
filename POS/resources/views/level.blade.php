<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Master Level</title>
    
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { 
            font-family: 'Segoe UI', Arial, sans-serif; 
            background-color: #f5f5f5;
            padding: 20px;
        }
        
        .container {
            max-width: 900px;
            margin: 0 auto;
        }
        
        .card {
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            border: none;
        }
        
        .table-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        h1 {
            color: #333;
            margin-bottom: 30px;
            font-weight: bold;
        }
        
        .badge {
            font-size: 12px;
            padding: 6px 12px;
        }
        
        table tbody tr:hover {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1><i class="fas fa-list"></i> Data Master Level</h1>
        
        <div class="card">
            <div class="card-header table-header">
                <h5 class="mb-0">Daftar Level ({{ count($data) }} data)</h5>
            </div>
            <div class="card-body">
                @if (count($data) > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th width="50">No</th>
                                    <th width="80">ID</th>
                                    <th width="100">Kode</th>
                                    <th>Nama Level</th>
                                    <th width="120">Created At</th>
                                    <th width="120">Updated At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $index => $level)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td><span class="badge bg-primary">{{ $level->id }}</span></td>
                                        <td><span class="badge bg-info">{{ $level->level_kode }}</span></td>
                                        <td><strong>{{ $level->level_nama }}</strong></td>
                                        <td>{{ $level->created_at }}</td>
                                        <td>{{ $level->updated_at ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-warning text-center">
                        <i class="fas fa-exclamation-triangle"></i> Belum ada data level
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
