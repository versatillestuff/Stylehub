
    function myFunction1() {
          /* when you select customer section */
        document.getElementById("myDIV1").style.display = "none";

        document.getElementById("myDIV2").style.display = "block";

        document.getElementById("myDIV3").style.display = "none";
        document.getElementById("head").style.height="200vh";
      

    }

    function myFunction2() {
             /* when you select admin section */
      document.getElementById("myDIV1").style.display = "none";

      document.getElementById("myDIV2").style.display = "none";

      document.getElementById("myDIV3").style.display = "block";
             document.getElementById("head").style.height="200vh";
  

    }

    function myFunction3() {
             /* when you have to back on blinking text section */
      document.getElementById("myDIV1").style.display = "block";

      document.getElementById("myDIV2").style.display = "none";

      document.getElementById("myDIV3").style.display = "none";
        document.body.scrollTop = 0; // For Safari
      document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
      document.getElementById("head").style.height="100vh";
}
     function myFunction4() {
           /* when you select customer login section */
        document.getElementById("myDIV4").style.display = "block";

        document.getElementById("myDIV5").style.display = "none";

         document.getElementById("head").style.height="100vh";

        

      

    }

    function myFunction5() {
           /* when you select customer create account section */
      document.getElementById("myDIV4").style.display = "none";

      document.getElementById("myDIV5").style.display = "block";

    document.getElementById("head").style.height="200vh";

  

    }

    function myFunction6() {
           /* when you select admin login section */
      document.getElementById("myDIV6").style.display = "block";

      document.getElementById("myDIV7").style.display = "none";
       document.getElementById("head").style.height="100vh";
  


    }

      function myFunction7() {
           /* when you select admin create account section */
      document.getElementById("myDIV6").style.display = "none";

      document.getElementById("myDIV7").style.display = "block";

    document.getElementById("head").style.height="200vh";


    }