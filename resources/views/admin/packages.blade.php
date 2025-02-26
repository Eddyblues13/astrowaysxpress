@include('admin.header')

<!-- End Sidebar -->
<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            <div class="mt-2 mb-4">
                <h1 class="title1 text-dark">Packages</h1>
            </div>
            <div class="mb-5 row">
                <div class="mt-2 mb-3 col-lg-12">
                    <a class="btn btn-primary" href="{{route('admin.packages.create')}}">
                        <i class="fa fa-plus"></i> Add New Package
                    </a>
                </div>

                @foreach($packages as $package)
                <div class="col-lg-4">
                    <div class="pricing-table purple border p-4 card bg-light shadow">
                        <div class="price-tag">
                            <h2 class="text-dark">Tracking #{{ $package->tracking_number }}</h2>
                            <center><i>Parcel Status: {{ ucfirst($package->parcel_status) }}</i></center>
                        </div>
                        <!-- Features -->
                        <div class="pricing-features">
                            <div class="feature text-dark">Sender: <span class="text-dark">{{ $package->sender_name
                                    }}</span></div>
                            <div class="feature text-dark">Receiver: <span class="text-dark">{{
                                    $package->receiver_name }}</span></div>
                            <div class="feature text-dark">Dispatch Location: <span class="text-dark">{{
                                    $package->dispatch_location }}</span></div>
                            <div class="feature text-dark">Current Location: <span class="text-dark">{{
                                    $package->current_location }}</span></div>
                            <div class="feature text-dark">Dispatch Date: <span class="text-dark">{{
                                    $package->dispatch_date }}</span></div>
                            <div class="feature text-dark">Delivery Date: <span class="text-dark">{{
                                    $package->delivery_date }}</span></div>
                            <div class="feature text-dark">Parcel Description:<br>{{ $package->parcel_description }}
                            </div>
                        </div>
                        <br>
                        <!-- Action Buttons -->
                        <div class="text-center">
                            <a href="{{ route('admin.packages.edit',$package->id) }}" class="btn btn-primary">
                                <i class="text-black flaticon-pencil"></i> Edit
                            </a>
                            &nbsp;
                            <form action="{{ route('admin.packages.delete',$package->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="text-black fa fa-times"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@include('admin.footer')