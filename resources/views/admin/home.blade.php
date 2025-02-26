@include('admin.header')

<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            @if(session('message'))
            <div class="alert alert-success mb-2">{{ session('message') }}</div>
            @endif
            <div class="mt-2 mb-4">
                <h1 class="title1 text-dark">Packages</h1>
            </div>

            <div class="mb-5 row">
                <div class="col-md-12 shadow card p-4 bg-light">
                    <div class="row">
                        <div class="col-12">
                            <form class="form-inline">
                                <div class="">
                                    <select class="form-control bg-light text-dark" id="numofrecord">
                                        <option>10</option>
                                        <option>20</option>
                                        <option>30</option>
                                        <option>40</option>
                                        <option>50</option>
                                        <option>100</option>
                                    </select>
                                </div>
                                <div class="">
                                    <select class="form-control bg-light text-dark" id="order">
                                        <option value="desc">Descending</option>
                                        <option value="asc">Ascending</option>
                                    </select>
                                </div>
                                <div>
                                    <input type="text" id="searchInput"
                                        placeholder="Search by tracking number or sender"
                                        class="form-control bg-light text-dark">
                                    <small id="errorsearch"></small>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover text-dark" id="packageTable">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Tracking Number</th>
                                    <th>Sender Name</th>
                                    <th>Receiver Name</th>
                                    <th>Current Location</th>
                                    <th>Parcel Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="packageList">
                                @foreach($packages as $index => $package)
                                <tr id="package-row-{{ $package->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $package->tracking_number }}</td>
                                    <td>{{ $package->sender_name }}</td>
                                    <td>{{ $package->receiver_name }}</td>
                                    <td>{{ $package->current_location }}</td>
                                    <td>
                                        @if($package->parcel_status == 'Delivered')
                                        <span class="badge badge-success">Delivered</span>
                                        @elseif($package->parcel_status == 'In Transit')
                                        <span class="badge badge-warning">In Transit</span>
                                        @else
                                        <span class="badge badge-danger">{{ $package->parcel_status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-secondary btn-sm"
                                            href="{{ route('admin.packages.edit',$package->id) }}" role="button">
                                            View Details
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination Controls -->
                    <div id="pagination" class="mt-3"></div>

                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            const searchInput = document.getElementById("searchInput");
                            const table = document.getElementById("packageTable");
                            const tbody = document.getElementById("packageList");
                            const rows = Array.from(tbody.getElementsByTagName("tr"));
                            const paginationDiv = document.getElementById("pagination");
                            
                            let currentPage = 1;
                            const rowsPerPage = 5;
                
                            function displayTablePage(page) {
                                const start = (page - 1) * rowsPerPage;
                                const end = start + rowsPerPage;
                
                                rows.forEach((row, index) => {
                                    row.style.display = (index >= start && index < end) ? "table-row" : "none";
                                });
                
                                generatePagination();
                            }
                
                            function generatePagination() {
                                paginationDiv.innerHTML = "";
                                const pageCount = Math.ceil(rows.length / rowsPerPage);
                                
                                for (let i = 1; i <= pageCount; i++) {
                                    const btn = document.createElement("button");
                                    btn.innerText = i;
                                    btn.className = `btn btn-sm ${i === currentPage ? 'btn-primary' : 'btn-outline-primary'}`;
                                    btn.style.margin = "2px";
                                    btn.addEventListener("click", () => {
                                        currentPage = i;
                                        displayTablePage(currentPage);
                                    });
                                    paginationDiv.appendChild(btn);
                                }
                            }
                
                            function filterTable() {
                                const filter = searchInput.value.toLowerCase();
                                let filteredRows = rows.filter(row => row.innerText.toLowerCase().includes(filter));
                
                                tbody.innerHTML = "";
                                filteredRows.forEach(row => tbody.appendChild(row));
                
                                currentPage = 1;
                                displayTablePage(currentPage);
                            }
                
                            searchInput.addEventListener("input", filterTable);
                            displayTablePage(currentPage);
                        });
                    </script>

                </div>

            </div>
        </div>
    </div>
</div>

@include('admin.footer')