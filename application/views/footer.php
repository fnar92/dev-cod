 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>
        $(document).ready(function(){
            $(".footerwrap").slideDown();
        $(".close").click(function(){
            $(".footerwrap").slideUp();
        });
        });
        </script>

        <!-- Just for debugging purposes. Don't actually copy this line! -->
        <!--[if lt IE 9]><script src="../../<?php echo base_url(); ?>assets/front/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <script src="<?php echo base_url(); ?>assets/front/js/script_oculto.js"></script>

        <!-- Load Jquery -->
        <script src=" <?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src=" <?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
        <script src=" <?php echo base_url(); ?>assets/js/jquery.form.js"></script>
        <!-- Load JS for Bootstrap -->
        <script src=" <?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

        <script src=" <?php echo base_url(); ?>assets/js/login.js"></script>
        <script src=" <?php echo base_url(); ?>assets/js/trazabilidad.js"></script>
        <script src=" <?php echo base_url(); ?>assets/js/TicketsJava.js"></script>
        <script src=" <?php echo base_url(); ?>assets/js/mapa.js"></script>
        <!-- Load Map  -->

        <script>
            $(document).ready(function () {
                $('#ResetmyModal').modal('toggle');

                $("#myModal").on('hide.bs.modal', function () {
                    $('#box').prop('checked', false);
                });

                $("#myModalBaja").on('hide.bs.modal', function () {
                    $('#vendido').prop('checked', false);
                });

                $("#fase2").hide();

            });

            function myFunction() {
                $('#box').prop('checked', false);
            }

            function myFunctionbaja() {
                $('#vendido').prop('checked', false);
            }
            
             $("form").keypress(function (e) {
                    if (e.which == 13) {
                        return false;
                    }
            
            });
        </script>

<script>
    var _0xeb38 = ["\x63\x6C\x69\x63\x6B", "\x2E\x70\x61\x67\x69\x6E\x61\x74\x69\x6F\x6E\x20\x61", "\x68\x72\x65\x66", "\x61\x74\x74\x72", "\x6C\x6F\x61\x64", "\x23\x74\x68\x65\x2D\x63\x6F\x6E\x74\x65\x6E\x74", "\x6F\x6E", "\x62\x6F\x64\x79"];
    $(_0xeb38[7])[_0xeb38[6]](_0xeb38[0], _0xeb38[1], function () {
        var _0x6e6fx1 = $(this)[_0xeb38[3]](_0xeb38[2]);
        $(_0xeb38[5])[_0xeb38[4]](_0x6e6fx1);
        return false
    })
</script>

<script>
    var _0x9508 = ["\x67\x65\x74\x44\x61\x74\x65", "\x67\x65\x74\x4D\x6F\x6E\x74\x68", "\x67\x65\x74\x46\x75\x6C\x6C\x59\x65\x61\x72", "\x30", "\x2D", "\x76\x61\x6C\x75\x65", "\x61\x74\x74\x72", "\x69\x6E\x70\x75\x74\x5B\x74\x79\x70\x65\x3D\x22\x64\x61\x74\x65\x22\x5D"];
    var date = new Date();
    var day = date[_0x9508[0]]();
    var month = date[_0x9508[1]]() + 1;
    var year = date[_0x9508[2]]();
    if (month < 10) {
        month = _0x9508[3] + month
    }
    ;
    if (day < 10) {
        day = _0x9508[3] + day
    }
    ;
    var today = year + _0x9508[4] + month + _0x9508[4] + day;
    $(_0x9508[7])[_0x9508[6]](_0x9508[5], today)
</script>

<script>
    var _0x18dd = ["\x63\x6F\x6E\x74\x65\x78\x74\x6D\x65\x6E\x75", "\x62\x69\x6E\x64"];
    $(function () {
        $(document)[_0x18dd[1]](_0x18dd[0], function (_0xb73ex1) {
            return false
        })
    })
</script>

<!-- Bootstrap core JavaScript
    ================================================== -->
        <script src="<?php echo base_url(); ?>assets/front/js/retina-1.1.0.js"></script>
        <script src="<?php echo base_url(); ?>assets/front/js/jquery.hoverdir.js"></script>
        <script src="<?php echo base_url(); ?>assets/front/js/jquery.hoverex.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/front/js/jquery.prettyPhoto.js"></script>
        <script src="<?php echo base_url(); ?>assets/front/js/jquery.isotope.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/front/js/custom.js"></script>


        <script>
// Portfolio
(function($) {
	"use strict";
	var $container = $('.portfolio'),
		$items = $container.find('.portfolio-item'),
		portfolioLayout = 'fitRows';
		
		if( $container.hasClass('portfolio-centered') ) {
			portfolioLayout = 'masonry';
		}
				
		$container.isotope({
			filter: '*',
			animationEngine: 'best-available',
			layoutMode: portfolioLayout,
			animationOptions: {
			duration: 750,
			easing: 'linear',
			queue: false
		},
		masonry: {
		}
		}, refreshWaypoints());
		
		function refreshWaypoints() {
			setTimeout(function() {
			}, 1000);   
		}
				
		$('nav.portfolio-filter ul a').on('click', function() {
				var selector = $(this).attr('data-filter');
				$container.isotope({ filter: selector }, refreshWaypoints());
				$('nav.portfolio-filter ul a').removeClass('active');
				$(this).addClass('active');
				return false;
		});
		
		function getColumnNumber() { 
			var winWidth = $(window).width(), 
			columnNumber = 1;
		
			if (winWidth > 1200) {
				columnNumber = 5;
			} else if (winWidth > 950) {
				columnNumber = 4;
			} else if (winWidth > 600) {
				columnNumber = 3;
			} else if (winWidth > 400) {
				columnNumber = 2;
			} else if (winWidth > 250) {
				columnNumber = 1;
			}
				return columnNumber;
			}       
			
			function setColumns() {
				var winWidth = $(window).width(), 
				columnNumber = getColumnNumber(), 
				itemWidth = Math.floor(winWidth / columnNumber);
				
				$container.find('.portfolio-item').each(function() { 
					$(this).css( { 
					width : itemWidth + 'px' 
				});
			});
		}
		
		function setPortfolio() { 
			setColumns();
			$container.isotope('reLayout');
		}
			
		$container.imagesLoaded(function () { 
			setPortfolio();
		});
		
		$(window).on('resize', function () { 
		setPortfolio();          
	});
})(jQuery);
</script>

</body>
</html>