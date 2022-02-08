<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/mario2.css">

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<!-- <div id="container">
	<h1>Welcome to CodeIgniter!</h1>

	<div id="body">
		<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

		<p>If you would like to edit this page you'll find it located at:</p>
		<code>application/views/welcome_message.php</code>

		<p>The corresponding controller for this page is found at:</p>
		<code>application/controllers/Welcome.php</code>

		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div> -->

<h1 class="slogan">We are the best team in the league.</h1>
<section class="team">
  <div class="grid">
    <figure class="effect-steve">
      <img src="https:instagram.com/mariohamas/scontent-sin6-3.cdninstagram.com/v/t51.2885-19/s150x150/272789399_1132891807456110_4685170065880317284_n.jpg?_nc_ht=scontent-sin6-3.cdninstagram.com&_nc_cat=106&_nc_ohc=8wpKNRodOxsAX9jYnWf&edm=ABfd0MgBAAAA&ccb=7-4&oh=00_AT_mYBWaqI7jNVj9q0b2bHplwmguInRuaBEHsQ9AVb-5_g&oe=620954D4&_nc_sid=7bff83" />
      <figcaption>
        <h2>Mario <span> Abdul Salam</span></h2>
        <p>Saya adalah Web Developer . Saya menguasai HTML,CSS, Javascript. </p>
      </figcaption>
    </figure>

    <figure class="effect-steve">
      <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?auto=format&fit=crop&w=750&q=60&ixid=dW5zcGxhc2guY29tOzs7Ozs%3D 750w" />
      <figcaption>
        <h2>Tiffany <span>Roberts</span></h2>
        <p>Award-winning travel ninja. Pop culture enthusiast.</p>
      </figcaption>
    </figure>

    <figure class="effect-steve">
      <img src="https://images.unsplash.com/photo-1496345875659-11f7dd282d1d?auto=format&fit=crop&w=750&q=60&ixid=dW5zcGxhc2guY29tOzs7Ozs%3D 750w" />
      <figcaption>
        <h2>Richard <span>Clinton</span></h2>
        <p>Currently in love with cycling. Obsessed with creating helpful stuff.</p>
      </figcaption>
    </figure>
    <figure class="effect-steve">
      <img src="https://images.unsplash.com/photo-1477597073867-a0c34dba8be5?auto=format&fit=crop&w=750&q=60&ixid=dW5zcGxhc2guY29tOzs7Ozs%3D 750w" />
      <figcaption>
        <h2>Becca <span>Phillips</span></h2>
        <p>I like movies and books. I eat the pizza crust. Coffee addict.</p>
      </figcaption>
    </figure>
  </div>  
</section>

</body>
</html>