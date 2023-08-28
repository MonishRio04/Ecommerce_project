    @extends('Front.layout.navbarandfooter')
<!-- Modal -->
@section('main')
    <style>
        .form-control {
            border-color: lightgrey;
        }
    </style>
    @include('Front.layout.usersidebar')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new Address</h5>
                </div>
                <div class="modal-body">
                    {!! Form::open(['method' => 'POST', 'url' => url('create-new-address'), 'id' => 'myForm']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="name">Name</label>
                                <input type="text" name='name'class="form-control" id="name"
                                    placeholder="Enter Name">
                            </div>
                        </div>
                        @error('name')
                            <p style="color:red;font-size:12px">*{{ $message }}</p>
                        @enderror

                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="mobile">Mobile</label>
                                <input type="text" name="mobile"class="form-control" id="mobile"
                                    placeholder="Enter mobile">
                            </div>
                        </div>
                        @error('mobile')
                            <p style="color:red;font-size:12px">*{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="Address">Address Line 1 </label>
                                <textarea type="text" name="address1" class="form-control" id="Address1" placeholder="Enter Address"></textarea>
                            </div>
                            @error('address')
                                <p style="color:red;font-size:12px">*{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Address">Address Line 2 </label>
                                <textarea type="text" name="address2" class="form-control" id="Address2" placeholder="Enter Address"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Pincode">Pincode</label>
                        <input type="tel" inputmode="numeric" class="form-control" name="pincode" id="Pincode"
                            placeholder="Enter Pincode">
                    </div>
                    @error('pincode')
                        <p style="color:red;font-size:12px">*{{ $message }}</p>
                    @enderror

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="CountryType">Country </label>

                                {{-- {!! Form::select('Country', $country, null, ['class' => 'form-control', 'id' => 'country']) !!} --}}
                                {{-- <input type="number" class="form-control" name="countryType" id="CountryType" placeholder="Eg:+91"> --}}
                                <select name="Country" class="form-control country" id="country">
                                    @foreach ($country as $key => $count)
                                        <option value="{{ $key }}">{{ $count }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="StateCode">State </label>
                                {{-- {!! Form::select('state', $state, null, ['class' => 'form-control', 'id' => 'state']) !!} --}}
                                <select id="state" name="state" class="form-control">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="CityCode">City </label>
                                <select id="city" name="city" class="form-control">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="adrtype">Address type</label>
                                @php
                                    $list = [0 => 'Select Address type', 1 => 'Home', 2 => 'Work'];
                                @endphp
                                {!! Form::select('adrtype', $list, $list[0], ['class' => 'form-control', 'id' => 'adrtype']) !!}
                            </div>
                        </div>
                    </div>
                    <input type="hidden" value="" id="id" name="id">
                    <input type="hidden" name="latitude" value="" id='lat'>
                    <input type="hidden" name="longitude" value="" id='long'>
                    <button type="button" id="location" onclick="getLocation()" class='btn btn-info mt-2'><i
                            class="fas fa-map-marker-alt"></i> Allow Location</button>
                </div>
                <div class="modal-footer">
                    <button type="reset" hidden id="clearbtn"></button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="col-md-9 col-xl-10">
        <div class="content">
            <div class="row">
                <div class="col-md-8">
                    <h1>Shopping Cart</h1>
                </div>
                <div class="col-md-4 text-right">
                    <button type="button" class="btn btn-info " data-bs-toggle="modal" id="addbtn" 
                        data-bs-target="#exampleModal">Add new Address</button>
                </div>
            </div>
            <script>
                $('#addbtn').click(function(){
                    $('#clearbtn').trigger('click');
                })
            </script>
            <div class="cart-table">
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">S.no</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Mobile</th>
                            <th scope="col" style="width: 10px;">Action</th>
                        </tr>
                    </thead>
                    @foreach ($address as $adr)
                        <tbody>
                            <td>{{ $loop->iteration }}</td>
                            <td >
                            <button class="btn edit" type="button" value="{{ $adr->id }}" style="color:#31D2F2">
                            <u>{{ $adr->name }}</u></button></td>
                            <td>{{ $adr->address_line1 }}</td>
                            <td>{{ $adr->mobile_no }}</td>
                            <td>
                                <form method="post" action="{{ url('/destroy', $adr->id) }}">
                                    {{ csrf_field() }}{{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-default">
                                        <i style="padding:4px;margin:6px"class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
</div>
    <script>
        $(document).on('click', '.edit', function() {
            var id = this.value;
            $.ajax({
                url: '/editaddress/' + id,
                type: 'GET',
                // data: {
                //     'id': id,
                //     _token: '{{ csrf_token() }}',
                // },
                success: function(response) {
                    var adr = response.address;

                    $('#id').val(adr.id);
                    $('#name').val(adr.name);
                    $('#mobile').val(adr.mobile_no);
                    $('#Address1').val(adr.address_line1);
                    $('#Address2').val(adr.address_line2);
                    $('#Pincode').val(adr.post_code);
                    $('#country').val(response.address.country_code);
                    state(response.address.country_code, response.address.state_code);
                    $('#state').val(response.address.state_code);
                    city(response.address.state_code, adr.city_code);
                    $('#city').val(adr.city_code);
                    $('#adrtype').val(adr.address_type);
                    $('#exampleModal').modal('show');
                }

            });

        });

        function state(country_id, state_id = 0) {
            var country = country_id;
            $.ajax({
                url: "{{ url('getstate') }}",
                type: 'POST',
                data: {
                    'country': country,
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    var selectState = $('#state').empty();
                    this.state = selectState;
                    $.each(response, function(key, value) {
                        var select_attr = "";
                        if (state_id == key) {
                            select_attr = "selected=selected";
                        }
                        selectState.append($('<option ' + select_attr + '></option>').val(key).text(
                            value));
                    });
                }
            });
        }
        $(document).on('change', '#country', function() {
            var country = this.value;
            state(country, 0);
        });

        function city(state_id, city_id = 0) {
            $.ajax({
                url: "{{ url('getcity') }}",
                type: 'POST',
                data: {
                    'stateid': state_id,
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    var selectedCity = $('#city').empty();


                    $.each(response, function(key, value) {
                        var select_attr = "";
                        if (city_id == key) {
                            select_attr = "selected=selected";
                        }
                        selectedCity.append($('<option ' + select_attr + '></option>').val(key).text(
                            value));
                    });
                }
            });
        }
        $(document).on('change', '#state', function() {
            var stateid = this.value;
            city(stateid, 0);
        });


        function getLocation() {
            if (navigator.geolocation) {
                var position = navigator.geolocation.getCurrentPosition(showposition);

            } else {
                var location = null;
            }

            function showposition(position) {
                var latitude = position.coords.latitude;
                var Longitude = position.coords.longitude;
                $('#lat').val(latitude);
                $('#long').val(Longitude);
                $('#location').animate({
                    'opacity': 0
                }, 400, function() {
                    $(this).html('<i class="fas fa-map-marker-alt"></i>' + ' Allowed Location' + ' ✔').animate({
                        'opacity': 1
                    }, 400);
                });
            }
        }
    </script>   
@endsection
