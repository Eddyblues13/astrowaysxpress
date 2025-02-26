@include('admin.header')

<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            @if(session('message'))
            <div class="alert alert-success mb-2">{{ session('message') }}</div>
            @endif
            <div class="mt-2 mb-4">
                <h1 class="title1 text-dark">Manage Packages</h1>
            </div>
            <div class="mb-5 row">
                <div class="col-lg-12">
                    <div class="p-3 card bg-light">
                        <form id="packageForm">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Sender Name</h5>
                                    <input class="form-control text-dark bg-light" type="text" name="sender_name"
                                        value="{{ old('sender_name') }}" required>
                                    <span class="text-danger" id="sender_name_error"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Sender Phone</h5>
                                    <input class="form-control text-dark bg-light" type="text" name="sender_phone"
                                        value="{{ old('sender_phone') }}" required>
                                    <span class="text-danger" id="sender_phone_error"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Sender Email</h5>
                                    <input class="form-control text-dark bg-light" type="email" name="sender_email"
                                        value="{{ old('sender_email') }}" required>
                                    <span class="text-danger" id="sender_email_error"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Sender Address</h5>
                                    <input class="form-control text-dark bg-light" type="text" name="sender_address"
                                        value="{{ old('sender_address') }}" required>
                                    <span class="text-danger" id="sender_address_error"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Receiver Name</h5>
                                    <input class="form-control text-dark bg-light" type="text" name="receiver_name"
                                        value="{{ old('receiver_name') }}" required>
                                    <span class="text-danger" id="receiver_name_error"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Receiver Phone</h5>
                                    <input class="form-control text-dark bg-light" type="text" name="receiver_phone"
                                        value="{{ old('receiver_phone') }}" required>
                                    <span class="text-danger" id="receiver_phone_error"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Receiver Email</h5>
                                    <input class="form-control text-dark bg-light" type="email" name="receiver_email"
                                        value="{{ old('receiver_email') }}" required>
                                    <span class="text-danger" id="receiver_email_error"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Receiver Address</h5>
                                    <input class="form-control text-dark bg-light" type="text" name="receiver_address"
                                        value="{{ old('receiver_address') }}" required>
                                    <span class="text-danger" id="receiver_address_error"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Parcel Description</h5>
                                    <input class="form-control text-dark bg-light" type="text" name="parcel_description"
                                        value="{{ old('parcel_description') }}" required>
                                    <span class="text-danger" id="parcel_description_error"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Dispatch Location</h5>
                                    <input class="form-control text-dark bg-light" type="text" name="dispatch_location"
                                        value="{{ old('dispatch_location') }}" required>
                                    <span class="text-danger" id="dispatch_location_error"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Parcel Status</h5>
                                    <select class="form-control text-dark bg-light" name="parcel_status" required>
                                        <option value="">Select Status</option>
                                        <option value="Pending" {{ old('parcel_status')=='Pending' ? 'selected' : '' }}>
                                            Pending</option>
                                        <option value="In Transit" {{ old('parcel_status')=='In Transit' ? 'selected'
                                            : '' }}>In Transit</option>
                                        <option value="Out for Delivery" {{ old('parcel_status')=='Out for Delivery'
                                            ? 'selected' : '' }}>Out for Delivery</option>
                                        <option value="Delivered" {{ old('parcel_status')=='Delivered' ? 'selected' : ''
                                            }}>Delivered</option>
                                        <option value="Failed Delivery" {{ old('parcel_status')=='Failed Delivery'
                                            ? 'selected' : '' }}>Failed Delivery</option>
                                        <option value="Returned" {{ old('parcel_status')=='Returned' ? 'selected' : ''
                                            }}>Returned</option>
                                    </select>
                                    <span class="text-danger" id="parcel_status_error"></span>
                                </div>

                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Dispatch Date</h5>
                                    <input class="form-control text-dark bg-light" type="date" name="dispatch_date"
                                        value="{{ old('dispatch_date') }}" required>
                                    <span class="text-danger" id="dispatch_date_error"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Delivery Date</h5>
                                    <input class="form-control text-dark bg-light" type="date" name="delivery_date"
                                        value="{{ old('delivery_date') }}" required>
                                    <span class="text-danger" id="delivery_date_error"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Current Location</h5>
                                    <input class="form-control text-dark bg-light" type="text" name="current_location"
                                        value="{{ old('current_location') }}">
                                    <span class="text-danger" id="current_location_error"></span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#packageForm').on('submit', function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $('.text-danger').text('');

            $.ajax({
                url: "{{ route('admin.packages.store') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status === 'success') {
                        toastr.success(response.message);
                        location.reload();
                    }
                },
                error: function(response) {
                    let errors = response.responseJSON.errors;
                    $.each(errors, function(field, messages) {
                        $('#' + field + '_error').text(messages[0]);
                    });
                    toastr.error('Please correct the errors and try again.');
                }
            });
        });
    });
</script>

@include('admin.footer')