<?php
$isUpdate = (empty($contact) ? false : true);
$method = (empty($contact) ? 'POST' : 'PUT');
?>

@extends('layouts.app')

@section('content')
    <div class="wrapper">
        @include('layouts.sidebar')
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Dashboard</div>
                        <br/>
                        <form class="form-horizontal" method="post"
                              action="{{ url('home/saveAddress') }}">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div><br />
                            @endif

                            {{ csrf_field() }}
                            <input type="hidden" name="method" value="{{ $method }}">
                            <input type="hidden" name="id" value="<?php echo($isUpdate ? $contact['id'] : ''); ?>">
                            <div class="form-group">
                                <label class="control-label col-md-3" for="city">Title *:</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="title">
                                        <option value="Home" <?php echo($isUpdate ? (($contact['title'] == 'Home') ? 'selected' : '' ) : ''); ?>>Home</option>
                                        <option value="Work" <?php echo($isUpdate ? (($contact['title'] == 'Work') ? 'selected' : '' ) : ''); ?>>Work</option>
                                        <option value="Other" <?php echo($isUpdate ? (($contact['title'] == 'Other') ? 'selected' : '' ) : ''); ?> >Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="name">Name *:</label>
                                <div class="col-md-9">
                                    <input type="text" maxlength="20" class="form-control" name="name" required="true"
                                           placeholder="Your Name" value="<?php echo($isUpdate ? $contact['name'] : ''); ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="contact_number">Contact Number *:</label>
                                <div class="col-md-9">
                                    <input type="text" maxlength="20" class="form-control"  name="contact_number" required="true"
                                           placeholder="Your Contact Number" value="<?php echo($isUpdate ? $contact['contactNumbar'] : ''); ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="address1">Address Line 1 *:</label>
                                <div class="col-md-9">
                                    <input type="text" maxlength="40" class="form-control"  name="address1" required="true"
                                           placeholder="Address Line 1" value="<?php echo($isUpdate ? $contact['addressLine1'] : ''); ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="address2">Address Line 2:</label>
                                <div class="col-md-9">
                                    <input type="text" maxlength="40" class="form-control"  name="address2"
                                           placeholder="Address Line 2" value="<?php echo($isUpdate ? $contact['addressLine2'] : ''); ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="address3">Address Line 3:</label>
                                <div class="col-md-9">
                                    <input type="text" maxlength="40" class="form-control"  name="address3"
                                           placeholder="Address Line 3" value="<?php echo($isUpdate ? $contact['addressLine3'] : ''); ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="street">Street:</label>
                                <div class="col-md-9">
                                    <input type="text" maxlength="40" class="form-control"  name="street"
                                           placeholder="Street" value="<?php echo($isUpdate ? $contact['street'] : ''); ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="pincode">Pincode:</label>
                                <div class="col-md-9">
                                    <input type="number" maxlength="8" class="form-control"  name="pincode"
                                           value="<?php echo($isUpdate ? $contact['pincode'] : ''); ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="city">City:</label>
                                <div class="col-md-9">
                                    <input type="text" maxlength="30" class="form-control"  name="city"
                                           value="<?php echo($isUpdate ? $contact['city'] : ''); ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="state">State:</label>
                                <div class="col-md-9">
                                    <input type="text" maxlength="30" class="form-control"  name="state"
                                           value="<?php echo($isUpdate ? $contact['state'] : ''); ?>">
                                </div>
                            </div>

                                <div class="form-group">
                                <div class="col-md-9 col-md-offset-3">
                                    <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
