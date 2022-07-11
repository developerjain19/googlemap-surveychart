<?php include 'includes/headerlink.php' ?>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5eG5oC5cOUcQ3qPkjPE7vlmnrTOmI05A&sensor=false&libraries=places"></script>
<?php include 'includes/header.php' ?>


<section class="cta" id="action">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 offset-lg-2 form_box">
                <div class="heading text-center">
                    <p class="heading-subtitle">Survey Australia</p>
                    <h2 class="heading-title">Survey Form</h2>
                </div>
                <form class="contactForm" method="POST" action="">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <label for="#contact-fname">First Name</label>
                            <input class="form-control shadow  l-radius" type="text" id="#contact-fname" name="fname" required="" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="#contact-lname">Last Name</label>
                            <input class="form-control shadow  l-radius" type="text" id="#contact-lname" name="lname" required="" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="#contact-unit">Unit/Hno</label>
                            <input class="form-control shadow  l-radius" type="number" id="#contact-unit" name="unit" required="" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="#contact-unit">Moblie No</label>
                            <input class="form-control shadow  l-radius" type="number" id="#contact-phone" name="number" required="" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="#contact-unit">Email</label>
                            <input class="form-control shadow  l-radius" type="email" id="#contact-phone" name="email" required="" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="#contact-age">Age</label>
                            <input class="form-control shadow  l-radius" type="number" id="#contact-age" name="age" required="" />
                        </div>
                        <div class="col-12 col-md-6">
                            <!-- <input class="form-control shadow  l-radius" type="text" id="#contact-gender" name="gender" placeholder="Gender" required="" /> -->
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control shadow  l-radius">
                                <option value="male" selected>Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="#contact-date">Date</label>
                            <input class="form-control shadow  l-radius" type="date" id="#contact-date" name="date" value="<?php echo date('Y-m-d') ?>" required />
                        </div>

                        <div class="col-12 col-md-12">
                            <label for="#contact-date">Address</label>
                            <input type="text" class="form-control shadow heighthm" id="txtPlaces" name="address" value="" placeholder="Search Location">
                            <datalist id="browsers"></datalist>
                        </div>



                        <div class="col-12 col-md-12">
                            <p>Courses Interested in ?</p>
                            <div class="gird_box">
                                <label class="container">
                                    <input type="checkbox" name="course[]" value="Cert 2" checked="checked" >
                                    Cert II
                                </label>
                                <label class="container">
                                    <input type="checkbox" name="course[]" value="Cert 3">
                                    Cert III
                                </label>
                                <label class="container">
                                    <input type="checkbox" name="course[]" value="Cert 4">
                                    Cert IV
                                </label>
                                <label class="container">
                                    <input type="checkbox" name="course[]" value="Diploma">
                                    Diploma
                                </label>
                                <label class="container">
                                    <input type="checkbox" name="course[]" value="Adv Diploma">
                                    Adv Diploma
                                </label>
                                <label class="container">
                                    <input type="checkbox" name="course[]" value="Graduation">
                                    Graduation
                                </label>
                            </div>
                        </div>

                        <div class="col-12 col-md-12 mt-20">
                            <p>Are You Employed ?</p>
                            <div class="gird_box">
                                <label class="container">
                                    <input type="radio" name="employed" value="Yes" checked="checked" required>
                                    Yes
                                </label>
                                <label class="container">
                                    <input type="radio" name="employed" value="No">
                                    No
                                </label>
                            </div>
                        </div>

                        <div class="col-12 col-md-12 mt-20">
                            <p>Are You a PR/Citizen ?</p>
                            <div class="gird_box">
                                <label class="container">
                                    <input type="radio" name="citizen" value="0" checked="checked">
                                    Yes
                                </label>
                                <label class="container">
                                    <input type="radio" name="citizen" value="1">
                                    No
                                </label>
                            </div>
                        </div>


                        <div class="col-12 col-md-12 ">
                            <p>Do you have a work VISA ?</p>
                            <div class="gird_box">
                                <label class="container">
                                    <input type="radio" name="visa" value="0" checked="checked">
                                    Yes
                                </label>
                                <label class="container">
                                    <input type="radio" name="visa" value="1">
                                    No
                                </label>
                            </div>
                        </div>

                        <div class="col-12 text-center mt-50">
                            <input type="reset" class="btn btn--primary" value="reset">
                            <button class="btn btn--secondary">Submit</button>
                        </div>
                        <div class="col-12">
                            <div class="contact-result"></div>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>

</section>



<?php include 'includes/footerlink.php' ?>
<script>
    google.maps.event.addDomListener(window, 'load', function() {
        var places = new google.maps.places.Autocomplete(document.getElementById('txtPlaces'));
        google.maps.event.addListener(places, 'place_changed', function() {
            var place = places.getPlace();
            var address = place.formatted_address;
            var latitude = place.geometry.location.lat();
            var longitude = place.geometry.location.lng();
           
        });
    });

   
</script>