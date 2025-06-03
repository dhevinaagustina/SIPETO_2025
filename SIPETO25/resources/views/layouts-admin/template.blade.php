<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'SIPETO')}}</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ secure_asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  
  <!-- Data Tables-->
  <link rel="stylesheet" href="{{ secure_asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ secure_asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ secure_asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ secure_asset('adminlte/dist/css/adminlte.min.css') }}">

  @stack('styles')
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  @include('layouts-admin.header')
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    @include('layouts-admin.sidebar')
  </aside>
  
  <div class="content-wrapper">
    @include('layouts-admin.breadcrumb')

    <section class="content">
      @yield('content')
    </section>
  </div>

  @include('layouts-admin.footer')
</div>

<!-- jQuery -->
<script src="{{ secure_asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap 4 -->
<script src="{{ secure_asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- DataTables & Plugins -->
<script src="{{ secure_asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ secure_asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ secure_asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ secure_asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ secure_asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ secure_asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ secure_asset('adminlte/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ secure_asset('adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ secure_asset('adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ secure_asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ secure_asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ secure_asset('adminlte/plugins/datatables-buttons/js/buttons.colvis.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ secure_asset('adminlte/dist/js/adminlte.min.js') }}"></script>

<script>
  // Untuk mengirimkan token Laravel CSRF pada setiap request ajax
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
</script>

@stack('js')

<!-- Script filterTable manual -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const entriesSelect = document.getElementById('entriesSelect');
    const filterStatus = document.getElementById('filterStatus');
    const searchInput = document.getElementById('searchInput');
    const table = document.getElementById('tableSurat');
    if (!table) return; // Jika tabel tidak ada, hentikan

    const tbody = table.querySelector('tbody');
    let rows = Array.from(tbody.querySelectorAll('tr'));

    function filterTable() {
        const statusFilter = filterStatus ? filterStatus.value.toLowerCase() : '';
        const searchTerm = searchInput ? searchInput.value.toLowerCase() : '';
        const entries = entriesSelect ? parseInt(entriesSelect.value) : rows.length;

        let visibleCount = 0;

        rows.forEach(row => {
            const cells = row.querySelectorAll('td');
            if (cells.length < 6) {
                row.style.display = 'none';
                return;
            }

            const statusCell = cells[5];
            const statusText = statusCell.textContent.trim().toLowerCase();

            const rowText = Array.from(cells).map(c => c.textContent.toLowerCase()).join(' ');

            const statusMatch = statusFilter === '' || statusText.includes(statusFilter);
            const searchMatch = rowText.includes(searchTerm);

            if (statusMatch && searchMatch && visibleCount < entries) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });
    }

    if (entriesSelect) entriesSelect.addEventListener('change', filterTable);
    if (filterStatus) filterStatus.addEventListener('change', filterTable);
    if (searchInput) searchInput.addEventListener('input', filterTable);

    filterTable();
});
</script>

</body>
</html>
