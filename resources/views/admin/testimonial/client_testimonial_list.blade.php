@extends('admin.layout.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Client Testimonial</a></li>
                                    <li class="breadcrumb-item active">Admin</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Client Testimonial</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 text-left">
                                        <h4 class="header-title">Client Testimonial</h4>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="basic_datatable" class="table dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Designation</th>
                                                <th>Country</th>
                                                <th>Rating</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div>
            </div> <!-- container -->
        </div> <!-- content -->
    </div>
    <div class="modal fade" id="testimonialModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title" id="myCenterModalLabel">Add Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form id="add_testimonial" method="POST">
                        <input type="hidden" name="id">
                        <div class="form-row">
                            <div class="col-lg-9">
                                <div class="row gy-3">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label">Select Country</label>
                                        <select class="custom-select" name="country" class="form-control">
                                            <option value="">-- Select Country --</option>
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="Brunei">Brunei</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Cape Verde">Cape Verde</option>
                                            <option value="Central African Republic">Central African Republic</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Congo">Congo</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Croatia">Croatia</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="East Timor">East Timor</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Eswatini">Eswatini</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finland">Finland</option>
                                            <option value="France">France</option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Iran">Iran</option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Laos">Laos</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libya">Libya</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Marshall Islands">Marshall Islands</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Micronesia">Micronesia</option>
                                            <option value="Moldova">Moldova</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Montenegro">Montenegro</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Myanmar">Myanmar</option>
                                            <option value="Namibia">Namibia</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Netherlands">Netherlands</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="North Korea">North Korea</option>
                                            <option value="North Macedonia">North Macedonia</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Palau">Palau</option>
                                            <option value="Palestine">Palestine</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Romania">Romania</option>
                                            <option value="Russia">Russia</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                            <option value="Saint Lucia">Saint Lucia</option>
                                            <option value="Saint Vincent and the Grenadines">Saint Vincent and the
                                                Grenadines</option>
                                            <option value="Samoa">Samoa</option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Serbia">Serbia</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra Leone">Sierra Leone</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Slovakia">Slovakia</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="Solomon Islands">Solomon Islands</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="South Korea">South Korea</option>
                                            <option value="South Sudan">South Sudan</option>
                                            <option value="Spain">Spain</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Syria">Syria</option>
                                            <option value="Taiwan">Taiwan</option>
                                            <option value="Tajikistan">Tajikistan</option>
                                            <option value="Tanzania">Tanzania</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="United States">United States</option>
                                            <option value="Uruguay">Uruguay</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Vatican City">Vatican City</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="Vietnam">Vietnam</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label">Designation</label>
                                        <input type="text" name="designation" class="form-control"
                                            placeholder="designation">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label">Rating</label>
                                        <select class="custom-select" name="rating">
                                            <option value="">Select Rating</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group" style="width: 100%; height:150px;">
                                    <img id="testimonial_image" src="" class="img-thumbnail"
                                        style="width: 100%; height:100%; object-fit: contain;">
                                </div>
                                <div>
                                    <input
                                        type="file"onchange="document.querySelector('#testimonial_image').src=window.URL.createObjectURL(this.files[0])"
                                        name="image" class="form-control" style="width: 100%;" />
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" rows="5"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="button" class="btn btn-secondary waves-effect" class="close"
                                data-dismiss="modal" aria-hidden="true">Cancel</button>
                            <button type="submit" class="btn btn-danger waves-effect waves-light">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('customJs')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
    <script>
        function reload_data_table(ele) {
            $(ele).DataTable().ajax.reload();
        }
        $(document).on('submit', '#add_testimonial', function(event) {
            event.preventDefault();
            $.ajax({
                url: "{{ route('admin_testimonial_addEdit') }}",
                method: 'POST',
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                processData: false,
                success: function(data) {
                    webinaToast({
                        type: data.type,
                        message: data.text
                    });
                    if (data.type == 'success') {
                        $('#testimonialModal').modal('hide');
                        reload_data_table("#basic_datatable");
                    }
                }
            });
        });

        function openTestimonialForm(edit_id = 0) {
            $("#testimonialModal").find(
                    "input[name='id'],input[type='text'], input[type='number'], input[type='password'], select, textarea")
                .val('');
            $("#testimonial_image").attr("src", "");
            $("#testimonialModal").modal('show');
            if (parseInt(edit_id) > 0) {
                $.ajax({
                    url: "{{ route('admin_testimonial_edit') }}",
                    method: "POST",
                    data: {
                        id: edit_id
                    },
                    dataType: "JSON",
                    success: function(data) {
                        $.each(data, function(key, value) {
                            if (key == "image") {
                                $("#testimonial_image").attr("src", "{{ asset('manual_storage/') }}/" +
                                    value);
                            } else {
                                $('#add_testimonial [name="' + key + '"]').val(value);
                            }
                        });
                    }
                });
            }
        }

        function lolad_datatable() {
            $('#basic_datatable').DataTable({
                "pageLength": 10,
                "lengthMenu": [10, 20, 50, 100, 200],
                "language": {
                    "lengthMenu": '_MENU_',
                    "sSearch": "",
                    "searchPlaceholder": "Search records"
                },
                "processing": true,
                "serverSide": true,
                "ajax": {
                    url: "{{ route('admin_client_testimonial_fetchAllList') }}",
                    type: "POST",
                    data: {}
                },
                "columnDefs": [{
                    "orderable": false,
                    "targets": [0, 5, 6]
                }, ],
                "order": [
                    [0, 'asc']
                ],
            });
        }
        $(document).ready(function(e) {
            lolad_datatable();
        });

        function updateStatus(id) {
            event.preventDefault();
            webinaFire({
                icon: "question",
                title: "Are you sure to change status?",
                acceptButton: "Yes, change it!",
                cancelButton: "Cancel",
                message: "",
                accept: function() {
                    if ($("#" + id + "_status").is(":checked")) {
                        var status = 0;
                    } else {
                        var status = 1;
                    }
                    $.ajax({
                        url: "{{ route('admin_testimonial_status') }}",
                        method: 'POST',
                        data: {
                            id: id,
                            status: status
                        },
                        dataType: 'JSON',
                        success: function(data) {
                            webinaToast({
                                type: data.type,
                                message: data.text
                            });
                            if (data.type == 'success') {
                                reload_data_table("#basic_datatable");
                            }
                        }
                    });
                }
            });
        }

        function deleteTestimonial(id) {
            event.preventDefault();
            webinaFire({
                icon: "question",
                title: "Are you sure to Delete?",
                acceptButton: "Yes, Delete it!",
                cancelButton: "Cancel",
                message: "",
                accept: function() {
                    $.ajax({
                        url: "{{ route('admin_testimonial_delete') }}",
                        type: 'delete',
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function(data) {
                            webinaToast({
                                type: data.type,
                                message: data.text
                            });
                            if (data.type == 'success') {
                                reload_data_table("#basic_datatable");
                            }
                        }
                    });
                }
            });
        }
    </script>
@endsection
