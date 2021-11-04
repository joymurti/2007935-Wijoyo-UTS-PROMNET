<script src="map.js"></script>
    <script src="scroll.js"></script>
    <script>
        function myFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
            var x = document.getElementById("nav");
            if (x.className === "navbar") {
                x.className += " responsive";
            } else {
                x.className = "navbar";
            }
        }
</script>