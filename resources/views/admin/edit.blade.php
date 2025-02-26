@include('admin.header')

<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            @if(session('message'))
            <div class="alert alert-success mb-2">{{ session('message') }}</div>
            @endif
            <div class="mt-2 mb-4">
                <h1 class="title1 text-dark">Edit Package</h1>
            </div>
            <div class="mb-5 row">
                <div class="col-lg-12">
                    <div class="p-3 card bg-light">
                        <form id="editPackageForm">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <input type="hidden" name="id" value="{{ $package->id }}">
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Sender Name</h5>
                                    <input class="form-control text-dark bg-light" type="text" name="sender_name"
                                        value="{{ $package->sender_name }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Sender Phone</h5>
                                    <input class="form-control text-dark bg-light" type="text" name="sender_phone"
                                        value="{{ $package->sender_phone }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Sender Email</h5>
                                    <input class="form-control text-dark bg-light" type="email" name="sender_email"
                                        value="{{ $package->sender_email }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Sender Address</h5>
                                    <input class="form-control text-dark bg-light" type="text" name="sender_address"
                                        value="{{ $package->sender_address }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Receiver Name</h5>
                                    <input class="form-control text-dark bg-light" type="text" name="receiver_name"
                                        value="{{ $package->receiver_name }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Receiver Phone</h5>
                                    <input class="form-control text-dark bg-light" type="text" name="receiver_phone"
                                        value="{{ $package->receiver_phone }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Receiver Email</h5>
                                    <input class="form-control text-dark bg-light" type="email" name="receiver_email"
                                        value="{{ $package->receiver_email }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Receiver Address</h5>
                                    <input class="form-control text-dark bg-light" type="text" name="receiver_address"
                                        value="{{ $package->receiver_address }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Parcel Description</h5>
                                    <input class="form-control text-dark bg-light" type="text" name="parcel_description"
                                        value="{{ $package->parcel_description }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Dispatch Location</h5>
                                    <input class="form-control text-dark bg-light" type="text" name="dispatch_location"
                                        value="{{ $package->dispatch_location }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Parcel Status</h5>
                                    <select class="form-control text-dark bg-light" name="parcel_status" required>
                                        <option value="In Transit" {{ $package->parcel_status == 'In Transit' ?
                                            'selected' : '' }}>In Transit</option>
                                        <option value="Out for Delivery" {{ $package->parcel_status == 'Out for
                                            Delivery' ? 'selected' : '' }}>Out for Delivery</option>
                                        <option value="Delivered" {{ $package->parcel_status == 'Delivered' ? 'selected'
                                            : '' }}>Delivered</option>
                                        <option value="Pending" {{ $package->parcel_status == 'Pending' ? 'selected' :
                                            '' }}>Pending</option>
                                        <option value="Failed Delivery" {{ $package->parcel_status == 'Failed Delivery'
                                            ? 'selected' : '' }}>Failed Delivery</option>
                                        <option value="Returned" {{ $package->parcel_status == 'Returned' ? 'selected' :
                                            '' }}>Returned</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Dispatch Date</h5>
                                    <input class="form-control text-dark bg-light" type="date" name="dispatch_date"
                                        value="{{ $package->dispatch_date }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Delivery Date</h5>
                                    <input class="form-control text-dark bg-light" type="date" name="delivery_date"
                                        value="{{ $package->delivery_date }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Current Location</h5>
                                    <input class="form-control text-dark bg-light" type="text" name="current_location"
                                        value="{{ $package->current_location }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Package</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
    $('#editPackageForm').on('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        formData.append('_method', 'PUT'); // Ensure Laravel interprets it as a PUT request

        $.ajax({
            url: "{{ route('admin.packages.update', $package->id) }}",
            type: "POST", // Laravel will interpret this as PUT due to `_method`
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Ensure CSRF token is included
            },
            success: function(response) {
                if (response.status === 'success') {
                    toastr.success(response.message);
                    setTimeout(() => {
                        window.location.reload(); // Reload the current page
                    }, 1000); // Delay redirection for better UX
                }
            },
            error: function(response) {
                let errors = response.responseJSON.errors;
                $.each(errors, function(field, messages) {
                    $('[name="' + field + '"]').next('.text-danger').text(messages[0]);
                });
                toastr.error('Please correct the errors and try again.');
            }
        });
    });
});

</script>

@include('admin.footer')