
        $(function() {
            let start = 0;
            let end = $(".num").html();
            let speed = 10;

            setInterval(function() {
                if (start < end) {
                    start++;
                }
                $(".num").html(start);
            }, speed);
        });

        $(function() {
            let start = 0;
            let end = $(".num1").html();
            let speed = 10;

            setInterval(function() {
                if (start < end) {
                    start++;
                }
                $(".num1").html(start);
            }, speed);
        });

        $(function() {
            let start = 0;
            let end = $(".num2").html();
            let speed = 10;

            setInterval(function() {
                if (start < end) {
                    start++;
                }
                $(".num2").html(start);
            }, speed);
        });
   