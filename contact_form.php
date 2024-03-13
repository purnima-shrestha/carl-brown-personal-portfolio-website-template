<?php
	// Edit these lines
	$your_name = "Your Name";
	$your_email = "mail@domain.com";
	//Subject Field
	$mail_subject = "You have a message sent from your site";
?>

<?php
//If the form is submitted
if(isset($_POST['name'])) {

		//Check to make sure that the name field is not empty
		if(trim($_POST['name']) === '') {
			$hasError = true;
			$errorMessage = "You have forgot to type your name!";
		} else {
			$name = trim($_POST['name']);
		}

		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['email']) === '')  {
			$hasError = true;
			$errorMessage = "You have forgot to type an email!";
		} else if (!preg_match("/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,5})$/i", trim($_POST['email']))) {
			$hasError = true;
			$errorMessage = "Please enter a valid email address!";
		} else {
			$email = trim($_POST['email']);
		}

		// Company Name
		$companyname = trim($_POST['companyname']);

		// Phone Number
		$phone = trim($_POST['phone']);

		//Check to make sure messages were entered
		if(trim($_POST['message']) === '') {
			$hasError = true;
			$errorMessage = "You have forgot to type a message!";
		} else {
			if(function_exists('stripslashes')) {
				$message = stripslashes(trim($_POST['message']));
			} else {
				$message = trim($_POST['message']);
			}
		}

		//If there is no error, send the email
		if(!isset($hasError)) {

			$emailTo = $your_email;
			$subject = $mail_subject.' from '.$name;

			//message body
			$body  = "Here is what was sent:\n\n";
			$body .="Name: $name \n\n";
			$body .="Company Name: $companyname \n\n";
			$body .="Email: $email \n\n";
			$body .="Phone Number: $phone \n\n";
			$body .="Message: $message";


			$headers = 'From: '.$name.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;

			mail($emailTo, $subject, $body, $headers);

			$emailSent = true;
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Carl Brown - Free HTML Template For Personal Portfolio CV </title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/vendor.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="style.css">



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@600;700;800;900&family=Nunito+Sans:wght@300;400;600;700&display=swap"
        rel="stylesheet">

    <!-- script
	================================================== -->
    <script src="js/modernizr.js"></script>

</head>

<body data-bs-spy="scroll" data-bs-target="#navigation-bar" tabindex="0">


    <div>
        <div class="row">

            <section id="navigation-bar" class="navigation position-fixed">


                <ul class="nav nav-pills text-center align-items-center">
                    <li>
                        <a href="index.html" class="nav-link active rounded-0" aria-current="page"
                            data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Home"
                            data-bs-original-title="Home">
                            <iconify-icon icon="ic:round-home"></iconify-icon>

                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link rounded-0" data-bs-toggle="tooltip" data-bs-placement="right"
                            aria-label="Dashboard" data-bs-original-title="Dashboard">
                            <iconify-icon icon="ic:round-person"></iconify-icon>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link rounded-0" data-bs-toggle="tooltip" data-bs-placement="right"
                            aria-label="Orders" data-bs-original-title="Orders">
                            <iconify-icon icon="ic:round-school"></iconify-icon>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link rounded-0" data-bs-toggle="tooltip" data-bs-placement="right"
                            aria-label="Products" data-bs-original-title="Products">
                            <iconify-icon icon="ic:round-business-center"></iconify-icon>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link rounded-0" data-bs-toggle="tooltip" data-bs-placement="right"
                            aria-label="Customers" data-bs-original-title="Customers">
                            <iconify-icon icon="ic:round-menu-book"></iconify-icon>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link rounded-0" data-bs-toggle="tooltip" data-bs-placement="right"
                            aria-label="Customers" data-bs-original-title="Customers">
                            <iconify-icon icon="ic:round-phone"></iconify-icon>
                        </a>
                    </li>
                    <li class="dropup pro-menu ">
                        <a class="nav-link text-uppercase dropdown-toggle" data-bs-toggle="dropdown" href="#"
                            role="button" aria-expanded="false"><iconify-icon icon="mdi:cart"></iconify-icon></a>
                        <ul class="dropdown-menu">
                            <li><a href="blog-single.html" class="dropdown-item text-uppercase ">Blog-Single <span
                                        class="badge bg-secondary">Pro</span></a></li>
                            <li><a href="services-single.html" class="dropdown-item text-uppercase ">Service-Single
                                    <span class="badge bg-secondary">Pro</span></a></li>
                            <li><a href="portfolio-single.html" class="dropdown-item text-uppercase ">Portfolio-Single
                                    <span class="badge bg-secondary">Pro</span></a></li>
                            <li><a href="contact.html" class="dropdown-item text-uppercase ">Contact <span
                                        class="badge bg-secondary">Pro</span></a></li>
                            <li><a href="team.html" class="dropdown-item text-uppercase ">My Team <span
                                        class="badge bg-secondary">Pro</span></a></li>
                            <li><a href="review.html" class="dropdown-item text-uppercase ">Reviews <span
                                        class="badge bg-secondary">Pro</span></a></li>
                            <li><a href="faq.html" class="dropdown-item text-uppercase ">FAQs <span
                                        class="badge bg-secondary">Pro</span></a></li>
                            <li><a href="https://templatesjungle.gumroad.com/l/carl-free-bootstrap-5-html-website-template-for-portfolio"
                                    class="dropdown-item heading-color text-uppercase text-center text-decoration-underline">GET
                                    PRO HERE</a></li>
                        </ul>
                    </li>
                </ul>

            </section>

            <div class="col-md-6 offset-md-2">
                <div class="container content-container">

                    <section id="contact-us">

                        <div class="py-4 my-4 ">
                            <h1 class="fw-bold mt-5">Thankyou</h1>
                        </div>

                        <hr class="mid-break my-2">

						<h2 class="fw-bold text-uppercase mb-4">Thankyou for submitting</h2>


						<section class="py-5">
				<div class="container">
				<div class="row justify-content-center">
					<div class="col-4">
						<?php if(isset($emailSent) == true) { ?>
							<div class="message-box success-box">
								<div class="message-box-content">
									<p>
										<strong>Thanks, <?php echo $name;?></strong><br>
										We've received your email. We'll be in touch as soon as we possibly can!
									</p>
									<span class="close"></span>
								</div>
							</div>
						<?php } ?>

						<?php if(isset($hasError) ) { ?>
							<div class="message-box error-box">
								<div class="message-box-content">
									<p>There was an error submitting the form.</p>
									<?php echo $errorMessage;?>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
				</div>
			</section>

                    </section>

                </div>
            </div>

            <div class="col-md-3 offset-md-1">
                <section class="hero position-fixed">
                    <div class="container hero-container text-center pt-3 align-content-between ">

                        <div>
                            <img src="images/carlbrown.png" class="hero-img my-4 rounded-circle" alt="Bootstrap Themes"
                                width="140" height="140" loading="lazy">


                            <h2 class="fw-bold mt-3">Carl Brown</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quam risus nam ma aliquet.
                                Libero
                                porta in sodales.</p>
                            <div class="social-icon my-4">
                                <p>
                                    <a class="social-link mx-3 active" href="#"> <iconify-icon
                                            icon="icomoon-free:facebook"></iconify-icon> </a>
                                    <a class="social-link mx-3 " href="#"> <iconify-icon
                                            icon="icomoon-free:instagram"></iconify-icon> </a>
                                    <a class="social-link mx-3 " href="#"> <iconify-icon
                                            icon="icomoon-free:twitter"></iconify-icon> </a>
                                    <a class="social-link mx-3 " href="#"> <iconify-icon
                                            icon="icomoon-free:youtube"></iconify-icon> </a>
                                </p>

                            </div>
                            <div class="d-flex justify-content-center pt-3">
                                <button class="dropdown btn btn-primary get-pro rounded-5 py-3 px-4 mb-5 mx-3">
                                    <h4 class=" text-uppercase dropdown-toggle fs-6 mb-0 fw-bold"
                                        data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Pro Pages
                                    </h4>

                                    <ul class="dropdown-menu">
                                        <li><a href="blog-single.html" class="dropdown-item text-uppercase ">Blog-Single
                                                <span class="badge bg-secondary">Pro</span></a></li>
                                        <li><a href="services-single.html"
                                                class="dropdown-item text-uppercase ">Service-Single
                                                <span class="badge bg-secondary">Pro</span></a></li>
                                        <li><a href="portfolio-single.html"
                                                class="dropdown-item text-uppercase ">Portfolio-Single
                                                <span class="badge bg-secondary">Pro</span></a></li>
                                        <li><a href="contact.html" class="dropdown-item text-uppercase ">Contact <span
                                                    class="badge bg-secondary">Pro</span></a></li>
                                        <li><a href="team.html" class="dropdown-item text-uppercase ">My Team <span
                                                    class="badge bg-secondary">Pro</span></a></li>
                                        <li><a href="review.html" class="dropdown-item text-uppercase ">Reviews <span
                                                    class="badge bg-secondary">Pro</span></a></li>
                                        <li><a href="faq.html" class="dropdown-item text-uppercase ">FAQs <span
                                                    class="badge bg-secondary">Pro</span></a></li>
                                    </ul>
                                </button>
                                <div>
                                    <a href="https://templatesjungle.gumroad.com/l/carl-free-bootstrap-5-html-website-template-for-portfolio"
                                        class="btn btn-outline-primary text-uppercase rounded-5 py-3 px-4 mb-4 mx-3">Get
                                        Pro <iconify-icon icon="mdi:cart" class="ps-2"
                                            style="color: white;"></iconify-icon> </a>
                                </div>
                            </div>
                        </div>


                        <div class="mb-5">
                            <p class="copyright ">© Free HTML template by: <a href="https://templatesjungle.com/">
                                    <u>TemplatesJungle </u> </a> </p>
                        </div>





                    </div>
                </section>
            </div>

        </div>
    </div>





    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>






</body>

</html>