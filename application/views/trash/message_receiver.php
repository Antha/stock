<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />


<title>Renungan Remaja</title>
</head>

<body>

<div id="wrap">

<div class="mycontainer col-lg-12 col-md-12 col-xs-12 col-sm-12">

<?php echo $_header;?>

<?php echo $_top_menu;?>

<div id="contentwrap" class="col-lg-12 col-md-12 col-xs-12">

<div id="content" class="message-rec col-lg-7 col-md-6 col-sm-6 col-xs-12">

<?php $this->load->view("template/menu_msg"); ?>

<h2> Pilih Penerima </h2>

<script type="text/javascript" src="<?php echo base_url()."public/"?>jquery/pajinate/jquery.pajinate.js"></script>

<script type="text/javascript">

$(document).ready(function(){
				$('#paging_container2').pajinate({
					items_per_page : 10});
			});

</script>

<style>

#paging_container2{
			
		}

		.page_navigation , .alt_page_navigation{
			
			float:right;
	
			
		}
		
		.page_navigation a, .alt_page_navigation a{
			padding:3px 5px;
			margin:2px;
			color:white;
			text-decoration:none;
			float: left;
			font-family: Tahoma;
			font-size: 12px;
			background-color:#FFB08A
		}
		.active_page{
			background-color:white !important;
			color:black !important;
		}	
		
		.content, .alt_content{
			color: black;
		}
		
		.content li, .alt_content li, .content > p{
			list-style:none;		
		}

</style>

<div id="paging_container2">
        
<ul class="content col-lg-12">

<?php for($x=0; $x<100 ; $x++) {?>

<li class="col-lg-4 col-md-6 col-xs-12">

<div class="child">

<div id="title"> Kontak <?php echo $x?></div>

<a href="message_write/<?php echo "Kontak ".$x?>">
<img src="<?php echo base_url()."/"?>public/images/<?php echo $photo?>" class="pic-profile" width="100%"/>
</a>

</div>
<!-- End Of child-->
</li>

<?php }?>

</ul>

<div class="page_navigation col-lg-12"></div>

</div>
<!-- ENd OF PAging COntainer-->


<div class="col-1 col-lg-12 col-xs-12">

</div>
<!-- End Of Col-1-->

</div>
<!-- End OF Content-->


<div id="sidebar" class="col-lg-5 col-md-6 col-sm-6 col-xs-12">

<?php echo $this->load->view('template/user-navigation');?>

<?php echo $_right_menu;?>

</div>

<!-- End Of SIde Bar-->

</div>
<!-- End Of COntent Wrap-->

<?php echo $_footer?>


</div>
<!-- End OF My Container-->

</div>
<!-- ENd Of Wrap-->


</body>
</html>
