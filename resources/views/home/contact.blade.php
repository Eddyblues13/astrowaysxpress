@include('home.header')
<!-- header close -->
<!-- subheader begin -->
<section id="subheader" class="page-contact no-bottom" data-stellar-background-ratio="0.5">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h1>Contact Us
                        <span>Get In Touch With Us</span>
                    </h1>
                    <div class="small-border wow flipInY" data-wow-delay=".8s" data-wow-duration=".8s"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- subheader close -->



<!-- content begin -->
<div id="content">
    <div class="container">
        <div class="row no-gutter">
            <div class="col-md-6">
                <img src="img/contact.jpg" alt="Contact Us">
            </div>

            <div class="col-md-6">
                <div id="contact-form-wrapper">
                    <div class="contact_form_holder">
                        <form id="contact" class="row" name="form1" method="post" action="#">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Your name" />

                            <div id="error_email" class="error">Please check your email</div>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Your email" />

                            <div id="error_message" class="error">Please check your message</div>
                            <textarea cols="10" rows="10" name="message" id="message" class="form-control"
                                placeholder="Send your messages/inquiry to support@easywaysdelivery.online"></textarea>

                            <div id="mail_success" class="success">Thank you. Your message has been sent.</div>
                            <div id="mail_failed" class="error">Error, email not sent</div>

                            <p id="btnsubmit">
                                <input type="submit" id="send" value="Send" disabled class="btn btn-custom" />
                            </p>



                        </form>
                    </div>
                </div>
            </div>


        </div>

        <div class="divider-line"></div>

        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="wow fadeInUp" data-wow-delay=".5s" data-wow-duration=".8s">Our Branch
                </h2>
                <div class="small-border wow flipInY" data-wow-delay=".8s" data-wow-duration=".8s"></div>
            </div>

            <div class="col-md-3">
                <h3>Main:<br /> 133 NE 2nd Ave, Miami, FL 33132, USA</h3>
                <!-- Farringdon, <br />EC1M 4EH, United Kingdom<br /> -->
                T. +1 305 935 0535<br>
                E. info@astrowaysxpress.com<br>

                <div class="divider-single"></div>

                <!-- <a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&amp;hl=en&amp;t=v&amp;hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom" class="btn-border popup-gmaps">View Location</a> -->
            </div>

            <div class="col-md-3">
                <h3>Germany</h3>
                Europa-Allee<br>
                Frankfurt am Main<br>
                <!--T. +1 (415) 598-7568<br>-->
                E. info@astrowaysxpress.com<br>

                <div class="divider-single"></div>

                <!-- <a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&amp;hl=en&amp;t=v&amp;hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom" class="btn-border popup-gmaps">View Location</a> -->
            </div>

            <div class="col-md-3">
                <h3>Singapore</h3>
                Sentosa<br>
                Tiger Sky tower<br>
                <!--T. +1 (415) 598-7568<br>-->
                E. info@astrowaysxpress.com<br>

                <div class="divider-single"></div>

                <!-- <a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&amp;hl=en&amp;t=v&amp;hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom" class="btn-border popup-gmaps">View Location</a> -->
            </div>

            <div class="col-md-3">
                <h3>United Kingdom</h3>
                Locust St<br>
                LA, CA<br>
                <!--T. +1 (415) 598-7568<br>-->
                E. info@Globalflowshipment.cc<br>

                <div class="divider-single"></div>

                <!-- <a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&amp;hl=en&amp;t=v&amp;hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom" class="btn-border popup-gmaps">View Location</a> -->
            </div>


        </div>


    </div>
</div>
<!-- content close -->
@include('home.footer')